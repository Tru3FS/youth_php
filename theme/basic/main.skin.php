<?php
if(!defined('_SAMSUNG_')) exit;
?>
<main id="main" class="main_container">





<div class="wrap">









<div class="article_header" style="display:none;"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">서울특별시 공공서비스 예약</h1></div></div></div>
<?php 



$ostatus = (isset($_REQUEST["ostatus"]) && $_REQUEST["ostatus"]) ? $_REQUEST["ostatus"] : '';
$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : '';

$programcode = (isset($_REQUEST["programcode"]) && $_REQUEST["programcode"]) ? $_REQUEST["programcode"] : NULL;

$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : NULL;
$cc_id = (isset($_REQUEST["cc_id"]) && $_REQUEST["cc_id"]) ? $_REQUEST["cc_id"] : NULL;

$programcode_name = (isset($_REQUEST["programcode_name"]) && $_REQUEST["programcode_name"]) ? $_REQUEST["programcode_name"] : NULL;
$programcode_bname = (isset($_REQUEST["programcode_bname"]) && $_REQUEST["programcode_bname"]) ? $_REQUEST["programcode_bname"] : NULL;

$s_code = (isset($_REQUEST["s_code"]) && $_REQUEST["s_code"]) ? $_REQUEST["s_code"] : NULL;
$g_code = (isset($_REQUEST["g_code"]) && $_REQUEST["g_code"]) ? $_REQUEST["g_code"] : NULL;
$b_code = (isset($_REQUEST["b_code"]) && $_REQUEST["b_code"]) ? $_REQUEST["b_code"] : NULL;


$search = (isset($_REQUEST["search"]) && $_REQUEST["search"]) ? $_REQUEST["search"] : NULL;

If ($g_code ==""){

$g_code='';


}
$today = date("Ym");




if(is_mobile()=='1'){
$rows = '10';
}else{
$rows = '10';
	}







