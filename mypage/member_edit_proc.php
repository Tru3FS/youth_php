<?php
include_once("./_common.php");
header('Content-Type: application/json');


$member_name       = get_session('m_name');
$member_id       = get_session('m_id');
$member_code       = get_session('m_code');
$center_id       = $_SESSION["center_id"];



$sex = $_POST['member_gender'];
$birth = $_POST['member_birth'];

$birthday = str_replace('-','',$birth);
$solar_yn = $_POST['member_birth_type'];
$ip=get_real_client_ip();
$sms_yn = $_POST['member_marketing'];

if($sms_yn==""){
   $sms_yn="N";
}else{
   $sms_yn="Y";
}	
   
  	
	
	
	
	

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_New -> 회원정보 신규 저장 -> 차후에 본인인증 키값 insert 필요
//------------------------------------------------------------------------------------


$json_string = CF_Join_Update2($center_id, $member_id, $member_name, $birthday, $sex, $solar_yn, $sms_yn, $ip, $url);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == 0){
	
		$res = array(
		'Msg'  =>'회원정보가 변경되었습니다.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}else{

		 $res = array(
		'Msg'  =>'회원정보변경실패',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => false);
        die(json_encode($res));

}	
	





?>