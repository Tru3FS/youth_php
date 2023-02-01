<?php
//if (!defined('_SAMSUNG_')) exit; // 개별 페이지 접근 불가
include_once("./_common.php");
// error_reporting( E_ALL );
// ini_set( "display_errors", 'On' );

header('Content-type: application/json');


$member_id=get_session('m_id');

$programcode = (isset($_POST["programcode"]) && $_POST["programcode"]) ? $_POST["programcode"] : NULL;
$center_id = (isset($_POST["center_id"]) && $_POST["center_id"]) ? $_POST["center_id"] : NULL;
$s_code = (isset($_POST["s_code"]) && $_POST["s_code"]) ? $_POST["s_code"] : NULL;
$g_code = (isset($_POST["g_code"]) && $_POST["g_code"]) ? $_POST["g_code"] : NULL;
$b_code = (isset($_POST["b_code"]) && $_POST["b_code"]) ? $_POST["b_code"] : NULL;
$x_code = (isset($_POST["x_code"]) && $_POST["x_code"]) ? $_POST["x_code"] : NULL;
$z_gcode = (isset($_POST["z_gcode"]) && $_POST["z_gcode"]) ? $_POST["z_gcode"] : NULL;




$ip=get_real_client_ip();

$programcode_name = (isset($_POST["programcode_name"]) && $_POST["programcode_name"]) ? $_POST["programcode_name"] : NULL;
$programcode_bname = (isset($_POST["programcode_bname"]) && $_POST["programcode_bname"]) ? $_POST["programcode_bname"] : NULL;

$today = date("Ymd");




if ($center_id===$programcode && $x_code !=''){



	
	$sqlb = "";
    $sqlb = $sqlb."SELECT DISTINCT b.Detail_Code as Place_Code, b.Detail_Name as Place_Name ";
    $sqlb = $sqlb."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb = $sqlb."       TB_Code_D   b ON a.Place_Code = b.Detail_Code AND b.Common_Code = 'H01' ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Detail_Name ";
	

	$sqlc = "";
    $sqlc = $sqlc."SELECT DISTINCT b.Detail_Code as Event_Code, b.Detail_Name as Event_Name ";
    $sqlc = $sqlc."  FROM TB_SaleItem a INNER JOIN ";
	$sqlc = $sqlc."       TB_Code_D   b ON a.Event_Code = b.Detail_Code AND b.Common_Code = 'H02' ";
    $sqlc = $sqlc." WHERE a.Center_ID           = '01' ";
    $sqlc = $sqlc."   AND a.Sales_Division      = '003' ";
	$sqlc = $sqlc."   AND a.Place_Code       = '$s_code' ";
	$sqlc = $sqlc."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlc = $sqlc."   AND a.State               = '001' ";
	$sqlc = $sqlc." ORDER BY b.Detail_Name ";


$resultz = sql_query($sqlc);
$ct_countc =  sql_num_rows($resultz);


	$sqld = "";
    $sqld = $sqld."SELECT DISTINCT b.Class_Code, b.Class_Name ";
    $sqld = $sqld."  FROM TB_SaleItem   a INNER JOIN ";
	$sqld = $sqld."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code  ";
    $sqld = $sqld." WHERE a.Center_ID           = '01' ";
    $sqld = $sqld."   AND a.Sales_Division      = '003' ";
	$sqld = $sqld."   AND a.Event_Code      = '$g_code' ";
	$sqld = $sqld."   AND a.Place_Code      = '$s_code' ";
	$sqld = $sqld."   AND a.Sales_Place_Code = '$center_id' ";
	$sqld=  $sqld."   AND a.State               = '001' ";
	$sqld = $sqld." ORDER BY b.Class_Name ";


$resultt = sql_query($sqld);
$ct_countt =  sql_num_rows($resultt);


	//echo '3';

	//echo '1';
}else{

if ($center_id === $programcode && $s_code==""  && $g_code==""  || $x_code !=''){



//$sqlb = "SELECT  *  FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용' and (('$today' >= 강습시작일) && ('$today' <= 강습종료일))   GROUP BY 업장명";  

	

    $sqlb = $sqlb."SELECT DISTINCT b.Detail_Code as Place_Code, b.Detail_Name as Place_Name ";
    $sqlb = $sqlb."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb = $sqlb."       TB_Code_D   b ON a.Place_Code = b.Detail_Code AND b.Common_Code = 'H01' ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Detail_Name ";
	
	//echo $sqlb;
		
	//echo '2';
	
		//echo '2';

}else if ($center_id!==$programcode && $s_code!="" &&  $g_code==""  || $x_code !=''){



	$sqlb = "";
    $sqlb = $sqlb."SELECT DISTINCT b.Detail_Code as Event_Code, b.Detail_Name as Event_Name ";
    $sqlb = $sqlb."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb = $sqlb."       TB_Code_D   b ON a.Event_Code = b.Detail_Code AND b.Common_Code = 'H02' ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Detail_Name ";


	
	



}else if ($center_id!==$programcode && $s_code!="" && $g_code !='' || $x_code !='' ){

	$sqlb = "";
    $sqlb = $sqlb."SELECT DISTINCT b.Class_Code, b.Class_Name ";
    $sqlb = $sqlb."  FROM TB_SaleItem   a INNER JOIN ";
	$sqlb = $sqlb."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code  ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
	$sqlb = $sqlb."   AND a.Event_Code      = '$g_code' ";
	$sqlb = $sqlb."   AND a.Place_Code      = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Class_Name ";
	
	//echo '4';
	
	

	//echo '4';
}
	
}




