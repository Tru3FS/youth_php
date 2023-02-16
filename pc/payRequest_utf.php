<?php

include_once("./_common.php");
header("Content-Type:text/html; charset=utf-8;"); 
/*

-- 현재파일 사용안함
-- lindex.php에서 nice 처리

*******************************************************
* <결제요청 파라미터>
* 결제시 Form 에 보내는 결제요청 파라미터입니다.
* 샘플페이지에서는 기본(필수) 파라미터만 예시되어 있으며, 
* 추가 가능한 옵션 파라미터는 연동메뉴얼을 참고하세요.
*******************************************************
*/  

$center_id              = base64_decode($_POST["ceid"]);	
$member_code            = base64_decode($_POST["mecd"]);	
$sales_code             = base64_decode($_POST["sacd"]);	
$sales_item_name        = base64_decode($_POST["sain"]);	
$amount                 = base64_decode($_POST["amou"]);	
$month_qty              = base64_decode($_POST["mqty"]);	
$member_name            = base64_decode($_POST["menm"]);	




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

	$mid         = $data[0];
	$merchantKey = $data[1];

}catch(Exception $e){
	echo $e;
	return;
}finally {
	$db = null; 
}




/*mhlee
$center_id              = '01'; //base64_decode($_GET["ceid"]);	
$member_code            = '21050037'; //base64_decode($_GET["mecd"]);	
$sales_division         = '011'; //base64_decode($_GET["sadi"]);	
$sales_code             = '00301100021'; //base64_decode($_GET["sacd"]);	
$start_date             = '20220701'; //base64_decode($_GET["stda"]);	
$end_date               = '20220731'; //base64_decode($_GET["enda"]);	
$sales_item_name        = '강습'; //base64_decode($_GET["sain"]);	
$amount                 = '1004'; //base64_decode($_GET["amou"]);	
$month_qty              = '1'; //base64_decode($_GET["mqty"]);	
//$member_name          = '테스트'; //base64_decode($_GET["member_name"]);	
$device                 = '';//$_GET["device"];
$lesson_info_week_day   = '3,6'; //base64_decode($_GET["lewd"]);
$lesson_info_time_code  = '1630,1600'; //base64_decode($_GET["letc"]);
$lesson_info_lesson_id  = '최한나,서희'; //base64_decode($_GET["leli"]);
$lesson_info_lesson_qty = '9'; //base64_decode($_GET["lelq"]);
*/


/*
echo $center_id."<br>";
echo $member_code."<br>";
echo $sales_division."<br>";
echo $sales_code."<br>";
echo $start_date."<br>";
echo $end_date."<br>";
echo $sales_item_name."<br>";
echo $amount."<br>";
echo $month_qty."<br>";
echo $lesson_info_week_day."<br>";
echo $lesson_info_time_code."<br>";
echo $lesson_info_lesson_id."<br>";
echo $lesson_info_lesson_qty."<br>";
echo $DBName."<br>";
return;
*/
//PG사에 거래번호 넘기기위해 먼저 채번...
$length = 4;
$char = 0;
$type = 'd';
$format = "%{$char}{$length}{$type}";

$sales_date			= date("Ymd");
$trs_no = CF_Nextval($center_id,'T');//Center_id
$trs_no = $sales_date.sprintf($format, $trs_no);

session_start();
$_SESSION["center_id"]              = $center_id;
$_SESSION["member_code"]            = $member_code;
$_SESSION["sales_code"]             = $sales_code;
$_SESSION["sales_item_name"]        = $sales_item_name;
$_SESSION["amount"]                 = $amount;
$_SESSION["trs_no"]                 = $trs_no;
$_SESSION["member_name"]            = $member_name;

//$merchantKey = "EYzu8jGGMfqaDEp76gSckuvnaHHu+bC4opsSN6lHv3b2lurNYkVXrZ7Z1AoqQnXI3eLuaUFyoRNC6FkrzVjceg==";
//$mid = "nicepay00m";

$merchantKey = $merchantKey; //"EYzu8jGGMfqaDEp76gSckuvnaHHu+bC4opsSN6lHv3b2lurNYkVXrZ7Z1AoqQnXI3eLuaUFyoRNC6FkrzVjceg=="; // 상점키
$MID         = $mid; //"nicepay00m"; // 상점아이디
$goodsName   = $member_code.':'.$sales_item_name; // 결제상품명
$price       = $amount; // 결제상품금액
$buyerName   = $member_name; // 구매자명 
$buyerTel	 = ""; // 구매자연락처
$buyerEmail  = ""; // 구매자메일주소        
$moid        = $center_id.$trs_no; // 상품주문번호                     
$returnURL	 = "http://112.217.123.82:10001/Noble/pc/payResult_utf.php"; // 결과페이지(절대경로) - 모바일 결제창 전용

/*
*******************************************************
* <해쉬암호화> (수정하지 마세요)
* SHA-256 해쉬암호화는 거래 위변조를 막기위한 방법입니다. 
*******************************************************
*/ 
$ediDate = date("YmdHis");
$hashString = bin2hex(hash('sha256', $ediDate.$MID.$price.$merchantKey, true));



?>
<!DOCTYPE html>
<html>
<head>
<title>NICEPAY PAY REQUEST</title>
<meta charset="utf-8">
<style>
	html,body {height: 100%;}
	form {overflow: hidden;}
</style>
<!-- 아래 js는 PC 결제창 전용 js입니다.(모바일 결제창 사용시 필요 없음) -->

<script src="https://web.nicepay.co.kr/v3/webstd/js/nicepay-3.0.js" type="text/javascript"></script>
<script type="text/javascript">


