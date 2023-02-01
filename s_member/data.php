<?php
include_once("./_common.php");
header('Content-Type: application/json');
$data2 = (isset($_REQUEST["data"]) && $_REQUEST["data"]) ? $_REQUEST["data"] : NULL;

$id="test";

if($data2==$id){
		$result = array(
        'result'  => true);
		
}else{

	$result = array(
        'result'  => false);

}
die(json_encode($result));


?>