if($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함



$qstr1 = "center_id=$center_id&s_code=$s_code&g_code=$g_code&b_code=$b_code&search=$search";


	$sqlb = "";
	$sqlb = $sqlb."SELECT a.Center_ID,a.Place_Code, a.Sales_Code, a.Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
	$sqlb = $sqlb."       (SELECT Detail_Name FROM TB_CODE_D WHERE Common_Code = 'H02' AND Detail_Code = a.Event_Code) Event_Name, ";
	$sqlb = $sqlb."       a.Lesson_ID, b.Program_Sub_Name, b.Month_Qty, b.Unit_Price, a.Capacity as Capacity_On_OffLine, ";
	$sqlb = $sqlb."       (SELECT COUNT(*) ";
	$sqlb = $sqlb."          FROM TB_Transaction ";
	$sqlb = $sqlb."         WHERE Center_ID        = a.Center_ID ";
	$sqlb = $sqlb."           AND Sales_Division   = '003' ";
	$sqlb = $sqlb."           AND Sales_Code       = a.Sales_Code ";
	$sqlb = $sqlb."           AND '$today'    BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sqlb = $sqlb."           AND End_Date        >= F_DATE_TIME('YYYYMMDD') ";
	$sqlb = $sqlb."           AND Transition_State = '001' ";
	$sqlb = $sqlb."           AND Trs_Type         = '001' ";
	$sqlb = $sqlb."           AND State            = '001') ";
	$sqlb = $sqlb."       + (SELECT COUNT(*) ";
	$sqlb = $sqlb."            FROM TB_Basket_Program ";
	$sqlb = $sqlb."           WHERE Center_ID       = a.Center_ID ";
	$sqlb = $sqlb."             AND Sales_Division  = '003' ";
	$sqlb = $sqlb."             AND Sales_Code      = a.Sales_Code ";
	$sqlb = $sqlb."             AND '$today'   BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sqlb = $sqlb."             AND State           = '001') as Current_Person, ";
	$sqlb = $sqlb."       F_NVLS(c.User_Name, '') as Lesson_User_Name, ";
	$sqlb = $sqlb."       d.Web_Re_Start, d.Web_Re_End, d.Web_Re_Start_Time, d.Web_Re_End_Time, d.Web_New_Start, d.Web_New_End, d.Web_New_Start_Time, d.Web_New_End_Time, ";
	$sqlb = $sqlb."       a.Place_Code, F_NVLS(e.Detail_Name, '') as Place_Name ";
	$sqlb = $sqlb."  FROM TB_SaleItem        a INNER JOIN ";
	$sqlb = $sqlb."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
	$sqlb = $sqlb."       TB_LessonUser_Info c ON a.Center_ID = c.Center_ID AND a.Lesson_ID = c.Lesson_ID LEFT OUTER JOIN ";
    $sqlb = $sqlb."       TB_EventClass      d ON a.Center_ID = d.Center_ID AND a.Sales_Division = d.Sales_Division AND a.Event_Code = d.Event_Code AND a.Class_Code = d.Class_Code LEFT OUTER JOIN ";
	$sqlb = $sqlb."       TB_Code_D          e ON a.Place_Code = e.Detail_Code AND e.Common_Code = 'H01' ";
	$sqlb = $sqlb." WHERE a.Center_ID           = '01' ";
	$sqlb = $sqlb."   AND a.Sales_Division      = '003' ";
	if ($center_id !='' && $s_code==""  && $g_code=="" && $b_code==""  ){
	$sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";
	
	}else if ($center_id !='' && $s_code!=""  && $g_code==""  && $b_code==""  ){
	$sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";	
		
		
	}else if ($center_id !='' && $s_code!=""  && $g_code!=""  && $b_code==""  ){
		
			
	$sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";
	$sqlb = $sqlb."   AND a.Event_Code       = '$g_code' ";
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";	
			
		

   }else if ($center_id !='' && $s_code!=""  && $g_code!=""  && $b_code!=""  ){

	$sqlb = $sqlb."   AND a.Sales_Item_Name like '%$search%' ";	
	$sqlb = $sqlb."   AND a.Class_Code       = '$b_code' ";
	$sqlb = $sqlb."   AND a.Event_Code       = '$g_code' ";
	$sqlb = $sqlb."   AND a.Place_Code       = '$s_code' ";
	$sqlb = $sqlb."   AND a.Sales_Place_Code = '$center_id' ";	
		


    }	
	$sqlb = $sqlb."   AND a.First_Start_Day_Yn = 'Y' ";
	$sqlb = $sqlb."   AND a.State              = '001' ";
	$sqlb = $sqlb."   AND CASE WHEN a.Sales_Place_Code = '01' THEN 1 = 1 ";
	$sqlb = $sqlb."       ELSE SUBSTRING(CONCAT(Month_Start_Yn_01, Month_Start_Yn_02, Month_Start_Yn_03, Month_Start_Yn_04, Month_Start_Yn_05, Month_Start_Yn_06, Month_Start_Yn_07, Month_Start_Yn_08, Month_Start_Yn_09, Month_Start_Yn_10, Month_Start_Yn_11, Month_Start_Yn_12), CAST(SUBSTRING('$today', 5, 2) as int), 1) = 'Y' END ";
	$sqlb = $sqlb."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) ";
	$sqlb = $sqlb."                                  FROM TB_SaleItem ";
	$sqlb = $sqlb."                                 WHERE Center_ID   = a.Center_ID ";
	$sqlb = $sqlb."                                   AND Apply_Date <= F_DATE_TIME('YYYYMMDD') ";
	$sqlb = $sqlb."                               ) ";
	$sqlb = $sqlb." ORDER BY a.Sales_Item_Name  limit $from_record, $rows";





	$sqlc = "";
	$sqlc = $sqlc."SELECT a.Center_ID,a.Place_Code, a.Sales_Code, a.Sales_Item_Name, a.Vat_Yn, a.Start_Time, a.End_Time, F_WEEK_NAME(a.Use_Week) as Week_Name,  ";
	$sqlc = $sqlc."       (SELECT Detail_Name FROM TB_CODE_D WHERE Common_Code = 'H02' AND Detail_Code = a.Event_Code) Event_Name, ";
	$sqlc = $sqlc."       a.Lesson_ID, b.Program_Sub_Name, b.Month_Qty, b.Unit_Price, a.Capacity as Capacity_On_OffLine, ";
	$sqlc = $sqlc."       (SELECT COUNT(*) ";
	$sqlc = $sqlc."          FROM TB_Transaction ";
	$sqlc = $sqlc."         WHERE Center_ID        = a.Center_ID ";
	$sqlc = $sqlc."           AND Sales_Division   = '003' ";
	$sqlc = $sqlc."           AND Sales_Code       = a.Sales_Code ";
	$sqlc = $sqlc."           AND '$today'    BETWEEN Start_Date AND End_Date ";
	$sqlc = $sqlc."           AND End_Date        >= F_DATE_TIME('YYYYMMDD') ";
	$sqlc = $sqlc."           AND Transition_State = '001' ";
	$sqlc = $sqlc."           AND Trs_Type         = '001' ";
	$sqlc = $sqlc."           AND State            = '001') ";
	$sqlc = $sqlc."       + (SELECT COUNT(*) ";
	$sqlc = $sqlc."            FROM TB_Basket_Program ";
	$sqlc = $sqlc."           WHERE Center_ID       = a.Center_ID ";
	$sqlc = $sqlc."             AND Sales_Division  = '003' ";
	$sqlc = $sqlc."             AND Sales_Code      = a.Sales_Code ";
	$sqlc = $sqlc."             AND '$today'   BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6) ";
	$sqlc = $sqlc."             AND State           = '001') as Current_Person, ";
	$sqlc = $sqlc."       F_NVLS(c.User_Name, '') as Lesson_User_Name, ";
	$sqlc = $sqlc."       d.Web_Re_Start, d.Web_Re_End, d.Web_Re_Start_Time, d.Web_Re_End_Time, d.Web_New_Start, d.Web_New_End, d.Web_New_Start_Time, d.Web_New_End_Time, ";
	$sqlc = $sqlc."       a.Place_Code, F_NVLS(e.Detail_Name, '') as Place_Name ";
	$sqlc = $sqlc."  FROM TB_SaleItem        a INNER JOIN ";
	$sqlc = $sqlc."       TB_SaleItem_Price  b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN ";
	$sqlc = $sqlc."       TB_LessonUser_Info c ON a.Center_ID = c.Center_ID AND a.Lesson_ID = c.Lesson_ID LEFT OUTER JOIN ";
	$sqlc = $sqlc."       TB_EventClass      d ON a.Center_ID = d.Center_ID AND a.Sales_Division = d.Sales_Division AND a.Event_Code = d.Event_Code AND a.Class_Code = d.Class_Code LEFT OUTER JOIN ";
	$sqlc = $sqlc."       TB_Code_D          e ON a.Place_Code = e.Detail_Code AND e.Common_Code = 'H01' ";
	$sqlc = $sqlc." WHERE a.Center_ID           = '01' ";
	$sqlc = $sqlc."   AND a.Sales_Division      = '003' ";
