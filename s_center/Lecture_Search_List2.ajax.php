<?php
include_once("./_common.php");

$center_id = $_POST["item1"];
$ip=get_real_client_ip();
$member_id       = get_session('m_id');
$s_code=$_POST["item2"];
$g_code=$_POST["item3"];
$b_code=$_POST["item4"];
$page=$_POST["page"];





//$json_string =  CF_Search_Sales_Code ($center_id, $sales_place_code, $place_code, $event_code, $class_code, $Tmonth, $member_id, $url, $ip);

//$json_array = json_decode($json_string, true); 

?>

<?php
$search = (isset($_REQUEST["search"]) && $_REQUEST["search"]) ? $_REQUEST["search"] : NULL;

If ($g_code ==""){

$g_code='';


}
//$today2 = date("Ym");


if(is_mobile()=='1'){



$rows = '15';
}else{

if($s_code=='002'){

$rows = '50';
}else{
$rows = '50';

}


	}

$sql = "";
$sql = "SELECT Next_Month_Day, DATE_FORMAT(SYSDATE(), '%d') as Current_Day FROM TB_SystemSetting WHERE Center_ID = '01' ";

$row_0 = sql_fetch($sql);
$Next_Month_Day = $row_0['Next_Month_Day'];
$Current_Day = $row_0['Current_Day'];

if($Next_Month_Day <= $Current_Day){
	$sql = "";
	$sql = "SELECT DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 1 MONTH), '%Y%m') as Tmonth FROM dual";
}
else{
	$sql = "";
	$sql = "SELECT DATE_FORMAT(SYSDATE(), '%Y%m') as Tmonth FROM dual";
}

$row_1 = sql_fetch($sql);
$today2 = $row_1['Tmonth'];





