<?php

/*******************************************************************************
** 공통 변수, 상수, 코드
*******************************************************************************/
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING );

// 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');

if(!defined('NC_SET_TIME_LIMIT')) define('NC_SET_TIME_LIMIT', 0);
@set_time_limit(NC_SET_TIME_LIMIT);


//===========================================================================================================
// extract($_GET); 명령으로 인해 page.php?_POST[var1]=data1&_POST[var2]=data2 와 같은 코드가 _POST 변수로 사용되는 것을 막음
//-----------------------------------------------------------------------------------------------------------
$ext_arr = array ('PHP_SELF', '_ENV', '_GET', '_POST', '_FILES', '_SERVER', '_COOKIE', '_SESSION', '_REQUEST',
                  'HTTP_ENV_VARS', 'HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_POST_FILES', 'HTTP_SERVER_VARS',
                  'HTTP_COOKIE_VARS', 'HTTP_SESSION_VARS', 'GLOBALS');
$ext_cnt = count($ext_arr);
for($i=0; $i<$ext_cnt; $i++) {
    // POST, GET 으로 선언된 전역변수가 있다면 unset() 시킴
    if(isset($_GET[$ext_arr[$i]]))  unset($_GET[$ext_arr[$i]]);
    if(isset($_POST[$ext_arr[$i]])) unset($_POST[$ext_arr[$i]]);
}
//===========================================================================================================

if(defined('_certify_'))  { 

if(!function_exists('session_start_samesite')) {
		function session_start_samesite($options = array())
		{
			$res = @session_start($options);
			$headers = headers_list();
			foreach ($headers as $header) {
				if (!preg_match('~^Set-Cookie: PHPSESSID=~', $header)) continue;
				$header = preg_replace('~; secure(; HttpOnly)?$~', '', $header) . '; secure; SameSite=None';
				header($header, false);
				break;
			}
			return $res;
		}
	}

	session_start_samesite();

}else{
@session_start();

}

if(defined('_INDEX_'))  { 


$center_id= $_request['center_id'];

$_SESSION['center_id']=$center_id;
}

//echo $center_id;


function nc_path()
{
    $chroot = substr($_SERVER['SCRIPT_FILENAME'], 0, strpos($_SERVER['SCRIPT_FILENAME'], dirname(__FILE__)));
    $result['path'] = str_replace('\\', '/', $chroot.dirname(__FILE__));
    $tilde_remove = preg_replace('/^\/\~[^\/]+(.*)$/', '$1', $_SERVER['SCRIPT_NAME']);
    $document_root = str_replace($tilde_remove, '', $_SERVER['SCRIPT_FILENAME']);
    $pattern = '/' . preg_quote($document_root, '/') . '/i';
    $root = preg_replace($pattern, '', $result['path']);
    //20230124 jeonsw https=81
	//$port = ($_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 443) ? '' : ':'.$_SERVER['SERVER_PORT'];
	$port = ($_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 81) ? '' : ':'.$_SERVER['SERVER_PORT'];
    //$http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';
	//$http = 'http' . (($_SERVER['SERVER_PORT'] == 81) ? 's' : '') . '://';
	$isSecure = false;
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
		$isSecure = true;
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || 
			!empty($_SERVER['HTTP_X_FORWARDED_SSL'])   && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
		$isSecure = true;
	}
	$http = ($isSecure ? 'https' : 'http') . '://';
    $user = str_replace(preg_replace($pattern, '', $_SERVER['SCRIPT_FILENAME']), '', $_SERVER['SCRIPT_NAME']);
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    if(isset($_SERVER['HTTP_HOST']) && preg_match('/:[0-9]+$/', $host))
        $host = preg_replace('/:[0-9]+$/', '', $host);
    $host = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*]/", '', $host);
    $result['url'] = $http.$host.$port.$user.$root;
	//$result['url'] = $root;
    return $result;
}

$nc_path = nc_path();


include_once($nc_path['path'].'/config.php');   // 설정 파일


unset($nc_path);

// multi-dimensional array에 사용자지정 함수적용
function array_map_deep($fn, $array)
{
    if(is_array($array)) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                $array[$key] = array_map_deep($fn, $value);
            } else {
                $array[$key] = call_user_func($fn, $value);
            }
        }
    } else {
        $array = call_user_func($fn, $array);
    }

    return $array;
}

