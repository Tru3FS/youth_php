<?php
include_once("./_common.php");
/*
$center_id = $_POST["item1"];
$ip=get_real_client_ip();
$member_id       = get_session('m_id');
$s_code=$_POST["item2"];
$g_code=$_POST["item3"];
$b_code=$_POST["item4"];
$page=$_POST["page"];
*/

$center_id = isset($_POST['item1']) ? clean_xss_tags($_POST['item1'], 1, 1) : '';
$ip=get_real_client_ip();
$member_id       = get_session('m_id');
$s_code= isset($_POST['item2']) ? clean_xss_tags($_POST['item2'], 1, 1) : '';
$g_code= isset($_POST['item3']) ? clean_xss_tags($_POST['item3'], 1, 1) : '';
$b_code= isset($_POST['item4']) ? clean_xss_tags($_POST['item4'], 1, 1) : '';
$page= isset($_POST['page']) ? clean_xss_tags($_POST['page'], 1, 1) : '';





//$json_string =  CF_Search_Sales_Code ($center_id, $sales_place_code, $place_code, $event_code, $class_code, $Tmonth, $member_id, $url, $ip);

//$json_array = json_decode($json_string, true); 

?>

<?php
$search = (isset($_REQUEST["search"]) && $_REQUEST["search"]) ? $_REQUEST["search"] : NULL;

If ($g_code ==""){

$g_code='';


}

If ($center_id=="01" && $s_code ==""){

$s_code='001';

}
If ($center_id=="02" && $s_code ==""){

$s_code='012';

}
//$today2 = date("Ym");


