<?php


define('_certify_', true);

include_once('./_common.php');
include_once(NC_PATH.'/head3.sub.php');

$ip=get_real_client_ip();


// 금일 인증시도 회수 체크
certify_count_check($member['Web_ID'], 'hp', $ip);






$center_id= $_REQUEST["center_id"];

// nice 휴대폰인증파일
include_once(NC_NICE_PATH.'/checkplus.config.php');
    
$child = $_REQUEST["child"];		
set_session('child',    $child);





// reqseq값은 성공페이지로 갈 경우 검증을 위하여 세션에 담아둔다.

$_SESSION["REQ_SEQ"] = $reqseq;


// 입력될 plain 데이타를 만든다.
$plaindata = "7:REQ_SEQ" . strlen($reqseq) . ":" . $reqseq .
		 "8:SITECODE" . strlen($sitecode) . ":" . $sitecode .
		 "9:AUTH_TYPE" . strlen($authtype) . ":". $authtype .
		 "7:RTN_URL" . strlen($returnurl) . ":" . $returnurl .
		 "7:ERR_URL" . strlen($errorurl) . ":" . $errorurl .
		 "11:POPUP_GUBUN" . strlen($popgubun) . ":" . $popgubun .
		 "9:CUSTOMIZE" . strlen($customize) . ":" . $customize .
		 "6:GENDER" . strlen($gender) . ":" . $gender ;

$enc_data = `$cb_encode_path ENC $sitecode $sitepasswd $plaindata`;

if( $enc_data == -1 )
{
    $returnMsg = "암/복호화 시스템 오류입니다.";
    $enc_data = "";
}
else if( $enc_data== -2 )
{
    $returnMsg = "암호화 처리 오류입니다.";
    $enc_data = "";
}
else if( $enc_data== -3 )
{
    $returnMsg = "암호화 데이터 오류 입니다.";
    $enc_data = "";
}
else if( $enc_data== -9 )
{
    $returnMsg = "입력값 오류 입니다.";
    $enc_data = "";
}



?>
<script language='javascript'>
window.name ="Parent_window";
</script>
<form name="niceInForm" method="post" action="<?php echo $niceForm_action; ?>">
    <input type="hidden" name="m" value="checkplusSerivce">						<!-- 필수 데이타로, 누락하시면 안됩니다. -->
		<input type="hidden" name="child" value="<?php echo $child;?>">
		<input type="hidden" name="reqseq" value="<?php echo $_SESSION["REQ_SEQ"];?>">
		<input type="hidden" name="center_id" value="<?php echo $center_id;?>">
		<input type="hidden" name="EncodeData" value="<?php echo $enc_data;?>">		<!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
		<input type="hidden" name="enc_data" value="<?php echo $enc_data;?>">		<!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
</form>
<script>
document.niceInForm.submit();
</script>

<?php
include_once(NC_PATH.'/tail3.php');
?>