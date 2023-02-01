<?php
include_once("./_common.php");
header('Content-Type: application/json');
$data2 = (isset($_REQUEST["data"]) && $_REQUEST["data"]) ? $_REQUEST["data"] : NULL;

$email="test@test.com";

if($data2==$email){
		$result = array(
        'result'  => true);
		
}else{

	$result = array(
        'result'  => false);

}
die(json_encode($result));


?>