$resultc = sql_query($sqlb);
$ct_countx =  sql_num_rows($resultc);
 


?>
{"success":true,"data":[
<?php for($i=1; $row=sql_fetch_array($resultc); $i++) { 


//$co_gu=$row['co_gu'];

if($row['Place_Code']==''){
	
  	$place_code=$s_code;
	


}else{

   $place_code=$row['Place_Code'];

}	

if($row['Place_Name']==''){
	
  	$place_name=$s_code_name;
	
}else{

   $place_name=$row['Place_Name'];

}	


if($row['Event_Code']==''){
	
  	$event_code=$g_code;
	
}else{
   $place_code=$row['Event_Code'];
   $event_code=$row['Event_Code'];

}

if($row['Event_Name']==''){
	
  	$event_name=$g_code_name;
	
}else{

   $event_name=$row['Event_Name'];

}	

if($row['Class_Code']==''){
	
  	$class_code=$b_code;
	
}else{

   $class_code=$row['Class_Code'];

}

if($row['Class_Name']==''){
	
  	$class_name=$b_code_name;
	
}else{

   $class_name=$row['Class_Name'];

}	





?>
{"uid":"<?php echo $place_code;?>","parent_uid":"<?php echo $place_code;?>","center_id":"<?php echo $center_id;?>","s_code":"<?php echo $place_name;?>","g_code":"<?php echo $event_name;?>","scode":"<?php echo $place_code;?>","gcode":"<?php echo $event_code;?>","pcode":"<?php echo $place_code;?>","ccode":"<?php echo $class_code;?>","cname":"<?php echo $class_name;?>","cnt":"<?php echo $ct_countx;?>"}<?php if($i==$ct_countx){?><?php }else{?>,<?php }?><?php } ?>
<?php if($ct_countx=='0'){?>{"tcnt2":"<?php echo $ct_countx;?>"}<?php }?>],"data2":[

<?php 

if($x_code!=""){

for($z=1; $row2=sql_fetch_array($resultz); $z++) { 


if($row2['Place_Code']==''){
	
  	$place_code=$s_code;
	
}else{

   $place_code=$row2['Place_Code'];

}	

if($row2['Place_Name']==''){
	
  	$place_name=$s_code_name;
	
}else{

   $place_name=$row2['Place_Name'];

}	


if($row2['Event_Code']==''){
	
  	$event_code=$g_code;
	
}else{
   $place_code=$row2['Event_Code'];
   $event_code=$row2['Event_Code'];

}

if($row2['Event_Name']==''){
	
  	$event_name=$g_code_name;
	
}else{

   $event_name=$row2['Event_Name'];

}	

if($row2['Class_Code']==''){
	
  	$class_code=$b_code;
	
}else{

   $class_code=$row2['Class_Code'];

}

if($row2['Class_Name']==''){
	
  	$class_name=$b_code_name;
	
}else{

   $class_name=$row2['Class_Name'];

}	



?>
{"uid":"<?php echo $place_code;?>","parent_uid":"<?php echo $place_code;?>","center_id":"<?php echo $center_id;?>","s_code":"<?php echo $place_name;?>","g_code":"<?php echo $event_name;?>","scode":"<?php echo $place_code;?>","gcode":"<?php echo $event_code;?>","pcode":"<?php echo $place_code;?>","ccode":"<?php echo $class_code;?>","cname":"<?php echo $class_name;?>","cnt":"<?php echo $ct_countx;?>"}<?php if($z==$ct_countc){?><?php }else{?>,<?php }?><?php } ?><?php }else{?><?php } ?>],"data3":[

<?php 

if($x_code!=""){
for($z=1; $row3=sql_fetch_array($resultt); $z++) { 


if($row3['Place_Code']==''){
	
  	$place_code=$s_code;
	
}else{

   $place_code=$row3['Place_Code'];

}	

if($row3['Place_Name']==''){
	
  	$place_name=$s_code_name;
	
}else{

   $place_name=$row3['Place_Name'];

}	


if($row3['Event_Code']==''){
	
  	$event_code=$g_code;
	
}else{
   $place_code=$row3['Event_Code'];
   $event_code=$row3['Event_Code'];

}

if($row3['Event_Name']==''){
	
  	$event_name=$g_code_name;
	
}else{

   $event_name=$row3['Event_Name'];

}	

if($row3['Class_Code']==''){
	
  	$class_code=$b_code;
	
}else{

   $class_code=$row3['Class_Code'];

}

if($row3['Class_Name']==''){
	
  	$class_name=$b_code_name;
	
}else{

   $class_name=$row3['Class_Name'];

}	



?>
{"uid":"<?php echo $place_code;?>","parent_uid":"<?php echo $place_code;?>","center_id":"<?php echo $center_id;?>","s_code":"<?php echo $place_name;?>","g_code":"<?php echo $event_name;?>","scode":"<?php echo $place_code;?>","gcode":"<?php echo $event_code;?>","pcode":"<?php echo $place_code;?>","ccode":"<?php echo $class_code;?>","cname":"<?php echo $class_name;?>","cnt":"<?php echo $ct_countx;?>"}<?php if($z==$ct_countt){?><?php }else{?>,<?php }?><?php } ?><?php }else{?><?php } ?>]}