if ($center_id !='' && $s_code==""  && $g_code=="" && $b_code==""  ){
	
	$sqlc = $sqlc."   AND a.Sales_Item_Name like '$search%' ";
	$sqlc = $sqlc."   AND a.Sales_Place_Code = '$center_id' ";
	
	}else if ($center_id !='' && $s_code!=""  && $g_code==""  && $b_code==""  ){
	$sqlc = $sqlc."   AND a.Sales_Item_Name like '$search%' ";
	$sqlc = $sqlc."   AND a.Place_Code       = '$s_code' ";
	$sqlc = $sqlc."   AND a.Sales_Place_Code = '$center_id' ";	
		
		
	}else if ($center_id !='' && $s_code!=""  && $g_code!=""  && $b_code==""  ){
		
			
	$sqlc = $sqlc."   AND a.Sales_Item_Name like '$search%' ";
	$sqlc = $sqlc."   AND a.Event_Code       = '$g_code' ";
	$sqlc = $sqlc."   AND a.Place_Code       = '$s_code' ";
	$sqlc = $sqlc."   AND a.Sales_Place_Code = '$center_id' ";	
			
		

   }else if ($center_id !='' && $s_code!=""  && $g_code!=""  && $b_code!=""  ){

	$sqlc = $sqlc."   AND a.Sales_Item_Name like '$search%' ";		
	$sqlc = $sqlc."   AND a.Class_Code       = '$b_code' ";
	$sqlc = $sqlc."   AND a.Event_Code       = '$g_code' ";
	$sqlc = $sqlc."   AND a.Place_Code       = '$s_code' ";
	$sqlc = $sqlc."   AND a.Sales_Place_Code = '$center_id' ";	

    }	
	$sqlc = $sqlc."   AND a.First_Start_Day_Yn = 'Y' ";
	$sqlc = $sqlc."   AND a.State              = '001' ";
	$sqlc = $sqlc."   AND CASE WHEN a.Sales_Place_Code = '01' THEN 1 = 1 ";
	$sqlc = $sqlc."       ELSE SUBSTRING(CONCAT(Month_Start_Yn_01, Month_Start_Yn_02, Month_Start_Yn_03, Month_Start_Yn_04, Month_Start_Yn_05, Month_Start_Yn_06, Month_Start_Yn_07, Month_Start_Yn_08, Month_Start_Yn_09, Month_Start_Yn_10, Month_Start_Yn_11, Month_Start_Yn_12), CAST(SUBSTRING('$today', 5, 2) as int), 1) = 'Y' END ";
	$sqlc = $sqlc."   AND b.Apply_Date          = (SELECT MAX(Apply_Date) ";
	$sqlc = $sqlc."                                  FROM TB_SaleItem ";
	$sqlc = $sqlc."                                 WHERE Center_ID   = a.Center_ID ";
	$sqlc = $sqlc."                                   AND Apply_Date <= F_DATE_TIME('YYYYMMDD') ";
	$sqlc = $sqlc."                               ) ";
	$sqlc = $sqlc." ORDER BY a.Sales_Item_Name";





