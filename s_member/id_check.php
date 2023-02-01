<?php
include_once("./_common.php");
header('Content-Type: application/json');
$member_id = $_POST["data"];




// ● 함수명 : CF_Dup_ID_Check -> 아이디 중복 체크

$json_string = CF_Dup_ID_Check($_SESSION['center_id'],''.$member_id.'', $url);

$json_array = json_decode($json_string, true); 

//echo $json_array['Result']['ResultCode'];


if($json_array['Result']['ResultCode'] == -10){
		 //echo $json_array['Result']['ResultMsg'];
		 
		 $res = array(
		'Msg'  =>'아이디중복체크실패',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));
				
		//return;
}elseif($json_array['Result']['ResultCode'] == -30){

         $res = array(
		'Msg'  =>'중복된 아이디입니다!!',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'result'  => true);
		
		die(json_encode($res));

}elseif($json_array['Result']['ResultCode'] == 0){
	
	     $res = array(
		'Msg'  =>'중복없음', 
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'result'  => false);
		
		
		die(json_encode($res));
}	




?>