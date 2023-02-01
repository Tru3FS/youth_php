<?php
header("Content-Type:text/html; charset=utf-8;");


$tid       = $_POST['refNo'];
$amount    = $_POST['amount'];
$reason    = '사용자 취소';
$orderId   = $_POST['trs_no'];
$center_id = $_POST['center_id'];
//$orderId = uniqid();


include_once('../lib/db.'.$center_id.'.php');
include_once("../lib/common_function_.php");



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

$clientId = $mid;
$secretKey = $merchantKey;

//$clientId = 'S2_af4543a0be4d49a98122e01ec2059a56';
//$secretKey = '9eb85607103646da9f9c02b128f2e5ee';

$resObject = '';

$json =  json_encode(array("amount" => $amount, "reason" => $reason, "orderId" => $orderId));

try {
	$res = requestPost(
		//"https://sandbox-api.nicepay.co.kr/v1/payments/". $tid ."/cancel",
	    "https://api.nicepay.co.kr/v1/payments/". $tid ."/cancel",
		json_encode(
			array("amount" => $amount, 
				  "reason" => $reason, 
				  "orderId" => $orderId)
		),
		$clientId . ':' . $secretKey
	);

	$resObject = json_decode($res,  true);
} catch (Exception $e) {
	$e->getMessage();
}

//CURL: Basic auth, json, post
function requestPost($url, $json, $userpwd)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, $userpwd);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);

	curl_close($ch);
	return $response;
}

?>

	<?php
	foreach ($resObject as $key => $value){
		//echo $key . '=' . $value . '<br />';

		if($key == 'resultCode'){
			$resultCode = $value;
		}

		if($key == 'resultMsg'){
			$resultMsg = $value;
		}
	}

	$resultCode = '0000';

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

	?>


<!DOCTYPE html>
<html>
<head>
<title>상점 도착페이지</title>
</head>
<body>
<?php if($commit_yn == 'Y'){?>
<script>

location.href="../mypage/lindex.php?center_id=<?php echo $center_id;?>&status=001&ttype=2";
//window.close();


</script> 
<?php }else{?>
<script>

alert('취소오류');
location.href="../mypage/lindex.php?center_id=<?php echo $center_id;?>&status=002&ttype=2";
//window.close();
</script> 

<?php }?>

</body>

</html>