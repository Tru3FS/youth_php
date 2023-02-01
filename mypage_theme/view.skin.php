<?php
if(!defined('_SAMSUNG_')) exit;

// 모바일접속인가?
if(NC_IS_MOBILE) {
	$NC_CARD_URL=NC_URL."/mobile/_1_start.php";
	$NC_CARD_BURL=NC_URL."/mo";
}else{
	$NC_CARD_URL=NC_URL."/pc/_1_start.php";
	$NC_CARD_BURL=NC_URL."/pc";
}	

echo '<link rel="stylesheet" href="'.run_replace('head_css_url', '/s_css/mypage.css?ver='.NC_CSS_VER).'">'.PHP_EOL;


$status= (isset($_REQUEST["status"]) && $_REQUEST["status"]) ? $_REQUEST["status"] : NULL;
$page= (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : NULL;


if($status=="" ||  $status=="001") { 
$status_text="강좌신청현황";
$status="001";
 }else if($status=="002"){
$status_text="강좌이력현황(재수강)";
$status="002";
}else if($status=="003"){
$status_text="환불신청현황";
$status="003";
}




?>

<style>

@media (min-width: 1024px){
.nc_frm__action3 {
    width: 100%;
    height: 100%;
    background: #27b4c5;
    color: #fff;
    border: 0;
    font-size: 1.5rem;
    letter-spacing: -0.025em;
    font-weight: 500;
    cursor: pointer;
}

.my_lecture_cont {
    font-size: 1.4rem;
    line-height: 1.8;
    max-height: initial;
    font-weight: 500;
    color: #222;
    margin-top: 5px;
}
.my_lecture_cont span {
    display: block;
    margin-top: 3px;
    margin-right: 8px;
    font-size: 15px;
}
.my_lecture_cont span.bt {
    font-weight: 500;
    color: #222;
    border-color: #d8e2e5;
    background: #f7f9fa;
    /* min-height: auto; */
    min-width: auto;
    border-radius: 3px;
    font-size: 13px;
    padding: 2px 4px;
    border: 1px solid #d8e2e5;
}
.nc_frm__action, .nc_frm__action2, .nc_frm__action3{
    max-width: 15rem;
	border-radius:3px;
    transition: border 0.3s, color 0.3s, background 0.3s;
    -webkit-transition: border 0.3s, color 0.3s, background 0.3s;
	    max-width: 12rem;
    border-radius: 3px;
    height: auto;
    padding: 15px 5px;
}
.nc_frm__control button:first-child{
margin-right:5px;
}
.nc_frm__control button:nth-child(2){
margin-right:5px;
}
.nc_frm__control button:last-child{
margin-right:0px;
}

}
.nc_frm__control {
    text-align: center;
     height: auto; 
    margin-top:2rem;
}
@media (max-width: 1024px){
.nc_frm__control {
    width: 100%;
    height: 5.2rem;
    /* position: absolute; */
    bottom: 0;
    left: 0;
    z-index: 10;
    margin-top: 2.3rem;
    margin: 2rem auto;
    text-align: center;
}
.nc_frm__control button:first-child{
margin-right:5px;
}
.nc_frm__control button:nth-child(2){
margin-right:5px;
}
.nc_frm__control button:last-child{
margin-right:0px;
}

.nc_frm__action3 {
background: #27b4c5;
    color: #fff;
    border: 0;

    letter-spacing: -0.025em;
    font-weight: 500;
}
.nc_frm__action, .nc_frm__action2, .nc_frm__action3 {

    font-size: 1.2rem;
}
.my_lecture_cont span.one, .my_lecture_cont span.two {
    display: block;
}
.nc_frm__action,.nc_frm__action2,.nc_frm__action3   {
    width: 16%;
    height: 100%;
    cursor: pointer;    border-radius: 3px;  height: auto;
    padding: 15px 5px;
}
 .agreement-form button:not(:disabled) {
    cursor: pointer;
}
}


@media (max-width: 768px){
.nc_frm__control {
    width: 100%;
    height: 5.2rem;
    /* position: absolute; */
    bottom: 0;
    left: 0;
    z-index: 10;
    margin-top: 2.3rem;
    margin: 2rem auto;
    text-align: center;
}
.nc_frm__control button:first-child{
margin-right:5px;
}
.nc_frm__control button:nth-child(2){
margin-right:5px;
}
.nc_frm__control button:last-child{
margin-right:0px;
}

.nc_frm__action3 {
background: #27b4c5;
    color: #fff;
    border: 0;

    letter-spacing: -0.025em;
    font-weight: 500;
}
.nc_frm__action, .nc_frm__action2, .nc_frm__action3 {

    font-size: 1.2rem;
}
.my_lecture_cont span.one, .my_lecture_cont span.two {
    display: block;
}
.nc_frm__action,.nc_frm__action2,.nc_frm__action3   {
    width: 25%;
    height: 100%;
    cursor: pointer;    border-radius: 3px;  height: auto;
    padding: 15px 5px;
}
 .agreement-form button:not(:disabled) {
    cursor: pointer;
}
}

</style>


<main id="main" class="main_container">


<div id="my_top_menu">
						<h3 class="m_element">서브메뉴</h3>
						<ol>
							<li class="home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" title="홈 바로가기">홈</a></li>
							<li class="s_nav s_nav1">
								<a href="javascript:;">내 강좌</a>
								<dl>
									<dt class="m_element">1뎁스 메뉴</dt>
									<dd>
										<ul>
																					<li><a href="./index.php?center_id=<?php echo $_SESSION['center_id'];?>">마이페이지</a></li>
																					<li><a href="./lindex.php?center_id=<?php echo $_SESSION['center_id'];?>">내강좌</a></li>
																					<li><a href="./m_edit_step_01.php?center_id=<?php echo $_SESSION['center_id'];?>">회원정보수정</a></li>
																					<li><a href="../s_member/logout.php?center_id=<?php echo $_SESSION['center_id'];?>">로그아웃</a></li>
																					</ul>
									</dd>
								</dl>
							</li>
							<li class="s_nav s_nav2">
								<a href="javascript:;"><?php echo $status_text;?></a>
								<dl>
									<dt class="m_element">2뎁스 메뉴</dt>
									<dd>
										<ul>
																					<li><a href="./lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>">강좌신청현황</a></li>
																					<li><a href="./lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>">강좌이력현황(재수강)</a></li>
																					<li><a href="./lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>">환불신청현황</a></li>
											</ul>
									</dd>
								</dl>
							</li>
		  			</ol>
					</div>





<div id="top_bg_join" style="display:none;">
<div class="_wrap">
<div class="top_title">
            <h2></h2>
</div>
</div>
</div>
<div class="top_area" style="display:none;">
<div class="wrap">
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li></ul>
</div>
</div>

<div class="wrap">

<div id="sidebar">
				<div class="stit">
						<p>MYPAGE</p>
						<h2>마이페이지</h2>
					</div>
<?php
include_once(NC_MYPAGE_PATH.'/my_side_menu.php');
?>


		
				
	
		
				
			</div>



<div id="contents">
<div id="cont_head">
		<h2>내 강좌</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>내강좌</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span><?php echo $status_text;?></span></li></ul>

		</div>				
	</div>
	
<div class="article mypage">

            <div class="article_body">
                <div class="wrap">

                  
					<div class="nc_frm-header">
                        <h3 class="nc_frm-header__title">
                           <span class="nc_frm-header__title-point"><?php echo get_session("m_name");?></span> 님<br>
							<span class="nc_frm-header__title-point"><?php echo $status_text;?></span>
                        </h3>
                      <div class="member_points">
        <div class="member_point_item_wrap">
            <div class="member_point_item coupon">
                <span class="hs_icon icon_ticket"></span>
                <div class="member_point_data dagi">
                    <p class="member_point_type">대기</p>
                    <a class="member_point_status" href="javascript:void(0);"><span lang="en" class="dagi num">0</span> <span class="tt"> 건</span></a>
                </div>
            </div><!-- .member_point_item -->
            <div class="member_point_item mileage">
                <span class="hs_icon icon_mileage"></span>
                <div class="member_point_data wan">
                    <p class="member_point_type">완료</p>
                    <a class="member_point_status" href="javascript:void(0);"><span lang="en" class="end num">0</span><span class="tt"> 건</span></a>

                </div>
            </div><!-- .member_point_item -->
			  <div class="member_point_item mileage">
                <span class="hs_icon icon_cancel"></span>
                <div class="member_point_data cancel">
                    <p class="member_point_type">취소</p>
                    <a class="member_point_status" href="javascript:void(0);"><span lang="en"  class="cancel num">0</span><span class="tt"> 건</span></a>

                </div>
            </div><!-- .member_point_item -->
        </div><!-- .member_point_item_wrap -->
    </div>
                    </div>

<?php 

$http_host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$url = "https://".$http_host . $request_uri;



if($s_status=='001'){    //수강신청현황


$m_code=get_session('m_code');


$sqlcnt = "SELECT count(*) as cnt FROM TB_Basket_Program  
             
 WHERE Sales_Division IN ('003') 
	   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'
AND State ='001' 
AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END 
ORDER BY IDX DESC ";

  $rowc = sql_fetch($sqlcnt);
 $total_countd= $rowc['cnt'];


 $sqlcnt2 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
   AND State    IN ('002', '005')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row2 = sql_fetch($sqlcnt2);
 $total_counte= $row2['cnt'];


 $sqlcnt3 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
   AND State     IN ('003', '009')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row3 = sql_fetch($sqlcnt3);
 $total_countc= $row3['cnt'];


$dir = "../s_img/";
if(is_dir($dir)){
if($dh = opendir($dir)){
while(($file=readdir($dh))!==false){
	
	$exploded_file = explode(".", $file);
	$file_extension = array_pop($exploded_file);
	$file_name = implode($exploded_file);
	
if($event_name!=''){

	if($event_name==$file_name){
		 $imgname=urlencode($file_name);
	}
	}
}
if($imgname==''){
	if($sales_place_code=='02'){
        $imgname=urlencode("visual_2");
        }else{
        $imgname=urlencode("visual_1");
	}	
}	
closedir($dh);
}
}

?>

<?php
$sql = "";
$sql = "SELECT Next_Month_Day, DATE_FORMAT(SYSDATE(), '%d') as Current_Day FROM TB_SystemSetting WHERE Center_ID = '$s_cid' ";

$row_0 = sql_fetch($sql);
$Next_Month_Day = $row_0['Next_Month_Day'];
$Current_Day = $row_0['Current_Day'];

if($Next_Month_Day <= $Current_Day){
	$sql2="SELECT CONCAT(a.Sales_Item_Name, ' - ', b.Program_Sub_Name) as Sales_Item_Name,
		   c.Detail_Name as Lesson_Target, 
		   CONCAT(DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 1 MONTH), '%Y%m'), '01') as Start_Date,
		   DATE_FORMAT(DATE_ADD(DATE_ADD(CONCAT(DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 1 MONTH), '%Y%m'), '01'), INTERVAL CAST(b.Month_Qty as int) MONTH), INTERVAL -1 DAY), '%Y%m%d') as End_Date,
		   f_week_name(a.Use_Week) as Week_Name, a.Start_Time, a.End_Time, d.Detail_Name as Lesson_Place, b.Unit_Price, b.Month_Qty
	  FROM TB_SaleItem       a INNER JOIN
		   TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN
		   TB_Code_D         c ON IFNULL(a.Lesson_Target, '00') = c.Detail_Code AND c.Common_Code = 'H33' LEFT OUTER JOIN
		   TB_Code_D         d ON IFNULL(a.Lesson_Place, '000') = d.Detail_Code AND d.Common_Code = 'V30'
	   WHERE a.Center_ID  = '$s_cid'
	   AND a.Sales_Code = '$s_salescode'";
}
else{
		$sql2="SELECT CONCAT(a.Sales_Item_Name, ' - ', b.Program_Sub_Name) as Sales_Item_Name,
		   c.Detail_Name as Lesson_Target, 
		   CONCAT(DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 0 MONTH), '%Y%m'), '01') as Start_Date,
		   DATE_FORMAT(DATE_ADD(DATE_ADD(CONCAT(DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 0 MONTH), '%Y%m'), '01'), INTERVAL CAST(b.Month_Qty as int) MONTH), INTERVAL -1 DAY), '%Y%m%d') as End_Date,
		   f_week_name(a.Use_Week) as Week_Name, a.Start_Time, a.End_Time, d.Detail_Name as Lesson_Place, b.Unit_Price, b.Month_Qty
	  FROM TB_SaleItem       a INNER JOIN
		   TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN
		   TB_Code_D         c ON IFNULL(a.Lesson_Target, '00') = c.Detail_Code AND c.Common_Code = 'H33' LEFT OUTER JOIN
		   TB_Code_D         d ON IFNULL(a.Lesson_Place, '000') = d.Detail_Code AND d.Common_Code = 'V30'
	   WHERE a.Center_ID  = '$s_cid'
	   AND a.Sales_Code = '$s_salescode'";
}
   