if($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함



$qstr1 = "item1=$center_id&item2=$s_code&item3=$g_code&item4=$b_code&search=$search";


	$sqlb = "";
	$sqlb = $sqlb."SELECT a.Center_ID,a.Place_Code, a.Sales_Code,a.Sales_Place_Code,a.Event_Code,a.Class_Code,  a.Kiosk_Display_Text as Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, d.Class_Name, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
	$sqlb = $sqlb."       (SELECT Detail_Name FROM TB_CODE_D WHERE Common_Code = 'H02' AND Detail_Code = a.Event_Code) Event_Name, ";
	$sqlb = $sqlb."       c.User_Name as Lesson_ID, b.Program_Sub_Name, b.Month_Qty, b.Unit_Price, a.Capacity as Capacity_On_OffLine,";
	$sqlb = $sqlb."       (SELECT COUNT(*) ";
	$sqlb = $sqlb."          FROM TB_Transaction ";
	$sqlb = $sqlb."         WHERE Center_ID        = a.Center_ID ";
	$sqlb = $sqlb."           AND Sales_Division   = '003' ";
	$sqlb = $sqlb."           AND Sales_Code       = a.Sales_Code ";
	$sqlb = $sqlb."           AND '$today2'    BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sqlb = $sqlb."           AND End_Date        >= F_DATE_TIME('YYYYMMDD') ";
	$sqlb = $sqlb."           AND Transition_State = '001' ";
	$sqlb = $sqlb."           AND Trs_Type         = '001' ";
	$sqlb = $sqlb."           AND State            = '001') ";
	$sqlb = $sqlb."       + (SELECT COUNT(*) ";
	$sqlb = $sqlb."            FROM TB_Basket_Program ";
	$sqlb = $sqlb."           WHERE Center_ID       = a.Center_ID ";
	$sqlb = $sqlb."             AND Sales_Division  = '003' ";
	$sqlb = $sqlb."             AND Sales_Code      = a.Sales_Code ";
	$sqlb = $sqlb."             AND '$today2'   BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sqlb = $sqlb."             AND State           = '001') ";
	$sqlb = $sqlb."       + (SELECT COUNT(*) ";
	$sqlb = $sqlb."            FROM tb_lecture_waiting ";
	$sqlb = $sqlb."           WHERE Center_ID       = a.Center_ID ";
	$sqlb = $sqlb."             AND YYYYMM          = '$today2' ";
	$sqlb = $sqlb."             AND Sales_Code      = a.Sales_Code ";
	$sqlb = $sqlb."             AND Process_State   = '01') as Current_Person, ";
	$sqlb = $sqlb."       F_NVLS(c.User_Name, '') as Lesson_User_Name, ";
	$sqlb = $sqlb."       d.Web_Re_Start, d.Web_Re_End, d.Web_Re_Start_Time, d.Web_Re_End_Time, d.Web_New_Start, d.Web_New_End, d.Web_New_Start_Time, d.Web_New_End_Time, ";
	$sqlb = $sqlb."       a.Place_Code, F_NVLS(e.Detail_Name, '') as Place_Name ";
	$sqlb = $sqlb."  FROM TB_SaleItem        a INNER JOIN ";
	$sqlb = $sqlb."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
	$sqlb = $sqlb."       TB_LessonUser_Info c ON a.Center_ID = c.Center_ID AND a.Lesson_ID = c.Lesson_ID LEFT OUTER JOIN ";
    $sqlb = $sqlb."       TB_EventClass      d ON a.Center_ID = d.Center_ID AND a.Sales_Division = d.Sales_Division AND a.Event_Code = d.Event_Code AND a.Class_Code = d.Class_Code LEFT OUTER JOIN ";
	$sqlb = $sqlb."       TB_Code_D          e ON a.Place_Code = e.Detail_Code AND e.Common_Code = 'H01' ";
	//$sqlb = $sqlb."       TB_Basket_Program    f ON a.Sales_Code = f.Sales_Code AND a.Sales_Item_Name = f.Sales_Item_Name AND a.Sales_Division = f.Sales_Division AND  a.State =  f.State ";
	$sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
	$sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
	

	//$sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";	
	//$sqlb = $sqlb."   AND a.Class_Code       like CONCAT('$b_code', '%') ";
	//$sqlb = $sqlb."   AND a.Event_Code       like CONCAT('$g_code', '%') ";
	$sqlb = $sqlb."   AND a.Place_Code       like CONCAT('$s_code', '%') ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code like '$center_id' ";	
	$sqlb = $sqlb."   AND a.Online_Yn           = 'Y' ";
	$sqlb = $sqlb."   AND b.Online_Yn           = 'Y' ";
		


	$sqlb = $sqlb."   AND a.First_Start_Day_Yn = 'Y' ";
	$sqlb = $sqlb."   AND a.State              = '001' ";
	$sqlb = $sqlb."   AND CASE WHEN a.Sales_Place_Code = '01' THEN 1 = 1 ";
	$sqlb = $sqlb."       ELSE SUBSTRING(CONCAT(Month_Start_Yn_01, Month_Start_Yn_02, Month_Start_Yn_03, Month_Start_Yn_04, Month_Start_Yn_05, Month_Start_Yn_06, Month_Start_Yn_07, Month_Start_Yn_08, Month_Start_Yn_09, Month_Start_Yn_10, Month_Start_Yn_11, Month_Start_Yn_12), CAST(SUBSTRING('$today2', 5, 2) as int), 1) = 'Y' END ";
	$sqlb = $sqlb."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) ";
	$sqlb = $sqlb."                                  FROM TB_SaleItem ";
	$sqlb = $sqlb."                                 WHERE Center_ID   = a.Center_ID ";
	$sqlb = $sqlb."                                   AND Apply_Date <= F_DATE_TIME('YYYYMMDD') ";
	$sqlb = $sqlb."                               ) ";
	$sqlb = $sqlb." ORDER BY a.Kiosk_Display_Text  limit $from_record, $rows";





	$sqlc = "";
	$sqlc = $sqlc."SELECT  a.Center_ID,a.Place_Code, a.Sales_Code,a.Sales_Place_Code,a.Event_Code,a.Class_Code,  a.Kiosk_Display_Text as Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, d.Class_Name, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
	$sqlc = $sqlc."       (SELECT Detail_Name FROM TB_CODE_D WHERE Common_Code = 'H02' AND Detail_Code = a.Event_Code) Event_Name, ";
	$sqlc = $sqlc."       c.User_Name as Lesson_ID, b.Program_Sub_Name, b.Month_Qty, b.Unit_Price, a.Capacity as Capacity_On_OffLine,";
	$sqlc = $sqlc."       (SELECT COUNT(*) ";
	$sqlc = $sqlc."          FROM TB_Transaction ";
	$sqlc = $sqlc."         WHERE Center_ID        = a.Center_ID ";
	$sqlc = $sqlc."           AND Sales_Division   = '003' ";
	$sqlc = $sqlc."           AND Sales_Code       = a.Sales_Code ";
	$sqlc = $sqlc."           AND '$today2'    BETWEEN Start_Date AND End_Date ";
	$sqlc = $sqlc."           AND End_Date        >= F_DATE_TIME('YYYYMMDD') ";
	$sqlc = $sqlc."           AND Transition_State = '001' ";
	$sqlc = $sqlc."           AND Trs_Type         = '001' ";
	$sqlc = $sqlc."           AND State            = '001') ";
	$sqlc = $sqlc."       + (SELECT COUNT(*) ";
	$sqlc = $sqlc."            FROM TB_Basket_Program ";
	$sqlc = $sqlc."           WHERE Center_ID       = a.Center_ID ";
	$sqlc = $sqlc."             AND Sales_Division  = '003' ";
	$sqlc = $sqlc."             AND Sales_Code      = a.Sales_Code ";
	$sqlc = $sqlc."             AND '$today2'   BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sqlc = $sqlc."             AND State           = '001') ";
	$sqlc = $sqlc."       + (SELECT COUNT(*) ";
	$sqlc = $sqlc."            FROM tb_lecture_waiting ";
	$sqlc = $sqlc."           WHERE Center_ID       = a.Center_ID ";
	$sqlc = $sqlc."             AND YYYYMM          = '$today2' ";
	$sqlc = $sqlc."             AND Sales_Code      = a.Sales_Code ";
	$sqlc = $sqlc."             AND Process_State   = '01') as Current_Person, ";
	$sqlc = $sqlc."       F_NVLS(c.User_Name, '') as Lesson_User_Name, ";
	$sqlc = $sqlc."       d.Web_Re_Start, d.Web_Re_End, d.Web_Re_Start_Time, d.Web_Re_End_Time, d.Web_New_Start, d.Web_New_End, d.Web_New_Start_Time, d.Web_New_End_Time, ";
	$sqlc = $sqlc."       a.Place_Code, F_NVLS(e.Detail_Name, '') as Place_Name";
	$sqlc = $sqlc."  FROM TB_SaleItem        a INNER JOIN ";
	$sqlc = $sqlc."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
	$sqlc = $sqlc."       TB_LessonUser_Info c ON a.Center_ID = c.Center_ID AND a.Lesson_ID = c.Lesson_ID LEFT OUTER JOIN ";
	$sqlc = $sqlc."       TB_EventClass      d ON a.Center_ID = d.Center_ID AND a.Sales_Division = d.Sales_Division AND a.Event_Code = d.Event_Code AND a.Class_Code = d.Class_Code LEFT OUTER JOIN ";
	$sqlc = $sqlc."       TB_Code_D          e ON a.Place_Code = e.Detail_Code AND e.Common_Code = 'H01' ";
	//$sqlc = $sqlc."       TB_Basket_Program    f ON a.Sales_Code = f.Sales_Code AND a.Sales_Item_Name = f.Sales_Item_Name AND a.State =  f.State";
	$sqlc = $sqlc." WHERE a.Center_ID           = '01' ";
	$sqlc = $sqlc."   AND a.Sales_Division      = '003' ";


	//$sqlc = $sqlc."   AND a.Sales_Item_Name like '$search%' ";		
	//$sqlc = $sqlc."   AND a.Class_Code       like CONCAT('$b_code', '%') ";
	//$sqlc = $sqlc."   AND a.Event_Code       like CONCAT('$g_code', '%') ";
	$sqlc = $sqlc."   AND a.Place_Code       like CONCAT('$s_code', '%') ";
	$sqlc = $sqlc."   AND a.Sales_Place_Code like '$center_id' ";
	$sqlc = $sqlc."   AND a.Online_Yn           = 'Y' ";
	$sqlc = $sqlc."   AND b.Online_Yn           = 'Y' ";

 
	$sqlc = $sqlc."   AND a.First_Start_Day_Yn = 'Y' ";
	$sqlc = $sqlc."   AND a.State              = '001' ";
	$sqlc = $sqlc."   AND CASE WHEN a.Sales_Place_Code = '01' THEN 1 = 1 ";
	$sqlc = $sqlc."       ELSE SUBSTRING(CONCAT(Month_Start_Yn_01, Month_Start_Yn_02, Month_Start_Yn_03, Month_Start_Yn_04, Month_Start_Yn_05, Month_Start_Yn_06, Month_Start_Yn_07, Month_Start_Yn_08, Month_Start_Yn_09, Month_Start_Yn_10, Month_Start_Yn_11, Month_Start_Yn_12), CAST(SUBSTRING('$today', 5, 2) as int), 1) = 'Y' END ";
	$sqlc = $sqlc."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) ";
	$sqlc = $sqlc."                                  FROM TB_SaleItem ";
	$sqlc = $sqlc."                                 WHERE Center_ID   = a.Center_ID ";
	$sqlc = $sqlc."                                   AND Apply_Date <= F_DATE_TIME('YYYYMMDD') ";
	$sqlc = $sqlc."                               ) ";
	$sqlc = $sqlc." ORDER BY a.Kiosk_Display_Text ";



