<?php
include_once("./_common.php");


//$mypage='1';
//if($is_member) {
//	alert('이미 로그인 되었습니다.', NC_URL.'/');
//}


$url = isset($_REQUEST['redirect_to']) ? strip_tags($_REQUEST['redirect_to']) : '';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
if ($is_member) {
    if ($url)
        goto_url($url.'/');
    else
        goto_url(NC_URL.'/');
}


$n_type="login";
$page_info="login";



$chg = (isset($_REQUEST["chg"]) && $_REQUEST["chg"]) ? $_REQUEST["chg"] : '';
$s_code = (isset($_REQUEST["s_code"]) && $_REQUEST["s_code"]) ? $_REQUEST["s_code"] : '';
$g_code = (isset($_REQUEST["g_code"]) && $_REQUEST["g_code"]) ? $_REQUEST["g_code"] : '';
$b_code = (isset($_REQUEST["b_code"]) && $_REQUEST["b_code"]) ? $_REQUEST["b_code"] : '';

$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : '';
$sales_code = (isset($_REQUEST["sales_code"]) && $_REQUEST["sales_code"]) ? $_REQUEST["sales_code"] : '';
$event_name = (isset($_REQUEST["event_name"]) && $_REQUEST["event_name"]) ? $_REQUEST["event_name"] : '';
$ntitle = (isset($_REQUEST["ntitle"]) && $_REQUEST["ntitle"]) ? $_REQUEST["ntitle"] : '';
$month_qty = (isset($_REQUEST["month_qty"]) && $_REQUEST["month_qty"]) ? $_REQUEST["month_qty"] : '';
$unit_price = (isset($_REQUEST["unit_price"]) && $_REQUEST["unit_price"]) ? $_REQUEST["unit_price"] : '';

$ntype = (isset($_REQUEST["ntype"]) && $_REQUEST["ntype"]) ? $_REQUEST["ntype"] : '';
// 아이디 자동저장
$ck_id_save = get_cookie('saved_id');

if ($ck_id_save!="") {
$ch_id_save_chk = "checked";
}



include_once("./_head.php");


$login_url        = login_url($url);
$login_action_url = NC_MEMBER_URL."/login_check.php";


include_once(NC_MTHEME_PATH.'/login.skin.php');


include_once("./_tail.php");
?>