$result= sql_fetch($sql2);

$sales_item_name=$result['Sales_Item_Name'];
//$sales_code=$result['Sales_Code'];
$amount=$result['Unit_Price'];
$month_qty=$result['Month_Qty'];


$start_date=$result['Start_Date'];
$end_date=$result['End_Date'];
$week_name=$result['Week_Name'];

   $start_date_y = substr($result['Start_Date'], 0,4);
   $start_date_m = substr($result['Start_Date'], 4,2);
   $start_date_d = substr($result['Start_Date'], 6,2);
   $startdate=$start_date_y."-".$start_date_m."-".$start_date_d."";
   
   
   $lstartdate=$start_date_y."".$start_date_m;
   
   $end_date_y = substr($result['End_Date'], 0,4);
   $end_date_m = substr($result['End_Date'], 4,2);
   $end_date_d = substr($result['End_Date'], 6,2);
   $enddate=$end_date_y."-".$end_date_m."-".$end_date_d."";

   $week_name= $result['Week_Name'];
   $start_time= $result['Start_Time'];
   $end_time= $result['End_Time'];    
   
   		$starttime = substr($result['Start_Time'], 0,2);
		$starttime_m = substr($result['Start_Time'], 2,2);
        $endtime = substr($result['End_Time'], 0,2);
		$endtime_m = substr($result['End_Time'], 2,2);



$sqlc="SELECT Capacity_On_OffLine,
       (SELECT COUNT(*) 
          FROM TB_Transaction
         WHERE Center_ID        = a.Center_ID
           AND Sales_Division   = '003'
           AND Sales_Code       = a.Sales_Code
           AND End_Date         >= DATE_FORMAT(SYSDATE(), '%y%m%d')
           AND '$lstartdate' BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6)
           AND Transition_State = '001'
           AND Trs_Type         = '001'
           AND State            = '001')  + 
		(SELECT COUNT(*)
		   FROM TB_Basket_Program
		  WHERE Center_ID = a.Center_ID
			  AND Sales_Division = '003'
			  AND Sales_Code = a.Sales_Code
			  AND '$lstartdate' BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6)
			  AND State = '001') as Current_Person
  FROM TB_SaleItem       a INNER JOIN
       TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN
       TB_Code_D         c ON IFNULL(a.Lesson_Target, '00') = c.Detail_Code AND c.Common_Code = 'H33' LEFT OUTER JOIN
       TB_Code_D         d ON IFNULL(a.Lesson_Place, '000') = d.Detail_Code AND d.Common_Code = 'V30'
   WHERE a.Center_ID  = '$s_cid'
   AND a.Sales_Code = '$s_salescode'";
   

  

$result2 = sql_fetch($sqlc);

$total_people=$result2['Capacity_On_OffLine'];
$cur_people=$result2['Current_Person'];

$etc_people=$total_people-$cur_people;

   $cstatus="o";

/*
$Approval_No=$row['Approval_No'];
$Tran_Date=$row['Tran_Date'];


$Tran_Date_y = substr($Tran_Date, 0,2);
   $Tran_Date_m = substr($Tran_Date, 2,2);
   $Tran_Date_d = substr($Tran_Date, 4,2);

$Tran_Date_D=$Tran_Date_y."-".$Tran_Date_m."-".$Tran_Date_d;


$Approval_Amount=$row['Approval_Amount'];
$Trs_No=$row['Trs_No'];

*/

$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함하지 않는 일

$reday=$thisyear."".$thismonth."".$today;


$sql2 = "SELECT b.IDX, b.Member_Code, b.State,
       CASE WHEN b.State = '001' THEN '결제대기'
            WHEN b.State = '002' THEN '결제완료'
            WHEN b.State = '003' THEN '신청취소'
            WHEN b.State = '004' THEN '시간경과취소'
            WHEN b.State = '005' THEN '환불신청'
            WHEN b.State = '006' THEN '환불완료' 
			WHEN b.State = '009' THEN '당일결제취소' END State_Name,b.Center_ID, b.Sales_Item_Name,b.Week_Name, b.Sales_Code,  b.Receive_Amount, b.Sales_Date, b.Approval_No, b.Trs_No, b.RefNo, b.Tran_Date, b.Approval_Amount, b.Ins_Date, b.Start_Date, b.End_Date, a.Start_Time, a.End_Time, a.First_Start_Day_Yn
 FROM TB_SaleItem  a INNER JOIN 
           TB_Basket_Program  b on a.Center_ID=b.Center_ID AND a.Sales_Code=b.Sales_Code 
 WHERE b.Sales_Division IN ('003', '055')
  AND b.Member_Code     = '$m_code'
  AND b.IDX     = '$s_idx'";
   
       $row =sql_fetch($sql2);


