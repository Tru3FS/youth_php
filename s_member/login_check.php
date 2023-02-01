<?php
include_once('./_common.php');

header('Content-Type: application/json');

/*
$member_id       = $_POST['member_id'];
$member_pw = $_POST['member_pwd'];
*/
$member_id=isset($_POST['member_id']) ? clean_xss_tags($_POST['member_id'], 1, 1) : '';
$member_pw =isset($_POST['member_pwd']) ? clean_xss_tags($_POST['member_pwd'], 1, 1) : '';
$center_id =  $_SESSION['center_id'];
$auto_login =$_POST['auto_login'];
$saved_id = $_POST['saved_id'];
$refer_link = $_POST['refer_link'];

$medit_link = $_POST['medit_link'];


$redirect_to =isset($_POST['redirect_to']) ? clean_xss_tags($_POST['redirect_to'], 1, 1) : '';

$ntype = $_POST['ntype'];


$url2 = isset($_POST['url']) ? clean_xss_tags($_POST['url'], 1, 1) : '';



//$connect_db = mysqli_connect(NC_MYSQL_HOST, NC_MYSQL_USER, NC_MYSQL_PASSWORD, NC_MYSQL_DB,'13305');


$sales_code =isset($_POST['sales_code']) ? clean_xss_tags($_POST['sales_code'], 1, 1) : '';


//$member_id       = get_text(['member_id']);

$mb = get_member($member_id);

$ip=get_real_client_ip();




mysqli_autocommit($connect_db, FALSE);


//echo $sales_code;

//return;

//------------------------------------------------------------------------------------
// ● 함수명 : CF_Login
//------------------------------------------------------------------------------------

