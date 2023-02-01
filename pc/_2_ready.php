<?php
	session_start();
	unset($_SESSION["readyParameters"]);
	unset($_SESSION["apiKey"]);
	unset($_SESSION["aid"]);	    
	unset($_SESSION["API_BASE"]);
	unset($_SESSION["amount"]);
	unset($_SESSION["idx"]);

	header('Content-Type: text/html; charset=utf-8');		
	require('utils.php');                // ��ƿ��Ƽ ����
	require_once('../common.php');
	//$logPath = "c://app.log";            //����� �α���ġ (windows)
	$logPath = "../pay_log/app_".date("Ymd").".log";         //����� �α���ġ (������)

	 /*****************************************************************************************
     * READY API  (����â ȣ�� ��ó��)    
     ******************************************************************************************
	 - API ȣ�� ������
     - ## �׽�Ʈ �Ϸ��� real ���񽺿� URL�� ����  ## 
     - ����-URL : https://api-std.mainpay.co.kr 
     - ����-URL : https://test-api-std.mainpay.co.kr  	 	 	 
	 */
	 	
	$API_BASE = "https://api-std.mainpay.co.kr";    //�Ǽ���
	//$API_BASE = "https://test-api-std.mainpay.co.kr"; //�׽�Ʈ����

    /*
      API KEY (���Ű)  
     - ���� : http://biz.mainpay.co.kr ��������>�������>��ȣȭŰ����
     - ��������ȣ(mbrNo) ������ �Բ� ��������� key (�׽�Ʈ �Ϸ��� real ���񽺿� �߱��ʿ�) */

	/* ������� �ּ� ����*/
	$center_id = $_POST["center_id"];

	$sql = "";
	$sql = "SELECT mbrNo, APIKey FROM TB_Company WHERE Center_ID = '$center_id'";

	$result= sql_fetch($sql);

	$apiKey=$result['APIKey'];
	$mbrNo=$result['mbrNo'];

	/*****************************************************************************************
    *	�ʼ� �Ķ���� 
    ******************************************************************************************/
	$version = "V001";		
    /* ������ ���̵�(�׽�Ʈ �Ϸ��� real ���񽺿� �߱��ʿ�)*/
	//$mbrNo = "100011"; //<===�׽�Ʈ�� ���������̵��Դϴ�.
	//$apiKey = "U1FVQVJFLTEwMDAxMTIwMTgwNDA2MDkyNTMyMTA1MjM0"; // <===�׽�Ʈ�� API_KEY�Դϴ�. 100011		
	/* ������ �ֹ���ȣ (������ ����ID ��ü����) 6byte~20byte*/
	$mbrRefNo = makeMbrRefNo($mbrNo);
	
	/* �������� */
	$paymethod = $_POST["paymethod"];		
   	/* �����ݾ� (���ް�+�ΰ���)
 	  (#����#) ���������� ���� ���� ���� �״�� ����� ��� �ݾ������� �õ��� �����մϴ�.
 	  DB,session ��� ��ȸ�� ���� ��� �ٶ��ϴ�. */	 
	$amount = $_POST["goodsAmount"];			
	/* ��ǰ�� max 30byte, Ư������ ������*/	
	//$goodsName = urlencode("�׽�Ʈ��ǰ��");	
	$goodsName = $_POST["goodsName"];	
	/* ��ǰ�ڵ� max 8byte*/
	$goodsCode = $_POST["goodsCode"];		
	/*�����Ϸ� �� ȣ��Ǵ� ���� URL (PG->������)*/	
	//$approvalUrl = "https://yeyak.dobongsiseol.or.kr/pc/_3_approval.php";	
	$approvalUrl = "https://sports.samsungnc.com/Noble/pc/_3_approval.php";	
	
	/*����â close�� ȣ��Ǵ� ����URL (PG->������)*/
	//$closeUrl = "https://yeyak.dobongsiseol.or.kr/pc/_3_close.php";				
	$closeUrl = "https://sports.samsungnc.com/Noble/pc/_3_close.php";				

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
    *	�ɼ� �Ķ���� 
    ******************************************************************************************/
	
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
	* READY API ȣ��
	*****************************************************************************************/
	$READY_API_URL = $API_BASE."/v1/payment/ready"; 
	$result = "";
	$errorMessage = "";
	try{
		pintLog("READY-API: ".$READY_API_URL, $logPath);
		pintLog("PARAM: ".print_r($parameters, TRUE), $logPath);
		$result = httpPost($READY_API_URL, $parameters);
	} catch(Exception $e) {
		$errorMessage = "�����غ�API ȣ�����: " . $READY_API_URL;
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

	/******************************************************************************************
	* �������� ���� ���� (DB�� �����ص� ����)
	* PG�κ��� ������� ������ �������� ��û�ÿ� �ʿ�
	******************************************************************************************/
	//$amount = iconv("UTF-8", "EUC-KR", $amount);

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