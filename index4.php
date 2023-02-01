<?php
include_once('./common.php');

$_SESSION["sales_code"] = '';


define('_INDEX_', true);
$n_type="index";
$page_info="index";


$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : NULL;



include_once(NC_PATH.'/head2.php'); 
include_once(NC_THEME_PATH.'/main33.skin.php'); 



include_once(NC_PATH.'/tail2.php');



?>