//echo $sqlc;

?>




<?php




if($center_id =='' || $center_id=='0' ){

$total_page = '1'; // 전체 페이지 계산




?><div class="board_head ">
	<div class="count_area">
		<p>검색결과 <em id="" class="tot">0개</em></p>
	</div>
	<div class="order_area type3">
		<div class="btn_wrap pad_b0">
			
		</div>
	</div>
</div>
            
       <div class="noResult">
					           <p class="tit">현재 등록된 강좌가 없습니다.</p>
										</div>

<?php }else{



$resultc = sql_query($sqlb);
$ct_countx =  sql_num_rows($resultc);
$resultc2 = sql_query($sqlb);

$resultx = sql_query($sqlb);

$resultcc = sql_query($sqlc);

if ($ct_countx=='' || $ct_countx=='0'){
?>


       <div class="noResult">
					           <p class="tit">현재 등록된 강좌가 없습니다.</p>
										</div>

<?php }else{

$ttcount = sql_query($sqlc);

$totalcount =  sql_num_rows($ttcount);

$sales_count = 0;

for($i=1; $row=sql_fetch_array($ttcount); $i++) { 
	$sales_code = $row['Sales_Code'];
	if($sales_code != $old_sales_code){
		$sales_count = $sales_count + 1;
	}

	$old_sales_code = $sales_code;
}

if(is_mobile()=='1'){
$pcount = '5';
}else{
$pcount = '10';
	}


$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
$num = $totalcount - (($page-1)*$rows);



?>
<form name="program_form" class="program_form" id="program_form" method="post">


<?php if($center_id=='01'){

$center_txt="스포츠센터";
}elseif($center_id=='02'){

$center_txt="문화센터";
}



?>

<style>
.rank_list2 table{
  width:100%;
}
.rank_list2 td, .rank_list2 td > a, .rank_list2 td > div {
    height: 70px;width:100%;
}
.rank_list2 td{
    height: 70px;
    padding-right: 0px;
    border-top: 1px solid #f3f3f3;    float: none;padding-left: 15px;vertical-align: middle;
    display: table-cell;
}
.rank_list2 tr{
display:none;
}

.rank_list2 tr.cc, .rank_list2 tr.tt{
display:block;display: table;
width: 100%;
}
.rank_list2 tr.cc{
height:80px;
    float: left;
    width: 100%;    
	position: relative;display: table;
}
.rank_list2 tr.cc.tt{
height:120px;
    float: left;
    width: 100%;    
	position: relative;display: table;
}
.rank_list2 tr.pp{
    height: 160px;
    float: left;
    width: 100%;    
	position: relative;display: table;
}
.rank_list2 tr.ee{
    height: 200px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}

.rank_list2  tr.tt td,.rank_list2  tr.pp td,.rank_list2  tr.ee td {
    height: 100%;
    padding-right: 0px;padding-left: 15px;
    border-top: 1px solid #f3f3f3;
    float: none;
    vertical-align: middle;display: table-cell;
}

.record_table tr.cc {
    visibility: visible;
}


.record_table tr.xx td {
    background-color: #f9f9f9;height: 40px;padding: 10px 8px;
}

@media (min-width: 768px){

}
@media screen and (max-width:1024px){
.rank_list2 td {

    padding-right: 2px;

}
}
@media screen and (max-width: 786px){
.record_table tr.xx td {
    background-color: #f9f9f9;
    height: 40px;
    padding: 10px 8px;font-size: 12px;
}
}
</style>



<input type="hidden" name="page" id="page" value="<?php echo $page;?>">
<div class="board_head ">
	<div class="count_area">
		<p>강좌 <em id="" class="tot"><?php echo $sales_count;?></em>개</p>
	</div>
	<div class="order_area type3">
		<div class="btn_wrap pad_b0">
			<p class="note">※ 가로로 스크롤 하여 보실 수 있습니다.</p>
		</div>
	</div>
</div>

<div class="tableWrap mgb15"  id="nc_program_list">

<div>

<div class="record_inner">
    <div class="record_rank">
        <div class="title">
            <b>강좌명</b>
        </div>
        <ul class="rank_list2" id="rank">
												
<table>
<tbody id="leture_table">												
<?php for($i=1; $row=sql_fetch_array($resultc); $i++) { 

  $place_code=$row['Place_Code'];
  $event_code=$row['Event_Code'];
  $class_code=$row['Class_Code'];
  $sales_place_code=$row['Sales_Place_Code'];
  $sales_item_name=$row['Sales_Item_Name'];






?>													
					
<tr class="<?php echo $row['Sales_Code'];?>">
        <td >
        <div class="wrap"><a href="#!" class="link"><span class="team"><?php echo $center_txt;?></span><span class="player"><?php echo $sales_item_name;?></span></a></div>
        </td>

</tr>

<script>

$(document).ready(function() {

	console.log($("#leture_table tr.<?php echo $row['Sales_Code'];?>").length);

if ($("#leture_table tr.<?php echo $row['Sales_Code'];?>").length < 2)
{
$("#leture_table tr.<?php echo $row['Sales_Code'];?>:first").addClass("cc");
}else if ($("#leture_table tr.<?php echo $row['Sales_Code'];?>").length < 3)
{

$("#leture_table tr.<?php echo $row['Sales_Code'];?>:first").addClass("cc tt");
}else if ($("#leture_table tr.<?php echo $row['Sales_Code'];?>").length < 4)
{
$("#leture_table tr.<?php echo $row['Sales_Code'];?>:first").addClass("cc pp");
}else if ($("tr.<?php echo $row['Sales_Code'];?>").length < 5)
{
$("#leture_table tr.<?php echo $row['Sales_Code'];?>:first").addClass("cc ee");
}



});

</script>

<?php }?>
</tbody>
</table>

				</ul>
    </div>
		  <div id="record_scroll" class="table_scroll new_scroll" style="touch-action: pan-y pinch-zoom;">
        <div class="scroller">
            <div class="record_table">
                <table>
                    <caption>강좌</caption>
                    <colgroup>
     
            <col width="8%">
			 <col width="8%">
            <col width="8%">
            <col width="12%">
            <col width="18%">
            <col width="8%">
            <col width="*">
            <col width="10%">
            <col width="8%">
          </colgroup>
					<thead><tr id="record_header">

    <th scope="col" class=""><a href="#"  class=""><span>업장</span></a></th>
	<th scope="col" class=""><a href="#"  class=""><span>종목</span></a></th>
    <th scope="col" class=""><a href="#"  class=""><span>강사명</span></a></th>
    
    <th scope="col"><a href="#"  class=""><span>교육대상</span></a></th>
    
    <th scope="col"><a href="#" class=""><span>교육시간</span></a></th>
    
    <th scope="col" colspan="2"><a href="#" class="" ><span>수강료(개월/원)</span></a></th>
    
    <th scope="col"><a href="#"  class=""><span>정원(명)</span></a></th>
    
    <th scope="col"><a href="#" class=""><span>상태</span></a></th>
    
    <th scope="col" ><a href="#" class=""><span>신청</span></a></th>
    
    
    
</tr>
<!--<tr>

										<th scope="col">
											<span>강좌</span>
										</th>
										<th scope="col">
											<span>요금</span>
										</th>
									
									</tr>-->
</thead>
                    <tbody id="record_table">
    
													
														<?php for($i=1; $row2=sql_fetch_array($resultc2); $i++) { 
														
														          $start_time=$row2['Start_Time'];
																  $start_time1 = substr($start_time,0,2);
		                                                          $start_time2 = substr($start_time,2,2);
																  
																  $end_time=$row2['End_Time'];
																  $end_time1 = substr($end_time,0,2);
		                                                          $end_time2 = substr($end_time,2,2);
                                                                  $lesson_user_name=$row2['Lesson_User_Name'];

                                                                  if($lesson_user_name==''){
                                                                   
																   $lesson_user_name='-';

																  }else{
                                                                  
																  $lesson_user_name=$row2['Lesson_User_Name'];

                                                                  }



																  $place_name=$row2['Place_Name'];
																  $event_name=$row2['Event_Name'];
																  $class_name=$row2['Class_Name'];


$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함 일
/*echo $total_count2;*/


$toymd=$thisyear."".$thismonth."".$today;
$toyhm=date('Hi',time());

$totmd=$toymd."".$toyhm;


$sales_item_name=$row2['Sales_Item_Name'];
$sales_code=$row2['Sales_Code'];
$sales_place_code=$row2['Sales_Place_Code'];
$sales_division=$row2['Sales_Division'];
$s_date=$row2['Start_Date'];
$e_date=$row2['End_Date'];
$vat_yn=$row2['Vat_Yn'];

$unit_price=$row2['Unit_Price'];
$week_name=$row2['Week_Name'];
$month_qty=$row2['Month_Qty'];

//echo $month_qty;
//echo $s_date;
//echo $e_date;

$monthqty= $month_qty*1;






$total_people=$row2['Capacity_On_OffLine'];
$cur_people=$row2['Current_Person'];
if($total_people == 0){
	$total_people = 1;
}

if($cur_people >= $total_people){
	$cur_people = $total_people;
}

$percent_inwon = $cur_people / $total_people * 100;
$percent_inwon = round($percent_inwon, 1);
$percent_inwon_t = round($percent_inwon, 1);
if ($percent_inwon == 0){
$percent_inwon="0";
}else{
	
	
}
	
if ($total_people == $cur_people){


}



if ($percent_inwon<"100"){	
//$s_txt="<span class='rbb'>신청</span>";	
//$s_txt2="<span class='rbw'>접수가능</span>";	
//$s_people="<span>".$row2['Current_Person']."/".$row2['Capacity_On_OffLine'].	"</span>";	
//$s_tag = 'Y';
}else{
//$s_txt="<span class='rbx'>마감</span>";
//$s_txt2="<span class='rbx'>접수불가</span>";	
//$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
//$s_tag = 'N';
}		



/*

$json_string = CF_Basket_Check2 ($cx_id, $sales_division, $sales_code, $sales_item_name, $week_name, $month_qty, $monthqty, $unit_price, $s_date, $e_date, $vat_yn,  $url, $ip);


$json_array = json_decode($json_string, true); 


//echo $json_array['Result']['ResultCode'];
if($json_array['Result']['ResultCode'] == -50 || $percent_inwon>='100'){

$s_txt="<span class='rbx'>마감</span>";
$s_txt2="<span class='rbx'>접수불가</span>";	
$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
$s_tag = 'N';
}elseif($json_array['Result']['ResultCode'] == -40 || $percent_inwon<'100'){

$s_txt="<span class='rbb'>신청</span>";	
$s_txt2="<span class='rbw'>접수가능</span>";	
$s_tag = 'Y';

}
*/


/*
function CF_Web_Application_Search ('01', $sales_place_code, $place_code, $event_code){
	global $DBName;

	$sql = "";
    $sql = $sql."SELECT a.Sales_Code, a.Sales_Item_Name, b.Web_Re_Start, b.Web_Re_End, b.Web_Re_Start_Time, b.Web_Re_End_Time, b.Web_New_Start, b.Web_New_End, b.Web_New_Start_Time, b.Web_New_End_Time ";
    $sql = $sql."  FROM TB_SaleItem   a INNER JOIN ";
	$sql = $sql."       TB_EventClass b ON a.Center_ID = b.Center_ID AND a.Sales_Division = b.Sales_Division AND a.Event_Code = b.Event_Code AND a.Class_Code = b.Class_Code ";
    $sql = $sql." WHERE a.Center_ID           = :center_id ";
    $sql = $sql."   AND a.Sales_Division      = '003' ";
	$sql = $sql."   AND a.Event_Code       = :event_code ";
	$sql = $sql."   AND a.Place_Code       = :place_code ";
	$sql = $sql."   AND a.Sales_Place_Code = :sales_place_code ";
	$sql = $sql."   AND a.Online_Yn           = 'Y' ";
	$sql = $sql."   AND a.State               = '001' ";

    try{
        $db = new db();
        $db = $db->connect($DBName);

		$stmt = $db->prepare($sql);
		$stmt->bindParam(':center_id'       , $center_id);
		$stmt->bindParam(':sales_place_code', $sales_place_code);
		$stmt->bindParam(':place_code'      , $place_code);
		$stmt->bindParam(':event_code'      , $event_code);


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
};
*/
  $place_code=$row2['Place_Code'];
  $event_code=$row2['Event_Code'];
  $class_code=$row2['Class_Code'];
//echo $place_code;
//echo $event_code;
//echo $class_code;

$json_string = CF_Web_Application_Search ('01', $sales_place_code, $place_code, $event_code, $class_code);


$json_array = json_decode($json_string, true); 

if($json_array['Result']['ResultCode'] == -10){

}else{



		    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
	        
	
        	}

$sales_code=$val['Sales_Code'];

$Web_Apply_Gubun=$val['Web_Apply_Gubun'];

$Web_New_Start=$val['Web_New_Start'];
$Web_New_End=$val['Web_New_End'];
$Web_New_STime=$val['Web_New_Start_Time'];
$Web_New_ETime=$val['Web_New_End_Time'];
$Web_Re_Start=$val['Web_Re_Start'];
$Web_Re_End=$val['Web_Re_End'];
$Web_Re_STime=$val['Web_Re_Start_Time'];
$Web_Re_ETime=$val['Web_Re_End_Time'];

/*
$Web_New_Start='20210721';
$Web_New_End='20210730';
$Web_New_STime='0000';
$Web_New_ETime='2100';
*/
$Web_New_Start_T=$Web_New_Start."".$Web_New_STime;
$Web_New_End_T=$Web_New_End."".$Web_New_ETime;
$Web_Re_Start_T=$Web_Re_Start."".$Web_Re_STime;
$Web_Re_End_T=$Web_Re_End."".$Web_Re_ETime;

$Web_New_Start_y = substr($Web_New_Start, 0,4);
$Web_New_Start_m = substr($Web_New_Start, 4,2);
$Web_New_Start_d = substr($Web_New_Start, 6,2);
$Web_New_Startdate=$Web_New_Start_y."-".$Web_New_Start_m."-".$Web_New_Start_d."";

$Web_New_STime_h = substr($Web_New_STime, 0,2);
$Web_New_STime_m = substr($Web_New_STime, 2,2);
$Web_New_STime_t=$Web_New_STime_h.":".$Web_New_STime_m;


$Web_New_End_y = substr($Web_New_End, 0,4);
$Web_New_End_m = substr($Web_New_End, 4,2);
$Web_New_End_d = substr($Web_New_End, 6,2);
$Web_New_Enddate=$Web_New_End_y."-".$Web_New_End_m."-".$Web_New_End_d."";


$Web_New_ETime_h = substr($Web_New_ETime, 0,2);
$Web_New_ETime_m = substr($Web_New_ETime, 2,2);
$Web_New_ETime_t=$Web_New_ETime_h.":".$Web_New_ETime_m;


		 }




if ($percent_inwon<"100"){	
//$s_txt="<span class='rbb'>신청</span>";	
//$s_txt2="<span class='rbw'>접수가능</span>";	
//$s_people="<span>".$row2['Current_Person']."/".$row2['Capacity_On_OffLine'].	"</span>";	
//$s_tag = 'Y';
}else{
//$s_txt="<span class='rbx'>마감</span>";
//$s_txt2="<span class='rbx'>접수불가</span>";	
//$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
//$s_tag = 'N';
}		



			}

$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함 일

$toymd=$thisyear."".$thismonth."".$today;
$toyhm=date('Hi',time());

$totmd=$toymd."".$toyhm;

//echo $toymd."<br>";
//echo $Web_New_Start."<br>";
//echo $Web_New_End."<br>";
//echo $totmd."<br>";
//echo $Web_New_Start_T."<br>";
//echo $Web_New_End_T."<br><br><br>";
//echo $percent_inwon."<br>";


	if($toymd  >= $Web_New_Start && $toymd <= $Web_New_End){
		if($toyhm >= $Web_New_STime && $toyhm <= $Web_New_ETime){
			if ($percent_inwon<"100"){	
			$s_txt="<span class='rbb'><span class='cc'>신청</span></span>";	
			$s_txt2="<span class='rbn'>접수가능</span>";	
			$s_people="<span>".$cur_people."/".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'Y';
			}else{

			$s_txt="<span class='rbx'>마감</span>";
			$s_txt2="<span class='rbd'>접수불가</span>";	
			$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'N';
			}		
		}else{
			$s_txt="<span class='rbw'>준비</span>";	
			$s_txt2="<span class='rbn'>접수대기</span>";	
			$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'N';	
		}
	}else if($toymd  >= $Web_Re_Start && $toymd <= $Web_Re_End){
		if($toyhm >= $Web_Re_STime && $toyhm <= $Web_Re_ETime){
			$s_txt="<span class='rbb'>신청</span></span>";
			$s_txt2="<span class='rbn'>재수강접수</span>";	
			$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'Y';
		}else{
			$s_txt="<span class='rbw'>준비</span>";	
			$s_txt2="<span class='rbn'>접수대기</span>";	
			$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'N';
		}
	}else{ 
	$s_txt="<span class='rbx'>대기</span>";	
	$s_txt2="<span class='rbf'>접수불가</span>";	
	$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
	$s_tag = 'N';	
	}

}