// SQL Injection 대응 문자열 필터링
function sql_escape_string($str)
{
    if(defined('NC_ESCAPE_PATTERN') && defined('NC_ESCAPE_REPLACE')) {
        $pattern = NC_ESCAPE_PATTERN;
        $replace = NC_ESCAPE_REPLACE;

        if($pattern)
            $str = preg_replace($pattern, $replace, $str);
    }

    $str = call_user_func('addslashes', $str);

    return $str;
}

//==============================================================================
// SQL Injection 등으로 부터 보호를 위해 sql_escape_string() 적용
//------------------------------------------------------------------------------
// magic_quotes_gpc 에 의한 backslashes 제거


if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
    $_POST    = array_map_deep('stripslashes',  $_POST);
    $_GET     = array_map_deep('stripslashes',  $_GET);
    $_COOKIE  = array_map_deep('stripslashes',  $_COOKIE);
    $_REQUEST = array_map_deep('stripslashes',  $_REQUEST);
}

// sql_escape_string 적용
$_POST    = array_map_deep(NC_ESCAPE_FUNCTION,  $_POST);
$_GET     = array_map_deep(NC_ESCAPE_FUNCTION,  $_GET);
$_COOKIE  = array_map_deep(NC_ESCAPE_FUNCTION,  $_COOKIE);
$_REQUEST = array_map_deep(NC_ESCAPE_FUNCTION,  $_REQUEST);
//==============================================================================

// PHP 4.1.0 부터 지원됨
// php.ini 의 register_globals=off 일 경우
@extract($_GET);
@extract($_POST);
@extract($_SERVER);






//Certify - 본인확인 인증, Adult - 성인인증, dupinfo - 중복가입체크

// $변수 선언
$config  = array();
$default = array();
$member = array('Web_ID'=>'', 'Member_Name'=> '',  'Email'=>'', 'Cellular'=>'', 'Member_Code'=>'');
$tb		 = array();
$nc     = array();

//==============================================================================
// 공통
//------------------------------------------------------------------------------
include_once(NC_LIB_PATH.'/db.'.$_SESSION['center_id'].'.php');
include_once(NC_LIB_PATH."/common_function_.php"); // 공통 라이브러리
$dbconfig_file = NC_DATA_PATH.'/dbconfig.'.$_SESSION['center_id'].'.php';



if(file_exists($dbconfig_file)) {
    include_once($dbconfig_file);
    include_once(NC_LIB_PATH.'/hook.lib.php');    // hook 함수 파일
	include_once(NC_LIB_PATH."/global.lib.php"); // PC+모바일 공통 라이브러리
	include_once(NC_LIB_PATH."/common.lib.php"); // PC전용 라이브러리
	//include_once(NC_LIB_PATH."/mobile.lib.php"); // 모바일전용 라이브러리
	//include_once(NC_LIB_PATH."/thumbnail.lib.php"); // 썸네일 라이브러리
	//include_once(NC_LIB_PATH."/editor.lib.php"); // 에디터 라이브러리
	//include_once(NC_LIB_PATH."/login-oauth.php"); // SNS 로그인

 ;

    $connect_db = sql_connect(NC_MYSQL_HOST, NC_MYSQL_USER, NC_MYSQL_PASSWORD, NC_MYSQL_PORT) or die('MySQL Connect Error!!!');
    $select_db  = sql_select_db(NC_MYSQL_DB, $connect_db) or die('MySQL DB Error!!!');


    $tb['connect_db'] = $connect_db;
	


    sql_set_charset('utf8', $connect_db);
	
	
	
    if(defined('NC_MYSQL_SET_MODE') && NC_MYSQL_SET_MODE) sql_query("SET SESSION sql_mode = ''");
    //if(defined(NC_TIMEZONE)) sql_query(" set time_zone = '".NC_TIMEZONE."'");
} else {
	header('Content-Type: text/html; charset=utf-8');

	die($dbconfig_file.' 파일을 찾을 수 없습니다..');
}




//include_once(NC_LIB_PATH."/global.lib.php"); // PC+모바일 공통 라이브러리
//include_once(NC_LIB_PATH."/common.lib.php"); // PC전용 라이브러리

//==============================================================================



