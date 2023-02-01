<?php
if(!defined('_SAMSUNG_')) exit;


?>
<main id="main" class="main_container status">

<div id="top_bg_join" style="display:none;">
<div class="_wrap">
<div class="top_title">
            <h2></h2>
</div>
</div>
</div>
<div class="top_area" style="display:none;">
<div class="wrap">
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span><?php echo $center_txt;?></span></li><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>접수현황</span></li></ul>
</div>
</div>

<div class="wrap">

<div id="sidebar">
				<div class="stit">
						<p>CENTER</p>
						<h2>접수현황</h2>
					</div>
					<div id="sidemenu" class="sidebar">
					
	<div class="side_menu">
		<nav class="menu init">
			<h2 class="skip">좌측 메뉴</h2>
			<div class="depth depth1">
				<ul class="depth_list depth1_list">
				<li class="depth_item depth1_item <?php if($center_id=='01'){?>active<?php }?>">
		            		<a href="<?php echo NC_CENTER_URL; ?>/status.php?center_id=01" class="depth_text depth1_text" target="_self"  >스포츠센터</a>
													
							
							
		        </li>	
	<li class="depth_item depth1_item <?php if($center_id=='02'){?>active<?php }?>">
		            		<a href="<?php echo NC_CENTER_URL; ?>/status.php?center_id=02" class="depth_text depth1_text" target="_self"  >문화센터</a>
													
							
							
		        </li>	
		   <!--
				<li class="depth_item depth1_item">
		            		<a href="#!" class="depth_text depth1_text" target="_self"  >문화센터</a>
							<div class="depth depth2">
		            			<ul class="depth_list depth2_list">
			            						<li class="depth_item depth2_item">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >문화센터</a>
			            						</li>
			            						<li class="depth_item depth2_item ">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >문화센터</a>
			            						</li>	
												<li class="depth_item depth2_item ">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >문화센터</a>
			            						</li>	
		            					</ul>
		            		</div>
		        </li>
			   -->
		        </ul>
			</div>
		</nav>
	</div>









					</div>
				

		
				
	
		
				
			</div>

<?php




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
$Tmonth = $row_1['Tmonth'];
/*
echo $c_id;
echo $event_code;
echo $c_id;
echo $Tmonth;
*/

//$sql_search = " AND Sales_Item_Name='{$search_txt}' ";




$sql="SELECT DISTINCT c.Detail_Code
  FROM TB_Center_Event a INNER JOIN
       TB_SaleItem     b ON a.Center_ID = b.Center_ID AND a.Event_Code = b.Event_Code INNER JOIN
       TB_Code_D       c ON a.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' INNER JOIN
       TB_SaleItem_Price d ON b.Center_ID = d.Center_ID AND b.Sales_Code = d.Sales_Code
 WHERE b.Center_ID      = '01'
 AND b.Sales_Place_Code = '$center_id'
 AND b.Sales_Division = '003'
 AND b.Event_Code    <> '999'
 AND b.OnLine_YN      = 'Y'
 AND d.OnLine_YN      = 'Y'
 AND d.Apply_Date         = (SELECT MAX(Apply_Date) 
		                       FROM TB_SaleItem_Price
							  WHERE Center_ID = b.Center_ID
							    AND Apply_Date <= F_DATE_TIME('YYYYMMDD')
							)	
 AND b.State          = '001'";



$result = sql_query($sql);

$row_count =  sql_num_rows($result);




?>
<style>



.content_top_tit.nomgb {
    font-size: 0;
    margin-top: 24px;
    margin-bottom: 0px;
    border-bottom: 0px solid #222;
    padding-bottom: 10px;
}



.content_top_tit {font-size: 0;
    margin-top: 24px;
    margin-bottom: 24px;
    border-bottom: 3px solid #222;
    padding-bottom: 10px;}
