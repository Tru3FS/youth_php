<?php
//	header('Content-Type: text/html; charset=utf-8');		
	require('utils.php'); // 유틸리티 포함
	include_once("../lib/db.php");
	include_once("../lib/common_function.php");
	//$logPath = "c://app.log";     //디버그 로그위치 (windows)
	$logPath = "../pay_log/app_".date("Ymd").".log";                 //디버그 로그위치 (리눅스)
	$logPathEx = "../pay_log/exception_".date("Ymd").".log";         //디버그 로그위치 (리눅스)

    /********************************************************************************	
	 * 인증이 완료될 경우 PG사에서 호출하는 페이지 입니다. 	     
	 * PG로 부터 전달 받은 인증값을 받아 PG로 승인요청을 합니다.	
	 ********************************************************************************/
     
	//테스트 위해 주석처리
	$aid = $_REQUEST["aid"];
	$authToken = $_REQUEST["authToken"];
	$merchantData = $_REQUEST["merchantData"];
	$payType = $_REQUEST["payType"];
	$receiveParam = "## 인증결과수신 ## aid:".$aid.", authToken:".$authToken; 
	pintLog("RECEIVE-PARAM: ".$receiveParam, $logPath);
	//echo $receiveParam; // 실운영시 제거
	
	//_1_start 에서 저장한 session 값 조회
	session_start();
	$parameters = $_SESSION['readyParameters'];
	$apiKey = $_SESSION['apiKey'];
	$amount = $_SESSION['amount']; //위변조 방지를 위해 DB등에서 가져온 값을 세팅합니다.
	$API_BASE = $_SESSION['API_BASE'];

	$center_id       = $_SESSION["center_id"];	
	$member_code     = $_SESSION["member_code"];	
	$member_name     = $_SESSION["m_name"];	
	$rent_no         = $_SESSION["rent_no"];
	$idx             = $_SESSION['idx'];
	$ptype           = $_SESSION['ptype'];
	$rt_url          = $_SESSION['return_url'];

	$center_id = '01';
	
	pintLog("center_id-PARAM: ".$center_id, $logPath);
	pintLog("member_code-PARAM: ".$member_code, $logPath);
	pintLog("member_name-PARAM: ".$member_name, $logPath);
	pintLog("rent_no-PARAM: ".$rent_no, $logPath);
	pintLog("idx-PARAM: ".$idx, $logPath);
	pintLog("PC-PARAM: ".'PC', $logPath);
	pintLog("Browser-PARAM: ".$_SERVER["HTTP_USER_AGENT"], $logPath);

	$mbrNo = $parameters["mbrNo"];													
	$mbrRefNo = $parameters["mbrRefNo"];	
	//$mbrNo = $_COOKIE["mbrNo"];													
	//$mbrRefNo = $_COOKIE["mbrRefNo"];	
	
	// timestamp max 20byte
	$timestamp = makeTimestamp();
	// signature 64byte
	$signature = makeSignature($mbrNo,$mbrRefNo,$amount,$apiKey,$timestamp); 
	
	$parameters["aid"] = $aid;
	$parameters["authToken"] = $authToken;
	$parameters["amount"] = $amount;
	$parameters["payType"] = $payType;
	$parameters["timestamp"] = $timestamp;
	$parameters["signature"] = $signature;

    //====================================================
	// 승인요청 API 호출         	
	//=====================================================
	
	$PAY_API_URL = $API_BASE."/v1/payment/pay";
	$result = "";
	$errorMessage = "";
	
	try{
		pintLog("PAY-API: ".$PAY_API_URL, $logPath);
		pintLog("PARAM: ".print_r($parameters, TRUE), $logPath);
		$result = httpPost($PAY_API_URL, $parameters);
	} catch(Exception $e) {
		$errorMessage = "승인요청API 호출실패: " . $e;
		pintLog($errorMessage, $logPath);
		
		//=====================================================
		// 망취소 처리(승인API 호출 도중 응답수신에 실패한 경우) 
		//=====================================================
     	$NET_CANCEL_URL = $API_BASE."/v1/payment/net-cancel"; 
     	$result = httpPost($NET_CANCEL_URL, $parameters);			
		return;			
	}
	//echo("<br>## 승인요청API 호출 결과 ##<br>" .$result);
	//pintLog("RESPONSE: ".$result, $logPath);
	
	
	
	$obj = json_decode($result);				
	$resultCode = $obj->{'resultCode'};
	$resultMessage = $obj->{'resultMessage'};
	$data = $obj->{'data'};
	//테스트 위해 주석처리