$state3=$row['State'];


		 $state_name=$row['State_Name'];
		  $s_date=$row['Start_Date'];
		  $s_date1 = substr($s_date,2,2);
		  $s_date2 = substr($s_date,4,2);
		  $s_date3 = substr($s_date,6,2);


          $e_date=$row['End_Date'];
		  $e_date1 = substr($e_date,2,2);
		  $e_date2 = substr($e_date,4,2);
		  $e_date3 = substr($e_date,6,2);


        $sales_item_name=$row['Sales_Item_Name'];
		$sales_date=$row['Sales_Date'];
		  $a_date1 = substr($sales_date,2,2);
		  $a_date2 = substr($sales_date,4,2);
		  $a_date3 = substr($sales_date,6,2);

          $s_time=$row['Start_Time'];
		  $s_time1 = substr($s_time,0,2);
		  $s_time2 = substr($s_time,2,2);

          $e_time=$row['End_Time'];
		  $e_time1 = substr($e_time,0,2);
		  $e_time2 = substr($e_time,2,2);

		  $stime=$s_time1.":".$s_time2;
          $etime=$e_time1.":".$e_time2; 

        $week_name=$row['Week_Name'];
		$receive_amount=$row['Receive_Amount'];
		$unit_price=$row['Unit_Price'];
		$idx=$row['IDX'];
		$center_id=$row['Center_ID'];
		$s_code=$row['Sales_Code'];
		$state=$row['State'];
	

      $first_start_day_yn=$row['First_Start_Day_Yn'];

		$sales_code=substr($row['Sales_Code'], -8, 8);


   $sqlx="SELECT Sales_Place_Code
            FROM TB_Saleitem
            WHERE  Sales_Code = '$s_code' ";	 


   $s_name = sql_fetch($sqlx);

   $D_Name  = $s_name['Sales_Place_Code'];		
   
   if ($D_Name=="01"){

       $ctxt="스포츠센터";
   }else{
          
		  $ctxt="문화센터";

   }


if($state=="000") { 
$s_class="";
$status="001";
 } elseif($state=="001") {
$s_class="";
$status="001";
 } elseif($state=="002" ) {
$s_class="end";
$status="002";
 }elseif($state=="003" ) {
$s_class="cancel";
$status="001";
 }elseif($state=="004" ) {
$s_class="tcancel";
$status="001";
 }elseif($state=="005" ) {
$s_class="refund";
$status="003";
 }elseif($state=="006" ) {
$s_class="refund_end";
$status="003";
 }elseif($state=="009" ) {
$s_class="xcancel";
$status="001";
 }		

?>
<form name="frm" id="frm" method="post" class="">
<input type='hidden' id="s_count" name="s_count" value="<?php echo $sales_code;?>">
<input type='hidden' id="page" name="page" value="<?php echo $page;?>">
<input type='hidden' id="center_id" name="center_id" value="<?php echo $center_id;?>">
<input type='hidden' id="idx" name="idx" value="<?php echo $idx;?>">
<input type='hidden' id="state" name="state" value="<?php echo $state3;?>">
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<!--<div class="grayBox">
			<p class="txt">수강신청취소, 결제는 상세보기 화면에서 신청할 수 있습니다.</p>
		</div>-->
		<div class="my_lecture_list my_lecture_list_row">

<div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                                                                <div class="my_lecture_data_group ">
                                    <span class="my_lecture_status  <?php echo $s_class;?>"><?php echo $row['State_Name'];?></span>
                                                                    </div>
                                                                <div class="my_lecture_lec_area">
                                    <!--<a class="my_lecture_lec nc-open-bottom-popup" href="#!">98,000</a>-->
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <a class="my_lecture_title" href="javascript:void(0);"><?php if($first_start_day_yn=="N"){?>[수시]<?php }?><?php echo $row['Sales_Item_Name'];?></a>
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont">
																									<span class="one"><span class="bt">강습장소</span><?php echo get_session('center_name');?></span> </span>  
																									<span class="two"><span class="bt">강습시간</span><?php echo $week_name;?> <?php echo $stime;?> ~ <?php echo $etime;?></span></span>  
																									<span><span class="bt">강습기간</span><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?></span></span> 
																									<span><span class="bt">수강요금</span>₩<?php echo number_format($receive_amount);?></span></span> 
																									<span><span class="bt">접수일자</span><?php echo $a_date1;?>-<?php echo $a_date2;?>-<?php echo $a_date3;?></span></span>  </p>
           
																							   
                            </div>                            
							                 <div class="my_lecture_btns my_lecture_btns_two ">
                                             											


                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>
</div>

<?php

if ($state3=="000" || $state3=="001") {
	
?>	

<div class="nc_frm__control">
                            <button  type="button"  class="nc_frm__action" style="display:none;"  id="" onclick="goCard('<?php echo $sales_code;?>','<?php echo $sales_item_name;?>','<?php echo $center_id;?>','<?php echo $idx;?>','<?php echo $receive_amount;?>','<?php echo get_session('m_code');?>','<?php echo get_session('m_name');?>','L');">결제하기</button><button  type="button" class="nc_frm__action2" id="lecture_cancel">접수취소</button><button type="button" class="nc_frm__action3" onClick="location.href='./lindex.php?status=<?php echo $status;?>&page=<?php echo $page;?>'">목록가기</button> 
                        </div>
<?php }else if ($state3=="003" || $state3=="009" || $state3=="004" ) {?>
<div class="nc_frm__control">
                           <button class="nc_frm__action3" type="button" onClick="location.href='./lindex.php?status=<?php echo $status;?>&page=<?php echo $page;?>&center_id=<?php echo $_SESSION['center_id'];?>'">목록가기</button> 
                        </div>
<?php }?>
</form>



<script>


$(document).on("click","#lecture_cancel",function(e){
		 e.preventDefault();
		 NC.alert({
				title    : '신청한 강좌를 취소하시겠습니까?',
				message  : '수강취소시 다시 접수해주세요.',
				ok       : '예',
				cancel   : '아니오',
				is_confirm : true,
				on_confirm : function(){
		 $.ajax({
		 url:'./ajax.basket_Cancel.php',
		 type: "POST",
		 data: {idx : $("#idx").val()},
		 dataType: "json",
		 async: false,
		 cache: false,
		 success: function(res, textStatus) {
		
		if(res.ResultCode != "") {
		
		if ( res.ResultCode=='2' ) {
			
			NC.alert(""+res.error+"");
			
			return false;
			
		    }else if ( res.ResultCode=='1' ) {
			
		  		    NC.alert({
                    title    : "강좌가 정상적으로 취소되었습니다.",
					message  : '다시 신청해주세요.',
                  	is_confirm : false,
					on_confirm : function(){
                   
					location.reload();
					return false;
                    }
                    });
			
			
		}


        } 		
		
		
		 },error:function(request,status,error) {
		  
	
		             //alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
				    NC.alert({
                    message    : ""+request.responseText+"<br>강좌취소에러",
                  	is_confirm : false,
					on_confirm : function(){
                   location.reload();
					return false;
                    }
                    });
					
					
		        	}, complete : function(data) {
                   //실패했어도 완료가 되었을 때 처리
		
					
					 
			    	}	
					 
				    });	 
				   }, on_cancel : function(){
                                  
                 
     }
				   
		  });	 	
		  });		

