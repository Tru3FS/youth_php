<?php
include_once('./_common.php');

header('Content-Type: application/json');



$member_id       = get_session('m_id');
$member_name       = get_session('m_name');

$cellular = $_POST['data'];



$ip=get_real_client_ip();
$json_string = CF_MEMBER_ID3($member_id, $cellular, $url);
$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -30){
	
		$res = array(
		'Msg'  =>'회원정보체크실패',
		'ResultMsg'  =>'.',
		'ResultCode'  =>'-30',
		'ReMsg'  =>'회원정보없음',			
		'result'  => false);
        die(json_encode($res));		
	
	
}else{

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_Phone_Update
//------------------------------------------------------------------------------------

$json_string =CF_Join_Phone_Update($member_id, $cellular, $ip, $url);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -40){
	
		$res = array(
		'Msg'  =>'중복전화번호.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>'중복된 전화번호입니다.',
		'result'  => true);
		
		die(json_encode($res));

}elseif($json_array['Result']['ResultCode'] == -30){
	
		$res = array(
		'Msg'  =>'본인전화번호',
		'ResultMsg'  =>'변경할 전화번호를 입력하세요.',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}elseif($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'전화번호수정실패.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}else{
	

		 $res = array(
		'Msg'  =>'전화번호변경완료.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => false);
        die(json_encode($res));

}




}
		 

		
	
	
	



