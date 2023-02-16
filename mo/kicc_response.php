
<?php
include_once("./_common.php");
include_once(NC_PATH.'/head3.sub.php');

global $DBName;
global $manage_gs_key;

$resCd=$_REQUEST["resCd"];
$resMsg=$_REQUEST["resMsg"];
$authorizationId=$_REQUEST["authorizationId"];
$shopOrderNo=$_REQUEST["shopOrderNo"];
$customerId=$_REQUEST["customerId"];
$customerName=$_REQUEST["customerName"];
$idx=$_REQUEST["idx"];
$center_id=$_REQUEST["center_id"];

$m_id=$_REQUEST["m_id"]; //회원아이디 세션값
$m_name=$_REQUEST["m_name"]; //회원아이디 세션값
$m_code=$_REQUEST["m_code"]; //회원아이디 세션값
$m_age=$_REQUEST["m_age"]; //회원아이디 세션값

$approvalReqDate='';

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



$ls_url = "https://testpgapi.easypay.co.kr/api/trades/approval";


$approvalReqDate=date("Ymd");
$shopTransactionId=date("ymdHis");





try {
	$res = requestPost(
		$ls_url,
		json_encode(array("mallId" => $mid,"shopTransactionId" => $shopTransactionId,"authorizationId" => $authorizationId,"shopOrderNo" => $shopOrderNo,"approvalReqDate" => $approvalReqDate))
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



	pintLog('mobile -> '.$center_id.' : '.$idx.' : '.serialize($resObject), $logPath);

	foreach ($resObject as $key => $value){
		//echo $key.'='.$value.'<br />';

		if($key == 'resCd'){
			$resultCode = $value;
		}

		if($key == 'resMsg'){
			$resultMsg = $value;
		}

		if($key == 'amount'){
			$amount = $value;
		}

		if($key == 'pgCno'){
			$pgCno = $value;
		}

		 if($key == 'paymentInfo'){
			 if(is_array($value)){
				 foreach($value as $inner_key => $inner_value){
					 if($inner_key == 'approvalNo'){
						 $approveNo = $inner_value;
					 }

	            	 if($inner_key == 'cardInfo'){
			         if(is_array($inner_value)){
				     
					 foreach($inner_value as $inner_key2 => $inner_value2){
					 if($inner_key2 == 'issuerCode'){
						 $cardCode = $inner_value2; //발급사코드
					 }

					 if($inner_key2 == 'acquirerName'){
						 $cardName = $inner_value2; //발급사명
					 }

					 if($inner_key2 == 'cardNo'){
						 $cardNum = $inner_value2; //카드번호
					 }

					 if($inner_key2 == 'installmentMonth'){
						 $cardQuota = $inner_value2; //할부개월
					 }

					 if($inner_key2 == 'acquirerCode'){
						 $acquCardCode = $inner_value2; //매입사코드
					 }

					 if($inner_key2 == 'acquirerName'){
						 $acquCardName = $inner_value2; //매입사명
					 }
				}
			 }
		  }


				}
			 }
		  }



	}



$refNo = $pgCno;

	if($resultCode == '0000'){
		try{
			$sales_date	 = date("Ymd");
			$AuthDate    = substr($sales_date, 2, 6).date("His");

			$db = new db();
			$db = $db->connect($DBName);

			//변수 설정//
			//0. 공통 사용//
			$member_seq			= '1'; //밑에서 체번
			$total_amount		= $amount;
			$state				= "001";
			$remark				= '';
			$user_id			= 'WEB';
			$ip					= '127.0.0.1';
			$sales_seq			= '1'; //밑에서 체번

			$card_no			= $cardNum;
			$card_name     		= $cardName;
			$approval_no   		= $approveNo; 

			//3. TB_Cardapproval
			$installment		= $cardQuota;
			$deal_type  		= 'D1';
			$process_flag		= '2';
			$purchase_code		= '49';
			$card_affiliate		= '';
			$terminal_id		= '';
			$manual_yn			= 'N';
			$cancel_yn			= 'N';
			$response_code		= '0000';
			$notice    			= $payMethod;
			$approval_date		= substr($AuthDate, 0, 6);
			$approval_time		= substr($AuthDate, 6, 6);

			//4. TB_Payment 
			$payment_method		= '49';
			$payment_index		= '1';
			$payment_type		= '001';
			$issueCompanyNo     = $cardCode;
			$acqCompanyNo       = $acquCardCode;
			$mbfNo              = '';

			$applNo = $approval_no;

			$length = 4;
			$char = 0;
			$type = 'd';
			$format = "%{$char}{$length}{$type}";

			$sales_date			= date("Ymd");
			$trs_no = CF_Nextval($center_id,'T'.$sales_date);//Center_id
			$trs_no = $sales_date.sprintf($format, $trs_no);   
			
			//****************************0. 시퀀스 번호 체번 Start **************************** //
			$sales_seq   = CF_Nextval($center_id,'CARD'.$sales_date);
			$payment_seq = CF_Nextval($center_id,'PA'.$sales_date);
			//****************************0. 시퀀스 번호 체번 Start **************************** //

			//echo ' $sales_seq : '.$sales_seq;
			//echo ' $payment_seq : '.$payment_seq;

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

					$data = $stmt->fetch(PDO::FETCH_BOTH);

					$result_code= $data['pResult_Code']; 
					
					$while_count = $while_count + 1;

					usleep(500000);
				}

				//$db->commit();

				$commit_yn = 'Y';		
		}catch(Exception $e){
			$commit_yn = 'N';	
			$db->rollback();
			$e->getMessage();
			echo $e->getMessage();

		}
	}
	

	?>

<?php if($commit_yn == 'Y'){?>
<script>
		$(function() {

	            var rsult="";	
				NC.alert({
				title    : "결제가 완료되었습니다.",
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){

                                                        rsult += "<form name='form1' method='post' action='../mypage/lindex.php'>";
														rsult += "<input type='hidden' name='m_code' value='<?php echo $customerId;?>'>";	
														rsult += "<input type='hidden' name='status' value='001'>";	
														rsult += "<input type='hidden' name='center_id' value='<?php echo $center_id; ?>'>";
													    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();

														
			 				},
                    on_cancel  : function(){
                 
			 
				},
			});
});
</script>
<?php }else{?>


<script>
	$(function() {
	            var rsult="";	
				NC.alert({
				title    : "<?php echo $resultCode;?>",
				message  : "<?php echo $resultMsg;?>",
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){




                                                        rsult += "<form name='form1' method='post' action='../mypage/lindex.php'>";
														rsult += "<input type='hidden' name='m_code' value='<?php echo $customerId;?>'>";	
														rsult += "<input type='hidden' name='status' value='001'>";	
														rsult += "<input type='hidden' name='center_id' value='<?php echo $center_id; ?>'>";
													    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
													
													
			 				},
                    on_cancel  : function(){
                 
			 
				},
			});
});
</script>



<?php

}




include_once(NC_PATH.'/tail3.php');
?>














