<?php
include_once('./common.php');

$_SESSION["sales_code"] = '';


$n_type="404";
$page_info="404";


$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : NULL;



include_once(NC_PATH.'/head2.php'); 
include_once(NC_THEME_PATH.'/500.skin.php'); 



include_once(NC_PATH.'/tail.php');



?>