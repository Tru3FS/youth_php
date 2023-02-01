<?php


define('_INDEX_', true);

include_once('./common.php');

$_SESSION["sales_code"] = '';


$n_type="index";
$page_info="index";
/*
function CF_Company_Info($center_id, $url){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT Center_Name, Corp_No, President, Telephone, Post_No, CONCAT(Address, ' ', IFNULL(Address_Detail, '')) as Address ";
	$sql = $sql."  FROM TB_Company ";
	$sql = $sql." WHERE Center_ID = :center_id ";

	try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'  , $center_id);

		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_OBJ);

        $db = null;

        $r_json = "";
		$r_json = $r_json.'{';
        $r_json = $r_json.'"Result": {"ResultCode": 0, "ResultMsg": "null"},';
		$r_json = $r_json.'"ResultData1":'.json_encode($data).'';
		$r_json = $r_json.'}';
		return $r_json;

    }catch(Exception $e){
		$db = null;
		return '{"Result": {"ResultCode": -10,"ResultMsg":'.'"'.$e->getMessage().'"'.'}}';
        
    }
}
*/

/*
$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : NULL;
*/


include_once(NC_PATH.'/head2.php'); 

include_once(NC_THEME_PATH.'/main_seoul.skin.php'); 



include_once(NC_PATH.'/tail2.php');



?>