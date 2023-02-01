<?php
include_once('./_common.php');

header('Content-Type: application/json');

$member_name       = $_POST['mem_name'];
$cellular = $_POST['mem_phone'];


//------------------------------------------------------------------------------------
// ● 함수명 : CF_FInd_ID 아이디찾기
//------------------------------------------------------------------------------------

$json_string = CF_FInd_ID($_SESSION['center_id'],$cellular, $member_name, $url);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'아이디찾기실패.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}else{
		    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
	        
	
        	}
		
		    
		  $mem_id = $val['Web_ID'];
          /*$mem_id = substr($mem_id, 0, -3)."***"; */

		}else{

  
         
		}			
	    	}
		
		if($mem_id==""){
		
		$res = array(
		'Msg'  =>'일치하는 회원정보가 없습니다.',
		'ResultMsg'  =>'일치하는 회원정보가 없습니다.',
		'ResultCode'  =>'0',
		'result'  => false);
        die(json_encode($res));
		}else{
		$res = array(
		'Msg'  =>'아이디찾기성공',
		'Member_ID'  =>''.$mem_id.'',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>'1',
		'result'  => false);
        die(json_encode($res));	
			
		}	
		
		
	
}	
	
	



