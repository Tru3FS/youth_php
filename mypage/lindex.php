<?php


define('_CINDEX_', true);


$ttype= $_REQUEST["ttype"];
if($ttype==1){

$_SESSION["center_id"] =  isset($_REQUEST['center_id']) ? clean_xss_tags($_REQUEST['center_id'], 1, 1) : $_SESSION["center_id"];

}



include_once("./_common.php");



//$mypage='1';
if(!$is_member) {
	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?redirect_to='. NC_DOMAIN .'/mypage/');
}
$n_type="mypage_lecture";
$page_info="mypage";




//$url = isset($_REQUEST['redirect_to']) ? strip_tags($_REQUEST['redirect_to']) : '';

// url 체크
//check_url_host($url);

// 이미 로그인 중이라면
//if ($is_member) {
//    if ($url)
//        goto_url($url);
//    else
//        goto_url(NC_URL);
//}



include_once("./_head.php");


$status=  isset($_REQUEST['status']) ? clean_xss_tags($_REQUEST['status'], 1, 1) : '';
$page=  isset($_REQUEST['page']) ? clean_xss_tags($_REQUEST['page'], 1, 1) : '';


$s_status=  isset($_REQUEST['status']) ? clean_xss_tags($_REQUEST['status'], 1, 1) : '';


include_once(NC_MYTHEME_PATH.'/lindex.skin.php');


include_once("./_tail.php");
?>