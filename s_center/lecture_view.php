<?php
include_once("./_common.php");


//$mypage='1';
//if(!$is_member) {
//	alert('로그인 후 이용하세요.', NC_MEMBER_URL.'/login.php?returl='. NC_NDOMAIN .'/mypage/');
//}





$n_type="program";
$page_info="program";
include_once("./_head.php");



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


include_once(NC_CTHEME_PATH.'/lecture_view.skin.php');


include_once("./_tail.php");
?>