</script>
<?php




}else if($s_status=='002'){    //수강이력현황






$m_code=get_session('m_code');

$sqlcnt = "SELECT count(*) as cnt FROM TB_Basket_Program  
             
 WHERE Sales_Division IN ('003') 
	   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'
AND State ='001' 
AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END 
ORDER BY IDX DESC ";

  $rowc = sql_fetch($sqlcnt);
 $total_countd= $rowc['cnt'];


 $sqlcnt2 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
   AND State    IN ('002', '005')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row2 = sql_fetch($sqlcnt2);
 $total_counte= $row2['cnt'];


 $sqlcnt3 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
     AND State     IN ('003', '009')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row3 = sql_fetch($sqlcnt3);
 $total_countc= $row3['cnt'];




$dir = "../s_img/";
if(is_dir($dir)){
if($dh = opendir($dir)){
while(($file=readdir($dh))!==false){
	
	$exploded_file = explode(".", $file);
	$file_extension = array_pop($exploded_file);
	$file_name = implode($exploded_file);
	
if($event_name!=''){

	if($event_name==$file_name){
		 $imgname=urlencode($file_name);
	}
	}
}
if($imgname==''){
	if($sales_place_code=='02'){
        $imgname=urlencode("visual_2");
        }else{
        $imgname=urlencode("visual_1");
	}	
}	
closedir($dh);
}
}

?>
<?php

$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함하지 않는 일

$reday=$thisyear."".$thismonth."".$today;



   
$trs_no=(isset($_REQUEST["trs_no"]) && $_REQUEST["trs_no"]) ? $_REQUEST["trs_no"] : '';
$trs_seq=(isset($_REQUEST["trs_seq"]) && $_REQUEST["trs_seq"]) ? $_REQUEST["trs_seq"] : '';


$json_string2 = CF_Member_Valid_List_View($center_id, $trs_no, $trs_seq, $url, $ip);


$json_array2 = json_decode($json_string2, true); 

if($json_array2['Result']['ResultCode'] != 0){

}else{

  foreach ($json_array2['ResultData1'] as $row => $val){
			 

				  


	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
               //echo '1';


        	}



		  $s_date=$val['Start_Date'];
		  $s_date1 = substr($s_date,2,2);
		  $s_date2 = substr($s_date,4,2);
		  $s_date3 = substr($s_date,6,2);


          $e_date=$val['End_Date'];
		  $e_date1 = substr($e_date,2,2);
		  $e_date2 = substr($e_date,4,2);
		  $e_date3 = substr($e_date,6,2);


        $sales_item_name=$val['Sales_Item_Name'];
		$sales_date=$val['Sales_Date'];
		  $a_date1 = substr($sales_date,2,2);
		  $a_date2 = substr($sales_date,4,2);
		  $a_date3 = substr($sales_date,6,2);

          $s_time=$val['Start_Time'];
		  $s_time1 = substr($s_time,0,2);
		  $s_time2 = substr($s_time,2,2);

          $e_time=$val['End_Time'];
		  $e_time1 = substr($e_time,0,2);
		  $e_time2 = substr($e_time,2,2);

		  $stime=$s_time1.":".$s_time2;
          $etime=$e_time1.":".$e_time2; 
         

         


        $week_name=$val['Week_Name'];
		$receive_amount=$val['Receive_Amount'];
		$unit_price=$val['Unit_Price'];
		$center_id=$val['Center_ID'];
		$s_code=$val['Sales_Code'];
	
		$sales_code=substr($val['Sales_Code'], -8, 8);


   $sqlx="SELECT Sales_Place_Code
            FROM TB_Saleitem
            WHERE  Sales_Code = '$s_code'";	 


   $s_name = sql_fetch($sqlx);

   $D_Name  = $s_name['Sales_Place_Code'];		
   
   if ($D_Name=="01"){

       $ctxt="스포츠센터";
   }else{
          
		  $ctxt="문화센터";

   }



if($state=="000") { 
$s_class="";
$status="001";
 } elseif($state=="001") {
$s_class="";
$status="001";
 } elseif($state=="002" ) {
$s_class="end";
$status="002";
 }elseif($state=="003" ) {
$s_class="cancel";
$status="001";
 }elseif($state=="004" ) {
$s_class="tcancel";
$status="001";
 }elseif($state=="005" ) {
$s_class="refund";
$status="003";
 }elseif($state=="006" ) {
$s_class="refund_end";
$status="003";
 }elseif($state=="009" ) {
$s_class="xcancel";
$status="001";
 }		

?>
<form name="frm" id="frm" method="post" class="">
<input type='hidden' id="s_count" name="s_count" value="<?php echo $s_code;?>">
<input type='hidden' id="page" name="page" value="<?php echo $s_page;?>">
<input type='hidden' id="center_id" name="center_id" value="<?php echo $center_id;?>">
<input type='hidden' id="idx" name="idx" value="<?php echo $idx;?>">
<input type='hidden' id="state" name="state" value="<?php echo $state3;?>">
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
<input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
<input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<input type="hidden" name="re_bank_name" id="re_bank_name" value="">
<!--<div class="grayBox">
			<p class="txt">환불신청, 재수강신청, 카드전표출력는 상세보기를 클릭하여 신청할 수 있습니다.</p>
		</div>-->

<div class="my_lecture_list my_lecture_list_row">

<div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                                                                <div class="my_lecture_data_group ">
                                    <span class="my_lecture_status end">결제완료</span>
                                                                    </div>
                                                                <div class="my_lecture_lec_area">
                                    <!--<a class="my_lecture_lec nc-open-bottom-popup" href="#!">98,000</a>-->
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <a class="my_lecture_title" href="javascript:void(0);"><?php echo $val['Sales_Item_Name'];?></a>
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont">
																									<span class="one"><span class="bt">강습장소</span><?php echo get_session('center_name');?></span> </span>  
																									<span class="two"><span class="bt">강습시간</span><?php echo $week_name;?> <?php echo $stime;?> ~ <?php echo $etime;?></span></span>  
																									<span><span class="bt">강습기간</span><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?>(<?php echo $val['Month_Qty'];?>개월)</span></span> 
																									<span><span class="bt">수강요금</span>₩<?php echo number_format($receive_amount);?></span></span> 
																									<span><span class="bt">접수일자</span><?php echo $a_date1;?>-<?php echo $a_date2;?>-<?php echo $a_date3;?></span></span>  </p>
           
																							   
                            </div>                            
							                 <div class="my_lecture_btns my_lecture_btns_two ">
                                             											


                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>
</div>

<?php 

$Approval_No=$val['Approval_No'];
$Tran_Date=$val['Tran_Date'];

$Tran_Date_y = substr($Tran_Date, 0,2);
   $Tran_Date_m = substr($Tran_Date, 2,2);
   $Tran_Date_d = substr($Tran_Date, 4,2);

$Tran_Date_D=$Tran_Date_y."-".$Tran_Date_m."-".$Tran_Date_d;


$Approval_Amount=$val['Receive_Amount'];
$Trs_No=$val['Trs_No'];
$Trs_Seq=$val['Trs_Seq'];
$RefNo=$val['RefNo'];


$after_date =  date("Ymd", strtotime($val['Ins_Date']. ' +10 days'));
$after_start =  date("Ymd", strtotime($s_date. ' +25 days'));

?>

<div class="content_area_rent">
<h3 class="conts_subtitle">
<span>결제정보</span>
</h3>
</div>
<style>
@media (min-width: 1024px){
.my_lecture_cont.card_view span.one,.my_lecture_cont.card_view span.two,.my_lecture_cont.card_view span.three,.my_lecture_cont.card_view span.four  {
    display: inline-block;
    margin-top: 3px;
    margin-right: 8px;
    font-size: 15px;
}
}
</style>

<div class="my_lecture_list my_lecture_list_row" style="border-top:0.1rem solid #dae1e6;">

<div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                                                           <div class="my_lecture_lec_area">
                                    <!--<a class="my_lecture_lec nc-open-bottom-popup" href="#!">98,000</a>-->
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <!--<a class="my_lecture_title" href="javascript:void(0);"><?php echo $row['Sales_Item_Name'];?></a>-->
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont card_view">
																									<span class="one"><span class="bt">결제상태</span>결제완료</span> </span>  
																									<span class="two"><span class="bt">승인일시</span><?php echo $Tran_Date_D;?></span></span>  
																									<span class="three"><span class="bt">승인번호</span><?php echo $Approval_No;?></span></span> 
																									<span class="four"><span class="bt">지불수단</span>카드</span></span> 
																									<span><span class="bt">결제구분</span><?php echo $val['Card_Name'];?></span></span>  
																									<span><span class="bt">결제금액</span>₩<?php echo number_format($Approval_Amount);?></span></span>  
																									<span><span class="bt">카드전표</span><span class="btc"><a href="javascript:sendForm('<?php echo $RefNo;?>', '<?php echo $Tran_Date;?>');">카드전표출력</a></span></span>  
																									</p>
           
																							   
                            </div>                            
							                 <div class="my_lecture_btns my_lecture_btns_two ">
                                             											


                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>
</div>
<style>
.my_lecture_cont span.btc {
    font-weight: 500;
    color: #fff;
    border-color: #d8e2e5;
    background: #1d3661;
    /* min-height: auto; */
    min-width: auto;
    border-radius: 3px;
    font-size: 13px;
    padding: 2px 4px;    display: inline-block;
    border: 1px solid #d8e2e5;

}
.my_lecture_cont span.btc a{
    color: #fff;
}



.my_lecture_btns {
 border-top: 0px solid #d8e2e5; 

}
.content_area_rent.refund{
    height: 200px;    margin-top: 0;
}
.conts_list {
    margin-left: 15px;
    margin-bottom: 10px;
    margin-top: 0px;
    position: relative;
}
.content_area_rent .nicescroll_area_outer {
    width: 100%;
    height: 100px;
    padding: 22px 14px 22px 31px;
    position: relative;
    background: #fff;
    border: 0px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
}
.content_area_rent .nicescroll_area_outer {
    padding: 0 0px 0px 0px;
}
.content_area_rent .nicescroll_area_outer {
    height: 120px;
	    border: none;
    border-radius: 0;
}
.content_area_rent .nicescroll_area {
    width: 100%;
    height: 100%;
    position: relative;
}
.content_area_rent .nicescroll_area {
    padding-right: 0;
}
@media screen and (max-width: 768px){
.conts_list li {
    font-size: 13px;
    margin-top: 7px;
}
}

.re_form{
    position: relative;
    width: 100%;
    margin-bottom: 10px;
    display: inline-block;
}
.re_form span{

letter-spacing: -0.03em;

}


.re_form span.num {
    
}
.re_form span.num.cc {
   font-size:12px;
}
.re_form h2 {  font-size: 16px;
    font-weight: 100;
    margin-bottom: 20px;
	    line-height: 1.316;
    /* font-family: Lato, NotoSansCJKkr-Black, 맑은고딕, sans-serif; */
    -webkit-font-smoothing: antialiased;
    text-transform: uppercase;
    letter-spacing: 0px;
 }
.re_form h2 small {font-size: 15px;
    color: #666666;
	
    /* float: right; */
    /* line-height: 15px; */ 
	letter-spacing: -0.03em;
	}	
	
.re_form label { color: #444444;font-size: 14px; }
.re_form ul { margin-bottom: 40px; border-top:3px solid #000;    padding: 0px; }
	
.re_form li { display: table; width: 100%; height: 54px; border-bottom: 1px solid #ededed;float: left;  }

.re_form li:nth-child(1),
.re_form li:nth-child(2),.re_form li:nth-child(3),.inquiry_form li:nth-child(4) { }
.re_form li:nth-child(1) { width: 50%; border-right: 0px solid #DEDEDE; }
.re_form li:nth-child(2) { width: 50%; }
.re_form li:nth-child(3),.re_form li:nth-child(4) { width: 50%; } 
.re_form li:nth-child(5) { width: 50%; border-right: 0px solid #DEDEDE; }
.re_form li:nth-child(6),.re_form li:nth-child(7),.re_form li:nth-child(8) { width: 50%; }
.re_form li:nth-child(7),.re_form li:nth-child(5) { width: 50%; }



.re_form input[type=text], .re_form input[type=tel], .re_form input[type=email], .re_form input[type=password], .re_form input[type=url], .re_form textarea {
    border: 1px solid #e1e1e1;
    border-radius: inherit;
    background-clip: padding-box;
    -webkit-appearance: none;
}


.refund_wrap.content_area_status{

padding: 0px 25px 10px;

}

.re_form h2 sup { vertical-align: middle; }
.re_form sup { overflow: hidden; position: relative; display: inline-block; width: 15px; height: 15px; margin-left: 2px; vertical-align: middle; text-indent: 30px; color: #B60005; }
.re_form sup:after { position: absolute; top: 0; left: 0; font-size: 17px; text-indent: 0; content: '*'; }
.re_form input[type=text],
.re_form input[type=email],
.re_form input[type=password],
.re_form input[type=tel],
.re_form select,
.re_form textarea { -moz-box-sizing: border-box; box-sizing: border-box; width: 100%; height: 32px; padding: 10px; background: #fff; border-radius: 0px;    font-size: 13px;}


	
.re_form li > label,
.re_form li > div { display: table-cell; padding: 10px 20px; font-size: 13px; vertical-align: middle; }


.re_form li > div { padding-right: 20px; }
.re_form li > div.your_input_company {
    /* padding-right: 40px; */
}
.re_form li > label { width: 120px; border-right: 1px solid #ededed;   background: #f7f7f7;}
.re_form ul.has_active li.active { display: none; }
.re_form ul.has_active li:nth-child(3) { width: 100%; }
.your_input_categories span { margin: 0 20px 0 0; color: #666666; }

.re_form .chosen-container {
    height: 32px;
    width: 100% !important;
}

.re_form .chosen-container-single .chosen-single{
	    font-size: 13px;
}	

.re_form .chosen-container-single .chosen-single div b:after {
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    font-family: 'shop-font';
    content: '\e928';
    font-size: 16px;
    font-weight: normal;
    line-height: 32px;
    text-align: center;
    color: #666;
}
.your_bank .selectric-items li {
    padding: 6px 12px 6px;
    line-height: 1.4;
    color: #666;
    height: 30px;
    border-bottom: 1px solid #ddd;    font-size: 12px;
}

.re_form .your_bank li:nth-child(n) {
    width: 100%;
}
.re_form .your_rela li:nth-child(n) {
    width: 100%;
}


.check_box {margin:0;padding: 0px;}
.check_box {display:inline-block; position:relative;line-height:1;}
.check_box + .check_box {margin-left:0;}
.check_box input[type="checkbox"] {position:absolute; width:100%; height:100%; top:0; left:0; opacity:0;}
.check_box input[type="checkbox"] + label {display:inline-flex; line-height:18px; font-size:0; color:#ccc; align-items:center;vertical-align: top;}
.check_box input[type="checkbox"] + label:before {display:block; width:18px; height:18px; margin-right:0; content:''; border:1px solid #ccc; background:#fff; box-sizing:border-box;}
.check_box input[type="checkbox"]:checked + label:before {border-color:#EB1B22; background:#EB1B22 url('../s_img/ico_chk.png') no-repeat 0 0 / 18px auto;}
.check_box input[type="checkbox"]:disabled + label:before {background:#999;}
.check_box input[type="checkbox"]:checked:disabled + label:before {background:#EB1B22 url('../s_img/ico_chk.png') no-repeat 0 -18px / 18px auto;}
.check_box input[type="checkbox"]:checked + label:before, input[type="checkbox"]:disabled + label:before {color:#393939}
.check_box.no_label input[type="checkbox"] + label {display:block; width:18px; height:18px; overflow: hidden;}
.check_box.no_label input[type="checkbox"] + label:before {margin-right:0;}

.inquiry_privacy {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #FBFBFB;
    text-align: right;
}
.inquiry_privacy_checkbox span a {
    padding-bottom: 1px;
    position: relative;
    font-size: 15px;
    color: #000;
    border-bottom: 1px solid #000;
}
	.inquiry_privacy_checkbox span p {
    padding-bottom: 1px;
    position: relative;
    font-size: 15px;display:inline-block;
    color: #000;
    border-bottom: 1px solid #000;
}
.inquiry_privacy_checkbox {
    padding: 15px 0;
    text-align: right;
}
.content_area_status {
    margin-top: 0px;
    width: 100%;
    padding: 15px 25px;
    background-color: #fff;
    /* text-align: center; */
    border: 1px solid #E6E6E6;
    border-radius: 5px;
    position: relative;
}


.your_bank .selectric .label {    height: 30px;
    margin: 0 10px 0 10px;
    font-size: 13px;
    line-height: 30px;
    font-weight: 400;
    color: #666;
 }
.your_bank .selectric-open .selectric .button:after {
    -webkit-transform: scale(.7) rotate(-180deg);
    -ms-transform: scale(.7) rotate(-180deg);
    transform: scale(.7) rotate(-180deg);
}
.your_bank .selectric .button:after {
    width: 100%;
    font-size: 14px;
    color: #B5121B;
    border: none;
    -webkit-transition: -webkit-transform 0.4s;
    transition: -webkit-transform 0.4s;
    transition: transform 0.4s;
    transition: transform 0.4s, -webkit-transform 0.4s;
    -webkit-transform: scale(.7);
    -ms-transform: scale(.7);
    transform: scale(.7);
    right: -3px;
    content: '\e905';
    font-family: 'nc-font';
}
.your_bank .selectric .button {
    width: 30px;
    height: 30px;
}

.nc_frm__action.red{
    color: #fff;
    background: #e51b13;
    border-color: #e51b13;
}



html.desktop .nc_frm__action.red:hover {
     color: #fff;
    background: #222;
    border-color: #222;
}

.re_form .your_bank ul {
    margin-bottom: 0px;
}


@media only screen and (max-width:981px){

.content_area_rent {
    padding: 0px 0px;
}

.refund_wrap.content_area_status{

padding: 10px 20px;

}


.content_area_status {
    padding: 15px 15px;
}

.re_form ul { display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; flex-direction: column; -webkit-box-orient: vertical; -webkit-box-direction: normal; -webkit-flex-direction: column; -ms-flex-direction: column; -webkit-flex-wrap: wrap; -ms-flex-wrap: wrap; flex-wrap: wrap; }
    .re_form li:nth-child(n) { display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; flex-direction: column; height: auto; -webkit-box-orient: vertical; -webkit-box-direction: normal; -webkit-flex-direction: column; -ms-flex-direction: column; -webkit-flex-wrap: wrap; -ms-flex-wrap: wrap; flex-wrap: wrap; }
    .re_form li > label,
    .re_form li > div { display: block; padding: 10px 0px; }
    .re_form li > label { width: auto; padding-bottom: 0; border-right: 0;background: #fff; }
    .re_form input[type=email] { width: 100%; }
   

	
	.inquiry_form li:nth-child(1), .inquiry_form li:nth-child(2), .inquiry_form li:nth-child(3), .inquiry_form li:nth-child(4), .inquiry_form li:nth-child(5), .inquiry_form li:nth-child(6), .inquiry_form li:nth-child(7), .inquiry_form li:nth-child(8) {
    float: none;
    width: 100%;
}



	.re_form li:nth-child(1), .re_form li:nth-child(2), .re_form li:nth-child(3), .re_form li:nth-child(4), .re_form li:nth-child(5), .re_form li:nth-child(6), .re_form li:nth-child(7), .re_form li:nth-child(8) {
    float: none;
    width: 100%;
}
.re_form ul {
    margin-bottom: 0px;
}
.your_bank .selectric {
    background: #fff;
    border: 1px solid #E6E6E6;
    height: 34px;
}
.re_form sup {

    width: 10px;

}
.re_form li:last-child {
    border-bottom: 0px solid #ededed;

}
}
.content_area_rent.refund {
    height: 120px;
    margin-top: 0;
    padding-top: 0;
}
.content_area_rent .nicescroll_area_outer {
    height: 80px;
    border: none;
    border-radius: 0;
}
</style>

<?php
	if($reday < $after_start && $sales_date != $reday){?>
<div class="content_area_status" style="display:block;margin-top:20px;">
<div class="content_area_rent refund">
<h3 class="conts_subtitle" style="">
<span>환불 규정</span>
</h3>
<div class="nicescroll_area_outer">
 <div class="nicescroll_area">
<ul class="conts_list"><li>프로그램 개시 1일전까지 취소신청 한 경우 : 사용료 100% 환불</li>
<li>프로그램 개시일 이후에 취소신청 한 경우 : 사용료 총액의 10%를 위약금으로 공제한 후 잔여일에 대하여 일할 계산하여 환불 (8일이후는 환불 불가)</li>
</ul>
</div>
</div>
</div>
</div>

<div class="inquiry_privacy">
<div class="inquiry_privacy_checkbox check_box"><input type="checkbox" name="reagree" id="reagree" class="refund select_check" value="요금 환불 요청하기." onchange="valueChanged();"><label for="agreex"></label>&nbsp;<span class=""><p>환불요청하기</p></span></div>
</div>
<?php }?>
<div class="refund_wrap content_area_status" style="display:none;">
<div class="content_area_rent"  style="margin-top:0;">
<h3 class="conts_subtitle" style="margin-bottom: 0px;">
<span>환불요청정보</span></h3></div>
<div id="re_form" class="re_form">
<ul>
<li><label for="your_name"><sup>필수</sup>예금주명</label>
<div class="your_input "><span class=""><input type="text" name="re_name" value="" size="40" class="" id="re_name" ></span></div>
</li>
<li><label for="your_name"><sup>필수</sup>입금은행</label>
<div class="your_input your_bank"><span class=""><select name="re_bank" class="nc_selectric" id="re_bank" >
	                     <option value="">은행명을 선택하세요</option>
                        <option value="35"  data-text="경남은행" >경남은행</option>
                        <option value="29" data-text="광주은행">광주은행</option>
                        <option value="07" data-text="국민은행">국민은행</option>
                        <option value="05" data-text="기업은행">기업은행</option>
                        <option value="15" data-text="농협중앙회">농협중앙회</option>
                        <option value="17" data-text="농협회원조합">농협회원조합</option>
                        <option value="25" data-text="대구은행">대구은행</option>
                        <option value="47" data-text="도이치은행">도이치은행</option>
                        <option value="27" data-text="부산은행">부산은행</option>
                        <option value="03" data-text="산업은행">산업은행</option>
                        <option value="41" data-text="상호저축은행">상호저축은행</option>
                        <option value="37" data-text="새마을금고">새마을금고</option>
                        <option value="11" data-text="수협중앙회">수협중앙회</option>
                        <option value="36" data-text="신한금융투자">신한금융투자</option>
                        <option value="60" data-text="신한은행">신한은행</option>
                        <option value="39" data-text="신협중앙회">신협중앙회</option>
                        <option value="09" data-text="외환은행">외환은행</option>
                        <option value="19" data-text="우리은행">우리은행</option>
                        <option value="56" data-text="우체국">우체국</option>
                        <option value="33" data-text="전북은행">전북은행</option>
                        <option value="31" data-text="제주은행">제주은행</option>
                        <option value="68" data-text="카카오뱅크">카카오뱅크</option>
                        <option value="67" data-text="케이뱅크">케이뱅크</option>
                        <option value="59" data-text="하나은행">하나은행</option>
                        <option value="23" data-text="한국씨티은행">한국씨티은행</option>
                        <option value="45" data-text="HSBC은행">HSBC은행</option>
                        <option value="21" data-text="SC제일은행">SC제일은행</option>
									
</select></span></div>
</li>
<li><label for="your_name"><sup>필수</sup>계좌번호</label>
<div class="your_input "><span class=""><input type="text" name="re_bank_num" value="" size="40" class="" id="re_bank_num" ></span></div>
</li>
<li><label for="your_name"><sup>필수</sup>환불사유</label>
<div class="your_input "><span class=""><input type="text" name="re_reason" value="" size="100" class="" id="re_reason" ></span></div>
</li>
</div>
</div>

<br>


<div class="nc_frm__control">
 <?php
 if($sales_date == $reday){

?>
  <button  type="button"  class="nc_frm__action"  id="lecture_cancel" onclick="goCard_Cancel('<?php echo $Trs_No;?>','<?php echo $Trs_Seq;?>','<?php echo $RefNo;?>','<?php echo $Tran_Date;?>','<?php echo $Approval_Amount;?>','<?php echo get_session('m_name');?>','<?php echo get_session('m_code');?>','<?php echo $_SESSION['center_id'];?>');">결제취소</button>
  <?php }?>
<?php
	if($reday < $after_start && $sales_date != $reday){?>
  <button  type="button"  class="nc_frm__action red"  id="lecture_cancel" onclick="goRefund('<?php echo $trs_no;?>','<?php echo $trs_seq;?>','<?php echo $page;?>','<?php echo $center_id;?>');">환불요청</button>
<?php }?>

<button type="button" class="nc_frm__action3" onClick="location.href='./lindex.php?status=002&page=<?php echo $page;?>&center_id=<?php echo $_SESSION['center_id'];?>'">목록가기</button> 
                        </div>
               




<input type="hidden" name="page" id="page">
<input type="hidden" name="c_id" id="c_id">
<input type="hidden" name="trs_no" id="trs_no">
<input type="hidden" name="trs_seq" id="trs_seq">

</form>



<?php

  }

  }

}

?>


<?php
}else if($s_status=='003'){    //환불이력현황


$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함한일
$toymd=$thisyear."".$thismonth."".$today;
$toyhm=date('Hi',time());

$totmd=$toymd."".$toyhm;

$weekString = array("일", "월", "화", "수", "목", "금", "토");

$toymd_WN=$weekString[ date('w'  , strtotime($toymd)  ) ] ;




$m_code=get_session('m_code');

$sqlcnt = "SELECT count(*) as cnt FROM TB_Basket_Program  
             
 WHERE Sales_Division IN ('003') 
	   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'
AND State ='001' 
AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END 
ORDER BY IDX DESC ";

  $rowc = sql_fetch($sqlcnt);
 $total_countd= $rowc['cnt'];


 $sqlcnt2 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
   AND State    IN ('002', '005')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row2 = sql_fetch($sqlcnt2);
 $total_counte= $row2['cnt'];


 $sqlcnt3 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
  AND State     IN ('003', '009')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row3 = sql_fetch($sqlcnt3);
 $total_countc= $row3['cnt'];



?>
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<div class="grayBox">
			<p class="txt">환불신청 내역은 상세보기 화면에서 확인 할 수 있습니다.<br>
			실제 계좌입금까지는 신청일로부터 약 2주정도 소요될 수 있습니다.</p>
		</div>

<?php

$http_host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$url = "http://".$http_host . $request_uri;



 
$sql2 = "SELECT b.IDX, b.Member_Code, b.State,
       CASE WHEN b.State = '001' THEN '결제대기'
            WHEN b.State = '002' THEN '결제완료'
            WHEN b.State = '003' THEN '신청취소'
            WHEN b.State = '004' THEN '시간경과취소'
            WHEN b.State = '005' THEN '환불신청'
            WHEN b.State = '006' THEN '환불완료' 
			WHEN b.State = '009' THEN '당일결제취소' END State_Name,b.Center_ID, b.Sales_Item_Name,b.Week_Name, b.Sales_Code,  b.Receive_Amount, b.Sales_Date, b.Approval_No, b.Trs_No, b.RefNo, b.Tran_Date, b.Approval_Amount, b.Ins_Date, b.Start_Date, b.End_Date, a.Start_Time, a.End_Time, a.First_Start_Day_Yn
 FROM TB_SaleItem  a INNER JOIN 
           TB_Basket_Program  b on a.Center_ID=b.Center_ID AND a.Sales_Code=b.Sales_Code 
 WHERE b.Sales_Division IN ('003', '055')
  AND b.Member_Code     = '$m_code'
  AND b.IDX     = '$s_idx'";
   
       $row =sql_fetch($sql2);


$state3=$row['State'];


		 $state_name=$row['State_Name'];
		  $s_date=$row['Start_Date'];
		  $s_date1 = substr($s_date,2,2);
		  $s_date2 = substr($s_date,4,2);
		  $s_date3 = substr($s_date,6,2);


          $e_date=$row['End_Date'];
		  $e_date1 = substr($e_date,2,2);
		  $e_date2 = substr($e_date,4,2);
		  $e_date3 = substr($e_date,6,2);


        $sales_item_name=$row['Sales_Item_Name'];
		$sales_date=$row['Sales_Date'];
		  $a_date1 = substr($sales_date,2,2);
		  $a_date2 = substr($sales_date,4,2);
		  $a_date3 = substr($sales_date,6,2);

          $s_time=$row['Start_Time'];
		  $s_time1 = substr($s_time,0,2);
		  $s_time2 = substr($s_time,2,2);

          $e_time=$row['End_Time'];
		  $e_time1 = substr($e_time,0,2);
		  $e_time2 = substr($e_time,2,2);

		  $stime=$s_time1.":".$s_time2;
          $etime=$e_time1.":".$e_time2; 

        $week_name=$row['Week_Name'];
		$receive_amount=$row['Receive_Amount'];
		$unit_price=$row['Unit_Price'];
		$idx=$row['IDX'];
		$center_id=$row['Center_ID'];
		$s_code=$row['Sales_Code'];
		$state=$row['State'];
	

      $first_start_day_yn=$row['First_Start_Day_Yn'];

		$sales_code=substr($row['Sales_Code'], -8, 8);


   $sqlx="SELECT Sales_Place_Code
            FROM TB_Saleitem
            WHERE  Sales_Code = '$s_code' ";	 


   $s_name = sql_fetch($sqlx);

   $D_Name  = $s_name['Sales_Place_Code'];		
   
   if ($D_Name=="01"){

       $ctxt="스포츠센터";
   }else{
          
		  $ctxt="문화센터";

   }


if($state=="000") { 
$s_class="";
$status="001";
 } elseif($state=="001") {
$s_class="";
$status="001";
 } elseif($state=="002" ) {
$s_class="end";
$status="002";
 }elseif($state=="003" ) {
$s_class="cancel";
$status="001";
 }elseif($state=="004" ) {
$s_class="tcancel";
$status="001";
 }elseif($state=="005" ) {
$s_class="refund";
$status="003";
 }elseif($state=="006" ) {
$s_class="refund_end";
$status="003";
 }elseif($state=="009" ) {
$s_class="xcancel";
$status="001";
 }		

?>
<form name="frm" id="frm" method="post" class="">
<input type='hidden' id="s_count" name="s_count" value="<?php echo $sales_code;?>">
<input type='hidden' id="page" name="page" value="<?php echo $page;?>">
<input type='hidden' id="center_id" name="center_id" value="<?php echo $center_id;?>">
<input type='hidden' id="idx" name="idx" value="<?php echo $idx;?>">
<input type='hidden' id="state" name="state" value="<?php echo $state3;?>">
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<!--<div class="grayBox">
			<p class="txt">수강신청취소, 결제는 상세보기 화면에서 신청할 수 있습니다.</p>
		</div>-->
		<div class="my_lecture_list my_lecture_list_row">

<div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                                                                <div class="my_lecture_data_group ">
                                    <span class="my_lecture_status  <?php echo $s_class;?>"><?php echo $row['State_Name'];?></span>
                                                                    </div>
                                                                <div class="my_lecture_lec_area">
                                    <!--<a class="my_lecture_lec nc-open-bottom-popup" href="#!">98,000</a>-->
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <a class="my_lecture_title" href="javascript:void(0);"><?php if($first_start_day_yn=="N"){?>[수시]<?php }?><?php echo $row['Sales_Item_Name'];?></a>
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont">
																									<span class="one"><span class="bt">강습장소</span><?php echo get_session('center_name');?></span> </span>  
																									<span class="two"><span class="bt">강습시간</span><?php echo $week_name;?> <?php echo $stime;?> ~ <?php echo $etime;?></span></span>  
																									<span><span class="bt">강습기간</span><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?></span></span> 
																									<span><span class="bt">수강요금</span>₩<?php echo number_format($receive_amount);?></span></span> 
																									<span><span class="bt">접수일자</span><?php echo $a_date1;?>-<?php echo $a_date2;?>-<?php echo $a_date3;?></span></span>  </p>
           
																							   
                            </div>                            
							                 <div class="my_lecture_btns my_lecture_btns_two ">
                                             											


                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>
</div>

                   <!--<div class="nc-separator"></div>-->

                  
<div class="nc_frm__control">
 

<?php if($toymd_WN!='일'){?><?php if($toymd_WN=='토'){?><?php if($toyhm>=800 && $toyhm<=1700){?> <button  type="button"  class="nc_frm__action"  id="Refund_Cancel" onclick="goRefund_Cancel('<?php echo $trs_no;?>','<?php echo $trs_seq;?>','<?php echo $page;?>','<?php echo $center_id;?>');">환불신청취소</button><?php }else{?><?php } ?><?php }else{?><?php if($toyhm>=800 && $toyhm<=2100) {?> <button  type="button"  class="nc_frm__action"  id="Refund_Cancel" onclick="goRefund_Cancel('<?php echo $trs_no;?>','<?php echo $trs_seq;?>','<?php echo $page;?>','<?php echo $center_id;?>');">환불신청취소</button><?php }else{?><?php } ?><?php }?><?php }?>
<button type="button" class="nc_frm__action3" onClick="location.href='./lindex.php?status=003&page=<?php echo $page;?>&center_id=<?php echo $_SESSION['center_id'];?>'">목록가기</button> 
                        </div>					
                </div>
            </div>
        </div>
<script>



		 $(document).ready(function () {	

        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());

});
</script>

<script type='text/javascript'> 


function goRefund_Cancel(trs_no,trs_seq,page,center_id){

 				NC.alert({
				title    : '환불요청을 취소 하시겠습니까?',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){


$.ajax({
        url:'./ajax.refund_Cancel.php',
        type: "POST",
	    accept : "application/json",
        dataType: "json",
		data:{'trs_no': trs_no,'trs_seq':trs_seq,'page':page,'center_id':center_id},
        async: true,
        cache: false,
		success: function(data, textStatus) {

            if(data.rstate != "") {
  
		 if(data.rstate=='5'){
                   //환불신청완료
     
              	NC.alert({
				title    : '환불요청 취소가 완료되었습니다.',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			   location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002";
	        
				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});



					return false;
					
					 
				}else if(data.rstate=='4'){
				var rsult="";	  	
				NC.alert({
				title    : '로그인이 필요한 서비스입니다.',
				message  : '로그인 하시겠습니까?',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				has_icon : false,
				is_confirm : true,
				primary_button: true,
				type     : 'info',
				on_confirm  : function(){
                                                        rsult += "<form name='form1' method='post' action='../s_member/login.php'>";
														rsult += "<input type='hidden' name='sales_code' value='<?php echo $sales_code;?>'>";	
		                                                rsult += "<input type='hidden' name='s_code' value='<?php echo $s_code;?>'>";	
		                                                rsult += "<input type='hidden' name='g_code' value='<?php echo $g_code;?>'>";	
														rsult += "<input type='hidden' name='b_code' value='<?php echo $b_code;?>'>";	
														rsult += "<input type='hidden' name='unit_price' value='<?php echo $unit_price;?>'>";	
														rsult += "<input type='hidden' name='month_qty' value='<?php echo $monthqty2;?>'>";	
														rsult += "<input type='hidden' name='redirect_to' value='<?php echo NC_CENTER_URL;?>/pro_view2.php'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();

					}	
				, on_cancel : function(){
                                  
                 
                    }  });	

					  
					  
					  
					  return false;
					 
					 
				}
				
				
		        return false;
            }
              
             //}
          
        },error:function(request, status,error){
		 // setTimeout(function(){isAjaxing = false;},10000);	
		}
    });

				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});

	   

}
</script> 
<?php }?>

<?php

if($s_status=="002"){
?>


<script type='text/javascript'> 




   function valueChanged()
    {
        if($('.refund').is(":checked"))   
            $(".refund_wrap").show();
        else
            $(".refund_wrap").hide();
    }



	function checkNumber(evt){
		var keyCode;
		var isNetscape = (navigator.appName == "Netscape") ? 1 : 0;
		if(isNetscape){
			keyCode=evt.which;
			if((keyCode >13 && keyCode < 48) || keyCode > 57){
				evt.preventDefault();
			}
		}else{
			 keyCode = event.keyCode;
			 if ((keyCode >13 && keyCode < 48) || keyCode > 57){
			 event.returnValue=false;
			 }
		}
	}
 
	var _chkNullValue = function(object,msg){
		var value = $(object).val();
		if (value == null){
			                 NC.alert({
				title    : msg,
				message  : ''
                });
			$(object).focus();
			return false;
		}
		if (value.length >  0 && value != "none"){
			return true;
		}else{
			                 NC.alert({
				title    : msg,
				message  : ''
                });
			$(object).focus();
			return false;
		}
	}
	var _chkNumValue = function (object,msg){
		var num = $(object).val();
		var flag=true;
		if (num == null || num == ""){
			                 NC.alert({
				title    : msg,
				message  : ''
                });
			$(object).focus();
			flag=false;
			return flag;
		}
		if (num.length > 0){
			for(var i =0 ; i<num.length ; i++){
			c = num.charAt(i);
			   if(!(c>='0' && c<='9')) {
					//alert(msg);

                 NC.alert({
				title    : msg,
				message  : ''
                });

					$(object).focus();
					flag=false;
					break;
			   }
			}
		}else {
	                 NC.alert({
				title    : msg,
				message  : ''
                });
			$(object).focus();
			flag=false;
		}
		return flag;
    }
 



function goRefund(trs_no,trs_seq,page,center_id){



 var frm = document.frm; 
			

				
		    if(frm.reagree.checked!=true){ 
		
                NC.alert({
				title    : '환불요청하기 클릭하세요.',
				message  : ''
                });

		    return false; 
	        }		

            
		


		   if(!_chkNullValue("input[name='re_name']","예금주명을 입력해주세요.")){
				return false;
			}
			
			if (frm.re_name.value.length < 2) {

                NC.alert({
				title    : '예금주명은 두글자 이상 입력하십시오.',
				message  : ''
                });
                return false;
               }
            
            if(!$('#re_bank > option:selected').val()) {
         
		     	NC.alert({
				title    : '입금은행을 선택해주세요',
				message  : ''
                });

	                return false; 
               }
			
			
			if(!_chkNullValue("input[name='re_bank_num']","계좌번호를 입력해주세요.")){
				return false;
			}
				if(!_chkNullValue("input[name='re_reason']","환불사유를 입력해주세요.")){
				return false;
			}
			




 				NC.alert({
				title    : '환불요청하시겠습니까?',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){


$.ajax({
        url:'./ajax.refund_Proc.php',
        type: "POST",
	    accept : "application/json",
        dataType: "json",
		data:{'trs_no': trs_no,'trs_seq':trs_seq,'page':page,'center_id':center_id,'re_name':$('#re_name').val(),'re_bank':$('#re_bank').val(),'re_bank_name':$('#re_bank_name').val(),'re_bank_num':$('#re_bank_num').val(),'re_reason':$('#re_reason').val()},
        async: true,
        cache: false,
		success: function(data, textStatus) {

            if(data.rstate != "") {
  
				if ( data.rstate=='3' ) {
						
				NC.alert({
				title    : '이미 환불요청한 강좌입니다.',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			        
				},
               on_cancel  : function(){
               

				},
			});


			 return false;
                   
                }else if(data.rstate=='2'){

				NC.alert({
				title    : '이미 환불 처리된 강좌입니다.',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
	
	        
				},
               on_cancel  : function(){
               

	        
				},
			});


					return false;
				}else if(data.rstate=='5'){
                   //환불신청완료
     
              	NC.alert({
				title    : '환불요청이 완료되었습니다.',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			   location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>";
	        
				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});



					return false;
					
					 
				}else if(data.rstate=='4'){
				var rsult="";	  	
				NC.alert({
				title    : '로그인이 필요한 서비스입니다.',
				message  : '로그인 하시겠습니까?',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				has_icon : false,
				is_confirm : true,
				primary_button: true,
				type     : 'info',
				on_confirm  : function(){
                                                        rsult += "<form name='form1' method='post' action='../s_member/login.php'>";
														rsult += "<input type='hidden' name='sales_code' value='<?php echo $sales_code;?>'>";	
														rsult += "<input type='hidden' name='center_id' value='<?php echo $_SESSION['center_id'];?>'>";
		                                                rsult += "<input type='hidden' name='s_code' value='<?php echo $s_code;?>'>";	
		                                                rsult += "<input type='hidden' name='g_code' value='<?php echo $g_code;?>'>";	
														rsult += "<input type='hidden' name='b_code' value='<?php echo $b_code;?>'>";	
														rsult += "<input type='hidden' name='unit_price' value='<?php echo $unit_price;?>'>";	
														rsult += "<input type='hidden' name='month_qty' value='<?php echo $monthqty2;?>'>";	
														rsult += "<input type='hidden' name='redirect_to' value='<?php echo NC_CENTER_URL;?>/pro_view.php'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();

					}	
				, on_cancel : function(){
                                  
                 
                    }  });	

					  
					  
					  
					  return false;
					 
					 
				}
				
				
		        return false;
            }
              
             //}
          
        },error:function(request, status,error){
		 // setTimeout(function(){isAjaxing = false;},10000);	
		}
    });

				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});

	   

}
</script> 




<?php } ?>





<?php

if($state3=="000" || $state3=="001" || $state3=="002"){

if(NC_IS_MOBILE) {
	$NC_CARD_URL=NC_URL."/mobile/_1_start.php";
	$NC_CARD_BURL=NC_URL."/mo";
}else{
	$NC_CARD_URL=NC_URL."/pc/_1_start.php";
	$NC_CARD_BURL=NC_URL."/pc";
}	


$READY_API_URL = $NC_CARD_BURL."/_2_ready.php"	;
   
   	

?>

<?php 
if(NC_IS_MOBILE) {
	
?>	

<script type='text/javascript'> 

var READY_API_URL = "<?php echo $READY_API_URL;?>";

function goCard(goodsCode,goodsName,Center_ID,idx,goodsAmount,member_code,member_name,ptype){

         //alert('<?php echo $READY_API_URL;?>');


	var request = Mainpay.ready(READY_API_URL); 
		request.done(function(response) {
			if (response.resultCode == '200') {
				/* 결제창 호출 */
				//Mainpay.open(response.data.nextMobileUrl); //*주의* PC와 Mobile은 URL이 상이합니다.
				location.href = response.data.nextMobileUrl;
				return false;
			}
			alert("ERROR : "+JSON.stringify(response));			 				
		});		


        $("#MAINPAY_FORM #paymethod").val('CARD'); 
		$("#MAINPAY_FORM #goodsCode").val(goodsCode);
		$("#MAINPAY_FORM #goodsName").val(goodsName);
		$("#MAINPAY_FORM #goodsAmount").val(goodsAmount);
		$("#MAINPAY_FORM #center_id").val(Center_ID);
		$("#MAINPAY_FORM #idx").val(idx);
		$("#MAINPAY_FORM #member_code").val(member_code);
  		$("#MAINPAY_FORM #memberName").val(member_name);      
		$("#MAINPAY_FORM #ptype").val(ptype);      
        $("#MAINPAY_FORM #nowurl").val('<?php echo $nowurl;?>');      

	   //payment() ;
        //var READY_API_URL = "<?=$READY_API_URL?>";
	   

}

	window.onpopstate = function(){ history.go(-1)};
</script> 
<?php }else{ ?>
<script type='text/javascript'> 


 var READY_API_URL = "<?php echo $READY_API_URL;?>";


function goCard(goodsCode,goodsName,Center_ID,idx,goodsAmount,member_code,member_name,ptype){



}




</script> 
<?php }?>




<?php }?>
<script>



		 $(document).ready(function () {	
        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());
		 });
</script>
</div>
</div>
</div>




<?php
if($s_status=="002"){





?>




<script>

var frm = document.lecture_list; 




function goCard_Cancel(Trs_No,Trs_Seq,RefNo,tranDate,amount,customerName,member_code,center_id){

		//if(frm.refNo.value == ""){
		//	alert("오프라인에서 결제한 내역입니다!!.\n 현장에서 취소하시기 바랍니다");
        //    return false;
		//}
		
        //$("#lecture_list").attr("action","<?php echo $NC_CARD_BURL;?>/_9_cancel.php");
			//$("input[name='hp']").val($("#hp1").val()+"-"+$("#hp2").val()+"-"+$("#hp3").val());
			//$("input[name='tel']").val($("#tel1").val()+"-"+$("#tel2").val()+"-"+$("#tel3").val());



           		var rsult="";	  
				NC.alert({
				title    : '결제를 취소하시겠습니까?',
				message  : '결제취소 시 결제한 강좌예약이 취소 됩니다.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				has_icon : false,
				is_confirm : true,
				primary_button: true,
				type     : 'info',
				on_confirm  : function(){
                rsult += "<form name='form1' method='post' action='<?php echo $NC_CARD_BURL;?>/cancelResponse.php'>";
				rsult += "<input type='hidden' name='trs_no' value='"+Trs_No+"'>";	
		        rsult += "<input type='hidden' name='trs_seq' value='"+Trs_Seq+"'>";	
		        rsult += "<input type='hidden' name='refNo' value='"+RefNo+"'>";	
				rsult += "<input type='hidden' name='tranDate' value='"+tranDate+"'>";	
				rsult += "<input type='hidden' name='amount' value='"+amount+"'>";	
				rsult += "<input type='hidden' name='customerName' value='"+customerName+"'>";	
				rsult += "<input type='hidden' name='member_code' value='"+member_code+"'>";	
				rsult += "<input type='hidden' name='center_id' value='"+center_id+"'>";
			    rsult += "<input type='hidden' name='ptype' value='L'>";			
				rsult += "</form>"; 	 
				$(rsult).appendTo('body').submit();


					}	
				, on_cancel : function(){
                                  
                 
     }  });		 
			 


}

	$(function() {

	$('#re_bank').selectric().on('change', function() {
					var valt = $('.your_bank .selectric .label').text();
					$('#re_bank_name').val(valt);
          });


	});
	function sendForm(refNo, tran_date){
		window.open("https://npg.nicepay.co.kr/issue/IssueLoader.do?type=0&TID="+refNo, "카드전표", "width=600, height=600");
		return;
	}
</script>
<?php }?>

</main>
