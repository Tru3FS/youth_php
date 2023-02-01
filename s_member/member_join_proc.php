<?php
include_once("./_common.php");
header('Content-Type: application/json');
$member_id = $_POST['mem_id'];
$member_name = $_POST['mem_name'];
$member_pw = $_POST['mem_pwd'];
$cellular = $_POST['mem_phone'];
$sex = $_POST['mem_gender'];
$birth = $_POST['mem_birth'];
$mb_name = $_POST['mb_name'];
$mb_phone = $_POST['mb_phone'];
 $center_id = $_SESSION['center_id'];

if ((get_session('child')!="") && (get_session('ss_cert_birth') !='')){



$birthday = str_replace('-','',$birth);
$birthage=$birth;

}else{

$birthday = str_replace('-','',get_session('ss_cert_birth'));

}




$solar_yn = $_POST['mem_birth_type'];
$ip=get_real_client_ip();

 $post_cert_no = isset($_POST['cert_no']) ? trim($_POST['cert_no']) : '';

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Join_New -> 회원정보 신규 저장 -> 차후에 본인인증 키값 insert 필요
//------------------------------------------------------------------------------------

$member_name        = clean_xss_tags($member_name);
$cellular         = clean_xss_tags($cellular);
$sms_yn = $_POST['mem_marketing'];


if($sms_yn==""){
   $sms_yn="N";
}else{
   $sms_yn="Y";
}	

   
if(get_session('child')!=""){

$member_name = $_POST['mem_name'];
$cellular = $mb_phone;
}else{

$member_name = $_POST['mb_name'];

}


$birth_time   = strtotime($birthage);
$now          = date('Ymd');
$birthday2     = date('Ymd' , $birth_time);
$age           = floor(($now - $birthday2) / 10000);




if(get_session('child')!="" && $age > 13){

         $res = array(
		'Msg'  =>'어린이 회원(만 14세미만)가입입니다.생년월일을 다시 확인하세요.',
		'member_id'  =>'',
		'member_name'  =>'',
		'ResultMsg'  =>'',
		'ResultCode'  =>'',
    	'ResultCode'  =>'8',
		'result'  => false);
		
		die(json_encode($res));

}

$md5_cert_no = get_session('ss_cert_no');
$cert_type = get_session('ss_cert_type');

if(get_session('child')==""){
 if(get_session('ss_cert_hash') == md5($member_name.$cert_type.get_session('ss_cert_birth').$md5_cert_no)) { // 본인인증 hash 값 체크 hp포함 비교한후 일치하는지 여부 체크후 저장
       /* $sql_certify .= " cellular = '{$cellular}' ";
        $sql_certify .= " , certify  = '{$cert_type}' ";
        $sql_certify .= " , adult = '".get_session('ss_cert_adult')."' ";
        $sql_certify .= " , birth = '".get_session('ss_cert_birth')."' ";
        $sql_certify .= " , sex = '".get_session('ss_cert_sex')."' ";
        $sql_certify .= " , dupinfo = '".get_session('ss_cert_dupinfo')."' ";
        $sql_certify .= " , mb_name = '{$member_name}' ";*/
    }else {
       // alert('본인인증된 정보와 입력된 회원정보가 일치하지않습니다. 다시시도 해주세요');

      $res = array(
		'Msg'  =>'본인인증된 정보와 입력된 회원가입정보가 일치하지않습니다. 다시시도 해주세요.',
		'member_id'  =>'',
		'member_name'  =>'',
		'ResultMsg'  =>'',
		'ResultCode'  =>'',
    	'ResultCode'  =>'9',
		'result'  => false);
		
		die(json_encode($res));

    }

}


$md5_cert_no = get_session('ss_cert_no');
$cert_type = get_session('ss_cert_type');



$json_string = CF_Join_New($_SESSION['center_id'], $member_id, $member_pw, $member_name, $birthday, $sex, $solar_yn, $cellular, $sms_yn, $ip, $url,get_session('ss_cert_dupinfo'),get_session('ss_cert_no'));

$json_array = json_decode($json_string, true); 

 if($post_cert_no !== get_session('ss_cert_no') || !get_session('ss_cert_no') || !get_session('agree2') || !get_session('agree3')){


		$res = array(
		'Msg'  =>'회원가입을 위해서는 본인인증을 해주셔야 합니다.',
		'member_id'  =>'',
		'member_name'  =>'',
		'ResultMsg'  =>'',
		'ResultCode'  =>'',
    	'ResultCode'  =>'2',
		'result'  => false);
		
		die(json_encode($res));


 }else{


if($json_array['Result']['ResultCode'] == 0){


       



	
		$res = array(
		'Msg'  =>'회원가입이 완료되었습니다.',
		'member_id'  =>''.$member_id.'',
		'member_name'  =>''.$member_name.'',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));




}else{

		 $res = array(
		'Msg'  =>'가입실패',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => false);
        die(json_encode($res));

}	
	
 }




?>