$json_string = CF_Login($center_id, $member_id, $member_pw, $url);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] == -10){
	

// 자동 스크립트를 이용한 공격에 대비하여 로그인 실패시에는 일정시간이 지난후에 다시 로그인 하도록 함
//if ($check_time = get_session("ss_login_check_time"))
// {    if ($check_time > NC_SERVER_TIME - 10)
// {        alert("로그인 실패시에는 10초 이후에 다시 로그인 하시기 바랍니다.");    }
//}
//set_session("ss_login_check_time", NC_SERVER_TIME );



		$res = array(
		'Msg'  =>'회원로그인실패.',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
		'result'  => true);
		
		die(json_encode($res));

}elseif($json_array['Result']['ResultCode'] == -30){
	
	// 존재하지 않는 아이디일 경우 회원로그인 같은 메시지 노출



$connect_db = mysqli_connect(NC_MYSQL_HOST, NC_MYSQL_USER, NC_MYSQL_PASSWORD, NC_MYSQL_DB,'3306');

sql_set_charset('utf8', $connect_db);


if ($mb['Web_ID']=='') {







$row=sql_fetch("SELECT	COUNT(1) as CNT  FROM tb_login_fake  WHERE	Web_ID  = '$member_id'  AND	IS_LOCK = 'Y'  AND	 DATE_ADD(LATEST_TRY_LOGIN_DATE, INTERVAL 10 MINUTE) < SYSDATE()");

$row2=sql_fetch("SELECT COUNT(1) as CNT  FROM tb_login_fake  WHERE	Web_ID  = '$member_id'");


if ($row2['CNT']=='0'){



$sql= " insert into tb_login_fake (Web_ID,LOCK_COUNT , IS_LOCK, LOGIN_FAIL_COUNT, LATEST_TRY_LOGIN_DATE) value ('$member_id', '0', 'N', '0', SYSDATE())  ";
//$sql_query($sql);
    

		if(mysqli_query($connect_db, $sql)){  

		} else {  
			mysqli_error();
		}
	mysqli_commit($connect_db);	

}




if ($row['CNT']=='1'){

mysqli_autocommit($connect_db, FALSE);

$sql2= " update tb_login_fake set LOGIN_FAIL_COUNT = 1,IS_LOCK = 'N',LATEST_TRY_LOGIN_DATE = SYSDATE() where Web_ID = '$member_id'  AND	IS_LOCK = 'Y'   ";
//sql_query($sql);


if(mysqli_query($connect_db, $sql2)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	



	 $res = array(
		'Msg'  =>'아이디 또는 비밀번호가 일치하지 않습니다.',
        'Msg2'  =>'1/5회 실패',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
	    'RCode'  =>'3',
     	'result'  => true);
        die(json_encode($res));
//return;
/*
$row=sql_fetch("SELECT	IS_LOCK,LOGIN_FAIL_COUNT  FROM tb_login_fake  WHERE Web_ID  = '$member_id'");

	 $res = array(
		'Msg'  =>'아이디 또는 비밀번호가 일치하지 않습니다.',
        'Msg2'  =>''.$row['LOGIN_FAIL_COUNT'].'/5회 실패'.'',
		'ResultMsg'  =>''.$json_array['Result']['ResultMsg'].'',
		'ResultCode'  =>'',
        'RCode'  =>'3',
		'result'  => true);
        die(json_encode($res));
*/


}



if ($row['CNT']=='0'){

mysqli_autocommit($connect_db, FALSE);


$row3=sql_fetch("SELECT	COUNT(1) as CNT  FROM tb_login_fake  WHERE	Web_ID  = '$member_id'  AND DATE_ADD(LATEST_TRY_LOGIN_DATE, INTERVAL 10 MINUTE) < SYSDATE()");
if ($row3['CNT']=='1'){
 $sql4= " update tb_login_fake set LOGIN_FAIL_COUNT = 0,IS_LOCK = 'N',  LATEST_TRY_LOGIN_DATE = SYSDATE() where Web_ID = '$member_id' ";
if(mysqli_query($connect_db, $sql4)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	


}else{

 $sql4= " update tb_login_fake set LOGIN_FAIL_COUNT = LOGIN_FAIL_COUNT + 1 , LATEST_TRY_LOGIN_DATE = SYSDATE() where Web_ID = '$member_id' ";
if(mysqli_query($connect_db, $sql4)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	

 $sql5= " update tb_login_fake set IS_LOCK = 'Y' , LOCK_COUNT = LOCK_COUNT + 1 where Web_ID = '$member_id'  AND		LOGIN_FAIL_COUNT > 5    ";


if(mysqli_query($connect_db, $sql5)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	


$row=sql_fetch("SELECT	IS_LOCK,LOGIN_FAIL_COUNT,LATEST_TRY_LOGIN_DATE  FROM tb_login_fake  WHERE	 Web_ID  = '$member_id'");


if ($row['IS_LOCK']=='Y'){

 	 $res = array(
		'Msg'  =>'로그인 실패 횟수 초과되었습니다.',
        'Msg2'  =>'10분후에 재시도 부탁드립니다.',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'RCode'  =>'4',
		'result'  => true);
        die(json_encode($res));

}else{



  	 $res = array(
		'Msg'  =>'아이디 또는 비밀번호가 일치하지 않습니다.',
        'Msg2'  =>''.$row['LOGIN_FAIL_COUNT'].'/5회 실패'.'',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'RCode'  =>'3',
		'result'  => true);
        die(json_encode($res));

}

}

}

}



}elseif($json_array['Result']['ResultCode'] == -20){





$row=sql_fetch("SELECT	COUNT(1) as CNT  FROM tb_member  WHERE	Web_ID  = '{$mb['Web_ID']}'  AND	IS_LOCK = 'Y'  AND	 DATE_ADD(LATEST_TRY_LOGIN_DATE, INTERVAL 10 MINUTE) < SYSDATE()");


if ($row['CNT']=='1'){

mysqli_autocommit($connect_db, FALSE);

$sql= " update tb_member set LOGIN_FAIL_COUNT = 0,LATEST_TRY_LOGIN_DATE = SYSDATE() where Web_ID = '{$mb['Web_ID']}'  AND	IS_LOCK = 'Y'   ";

if(mysqli_query($connect_db, $sql)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	


$sql2= " update tb_member set  IS_LOCK = 'N', LOGIN_FAIL_COUNT = LOGIN_FAIL_COUNT + 1  where Web_ID = '{$mb['Web_ID']}'  ";
if(mysqli_query($connect_db, $sql2)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	

$row=sql_fetch("SELECT	IS_LOCK,LOGIN_FAIL_COUNT  FROM tb_member  WHERE	 Web_ID  = '{$mb['Web_ID']}'");


  	 $res = array(
		'Msg'  =>'아이디 또는 비밀번호가 일치하지 않습니다.',
        'Msg2'  =>''.$row['LOGIN_FAIL_COUNT'].'/5회 실패'.'',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'RCode'  =>'3',
		'result'  => true);
        die(json_encode($res));
}



if ($row['CNT']=='0'){

mysqli_autocommit($connect_db, FALSE);




 $sql3= "update tb_member set LOGIN_FAIL_COUNT = LOGIN_FAIL_COUNT + 1 , LATEST_TRY_LOGIN_DATE = SYSDATE() where Web_ID = '{$mb['Web_ID']}'";
 if(mysqli_query($connect_db, $sql3)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	

 $sql4= "update tb_member set IS_LOCK = 'Y' , LOCK_COUNT = LOCK_COUNT + 1 where Web_ID = '{$mb['Web_ID']}'  AND LOGIN_FAIL_COUNT > 5";
 if(mysqli_query($connect_db, $sql4)){  

		} else {  
			mysqli_error();
		}
mysqli_commit($connect_db);	


$row=sql_fetch("SELECT	IS_LOCK,LOGIN_FAIL_COUNT  FROM tb_member  WHERE Web_ID  = '{$mb['Web_ID']}'");


if ($row['IS_LOCK']=='Y'){
 	 $res = array(
		'Msg'  =>'로그인 실패 횟수 초과되었습니다.',
        'Msg2'  =>'10분후에 재시도 부탁드립니다.',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'RCode'  =>'4',
		'result'  => true);
        die(json_encode($res));



}else{

  	 $res = array(
		'Msg'  =>'아이디 또는 비밀번호가 일치하지 않습니다.',
        'Msg2'  =>''.$row['LOGIN_FAIL_COUNT'].'/5회 실패'.'',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'RCode'  =>'3',
		'result'  => true);
        die(json_encode($res));



}

}






}else{
	
	    

mysqli_autocommit($connect_db, FALSE);

$row=sql_fetch("SELECT	COUNT(1) as CNT  FROM tb_member  WHERE Web_ID  = '{$mb['Web_ID']}' AND IS_LOCK = 'Y'  AND	 DATE_ADD(LATEST_TRY_LOGIN_DATE, INTERVAL 10 MINUTE) > SYSDATE()");

//echo $row['CNT'];


if ($row['CNT']=='1'){

 	 $res = array(
		'Msg'  =>'로그인 실패 횟수 초과되었습니다.',
        'Msg2'  =>'10분후에 재시도 부탁드립니다.',
		'ResultMsg'  =>'',
		'ResultCode'  =>''.$json_array['Result']['ResultCode'].'',
        'RCode'  =>'4',
		'result'  => true);
        die(json_encode($res));

}else{


$sql7= " update tb_member set LOGIN_FAIL_COUNT = 0 where Web_ID = '{$mb['Web_ID']}'  AND IS_LOCK = 'Y'   ";

 if(mysqli_query($connect_db, $sql7)){  

		} else {  
			mysqli_error();
		}

  //mysqli_commit($connect_db);	

$sql8= " update tb_member set  IS_LOCK = 'N',LOGIN_FAIL_COUNT = 0, LATEST_TRY_LOGIN_DATE = SYSDATE()  where Web_ID = '{$mb['Web_ID']}'  ";
 if(mysqli_query($connect_db, $sql8)){  

		} else {  
			mysqli_error();
		}
  mysqli_commit($connect_db);	

}
		
		
		$json_string = CF_MEMBER_ID($_SESSION['center_id'],$member_id, $url);

        $json_array = json_decode($json_string, true); 


       if($json_array['Result']['ResultCode'] != 0){
       echo $json_array['Result']['ResultMsg'];
       return;	
	  }
	  
	    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
        	}
		
		 
		 
          $mem_name = $val['Member_Name'];
		  $mem_id = $val['Web_ID'];
		  $mem_code = $val['Member_Code'];
		  $mem_age= $val['Age'];

		  set_session('m_id', $mem_id);
		  set_session('m_name', $mem_name);
		  set_session('m_code', $mem_code);
		  set_session('m_age', $mem_age);

		  

		  $_SESSION['m_id']=$mem_id;
		  $_SESSION['m_name']=$mem_name;
          $_SESSION['m_code']=$mem_code;
		  $_SESSION['m_age']=$mem_age;
		  
		 }

		}		 
	  
	  
			
	    // 아이디 쿠키에 한달간 저장
	    if ($auto_login=='1') {
  
	     // 자동로그인 ---------------------------
	    // 쿠키 한달간 저장
	    $key = md5($_SERVER['SERVER_ADDR'] . $_SERVER['SERVER_SOFTWARE'] . $_SERVER['HTTP_USER_AGENT'] . $member_pw);
	    set_cookie('ck_mb_id', $mem_id, 86400 * 31);
	    set_cookie('ck_auto', $key, 86400 * 31);
    // 자동로그인 end ---------------------------
	    } else {
	    set_cookie('ck_mb_id', '', 0);
	    set_cookie('ck_auto', '', 0);
	    }



	    // 아이디 자동저장
	    if($saved_id=='Y') {


	

	    set_cookie('saved_id', $mem_id, time()+2592000);
        

				
	    }else{
		

 

	    set_cookie('saved_id', '', 0);



	    }
		


	    if ($url2) {
	    // url 체크
	    check_url_host($url2, '', NC_URL, true);

	    $link = urldecode($url2);

	    if (preg_match("/\?/", $link))
        $split= "&amp;";
	    else
        $split= "?";
	    
		// $_POST 배열변수에서 아래의 이름을 가지지 않은 것만 넘김
	    $post_check_keys = array('member_id', 'member_pwd', 'x', 'y', 'url','modal_ox','id_save','sales_code','s_code','g_code','b_code','redirect_to','saved_id','unit_price','month_qty','chg','ntype');
    


	    $post_check_keys = run_replace('login_check_post_check_keys', $post_check_keys, $link, $is_social_login);

	    foreach($_POST as $key=>$value) {
        if ($key && !in_array($key, $post_check_keys)) {
            $link .= "$split$key=$value";
            $split = "&amp;";
        }
	    }

	    } else  {
	    $link = NC_URL.'';
	    }
		 
		if($medit_link){
         $link = $medit_link;

        } 			
		 


		
		
		$res = array(
		'Msg'  =>''.$_SESSION['m_id'].'',
		'links'  =>''.$link.'',
		'center_id'  =>''.$center_id.'',
		'ntype'  =>''.$ntype.'',
		'ResultMsg'  =>''. $_SESSION['m_name'].'',
		'ResultCode'  =>'0',
           'RCode'  =>'0',
		'result'  => false);
        die(json_encode($res));
		
	
	
}	
	
	



