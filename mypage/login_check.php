<?php
include_once('./_common.php');

header('Content-Type: application/json');



$member_id       = $_POST['member_id'];


$member_pw = $_POST['member_pwd'];

$medit_link = $_POST['medit_link'];

$member_t_id = $_POST['member_t_id'];
$center_id = get_session("center_id");

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Login
//------------------------------------------------------------------------------------

$json_string = CF_Login($center_id, $member_id, $member_pw, $url);



$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -10){
	
		$res = array(
		'Msg'  =>'회원로그인실패.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}elseif($json_array['Result']['ResultCode'] == -30){
	

		 $res = array(
		'Msg'  =>'존재하지 않는 아이디입니다.',
		'member_id'  =>''.$member_id.'',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
        die(json_encode($res));

}elseif($json_array['Result']['ResultCode'] == -20){
	

		 $res = array(
		'Msg'  =>'아이디 또는 비밀번호가 일치하지 않습니다',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
        die(json_encode($res));

}else{
	
	    set_session('member_id', $member_id);
		
        if($medit_link==''){	
			
	    // 아이디 쿠키에 한달간 저장
	    if ($auto_login=='1') {
  
	     // 자동로그인 ---------------------------
	    // 쿠키 한달간 저장
	    $key = md5($_SERVER['SERVER_ADDR'] . $_SERVER['SERVER_SOFTWARE'] . $_SERVER['HTTP_USER_AGENT'] . $member_pw);
	    set_cookie('ck_mb_id', $member_id, 86400 * 31);
	    set_cookie('ck_auto', $key, 86400 * 31);
    // 자동로그인 end ---------------------------
	    } else {
	    set_cookie('ck_mb_id', '', 0);
	    set_cookie('ck_auto', '', 0);
	    }



	    // 아이디 자동저장
	    if($id_save=='Y') {
	    set_cookie('saved_id', $member_id, time()+2592000);
		
	    }else{
		
	    set_cookie('saved_id', '', 0);
	    }
		
			}


	    if ($url) {
	    // url 체크
	    check_url_host($url, '', NC_URL, true);

	    $link = urldecode($url);

	    if (preg_match("/\?/", $link))
        $split= "&amp;";
	    else
        $split= "?";
	    
		// $_POST 배열변수에서 아래의 이름을 가지지 않은 것만 넘김
	    $post_check_keys = array('member_id', 'member_pwd', 'x', 'y', 'url','modal_ox');
    


	    $post_check_keys = run_replace('login_check_post_check_keys', $post_check_keys, $link, $is_social_login);

	    foreach($_POST as $key=>$value) {
        if ($key && !in_array($key, $post_check_keys)) {
            $link .= "$split$key=$value";
            $split = "&amp;";
        }
	    }

	    } else  {
	    $link = NC_URL;
	    }
		 
		if($medit_link){
         $link = $medit_link;

        } 			
		 

		
		$res = array(
		'Msg'  =>'로그인성공',
		'links'  =>''.$link.'',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => false);
        die(json_encode($res));
		
		
	
}	
	
	



