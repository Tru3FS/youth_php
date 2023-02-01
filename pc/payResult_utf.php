<?php
	header("Content-Type:text/html; charset=utf-8;"); 
	require('utils.php'); // 유틸리티 포함
	require '../lib/db.php';
/*
****************************************************************************************
* <인증 결과 파라미터>
****************************************************************************************
*/
global $DBName;
global $manage_gs_key;

/*mhlee*/
$authResultCode = $_POST['AuthResultCode'];		// 인증결과 : 0000(성공)
$authResultMsg  = $_POST['AuthResultMsg'];		// 인증결과 메시지
$nextAppURL     = $_POST['NextAppURL'];			// 승인 요청 URL
$txTid          = $_POST['TxTid'];				// 거래 ID
$authToken      = $_POST['AuthToken'];			// 인증 TOKEN
$payMethod      = $_POST['PayMethod'];			// 결제수단
$mid            = $_POST['MID'];				// 상점 아이디
$moid           = $_POST['Moid'];				// 상점 주문번호
$amt            = $_POST['Amt'];				// 결제 금액
$reqReserved    = $_POST['ReqReserved'];		// 상점 예약필드(짐어스에서는 매출코드로 사용)
$netCancelURL   = $_POST['NetCancelURL'];		// 망취소 요청 URL

//mhlee - 2021.04.02
//거래내역 저장을 위한 세센변수 받기
session_start();
$center_id              = $_SESSION["center_id"];
$member_code            = $_SESSION["member_code"];
$sales_code             = $_SESSION["sales_code"];
$sales_item_name        = $_SESSION["sales_item_name"];
$amount                 = $_SESSION["amount"];
$month_qty              = $_SESSION["month_qty"];
	
/*
****************************************************************************************
* <승인 결과 파라미터 정의>
* 샘플페이지에서는 승인 결과 파라미터 중 일부만 예시되어 있으며, 
* 추가적으로 사용하실 파라미터는 연동메뉴얼을 참고하세요.
****************************************************************************************
*/

$response = "";

$authResultCode = '0000';

