<?php
/********************
    상수 선언
********************/

define('NC_VERSION', '서청협 V2');

if(defined('_PURENESS_')) return;



// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
define('_SAMSUNG_', true);





if(PHP_VERSION >= '5.1.0') {
    //if(function_exists("date_default_timezone_set")) date_default_timezone_set("Asia/Seoul");
    date_default_timezone_set("Asia/Seoul");
}




/********************
    경로 상수
********************/

/*
보안서버 도메인
회원가입, 글쓰기에 사용되는 https 로 시작되는 주소를 말합니다.
포트가 있다면 도메인 뒤에 :443 과 같이 입력하세요.
보안서버주소가 없다면 공란으로 두시면 되며 보안서버주소 뒤에 / 는 붙이지 않습니다.
입력예) https://www.domain.com:443
*/

/*
추후 urlencode 도메인 연결시 도메인 입력
*/

/*
define('NC_DOMAIN', 'https://'.$_SERVER['HTTP_HOST']); 
define('NC_HTTPS_DOMAIN', 'https://'.$_SERVER['HTTP_HOST']);
define('NC_COOKIE_DOMAIN',  '.'.$_SERVER['HTTP_HOST']);
*/

define('NC_DOMAIN', '');
define('NC_NDOMAIN', '');
define('NC_HTTPS_DOMAIN', '');
define('NC_NDOMAINX', '');

define('baseURL', '');
define('baseSSL', '');


/*
www.sample.co.kr 과 sample.co.kr 도메인은 서로 다른 도메인으로 인식합니다. 쿠키를 공유하려면 .sample.co.kr 과 같이 입력하세요.
이곳에 입력이 없다면 www 붙은 도메인과 그렇지 않은 도메인은 쿠키를 공유하지 않으므로 로그인이 풀릴 수 있습니다.
*/
define('NC_COOKIE_DOMAIN',  '');
define('NC_DBCONFIG_FILE',  'dbconfig.php');

define('NC_ADMIN_DIR',      'admin');
define('NC_BBS_DIR',        'bbs');
define('NC_CSS_DIR',        's_css');
define('NC_DATA_DIR',       'data');
define('NC_EXTEND_DIR',     'extend');
define('NC_IMG_DIR',        's_img');
define('NC_JS_DIR',         's_js');
define('NC_LIB_DIR',        'lib');
define('NC_MOBILE_DIR',     'm');
define('NC_MYPAGE_DIR',     'mypage');
define('NC_MEMBER_DIR',     's_member');
define('NC_PLUGIN_DIR',     'plugin');
define('NC_SHOP_DIR',       'dobong');
define('NC_RENT_DIR',       'rent');
define('NC_LECTURE_DIR',    'lecture');
define('NC_THEME_DIR',		'theme');
define('NC_EDITOR_DIR',     'editor');
define('NC_LGXPAY_DIR',     'lgxpay');
define('NC_PHPMAILER_DIR',  'PHPMailer');
define('NC_SESSION_DIR',    'session');
define('NC_OKNAME_DIR',     'okname');
define('NC_KCPCERT_DIR',    'kcpcert');
define('NC_GUIDE_DIR',       'guide');
define('NC_UTIL_DIR',       'util');
define('NC_CENTER_DIR',       's_center');
define('NC_NICE_DIR',       'nice');


// URL 은 브라우저상에서의 경로 (도메인으로 부터의)
if(NC_DOMAIN) {
    define('NC_URL', NC_DOMAIN);
} else {
    if(isset($nc_path['url']))
        define('NC_URL', $nc_path['url']);
    else
        define('NC_URL', '');
}

if(isset($nc_path['path'])) {
    define('NC_PATH', $nc_path['path']);
} else {
    define('NC_PATH', '');
}





define('NC_ADMIN_URL',      NC_URL.'/'.NC_ADMIN_DIR);
define('NC_BBS_URL',        NC_URL.'/'.NC_BBS_DIR);
define('NC_CSS_URL',        NC_URL.'/'.NC_CSS_DIR);
define('NC_DATA_URL',       NC_URL.'/'.NC_DATA_DIR);
define('NC_IMG_URL',        NC_URL.'/'.NC_IMG_DIR);
define('NC_JS_URL',         NC_URL.'/'.NC_JS_DIR);
define('NC_SHOP_URL',       NC_URL.'/'.NC_SHOP_DIR);
define('NC_LIB_URL',        NC_URL.'/'.NC_LIB_DIR);
define('NC_PLUGIN_URL',     NC_URL.'/'.NC_PLUGIN_DIR);
define('NC_MYPAGE_URL',     NC_URL.'/'.NC_MYPAGE_DIR);
define('NC_MEMBER_URL',     NC_URL.'/'.NC_MEMBER_DIR);
define('NC_EDITOR_URL',     NC_PLUGIN_URL.'/'.NC_EDITOR_DIR);
define('NC_LGXPAY_URL',     NC_PLUGIN_URL.'/'.NC_LGXPAY_DIR);
define('NC_OKNAME_URL',     NC_PLUGIN_URL.'/'.NC_OKNAME_DIR);
define('NC_KCPCERT_URL',    NC_PLUGIN_URL.'/'.NC_KCPCERT_DIR);
define('NC_GUIDE_URL',     NC_URL.'/'.NC_GUIDE_DIR);
define('NC_UTIL_URL',     NC_URL.'/'.NC_UTIL_DIR);
define('NC_CENTER_URL',     NC_URL.'/'.NC_CENTER_DIR);