/*else if($Web_Apply_Gubun == "2" ){
	if($toymd  >= $Web_New_Start && $toymd <= $Web_New_End){
		if($totmd >= $Web_New_Start_T && $totmd <= $Web_New_End_T){
			if ($percent_inwon<"100"){	
			$s_txt="<span class='rb'><span class='cc'>접수가능</span></span>";	
			$s_tag = 'Y';
			}else{

			$s_txt="<span class='rk'><span class='cc'>접수마감</span></span>";
			$s_tag = 'N';
			}		
		 }else{
			$s_txt="<span class='ry'><span class='cc'>접수준비</span></span>";	
		 }
	}
	else if($toymd  >= $Web_Re_Start && $toymd <= $Web_Re_End){
		if($totmd >= $Web_Re_Start_T && $totmd <= $Web_Re_End_T){
			$s_txt="<span class='rb'><span class='cc'>재접수가능</span></span>";
			$s_tag = 'Y';
		}else{
			$s_txt="<span class='ry'><span class='cc'>접수준비</span></span>";	
			$s_tag = 'N';
		}
	}
	else{ 
	$s_txt="<span class='re'><span class='cc'>접수불가</span></span>";	
	$s_tag = 'N';	
	}
}
*/




?>	
	




  <tr class="<?php echo $row2['Sales_Code'];?>">
        <td><?php echo $place_name;?></td>
		<td><?php echo $row2['Event_Name'];?></td>
        <td><span><?php echo $lesson_user_name;?></span></td>
        
        <td><span>전체</span></td>
        
        <td><span><?php echo $row2['Week_Name'];?><br><?php echo $start_time1;?>:<?php echo $start_time2;?>~<?php echo $end_time1;?>:<?php echo $end_time2;?></span></td>
        
        <td  class="cc"  style="height: 40px !important;"><span><?php echo $row2['Month_Qty'];?></span></td>
        
        <td class="align_R cc" style="height: 40px !important;"><span class='price'><?php echo number_format($row2['Unit_Price']);?></span></td>
        
        <td class="cc"  style="height: 40px !important;"><?php echo $s_people;?></td>
        
        <td class="cc"  style="height: 40px !important;"><a href="#!"><?php echo $s_txt2;?></a><!--<br><?php echo $total_people;?>/<?php echo $cur_people;?>--></td>

        <td class="cc"  style="height: 40px !important;">
   
		<a href="#!" onclick="goLink('<?php echo $row2['Sales_Code'];?>','<?php echo urlencode($row2['Event_Name']);?>','<?php echo $row2['Event_Code'];?>','<?php echo $row2['Place_Code'];?>','<?php echo $row2['Class_Code'];?>','<?php echo $center_id;?>','<?php echo $page;?>','<?php echo urlencode($row2['Sales_Item_Name']);?>','<?php echo $row2['Center_ID'];?>','<?php echo $row2['Month_Qty'];?>','<?php echo $row2['Unit_Price'];?>')"><?php echo $s_txt;?></a>
      
    </td>
	</tr>

