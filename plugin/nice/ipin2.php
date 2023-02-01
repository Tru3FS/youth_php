<?php
include_once('./_common.php');
include_once('./ipin.config.php');
$g5['title'] = 'NICE 아이핀 본인확인';
include_once(G5_PATH.'/head.sub.php');

// 사용자 정보 및 CP 요청번호를 암호화한 데이타입니다. (ipin_main.php 페이지에서 암호화된 데이타와는 다릅니다.)
$sResponseData = $_POST['enc_data'];

// ipin_main.php 페이지에서 설정한 데이타가 있다면, 아래와 같이 확인가능합니다.
$sReservedParam1  = $_POST['param_r1'];
$sReservedParam2  = $_POST['param_r2'];
$sReservedParam3  = $_POST['param_r3'];

//////////////////////////////////////////////// 문자열 점검///////////////////////////////////////////////
if(preg_match('~[^0-9a-zA-Z+/=]~', $sResponseData, $match)) {echo "입력 값 확인이 필요합니다"; exit;}
if(base64_encode(base64_decode($sResponseData))!= $sResponseData) {echo " 입력 값 확인이 필요합니다"; exit;}	
if(preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam1, $match)) {echo "문자열 점검 : ".$match[0]; exit;}
if(preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam2, $match)) {echo "문자열 점검 : ".$match[0]; exit;}
if(preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $sReservedParam3, $match)) {echo "문자열 점검 : ".$match[0]; exit;}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
// 암호화된 사용자 정보가 존재하는 경우
if ($sResponseData != "") {
    $sEncData					= $sResponseData;			// 암호화 된 사용자 인증 정보
    $sDecData					= "";			// 복호화 된 사용자 인증 정보

    $sRtnMsg					= "";			// 처리결과 메세지

    $sEncData = $_POST['enc_data'];	// ipin_process.php 에서 리턴받은 암호화 된 사용자 인증 정보
    $sCPRequest = $_SESSION['CPREQUEST'];
    		
    //////////////////////////////////////////////// 문자열 점검///////////////////////////////////////////////
    if(preg_match('~[^0-9a-zA-Z+/=]~', $sEncData, $match)) {echo "입력 값 확인이 필요합니다"; exit;}
    if(base64_encode(base64_decode($sEncData))!=$sEncData) {echo " 입력 값 확인이 필요합니다"; exit;}	
    
    
    // 사용자 정보를 복호화 합니다.
    // 실행방법은 싱글쿼터(`) 외에도, 'exec(), system(), shell_exec()' 등등 귀사 정책에 맞게 처리하시기 바랍니다.
    $sDecData = `$sModulePath RES $sSiteCode $sSitePw $sEncData`;
    	
    if ($sDecData == -9) {
        $sRtnMsg = "입력값 오류 : 복호화 처리시, 필요한 파라미터값의 정보를 정확하게 입력해 주시기 바랍니다.";
    } else if ($sDecData == -12) {
        $sRtnMsg = "NICE평가정보에서 발급한 개발정보가 정확한지 확인해 보세요.";
    } else {
        // 복호화된 데이타 구분자는 ^ 이며, 구분자로 데이타를 파싱합니다.
        /*
        	- 복호화된 데이타 구성
        	가상주민번호확인처리결과코드^가상주민번호^성명^중복확인값(DupInfo)^연령정보^성별정보^생년월일(YYYYMMDD)^내외국인정보^고객사 요청 Sequence
        */
        $arrData = split("\^", $sDecData);
        $iCount = count($arrData);
        
        if ($iCount >= 5) {
        
        	/*
        	다음과 같이 사용자 정보를 추출할 수 있습니다.
        	사용자에게 보여주는 정보는, '이름' 데이타만 노출 가능합니다.
        
        	사용자 정보를 다른 페이지에서 이용하실 경우에는
        	보안을 위하여 암호화 데이타($sEncData)를 통신하여 복호화 후 이용하실것을 권장합니다. (현재 페이지와 같은 처리방식)
        	
        	만약, 복호화된 정보를 통신해야 하는 경우엔 데이타가 유출되지 않도록 주의해 주세요. (세션처리 권장)
        	form 태그의 hidden 처리는 데이타 유출 위험이 높으므로 권장하지 않습니다.
        */
        
        $strResultCode	= $arrData[0];			// 결과코드
        if ($strResultCode == 1) {
            $strCPRequest	= $arrData[8];			// CP 요청번호
            
            if ($sCPRequest == $strCPRequest) {
            
            	$sRtnMsg = "사용자 인증 성공";
            	
            	  $strVno      		= $arrData[1];	// 가상주민번호 (13자리이며, 숫자 또는 문자 포함)
            	  $strUserName		= $arrData[2];	// 이름
            	  $strDupInfo			= $arrData[3];	// 중복가입 확인값 (64Byte 고유값)
            	  $strAgeInfo			= $arrData[4];	// 연령대 코드 (개발 가이드 참조)
                $strGender			= $arrData[5];	// 성별 코드 (개발 가이드 참조)
                $strBirthDate		= $arrData[6];	// 생년월일 (YYYYMMDD)
                $strNationalInfo	= $arrData[7];	// 내/외국인 정보 (개발 가이드 참조)
            
            } else {
                $sRtnMsg = "CP 요청번호 불일치 : 세션에 넣은 $sCPRequest 데이타를 확인해 주시기 바랍니다.";
            }
        } else {
            $sRtnMsg = "리턴값 확인 후, NICE평가정보 개발 담당자에게 문의해 주세요. [$strResultCode]";
        }
        
        } else {
            $sRtnMsg = "리턴값 확인 후, NICE평가정보 개발 담당자에게 문의해 주세요.";
        }
    }
} else {
?>
<script>
alert('사용자 정보가 존재하지 않습니다.');
self.close();
</script>
<?
}

