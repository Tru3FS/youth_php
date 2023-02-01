<?php
include_once("./_common.php");


$c_id = $_POST["center_id"];
$trs_no = $_POST["trs_no"];
$trs_seq = $_POST["trs_seq"];
$page = $_POST["page"];
$ip = get_real_client_ip();

if(!$is_member) {
	//die(json_encode(array('error' => '로그인 후 이용하세요.')));
	
		$data = array(
        'error'  => '로그인 후 이용하세요.',
	    'rstate' => '4'  );
		
		die(json_encode($data));
		exit;
}



$sqld = " UPDATE TB_Basket_Program 
             SET State = '002',
			     Upd_Date = Now(),
				 Upd_ID = 'WEB',
				 Upd_Ip = '$ip'
		   WHERE Center_ID = '$c_id' 
	         and Trs_No    = '$trs_no' 
		     and Trs_Seq   = '$trs_seq' ;";

mysqli_autocommit($connect_db, FALSE);

sql_query($sqld);

mysqli_commit($connect_db);

$sqld = " UPDATE TB_Refund_Request_Program 
             SET State = '003',
			     Upd_Date = Now(),
				 Upd_ID = 'WEB',
				 Upd_Ip = '$ip'
		   WHERE Center_ID = '$c_id' 
	         and Trs_No    = '$trs_no' 
		     and Trs_Seq   = '$trs_seq' ;";

mysqli_autocommit($connect_db, FALSE);

sql_query($sqld);

mysqli_commit($connect_db);



        $data = array(
        'error'  => '환불신청취소가 완료되었습니다.',
	    'rstate' => '5'  );
		
		die(json_encode($data));
		exit;


?>