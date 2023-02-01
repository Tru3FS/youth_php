<?php

	/********************************************************************************	
	  결제창 종료시에 PG사에서 호출하는 페이지 입니다.
	  상점에서 필요한 로직 추가	
	********************************************************************************/
	

include_once("../common.php");
  
session_start();
$nowurl          = $_SESSION['nowurl'];


echo "<script>alert('결제가 종료되었습니다.');</script>";
echo "<script>window.parent.location.href='$nowurl';</script>";
?>
<!--
<meta name="viewport" content="width=device-width, user-scalable=no">
<script src="https://api-std.mainpay.co.kr/js/mainpay.pc-1.0.js"></script>
결제가 종료되었습니다.
-->