<?php
include_once('./_common.php');

header('Content-Type: application/json');



$member_id       = get_session('m_id');
$idx = $_POST['idx'];



$ip=get_real_client_ip();
$json_string =CF_Basket_Del ($idx, $member_id, $url, $ip);
$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'error'  =>'강좌삭제실패',
		'ResultMsg'  =>'강좌취소실패',
		'ResultCode'  =>'2',
    	'result'  => true);
        die(json_encode($res));		
	
	
}else{


		 $res = array(
		'Msg'  =>'강좌삭제성공.',
		'ResultMsg'  =>'강좌삭제성공',
		'ResultCode'  =>'1',
		'result'  => false);
        die(json_encode($res));

}




		
	
	
	