<?php
if($s_tag != 'N'){
?>

<tr class="<?php echo $row2['Sales_Code'];?> cc xx">
			
            <td class="" style="background-color:<?php echo $sbg;?>;">접수현황</td>
            <td class="" colspan="9" style="background-color:#fff;">	 <span class=""><div class='progress-bar-holder'>
														<!-- date-value가 10% 이하, 즉 1% ~ 10% 사이면 data-value="10%" 로 맞춰주세요. 라운딩된 프로그래스바라 모양이 안나오니...-->
																				
														<div class='progress-bar' data-value="<?php echo $percent_inwon;?>%">
															<span class='t_left' style='color:<?php if($percent_inwon_t<10){ ?>#000<?php } else { ?>#fff<?php }?>;'>(<?php if($etc_people<0){ ?><?php echo $total_people;?><?php } else { ?><?php echo $cur_people;?><?php }?>/<?php echo $total_people;?>)</span><span class='t_right' style='color:<?php if($percent_inwon_t==100){ ?>#fff<?php } else { ?>#000<?php }?>;'><?php if($percent_inwon_t>100){ ?><?php echo $percent_inwon_t;?>%<?php } else { ?><?php echo $percent_inwon_t;?>%<?php }?></span>
														</div>
													</div></span></td>
          </tr>
<?php }
else{ ?>
<tr class="<?php echo $row2['Sales_Code'];?> cc xx">
<td class="" style="background-color:<?php echo $sbg;?>;">접수현황</td>
            <td class="" colspan="9" style="background-color:#fff;">	 <span class=""><div class='progress-bar-holder'>
														<!-- date-value가 10% 이하, 즉 1% ~ 10% 사이면 data-value="10%" 로 맞춰주세요. 라운딩된 프로그래스바라 모양이 안나오니...-->
																									
														<div class='progress-bar' data-value="0%">
															<span class='t_left' style='color:#fff'></span>
														</div>
													</div></span></td>
          </tr>
<?php } ?>
<script>