if(is_mobile()=='1'){



$rows = '15';
}else{

if($s_code=='002'){

$rows = '40';
}else{
$rows = '40';

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



//$today3 = date("Ymd");

//$startdate= $row_1['Tmonth'].'01';
//$enddate= date("Ymt", strtotime($today3));

$startdate = date("Ymd", mktime(0, 0, 0, date("m") , 1, date("Y")));  
  
// 매월의 마지막 날짜를 계산  
$enddate = date("Ymd", mktime(0, 0, 0, date("m")+1 , 0, date("Y"))); 

//echo $startdate;
//echo $enddate;

if($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함



$qstr1 = "item1=$center_id&item2=$s_code&item3=$g_code&item4=$b_code&search=$search";


	$sqlb = "";
	$sqlb = $sqlb."SELECT count(a.Sales_Code) as scnt, a.Center_ID,a.Place_Code, a.Sales_Code,a.Sales_Place_Code,a.Event_Code,a.Class_Code, a.First_Start_Day_Yn, a.Kiosk_Display_Text as Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, d.Class_Name, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
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
	$sqlb = $sqlb."             AND State           = '001') as Current_Person, ";
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
		


	//$sqlb = $sqlb."   AND a.First_Start_Day_Yn = 'Y' ";
	$sqlb = $sqlb."   AND a.State              = '001' ";
	$sqlb = $sqlb."   AND CASE WHEN a.Sales_Place_Code = '01' THEN 1 = 1 ";
	$sqlb = $sqlb."       ELSE SUBSTRING(CONCAT(Month_Start_Yn_01, Month_Start_Yn_02, Month_Start_Yn_03, Month_Start_Yn_04, Month_Start_Yn_05, Month_Start_Yn_06, Month_Start_Yn_07, Month_Start_Yn_08, Month_Start_Yn_09, Month_Start_Yn_10, Month_Start_Yn_11, Month_Start_Yn_12), CAST(SUBSTRING('$today2', 5, 2) as int), 1) = 'Y' END ";
	$sqlb = $sqlb."   AND b.Apply_Date    = (SELECT MAX(Apply_Date) FROM TB_SaleItem_Price where Center_ID = a.Center_ID AND Apply_Date <= CONCAT('$today2', '01')) ";
	$sqlb = $sqlb." Group BY a.Kiosk_Display_Text  limit $from_record, $rows";





	$sqlc = "";
	$sqlc = $sqlc."SELECT  a.Center_ID,a.Place_Code, count(a.Sales_Code) as scnt, a.Sales_Code,a.Sales_Place_Code,a.Event_Code,a.Class_Code, a.First_Start_Day_Yn, a.Kiosk_Display_Text as Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, d.Class_Name, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
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
	$sqlc = $sqlc."             AND State           = '001') as Current_Person, ";
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

 
	//$sqlc = $sqlc."   AND a.First_Start_Day_Yn = 'Y' ";
	$sqlc = $sqlc."   AND a.State              = '001' ";
	$sqlc = $sqlc."   AND CASE WHEN a.Sales_Place_Code = '01' THEN 1 = 1 ";
	$sqlc = $sqlc."       ELSE SUBSTRING(CONCAT(Month_Start_Yn_01, Month_Start_Yn_02, Month_Start_Yn_03, Month_Start_Yn_04, Month_Start_Yn_05, Month_Start_Yn_06, Month_Start_Yn_07, Month_Start_Yn_08, Month_Start_Yn_09, Month_Start_Yn_10, Month_Start_Yn_11, Month_Start_Yn_12), CAST(SUBSTRING('$today2', 5, 2) as int), 1) = 'Y' END ";
	$sqlc = $sqlc."   AND b.Apply_Date    = (SELECT MAX(Apply_Date) FROM TB_SaleItem_Price where Center_ID = a.Center_ID AND Apply_Date <= CONCAT('$today2', '01'))  ";
	$sqlc = $sqlc." Group BY a.Kiosk_Display_Text ";



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




<input type="hidden" name="page" id="page" value="<?php echo $page;?>">
<div class="board_head ">
	<div class="count_area">
		<p>강좌 <em id="" class="tot"><?php echo $sales_count;?></em>개</p>
	</div>
	<div class="order_area type3">
		<div class="btn_wrap pad_b0">
			<p class="note">※ 좌우로 밀어보세요.</p>
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


  $first_start_day_yn=$row['First_Start_Day_Yn'];

$scnt=$row['scnt'];


if($first_start_day_yn=='Y'){


$jeopsu="";


if($scnt=='1'){
$class="cc";
}else if($scnt=='2'){
$class="tt";
}else if($scnt=='3'){
$class="pp";
}else if($scnt=='4'){
$class="ee";

}else if($scnt=='5'){
$class="ff";

}else if($scnt=='6'){
$class="ss";

}
}else{

$jeopsu="[수시]";

if($scnt=='1'){
$class="jone";
}else if($scnt=='2'){
$class="jtwo";
}else if($scnt=='3'){
$class="jthree";
}else if($scnt=='4'){
$class="jfour";

}else if($scnt=='5'){
$class="jfive";

}else if($scnt=='6'){
$class="jsix";

}

}


if($i % 2 == 1){ 

$sbg="#fff";
$sclass="gry";
}else{

$sbg="#f7f9fa";
$sclass="gry";
}




?>													
					
<tr class="<?php echo $row['Sales_Code'];?> <?php echo $class;?>" style="background-color:<?php echo $sbg;?>;">
        <td class="">
        <div class="wrap"><a href="#!" class="link"><span class="team"><?php echo $center_txt;?></span><span class="player"><?php echo $jeopsu;?><?php echo $sales_item_name;?></span></a></div>
        </td>

</tr>


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
			 <col width="8%">
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

  $place_code=$row2['Place_Code'];
  $event_code=$row2['Event_Code'];
  $class_code=$row2['Class_Code'];
//echo $place_code;
//echo $event_code;
//echo $class_code;



$scnt=$row2['scnt'];
$sname=$row2['Sales_Item_Name'];
$salescode=$row2['Sales_Code'];

$scntc=$scnt-1;

$sqls="SELECT a.Sales_Item_Name, a.Start_Time, a.End_Time, b.Program_Sub_Name,b.Month_Qty, b.Unit_Price,
   f_week_name(a.Use_Week) as Week_Name, a.Start_Time, a.End_Time,
       b.Program_Sub_Name, b.Unit_Price,
       a.Capacity, a.Capacity_On_OffLine, a.Capacity_OnLine, a.Capacity_OffLine, b.Sales_Code
          FROM TB_SaleItem       a INNER JOIN
         TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code
         WHERE a.Center_ID          = '01'
         AND a.Event_Code         = '$event_code'
         AND a.Class_Code      = '$class_code'
		  AND a.Place_Code      = '$place_code'
		  AND a.Sales_Place_Code      = '$center_id'
	     AND a.Online_Yn          = 'Y'
		 AND b.Online_Yn          = 'Y'
		 AND a.State              = '001'
		 AND b.Apply_Date    = (SELECT MAX(Apply_Date) FROM TB_SaleItem_Price where Center_ID = a.Center_ID AND Apply_Date <= CONCAT('$today2', '01')) 
         AND a.Sales_Code ='$salescode' limit 1, $scntc ";
$results = sql_query($sqls);



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

$first_start_day_yn=$val['First_Start_Day_Yn'];
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

if($first_start_day_yn=='Y'){


	if($toymd  >= $Web_New_Start && $toymd <= $Web_New_End){
		if($toyhm >= $Web_New_STime && $toyhm <= $Web_New_ETime){
			if ($percent_inwon<"100"){	
			$s_txt="<span class='rbb'><span class='cc'>신청</span></span>";	
			$s_txt2="<span class='rbn'>접수가능</span>";	
			$s_people="<span>".$row2['Current_Person']."/".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'Y';
			}else{

			$s_txt="<span class='rbx'>마감</span>";
			$s_txt2="<span class='rbd'>접수불가</span>";	
			$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'Y';
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
			$s_people="<span>".$row2['Current_Person']."/".$row2['Capacity_On_OffLine'].	"</span>";		
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

}else{


			if ($percent_inwon<"100"){	
			$s_txt="<span class='rbb'><span class='cc'>신청</span></span>";	
			$s_txt2="<span class='rbn'>수시접수</span>";	
			$s_people="<span>".$row2['Current_Person']."/".$row2['Capacity_On_OffLine'].	"</span>";	
				$s_tag = 'T';
			}else{

			$s_txt="<span class='rbx'>마감</span>";
			$s_txt2="<span class='rbd'>수시접수</span>";	
			
			if($row2['Capacity_On_OffLine']=='0'){
			$s_people="<span>-</span>";	
			}else{
            $s_people="<span>".$row2['Capacity_On_OffLine']."</span>";	 
			}
				$s_tag = 'T';
			}
	

}


}


if($first_start_day_yn=='Y'){


if($scnt=='1'){
$class="cc";
}else if($scnt=='2'){
$class="tt";
}else if($scnt=='3'){
$class="pp";
}else if($scnt=='4'){
$class="ee";

}else if($scnt=='5'){
$class="ff";

}else if($scnt=='6'){
$class="ss";

}
}else{

if($scnt=='1'){
$class="jone";
}else if($scnt=='2'){
$class="jtwo";
}else if($scnt=='3'){
$class="jthree";
}else if($scnt=='4'){
$class="jfour";

}else if($scnt=='5'){
$class="jfive";

}else if($scnt=='6'){
$class="jsix";

}

}



if($i % 2 == 1){ 

$sbg="#fff";
$sclass="gry";
}else{

$sbg="#f7f9fa";
$sclass="gry";
}


?>	

 <tr class="<?php echo $row2['Sales_Code'];?> <?php echo $class;?>">
        <td rowspan="<?php echo $scnt;?>" style="background-color:<?php echo $sbg;?>;" class="<?php echo $sclass;?>"><?php echo $place_name;?></td>
		<td rowspan="<?php echo $scnt;?>" style="background-color:<?php echo $sbg;?>;" class="<?php echo $sclass;?>"><?php echo $row2['Event_Name'];?></td>
        <td rowspan="<?php echo $scnt;?>" style="background-color:<?php echo $sbg;?>;" class="<?php echo $sclass;?>"><span><?php echo $lesson_user_name;?></span></td>
        
        <td rowspan="<?php echo $scnt;?>" style="background-color:<?php echo $sbg;?>;" class="<?php echo $sclass;?>"><span>전체</span></td>
        
        <td rowspan="<?php echo $scnt;?>" style="background-color:<?php echo $sbg;?>;" class="<?php echo $sclass;?>"><span class="sm"><?php echo $row2['Week_Name'];?><br><span class="cc"><?php echo $start_time1;?>:<?php echo $start_time2;?>~<?php echo $end_time1;?>:<?php echo $end_time2;?></span></span></td>
        
        <td  class="cc <?php echo $sclass;?>"  style="background-color:<?php echo $sbg;?>;"><span><?php echo $row2['Month_Qty'];?></span></td>
        
        <td class="align_R cc <?php echo $sclass;?>" style="background-color:<?php echo $sbg;?>;"><span class='price'><?php echo number_format($row2['Unit_Price']);?></span></td>
        
        <td class="cc <?php echo $sclass;?>"  rowspan="<?php echo $scnt;?>" style="background-color:<?php echo $sbg;?>;"><?php echo $s_people;?></td>
        
        <td class="cc <?php echo $sclass;?>"  style="background-color:<?php echo $sbg;?>;"><a href="#!"><?php echo $s_txt2;?></a><!--<br><?php echo $total_people;?>/<?php echo $cur_people;?>--></td>

        <td class="cc <?php echo $sclass;?>"  style="background-color:<?php echo $sbg;?>;">
   
		<a href="#!" onclick="goLink('<?php echo $row2['Sales_Code'];?>','<?php echo urlencode($row2['Event_Name']);?>','<?php echo $row2['Event_Code'];?>','<?php echo $row2['Place_Code'];?>','<?php echo $row2['Class_Code'];?>','<?php echo $center_id;?>','<?php echo $page;?>','<?php echo urlencode($row2['Sales_Item_Name']);?>','<?php echo $row2['Center_ID'];?>','<?php echo $row2['Month_Qty'];?>','<?php echo $row2['Unit_Price'];?>')"><?php echo $s_txt;?></a>
      
    </td>
	</tr>

<?php
if($scntc > '0'){
?>

<?php

 for($m=1; $row3=sql_fetch_array($results); $m++) {
 
 ?>
 <tr class="">
             
        <td  class="cc <?php echo $sclass;?>"  style="background-color:<?php echo $sbg;?>;border-left: 1px solid #fff;"><span><?php echo $row3['Month_Qty'];?></span></td>
        
        <td class="align_R cc <?php echo $sclass;?>" style="background-color:<?php echo $sbg;?>;"><span class='price'><?php echo number_format($row3['Unit_Price']);?></span></td>
        
       
        
        <td class="cc <?php echo $sclass;?>" style="background-color:<?php echo $sbg;?>;"><a href="#!"><?php echo $s_txt2;?></a><!--<br><?php echo $total_people;?>/<?php echo $cur_people;?>--></td>

        <td class="cc <?php echo $sclass;?>"  style="background-color:<?php echo $sbg;?>;">
   <a href="#!" onclick="goLink('<?php echo $row2['Sales_Code'];?>','<?php echo urlencode($row2['Event_Name']);?>','<?php echo $row2['Event_Code'];?>','<?php echo $row2['Place_Code'];?>','<?php echo $row2['Class_Code'];?>','<?php echo $center_id;?>','<?php echo $page;?>','<?php echo urlencode($row2['Sales_Item_Name']);?>','<?php echo $row2['Center_ID'];?>','<?php echo $row3['Month_Qty'];?>','<?php echo $row3['Unit_Price'];?>')"><?php echo $s_txt;?></a>
		      
    </td>
	</tr>
<?php }?>
<?php }?>
<?php
if($s_tag == 'Y'){
?>

<tr class="<?php echo $row2['Sales_Code'];?> cc xx">
			
            <td class="" style="background-color:<?php echo $sbg;?>;">접수현황</td>
            <td class="" colspan="9" style="background-color:#fff;border-left: 1px solid #fff;">	 <span class=""><div class='progress-bar-holder'>
														<!-- date-value가 10% 이하, 즉 1% ~ 10% 사이면 data-value="10%" 로 맞춰주세요. 라운딩된 프로그래스바라 모양이 안나오니...-->
																				
														<div class='progress-bar <?php if($percent_inwon_t==100){ ?>end<?php }?>' data-value="<?php echo $percent_inwon;?>%">
															<span class='t_left' style='color:<?php if($percent_inwon_t<10){ ?>#000<?php } else { ?>#fff<?php }?>;'>(<?php if($etc_people<0){ ?><?php echo $total_people;?><?php } else { ?><?php echo $cur_people;?><?php }?>/<?php echo $total_people;?>)</span><span class='t_right' style='color:<?php if($percent_inwon_t==100){ ?>#fff<?php } else { ?>#000<?php }?>;'><?php if($percent_inwon_t>100){ ?><?php echo $percent_inwon_t;?>%<?php } else { ?><?php echo $percent_inwon_t;?>%<?php }?></span>
														</div>
													</div></span></td>
          </tr>
<?php }else if($s_tag == 'N'){ ?>
<tr class="<?php echo $row2['Sales_Code'];?> cc xx">
<td class="" style="background-color:<?php echo $sbg;?>;">접수현황</td>
            <td class="" colspan="9" style="background-color:#fff;border-left: 1px solid #fff;">	 <span class=""><div class='progress-bar-holder'>
														<!-- date-value가 10% 이하, 즉 1% ~ 10% 사이면 data-value="10%" 로 맞춰주세요. 라운딩된 프로그래스바라 모양이 안나오니...-->
																									
														<div class='progress-bar' data-value="0%">
															<span class='t_left' style='color:#fff'></span>
														</div>
													</div></span></td>
          </tr>
<?php }else{ ?>


<?php }?>
<?php }?>

</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



								<p class="note">※ 좌우로 밀어보세요.</p>
								
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

	//$("#first").text('<?php echo $place_name;?>');
	//$("#second").text('<?php echo $event_name;?>');
	//$("#third").text('<?php echo $class_name;?>');

    $( '#sSbjtAreList div.ds_pagination a' ).click(function(e){
          

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


        $.post('./s_center/Lecture_Search_List3.ajax.php', { action: 'nc_all', 'item1':$.urlParam('item1'),'item2':$.urlParam('item2'),'item3':$.urlParam('item3'),'item4':$.urlParam('item4'),'page':$.urlParam('page')}, function ( data ) {

		
                           
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
frm.action="<?php echo NC_CENTER_URL;?>/pro_view.php"


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