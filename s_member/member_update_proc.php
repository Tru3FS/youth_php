<?php
include_once("./_common.php");
header('Content-Type: application/json');


$member_code       = $_POST['member_code'];


$member_id = $_POST['mem_id'];
$member_name = $_POST['mem_name'];
$member_pw = $_POST['mem_pwd'];
$cellular = $_POST['mem_phone'];
$sex = $_POST['mem_gender'];
$birth = $_POST['mem_birth'];

$solar_yn = $_POST['mem_birth_type'];

$birthday = str_replace('-','',$birth);
$ip=get_real_client_ip();
$sms_yn = $_POST['member_marketing'];

if($sms_yn==""){
   $sms_yn="N";
}else{
   $sms_yn="Y";
}	
   
  	
	
	$term_agree = $_POST['term_agree'];
	
	
                                               
$json_string2 = CF_MEMBER_ID5($_SESSION["center_id"],$member_name, $cellular, $birthday, $url);
$json_array2 = json_decode($json_string2, true); 



if($json_array2['Result']['ResultCode'] == 3){
		
		$res = array(
		'Msg'  =>'이미 가입한 정보(회원이름,연락처)가 있습니다.',
		'ResultMsg'  =>'',
		'ResultCode'  =>'10',
		'result'  => false);
        die(json_encode($res));
  }


//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_New -> 기존회원 회원정보 저장 -> 차후에 본인인증 키값 insert 필요
//------------------------------------------------------------------------------------
                                           
$json_string = CF_Join_Update3($_SESSION["center_id"],$member_code, $member_id, $member_pw, $member_name, $cellular, $birthday, $sex, $solar_yn, $sms_yn, $ip, $url, $term_agree);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == 0){
	

	
		$res = array(
		'Msg'  =>'온라인 회원가입이 완료되었습니다.',
		'member_id'  =>''.$member_id.'',
		'member_name'  =>''.$member_name.'',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}else{

		 $res = array(
		'Msg'  =>'온라인 회원가입실패',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => false);
        die(json_encode($res));

}	
	





?>