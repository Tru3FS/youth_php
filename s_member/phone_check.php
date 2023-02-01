<?php
include_once("./_common.php");
header('Content-Type: application/json');
$data2 = (isset($_REQUEST["data"]) && $_REQUEST["data"]) ? $_REQUEST["data"] : NULL;

$phone="01045385517";

if($data2==$tel){
		$result = array(
        'result'  => true);
		
}else{

	$result = array(
        'result'  => false);

}
die(json_encode($result));


?>