$(document).ready(function() {

	console.log($("#record_table tr.<?php echo $row2['Sales_Code'];?>").length);


 if ($("#record_table tr.<?php echo $row2['Sales_Code'];?>").length < 3)
{
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first").addClass("cc");

$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first td").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(6)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(7)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(8)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(9)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(10)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(1)").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(2)").show();


}else if ($("#record_table tr.<?php echo $row2['Sales_Code'];?>").length < 4)
{
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first").addClass("cc");

$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first td").attr('rowspan','2');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(6)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(7)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(8)").attr('rowspan','2');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(9)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(10)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(1)").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(2)").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(8)").hide();
}else if ($("#record_table tr.<?php echo $row2['Sales_Code'];?>").length < 5)
{

$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first td").attr('rowspan','3');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(6)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(7)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(8)").attr('rowspan','3');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(9)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(10)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first").addClass("cc tt");
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(1)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(2)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(3)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(4)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(5)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(8)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(1)").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(2)").show();
}else if ($("#record_table tr.<?php echo $row2['Sales_Code'];?>").length < 6)
{

$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first td").attr('rowspan','4');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(6)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(7)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(8)").attr('rowspan','4');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(9)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(10)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first").addClass("cc pp");
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(1)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(2)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(3)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(4)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(5)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(8)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(1)").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(2)").show();



}else if ($("#record_table tr.<?php echo $row2['Sales_Code'];?>").length < 7)
{

$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first td").attr('rowspan','5');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(6)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(7)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(8)").attr('rowspan','5');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(9)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?> td:nth-child(10)").attr('rowspan','1');
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:first").addClass("cc ee");
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(1)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(2)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(3)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(4)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(5)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>:not(:first) td:nth-child(8)").hide();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(1)").show();
$("#record_table tr.<?php echo $row2['Sales_Code'];?>.cc:last td:nth-child(2)").show();
}

});

