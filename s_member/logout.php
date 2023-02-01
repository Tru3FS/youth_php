<?php
include_once('../lib/_common.php');




// 자동로그인 해제 --------------------------------
set_cookie('ck_mb_id', '', 0);
set_cookie('ck_auto', '', 0);
// 자동로그인 해제 end --------------------------------

$_SESSION["sales_code"] = '';
$_SESSION["s_code"] = '';
$_SESSION["g_code"] = '';
$_SESSION["b_code"] = '';
$_SESSION["center_id"] = '';
$_SESSION["m_age"] = '';

session_unset(); // 모든 세션변수를 언레지스터 시켜줌
session_destroy(); // 세션해제함


session_start(); 


$center_id= $_REQUEST['center_id'];

$_SESSION['center_id']=$center_id;

if ($url) {
    if ( substr($url, 0, 2) == '//' )
        $url = 'https:' . $url;

    $p = @parse_url(urldecode($url));
    /*
        // OpenRediect 취약점관련, PHP 5.3 이하버전에서는 parse_url 버그가 있음  아래 url 예제
        // http://localhost/bbs/logout.php?url=http:///
    */
    if (preg_match('/^https?:\/\//i', $url) || $p['scheme'] || $p['host']) {
        alert('url에 도메인을 지정할 수 없습니다.', NC_URL);
    }

       $link = $url.'/';
} else {
    $link = NC_URL.'/index.php?center_id='.$_SESSION["center_id"];
}


run_event('member_logout', $link);

goto_url($link);