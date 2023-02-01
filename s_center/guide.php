<?php
include_once("./_common.php");


//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}
$n_type="guide";
$page_info="guide";
include_once("./_head.php");
$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : '';

if($center_id=="" ||  $center_id=="01") { 
$center_id="01";
$center_txt="스포츠센터";

 } elseif($center_id=="02") {
$center_id="02";
$center_txt="문화센터";

 }


include_once(NC_CTHEME_PATH.'/guide.skin.php');


include_once("./_tail.php");
?>