// PATH 는 서버상에서의 절대경로
define('NC_ADMIN_PATH',     NC_PATH.'/'.NC_ADMIN_DIR);
define('NC_BBS_PATH',       NC_PATH.'/'.NC_BBS_DIR);
define('NC_DATA_PATH',      NC_PATH.'/'.NC_DATA_DIR);
define('NC_EXTEND_PATH',    NC_PATH.'/'.NC_EXTEND_DIR);
define('NC_LIB_PATH',       NC_PATH.'/'.NC_LIB_DIR);
define('NC_PLUGIN_PATH',    NC_PATH.'/'.NC_PLUGIN_DIR);
define('NC_SHOP_PATH',      NC_PATH.'/'.NC_SHOP_DIR);
define('NC_MYPAGE_PATH',    NC_PATH.'/'.NC_MYPAGE_DIR);
define('NC_SESSION_PATH',   NC_DATA_PATH.'/'.NC_SESSION_DIR);
define('NC_EDITOR_PATH',    NC_PLUGIN_PATH.'/'.NC_EDITOR_DIR);
define('NC_PHPMAILER_PATH', NC_PLUGIN_PATH.'/'.NC_PHPMAILER_DIR);
define('NC_LGXPAY_PATH',    NC_PLUGIN_PATH.'/'.NC_LGXPAY_DIR);
define('NC_OKNAME_PATH',    NC_PLUGIN_PATH.'/'.NC_OKNAME_DIR);
define('NC_KCPCERT_PATH',   NC_PLUGIN_PATH.'/'.NC_KCPCERT_DIR);
define('NC_GUIDE_PATH',     NC_PATH.'/'.NC_GUIDE_DIR);
define('NC_MEMBER_PATH',     NC_PATH.'/'.NC_MEMBER_DIR);
define('NC_CENTER_PATH',     NC_PATH.'/'.NC_CENTER_DIR);

define('NC_RENT_URL',       NC_URL.'/'.NC_RENT_DIR);
define('NC_LECTURE_URL',       NC_URL.'/'.NC_LECTURE_DIR);

define('NC_RENT_PATH',       NC_PATH.'/'.NC_RENT_DIR);
define('NC_LECTURE_PATH',       NC_PATH.'/'.NC_LECTURE_DIR);

define('NC_NICE_URL',       NC_PLUGIN_URL.'/'.NC_NICE_DIR);
define('NC_NICE_PATH',      NC_PLUGIN_PATH.'/'.NC_NICE_DIR);

// 모바일경로 상수
define('NC_MPATH',			NC_PATH.'/'.NC_MOBILE_DIR);
define('NC_MURL',			NC_URL.'/'.NC_MOBILE_DIR);
define('NC_MBBS_PATH',		NC_MPATH.'/'.NC_BBS_DIR);
define('NC_MBBS_URL',		NC_MURL.'/'.NC_BBS_DIR);
define('NC_MCSS_PATH',		NC_MPATH.'/'.NC_CSS_DIR);
define('NC_MCSS_URL',		NC_MURL.'/'.NC_CSS_DIR);
define('NC_MIMG_PATH',		NC_MPATH.'/'.NC_IMG_DIR);
define('NC_MIMG_URL',		NC_MURL.'/'.NC_IMG_DIR);
define('NC_MJS_PATH',		NC_MPATH.'/'.NC_JS_DIR);
define('NC_MJS_URL',		NC_MURL.'/'.NC_JS_DIR);
define('NC_MSHOP_PATH',		NC_MPATH.'/'.NC_SHOP_DIR);
define('NC_MSHOP_URL',		NC_MURL.'/'.NC_SHOP_DIR);
//==============================================================================


