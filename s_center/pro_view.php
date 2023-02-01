<?php
include_once("./_common.php");


//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}



//echo $_SESSION['center_id'];

$n_type="program_view";
$page_info="program";
include_once("./_head.php");



/*
$cc_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : '';
$s_code = (isset($_REQUEST["s_code"]) && $_REQUEST["s_code"]) ? $_REQUEST["s_code"] : '';
$g_code = (isset($_REQUEST["g_code"]) && $_REQUEST["g_code"]) ? $_REQUEST["g_code"] : '';
$b_code = (isset($_REQUEST["b_code"]) && $_REQUEST["b_code"]) ? $_REQUEST["b_code"] : '';

$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : '';
$sales_code = (isset($_REQUEST["sales_code"]) && $_REQUEST["sales_code"]) ? $_REQUEST["sales_code"] : '';
$event_name = (isset($_REQUEST["event_name"]) && $_REQUEST["event_name"]) ? $_REQUEST["event_name"] : '';
$ntitle = (isset($_REQUEST["ntitle"]) && $_REQUEST["ntitle"]) ? $_REQUEST["ntitle"] : '';
$url = isset($_GET['redirect_to']) ? strip_tags($_GET['redirect_to']) : '';
$cx_id = (isset($_REQUEST["cx_id"]) && $_REQUEST["cx_id"]) ? $_REQUEST["cx_id"] : '';
$monthqty2 = (isset($_REQUEST["month_qty"]) && $_REQUEST["month_qty"]) ? $_REQUEST["month_qty"] : '';
$unitprice = (isset($_REQUEST["unit_price"]) && $_REQUEST["unit_price"]) ? $_REQUEST["unit_price"] : '';
*/


$cc_id = isset($_REQUEST['center_id']) ? clean_xss_tags($_REQUEST['center_id'], 1, 1) : '';
$s_code = isset($_REQUEST['s_code']) ? clean_xss_tags($_REQUEST['s_code'], 1, 1) : '';
$g_code = isset($_REQUEST['g_code']) ? clean_xss_tags($_REQUEST['g_code'], 1, 1) : '';
$b_code = isset($_REQUEST['b_code']) ? clean_xss_tags($_REQUEST['b_code'], 1, 1) : '';
$page = isset($_REQUEST['page']) ? clean_xss_tags($_REQUEST['page'], 1, 1) : '';
$sales_code = isset($_REQUEST['sales_code']) ? clean_xss_tags($_REQUEST['sales_code'], 1, 1) : '';
$event_name = isset($_REQUEST['event_name']) ? clean_xss_tags($_REQUEST['event_name'], 1, 1) : '';
$ntitle = isset($_REQUEST['ntitle']) ? clean_xss_tags($_REQUEST['ntitle'], 1, 1) : '';
$url = isset($_GET['redirect_to']) ? clean_xss_tags($_GET['redirect_to'], 1, 1) : '';

$cx_id = isset($_REQUEST['cx_id']) ? clean_xss_tags($_REQUEST['cx_id'], 1, 1) : '';
$monthqty2 = isset($_REQUEST['month_qty']) ? clean_xss_tags($_REQUEST['month_qty'], 1, 1) : '';
$unitprice = isset($_REQUEST['unit_price']) ? clean_xss_tags($_REQUEST['unit_price'], 1, 1) : '';
$center_id = isset($_REQUEST['center_id']) ? clean_xss_tags($_REQUEST['center_id'], 1, 1) : $_SESSION["center_id"];

include_once(NC_CTHEME_PATH.'/pro_view2.skin.php');


include_once("./_tail.php");
?>