<?php
	header('Content-Type: application/json; charset=utf-8');	
	require('utils.php');                // 유틸리티 포함
	include_once("../common.php");
    $logPath = "../pay_log/app_".date("Ymd").".log";                 //디버그 로그위치 (리눅스)
	$logPathEx = "../pay_log/exception_".date("Ymd").".log";         //디버그 로그위치 (리눅스)

	/*****************************************************************************************
    * CANCEL API URL  (결제 취소 URL)    
    ******************************************************************************************
	- API 호출 도메인
    - ## 테스트 완료후 real 서비스용 URL로 변경  ## 
    - 리얼-URL : https://relay.mainpay.co.kr/v1/api/payments/payment/cancel
    - 개발-URL : https://test-relay.mainpay.co.kr/v1/api/payments/payment/cancel  	 	 	 
	*/
	//$center_id = $_REQUEST["center_id"];	
	$center_id = '01';	

	$sql = "";
	$sql = "SELECT mbrNo, APIKey FROM TB_Company WHERE Center_ID = '$center_id'";

	$result= sql_fetch($sql);

	$apiKey=$result['APIKey'];
	$mbrNo=$result['mbrNo'];

	$CANCEL_API_URL = "https://relay.mainpay.co.kr/v1/api/payments/payment/cancel";
	//$CANCEL_API_URL = "https://test-relay.mainpay.co.kr/v1/api/payments/payment/cancel";
		
    /*
      API KEY (비밀키)  
     - 생성 : http://biz.mainpay.co.kr 고객지원>기술지원>암호화키관리
     - 가맹점번호(mbrNo) 생성시 함께 만들어지는 key (테스트 완료후 real 서비스용 발급필요) */
    //$apiKey = "U1FVQVJFLTEwMDAxMTIwMTgwNDA2MDkyNTMyMTA1MjM0"; // <===테스트용 API_KEY입니다. 100011		

	
	/*****************************************************************************************
    *	취소 요청 파라미터 
    ******************************************************************************************/
	$version = "V001";	
    
	

    /* 가맹점 아이디(테스트 완료후 real 서비스용 발급필요)*/
	//$mbrNo = "100011"; //<===테스트용 가맹점아이디입니다.
	/* 가맹점 주문번호 (가맹점 고유ID 대체가능) 6byte~20byte*/
	$mbrRefNo = makeMbrRefNo($mbrNo);
	/* 원거래번호 (결제완료시에 수신한 값)*/
	$orgRefNo = $_REQUEST["refNo"];
	/* 원거래일자(결제완료시에 수신한 값) YYMMDD */
	$orgTranDate = $_REQUEST["tranDate"];
	/* 원거래 지불수단 (CARD:신용카드|VACCT:가상계좌|ACCT:계좌이체|HPP:휴대폰소액) */
	$paymethod = "CARD";
	/* 결제금액 */
	$amount = $_REQUEST["amount"];
	/* 결제타입 (결제완로시에 받은 값) */
	$payType = "I";
	/* 망취소 유무(Y:망취소, N:일반취소) (주문번호를 이용한 망취소시에 사용) */
	$isNetCancel = "N";
	/* 고객명 특수문자 사용금지, URL인코딩 필수 max 30byte */
	$customerName = urlencode($_REQUEST["customerName"]);
	/* 고객이메일 이메일포멧 체크 필수 max 50byte */
	$customerEmail = $_REQUEST["customerEmail"];	

	$trs_no = $_REQUEST["trs_no"];	
	$rent_no = $_REQUEST["rent_no"];	
	$member_code = $_REQUEST["member_code"];	
	$ptype = $_REQUEST["ptype"];
	

	
	
	/* timestamp max 20byte*/
	$timestamp = makeTimestamp();
	/* signature 64byte*/
	$signature = makeSignature($mbrNo,$mbrRefNo,$amount,$apiKey,$timestamp); 

	$parameters = array(
		'version' => $version,
		'mbrNo' => $mbrNo,
		'mbrRefNo' => $mbrRefNo,
		'orgRefNo' => $orgRefNo,
		'orgTranDate' => $orgTranDate,
		'paymethod' => $paymethod,
		'amount' => $amount,
		'payType' => $payType,
		'isNetCancel' => $isNetCancel,
		'customerName' => $customerName,
		'customerEmail' => $customerEmail,		
		'timestamp' => $timestamp,		
		'signature' => $signature		
	);
	
	

    /*****************************************************************************************
	* CANCEL API 호출
	*****************************************************************************************/
	$result = "";
	$errorMessage = "";
	try{
		pintLog("CANCEL-API: ".$CANCEL_API_URL, $logPath);
		pintLog("PARAM: ".print_r($parameters, TRUE), $logPath);
		$result = httpPost($CANCEL_API_URL, $parameters);
	} catch(Exception $e) {
		$errorMessage = "결제 취소 API 호출실패 : ".$CANCEL_API_URL;
		pintLog("ERROR : ".$errorMessage, $logPath);
		throw new Exception($e);
		return;
	}
	
	pintLog("RESPONSE : ".$result, $logPath);
	$obj = json_decode($result);	
	$resultCode = $obj->{'resultCode'};
	$resultMessage = $obj->{'resultMessage'};
		
	if($resultCode = "200"){		
		$data = $obj->{'data'};
		// 하단 JSON TYPE RESPONSE 참고하여 데이터 저장
        
		
		try{
			$connect_db = mysqli_connect(NC_MYSQL_HOST, NC_MYSQL_USER, NC_MYSQL_PASSWORD, NC_MYSQL_DB,'13305');
            sql_set_charset('utf8', $connect_db);

			$sales_date	 = date("Ymd");
			$sales_seq   = CF_Nextval($center_id,'CARD'.$sales_date);

			mysqli_autocommit($connect_db, FALSE);

			$sql = "";
			$sql = $sql." UPDATE TB_Basket ";
			$sql = $sql."    SET State       = '009', ";
			$sql = $sql."        Upd_Date    = Now(), ";
			$sql = $sql."        Upd_ID      = 'WEB' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";
            //echo $sql;
			if(mysqli_query($connect_db, $sql)){  
			   //  echo "등록완료";  
			} else {  
				mysqli_rollback($connect_db);
				mysqli_error();
				$commit_yn = 'N';
			}
             
			$sql = "";
			$sql = $sql." UPDATE TB_Basket_Program ";
			$sql = $sql."    SET State       = '009', ";
			$sql = $sql."        Upd_Date    = Now(), ";
			$sql = $sql."        Upd_ID      = 'WEB' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";
            //echo $sql;
			if(mysqli_query($connect_db, $sql)){  
			   //  echo "등록완료";  
			} else {  
				mysqli_rollback($connect_db);
				mysqli_error();
				$commit_yn = 'N';
			}
			 
			$sql = "";
			$sql = $sql." UPDATE TB_Transaction ";
			$sql = $sql."    SET Trs_Type    = '004', ";
			$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
			$sql = $sql."        Upd_ID      = 'WEB', ";
			$sql = $sql."        Upd_IP      = '127.0.0.1' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";
            //echo $sql;
			if(mysqli_query($connect_db, $sql)){  
			   //  echo "등록완료";  
			} else {  
				mysqli_rollback($connect_db);
				mysqli_error();
				$commit_yn = 'N';
			}

			$sql = "";
			$sql = $sql." UPDATE TB_Payment ";
			$sql = $sql."    SET State       = '002', ";
			$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
			$sql = $sql."        Upd_ID      = 'WEB', ";
			$sql = $sql."        Upd_IP      = '127.0.0.1' ";
			$sql = $sql."  WHERE Center_ID   = '$center_id' ";
			$sql = $sql."    AND Trs_No      = '$trs_no' ";
            //echo $sql;
			if(mysqli_query($connect_db, $sql)){  
			   //  echo "등록완료";  
			} else {  
				mysqli_rollback($connect_db);
				mysqli_error();
				$commit_yn = 'N';
			}

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
            //echo $sql;
			if(mysqli_query($connect_db, $sql)){  
			   //  echo "등록완료";  
			} else {  
				mysqli_rollback($connect_db);
				mysqli_error();
				$commit_yn = 'N';
			}

			$sql = "";
			$sql = $sql."SELECT COUNT(*) as cnt ";
			$sql = $sql."  FROM TB_CardApproval ";
			$sql = $sql." WHERE Center_ID    = '$center_id' ";
			$sql = $sql."   AND Trs_No       = '$trs_no' ";
			$sql = $sql."   AND Process_Flag = '2' ";
			$sql = $sql."   AND Deal_Type    = 'D2' ";

			$result2= sql_fetch($sql);

			$cnt=$result2['cnt'];

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

				//echo $sql;
				if(mysqli_query($connect_db, $sql)){  
				   //  echo "등록완료";  
				} else {  
					mysqli_rollback($connect_db);
					mysqli_error();
					$commit_yn = 'N';
				}
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
				//echo $sql;
				if(mysqli_query($connect_db, $sql)){  
				   //  echo "등록완료";  
				} else {  
					mysqli_rollback($connect_db);
					mysqli_error();
					$commit_yn = 'N';
				}

				$sql = "";
				$sql = $sql." UPDATE TB_Rent_D ";
				$sql = $sql."    SET State       = '002', ";
				$sql = $sql."        Upd_Date    = f_date_time('yyyymmddhh24miss'), ";
				$sql = $sql."        Upd_ID      = 'WEB', ";
				$sql = $sql."        Upd_IP      = '127.0.0.1' ";
				$sql = $sql."  WHERE Center_ID   = '$center_id' ";
				$sql = $sql."    AND Rent_No     = '$rent_no' ";
				//echo $sql;
				if(mysqli_query($connect_db, $sql)){  
				   //  echo "등록완료";  
				} else {  
					mysqli_rollback($connect_db);
					mysqli_error();
					$commit_yn = 'N';
				}

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

				if(mysqli_query($connect_db, $sql)){  
				   //  echo "등록완료";  
				} else {  
					mysqli_rollback($connect_db);
					mysqli_error();
					$commit_yn = 'N';
				}
			}


			mysqli_commit($connect_db);

			mysqli_close($connect_db);
		}
		catch(Exception $e){
			mysqli_rollback($connect_db);
			mysqli_close($connect_db);
			mysqli_error();
			$commit_yn = 'N';
		}
	}


?>   

<script>

<!--
//window.close();

<?php if ($ptype == "L"){
	?>

location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002";

<?php } else { ?>

location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002";

<?php }?>


//-->
</script>