?>
<!--
<input type="hidden" id="cc_id" name="cc_id" value="<?php echo $center_id;?>">
<input type="hidden" id="s_codex" name="s_codex" value="<?php echo $s_codex;?>">
<input type="hidden" id="g_codex" name="g_codex" value="<?php echo $g_codex;?>">
<input type="hidden" id="u_codex" name="u_codex" value="<?php echo $d_codex;?>">
<input type="hidden" id="z_scode_idx3" name="z_scode_idx3">
<input type="hidden" id="z_gcode_idx3" name="z_gcode_idx3" value="<?php echo $z_codex;?>">
<input type="hidden" id="z_jcode" name="z_jcode" value="<?php echo $j_code;?>">
-->
 <script>
 var ajaxurl = '<?php echo NC_UTIL_URL; ?>/nc_program.ajax.php';
 var ajaxurl_T='<?php echo NC_UTIL_URL; ?>/nc_program.list.ajax.php';
 </script>
<form name="program_form" class="program_form" id="program_form" method="post">


<?php if($center_id=='01'){

$center_txt="스포츠센터";
}elseif($center_id=='02'){

$center_txt="문화센터";
}



?>



<input type="hidden" name="page" id="page" value="<?php echo $page;?>">
<input type="hidden" name="z_center" id="z_center" value="<?php echo urlencode($center_txt);?>" class="">	
<input type="hidden" name="z_scode" id="z_scode" value="<?php echo urlencode($z_scode);?>" class="">
<input type="hidden" name="z_gcode" id="z_gcode" value="<?php echo $z_code;?>" class="">
<input type="hidden" name="z_bcode" id="z_bcode" value="<?php echo $z_bcode;?>" class="">
<input type="hidden" name="z_center_idx" id="z_center_idx" value="<?php echo $center_id;?>" class="">	
<input type="hidden" name="z_scode_idx" id="z_scode_idx" value="<?php echo $z_scode_idx2;?>" class="">
<input type="hidden" name="z_gcode_idx" id="z_gcode_idx" value="<?php echo $z_gcode_idx2;?>" class="">
<input type="hidden" name="z_bcode_idx" id="z_bcode_idx" value="<?php echo $b_code;?>" class="">
<input type="hidden" name="z_scode_idx2" id="z_scode_idx2" value="<?php echo $z_scode_idx2;?>" class="">
<input type="hidden" name="z_gcode_idx2" id="z_gcode_idx2" value="<?php echo $z_gcode_idx2;?>" class="">
<input type="hidden" name="z_bcode_idx2" id="z_bcode_idx2" value="<?php echo $b_code;?>" class="">
<input type="hidden" name="z_tcnt" id="z_tcnt" value="" class="">
<input type="hidden" id="c_id" name="c_id">
<input type="hidden" id="u_code" name="u_code">
<input type="hidden" id="j_code" name="j_code">
<input type="hidden" id="d_code" name="d_code">
<input type="hidden" id="idx" name="idx">
<input type="hidden" id="z_code" name="z_code">
<input type="hidden" id="n_type" name="n_type">
<input type="hidden" id="cc_id" name="cc_id" value="<?php echo $cc_id;?>">
<input type="hidden" id="s_codex" name="s_codex" value="<?php echo $s_codex;?>">
<input type="hidden" id="g_codex" name="g_codex" value="<?php echo $g_codex;?>">
<input type="hidden" id="u_codex" name="u_codex" value="<?php echo $d_codex;?>">
<input type="hidden" id="z_scode_idx3" name="z_scode_idx3">
<input type="hidden" id="z_gcode_idx3" name="z_gcode_idx3" value="<?php echo $z_codex;?>">
<input type="hidden" id="z_jcode" name="z_jcode" value="<?php echo $j_code;?>">        