//==============================================================================
// SESSION 설정
//------------------------------------------------------------------------------
@ini_set("session.use_trans_sid", 0); // PHPSESSID를 자동으로 넘기지 않음
@ini_set("url_rewriter.tags",""); // 링크에 PHPSESSID가 따라다니는것을 무력화함

//echo NC_SESSION_PATH;

//ini_set('session.save_path', NC_SESSION_PATH);
//session_save_path(NC_SESSION_PATH);


/*
if(isset($SESSION_CACHE_LIMITER))
   @session_cache_limiter($SESSION_CACHE_LIMITER);
else
    @session_cache_limiter("no-cache, must-revalidate");*/

ini_set("session.cache_expire", 60); // 세션 캐쉬 보관시간 (분)
ini_set("session.gc_maxlifetime", 10800); // session data의 garbage collection 존재 기간을 지정 (초)
ini_set("session.gc_probability", 1); // session.gc_probability는 session.gc_divisor와 연계하여 gc(쓰레기 수거) 루틴의 시작 확률을 관리합니다. 기본값은 1입니다. 자세한 내용은 session.gc_divisor를 참고하십시오.
ini_set("session.gc_divisor", 100); // session.gc_divisor는 session.gc_probability와 결합하여 각 세션 초기화 시에 gc(쓰레기 수거) 프로세스를 시작할 확률을 정의합니다. 확률은 gc_probability/gc_divisor를 사용하여 계산합니다. 즉, 1/100은 각 요청시에 GC 프로세스를 시작할 확률이 1%입니다. session.gc_divisor의 기본값은 100입니다.

session_set_cookie_params(0, '/');
ini_set("session.cookie_domain", NC_COOKIE_DOMAIN);

define('NC_ROOT_URL', '');

define('NC_T_URL', '');

//if(isset($_REQUEST['PHPSESSID']) && $_REQUEST['PHPSESSID'] != session_id())
//    goto_url(NC_ROOT_URL.'/sso_logout.php');




//[보안관련] PHPSESSID 가 틀리면 로그아웃한다.
if (isset($_REQUEST['PHPSESSID']) && $_REQUEST['PHPSESSID'] != session_id())
    goto_url(NC_MEMBER_URL.'/logout.php');


//==============================================================================


//==============================================================================
// 공용 변수
//------------------------------------------------------------------------------
// 기본환경설정
// 기본적으로 사용하는 필드만 얻은 후 상황에 따라 필드를 추가로 얻음

/*
$_SESSION["MEM_NO"] = $member["MEM_NO"];
$_SESSION["MEM_NM"] = $member["MEM_NM"];
$_SESSION["MEM_GENDER"] = $member["GENDER"];
$_SESSION["MEM_ID"] = $member["ID"];
$_SESSION["MEM_BIRTHDATE"] = $member["BIRTH_DATE"];
$_SESSION["MEM_NICKNAME"] = $member["NICKNAME"];
$_SESSION["MEM_DCBASEDATE"] = $member["DC_BASEDATE"];
$_SESSION["MEM_HP"] = $member["HP"];
$_SESSION["MEM_EMAIL"] = $member["EMAIL"];
$_SESSION["MEM_HOME_TEL"] = $member["HOME_TEL"];
$_SESSION["LOGIN_LEVEL"] = $member["MEM_GBN"];
$_SESSION["MEM_DCCONFIRM_YN"] = $member["DCCONFIRM_YN"];
$_SESSION["MEM_DISCOUNT_CD"] = $member["DISCOUNT_CD"];
$_SESSION["MEM_COMCD"] = $member["COMCD"];
*/

//$data = urlencode(serialize($_SESSION)); 


//$MEM_NO=$_SESSION['mem_no'];
//$MEM_ID=$_SESSION['mem_id'];
//$MEM_NM=$_SESSION['mem_nm'];

//$MEM_NM=iconv("euc-kr","utf-8",$MEM_NM);




$json_string = CF_Company_Info($center_id,$url);

$json_array = json_decode($json_string, true); 



if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	
}else{

 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
        	}
		 $center_id=$val['Center_ID'];
		 $corp_name=$val['Corp_Name'];
	 $corp_no=$val['Corp_No'];
	 $business_no=$val['Business_No'];
 $president=$val['President'];
 $post_no=$val['Post_No'];
 $address=$val['Address'];