//==============================================================================
// 사용기기 설정
// pc 설정 시 모바일 기기에서도 PC화면 보여짐
// mobile 설정 시 PC에서도 모바일화면 보여짐
// both 설정 시 접속 기기에 따른 화면 보여짐
//------------------------------------------------------------------------------
define('NC_SET_DEVICE', 'both');
define('NC_USE_MOBILE', false); // 모바일 홈페이지를 사용하지 않을 경우 false 로 설정


/********************
    시간 상수
********************/
// 서버의 시간과 실제 사용하는 시간이 틀린 경우 수정하세요.
// 하루는 86400 초입니다. 1시간은 3600초
// 6시간이 빠른 경우 time() + (3600 * 6);
// 6시간이 느린 경우 time() - (3600 * 6);
define('NC_SERVER_TIME',    time());
define('NC_TIME_YEAR',		date("Y", NC_SERVER_TIME));
define('NC_TIME_MONTH',		date("m", NC_SERVER_TIME));
define('NC_TIME_DAY',		date("d", NC_SERVER_TIME));
define('NC_TIME_YM',		date("Y-m", NC_SERVER_TIME));
define('NC_TIME_YMDHIS',	date("Y-m-d H:i:s", NC_SERVER_TIME));
define('NC_TIME_YHS',		date("YmdHis", NC_SERVER_TIME));
define('NC_TIME_YMD',		substr(NC_TIME_YMDHIS, 0, 10));
define('NC_TIME_HIS',		substr(NC_TIME_YMDHIS, 11, 8));

// 입력값 검사 상수 (숫자를 변경하시면 안됩니다.)
define('NC_ALPHAUPPER',		1); // 영대문자
define('NC_ALPHALOWER',		2); // 영소문자
define('NC_ALPHABETIC',		4); // 영대,소문자
define('NC_NUMERIC',		8); // 숫자
define('NC_HANGUL',		   16); // 한글
define('NC_SPACE',         32); // 공백
define('NC_SPECIAL',       64); // 특수문자

// 퍼미션
define('NC_DIR_PERMISSION',  0707); // 디렉토리 생성시 퍼미션
define('NC_FILE_PERMISSION', 0644); // 파일 생성시 퍼미션

// 모바일 인지 결정 $_SERVER['HTTP_USER_AGENT']
define('NC_MOBILE_AGENT', 'phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|android|sony');

// SMTP
// lib/mailer.lib.php 에서 사용
define('NC_SMTP',      '127.0.0.1');
define('NC_SMTP_PORT', '25');

// 아이코드 코인 최소금액 설정
// 코인 잔액이 설정 금액보다 작을 때는 주문시 SMS 발송 안함
// define('NC_ICODE_COIN', 100);
/********************
    기타 상수
********************/

// 암호화 함수 지정
// 사이트 운영 중 설정을 변경하면 로그인이 안되는 등의 문제가 발생합니다.
define('NC_STRING_ENCRYPT_FUNCTION', 'sql_password');

// SQL 에러를 표시할 것인지 지정
// 에러를 표시하려면 TRUE 로 변경
define('NC_DISPLAY_SQL_ERROR', false);

// escape string 처리 함수 지정
// addslashes 로 변경 가능
define('NC_ESCAPE_FUNCTION', 'sql_escape_string');

// sql_escape_string 함수에서 사용될 패턴
//define('NC_ESCAPE_PATTERN',  '/(and|or).*(union|select|insert|update|delete|from|where|limit|create|drop).*/i');
//define('NC_ESCAPE_REPLACE',  '');

// 썸네일 jpg Quality 설정
define('NC_THUMB_JPG_QUALITY', 90);

// 썸네일 png Compress 설정
define('NC_THUMB_PNG_COMPRESS', 5);

// MySQLi 사용여부를 설정합니다.
define('NC_MYSQLI_USE', true);

// 옵션 ID 특수문자 필터링 패턴
define('NC_OPTION_ID_FILTER', '/[\'\"\\\'\\\"]/');

// 스팸방지를 위한 암호화 키값
define('NC_HASH_TOKEN', md5(NC_URL.NC_TIME_YMD.$_SERVER['REMOTE_ADDR']));

// ip 숨김방법 설정
/* 123.456.789.012 ip의 숨김 방법을 변경하는 방법은
\\1 은 123, \\2는 456, \\3은 789, \\4는 012에 각각 대응되므로
표시되는 부분은 \\1 과 같이 사용하시면 되고 숨길 부분은 ♡등의
다른 문자를 적어주시면 됩니다.
*/
define('NC_IP_DISPLAY', '\\1.♡.\\3.\\4');

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') {   //https 통신일때 daum 주소 js
    define('NC_POSTCODE_JS', '<script src="https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js"></script>');
} else {  //http 통신일때 daum 주소 js
    define('NC_POSTCODE_JS', '<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>');
}




?>