<?php
include_once("./_common.php");


//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}
$n_type="member_join_end";
$page_info="member_join_end";


$member_id       = $_POST['member_id'];
$member_name = $_POST['member_name'];

 set_session('ss_cert_type','');
 set_session('ss_cert_no','');
 set_session('ss_cert_hash','');
 set_session('ss_cert_adult','');
 set_session('ss_cert_birth','');
 set_session('ss_cert_sex','');
 set_session('ss_cert_dupinfo','');
 set_session('child','');
 set_session('ss_cert_hash','');

include_once("./_head.php");




include_once(NC_MTHEME_PATH.'/m_join_end.skin.php');


include_once("./_tail.php");
?>