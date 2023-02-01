<?php
include_once("./_common.php");
if(!defined('_SAMSUNG_')) exit;

//echo $_SESSION['center_id'];

//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}
$n_type="privacy";
$page_info="privacy";



include_once("./_head.php");

include_once(NC_MTHEME_PATH.'/agree.skin.php');


include_once("./_tail.php");
?>