//결제창 최초 요청시 실행됩니다.
function nicepayStart(){
 

	if(checkPlatform(window.navigator.userAgent) == "mobile"){//모바일 결제창 진입
		document.payForm.action = "https://web.nicepay.co.kr/v3/v3Payment.jsp";
		document.payForm.acceptCharset="euc-kr";
		document.payForm.submit();
	}else{//PC 결제창 진입
		goPay(document.payForm);
	}
}

//[PC 결제창 전용]결제 최종 요청시 실행됩니다. <<'nicepaySubmit()' 이름 수정 불가능>>
function nicepaySubmit(){
	document.payForm.submit();
}

//[PC 결제창 전용]결제창 종료 함수 <<'nicepayClose()' 이름 수정 불가능>>
function nicepayClose(){
	alert("결제가 취소 되었습니다");
}

//pc, mobile 구분(가이드를 위한 샘플 함수입니다.)
function checkPlatform(ua) {
	if(ua === undefined) {
		ua = window.navigator.userAgent;
	}
	
	ua = ua.toLowerCase();
	var platform = {};
	var matched = {};
	var userPlatform = "pc";
	var platform_match = /(ipad)/.exec(ua) || /(ipod)/.exec(ua) 
		|| /(windows phone)/.exec(ua) || /(iphone)/.exec(ua) 
		|| /(kindle)/.exec(ua) || /(silk)/.exec(ua) || /(android)/.exec(ua) 
		|| /(win)/.exec(ua) || /(mac)/.exec(ua) || /(linux)/.exec(ua)
		|| /(cros)/.exec(ua) || /(playbook)/.exec(ua)
		|| /(bb)/.exec(ua) || /(blackberry)/.exec(ua)
		|| [];
	
	matched.platform = platform_match[0] || "";
	
	if(matched.platform) {
		platform[matched.platform] = true;
	}
	
	if(platform.android || platform.bb || platform.blackberry
			|| platform.ipad || platform.iphone 
			|| platform.ipod || platform.kindle 
			|| platform.playbook || platform.silk
			|| platform["windows phone"]) {
		userPlatform = "mobile";
	}
	
	if(platform.cros || platform.mac || platform.linux || platform.win) {
		userPlatform = "pc";
	}
	
	return userPlatform;
}
</script>

<script src="https://web.nicepay.co.kr/flex/js/nicepay_tr_utf.js" language="javascript"></script>
<script>
	$(function(){
		NicePayUpdate();	//Active-x Control 초기화
		
		$('#btnReq').click(function(){
			var nAgt= navigator.userAgent;
			//alert(nAgt);
			var ieVerOffset=nAgt.indexOf("MSIE");	
			var ieVersion  = parseFloat(nAgt.substring(ieVerOffset+5));
			//alert(ieVersion);
			var payForm		= document.payForm;
			
			//등록비수정후 결제 시작
			var param = new Object();
			param.amt = $('#Amt').val();
			ajaxJSON('getDemoEncryptData.do', param, function(result) {
// 				alert(result.data);
				document.payForm.EdiDate.value = result.data.ediDate;
				document.payForm.EncryptData.value = result.data.encryptData;
				goPay(payForm);
			});
			
		});
		
		
		//결제타입변경시
		$('#TransType').change(function(){
			//일반결제일경우
			if($(this).val()=='0'){
				$('#PayMethod').val('');
			}else{
				$('#PayMethod').val('CARD,BANK,VBANK');
			}
		});
	});
	
	function nicepaySubmit(){
		document.payForm.submit();
	}

	/**
	결제를 취소 할때 호출됩니다.
	*/
	function nicepayClose(){
		alert("결제가 취소 되었습니다");
	}
</script>

</head>
<body onload="nicepayStart()">
<form name="payForm" method="post" action="./payResult_utf.php" >
	<table>
		<!--파라미터 -->
		<input type="hidden" name="PayMethod" value="CARD">                        <!-- 결제 수단 -->
		<input type="hidden" name="GoodsName" value="<?php echo($goodsName)?>">    <!-- 결제 상품명 -->
		<input type="hidden" name="Amt" value="<?php echo($price)?>">              <!-- 결제 상품금액 -->
		<input type="hidden" name="MID" value="<?php echo($MID)?>">                <!-- 상점 아이디 -->
		<input type="hidden" name="Moid" value="<?php echo($moid)?>">              <!-- 상품 주문번호 -->
		<input type="hidden" name="BuyerName" value="<?php echo($buyerName)?>">    <!-- 구매자명 -->
		<input type="hidden" name="BuyerEmail" value="<?php echo($buyerEmail)?>">  <!-- 구매자명 이메일 -->
		<input type="hidden" name="BuyerTel" value="<?php echo($buyerTel)?>">      <!-- 구매자 연락처 -->
		<input type="hidden" name="ReturnURL" value="<?php echo($returnURL)?>">    <!-- 인증완료 결과처리 UR -->
		<!-- 옵션 -->	 
		<input type="hidden" name="GoodsCl" value="1"/>						<!-- 상품구분(실물(1),컨텐츠(0)) -->
		<input type="hidden" name="TransType" value="0"/>					<!-- 일반(0)/에스크로(1) --> 
		<input type="hidden" name="CharSet" value="utf-8"/>				<!-- 응답 파라미터 인코딩 방식 -->
		<input type="hidden" name="ReqReserved" value="00100300015"/>					<!-- 상점 예약필드 -->
					
		<!-- 변경 불가능 -->
		<input type="hidden" name="EdiDate" value="<?php echo($ediDate)?>"/>			<!-- 전문 생성일시 -->
		<input type="hidden" name="SignData" value="<?php echo($hashString)?>"/>	<!-- 해쉬값 -->
	</table>
	<!--<a href="#" class="btn_blue" onClick="nicepayStart();">요 청</a>-->
</form>
</body>
</html>