if( $sRtnMsg == "사용자 인증 성공") {
	
    $mb_name = iconv("EUC-KR", "UTF-8", $strUserName);
    $req_num = $strVno;
    $mb_birth = $strBirthDate;
    $mb_dupinfo = $strDupInfo;

    // 중복정보 체크
    $sql = " select mb_id from {$g5['member_table']} where mb_id <> '{$member['mb_id']}' and mb_dupinfo = '{$mb_dupinfo}' ";
    $row = sql_fetch($sql);
    if ($row['mb_id']) {
        alert_close("입력하신 본인확인 정보로 가입된 내역이 존재합니다.\\n회원아이디 : ".$row['mb_id']);
    }

    // hash 데이터
    $cert_type = 'ipin';
    $md5_cert_no = md5($req_num);
    $hash_data   = md5($mb_name.$cert_type.$mb_birth.$md5_cert_no);

    // 성인인증결과
    $adult = $strAgeInfo > 5 ? 1 : 0;

    set_session('ss_cert_type',    $cert_type);
    set_session('ss_cert_no',      $md5_cert_no);
    set_session('ss_cert_hash',    $hash_data);
    set_session('ss_cert_adult',   $adult);
    set_session('ss_cert_birth',   $mb_birth);
    set_session('ss_cert_sex',     ($strGender == 1 ? 'M' : 'F'));
    set_session('ss_cert_dupinfo', $mb_dupinfo);
?>
<script>
$(function() {
    var $opener = window.opener;

    $opener.$("input[name=cert_type]").val("<?php echo $cert_type; ?>");
    $opener.$("input[name=mb_name]").val("<?php echo $mb_name; ?>").attr("readonly", true);
    $opener.$("input[name=cert_no]").val("<?php echo $md5_cert_no; ?>");

    $opener.$("#fregisterform").submit();
    window.close();
});
</script>	
<?php
} else {
?>
<script>
alert('<?php echo $sRtnMsg ?>');
self.close();
</script>
<?php
}
include_once(G5_PATH.'/tail.sub.php');
?>