$telephone=$val['Telephone'];
 $center_name=$val['Center_Name'];
 $center_company_name=$val['Center_Company_Name'];
 $center_id=$val['Center_ID'];
		 }
 }

}




$_SESSION["corp_name"]= $corp_name;
$_SESSION["corp_no"]= $corp_no;
$_SESSION["business_no"]= $business_no;
$_SESSION["post_no"]= $post_no;
$_SESSION["address"]= $address;
$_SESSION["telephone"]= $telephone;
$_SESSION["center_name"]= $center_name;
$_SESSION["president"]= $president;
$_SESSION["center_id"]= $center_id;

$member_id=get_session("m_id");


/*



$xcenter_id= substr(get_sub_domain(),-3);



*/



// 보안서버주소 설정
if(NC_HTTPS_DOMAIN) {
	define('NC_HTTPS_MEMBER_URL', NC_HTTPS_DOMAIN.'/'.NC_MEMBER_DIR);
    define('NC_HTTPS_MBBS_URL', NC_HTTPS_DOMAIN.'/'.NC_MOBILE_DIR.'/'.NC_BBS_DIR);
    //define('NC_HTTPS_THEME_URL', NC_HTTPS_DOMAIN.'/'.NC_THEME_DIR);
 } else {
    define('NC_HTTPS_MEMBER_URL', NC_MEMBER_URL);
    define('NC_HTTPS_MBBS_URL', NC_MBBS_URL);
    //define('NC_HTTPS_THEME_URL', NC_THEME_URL);

}

// QUERY_STRING
$qstr = '';

if(isset($_REQUEST['set'])) {
	$set = trim($_REQUEST['set']);
	$qstr .= '&set=' . urlencode($set);
}

if(isset($_REQUEST['sca'])) {
    $sca = trim($_REQUEST['sca']);
    $qstr .= '&sca=' . urlencode($sca);
}

if(isset($_REQUEST['sfl'])) {
    $sfl = trim($_REQUEST['sfl']);
    $sfl = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*\s]/", "", $sfl);
    $qstr .= '&sfl=' . urlencode($sfl); // search field (검색 필드)
}
if(isset($_REQUEST['search_txt'])) {
    $search_txt = trim($_REQUEST['search_txt']);
    $search_txt = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*\s]/", "", $search_txt);
    $qstr .= '&search_txt=' . urlencode($search_txt); // search field (검색 필드)
}

if(isset($_REQUEST['search_week'])) {
    $search_week = trim($_REQUEST['search_week']);
    $search_week = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*\s]/", "", $search_week);
    $qstr .= '&search_week=' . urlencode($search_week); // search field (검색 필드)
}

if(isset($_REQUEST['stx'])) {
    $stx = trim($_REQUEST['stx']);
    $qstr .= '&stx=' . urlencode($stx);
}

if(isset($_REQUEST['mon'])) {
    $mon = trim($_REQUEST['mon']);
    $qstr .= '&mon=' . urlencode($mon);
}
if(isset($_REQUEST['tue'])) {
    $tue = trim($_REQUEST['tue']);
    $qstr .= '&tue=' . urlencode($tue);
}
if(isset($_REQUEST['wed'])) {
    $wed = trim($_REQUEST['wed']);
    $qstr .= '&wed=' . urlencode($wed);
}
if(isset($_REQUEST['thu'])) {
    $thu = trim($_REQUEST['thu']);
    $qstr .= '&thu=' . urlencode($thu);
}
if(isset($_REQUEST['fri'])) {
    $fri = trim($_REQUEST['fri']);
    $qstr .= '&fri=' . urlencode($fri);
}
if(isset($_REQUEST['sat'])) {
    $sat = trim($_REQUEST['sat']);
    $qstr .= '&sat=' . urlencode($sat);
}
if(isset($_REQUEST['sun'])) {
    $sun = trim($_REQUEST['sun']);
    $qstr .= '&sun=' . urlencode($sun);
}
if(isset($_REQUEST['sst'])) {
    $sst = trim($_REQUEST['sst']);
    $qstr .= '&sst=' . urlencode($sst);
}

if(isset($_REQUEST['sod'])) {
    $sod = trim($_REQUEST['sod']);
    $qstr .= '&sod=' . urlencode($sod);
}

