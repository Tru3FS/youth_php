<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	$center_id = $_SESSION['center_id']; //get_session('center_id');
	if ($center_id == '') {
		$center_id = $_REQUEST['center_id'];
		$_SESSION['center_id'] = $center_id;
	}

	//include_once($root."/common.php");
	//global $center_id;
	
	/*
	$domain_center = '';
	if (preg_match("/[^a-z]+\d/", $_SERVER['HTTP_HOST'], $match)) {
		$domain_center = $match[0];
	}
	
	if (!isset($center_id) || $center_id == '') {
		if ($domain_center != '') { 
			$center_id = $domain_center; 
		} else {
			$center_id = $_SESSION['center_id'];
		}
	}
	*/
	$db_php_filename = 'db.'.$center_id.'.php';
	
	if (file_exists($root.'/lib/'.$db_php_filename)==false) {
		//echo '{"error": "file not found '.$db_php_filename.'"}';
		//$db_php_filename = 'db.000.php';
		//header("Location: 500.php");

echo "<script> 
document.location.href='../500_error.php?dtype=1&center_id='; 
</script>"; 

	
	}
	require_once($root.'/lib/'.$db_php_filename);
?>