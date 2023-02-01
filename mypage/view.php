<?php
include_once("./_common.php");


//$mypage='1';
if(!$is_member) {
	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?redirect_to='. NC_DOMAIN .'/mypage/');
}
$n_type="mypage_lecture_view";
$page_info="mypage";



include_once("./_head.php");
/*
$status= (isset($_REQUEST["status"]) && $_REQUEST["status"]) ? $_REQUEST["status"] : $_SESSION['status2'];


$page=(isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : $_SESSION['page2'];
$center_id=(isset($_REQUEST["c_id"]) && $_REQUEST["c_id"]) ? $_REQUEST["c_id"] : NULL;
$c_id=(isset($_REQUEST["c_id"]) && $_REQUEST["c_id"]) ? $_REQUEST["c_id"] : $_SESSION['c_id2'];
$idx=(isset($_REQUEST["idx"]) && $_REQUEST["idx"]) ? $_REQUEST["idx"] : $_SESSION['idx2'];
$sales_code=(isset($_REQUEST["sales_code"]) && $_REQUEST["sales_code"]) ? $_REQUEST["sales_code"] : $_SESSION['sales_code2'];
$state=(isset($_REQUEST["state"]) && $_REQUEST["state"]) ? $_REQUEST["state"] : $_SESSION['state2'];
$state2=(isset($_REQUEST["state"]) && $_REQUEST["state"]) ? $_REQUEST["state"] : $_SESSION['state2'];


$_SESSION['page2']=$page;
$_SESSION['state2']=$state2;
$_SESSION['c_id2']=$c_id;
$_SESSION['sales_code2']=$sales_code;
$_SESSION['idx2']=$idx;
$_SESSION['status2']=$status;


$s_state=$_SESSION['state2'];
$s_cid=$_SESSION['c_id2'];
$s_salescode=$_SESSION['sales_code2'];
$s_idx=$_SESSION['idx2'];
$s_status=$_SESSION['status2'];
$s_page=$_SESSION['page2'];

if($_SESSION['state2']=="" ||  $_SESSION['state2']=="001"  ||  $_SESSION['state2']=="003"  ||  $_SESSION['state2']=="004" ||  $_SESSION['state2']=="009") { 
$status_text="강좌신청현황";
//$status="001";
 }else if($_SESSION['state2']=="002"){
$status_text="강좌이력현황";
//$status="002";
}else if($_SESSION['state2']=="005" || $_SESSION['state2']=="006"  ){
$status_text="환불신청현황";
//$status="003";
}
*/
$status=  isset($_REQUEST['status']) ? clean_xss_tags($_REQUEST['status'], 1, 1) : '';
$page=  isset($_REQUEST['page']) ? clean_xss_tags($_REQUEST['page'], 1, 1) : '';
$center_id=  isset($_REQUEST['c_id']) ? clean_xss_tags($_REQUEST['c_id'], 1, 1) : '';
$c_id=  isset($_REQUEST['c_id']) ? clean_xss_tags($_REQUEST['c_id'], 1, 1) : '';
$idx=  isset($_REQUEST['idx']) ? clean_xss_tags($_REQUEST['idx'], 1, 1) : '';
$sales_code=  isset($_REQUEST['sales_code']) ? clean_xss_tags($_REQUEST['sales_code'], 1, 1) : '';
$state=  isset($_REQUEST['state']) ? clean_xss_tags($_REQUEST['state'], 1, 1) : '';
$s_state=  isset($_REQUEST['state']) ? clean_xss_tags($_REQUEST['state'], 1, 1) : '';
$s_salescode=  isset($_REQUEST['sales_code']) ? clean_xss_tags($_REQUEST['sales_code'], 1, 1) : '';
$s_status=  isset($_REQUEST['status']) ? clean_xss_tags($_REQUEST['status'], 1, 1) : '';
$s_idx=  isset($_REQUEST['idx']) ? clean_xss_tags($_REQUEST['idx'], 1, 1) : '';




if($status=="" ||  $status=="001") { 
$status_text="강좌신청현황";
$status="001";
 }else if($status=="002"){
$status_text="강좌이력현황";
$status="002";
}else if($status=="003"){
$status_text="환불신청현황";
$status="003";
}

include_once(NC_MYTHEME_PATH.'/view.skin.php');


include_once("./_tail.php");
?>