</script>



<?php }?>

</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<style>
	
	.record_table tr{
    visibility: hidden;
}
.record_table tr.cc{
    visibility: visible;
}
.record_table #record_header{
    visibility: visible;
}
.record_table .cc{
    visibility: visible;
}

.record_table tr.pp td.cc{
    height: 70px !important;
}
.record_table tr.pp td.cnc{
   
}
.record_table tr.cc.pp td.cnc.cc {
    height: 70px !important;
}

.record_table tr.pp td:first-child{
   
 
}
.record_table tr.pp td:nth-child(2),.record_table tr.pp td:nth-child(3),.record_table tr.pp td:nth-child(4),.record_table tr.pp td:nth-child(5){
   
    

}
.record_table tr.pp td:nth-child(6),.record_table tr.pp td:nth-child(7),.record_table tr.pp td:nth-child(8),.record_table tr.pp td:nth-child(9),.record_table tr.pp td:nth-child(10){
   
    height: 70px !important;

}
.progress-bar-holder{
        width: 100%;
        border:0px solid #ccc;
        padding: 0;
         -webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		height: 18px;position: relative;
		background: #f6f6f6; border-radius: 13px;
      }
      .progress-bar{
        height:18px;
        text-align: right;
        background:#27b4c5;
        width: 0px;
        padding: 0px;
		-webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		    float: left;background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;    background-size: 1000%;box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
      }

