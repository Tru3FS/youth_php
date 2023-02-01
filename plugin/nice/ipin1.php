<?php
include_once('./_common.php');

// 금일 인증시도 회수 체크
certify_count_check($member['mb_id'], 'ipin');

include_once('./ipin.config.php');

// 실행방법은 싱글쿼터(`) 외에도, 'exec(), system(), shell_exec()' 등등 귀사 정책에 맞게 처리하시기 바랍니다.
$sCPRequest = `$sModulePath SEQ $sSiteCode`;
	
// 현재 예제로 저장한 세션은 ipin_result.php 페이지에서 데이타 위변조 방지를 위해 확인하기 위함입니다.
// 필수사항은 아니며, 보안을 위한 권고사항입니다.
$_SESSION['CPREQUEST'] = $sCPRequest;
    
$sEncData					= "";			// 암호화 된 데이타
$sRtnMsg					= "";			// 처리결과 메세지
	
// 리턴 결과값에 따라, 프로세스 진행여부를 파악합니다.
// 실행방법은 싱글쿼터(`) 외에도, 'exec(), system(), shell_exec()' 등등 귀사 정책에 맞게 처리하시기 바랍니다.
$sEncData	= `$sModulePath REQ $sSiteCode $sSitePw $sCPRequest $sReturnURL`;

// 리턴 결과값에 따른 처리사항
if ($sEncData == -9)
{
	$sRtnMsg = "입력값 오류 : 암호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";
} else {
	$sRtnMsg = "$sEncData 변수에 암호화 데이타가 확인되면 정상, 정상이 아닌 경우 리턴코드 확인 후 NICE평가정보 개발 담당자에게 문의해 주세요.";
}

$g5['title'] = 'NICE 아이핀 본인확인';
include_once(G5_PATH.'/head.sub.php');
?>
<script language='javascript'>
window.name ="Parent_window";
</script>
<form name="niceInForm" method="post" action="<?php echo $niceForm_action; ?>">
	<input type="hidden" name="m" value="pubmain">						<!-- 필수 데이타로, 누락하시면 안됩니다. -->
    <input type="hidden" name="enc_data" value="<?= $sEncData ?>">		<!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
    
    <!-- 업체에서 응답받기 원하는 데이타를 설정하기 위해 사용할 수 있으며, 인증결과 응답시 해당 값을 그대로 송신합니다.
    	 해당 파라미터는 추가하실 수 없습니다. -->
    <input type="hidden" name="param_r1" value="">
    <input type="hidden" name="param_r2" value="">
    <input type="hidden" name="param_r3" value="">
</form>
<script>
document.niceInForm.submit();
</script>

<?php
include_once(G5_PATH.'/tail.sub.php');
?>