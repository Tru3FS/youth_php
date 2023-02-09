<?php
include_once("./_common.php");
header('Content-Type: application/json');

$sales_code = $_POST["sales_code"];
$unit_price = $_POST["unit_price"];
$first_start_day_yn = $_POST["first_start_day_yn"];
$s_date = $_POST["sdate"];
$sdate = str_replace('-','',$s_date);
$monthqty=$_POST["monthqty"];
$location_code=''; //$_POST["location_code"];
$locker_no='';//$_POST["locker_no"];


$ip=get_real_client_ip();
$cx_id = '01';
if(!$is_member) {
	//die(json_encode(array('error' => '로그인 후 이용하세요.')));
	
		$data = array(
        'error'  => '로그인 후 이용하세요.',
	    'rstate' => '4'  );
		
		die(json_encode($data));
		exit;
}

$json_string = CF_Search_Sales_Code_Info2(get_session("center_id"),$sales_code, $unit_price);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] != 0){
 //echo $json_array['Result']['ResultMsg'];
	
		$data = array(
        'error'  => '접수오류.',
	    'rstate' => '11'  );
		
		die(json_encode($data));
		exit;


}else{



 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
			$len = count($val);

       
        
		if ($len == 0){
	
        	}

		//특별행사일자 필드 값이 있으면 특별행사일자로 셋팅하고, 없으면 기존대로 셋팅
		 $special_start_date = $val['Special_Start_Date'];
		 $special_end_date   = $val['Special_End_Date'];
		
		 $lecture_place=$val['Lecture_Place'];

		 if($special_start_date == '00000000' || $special_start_date == ''){
			 $start_date=$val['Start_Date'];
			 $end_date=$val['End_Date'];
		 }
		 else{
			 $start_date=$val['Special_Start_Date'];
			 $end_date=$val['Special_End_Date'];
		 }

        $sales_item_name=$val['Sales_Item_Name'];
		$event_name=$val['Event_Name'];
        $sales_place_code=$val['Sales_Place_Code'];
        $unit_price=$val['Unit_Price'];
		$sales_division=$val['Sales_Division'];
        $week_name=$val['Week_Name'];
		$event_code=$val['Event_Code'];
        

		if($first_start_day_yn=="N"){

			 // if($special_start_date == '00000000' || $special_start_date == ''){
			//	  $start_date=$sdate;
			//	  $end_date = date("Ymd",strtotime("$s_date +$monthqty months"));
			//	  $month_qty=$monthqty;
			//  }
			 //echo  $start_date;
			 //echo  $end_date;
			 $month_qty=$val['Month_Qty'];


		}else{
			$month_qty=$val['Month_Qty'];

		}



		 }


 $member_code = get_session("m_code");
 $mem_age = get_session("m_age");
 //echo ' $member_code : '. $member_code;
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Basket_Insert
// ● 설  명 : 온라인 접수 신청
//------------------------------------------------------------------------------------

$json_string = CF_Basket_Insert (get_session("center_id"), $sales_division, get_session("m_code"), $sales_code, $sales_item_name, $week_name, $month_qty, $unit_price, $start_date, $end_date, $vat_yn, get_session("m_id"), $url, $ip, '', '');



$json_array = json_decode($json_string, true); 

if($json_array['Result']['ResultCode'] == -10){
 //echo $json_array['Result']['ResultMsg'];

		$data = array(
        'error'  => '접수오류.',
	    'rstate' => '11'  );
		
		die(json_encode($data));
		exit;

	
}else if($json_array['Result']['ResultCode']== -30){
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

	
}else{
		
		$data = array(
        'error'  => '접수완료.',
	    'rstate' => '3'  );
		
		die(json_encode($data));
		exit;

}


 
 
 }

}



?>