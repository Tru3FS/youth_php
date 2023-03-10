<?php
	header('Content-Type: application/json; charset=utf-8');	
	require('utils.php');                // 유틸리티 포함
	include_once("../common.php");
	//$logPath = "c://app.log";            //디버그 로그위치 (windows)
	$logPath = "../pay_log/app_".date("Ymd").".log";         //디버그 로그위치 (리눅스)

	 /*****************************************************************************************
     * READY API   (결제창 호출 전처리)    
     ******************************************************************************************
	 - API 호출 도메인
     - ## 테스트 완료후 real 서비스용 URL로 변경  ## 
     - 리얼-URL : https://api-std.mainpay.co.kr 
     - 개발-URL : https://test-api-std.mainpay.co.kr  	 	 	 
	 */
	 	
	$API_BASE = "https://api-std.mainpay.co.kr";  
	//$API_BASE = "https://test-api-std.mainpay.co.kr"; //테스트서버

	$center_id = $_POST["center_id"];

	//$sql = "";
	$sql = "SELECT mbrNo, APIKey FROM TB_Company WHERE Center_ID = '$center_id'";

	$result= sql_fetch($sql);

	$apiKey=$result['APIKey'];
	$mbrNo=$result['mbrNo'];
	
    /*
      API KEY (비밀키)  
     - 생성 : http://biz.mainpay.co.kr 고객지원>기술지원>암호화키관리
     - 가맹점번호(mbrNo) 생성시 함께 만들어지는 key (테스트 완료후 real 서비스용 발급필요) */
    //$apiKey = "U1FVQVJFLTEwMDAxMTIwMTgwNDA2MDkyNTMyMTA1MjM0"; // <===테스트용 API_KEY입니다. 100011		

	/*****************************************************************************************
    *	필수 파라미터 
    ******************************************************************************************/
	$version = "1.0";		
    /* 가맹점 아이디(테스트 완료후 real 서비스용 발급필요)*/
	//$mbrNo = "100011"; //<===테스트용 가맹점아이디입니다.
	/* 가맹점 주문번호 (가맹점 고유ID 대체가능) 6byte~20byte*/
	$mbrRefNo = makeMbrRefNo($mbrNo);
	
	/* 결제수단 */
	$paymethod = $_POST["paymethod"];		
   	/* 결제금액 (공급가+부가세)
 	  (#주의#) 페이지에서 전달 받은 값을 그대로 사용할 경우 금액위변조 시도가 가능합니다.
 	  DB,session 등에서 조회한 값을 사용 바랍니다. */	 
	$amount = $_POST["goodsAmount"];			
	/* 상품명 max 30byte, 특수문자 사용금지*/	
	//$goodsName = urlencode("테스트상품명");	
	$goodsName = $_POST["goodsName"];	
	/* 상품코드 max 8byte*/
	$goodsCode = $_POST["goodsCode"];		
	/*인증완료 시 호출되는 상점 URL (PG->가맹점)*/
	$approvalUrl = "https://sports.samsungnc.com/Noble/mobile/_3_approval.php";	
	/*결제창 close시 호출되는 상점URL (PG->가맹점)*/
	$closeUrl = "https://sports.samsungnc.com/Noble/mobile/_3_close.php";				
	$customerName = $_POST["memberName"];
	$customerEmail = $_POST["email"];			 
	/* timestamp max 20byte*/
	$timestamp = makeTimestamp();
	/* signature 64byte*/
	$signature = makeSignature($mbrNo,$mbrRefNo,$amount,$apiKey,$timestamp);

	$idx = $_POST["idx"];	
	$ptype = $_POST["ptype"];	
	$member_code = $_POST["member_code"];	
	$rent_no = $_POST["rent_no"];	
	
	/*****************************************************************************************
    *	옵션 파라미터 
    ******************************************************************************************/
	/* 부가세
	    부가세금액을 넘기지 않을 경우, 당사에 등록된 가맹점번호(mbrNo)의 과세여부 정보로 계산 
	*/
	//$taxAmt = "45";
	// 봉사료
	//$serviceAmt = "0";
	
	/*사용카능 카드사 (JSON Array Type) 매뉴얼 참조*/
	//$availableCards = json_encode(array("01", "04"));

	$parameters = array(
		'version' => $version,
		'mbrNo' => $mbrNo,
		'mbrRefNo' => $mbrRefNo,
		'paymethod' => $paymethod,
		'amount' => $amount,
		'goodsName' => $goodsName,
		'goodsCode' => $goodsCode,
		'approvalUrl' => $approvalUrl,
		'closeUrl' => $closeUrl,
		'customerName' => $customerName,
		'customerEmail' => $customerEmail,		
		'timestamp' => $timestamp,		
		'signature' => $signature		
	);

    /*****************************************************************************************
	* READY API 호출
	*****************************************************************************************/
	$READY_API_URL = $API_BASE."/v1/payment/ready"; 
	$result = "";
	$errorMessage = "";
	try{
		pintLog("READY-API: ".$READY_API_URL, $logPath);
		pintLog("PARAM: ".print_r($parameters, TRUE), $logPath);
		
		$result = httpPost($READY_API_URL, $parameters);
	} catch(Exception $e) {
		$errorMessage = "결제준비API 호출실패: " . $READY_API_URL;
		pintLog("ERROR: ".$errorMessage, $logPath);
		throw new Exception($e);
		return;
	}
	
	pintLog("RESPONSE: ".$result, $logPath);
	
	$obj = json_decode($result);	
	$resultCode = $obj->{'resultCode'};
	$resultMessage = $obj->{'resultMessage'};
	$aid = "";			
	if($resultCode == "200"){		
		$data = $obj->{'data'};
		$aid = $data->{'aid'};	
	}

	//pintLog("data: ".$data, $logPath);
	
	/******************************************************************************************
	* 결제정보 세션 저장 (DB에 관리해도 무방)
	* PG로부터 인증결과 수신후 결제승인 요청시에 필요
	******************************************************************************************/
	//session_start();
	$_SESSION["readyParameters"] = $parameters;
	$_SESSION["apiKey"] = $apiKey;
	$_SESSION["aid"] = $aid;	    
	$_SESSION["API_BASE"] = $API_BASE;
	$_SESSION["amount"] = $amount;
	$_SESSION["idx"] = $idx;
	$_SESSION["ptype"] = $ptype;
	$_SESSION["center_id"] = $center_id;
	$_SESSION["member_code"] = $member_code;
	$_SESSION["rent_no"] = $rent_no;
	$_SESSION["return_url"] = NC_MYPAGE_URL;
	// JSON TYPE RESPONSE
	header('Content-Type: application/json');
	echo $result;
?>    
