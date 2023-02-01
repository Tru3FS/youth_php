<?php
include_once('./_common.php');

header('Content-Type: application/json');

$member_name       = get_session('m_name');
$member_id       = get_session('m_id');
$member_code       = get_session('m_code');

$pwd = $_POST['pwd'];
$pwd_new = $_POST['pwd_new'];
$pwd_chk = $_POST['pwd_chk'];


//------------------------------------------------------------------------------------
// ● 함수명 : CF_FInd_ID 아이디찾기
//------------------------------------------------------------------------------------
if($pwd == $pwd_new){

		$res = array(
		'Msg'  =>'동일한 비밀번호 사용금지',
		'ResultMsg'  =>'동일한 비밀번호 사용금지',
		'ResultCode'  =>'-20',
		'ReMsg'  =>'동일한 비밀번호 사용금지',			
		'result'  => false);
        die(json_encode($res));		

}


$ip=get_real_client_ip();
$json_string = CF_MEMBER_ID2($_SESSION["center_id"],$member_id, $pwd, $url);
$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -30){
	
		$res = array(
		'Msg'  =>'회원정보체크실패',
		'ResultMsg'  =>'비밀번호가 일치하지 않습니다..',
		'ResultCode'  =>'-30',
		'ReMsg'  =>'회원정보없음',			
		'result'  => false);
        die(json_encode($res));		
	
	
}else{

//echo $member_id;
//echo $member_name;
//echo $pwd_chk;
$json_string2 = CF_Join_Pwd_Update($_SESSION['center_id'], $member_id, $pwd_chk, get_real_client_ip(), $url);

$json_array2 = json_decode($json_string2, true); 


if($json_array2['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'회원비밀번호수정실패.',
		'ResultMsg'  =>'회원비밀번호수정실패',
		'member_id'  =>''.$member_id.'',
		'ResultCode'  =>'-10',
		'result'  => false);
		
		die(json_encode($res));

}else{
		 

		$res = array(
		'Msg'  =>'회원비밀번호수정성공',
		'ResultMsg'  =>'비밀번호 변경이 완료되었습니다.',
		'ResultCode'  =>'1',
		'ReMsg'  =>'회원정보체크성공',		
		'result'  => true);
        die(json_encode($res));	
			
	
		



}	

}


	
	
	



