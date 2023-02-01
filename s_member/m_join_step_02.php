<?php
include_once("./_common.php");


//$mypage='1';
// 불법접근을 막도록 토큰생성
//$token = md5(uniqid(rand(), true));
//set_session("ss_token", $token);
//set_session("ss_cert_no",   "");
//set_session("ss_cert_hash", "");
//set_session("ss_cert_type", "");

    $ss_cert_type=get_session('ss_cert_type');
    $ss_cert_no=get_session('ss_cert_no');
    $ss_cert_hash=get_session('ss_cert_hash');
    $ss_cert_adult=get_session('ss_cert_adult');
    $ss_cert_birth=get_session('ss_cert_birth');
    $ss_cert_sex=get_session('ss_cert_sex');
    $ss_cert_dupinfo=get_session('ss_cert_dupinfo');
 
    $cert_type=$_REQUEST['cert_type'];
    $mb_name=$_REQUEST['mb_name'];
    $mb_hp=$_REQUEST['mb_hp'];
    $cert_no=$_REQUEST['cert_no'];

		  $b_date1 = substr($ss_cert_birth,0,4);
		  $b_date2 = substr($ss_cert_birth,4,2);
		  $b_date3 = substr($ss_cert_birth,6,2);


$m_division=$_REQUEST['member_division'];

  $birth_date=$b_date1."-".$b_date2."-".$b_date3;
  $child=get_session('child');


$url = isset($_REQUEST['redirect_to']) ? strip_tags($_REQUEST['redirect_to']) : '';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url.'/');
    else
        goto_url(NC_URL.'/');
}
$member_code = (isset($_REQUEST["member_code"]) && $_REQUEST["member_code"]) ? $_REQUEST["member_code"] : '';


if($m_division=="") {

alert('잘못된 접근입니다.', NC_MEMBER_URL.'/m_join.php');


}


$n_type="member_join";
$page_info="member_join";

$token = md5(uniqid(rand(), true));
set_session("ss_token", $token);

include_once("./_head.php");




include_once(NC_MTHEME_PATH.'/m_join_step_02.skin.php');


include_once("./_tail.php");
?>