<?php
header("Content-Type:text/html; charset=utf-8;"); 
include_once("./_common.php");

global $DBName;
global $manage_gs_key;

$tid       = $_POST['refNo'];
$amount    = $_POST['amount'];
$reason    = '거래취소';
$orderId   = $_POST['trs_no'];
$center_id=$_REQUEST["center_id"];
$refNo=$_REQUEST["refNo"]; //거래번호
//$shopTransactionId=$_REQUEST["tranDate"]; //거래일시
$tranDate=$_REQUEST["tranDate"]; //거래일시

$m_id=$_REQUEST["m_id"]; //회원아이디 세션값
$m_name=$_REQUEST["customerName"]; //회원아이디 세션값
$m_code=$_REQUEST["member_code"]; //회원아이디 세션값
$m_age=$_REQUEST["m_age"]; //회원아이디 세션값

set_session('m_id', $m_id);
set_session('m_name', $m_name);
set_session('m_code', $m_code);
set_session('m_age', $m_age);



$_SESSION['m_id']=$m_id;
$_SESSION['m_name']=$m_name;
$_SESSION['m_code']=$m_code;


require('utils.php'); // 유틸리티 포함
include_once('../lib/db.'.$center_id.'.php');
include_once("../lib/common_function_.php");

$logPath = "../pay_log/app_".date("Ymd").".log";

$sql = "";
$sql = $sql."SELECT PG_Merchant_Number, PG_Api_Key ";
$sql = $sql."  FROM TB_SystemSetting ";
$sql = $sql." WHERE Center_ID = '$center_id' ";

try{
	global $DBName;

	$db = new db();
	$db = $db->connect($DBName);

	$stmt = $db->prepare($sql);
	$stmt->bindParam(':center_id' , $center_id);
	$stmt->execute();
	$data = $stmt->fetch();

	$mid                 = $data[0];
	$merchantKey         = $data[1];

}catch(Exception $e){
	echo $e;
	return;
}


?>

<?php



$ls_url = "https://pgapi.easypay.co.kr/api/trades/revise";


$cancelReqDate=date("Ymd");
$shopTransactionId=date("YmdHis");



$clientIp=get_real_client_ip();
$clientId=$m_id;
$reviseTypeCode='40';

$msqAuth=$refNo.'|'.$shopTransactionId;
$msqAuth2=$refNo.'|'.$amount.'|'.$tranDate;


//$msqAuth=$tid.'|'.$shopTransactionId;
//$msqAuth="23021103230010166889|50000|20230211032336";



$secret_key = $merchantKey;

//$secret_key = "easypay!KICCTEST"; // 암복호화키
$msgAuthValue = hash_hmac( 'sha256', $msqAuth, $secret_key, false); // hash값을 HexString 으로 변환하세요.




try {
	$res = requestPost(
		$ls_url,
		json_encode(array("mallId" => $mid,"shopTransactionId" => $shopTransactionId,"shopOrderNo" => $orderId,"pgCno" => $refNo,"reviseTypeCode" => $reviseTypeCode,"clientIp" => $clientIp,"clientId" => $clientId,"msgAuthValue" => $msgAuthValue, "cancelReqDate" => $cancelReqDate))
	);
	$resObject = json_decode($res, true);
} catch (Exception $e) {
	$e->getMessage();
}

//CURL: Basic auth, json, post
function requestPost($url, $json)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);

	curl_close($ch);

	return $response;
}




	$inner_resObject = '';



	pintLog('PC -> '.$center_id.' : '.$idx.' : '.serialize($resObject), $logPath);


    //echo serialize($resObject);


	foreach ($resObject as $key => $value){
		//echo $key . '=' . $value . '<br />';

		if($key == 'resCd'){
			$resultCode = $value;
		}

		if($key == 'resMsg'){
			$resultMsg = $value;
		}
	}