/*
	$center_id       = '01';
	$member_code     = '';	
	$member_name     = '홍길동';
	$rent_no         = '';
	$idx             = '22';
	$ptype           = 'L';
*/
	/* 추가 항목은 연동매뉴얼 참조*/
	//PG사에 거래번호 넘기기위해 먼저 채번...
	$length = 4;
	$char = 0;
	$type = 'd';
	$format = "%{$char}{$length}{$type}";

	$sales_date			= date("Ymd");
	$trs_no = CF_Nextval($center_id,'T'.$sales_date);//Center_id
	$trs_no = $sales_date.sprintf($format, $trs_no);

	$refNo = "";      // 거래번호
	$tranDate = "";	  // 거래일자
	$mbrRefNo = "";   // 주문번호
	$applNo = "";     // 승인번호
	$payType = "";    // 인증타입
	
	/*********************************************************************************
	* 승인결과 처리 (결과에 따라 상점 DB처리 및 화면 전환 처리)
	*********************************************************************************/

	if($resultCode != "200"){		
		/*호출실패*/
		$errorMessage = "<br>## 승인요청API 호출 결과 ##<br>resultCode = ".$resultCode.", resultMessage = ".$resultMessage;
		pintLog($errorMessage, $logPath);
		echo $errorMessage; // 실운영시 제거
		return;
	} else {
		///승인요청API 호출 성공	
		$refNo = $data->{'refNo'};
		$tranDate = $data->{'tranDate'};
		$tranTime = $data->{'tranTime'};
		$mbrRefNo = $data->{'mbrRefNo'};
		$applNo = $data->{'applNo'};
		$payType = $data->{'payType'};
		$issueCardName = $data->{'issueCardName'};
		$purchaseName = $data->{'acqCompanyName'};
		$cardNo = $data->{'cardNo'};
		$customerName = $data->{'customerName'};
		$customerEmail = $data->{'customerEmail'};
		$issueCompanyNo = $data->{'issueCompanyNo'};
		$acqCompanyNo = $data->{'acqCompanyNo'};
		$mbrNo = $data->{'mbrNo'};
		$installment = $data->{'installment'};
	
/*
		$refNo = 'dgsdttexdreerre';
		$tranDate = '220628';
		$tranTime = '180000';
		$mbrRefNo = '111222';
		$applNo = '32317721';
		$payType = 'CARD';
		$issueCardName = '국민';
		$purchaseName = '49';
		$cardNo = '123456**********';
		$customerName = '누구';
		$customerEmail = '';
		$issueCompanyNo = '01';
		$acqCompanyNo = '02';
		$mbrNo = '111111';
		$installment = 0;
*/
		/*== 가맹점 DB 주문처리 ==*/

		try{
			
			//****************************0. 시퀀스 번호 체번 Start **************************** //
			$sales_seq   = CF_Nextval($center_id,'CARD'.$sales_date);
			$payment_seq = CF_Nextval($center_id,'PA'.$sales_date);
			//****************************0. 시퀀스 번호 체번 Start **************************** //

			$db = new db();
			$db = $db->connect($DBName);
			
			//변수 설정//
			//0. 공통 사용//
			$member_seq			= '1'; //밑에서 체번
			$state				= "001";
			$remark				= '';
			$user_id			= 'WEB';
			$ip					= '127.0.0.1'; //get_real_client_ip();
			$card_no			= $cardNo;
			$card_name     		= $issueCardName;
			$approval_no   		= $applNo; 
			$installment        = sprintf("%02d", $installment);

			//1. TB_Transaction_M
			$total_amount			= $amount;

			//2. TB_Transaction
			$discount_code			= '00001';
			$discount_amount		= '0';
			$cash_amount			= '0';
			$bank_amount			= '0';
			$gift_amount			= '0';
			$defer_amount			= '0';
			$unpaid_amount			= '0';
			$refund_amount			= '0';
			$linked_trs_no			= '';
			$linked_trs_seq			= '0';
			$print_desc1			= '';
			$print_desc2			= '';
			$teacher_id				= '';

			//3. TB_Cardapproval
			$approval_amount	= '0';
			$deal_type  		= 'D1';
			$process_flag		= '2';
			$purchase_code		= '49';
			$card_affiliate		= '';
			$terminal_id		= '';
			$manual_yn			= 'N';
			$cancel_yn			= 'N';
			$response_code		= '0000';
			$notice    			= $payType;
			$approval_date		= substr($tranDate, 0, 8);
			$approval_time		= $tranTime;

			//4. TB_Payment 
			$payment_method		= '49';
			$payment_index		= '1';
			$payment_type		= '001';


			//========================================================================================//
			//insert 오류를 대비해 장바구니 테이블에 승인정보 담아두기
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

		}
		catch(Exception $e){
			pintLog("Exception2: ".$center_id.':'.$idx.':'.$rent_no.':'.$trs_no.':'.$approval_no.':'.$installment.':'.$card_name.':'.$card_no.':'.$approval_date.':'.$approval_time.':'.$refNo.':'.$mbrRefNo.':'.$total_amount.':'.$notice.':'.$user_id.':'.$ip.':'.$sales_seq.':'.$payment_seq.':'.$e2->getMessage(), $logPathEx);
			//$db->rollback();
			$db = null; 
			$commit_yn = 'N';
			//취소취소
			echo '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
		}
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
var resultCode = "<?=$resultCode ?>";
var resultMessage = "<?=$resultMessage ?>";
var amount = "<?=$amount ?>";
var refNo = "<?=$refNo ?>";
var customerName = "<?=$customerName ?>";
var customerEmail = "<?=$customerEmail ?>";

//alert("resultCode = " + resultCode + ", resultMessage = " + resultMessage);
//alert(amount);
//alert(refNo);
//alert(customerName);
//alert(customerEmail);

/* 현재 팝업 닫기*/
//Mainpay.close(true);
<?php if ($commit_yn == "Y"){
	?>



<!--

<?php if($ptype == "L"){
	?>

window.location.href="<?php echo $rt_url; ?>/lindex.php?status=002";

<?php } else { ?>

window.location.href="<?php echo $rt_url; ?>/lindex.php?status=002";

<?php }?>

//-->

	

<?php
}else{
?>	

	location.href = "_9_cancel.php";

<?php }?>
</script> 
<form name="frm" method="post">
<input type="hidden" name="member_code" value="<?=$member_code ?>">
<input type="hidden" name="refNo" value="<?=$refNo ?>">
<input type="hidden" name="customerName" value="<?=$customerName ?>">
<input type="hidden" name="customerEmail" value="<?=$customerEmail ?>">
<input type="hidden" name="tranDate" value="<?=$approval_date ?>">
<input type="hidden" name="trsNo" value="<?=$trs_no ?>">
<input type="hidden" name="center_id" value="<?=$center_id ?>">
<input type="hidden" name="rentNo" value="<?=$rent_no ?>">
<input type="hidden" name="amount" value="<?=$amount ?>">
</form>
</body>
</html>