<input type="hidden" id="tscode" name="tscode" value="<?php echo $s_codex;?>">
<input type="hidden" id="tgcode" name="tgcode" value="<?php echo $g_codex;?>">
<input type="hidden" id="tucode" name="tucode" value="<?php echo $d_codex;?>">
<input type="hidden" id="tzcode" name="tzcode" value="<?php echo $j_code;?>">
<input type="hidden" id="upjang" name="upjang" value="">
<input type="hidden" id="ecode" name="ecode" value="">
<input type="hidden" id="tcode" name="tcode" value="<?php echo $s_code;?>">
<input type="hidden" id="xcode" name="xcode">
<input type="hidden" id="gtitle" name="gtitle">





<input type="hidden" id="sales_code" name="sales_code">
<input type="hidden" id="event_name" name="event_name">
<input type="hidden" id="tg_code" name="tg_code">
<input type="hidden" id="ts_code" name="ts_code">
<input type="hidden" id="tb_code" name="tb_code">
<input type="hidden" id="ntitle" name="ntitle">
<input type="hidden" id="cx_id" name="cx_id">


<div class="wrap">
 <div class="nc_program nc_program--nothing">
            <div class="nc_separator"></div>
<div class="search_box2">
            <div class="nc_program_select">
                <div class="nc_program_select_pro_wrap">
                    <div class="nc_program_select_pro nc_selectric_area first">
                        <label for="" class="sr_only">센터</label>

						<select name="center_id" id="center_id" class="nc_selectric programcode">
                            <option value="0"<?php if($center_id=='0'){?>selected<?php }?> >센터</option>
                            
                                <option <?php if($center_id=='01'){?>selected<?php }?> value="01"  data-text="스포츠센터" >스포츠센터</option>
                                <option <?php if($center_id=='02'){?>selected<?php }?> value="02"  data-text="문화센터" >문화센터</option>

                            

                                                    </select>
                    </div><!-- .nc_program_select_pro -->
                    <div class="nc_program_select_pro nc_selectric_area two">
                        <label for="" class="sr_only">업장</label>
            
						<select name="s_code" id="s_code" class="nc_selectric programcode">
                            <option value="0" selected>업장</option>
                            
                            
                        </select>
                    </div><!-- .nc_program_select_pro -->
                <div class="nc_program_select_pro nc_selectric_area three">
                        <label for="" class="sr_only">종목</label>

						<select name="g_code" id="g_code" class="nc_selectric programcode">
                            <option value="0" selected>종목</option>
                            
                            
                        </select>
                    </div><!-- .nc_program_select_pro -->
 <div class="nc_program_select_pro nc_selectric_area four">
                        <label for="" class="sr_only">분류</label>

						<select name="b_code" id="b_code" class="nc_selectric programcode">
                            <option value="0" selected>분류</option>
                            
                            
                        </select>
                    </div><!-- .nc_program_select_pro -->

                </div><!-- .nc_program_select_pro_wrap -->
                <a class="nc_program_select-refresh active" href="#"><span class="">초기화</span></a>
            </div>
