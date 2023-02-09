<?php
include_once('./_common.php');

header('Content-Type: application/json');



$member_id       = get_session('m_id');
$idx = $_POST['idx'];
$center_id       = $_POST["center_id"];
$sales_code = $_POST["sales_code"];
$member_code       = get_session('m_code');


$ip=get_real_client_ip();
$json_string =CF_Member_Basket_Card_Check($center_id, $member_code, $member_id,$sales_code,$idx, $url, $ip);


$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'error'  =>'장바구니상태조회실패',
		'ResultMsg'  =>'장바구니상태조회실패',
		'ResultCode'  =>'2',
    	'result'  => true);
        die(json_encode($res));		
	
	
}else{



 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
        	}
		
		 $state=$val['State'];
       


		 }



if($state=="001") {

 } elseif($state=="002" ) {
$Msg="결제완료";
$Msg2="이미 결제가 완료된 강좌입니다.";
 }elseif($state=="003" ) {
$Msg="신청취소";
$Msg2="취소된 강좌입니다.";
 }elseif($state=="004" ) {
$Msg="기간경과취소";
$Msg2="결제대기시간 경과로 수강신청이 자동취소 되었습니다. 재신청 하시기바랍니다.";
 }elseif($state=="005" ) {
$Msg="환불신청";
$Msg2="환불신청된 강좌입니다.";
 }elseif($state=="006" ) {
$Msg="환불완료";
$Msg2="환불완료된 강좌입니다.";
 }elseif($state=="009" ) {
$Msg="당일결제취소";
$Msg2="당일결제취소된 강좌입니다.";
 }


		 $res = array(
		'Msg'  =>''.$Msg.'',
		'ResultMsg'  =>''.$Msg2.'',
		'ResultCode'  =>''.$state.'',
        'ResultState'  =>''.$state.'',
		'result'  => false);
        die(json_encode($res));



 }


}



	
	
	



