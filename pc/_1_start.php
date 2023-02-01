<?php
    header('Content-Type: text/html; charset=utf-8');
	$cardurl       = $_POST["CARDURL"];
	$READY_API_URL = "https://sports.samsungnc.com/Noble/pc/_2_ready.php"	;
   
   	
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
<script src="https://api-std.mainpay.co.kr/js/mainpay.pc-1.1.js"></script>
<script type='text/javascript'> 
	var READY_API_URL = "<?=$READY_API_URL?>";
	function payment() {		
		var request = Mainpay.ready(READY_API_URL); 
		request.done(function(response) {
			alert("1");
			if (response.resultCode == '200') {
				alert("2");
				/* 결제창 호출 */
				Mainpay.open(response.data.nextPcUrl); //*주의* PC와 Mobile은 URL이 상이합니다.
				return false;
			}
			alert("3");
			alert("ERROR : "+JSON.stringify(response));			 				
		});		
	}
	window.onpopstate = function(){ history.go(-1)};
	
	/* 결제 팝업이 닫혔을 경우 호출*/
	function mainpay_close_event() {
		//alert("결제창이 닫혔습니다.");
        location.href="<?php echo $nowurl;?>";
		window.close();	
	}
</script>  
</head>
<body>
	<div>
		<!-- id 고정 -->
		<form id="MAINPAY_FORM">
			<input type="hidden" name="paymethod" value="CARD"> <br>
			<input type="hidden" name="goodsCode" value="123456"> <br> 
			<input type="hidden" name="goodsName" value="test"> <br><br>
			<input type="hidden" name="goodsAmount" value="4000"> <!--결제금액 -->
			<input type="hidden" name="memberName" value="">
			<input type="hidden" name="email" value="">
			<input type="hidden" name="nowurl" value="">
		</form>
		<button type="button" class="btn_submit" onclick="payment()">결제요청</button>
	</div>
</body>
</html>