</div>
            <div class="nc_separator"></div>
            <div class="nc_program_sorting">
                <div class="nc_program_count"><span class="nc_program_num">0</span>개 프로그램</div>
                <div class="nc_program_util">
                    <a class="nc_program_search nc-open-inline-search" href="#nc-nav-search-form-01"><span class="sr_only">검색하기</span></a>
                    <a class="nc_program_view nc_program_view--card" href="#"  style="display:none;"><span class="sr_only">카드형</span></a>
                   <!--
					<div class="nc_program_sort-mob nc_selectric_area">
                        <label for="" class="sr_only">노출될 리스트의 정렬방식을 선택해주세요</label>
                        <select name="sort" id="" class="nc_selectric">
                            <option value="">등록순</option>
                            <option value="date" >마감일순 </option>
                            <option value="view"  selected='selected'>조회순</option>
                        </select>
                    </div>
					-->
                </div>

                <div id="nc-nav-search-form-01" class="nc-nav-search__form" style="display: none;">
                    <div class="nc-nav-search__field">
                        <label class="nc-nav-search__label">
                            <input class="nc-nav-search__input nc-form__field" name="search" id="search"  type="text" value="" placeholder="검색어를 입력해주세요" autocomplete="off">
                        </label>
                        <button class="nc-nav-search__submit" type="submit" ><span class="sr_only">검색</span></button>
                        <button class="nc-nav-search__close" type="button" ><span class="sr_only">닫기</span></button>
                    </div>
                </div>

            </div>
			<b id="etxt"></b>

<div id="resetP">


<?php




