<?php
include_once("./_common.php");

// 불법접근을 막도록 토큰생성
$token = md5(uniqid(rand(), true));
set_session("ss_token", $token);
set_session('ss_cert_type','');
set_session('ss_cert_no','');
set_session('ss_cert_hash','');
set_session('ss_cert_adult','');
set_session('ss_cert_birth','');
set_session('ss_cert_sex','');
set_session('ss_cert_dupinfo','');
set_session('child','');


//$mypage='1';
if($is_member) {
	alert('이미 로그인 되었습니다.', NC_URL);
}
$n_type="member_join";
$page_info="member_join";



include_once("./_head.php");




include_once(NC_MTHEME_PATH.'/m_join.skin.php');


include_once("./_tail.php");
?>