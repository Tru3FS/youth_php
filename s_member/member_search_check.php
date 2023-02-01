<?php
include_once('./_common.php');

header('Content-Type: application/json');

$member_name = $_POST['mem_name'];
$cellular    = $_POST['mem_phone'];
$birth       = $_POST['mem_birth'];
$center_id   = $_SESSION["center_id"];
$member_id   = $_POST['mem_id'];



//$cellular = str_replace('-','',$cellular);

//------------------------------------------------------------------------------------
// ● 함수명 : CF_FInd_ID 아이디찾기
//------------------------------------------------------------------------------------

$json_string = CF_MEMBER_ID5($center_id, $member_name, $cellular, $birth, $url);
$json_array = json_decode($json_string, true); 

 



if($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'회원정보체크실패',
		'ResultMsg'  =>'',
		'ResultCode'  =>'3',
		'ReMsg'  =>'회원정보없음',			
		'result'  => false);
        die(json_encode($res));		
	
	
}else if($json_array['Result']['ResultCode'] == 3){
		
		$res = array(
		'Msg'  =>'이미 가입한 정보가 있습니다..',
		'ResultMsg'  =>'',
		'ResultCode'  =>'3',
        'member_id'  =>''.$json_array['Result']['web_id'].'',
		'member_code'  =>''.$json_array['Result']['Result_Code'].'',
		'result'  => false);
        die(json_encode($res));
  }else if($json_array['Result']['ResultCode'] == 2){
		
		$res = array(
		'Msg'  =>'일치하는 회원정보가 2건 이상 존재합니다.',
		'ResultMsg'  =>'안내데스크 안내.',
		'ResultCode'  =>'2',
		'result'  => false);
        die(json_encode($res));
  }else if($json_array['Result']['ResultCode'] == 4){
		
		$res = array(
		'Msg'  =>'이미 가입한 정보가 있습니다.',
		'ResultMsg'  =>'.',
		'ResultCode'  =>'4',
        'member_id'  =>''.$json_array['Result']['web_id'].'',
		'member_code'  =>''.$json_array['Result']['Result_Code'].'',
		'result'  => false);
        die(json_encode($res));
  }else if($json_array['Result']['ResultCode'] == 1){
		$res = array(
		'Msg'  =>'일치하는 회원 정보가 없습니다.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>'1',
		'result'  => false);
        die(json_encode($res));	
			
     }else if($json_array['Result']['ResultCode'] == 0){







			$res = array(
		'Msg'  =>'오프라인등록회원조회성공 온라인 가입 X',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>'0',
		'member_code'  =>''.$json_array['Result']['Result_Code'].'',
		'result'  => false);
        die(json_encode($res));		


		}
		
	
	
	



