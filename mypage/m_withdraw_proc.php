<?php
include_once('./_common.php');

header('Content-Type: application/json');



$member_id       = get_session('m_id');
$member_code       = get_session('m_code');

$member_pw = $_POST['member_pwd'];

$ip=get_real_client_ip();
//------------------------------------------------------------------------------------
// ● 함수명 : CF_Login
//------------------------------------------------------------------------------------

$json_string = CF_MEMBER_ID2($_SESSION['center_id'],$member_id, $member_pw, $url);
$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -30){
	
		$res = array(
		'Msg'  =>'비밀번호가 일치하지 않습니다.',
		'ResultMsg'  =>'비밀번호가 일치하지 않습니다.',
		'ResultCode'  =>'-30',
		'ReMsg'  =>'회원정보없음',			
		'result'  => false);
        die(json_encode($res));		
	
	
}else{

//echo $member_id;
//echo $member_name;
//echo $pwd_chk;
$json_string2 = CF_Join_Withdraw($_SESSION['center_id'],$member_code, $member_id, $ip, $url);

$json_array2 = json_decode($json_string2, true); 


if($json_array2['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'회원탈퇴실패.',
		'ResultMsg'  =>'회원탈퇴실패',
		'ResultCode'  =>'-10',
		'result'  => false);
		
		die(json_encode($res));

}else{
		 
      unset($_SESSION['m_id']);
	  unset($_SESSION['m_name']);
	  unset($_SESSION['m_code']);
	  unset($_SESSION['ss_mb_id']);
	  
	  
		$res = array(
		'link'  =>''.NC_URL.'',
		'Msg'  =>'회원탈퇴가 완료되었습니다.',
		'ResultMsg'  =>'회원탈퇴가 완료되었습니다.',
		'ResultCode'  =>'0',
		'ReMsg'  =>'회원탈퇴가 완료되었습니다.',		
		'result'  => true);
        die(json_encode($res));	
			
	
		



}	

}
	
	



