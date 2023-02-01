<?php
include_once("./_common.php");
header('Content-Type: application/json');

$sales_code = $_POST["sales_code"];
$unit_price = $_POST["unit_price"];
$first_start_day_yn = $_POST["first_start_day_yn"];
$s_date = $_POST["start_date"];
$e_date = $_POST["end_date"];
$month_qty=$_POST["monthqty"];


$ip=get_real_client_ip();
$cx_id = $_POST["center_id"];



if(!$is_member) {
	//die(json_encode(array('error' => '로그인 후 이용하세요.')));
	
		$data = array(
        'error'  => '로그인 후 이용하세요....',
	    'rstate' => '4'  );
		
		die(json_encode($data));
		exit;
}

$json_string = CF_Search_Sales_Code_Info2( $cx_id,$sales_code, $unit_price);

$json_array = json_decode($json_string, true); 




if($json_array['Result']['ResultCode'] != 0){
 //echo $json_array['Result']['ResultMsg'];
	
		$data = array(
        'error'  => '접수오류..',
	    'rstate' => '11'  );
		
		die(json_encode($data));
		exit;


}else{



 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
        	}
		
		 $lecture_place=$val['Lecture_Place'];

        $sales_item_name=$val['Sales_Item_Name'];
		$event_name=$val['Event_Name'];
        $sales_place_code=$val['Sales_Place_Code'];
        $unit_Price=$val['Unit_Price'];
		$sales_division=$val['Sales_Division'];
        $week_name=$val['Week_Name'];
        


		 }


 
 
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Basket_Insert
// ● 설  명 : 온라인 접수 신청
//------------------------------------------------------------------------------------



$json_string = CF_Basket_Insert ($cx_id, $sales_division, get_session("m_code"), $sales_code, $sales_item_name, $week_name, $month_qty, $unit_price, $s_date, $e_date, $vat_yn, get_session("m_id"), $url, $ip,$child_counsel_yn, $event_code);



$json_array = json_decode($json_string, true); 

if($json_array['Result']['ResultCode']== -30){
 //echo $json_array['Result']['ResultMsg'];

		$data = array(
        'error'  => '이미 신청한 강좌입니다.',
	    'rstate' => '30'  );
		
		die(json_encode($data));
		exit;

	
}else if($json_array['Result']['ResultCode']== -40){
 //echo $json_array['Result']['ResultMsg'];

		$data = array(
        'error'  => '이미 결제한 강좌이거나 수강중입니다.',
	    'rstate' => '40'  );
		
		die(json_encode($data));
		exit;

	
}else if($json_array['Result']['ResultCode']== -50){
 //echo $json_array['Result']['ResultMsg'];

		$data = array(
        'error'  => '해당 강좌는 마감되었습니다.',
	    'rstate' => '50'  );
		
		die(json_encode($data));
		exit;

	
}else if($json_array['Result']['ResultCode']== -60){
 //echo $json_array['Result']['ResultMsg'];

		$data = array(
        'error'  => '해당월 강좌 할인 수량을 초과하였습니다!!',
	    'rstate' => '60'  );
		
		die(json_encode($data));
		exit;

	
}else if($json_array['Result']['ResultCode'] == -10){
 //echo $json_array['Result']['ResultMsg'];

		$data = array(
			'item'  => ''.$sales_item_name.'',
        'error'  => '접수오류...',
	    'rstate' => '11'  );
		
		die(json_encode($data));
		exit;

	
}else{
		
		$data = array(
        'error'  => '접수완료.',
        'idx'  => ''.$json_array['Result']['IDX'].'',
	    'rstate' => '3'  );
		
		die(json_encode($data));
		exit;

}


 
 
 }

}



?>