if(isset($_REQUEST['sop'])) {
    $sop = trim($_REQUEST['sop']);
    $qstr .= '&sop=' . urlencode($sop);
}

if(isset($_REQUEST['spt'])) {
    $spt = trim($_REQUEST['spt']);
    $qstr .= '&spt=' . urlencode($spt);
}

if(isset($_REQUEST['ca_id'])) {
    $ca_id = trim($_REQUEST['ca_id']);
    $qstr .= '&ca_id=' . urlencode($ca_id);
}

if(isset($_REQUEST['fr_date'])) {
    $fr_date = trim($_REQUEST['fr_date']);
    $qstr .= '&fr_date=' . urlencode($fr_date);
}

if(isset($_REQUEST['to_date'])) {
    $to_date = trim($_REQUEST['to_date']);
    $qstr .= '&to_date=' . urlencode($to_date);
}

if(isset($_REQUEST['filed'])) {
    $filed = trim($_REQUEST['filed']);
    $qstr .= '&filed=' . urlencode($filed);
}

if(isset($_REQUEST['orderby'])) {
    $orderby = trim($_REQUEST['orderby']);
    $qstr .= '&orderby=' . urlencode($orderby);
}

// URL ENCODING
if(isset($_REQUEST['url'])) {
	$url = strip_tags(trim($_REQUEST['url']));
	$urlencode = urlencode($url);
} else {
    $url = '';
    $urlencode = urlencode($_SERVER['REQUEST_URI']);
    if(NC_DOMAIN) {
        $p = @parse_url(NC_DOMAIN);
        $urlencode = NC_DOMAIN.urldecode(preg_replace("/^".urlencode($p['path'])."/", "", $urlencode));
    }
}




// 회원, 비회원 구분
$is_member = $is_guest = false;

//echo $_SESSION['m_id'];

if (isset($_SESSION['m_id']) && $_SESSION['m_id']) {

    $member = get_member($_SESSION['m_id']);

    $is_member = true;
    $is_member = 1;
} else {
    $is_guest = true;
    $member_id = '';
    $is_member = 0;
}





//===================================




// FLASH XSS 공격에 대응하기 위하여 회원의 고유키를 생성해 놓는다. 관리자에서 검사함 - 110106
//set_session('ss_mb_key', md5($mb['reg_time'] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));

//var_dump( $_SESSION );

// 회원, 비회원 구분

//if($_SESSION['mem_no']) {
//	$is_member = 1;
	
	
//   	$MEM_NO = $_SESSION['mem_no'];
//} else {
//	$is_member = 0;
//	$MEM_NO='';
// }
/*
if(!is_admin()) {
    // 접근가능 IP
    $possible_ip = trim($config['possible_ip']);
    if($possible_ip) {
        $is_possible_ip = false;
        $pattern = explode("\n", $possible_ip);
        for($i=0; $i<count($pattern); $i++) {
            $pattern[$i] = trim($pattern[$i]);
            if(empty($pattern[$i]))
                continue;

            $pattern[$i] = str_replace(".", "\.", $pattern[$i]);
            $pattern[$i] = str_replace("+", "[0-9\.]+", $pattern[$i]);
            $pat = "/^{$pattern[$i]}$/";
            $is_possible_ip = preg_match($pat, $_SERVER['REMOTE_ADDR']);
            if($is_possible_ip)
                break;
        }
        if(!$is_possible_ip)
            die ("접근이 가능하지 않습니다.");
    }

    // 접근차단 IP
    $is_intercept_ip = false;
    $pattern = explode("\n", trim($config['intercept_ip']));
    for($i=0; $i<count($pattern); $i++) {
        $pattern[$i] = trim($pattern[$i]);
        if(empty($pattern[$i]))
            continue;

        $pattern[$i] = str_replace(".", "\.", $pattern[$i]);
        $pattern[$i] = str_replace("+", "[0-9\.]+", $pattern[$i]);
        $pat = "/^{$pattern[$i]}$/";
        $is_intercept_ip = preg_match($pat, $_SERVER['REMOTE_ADDR']);
        if($is_intercept_ip)
            die ("접근 불가합니다.");
    }
}
*/
//==============================================================================
// 사용기기 설정
// config.php NC_SET_DEVICE 설정에 따라 사용자 화면 제한됨
// pc 설정 시 모바일 기기에서도 PC화면 보여짐
// mobile 설정 시 PC에서도 모바일화면 보여짐
// both 설정 시 접속 기기에 따른 화면 보여짐
//------------------------------------------------------------------------------
$is_mobile = false;
$set_device = true;

