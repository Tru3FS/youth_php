<?php

$res =   "stdClass Object ( [resultCode] => 0000 [resultMsg] => 정상 처리되었습니다. [tid] => UT0000113m01012301161205502062 "
		."[cancelledTid] => [orderId] => 202301160245 [ediDate] => 2023-01-16T12:05:51.340+0900 "
		."[signature] => 960030893db1b18cbc3e69074da496fec9a4f9be2e8e495360bcecffc1a15129 [status] => paid "
		."[paidAt] => 2023-01-16T12:05:51.000+0900 [failedAt] => 0 [cancelledAt] => 0 [payMethod] => card "
		."[amount] => 32000 [balanceAmt] => 32000 [goodsName] => :주말농구C (토일 18시) [mallReserved] => [useEscrow] => "
		."[currency] => KRW [channel] => pc [approveNo] => 000000 [buyerName] => [buyerTel] => [buyerEmail] => [receiptUrl] "
		."=> https://npg.nicepay.co.kr/issue/IssueLoader.do?type=0&innerWin=Y&TID=UT0000113m01012301161205502062 [mallUserId] => "
		."[issuedCashReceipt] => [coupon] => [card] => stdClass Object ( [cardCode] => 04 [cardName] => 삼성 [cardNum] "
		."=> 12341234****1234 [cardQuota] => 0 [isInterestFree] => [cardType] => credit [canPartCancel] => 1 [acquCardCode] "
		."=> 04 [acquCardName] => 삼성 ) [vbank] => [bank] => [cellphone] => [cancels] => [cashReceipts] => ) ";
//$resObject = json_decode(json_encode($res),true);
$resObject = json_encode($res,true);

echo $resObject.' count='.count($resObject);
//echo 'resultCode='. $resObject['resultCode'].'<br />';

//if(!empty($resObject)){
  foreach ($resObject as $key=>$value) {
      echo $key . '=' . $value . '<br />';

      if($key == 'resultCode'){
         $resultCode = $value;
      }

      if($key == 'resultMsg'){
         $resultMsg = $value;
      }

      if($key == 'approveNo'){
         $approveNo = $value;
      }

      if($key == 'amount'){
         $amount = $value;
      }

      if($key == 'coupon'){
         if(is_object($value)){
            $d = get_object_vars($d);
			echo var_dump($d);
         }
         
         if(is_array($d)){
			 
         }

      }

      if($key == 'card'){
         if(is_object($value)){
            $d = get_object_vars($d);
			echo $d;
         }
         
         if(!empty($d)){
            foreach($d as $inner_key => $inner_value){
               $cardCode = $inner_value;
            }
         }
      }

	}
//} else {
//	echo 'empty object';
//}


  echo $resultCode.'<br>';
  echo $resultMsg.'<br>';
  echo 'cardCode : '.$cardCode.'<br>';
?>