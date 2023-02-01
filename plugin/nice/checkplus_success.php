<?php
include_once('./_common.php');
include_once('./checkplus.config.php');

include_once(NC_PATH.'/head3.sub.php');


$enc_data = $_REQUEST["EncodeData"];		// 암호화된 결과 데이타
//////////////////////////////////////////////// 문자열 점검///////////////////////////////////////////////
if(preg_match('~[^0-9a-zA-Z+/=]~', $enc_data, $match)) {echo "입력 값 확인이 필요합니다 : ".$match[0]; exit;} // 문자열 점검 추가. 
if(base64_encode(base64_decode($enc_data))!=$enc_data) {echo "입력 값 확인이 필요합니다"; exit;}

///////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($enc_data != "") {

    $plaindata = `$cb_encode_path DEC $sitecode $sitepasswd $enc_data`;		// 암호화된 결과 데이터의 복호화
    //echo "[plaindata]  " . $plaindata . "<br>";

    if ($plaindata == -1){
        $returnMsg  = "암/복호화 시스템 오류";
    }else if ($plaindata == -4){
        $returnMsg  = "복호화 처리 오류";
    }else if ($plaindata == -5){
        $returnMsg  = "HASH값 불일치 - 복호화 데이터는 리턴됨";
    }else if ($plaindata == -6){
        $returnMsg  = "복호화 데이터 오류";
    }else if ($plaindata == -9){
        $returnMsg  = "입력값 오류";
    }else if ($plaindata == -12){
        $returnMsg  = "사이트 비밀번호 오류";
    }else{
        // 복호화가 정상적일 경우 데이터를 파싱합니다.
        $ciphertime = `$cb_encode_path CTS $sitecode $sitepasswd $enc_data`;	// 암호화된 결과 데이터 검증 (복호화한 시간획득)
    
        $requestnumber = GetValue($plaindata , "REQ_SEQ");
        $responsenumber = GetValue($plaindata , "RES_SEQ");
        $authtype = GetValue($plaindata , "AUTH_TYPE");
        $name = GetValue($plaindata , "NAME");
        //$name = GetValue($plaindata , "UTF8_NAME"); //charset utf8 사용시 주석 해제 후 사용
        $birthdate = GetValue($plaindata , "BIRTHDATE");
        $gender = GetValue($plaindata , "GENDER");
        $nationalinfo = GetValue($plaindata , "NATIONALINFO");	//내/외국인정보(사용자 매뉴얼 참조)
        $dupinfo = GetValue($plaindata , "DI");
        $conninfo = GetValue($plaindata , "CI");
        $mobileno = GetValue($plaindata , "MOBILE_NO");
        $mobileco = GetValue($plaindata , "MOBILE_CO");

        if(strcmp($_SESSION["REQ_SEQ"], $requestnumber) != 0)
        {
            echo "세션값이 다릅니다. 올바른 경로로 접근하시기 바랍니다.<br>";
            $requestnumber = "";
            $responsenumber = "";
            $authtype = "";
            $name = "";
            $birthdate = "";
            $gender = "";
            $nationalinfo = "";
            $dupinfo = "";
            $conninfo = "";
		        $mobileno = "";
		        $mobileco = "";
        }
    }
} else {
?>
<script>
alert('사용자 정보가 존재하지 않습니다.');
self.close();
</script>
<?php
}
if( $responsenumber != "" ) {
    // 인증결과처리
    $mb_name = iconv("EUC-KR", "UTF-8", $name);
    $req_num = $responsenumber;
    $mb_birth = $birthdate;
    $mb_dupinfo = $dupinfo;
    $phone_no = hyphen_hp_number($mobileno);

    
    $age = date(Y)-substr($mb_birth,0,4)+1;
    // 현재년도-생년+1 으로 현재나이 계산 추가



$ip=get_real_client_ip();

$connect_db = mysqli_connect(NC_MYSQL_HOST, NC_MYSQL_USER, NC_MYSQL_PASSWORD, NC_MYSQL_DB,'3306');

sql_set_charset('utf8', $connect_db);

	mysqli_autocommit($connect_db, FALSE);

$sql= " insert into tb_identification_log (cr_company,cr_method, cr_ip, cr_date, cr_time) value ('$mb_name','hp','$ip','".NC_TIME_YMD."','".NC_TIME_HIS."')";
		
if(mysqli_query($connect_db, $sql)){  

		} else {  
			mysqli_error();
		}
	mysqli_commit($connect_db);	
	
	mysqli_close($connect_db);


if (get_session('child')==''){
    // 중복정보 체크
    $sql = " select Web_ID, Ins_Date from TB_Member where Web_ID <> '{$member['Web_ID']}' and Dupinfo = '{$mb_dupinfo}' ";
    $row = sql_fetch($sql);
    if ($row['Web_ID']) {

          $web_id = $row['Web_ID'];
          $web_id = substr($web_id, 0, -3)."***";  

          $Ins_Date = $row['Ins_Date'];
         
	      $s_date1 = substr($Ins_Date,0,4);
		  $s_date2 = substr($Ins_Date,4,2);
		  $s_date3 = substr($Ins_Date,6,2);

         $m_join_date=  $s_date1."년".$s_date2."월".$s_date3."일";

?>

<script>
$(function() {
    var $opener = window.opener;

    //$opener.$("input[name=cert_type]").val("<?php echo $cert_type; ?>");
    //$opener.$("input[name=mb_name]").val("<?php echo $mb_name; ?>").attr("readonly", true);
    //$opener.$("input[name=mb_hp]").val("<?php echo $phone_no; ?>").attr("readonly", true);
    //$opener.$("input[name=cert_no]").val("<?php echo $md5_cert_no; ?>");

                                        var rsult="";	  
 					                    NC.alert({
											    title    : "본인인증 정보로 가입된 회원정보가 존재합니다.",
                                                message    : "회원가입일 : <?php echo $m_join_date;?><br>회원아이디 : '<?php echo $web_id;?>'",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
                                                        self.close();
                                                        $opener.location.href="../../s_member/login.php";
									 
                                                       												
                            
                                                 }, on_cancel : function(){
                                                         self.close();
                 
                                                 }  });	


});
</script>

<?php
	
	}else{



    // hash 데이터
    $cert_type = 'hp';
    $md5_cert_no = md5($req_num);
    $hash_data   = md5($mb_name.$cert_type.$mb_birth.$md5_cert_no);

    // 성인인증결과
    $adult_day = date("Ymd", strtotime("-19 years", NC_SERVER_TIME));
    $adult = ((int)$mb_birth <= (int)$adult_day) ? 1 : 0;

    set_session('ss_cert_type',    $cert_type);
    set_session('ss_cert_no',      $md5_cert_no);
    set_session('ss_cert_hash',    $hash_data);
    set_session('ss_cert_adult',   $adult);
    set_session('ss_cert_birth',   $mb_birth);
    set_session('ss_cert_sex',     ($gender == 1 ? 'M' : 'F'));
    set_session('ss_cert_dupinfo', $mb_dupinfo);
	set_session('ss_cert_age', $age);
    set_session('agree2', '1');
	set_session('agree3', '1');

   


?>
<script>
$(function() {
    var $opener = window.opener;

    //$opener.$("input[name=cert_type]").val("<?php echo $cert_type; ?>");
    //$opener.$("input[name=mb_name]").val("<?php echo $mb_name; ?>").attr("readonly", true);
    //$opener.$("input[name=mb_hp]").val("<?php echo $phone_no; ?>").attr("readonly", true);
    //$opener.$("input[name=cert_no]").val("<?php echo $md5_cert_no; ?>");

                                        var rsult="";	  
 					                    NC.alert({
											    title    : '본인 인증이 완료되었습니다.',
                                                message    : '회원가입을 진행하시겠습니까?',
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
                                                        self.close();
                                                        rsult += "<form name='form1' method='post' action='<?php echo NC_MEMBER_URL;?>/m_join_step_01.php' target='window.opener'>";
														rsult += "<input type='hidden' name='cert_type' value='<?php echo $cert_type; ?>'>";	
		                                                rsult += "<input type='hidden' name='mb_name' value='<?php echo $mb_name; ?>'>";	
		                                                rsult += "<input type='hidden' name='mb_hp' value='<?php echo $phone_no; ?>'>";	
														rsult += "<input type='hidden' name='cert_no' value='<?php echo $md5_cert_no; ?>'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
														
                            
                                                 }, on_cancel : function(){
                                                         self.close();
                 
                                                 }  });	


   
    

 //alert("본인 인증이 완료되었습니다.");
                                  

	                                               


});
</script>
<?php

	}

	}else{

    // hash 데이터
    $cert_type = 'hp';
    $md5_cert_no = md5($req_num);
    $hash_data   = md5($mb_name.$cert_type.$mb_birth.$md5_cert_no);

    // 성인인증결과
    $adult_day = date("Ymd", strtotime("-19 years", NC_SERVER_TIME));
    $adult = ((int)$mb_birth <= (int)$adult_day) ? 1 : 0;

    set_session('ss_cert_type',    $cert_type);
    set_session('ss_cert_no',      $md5_cert_no);
    set_session('ss_cert_hash',    $hash_data);
    set_session('ss_cert_adult',   $adult);
    set_session('ss_cert_birth',   $mb_birth);
    set_session('ss_cert_sex',     ($gender == 1 ? 'M' : 'F'));
    set_session('ss_cert_dupinfo', $mb_dupinfo);
	set_session('ss_cert_age', $age);
    set_session('agree2', '1');
	set_session('agree3', '1');

   


?>
<script>
$(function() {
    var $opener = window.opener;

    //$opener.$("input[name=cert_type]").val("<?php echo $cert_type; ?>");
    //$opener.$("input[name=mb_name]").val("<?php echo $mb_name; ?>").attr("readonly", true);
    //$opener.$("input[name=mb_hp]").val("<?php echo $phone_no; ?>").attr("readonly", true);
    //$opener.$("input[name=cert_no]").val("<?php echo $md5_cert_no; ?>");

                                        var rsult="";	  
 					                    NC.alert({
											    title    : '본인 인증이 완료되었습니다.',
                                                message    : '회원가입을 진행하시겠습니까?',
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
                                                        self.close();
                                                        rsult += "<form name='form1' method='post' action='<?php echo NC_MEMBER_URL;?>/m_join_step_01.php' target='window.opener'>";
														rsult += "<input type='hidden' name='cert_type' value='<?php echo $cert_type; ?>'>";	
		                                                rsult += "<input type='hidden' name='mb_name' value='<?php echo $mb_name; ?>'>";	
		                                                rsult += "<input type='hidden' name='mb_hp' value='<?php echo $phone_no; ?>'>";	
														rsult += "<input type='hidden' name='cert_no' value='<?php echo $md5_cert_no; ?>'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
														
                            
                                                 }, on_cancel : function(){
                                                         self.close();
                 
                                                 }  });	


   
    

 //alert("본인 인증이 완료되었습니다.");
                                  

	                                               


});
</script>
<?php

	}

} else {
?>
<script>
alert('<?php echo $returnMsg;?>');
self.close();
</script>
<?php
}
include_once(NC_PATH.'/tail3.php');
?>