.content_top_tit > span {display: inline-block;padding: 0 10px;vertical-align: top;position: relative;font-size: 14px;letter-spacing: -0.01em;color: #666;}
.content_top_tit > span:first-child {padding-left: 0;}
.content_top_tit > span:last-child {padding-right: 0;float: right;font-weight:600;}
.content_top_tit > span:before {content: '';display: block;width: 1px;height: 10px;position: absolute;left: 0;top: 50%;margin-top: -5px;background: #aaa;}
.content_top_tit > span:first-child:before {display: none;}
.content_top_tit > span:last-child:before {display: none;}
.content_top_tit > span > b {padding-right: 4px;font-style: normal;font-weight:600;}
.content_top_tit > span > i {font-style: normal;color:#27b4c5;    }
.content_top_tit > span > i.color-red{font-style: normal;color:#e60012; }




.lecture_form_tit {
    font-size: 18px;
    color: #111;
    letter-spacing: -0.01em;
    display: inline-block;
    vertical-align: middle;
    width: 16%;
    margin-top: -2px;

}


.lecture_form_item {
    border-bottom: 0px solid #111;
    margin-bottom: 29px;
    font-size: 0;
    -webkit-transition: border .3s;
    transition: border .3s;
}

.lecture_form_item.lecture_form_area .lecture_form_tit {
    font-size: 18px;
    color: #111;
    letter-spacing: -0.01em;
    display: inline-block;
    vertical-align: middle;
    width: 16%;
    margin-top: 12px;
	    margin-bottom: 12px;
}

.lecture_form_item_etc {
    /*border-bottom: 0px solid #111;
    margin-bottom: 29px;*/
	  display: inline-block;

}


.vprogress-bar-holder{
        height: 100%;
        border:0px solid #ccc;
        padding: 0;
         -webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		width: 20px;
		background: #f6f6f6; border-radius: 13px;
      }
      .vprogress-bar{
        width:20px;
        text-align: right;
        background:#00c300;
        height: 0px;
        padding: 0px;
		-webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		    float: left;
      }
 .tableR table tbody tr td .vprogress-bar span{
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
    letter-spacing: 0.04em;
      }

 .tableR table tbody tr td  .end .vprogress-bar span{
 color:#fff;
height: 40px;
}
.end .vprogress-bar {
    background: #e60012;
}




.record_table td.last_td{

    background: #fff;
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
		    float: left;    background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;
    background-size: 1000%;
    box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
      }
 .tableR table tbody tr td .progress-bar span{
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
      .progress-bar.end{
        height:18px;
        text-align: right;
        background:#27b4c5;
        width: 0px;
        padding: 0px;
		-webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		    float: left;    background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;
    background-size: 1000%;
    box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
      }




.tableR table tbody tr td .progress-bar-holder span.t_left{
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
	  
	 .tableR table tbody tr td .progress-bar-holder span.t_right{
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
	  
 .tableR table tbody tr td  .end .progress-bar span{
 color:#fff;

}
.end .progress-bar {
    background: #e60012;
}

.tableWrap{position:relative;}

.tableWrap .scrollDiv{overflow-x:auto;}
.tableWrap .scrollDiv::-webkit-scrollbar{height:7px; background:#f0f0f0;}
.tableWrap .scrollDiv::-webkit-scrollbar-thumb{background:#a9a9a9; border-radius:0;}

.tableWrap.management table tbody  tr:first-child th {
    padding: 20px;
    background:#f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size: 1.5rem;
	vertical-align: middle;border-top: 0px solid #dae1e6;text-align: center;
}

.tableWrap.management table tbody th {
    padding: 20px;
    background: #f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size: 1.5rem;
	vertical-align: middle;border-top: 1px solid #dae1e6;text-align: center;
}
.tableWrap .taL {
    text-align: left !important;
	    line-height: 1.6;
  font-weight:500;font-size: 1.5rem;padding: 10px;
}


.tableR{border-top:3px solid #006ecd;}
.tableR.type2{border-top:1px solid #ddd}
.tableR table{width:100%; table-layout:fixed; /*border-top:3px solid #000;*/    border-collapse: collapse;}
.tableR table thead tr{border-bottom:1px solid #dae1e6;}
.tableR table thead tr th{font-weight:500; color:#333; font-size:13px; padding:20px 0; border-right:1px solid #dae1e6; background:#f7f9fa;text-align:center;vertical-align: middle;}

.tableR table{
    min-height: auto;
}

.tableR table thead tr th.wht{font-weight:500; color:#333; font-size:13px; padding:20px 0; border-right:1px solid #dae1e6; background:#fff;text-align:center;vertical-align: middle;}


.tableR table thead tr th:last-child{border-right:none;    border-left: 1px solid #dae1e6;}
.tableR table thead tr th p{margin-top:5px; font-weight:500; font-size:18px;}
.tableR table tbody{border-bottom:1px solid #dae1e6;}
.tableR table tbody tr.thead{background:#f7f7f7;}
.tableR table tbody tr.thead td{padding:20px 0; font-weight:500; color:#333; font-size:20px; border-right:1px solid #dae1e6;}
.tableR table tbody tr.tfoot{background:#fbfbfb; background:#fbfbfb;}
.tableR table tbody tr.tfoot td{font-weight:500; color:#333; font-size:14px;}
.tableR table tbody tr.blueBg{background:#ecfaf3;}
.tableR table tbody tr td{padding:20px 8px; text-align:center; font-size:14px; line-height:1.3; border-right:1px solid #dae1e6; border-top:1px solid #dae1e6;font-weight:500;vertical-align: middle;    color: #555;}


.tableR table tbody tr td.price{padding:5px 8px; text-align:right; font-size:14px; line-height:1.3; border-right:1px solid #dae1e6; border-top:1px solid #dae1e6;font-weight:500;vertical-align: middle;}



.tableR table tbody tr td:first-child{padding:6px 10px; text-align:center; font-size:14px; line-height:1.3; border-right:1px solid #dae1e6; border-top:1px solid #dae1e6;font-weight:500;vertical-align: middle;}
.tableR table tbody tr:first-child td{border-top:none;}
.tableR table tbody tr:last-child td{border-bottom:1px solid #dae1e6;}
.tableR table tbody tr td.nsB{font-weight:500;}
.tableR table tbody tr td .txt_right{text-align:right;}
.tableR table tbody tr td .txt_left{text-align:left;}
.tableR table tbody tr td.noBt{border-top:none;}
.tableR table tbody tr td.smTable p{font-size:12px;}
.tableR table tbody tr td p{font-weight:500; font-size:12px;}
.tableR table tbody tr td p.nsEB{font-weight:500; font-size:12px;}
.tableR table tbody tr td span{font-weight:500;}
.tableR table tbody tr td .downArea{overflow:hidden;}
.tableR table tbody tr td .downArea .downTit{float:left; line-height:40px;}
.tableR table tbody tr td .downArea a{float:right;}
.tableR table tbody tr td:last-child{border-right:none;    border-left: 1px solid #dae1e6;    color: #555;}
.tableR table tbody tr td.strongBd{border-bottom:1px solid #ccc;}
.tableR table tbody tr td.thead{font-weight:500; color:#333; font-size:12px; background:#f7f7f7;}
.tableR table tfoot tr td{padding:20px 20px; font-weight:500; color:#333; font-size:12px; text-align:center; line-height:30px; border-right:1px solid #dae1e6; border-bottom:1px solid #ccc; background:#fbfbfb;}
.tableR .tableTxt{margin-top:27px; font-size:22px;}




.tableR table tbody tr td.txt_right{text-align:right;}
.tableR table tbody tr td.txt_left{text-align:left;}
legend, caption, hr {
    display: none;
}
.grayBox {
    margin-top: 50px;
    padding: 40px 10px 40px 50px;
    background: #f8f8f8;
    position: relative; font-size: 16px;font-weight:500;
}
.grayBox:before {
    content: '\E83F';
    top: 42%;
    font-size: 19px;
    font-family: 'nc-font';
    left: 24px;
    position: absolute;
}
.grayBox .txt {
    line-height: 30px;
}

.guide_wrap {
    margin-top: 0px;
    width: 100%;
    padding: 15px 0px;
}
.record_table table {
    width: 100%;
    margin-top: 0px;
    border-right: 1px solid #fff;
    border-spacing: 0;
    border-collapse: separate;
}
.rank_list2:last-child li{
    height: 110px;
}
.record_table td.last_td {
    background: #fff;
	 height: 40px;padding: 0px 8px;
}
.rank_list2:last-child li > div {
    height: 100%;
}
.progress-bar-holder span.t_left {
    /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: #fff;
    /* height: 15px; */
    line-height: 1.8;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    float: left;
    left: 8px;
    float: left;
    right: auto;
    letter-spacing: 0.04em;

}

.progress-bar-holder span.t_right {
    /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height: 1.8;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    float: left;
    right: 8px;
    left: auto;
    float: right;
    letter-spacing: 0.04em;
}
@media only screen and (max-width: 768px){

.tableWrap.management table tbody tr:first-child th {
    font-size: 1.3rem;

}
.scrollDiv .tableR {
    width: 855px;
    /* width: 200%; */
    padding-bottom: 10px;
}
.tableWrap.management table tbody th {

    font-size: 1.3rem;

}
.tableWrap .taL {
    text-align: left !important;
    line-height: 1.6;
    font-weight: 500;
    font-size: 1.3rem;
}
 .grayBox {
    margin-top: 40px;
    padding: 25px 6% 25px;
    background-position: center 25px;
    background-size: 40px;
}
.grayBox .txt {
    font-size: 13px;
    line-height: 19px;margin-left: 30px;
}
.grayBox:before {
    top: 37%;

}
}
</style>


<div id="contents">
<div id="cont_head">
		<h2><?php echo $center_txt;?> 접수현황</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>" class="home">Home</a></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span><?php echo $center_txt;?></span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>접수현황</span></li></ul>

		</div>				
	</div>
<div class="article mypage">

            <div class="article_body">
             

<?php









if($row_count==0){
?>

<?php }else{	
?>	

					
						


	<?php



$sql="SELECT DISTINCT c.Detail_Code as Event_Code, c.Detail_Name as Event_Name, b.Class_Code
  FROM TB_Center_Event a INNER JOIN
       TB_SaleItem     b ON a.Center_ID = b.Center_ID AND a.Event_Code = b.Event_Code INNER JOIN
       TB_Code_D       c ON a.Event_Code = c.Detail_Code AND c.Common_Code = 'H02' INNER JOIN
       TB_SaleItem_Price d ON b.Center_ID = d.Center_ID AND b.Sales_Code = d.Sales_Code
 WHERE b.Center_ID      = '01'
 AND b.Sales_Place_Code = '$center_id'
 AND b.Sales_Division = '003'
 AND b.Event_Code    <> '999'
 AND b.OnLine_YN      = 'Y'
 AND d.OnLine_YN      = 'Y'
 AND d.Apply_Date         = (SELECT MAX(Apply_Date) 
		                       FROM TB_SaleItem_Price
							  WHERE Center_ID = b.Center_ID
							    AND Apply_Date <= F_DATE_TIME('YYYYMMDD')
							)	
 AND b.State          = '001'";

$result = sql_query($sql);

$count = 0;
	    for($i=0; $row=sql_fetch_array($result); $i++) {
			

			$event_code=$row['Event_Code'];
		    $class_code=$row['Class_Code'];
	
          
			
		$sqlb = "SELECT Class_Name
       FROM tb_eventclass 
       WHERE Center_ID      = '01'
       AND Event_Code     = $event_code
	   AND Class_Code     = $class_code
		   AND State          = '001'"; 
	   
	    $cname = sql_fetch($sqlb);
	
	
	$ttot_people=0;	
	$tetc_people=0;
    $tcur_people=0;		
$sqlc="SELECT  a.Sales_Item_Name
          FROM TB_SaleItem       a INNER JOIN
          TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code
         WHERE a.Center_ID          = '01'
         AND a.Event_Code         = '$event_code'
		 AND a.Class_Code         = '$class_code'
		 AND a.Online_Yn          = 'Y'
		 AND b.Online_Yn          = 'Y'
	     AND a.Sales_Place_Code   = '$center_id'
		 AND b.Apply_Date         = (SELECT MAX(Apply_Date) 
		                               FROM TB_SaleItem_Price
									  WHERE Center_ID = a.Center_ID
									    AND Apply_Date <= F_DATE_TIME('YYYYMMDD')
									)	
		 AND a.State              = '001' group by Sales_Item_Name order by Class_Code asc";
  

        

$resultc = sql_query($sqlc);

$ct_count2 =  sql_num_rows($resultc);

?>	
<div class="content_top_tit nomgb" id="content_top_tit">
                                <span><b><?php echo $row['Event_Name'];?></b></span>
								<span><b><?php echo $cname['Class_Name'];?></b></span>
                                <span><i lang="en"><?php echo $ct_count2;?></i>과목</span>
                            </div>
<!--
<div class="tableWrap mgb15" >
<div class="scrollDiv">
<div class="tableR">
<table>
          <caption>강좌리스트</caption>

          <colgroup>
            <col width="25%">
            <col width="10%">
            <col width="8%">
            <col width="8%">
            <col width="8%">
            <col width="10%">
            <col width="10%">
            <col width="14%">
          </colgroup>

          <thead>
          <tr>

            <th>강좌명</th>
            <th>정원</th>
            <th>신청완료</th>
            <th>결제대기</th>
            <th>잔여인원</th>
            <th>예약율</th>
            <th>교육요일</th>
            <th>시간</th>
          </tr>
          </thead>

         <tbody>
-->
<div class="record_inner">
    <div class="record_rank">
        <div class="title">
            <b>강좌명</b>
        </div>
      
  <?php

//$ct_count2 =  sql_num_rows($resultc);
	    for($k=0; $row2=sql_fetch_array($resultc); $k++) {
			$Sales_Item_Name=$row2['Sales_Item_Name'];

?>
    <ul class="rank_list2" id="rank">
												
											
																							
<li class="best">
    <div>      
        <div class="wrap"><a href="#!" class="link"><span class="team"><?php echo $center_txt;?></span><span class="player"><?php echo $Sales_Item_Name;?></span></a></div>
      </div>
    </li>

				</ul>
   <?php

		}
		
		?>
		  <ul class="rank_list2" id="rank">
<li class="best">
    <div>      
        <div class="wrap"><a href="#!" class="link"><span class="player">강습반 소계(<?php echo $ct_count2;?>과목)</span></a></div>
      </div>
    </li>

				</ul>
    </div>

<script type="text/javascript">

	$(document).ready(function () {

defaultNewIscroll("#record_scroll_<?php echo $i;?>", horizontalScrollOpt, { preventVerticalScroll: true });
    

	});

</script>

  <div id="record_scroll_<?php echo $i;?>" class="table_scroll new_scroll" style="touch-action: pan-y pinch-zoom;">
        <div class="scroller">
            <div class="record_table">
                <table>
                    <caption>강좌리스트</caption>
                    <colgroup>
            <col width="8%">
			 <col width="8%">
            <col width="8%">
            <col width="12%">
            <col width="18%">
            <col width="8%">
            <col width="*">
          </colgroup>
					<thead><tr id="record_header">
    <th scope="col" class=""><a href="#"  class="sort"><span>정원</span></a></th>
	<th scope="col" class=""><a href="#"  class="sort"><span>신청완료</span></a></th>
    <th scope="col" class=""><a href="#"  class="sort"><span>결제대기</span></a></th>
    
    <th scope="col"><a href="#"  class="sort"><span>잔여인원</span></a></th>
    
    <th scope="col"><a href="#" class="sort"><span>예약율</span></a></th>
    
    <th scope="col"><a href="#" class="sort"><span>교육요일</span></a></th>
    
    <th scope="col"><a href="#"  class="sort"><span>시간</span></a></th>
     
    
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


		 
<?php

$ttot_people=0;	
	$tetc_people=0;
    $tcur_people=0;		
	$td_people=0;
$sqlc="SELECT  a.Sales_Item_Name,a.Sales_Code, a.Start_Time, a.End_Time, b.Unit_Price, a.Class_Code,
       a.Capacity, f_week_name(a.Use_Week) as Week_Name
          FROM TB_SaleItem       a INNER JOIN
          TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code
         WHERE a.Center_ID          = '01'
   
		 AND a.Event_Code         = '$event_code'
		 AND a.Class_Code         = '$class_code'
		 AND a.Online_Yn          = 'Y'
		 AND b.Online_Yn          = 'Y'
         AND a.Sales_Place_Code   = '$center_id'
		 AND b.Apply_Date         = (SELECT MAX(Apply_Date) 
		                               FROM TB_SaleItem_Price
									  WHERE Center_ID = a.Center_ID
									    AND Apply_Date <= F_DATE_TIME('YYYYMMDD')
									)	
		 AND a.State              = '001' group by Sales_Item_Name order by Class_Code asc";
  
        
$resultc = sql_query($sqlc);

//$ct_count2 =  sql_num_rows($resultc);



	    for($k=0; $row2=sql_fetch_array($resultc); $k++) {
			$Sales_Item_Name=$row2['Sales_Item_Name'];
			$Sales_Code=$row2['Sales_Code'];

          $ct_count2=$row2;

	


$sqlc="SELECT Capacity_On_OffLine,
		(SELECT COUNT(*)
		   FROM TB_Basket_Program
		  WHERE Center_ID = a.Center_ID
			  AND Sales_Division = '003'
			  AND Sales_Code = a.Sales_Code
			  AND '$Tmonth' BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6)
			  AND State in ('001')) as d_person,
		(SELECT COUNT(*) 
          FROM TB_Transaction
         WHERE Center_ID        = a.Center_ID
           AND Sales_Division   = '003'
           AND Sales_Code       = a.Sales_Code
           AND End_Date         >= DATE_FORMAT(SYSDATE(), '%Y%m%d')
           AND '$Tmonth' BETWEEN LEFT(Start_Date, 6) AND LEFT(End_Date, 6)
           AND Transition_State = '001'
           AND Trs_Type         = '001'
           AND State            = '001') as Current_Person
  FROM TB_SaleItem       a INNER JOIN
       TB_SaleItem_Price b ON a.Center_ID = b.Center_ID AND a.Sales_Code = b.Sales_Code LEFT OUTER JOIN
        TB_Code_D         d ON IFNULL(a.Lesson_Place, '000') = d.Detail_Code AND d.Common_Code = 'V30'
   WHERE a.Center_ID  ='01'
   AND a.Sales_Code = '$Sales_Code'
   AND b.Apply_Date         = (SELECT MAX(Apply_Date) 
		                         FROM TB_SaleItem_Price
							    WHERE Center_ID = a.Center_ID
							     AND Apply_Date <= F_DATE_TIME('YYYYMMDD')
							  )	
			 AND a.State              = '001' group by Sales_Item_Name order by Class_Code asc";


$resultr = sql_fetch($sqlc);

$total_people2=$row2['Capacity'];

$total_people=$resultr['Capacity_On_OffLine'];
$cur_people=$resultr['Current_Person'];
$d_people=$resultr['d_person'];
if($total_people2 == 0){
	$total_people2 = 1;
}


if ($percent_inwon == 0){
$percent_inwon="0";
}else{
	
	
}



$etc_people=$total_people2-$cur_people-$d_people;

if ($etc_people <= 0){
	$etc_people = 0;
	$cur_people = $total_people2;
}


$percent_inwon = $cur_people / $total_people2 * 100;
$percent_inwon = round($percent_inwon, 1);
$percent_inwon_t = round($percent_inwon, 1);
			
		$ttot_people+=$total_people2;	
		$tetc_people+=$etc_people;
        $tcur_people+=$cur_people;	
        $td_people+=$d_people;		


$percent_inwon_total = $tcur_people / $ttot_people * 100;
$percent_inwon_total = round($percent_inwon_total, 1);

		?>	
		
	
		<tr id='progress-bar-holder'>
            <!--<td class="txt_left"><a href="./pro_view2.php?c_id=<?php echo $c_id;?>&class_code=<?php echo $row2['Class_Code'];?>&sales_code=<?php echo $Sales_Code;?>" title="<?php echo $row2['Sales_Item_Name'];?>"><?php echo $row2['Sales_Item_Name'];?></a></td>-->
            <td><?php echo $total_people2;?></td>
			<td><?php echo $cur_people;?></td>
            <td><?php echo $d_people;?></td>
            <td><?php echo $etc_people;?></td>
            <td><?php echo $percent_inwon;?>%</td>
            <td><?php echo $row2['Week_Name'];?></td>
            <td><?php echo substr($row2['Start_Time'],0,2);?>:<?php echo substr($row2['Start_Time'],2,4);?>~<?php echo substr($row2['End_Time'],0,2);?>:<?php echo substr($row2['End_Time'],2,4);?></td>
          </tr>
<?php }?>
<tr class="tfoot" >
					
								<td>
									<?php echo $ttot_people;?>
								</td>
								
								<td>
									<?php echo $tcur_people;?>
								</td>
								<td>
									<?php echo $td_people;?>
								</td>
								<td>
									<?php echo $tetc_people;?>
								</td>
								<td>
									<?php if($percent_inwon_total>100){ ?>100%<?php } else { ?><?php echo $percent_inwon_total;?>%<?php }?>
								</td>
								<td colspan='2'>
									-
								</td>
								
							</tr>	
							<tr>
							<td colspan='7' class="last_td">
							 <span class=""><div class='progress-bar-holder' >
														<!-- date-value가 10% 이하, 즉 1% ~ 10% 사이면 data-value="10%" 로 맞춰주세요. 라운딩된 프로그래스바라 모양이 안나오니...-->
																									
														<div  class='progress-bar' data-value="<?php echo $percent_inwon_total;?>%">
															<span class='t_left' style='color:<?php if($percent_inwon_total<10){ ?>#000<?php } else { ?>#fff<?php }?>;'>(<?php if($tetc_people<0){ ?><?php echo $ttot_people;?><?php } else { ?><?php echo $tcur_people;?><?php }?>/<?php echo $ttot_people;?>)</span><span class='t_right' style='color:<?php if($percent_inwon_total==100 || $percent_inwon_total>100){ ?>#fff<?php } else { ?>#000<?php }?>;'><?php if($percent_inwon_total>100){ ?>100%<?php } else { ?><?php echo $percent_inwon_total;?>%<?php }?></span>
														</div>
													</div></span>
							</td>
							</tr>
	
       </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php }?>	


			
					
	
	
<?php }?>

                 

</div>
            </div>
        </div>



<script src="<?php echo NC_JS_URL; ?>/scroller.js"></script>

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
			    $this.addClass('end');
            
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

</div>
</div>
</div>
</main>
