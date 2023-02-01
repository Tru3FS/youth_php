<?php
include_once("./_common.php");


$c_id = $_POST["center_id"];
$trs_no = $_POST["trs_no"];
$trs_seq = $_POST["trs_seq"];
$page = $_POST["page"];
$ip = get_real_client_ip();


$re_name=$_POST["re_name"];
$re_bank=$_POST["re_bank"];
$re_bank_name=$_POST["re_bank_name"];
$re_bank_num=$_POST["re_bank_num"];
$re_reason=$_POST["re_reason"];


if(!$is_member) {
	//die(json_encode(array('error' => '로그인 후 이용하세요.')));
	
		$data = array(
        'error'  => '로그인 후 이용하세요.',
	    'rstate' => '4'  );
		
		die(json_encode($data));
		exit;
}



$sqld = "SELECT COUNT(*) as cnt
           FROM tb_refund_request_program
		  where Center_ID = '$c_id' 
		    and Trs_No    = '$trs_no' 
			and Trs_Seq   = '$trs_seq' 
			and State     = '005' ;";

$result= sql_fetch($sqld);

$cnt = $result['cnt'];

if($cnt > 0){

		$data = array(
        'error'  => '이미 환불신청한 강좌입니다.',
	    'rstate' => '3'  );
		
		die(json_encode($data));
		exit;



}

$sqld = "SELECT COUNT(*) as cnt
           FROM tb_refund_request_program
		  where Center_ID = '$c_id' 
		    and Trs_No    = '$trs_no' 
			and Trs_Seq   = '$trs_seq' 
			and State     = '006' ;";

$result= sql_fetch($sqld);

$cnt = $result['cnt'];

if($cnt > 0){

        $data = array(
        'error'  => '이미 환불 처리된 강좌입니다.',
	    'rstate' => '2'  );
		
		die(json_encode($data));
		exit;


}


$cnt = 0;

$sqld = "SELECT COUNT(*) as cnt
           FROM TB_Basket_Program
		  where Center_ID = '$c_id' 
		    and Trs_No    = '$trs_no' 
			and Trs_Seq   = '$trs_seq' ;";

$result= sql_fetch($sqld);

$cnt = $result['cnt'];

$sqld = "";

if($cnt == 0){
$sqld = "INSERT INTO TB_Basket_Program(Center_ID, Sales_Date, Sales_Division, Member_Code, Sales_Code, Sales_Item_Name, Week_Name, Qty, Month_Qty, Unit_Price, Discount_Code, Discount_Amount, 
                                       Receive_Amount, Start_Date, End_Date, Locker_No, Vat_Yn, Ins_Date, Ins_ID, Ins_IP, State, Online_Gubun, Trs_No, Trs_Seq)
							    SELECT a.Center_ID, a.Sales_Date, a.Sales_Division, a.Member_Code, a.Sales_Code, b.Sales_Item_Name, f_week_name(b.Use_Week), a.Qty, a.Month_Qty, a.Unit_Price, a.Discount_Code, a.Discount_Amount,
								       a.Receive_Amount, a.Start_Date, a.End_Date, a.Locker_No, a.Vat_Yn, Now(), 'WEB', '$ip', '005', 'Online', '$trs_no', '$trs_seq'
								  FROM TB_Transaction a INNER JOIN
								       TB_Saleitem    b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code
								 WHERE a.Center_ID = '$c_id'
								   AND a.Trs_No    = '$trs_no'
								   AND a.Trs_Seq   = '$trs_seq'; ";
}
else{
	$sqld = " UPDATE TB_Basket_Program 
	             SET State = '005',
				     Upd_Date = Now(),
					 Upd_ID = 'WEB',
					 Upd_Ip = '$ip'
			   WHERE Center_ID = '$c_id' 
		         and Trs_No    = '$trs_no' 
			     and Trs_Seq   = '$trs_seq' ;";
}

mysqli_autocommit($connect_db, FALSE);

sql_query($sqld);

mysqli_commit($connect_db);

$sqld = " INSERT INTO tb_refund_request_program (Center_ID, Request_Date, Trs_No, Trs_Seq, Sales_Date, Sales_Division, Cellular, Member_Code, Member_Name, Member_Seq, 
                                                       Sales_Code, Sales_Item_Name, Qty, Month_Qty, Unit_Price, Discount_Code, Discount_Amount, Receive_Amount, Start_Date, End_Date, Locker_No, 
													   Request_Reason, Bank_Code, Bank_Name, Account_No, Account_Holder, Ins_Date, Ins_ID, Ins_IP, State, Relation_Gubun )
					                            SELECT a.Center_ID, DATE_FORMAT(Now(), '%Y%m%d'), a.Trs_No, a.Trs_Seq, a.Sales_Date, a.Sales_Division, b.Cellular, a.Member_Code, b.Member_Name, a.Member_Seq,
												       a.Sales_Code, c.Sales_Item_Name, a.Qty, a.Month_Qty, a.Unit_Price, a.Discount_Code, a.Discount_Amount, a.Receive_Amount, a.Start_Date, a.End_Date, a.Locker_No,
													   '$re_reason', '$re_bank', '$re_bank_name', petra.pls_encrypt_b64('$re_bank_num', 100), '$re_name', Now(), 'WEB', '$ip', '005', '$re_rela'
												  FROM TB_Transaction a INNER JOIN
												       TB_Member      b ON a.Member_Code = b.Member_Code INNER JOIN
													   TB_Saleitem    c ON a.Center_ID = c.Center_ID AND a.Sales_Code = c.Sales_Code
												 WHERE a.Center_ID = '$c_id'
								                   AND a.Trs_No    = '$trs_no'
								                   AND a.Trs_Seq   = '$trs_seq'; ";

mysqli_autocommit($connect_db, FALSE);

sql_query($sqld);

mysqli_commit($connect_db);



        $data = array(
        'error'  => '환불요청이 완료되었습니다.',
	    'rstate' => '5'  );
		
		die(json_encode($data));
		exit;


?>