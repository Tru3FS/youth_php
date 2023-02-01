<?php
include_once('./_common.php');

header('Content-Type: application/json');


$member_id      = $_POST['mem_id'];
$member_name       = $_POST['mem_name'];
$cellular = $_POST['mem_phone'];


//------------------------------------------------------------------------------------
// ● 함수명 : CF_FInd_PW 비밀번호찾기
//CF_FInd_PW($cellular, $member_name, $member_id, $init_password, $url)
//------------------------------------------------------------------------------------

$ip=get_real_client_ip();
$json_string = CF_MEMBER_ID4($_SESSION['center_id'],$member_id,$member_name, $cellular, $url);
$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'회원정보체크실패',
		'ResultMsg'  =>'일치하는 회원정보가 없습니다.',
		'ResultCode'  =>'-30',
		'ReMsg'  =>'회원정보없음',			
		'result'  => false);
        die(json_encode($res));		
	
	
}else{
 $new_pw = substr(mt_rand(),1,10);
 $init_password = hash("sha256",$new_pw);

$json_string = CF_FInd_PW($_SESSION['center_id'],$cellular, $member_name, $member_id, $new_pw, $url);

$json_array = json_decode($json_string, true); 

if($json_array2['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'회원비밀번호찾기실패.',
		'ResultMsg'  =>'회원비밀번호찾기실패',
		'ResultCode'  =>'-10',
		'result'  => false);
		
		die(json_encode($res));

}else{
		//CF_PW_Init_SMS_Send($_SESSION['center_id'],$member_id, $new_pw, $url);



		$res = array(
		'Msg'  =>'회원비밀번호찾기성공',
		'ResultMsg'  =>'회원비밀번호찾기성공.',
		'ResultCode'  =>'1',
		'New_Pw'  =>''.$new_pw.'',
		'ReMsg'  =>'회원정보체크성공',		
   		'result'  => true);
        die(json_encode($res));	
			
	
		



}
	
	}	



