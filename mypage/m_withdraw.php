<?php
include_once("./_common.php");


//$mypage='1';
if(!$is_member) {
	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
}
$n_type="mypage";
$page_info="mypage";


include_once("./_head.php");



include_once(NC_MYTHEME_PATH.'/m_withdraw.skin.php');


include_once("./_tail.php");
?>