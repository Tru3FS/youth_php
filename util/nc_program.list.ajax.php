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
$b_code = (isset($_REQUEST["b_code"]) && $_REQUEST["b_code"]) ? $_REQUEST["b_code"] : NULL;
$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : NULL;
$p_code = (isset($_REQUEST["p_code"]) && $_REQUEST["p_code"]) ? $_REQUEST["p_code"] : NULL;
$programcode_name = (isset($_REQUEST["programcode_name"]) && $_REQUEST["programcode_name"]) ? $_REQUEST["programcode_name"] : NULL;
$programcode_bname = (isset($_REQUEST["programcode_bname"]) && $_REQUEST["programcode_bname"]) ? $_REQUEST["programcode_bname"] : NULL;
$xcode = (isset($_REQUEST["xcode"]) && $_REQUEST["xcode"]) ? $_REQUEST["xcode"] : NULL;

$search = (isset($_REQUEST["search"]) && $_REQUEST["search"]) ? $_REQUEST["search"] : NULL;


$date = new DateTime(date("Y-m-01")); #DateTime 오브젝트변수를 생성
$fristday=$date->format("Ymd");
$date->add(new DateInterval('P1M')); # 생성한 변수에 한달을 더함
$date->sub(new DateInterval('P1D')); # 변수에 하루를 뺌
$endday=$date->format("Ymd");


$today = date("Ymd");



if($center_id !='' && $s_code == '' && $g_code == ''  && $b_code == ''){




    $sqlb = $sqlb."SELECT * ";
    $sqlb = $sqlb."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb = $sqlb."       TB_Code_D   b ON a.Place_Code = b.Detail_Code AND b.Common_Code = 'H01' ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
    $sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Detail_Name limit 10";
	
	
	

    $sqlb2 = $sqlb2."SELECT * ";
    $sqlb2 = $sqlb2."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb2 = $sqlb2."       TB_Code_D   b ON a.Place_Code = b.Detail_Code AND b.Common_Code = 'H01' ";
    $sqlb2 = $sqlb2." WHERE a.Center_ID           = '01' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Division      = '003' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb2 = $sqlb2."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb2 = $sqlb2."   AND a.State               = '001' ";
	$sqlb2 = $sqlb2." ORDER BY b.Detail_Name ";
	
	
	

}else if($center_id !='' && $s_code != '' && $g_code == ''  && $b_code == ''){



	$sqlb = "";
    $sqlb = $sqlb."SELECT * ";
    $sqlb = $sqlb."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb = $sqlb."       TB_Code_D   b ON a.Event_Code = b.Detail_Code AND b.Common_Code = 'H02' ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
    $sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Detail_Name limit 10";


	$sqlb2 = "";
    $sqlb2 = $sqlb2."SELECT * ";
    $sqlb2 = $sqlb2."  FROM TB_SaleItem a INNER JOIN ";
	$sqlb2 = $sqlb2."       TB_Code_D   b ON a.Event_Code = b.Detail_Code AND b.Common_Code = 'H02' ";
    $sqlb2 = $sqlb2." WHERE a.Center_ID           = '01' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Division      = '003' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb2 = $sqlb2."   AND a.Place_Code       = '$s_code' ";
	$sqlb2 = $sqlb2."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb2 = $sqlb2."   AND a.State               = '001' ";
	$sqlb2 = $sqlb2." ORDER BY b.Detail_Name ";




//$sqlb = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용'  and 업장코드 = '$s_code'  and (('$today' > 강습시작일) && ('$today' < 강습종료일))   limit 10";  
//$sqlb2 = "SELECT * FROM 노블_코드 where 업장구분    = '$center_id' and 사용여부='사용'   and 업장코드 = '$s_code'  and (('$today' > 강습시작일) && ('$today' < 강습종료일))  "; 

}else if($center_id !='' && $s_code != '' && $g_code != ''  && $b_code == ''){


    $sqlb = $sqlb."SELECT * ";
    $sqlb = $sqlb."  FROM TB_SaleItem   a INNER JOIN ";
	$sqlb = $sqlb."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Class_Code ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
    $sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb = $sqlb."   AND a.Event_Code      =  '$g_code' ";
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.Online_Yn           = 'Y' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Class_Name limit 10";


    $sqlb2 = $sqlb2."SELECT * ";
    $sqlb2 = $sqlb2."  FROM TB_SaleItem   a INNER JOIN ";
	$sqlb2 = $sqlb2."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Class_Code ";
    $sqlb2 = $sqlb2." WHERE a.Center_ID           = '01' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Division      = '003' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb2 = $sqlb2."   AND a.Event_Code       =  '$g_code' ";
	$sqlb2 = $sqlb2."   AND a.Place_Code       = '$s_code' ";
	$sqlb2 = $sqlb2."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb2 = $sqlb2."   AND a.Online_Yn           = 'Y' ";
	$sqlb2 = $sqlb2."   AND a.State               = '001' ";
	$sqlb2 = $sqlb2." ORDER BY b.Class_Name ";


}else if($center_id !='' && $s_code != '' && $g_code != '' && $b_code != ''){



    $sqlb = $sqlb."SELECT * ";
    $sqlb = $sqlb."  FROM TB_SaleItem   a INNER JOIN ";
	$sqlb = $sqlb."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Class_Code ";
    $sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
    $sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
    $sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb = $sqlb."   AND a.Class_Code      =  '$b_code' ";
	$sqlb = $sqlb."   AND a.Event_Code      =  '$g_code' ";
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb = $sqlb."   AND a.Online_Yn           = 'Y' ";
	$sqlb = $sqlb."   AND a.State               = '001' ";
	$sqlb = $sqlb." ORDER BY b.Class_Name limit 10";


    $sqlb2 = $sqlb2."SELECT * ";
    $sqlb2 = $sqlb2."  FROM TB_SaleItem   a INNER JOIN ";
	$sqlb2 = $sqlb2."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Class_Code ";
    $sqlb2 = $sqlb2." WHERE a.Center_ID           = '01' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Division      = '003' ";
    $sqlb2 = $sqlb2."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb2 = $sqlb2."   AND a.Class_Code       =  '$b_code' ";	
	$sqlb2 = $sqlb2."   AND a.Event_Code       =  '$g_code' ";
	$sqlb2 = $sqlb2."   AND a.Place_Code       = '$s_code' ";
	$sqlb2 = $sqlb2."   AND a.Sales_Place_Code = '$center_id' ";
	$sqlb2 = $sqlb2."   AND a.Online_Yn           = 'Y' ";
	$sqlb2 = $sqlb2."   AND a.State               = '001' ";
	$sqlb2 = $sqlb2." ORDER BY b.Class_Name ";


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
{"title":"<?php echo $row['Sales_Item_Name'];?>","upjang":"<?php echo   $row['Place_Name'];?>","center_id":"<?php echo $center_id;?>","s_code":"<?php echo $row['Place_Name'];?>","g_code":"<?php echo $row['Place_Name'];?>","scode":"<?php echo $row['Place_Name'];?>","gcode":"<?php echo $row['Place_Name'];?>","pcode":"<?php echo $row['Place_Name'];?>","status":"1","cntid":"<?php echo $center_id;?>","cnt":"<?php echo $ct_countx;?>","cnt2":"<?php echo $ct_countx2;?>"}<?php if($i==$ct_countx){?><?php }else{?>,<?php }?><?php } ?>
<?php if($ct_countx=='0'){?>{"tcnt":"<?php echo $ct_countx;?>","tcnt2":"<?php echo $ct_countx2;?>"}<?php }?>]}
<?php } ?>