.progress-bar.end {
    height: 18px;
    text-align: right;
    background: #27b4c5;
    width: 0px;
    padding: 0px;
    -webkit-border-radius: 13px;
    -moz-border-radius: 13px;
    border-radius: 13px;
    float: left;
    background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;
    background-size: 1000%;
    box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
}


.progress-bar span{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 11px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height:2;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    right: 18px;
	left:auto;
    letter-spacing: 0.04em;

      }
 .progress-bar-holder span.t_left{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: #fff;
    /* height: 15px; */
    line-height:1.75;
    vertical-align: middle;
    position: absolute;
    z-index: 10;float:left;
    left: 8px;
	float:left;
	    right: auto;

    letter-spacing: 0.04em;
 
      }
	  
 .progress-bar-holder span.t_right{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height:1.8;
    vertical-align: middle;
    position: absolute;
    z-index: 10;float:left;
    right: 8px;
	    left: auto;
		float:right;
    letter-spacing: 0.04em;

      } 
	  
 .end .progress-bar span{
 color:#fff;

}
.end .progress-bar {
    background: #e60012;
}

.record_table td{
height: 40px !important;
padding: 1px 8px;
}



	</style>


								<p class="note">※ 가로로 스크롤 하여 보실 수 있습니다.</p>
								
							</div>

<?php
echo get_paging_ca2($pcount, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&page=');
?>

<input type="hidden" id="center_id" name="center_id">
<input type="hidden" id="sales_code" name="sales_code">
<input type="hidden" id="event_name" name="event_name">
<input type="hidden" id="g_code" name="g_code">
<input type="hidden" id="s_code" name="s_code">
<input type="hidden" id="b_code" name="b_code">
<input type="hidden" id="ntitle" name="ntitle">
<input type="hidden" id="cx_id" name="cx_id">
<input type="hidden" id="n_type" name="n_type">
<input type="hidden" id="month_qty" name="month_qty">
<input type="hidden" id="unit_price" name="unit_price">
</form>


</div></div></div>



    </div><!-- .wrap -->




<?php } ?>



<?php } ?>


<script>

$(document).ready(function() {




 /*
$('td[class=best]').each(function(){
	if(!$.trim($(this).text()))
		$(this).hide();
});
*/
	$("#first").text('<?php echo $place_name;?>');
	$("#second").text('<?php echo $event_name;?>');
	$("#third").text('<?php echo $class_name;?>');

    $( '#sSbjtAreList div.ds_pagination a' ).click(function(e){
          

         



         //$('#sSbjtAreList').empty();

        var url = $( this ).attr( 'href' );
        var $pageno=$( this ).data("value");

$.urlParam =function(name){    
var results = new  RegExp('[\?&amp;]' + name + '=([^&amp;#]*)').exec(url); 
	
return results[1] || '';
}
           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");


        $.post('./s_center/Lecture_Search_List2.ajax.php', { action: 'nc_all', 'item1':$.urlParam('item1'),'item2':$.urlParam('item2'),'item3':$.urlParam('item3'),'item4':$.urlParam('item4'),'page':$.urlParam('page')}, function ( data ) {

		
                           
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
                             defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });




      	   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		  // $('#dbloading').css('display','none');
		  // console.log('로딩완료');

		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 300);


        } );

         jQuery('html,body').animate({
            scrollTop : $('#sSbjtAreList').offset().top - $('#header').height()-10
         }, 800);


        return false;

    } );


});

// ================================================================================================
// 링크
// ================================================================================================
function goLink(sales_code,event_name,g_code,s_code,b_code,center_id,page,ntitle, cx_id, month_qty,unit_price){
  
  var frm = document.getElementById('program_form');


frm.sales_code.value=sales_code;
frm.event_name.value=event_name;
frm.g_code.value=g_code;
frm.s_code.value=s_code;
frm.b_code.value=b_code;
frm.center_id.value=center_id;
frm.page.value=page;
frm.ntitle.value=ntitle;
frm.cx_id.value=cx_id;
frm.month_qty.value=month_qty;
frm.unit_price.value=unit_price;
frm.n_type.value="program";
frm.action="<?php echo NC_CENTER_URL;?>/pro_view2.php"


frm.submit();

}

</script>

<script type="text/javascript">

	$(document).ready(function () {


proGrss(); 	 
function proGrss(){
	
	$('.progress-bar').each(function() {

        var $this = $(this);
         var percentage = parseInt($this.data("value"));
		   
        //$(this).animate({'width':'0%'}, 800);

        $this.waypoint(function() {
          
		  
		    if(percentage < 1){
              $this.animate({'width':''+percentage+'%'}, 800);
		   }else if(percentage < 10){
		     $this.animate({'width':'5%'}, 800);
            }else if(percentage < 100){
              $this.animate({'width':''+percentage+'%'}, 800);
            }else if(percentage >=100){
              //$(this).css({'width':'100%'}, 800);
			  $this.animate({'width':''+percentage+'%'}, 800);
			  $this.css({'color':'black', 'background-image':'none'}, 800);
            }else{
              $this.css({'color':'black', 'background':'none'}, 800);
            }    
		   
		   
		   
        }, {
            offset: "110%"
        });

    });

}	




 		  
		  
});
	
	
	
	
</script>