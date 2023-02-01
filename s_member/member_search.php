<?php
include_once("./_common.php");


//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}
$n_type="member_search";
$page_info="member_search";



include_once("./_head.php");




include_once(NC_MTHEME_PATH.'/member_search.skin.php');


include_once("./_tail.php");
?>