$trs_no = $orderId;

	if($resultCode == '0000'){
		try{
			$db = new db();
			$db = $db->connect($DBName);

			$sales_date	 = date("Ymd");
			$sales_seq   = CF_Nextval($center_id,'CARD'.$sales_date);

			$db->beginTransaction();

			$sql = "";
			$sql = $sql." UPDATE TB_Basket ";
			$sql = $sql."    SET State       = '009', ";
			$sql = $sql."        Upd_Date    = Now(), ";
			$sql = $sql."        Upd_ID      = 'WEB' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";

			$stmt = $db->prepare($sql);            
			$stmt->execute();

			$sql = "";
			$sql = $sql." UPDATE TB_Basket_Program ";
			$sql = $sql."    SET State       = '009', ";
			$sql = $sql."        Upd_Date    = Now(), ";
			$sql = $sql."        Upd_ID      = 'WEB' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";
            
			$stmt = $db->prepare($sql);            
			$stmt->execute();

			$sql = "";
			$sql = $sql." UPDATE TB_Transaction ";
			$sql = $sql."    SET Trs_Type    = '004', ";
			$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
			$sql = $sql."        Upd_ID      = 'WEB', ";
			$sql = $sql."        Upd_IP      = '127.0.0.1' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";

			$stmt = $db->prepare($sql);            
			$stmt->execute();

			$sql = "";
			$sql = $sql." UPDATE TB_Payment ";
			$sql = $sql."    SET State       = '002', ";
			$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
			$sql = $sql."        Upd_ID      = 'WEB', ";
			$sql = $sql."        Upd_IP      = '127.0.0.1' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";

            $stmt = $db->prepare($sql);            
			$stmt->execute();

			$sql = "";
			$sql = $sql." UPDATE TB_CardApproval ";
			$sql = $sql."    SET Cancel_Yn   = 'Y', ";
			$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
			$sql = $sql."        Upd_ID      = 'WEB', ";
			$sql = $sql."        Upd_IP      = '127.0.0.1' ";
			$sql = $sql."  WHERE Center_ID    = '$center_id' ";
			$sql = $sql."    AND Trs_No       = '$trs_no' ";
			$sql = $sql."    AND Process_Flag = '2' ";
			$sql = $sql."    AND Deal_Type    = 'D1' ";
            

			$stmt = $db->prepare($sql);            
			$stmt->execute();

			$sql = "";
			$sql = $sql."SELECT COUNT(*) as cnt ";
			$sql = $sql."  FROM TB_CardApproval ";
			$sql = $sql." WHERE Center_ID    = '$center_id' ";
			$sql = $sql."   AND Trs_No       = '$trs_no' ";
			$sql = $sql."   AND Process_Flag = '2' ";
			$sql = $sql."   AND Deal_Type    = 'D2' ";

			$stmt = $db->prepare($sql);            
			$stmt->execute();

			$data = $stmt->fetch(PDO::FETCH_BOTH);

			$cnt= $data['cnt']; 

			if($cnt == 0){
				$sql = "";
				$sql = $sql." INSERT INTO TB_CardApproval(center_id, sales_date, sales_seq, trs_no, card_no, installment, approval_amount, deal_type, process_flag, approval_no, card_name, purchase_code, ";
				$sql = $sql."                             card_affiliate, terminal_id, manual_yn, cancel_yn, response_code, notice, approval_date, approval_time, ins_date, ins_id, ins_ip, state, org_trs_no) ";
				$sql = $sql."                      SELECT center_id, '$sales_date', '$sales_seq', trs_no, card_no, installment, approval_amount, 'D2', process_flag, approval_no, card_name, purchase_code,  ";
				$sql = $sql."                             card_affiliate, terminal_id, manual_yn, 'N', response_code, notice, approval_date, approval_time, f_date_time('yyyymmddhh24miss'), ins_id, '127.0.0.1', state, org_trs_no ";
				$sql = $sql."                        FROM TB_CardApproval ";
				$sql = $sql."                       WHERE Center_ID    = '$center_id' ";
				$sql = $sql."                         AND Trs_No       = '$trs_no' ";
				$sql = $sql."                         AND Process_Flag = '2' ";
				$sql = $sql."                         AND Deal_Type    = 'D1' LIMIT 1 ";

				$stmt = $db->prepare($sql);            
				$stmt->execute();
			}

			if ($rent_no != ''){
				$sql = "";
				$sql = $sql." UPDATE TB_Rent_M ";
				$sql = $sql."    SET State       = '002', ";
				$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
				$sql = $sql."        Upd_ID      = 'WEB', ";
				$sql = $sql."        Upd_IP      = '127.0.0.1' ";
				$sql = $sql."  WHERE Center_ID   = '$center_id' ";
				$sql = $sql."    AND Rent_No     = '$rent_no' ";
				

				$stmt = $db->prepare($sql);            
				$stmt->execute();

				$sql = "";
				$sql = $sql." UPDATE TB_Rent_D ";
				$sql = $sql."    SET State       = '002', ";
				$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
				$sql = $sql."        Upd_ID      = 'WEB', ";
				$sql = $sql."        Upd_IP      = '127.0.0.1' ";
				$sql = $sql."  WHERE Center_ID   = '$center_id' ";
				$sql = $sql."    AND Rent_No     = '$rent_no' ";
				

				$stmt = $db->prepare($sql);            
				$stmt->execute();

				//장바구니 및 tb_rent_rserve update
				$sql = "";
				$sql = $sql." UPDATE Tb_Rent_Reserve ";
				$sql = $sql."    SET Rent_State         = '1', ";
				$sql = $sql."        Reserve_Start_Date = null, ";
				$sql = $sql."        Member_Code        = null, ";
				$sql = $sql."        Member_Name        = null, ";
				$sql = $sql."        Upd_Date           = f_date_time('yyyymmddhh24miss'), ";
				$sql = $sql."        Upd_ID             = 'WEB', ";
				$sql = $sql."        Upd_IP             = '127.0.0.1' ";
				$sql = $sql."  WHERE Center_ID = '$center_id' ";
				$sql = $sql."    AND Rent_No   = '$rent_no' ";

				$stmt = $db->prepare($sql);            
				$stmt->execute();
			}


			$db->commit();

			$commit_yn = 'Y';

			$db = null;
		}
		catch(Exception $e){
			echo 'error : '.$e->getMessage();
			$db->rollback();
			$db = null;
			$commit_yn = 'N';
		}

	}

	
	
	    $data = array(
        'resCd'  => $resultCode,
		'commit_yn'  => $commit_yn,
		'resultMsg'  => $resultMsg);
		
		die(json_encode($data));
		exit;

?>