if(defined('NC_SET_DEVICE')) {
    switch(NC_SET_DEVICE) {
        case 'pc':
            $is_mobile  = false;
            $set_device = false;
            break;
        case 'mobile':
            $is_mobile  = true;
            $set_device = false;
            break;
        default:
            break;
    }
}
//==============================================================================


//==============================================================================
// Mobile 모바일 설정
// 쿠키에 저장된 값이 모바일이라면 브라우저 상관없이 모바일로 실행
// 그렇지 않다면 브라우저의 HTTP_USER_AGENT 에 따라 모바일 결정
// NC_MOBILE_AGENT : config.php 에서 선언
//------------------------------------------------------------------------------
/*if(NC_USE_MOBILE && $set_device) {
    if (isset($_REQUEST['device']) && $_REQUEST['device']=='pc')
        $is_mobile = false;
    else if (isset($_REQUEST['device']) && $_REQUEST['device']=='mobile')
        $is_mobile = true;
    else if (isset($_SESSION['ss_is_mobile']))
        $is_mobile = $_SESSION['ss_is_mobile'];
    else if (is_mobile())
        $is_mobile = true;
} else {
    $set_device = false;
}*/


if (is_mobile()){
        $is_mobile = true;
} else {
    $set_device = false;
}

$_SESSION['ss_is_mobile'] = $is_mobile;



define('NC_IS_MOBILE', $is_mobile);
define('NC_DEVICE_BUTTON_DISPLAY', $set_device);
if(NC_IS_MOBILE) {
    //$tb['mobile_path'] = NC_PATH.'/'.$tb['mobile_dir'];
	//$tb['mobile_path'] = NC_PATH.'/';
}
//==============================================================================


/*
// common.php 파일을 수정할 필요가 없도록 확장합니다.
$extend_file = array();
$tmp = dir(NC_EXTEND_PATH);

while ($entry = $tmp->read()) {
    // php 파일만 include 함
    if (preg_match("/(\.php)$/i", $entry))
        $extend_file[] = $entry;
}

if(!empty($extend_file) && is_array($extend_file)) {
    natsort($extend_file);

    foreach($extend_file as $file) {
        include_once(NC_EXTEND_PATH.'/'.$file);
    }
    unset($file);
}
unset($extend_file);
*/



// 일정 기간이 지난 DB 데이터 삭제 및 최적화
//include_once(NC_LIB_PATH.'/db_table.optimize.php');



ob_start();




// 자바스크립트에서 go(-1) 함수를 쓰면 폼값이 사라질때 해당 폼의 상단에 사용하면
// 캐쉬의 내용을 가져옴. 완전한지는 검증되지 않음
header('Content-Type: text/html; charset=utf-8');
$gmnow = gmdate('D, d M Y H:i:s') . ' GMT';
header('Expires: 0'); // rfc2616 - Section 14.21
header('Last-Modified: ' . $gmnow);
header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
header('Pragma: no-cache'); // HTTP/1.0

$html_process = new html_process();





$theme = 'basic';
$m_theme = 'basic';

$ntheme = '';
$nc_theme = '';

define('NC_THEME_PATH', get_theme_path($theme));
define('NC_THEME_URL',  get_theme_url($m_theme));


define('NC_LTHEME_PATH', get_lecture_theme_path($ntheme));
define('NC_LTHEME_URL',  get_lecture_theme_url($nc_theme));

define('NC_RTHEME_PATH', get_rent_theme_path($ntheme));
define('NC_RTHEME_URL',  get_rent_theme_url($nc_theme));

define('NC_MYTHEME_PATH', get_mypage_theme_path($ntheme));
define('NC_MYTHEME_URL',  get_mypage_theme_url($nc_theme));


define('NC_MTHEME_PATH', get_member_theme_path($ntheme));
define('NC_MTHEME_URL',  get_member_theme_url($nc_theme));

define('NC_CTHEME_PATH', get_center_theme_path($ntheme));
define('NC_CTHEME_URL',  get_center_theme_url($nc_theme));

?>