if($center_id =='' || $center_id=='0' ){

$total_page = '1'; // 전체 페이지 계산




?>
            
       <div class="noResult">
					           <p class="tit">현재 등록된 강좌가 없습니다.</p>
										</div>

<?php }else{



$resultc = sql_query($sqlb);
$ct_countx =  sql_num_rows($resultc);
$resultc2 = sql_query($sqlb);






if ($ct_countx=='' || $ct_countx=='0'){
?>


       <div class="noResult">
					           <p class="tit">현재 등록된 강좌가 없습니다.</p>
										</div>

<?php }else{

$ttcount = sql_query($sqlc);

$totalcount =  sql_num_rows($ttcount);

if(is_mobile()=='1'){
$pcount = '5';
}else{
$pcount = '10';
	}


$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
$num = $totalcount - (($page-1)*$rows);



?>



<div class="tableWrap mgb15"  id="nc_program_list">

<div>

<div class="record_inner">
    <div class="record_rank">
        <div class="title">
            <b>강좌명</b>
        </div>
        <ul class="rank_list2" id="rank">
												
<?php for($i=1; $row=sql_fetch_array($resultc); $i++) { ?>													
																							
<li class="best">
    <div>
  
        
        <div class="wrap"><a href="#!" class="link"><span class="team"><?php echo $center_txt;?></span><span class="player"><?php echo $row['Sales_Item_Name'];?></span></a></div>
        
    </div>
    </li>

<?php }?>
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
    <th scope="col" class=""><a href="#"  class="sort"><span>업장</span></a></th>
	<th scope="col" class=""><a href="#"  class="sort"><span>종목</span></a></th>
    <th scope="col" class=""><a href="#"  class="sort"><span>강사명</span></a></th>
    
    <th scope="col"><a href="#"  class="sort"><span>교육대상</span></a></th>
    
    <th scope="col"><a href="#" class="sort"><span>교육시간</span></a></th>
    
    <th scope="col" colspan="2"><a href="#" class="sort"><span>수강료(원)</span></a></th>
    
    <th scope="col"><a href="#"  class="sort"><span>정원(명)</span></a></th>
    
    <th scope="col"><a href="#" class="sort"><span>상태</span></a></th>
    
    <th scope="col" ><a href="#" class="sort"><span>신청</span></a></th>
    
    
    
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
                                                                  //$lesson_user_name=$row2['Lesson_User_Name'];

                                                                  if($lesson_user_name==''){
                                                                   
																   $lesson_user_name='-';

																  }else{
                                                                  
																  $lesson_user_name=$row2['Lesson_User_Name'];

                                                                  }



																  $place_name=$row2['Place_Name'];






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
$s_txt="<span class='rbb'>신청</span>";	
$s_txt2="<span class='rbw'>접수가능</span>";	
$s_people="<span>".$row2['Current_Person']."/".$row2['Capacity_On_OffLine'].	"</span>";	
$s_tag = 'Y';
}else{
$s_txt="<span class='rbx'>마감</span>";
$s_txt2="<span class='rbx'>접수불가</span>";	
$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
$s_tag = 'N';
}		


$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함 일
/*echo $total_count2;*/


$toymd=$thisyear."".$thismonth."".$today;
$toyhm=date('Hi',time());

$totmd=$toymd."".$toyhm;

														?>	
														




  <tr>
           <td class=""><?php echo $place_name;?></td>
		<td class=""><?php echo $row2['Event_Name'];?></td>
        <td class=""><span><?php echo $lesson_user_name;?></span></td>
        
        <td><span>전체</span></td>
        
        <td><span><?php echo $row2['Week_Name'];?><br><?php echo $start_time1;?>:<?php echo $start_time2;?>~<?php echo $end_time1;?>:<?php echo $end_time2;?></span></td>
        
        <td><span><?php echo $row2['Event_Name'];?></span></td>
        
        <td class="align_R"><span class='price'><?php echo number_format($row2['Unit_Price']);?></span></td>
        
        <td><?php echo $s_people;?></td>
        
        <td><a href="#!"><?php echo $s_txt2;?></a></td>

        <td>
   
		<a href="#!" onclick="goLink('<?php echo $row2['Sales_Code'];?>','<?php echo urlencode($row2['Event_Name']);?>','<?php echo $g_code;?>','<?php echo $s_code;?>','<?php echo $d_code;?>','<?php echo $center_id;?>','<?php echo $page;?>','<?php echo urlencode($row2['Sales_Item_Name']);?>','<?php echo $row2['Center_ID'];?>')"><?php echo $s_txt;?></a>
      
    </td>
	</tr>
												<?php }?>

</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
								<p class="note">※ 가로로 스크롤 하여 보실 수 있습니다.</p>
								
							</div>

<?php
echo get_paging_ca($pcount, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&page=');
?>



</div></div></div>



    </div><!-- .wrap -->




<?php } ?>



<?php } ?>
</div>
</div>




</form>














</div>
</main>
<script src="<?php echo NC_JS_URL; ?>/scroller.js"></script>


<script type="text/javascript">

// ================================================================================================
// 링크
// ================================================================================================
function goLink(sales_code,event_name,g_code,s_code,b_code,center_id,page,ntitle, cx_id){
  
  var frm = document.getElementById('program_form');


frm.sales_code.value=sales_code;
frm.event_name.value=event_name;
frm.tg_code.value=g_code;
frm.ts_code.value=s_code;
frm.tb_code.value=b_code;
frm.center_id.value=center_id;
frm.page.value=page;
frm.ntitle.value=ntitle;
frm.cx_id.value=cx_id;
frm.n_type.value="program";
frm.action="<?php echo NC_CENTER_URL;?>/pro_view.php"


frm.submit();

}


</script>

