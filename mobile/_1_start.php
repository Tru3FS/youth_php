<?php
    header('Content-Type: text/html; charset=utf-8');
	
	$cardurl       = $_POST["CARDURL"];
	$READY_API_URL = $cardurl."/_2_ready.php"	;
   
   	
	$center_id       = $_POST["center_id"];	
	$member_code     = $_POST["member_code"];	
	$member_name     = $_POST["member_name"];	
	$email           = $_POST["email"];	
	$rent_no         = $_POST["rent_no"];	
	$amount          = $_POST["amount"];
	$user_id         = $_POST["member_id"];
	$goodsName       = $_POST["goodsName"];	
	$goodsCode       = substr($rent_no, -8, 8);
	
    $nowurl       = $_POST["nowurl"];
	
	
/*
	$center_id       = '05';	
	$member_code     = '00143910';	
	$member_name     = '이명학';	
	$email           = '';	
	$rent_no         = 'R202107110030';	
	$amount          = '15500';
	$goodsCode       = substr($rent_no, -8, 8);
	$user_id         = 'mydktk0';
*/

	session_start();
	$_SESSION["center_id"]       = $center_id;
	$_SESSION["member_code"]     = $member_code;
	$_SESSION["member_name"]     = $member_name;
	$_SESSION["email"]           = $email;
	$_SESSION["rent_no"]         = $rent_no;
	$_SESSION["amount"]          = $amount;
	$_SESSION["user_id"]         = $user_id;
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no">
<script src="https://api-std.mainpay.co.kr/js/mainpay.mobile-1.0.js"></script>
<script type='text/javascript'> 
	var READY_API_URL = "<?=$READY_API_URL?>";
	function payment() {		
		var request = mainpay_ready(READY_API_URL); 
		request.done(function(response) {
			if (response.resultCode == '200') {
				/* 결제창 호출 */
				location.href = response.data.nextMobileUrl; // *주의* PC와 Mobile은 URL이 상이합니다.
				return false;
			}
			alert("ERROR : "+JSON.stringify(response));			 				
		});		
	}
	window.onpopstate = function(){ history.go(-1)};
</script>  
</head>
<body onload="payment()">
	<!--<p>Mobile 버전 샘플 주문페이지</p>
	<div>
	-->
		<!-- id 고정 -->
		<form id="MAINPAY_FORM">
			<input type="hidden" name="paymethod" value="CARD"> <br>
			<input type="hidden" name="goodsCode" value="<?=$goodsCode?>"> <br> 
			<input type="hidden" name="goodsName" value="<?=$goodsName?>"> <br><br>
			<input type="hidden" name="goodsAmount" value="<?=$amount ?>"> <!--결제금액 -->
			<input type="hidden" name="memberName" value="<?=$member_name ?>">
			<input type="hidden" name="email" value="<?=$email ?>">
			<input type="hidden" name="nowurl" value="<?=$nowurl ?>">
		</form>
		<!--<button type="button" class="btn_submit" onclick="payment()">결제요청</button> -->
	<!--</div>
	<div>
	-->
		<!-- id 고정 -->
		<IFRAME id="MAINPAY_IFRAME" width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true"></IFRAME>
	<!--
	</div>
	-->
</body>
</html>

