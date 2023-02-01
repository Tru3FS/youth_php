<?php
//if (!defined('_SAMSUNG_')) exit; // 개별 페이지 접근 불가
include_once("./_common.php");
// error_reporting( E_ALL );
// ini_set( "display_errors", 'On' );

header('Content-type: application/json');


$programcode = (isset($_REQUEST["programcode"]) && $_REQUEST["programcode"]) ? $_REQUEST["programcode"] : NULL;
$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : NULL;
$s_code = (isset($_REQUEST["s_code"]) && $_REQUEST["s_code"]) ? $_REQUEST["s_code"] : NULL;
$g_code = (isset($_REQUEST["g_code"]) && $_REQUEST["g_code"]) ? $_REQUEST["g_code"] : NULL;
$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : NULL;
$p_code = (isset($_REQUEST["p_code"]) && $_REQUEST["p_code"]) ? $_REQUEST["p_code"] : NULL;
$programcode_name = (isset($_REQUEST["programcode_name"]) && $_REQUEST["programcode_name"]) ? $_REQUEST["programcode_name"] : NULL;
$programcode_bname = (isset($_REQUEST["programcode_bname"]) && $_REQUEST["programcode_bname"]) ? $_REQUEST["programcode_bname"] : NULL;







if($center_id !='' && $s_code == '' && $g_code == ''){


$sqlb = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용' and 종목 is not NULL  limit 10";  
$sqlb2 = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용' and 종목 is not NULL";  

}else if($center_id !='' && $s_code != '' && $g_code == '' ){




$sqlb = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용'  and 업장코드 = '$s_code'  limit 10";  
$sqlb2 = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용'   and 업장코드 = '$s_code'"; 

}else if($center_id !='' && $s_code != '' && $g_code != ''){



$sqlb = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id'  and 업장코드    = '$s_code'  and 사용여부='사용' and (종목    = '$p_code' or 종목 is NULL) limit 10";  
$sqlb2 = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id'  and 업장코드    = '$s_code' and 사용여부='사용' and (종목    = '$p_code' or 종목 is NULL)"; 


}else if($center_id =='' && $s_code == '' && $g_code == ''){



}




if($center_id ==''){
?>

{"success":true,"data":[{"title":"","cntid":"","status":"0"}]}

<?php
 }else{



$resultc = sql_query($sqlb);
$ct_countx =  sql_num_rows($resultc);
$resultc2 = sql_query($sqlb2);
$ct_countx2 =  sql_num_rows($resultc2);

?>


{"success":true,"data":[
<?php for($i=1; $row=sql_fetch_array($resultc); $i++) { 


//$co_gu=$row['co_gu'];

?>
{"title":"<?php echo $row['종목'];?>","upjang":"<?php echo   $row['업장명'];?>","center_id":"<?php echo $row['업장구분'];?>","s_code":"<?php echo $row['업장명'];?>","g_code":"<?php echo $row['종목'];?>","scode":"<?php echo $row['업장코드'];?>","gcode":"<?php echo $row['상품코드'];?>","pcode":"<?php echo $row['프로그램 코드'];?>","status":"1","cntid":"<?php echo $center_id;?>","cnt":"<?php echo $ct_countx;?>","cnt2":"<?php echo $ct_countx2;?>"}<?php if($i==$ct_countx){?><?php }else{?>,<?php }?><?php } ?>
]}
<?php } ?>