if($authResultCode === "0000"){
	/*
	****************************************************************************************
	* <해쉬암호화> (수정하지 마세요)
	* SHA-256 해쉬암호화는 거래 위변조를 막기위한 방법입니다. 
	****************************************************************************************
	*/	
	/*mhlee*/
	$ediDate = date("YmdHis");
	$merchantKey = "EYzu8jGGMfqaDEp76gSckuvnaHHu+bC4opsSN6lHv3b2lurNYkVXrZ7Z1AoqQnXI3eLuaUFyoRNC6FkrzVjceg=="; // 상점키
	$signData = bin2hex(hash('sha256', $authToken . $mid . $amt . $ediDate . $merchantKey, true));

	try{
		/*mhlee*/
		$data = Array(
			'TID' => $txTid,
			'AuthToken' => $authToken,
			'MID' => $mid,
			'Amt' => $amt,
			'EdiDate' => $ediDate,
			'SignData' => $signData,
			'CharSet' => 'utf-8'
		);		
		$response = reqPost($data, $nextAppURL); //승인 호출
		jsonRespDump($response); //response json dump example

		$respArr = json_decode($response);
		foreach ( $respArr as $key => $value ){
			//echo "$key=". $value."<br />";
			if($key == 'ResultCode'){
				$ResultCode = $value;
			}

			if($key == 'ResultMsg'){
				$ResultMsg = $value;
			}

			if($key == 'Amt'){
				$Amt = $value;
			}

			if($key == 'MID'){
				$MID = $value;
			}

			if($key == 'Moid'){
				$Moid = $value;
			}

			if($key == 'Signature'){
				$Signature = $value;
			}

			if($key == 'TID'){
				$TID = $value;
			}

			if($key == 'AuthCode'){
				$AuthCode = $value;
			}

			if($key == 'AuthDate'){
				$AuthDate = $value;
			}

			if($key == 'PayMethod'){
				$PayMethod = $value;
			}

			if($key == 'CardName'){
				$CardName = $value;
			}

			if($key == 'CardNo'){
				$CardNo = $value;
			}

			if($key == 'CardQuota'){
				$CardQuota = $value;
			}

			if($key == 'AcquCardName'){
				$AcquCardName = $value;
			}

			if($key == 'CardCl'){
				$CardCl = $value;
			}

		}

		$trs_no = substr($moid, 3, 12);
		$sales_date			= date("Ymd");

		$db = new db();
		$db = $db->connect($DBName);

		//변수 설정//
		//0. 공통 사용//
		$member_seq			= '1'; //밑에서 체번
		$receive_amount		= $amount;
		$state				= "001";
		$remark				= '';
		$user_id			= 'WEB';
		$ip					= '127.0.0.1';
		$sales_seq			= '1'; //밑에서 체번

		$card_no			= $CardNo;
		$card_name     		= $CardName;
		$approval_no   		= $AuthCode; 
		$vat_amount			= (string)((double)$amount - ROUND((double)$amount / 1.1));
		$supply_amount      = (string)((double)$amount - (double)$vat_amount);
		

		//1. TB_Transaction_M
		$total_amount			= $amount;

		//2. TB_Transaction
		$trs_seq				= '1';
		$apply_date				= '';
		$qty					= '1';
		$unit_price				= $amount;
		$discount_code			= '00001';
		$discount_amount		= '0';
		$cash_amount			= '0';
		$card_amount			= $amount;
		$bank_amount			= '0';
		$gift_amount			= '0';
		$defer_amount			= '0';
		$unpaid_amount			= '0';
		$refund_amount			= '0';
		$linked_trs_no			= '';
		$linked_trs_seq			= '0';
		$org_start_date			= $start_date;
		$org_end_date			= $end_date;
		$locker_no				= '';
		$months					= '0';
		$transition_state		= '001';
		$trs_type				= '001';
		$package_code			= '';
		$org_sale_amount		= '1000';
		$tax_yn					= 'N';
		$vat_yn					= 'Y';
		$service_day			= '0';
		$print_desc1			= $sales_item_name;
		$print_desc2			= $start_date." - ".$end_date;
		$coupon_count			= '0';
		$coupon_use_count		= '0';
		$rent_no				= '';
		$rent_seq				= '0';
		$teacher_id				= '';
		$lesson_qty				= '0';
		$lesson_one_amount		= '0';
		$floor					= '0';
		$golfbox_no				= '0';
		$start_time				= '';
		$end_time				= '';
		$use_time				= '0';
		$bank_code				= '';
		$account_no				= '';
		$account_holder			= '';
		$start_coupon_no		= '';
		$end_coupon_no			= '';
		$auto_pay_end_date		= '';
		$auto_pay_method		= '';
		$auto_pay_date			= '0';
		$fc_manager				= '';
		$lesson_gubun			= '';

		//3. TB_Cardapproval
		$installment		= $CardQuota;
		$approval_amount	= $amount;
		$deal_type  		= 'D1';
		$process_flag		= '2';
		$purchase_code		= '49';
		$card_affiliate		= '';
		$terminal_id		= '';
		$manual_yn			= 'N';
		$cancel_yn			= 'N';
		$response_code		= '0000';
		$notice    			= $PayMethod;
		$approval_date		= substr($AuthDate, 0, 6);
		$approval_time		= substr($AuthDate, 6, 6);

		//4. TB_Payment 
		$payment_method		= '49';
		$payment_index		= '1';
		$payment_type		= '001';


		
		//****************************0. 시퀀스 번호 체번 Start **************************** //
		$sales_seq   = CF_Nextval($center_id,'CARD');
		$payment_seq = CF_Nextval($center_id,'PA');
		//****************************0. 시퀀스 번호 체번 Start **************************** //

		$db->beginTransaction();


		try{
				if ($idx != ''){
					$sql = "";
					$sql = $sql." UPDATE TB_Basket_Program ";
					$sql = $sql."    SET Approval_No     = :applNo, ";
					$sql = $sql."        State           = '002', ";
					$sql = $sql."        Card_No         = :card_no, ";
					$sql = $sql."        Tran_Date       = :tranDate, ";
					$sql = $sql."        Tran_Time       = :tranTime, ";
					$sql = $sql."        RefNo           = :refNo, ";
					$sql = $sql."        Trs_No          = :trs_no, ";
					$sql = $sql."        Approval_Amount = :amount ";
					$sql = $sql."  WHERE Center_ID   = :center_id ";
					$sql = $sql."    AND IDX        IN (:idx) ";
				}else{
					$sql = "";
					$sql = $sql." UPDATE TB_Basket ";
					$sql = $sql."    SET Approval_No     = :applNo, ";
					$sql = $sql."        State           = '002', ";
					$sql = $sql."        Card_No         = :card_no, ";
					$sql = $sql."        Tran_Date       = :tranDate, ";
					$sql = $sql."        Tran_Time       = :tranTime, ";
					$sql = $sql."        RefNo           = :refNo, ";
					$sql = $sql."        Trs_No          = :trs_no, ";
					$sql = $sql."        Approval_Amount = :amount ";
					$sql = $sql."  WHERE Center_ID   = :center_id ";
					$sql = $sql."    AND Rent_No     = :rent_no ";
				}

				$stmt = $db->prepare($sql);

				$stmt->bindParam(':applNo'   , $applNo);
				$stmt->bindParam(':card_no'  , $card_no); 
				$stmt->bindParam(':tranDate' , $tranDate); 
				$stmt->bindParam(':tranTime' , $tranTime); 
				$stmt->bindParam(':refNo'    , $refNo); 
				$stmt->bindParam(':trs_no'   , $trs_no); 
				$stmt->bindParam(':amount'   , $amount); 
				$stmt->bindParam(':center_id', $center_id); 

				if ($idx != ''){
					$stmt->bindParam(':idx'  , $idx); 
				}
				else{
					$stmt->bindParam(':rent_no'  , $rent_no); 
				}
				
				$stmt->execute();

				$db->commit();

				if($rent_no != ''){
					$db->beginTransaction();

					$sql = "";
					$sql = $sql." UPDATE TB_Basket ";
					$sql = $sql."    SET Approval_No     = :applNo, ";
					$sql = $sql."        State           = '002', ";
					$sql = $sql."        Card_No         = :card_no, ";
					$sql = $sql."        Tran_Date       = :tranDate, ";
					$sql = $sql."        Tran_Time       = :tranTime, ";
					$sql = $sql."        RefNo           = :refNo, ";
					$sql = $sql."        Trs_No          = :trs_no, ";
					$sql = $sql."        Approval_Amount = :amount ";
					$sql = $sql."  WHERE Center_ID   = :center_id ";
					$sql = $sql."    AND Rent_No     = :rent_no ";

					$stmt = $db->prepare($sql);

					$stmt->bindParam(':applNo'   , $applNo);
					$stmt->bindParam(':card_no'  , $card_no); 
					$stmt->bindParam(':tranDate' , $tranDate); 
					$stmt->bindParam(':tranTime' , $tranTime); 
					$stmt->bindParam(':refNo'    , $refNo); 
					$stmt->bindParam(':trs_no'   , $trs_no); 
					$stmt->bindParam(':amount'   , $amount); 
					$stmt->bindParam(':center_id', $center_id); 
					$stmt->bindParam(':rent_no'  , $rent_no); 
					
					$stmt->execute();

					$db->commit();
				}
			}catch(Exception $e2){
				$db->rollback();
				$db->null;
				pintLog("Exception2: ".$center_id.':'.$idx.':'.$rent_no.':'.$trs_no.':'.$approval_no.':'.$installment.':'.$card_name.':'.$card_no.':'.$approval_date.':'.$approval_time.':'.$refNo.':'.$mbrRefNo.':'.$total_amount.':'.$notice.':'.$user_id.':'.$ip.':'.$sales_seq.':'.$payment_seq.':'.$e2->getMessage(), $logPathEx);
			}

			$result_code = 'Fail';

			try{			 
				if ($idx != ''){
					if($rent_no != ''){
						$sql = "call proc_rent_payment(:center_id, :rent_no, :trs_no, :approval_no, :installment, :card_name, :card_no, :approval_date, :approval_time, :refNo, :total_amount, :notice, :user_id, :ip, :sales_seq, :payment_seq, :issueCompanyNo, :acqCompanyNo, :mbfNo, @out_result_code);";
					}
					else{
						$sql = "call proc_payment(:center_id, :idx, :trs_no, :approval_no, :installment, :card_name, :card_no, :approval_date, :approval_time, :refNo, :total_amount, :notice, :user_id, :ip, :sales_seq, :payment_seq,  :issueCompanyNo, :acqCompanyNo, :mbfNo, @out_result_code);";
					}
				}
				else{
					$sql = "call proc_rent_payment(:center_id, :rent_no, :trs_no, :approval_no, :installment, :card_name, :card_no, :approval_date, :approval_time, :refNo, :total_amount, :notice, :user_id, :ip, :sales_seq, :payment_seq, :issueCompanyNo, :acqCompanyNo, :mbfNo, @out_result_code);";
				}

				$stmt = $db->prepare($sql);

				$stmt->bindParam(':center_id'   , $center_id);

				if ($idx != ''){
					$stmt->bindParam(':idx'   , $idx);
				}
				else{
					$stmt->bindParam(':rent_no'   , $rent_no);
				}

				$stmt->bindParam(':trs_no'        , $trs_no);
				$stmt->bindParam(':approval_no'   , $approval_no);
				$stmt->bindParam(':installment'   , $installment);
				$stmt->bindParam(':card_name'     , $card_name);
				$stmt->bindParam(':card_no'       , $card_no);
				$stmt->bindParam(':approval_date' , $approval_date);
				$stmt->bindParam(':approval_time' , $approval_time);
				$stmt->bindParam(':refNo'         , $refNo);
				$stmt->bindParam(':total_amount'  , $total_amount);
				$stmt->bindParam(':notice'        , $notice);
				$stmt->bindParam(':user_id'       , $user_id);
				$stmt->bindParam(':ip'            , $ip);
				$stmt->bindParam(':sales_seq'     , $sales_seq);
				$stmt->bindParam(':payment_seq'   , $payment_seq);
				$stmt->bindParam(':issueCompanyNo', $issueCompanyNo);
				$stmt->bindParam(':acqCompanyNo'  , $acqCompanyNo);
				$stmt->bindParam(':mbfNo'         , $mbfNo);

				$stmt->execute();

				$data = $stmt->fetch(PDO::FETCH_BOTH);

				$result_code= $data['pResult_Code']; 

			}
			catch(Exception $e2){
				pintLog("Exception2: ".$center_id.':'.$idx.':'.$rent_no.':'.$trs_no.':'.$approval_no.':'.$installment.':'.$card_name.':'.$card_no.':'.$approval_date.':'.$approval_time.':'.$refNo.':'.$mbrRefNo.':'.$total_amount.':'.$notice.':'.$user_id.':'.$ip.':'.$sales_seq.':'.$payment_seq.':'.$e2->getMessage(), $logPathEx);
			}
			
			$while_count = 0;
			
			while($result_code == 'Fail' && $while_count <= 20){
				if ($idx != ''){
					if($rent_no != ''){
						$sql = "call proc_rent_payment(:center_id, :rent_no, :trs_no, :approval_no, :installment, :card_name, :card_no, :approval_date, :approval_time, :refNo, :total_amount, :notice, :user_id, :ip, :sales_seq, :payment_seq, :issueCompanyNo, :acqCompanyNo, :mbfNo, @out_result_code);";
					}
					else{
						$sql = "call proc_payment(:center_id, :idx, :trs_no, :approval_no, :installment, :card_name, :card_no, :approval_date, :approval_time, :refNo, :total_amount, :notice, :user_id, :ip, :sales_seq, :payment_seq, :issueCompanyNo, :acqCompanyNo, :mbfNo,  @out_result_code);";
					}
				}
				else{
					$sql = "call proc_rent_payment(:center_id, :rent_no, :trs_no, :approval_no, :installment, :card_name, :card_no, :approval_date, :approval_time, :refNo, :total_amount, :notice, :user_id, :ip, :sales_seq, :payment_seq, :issueCompanyNo, :acqCompanyNo, :mbfNo, @out_result_code);";
				}

				$stmt = $db->prepare($sql);

				$stmt->bindParam(':center_id'   , $center_id);

				if ($idx != ''){
					$stmt->bindParam(':idx'   , $idx);
				}
				else{
					$stmt->bindParam(':rent_no'   , $rent_no);
				}

				$stmt->bindParam(':trs_no'        , $trs_no);
				$stmt->bindParam(':approval_no'   , $approval_no);
				$stmt->bindParam(':installment'   , $installment);
				$stmt->bindParam(':card_name'     , $card_name);
				$stmt->bindParam(':card_no'       , $card_no);
				$stmt->bindParam(':approval_date' , $approval_date);
				$stmt->bindParam(':approval_time' , $approval_time);
				$stmt->bindParam(':refNo'         , $refNo);
				$stmt->bindParam(':total_amount'  , $total_amount);
				$stmt->bindParam(':notice'        , $notice);
				$stmt->bindParam(':user_id'       , $user_id);
				$stmt->bindParam(':ip'            , $ip);
				$stmt->bindParam(':sales_seq'     , $sales_seq);
				$stmt->bindParam(':payment_seq'   , $payment_seq);
				$stmt->bindParam(':issueCompanyNo', $issueCompanyNo);
				$stmt->bindParam(':acqCompanyNo'  , $acqCompanyNo);
				$stmt->bindParam(':mbfNo'         , $mbfNo);

				$stmt->execute();

				$stmt->execute();

				$data = $stmt->fetch(PDO::FETCH_BOTH);

				$result_code= $data['pResult_Code']; 
				
				$while_count = $while_count + 1;

				usleep(500000);
			}

			$commit_yn = 'Y';		
	}catch(Exception $e){
		$commit_yn = 'N';	
		$db->rollback();
		$e->getMessage();
		echo $e->getMessage();
		/*mhlee*/
		$data = Array(
			'TID' => $txTid,
			'AuthToken' => $authToken,
			'MID' => $mid,
			'Amt' => $amt,
			'EdiDate' => $ediDate,
			'SignData' => $signData,
			'NetCancel' => '1',
			'CharSet' => 'utf-8'
		);
		$response = reqPost($data, $netCancelURL); //예외 발생시 망취소 진행
//		jsonRespDump($response); //response json dump example

	}
	
}else{
	//인증 실패 하는 경우 결과코드, 메시지
	$ResultCode = $authResultCode; 	
	$ResultMsg = $authResultMsg;
}

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Nextval
//------------------------------------------------------------------------------------
function CF_Nextval($p_center_id, $p_col){
	global $DBName;
	
	$sql = "";
	$sql = $sql."SELECT CURRVAL AS LD_SEQ ";
	$sql = $sql."  FROM TB_SEQUENCE ";
	$sql = $sql." WHERE Center_ID = :p_center_id ";
	$sql = $sql."   AND Name      = :p_col for update ";
	
	try{
		$db = new db();
		$db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':p_center_id' , $p_center_id);
		$stmt->bindParam(':p_col' ,       $p_col);
		$stmt->execute();
		$LD_SEQ = $stmt->fetch();		
		
		//해당 자료가 있으면 업데이트 후 +1 된 값 리턴
		if ($LD_SEQ[0] > 0)
		{
			//------------
			//업데이트
			//------------
			$LD_SEQ[0] += 1 ;
			
			$sql = "";
			$sql = $sql."UPDATE TB_SEQUENCE ";
			$sql = $sql."   SET Currval = :LD_SEQ ";
			$sql = $sql." WHERE Center_ID = :p_center_id ";
			$sql = $sql."   AND Name      = :p_col ";

			try{

				$stmt = $db->prepare($sql);
				$db->beginTransaction();
				$stmt->bindParam(':p_center_id' , $p_center_id);
				$stmt->bindParam(':p_col' ,       $p_col);
				$stmt->bindParam(':LD_SEQ' ,      $LD_SEQ[0]);
				$stmt->execute();
				$db->commit(); 
				$db = null;
				
				return $LD_SEQ[0];

			}catch(Exception $e){
				$db->rollback();
				//echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
			}
		} 
		else {
			//------------
			//없으면 신규로 Insert
			//------------
			$sql = "";
			$sql = $sql."INSERT INTO TB_SEQUENCE (Center_ID,    Name,   Currval) ";
			$sql = $sql."                 VALUES (:p_center_id, :p_col, 1) ";

			try{

				$stmt = $db->prepare($sql);
				$db->beginTransaction();
				$stmt->bindParam(':p_center_id' , $p_center_id);
				$stmt->bindParam(':p_col' ,       $p_col);
				$stmt->execute();
				$db->commit(); 
				$db = null;

				return "1";

			}catch(Exception $e){
				$db->rollback();
				//echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
			}
		}
		
	}catch(Exception $e){
		echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
		
	}
}

// API CALL foreach 예시
function jsonRespDump($resp){
	$respArr = json_decode($resp);
	foreach ( $respArr as $key => $value ){
		echo "$key=". $value."<br />";
	}
}

//Post api call
function reqPost(Array $data, $url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);					//connection timeout 15 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));	//POST data
	curl_setopt($ch, CURLOPT_POST, true);
	$response = curl_exec($ch);
	curl_close($ch);	 
	return $response;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>상점 도착페이지</title>
</head>
<body>
<script>
/* 결제 완료 페이지 호출 */
var commit_yn = "<?=$commit_yn?>";

if (commit_yn == "Y")
{
	window.location.href = "nice_complete.php";
}
else
{
	window.location.href = "nice_close.php";
}
/* 결제처리 성공 유무에 따른 화면 전환 */
</script> 
</body>
</html>