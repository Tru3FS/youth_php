<?php
if(!defined('_SAMSUNG_')) exit;

echo '<link rel="stylesheet" href="'.run_replace('head_css_url', '/s_css/mypage_main.css?ver='.NC_CSS_VER).'">'.PHP_EOL;

$redirect_to=(isset($_REQUEST["redirect_to"]) && $_REQUEST["redirect_to"]) ? $_REQUEST["redirect_to"] : NULL;
$mb_pwd=(isset($_REQUEST["member_pwd"]) && $_REQUEST["member_pwd"]) ? $_REQUEST["member_pwd"] : NULL;
$mb_id=(isset($_REQUEST["member_id"]) && $_REQUEST["member_id"]) ? $_REQUEST["member_id"] : NULL;

$center_id = get_session("center_id");


if($mb_id==''  && $mb_pwd==''){

$errotxt="아이디 또는 휴대폰 번호를 입력하세요.";

}elseif($mb_id!='' && $mb_pwd==''){

$errotxt="비밀번호를 입력하세요.";
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
.mypage .my_lecture_cont span.one, .mypage_lecture .my_lecture_cont span.two {
    display: inline-block;
}
.mypage .my_lecture_cont span {
    display:  inline-block;
    margin-top: 3px;
    margin-right: 8px;
    font-size: 13px;
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
    padding: 1px 2px;
    border: 1px solid #d8e2e5;
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
    display: inline-block;margin-right: 8px;
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
								<a href="javascript:;">마이페이지</a>
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
								<a href="javascript:;">내강좌</a>
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

<?php



$m_code=get_session('m_code');

$sqlcnt = "SELECT count(*) as cnt FROM TB_Basket_Program  
                 WHERE Sales_Division = '003'
	   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'
AND State ='001' 
AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END 
ORDER BY IDX DESC ";
   
  $rowc = sql_fetch($sqlcnt);
 $total_countd= $rowc['cnt'];


 $sqlcnt2 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division = '003'
   AND State    IN ('002', '005')
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row2 = sql_fetch($sqlcnt2);
 $total_counte= $row2['cnt'];


 $sqlcnt3 = "SELECT count(*) as cnt FROM TB_Basket_Program  
     WHERE Sales_Division = '003'
   AND State     = '003'
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row3 = sql_fetch($sqlcnt3);
 $total_countc= $row3['cnt'];


 $sqlcnt4 = "SELECT count(*) as cnt FROM TB_Basket_Program  
     WHERE Sales_Division = '003'
   AND State     = '009'
   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'";
   
  $row4 = sql_fetch($sqlcnt4);
 $total_countx= $row4['cnt'];

?>

<div id="contents">
<div id="cont_head">
		<h2>마이페이지</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li></ul>

		</div>				
	</div>
<div class="article mypage">

            <div class="article_body">
                <div class="wrap">

                  
					<div class="nc_frm-header">
                        <h3 class="nc_frm-header__title">
                           환영합니다.<br>
							<span class="nc_frm-header__title-point"><?php echo get_session("m_name");?></span> 님
                        </h3>
                       <div class="member_points">
        <div class="member_point_item_wrap">
            <div class="member_point_item coupon">
                <span class="hs_icon icon_ticket"></span>
                <div class="member_point_data dagi">
                    <p class="member_point_type">대기</p>
                    <a class="member_point_status" href="javascript:void(0);"><span lang="en" class="dagi num"><?php echo  $total_countd;?></span> <span class="tt"> 건</span></a>
                </div>
            </div><!-- .member_point_item -->
            <div class="member_point_item mileage">
                <span class="hs_icon icon_mileage"></span>
                <div class="member_point_data wan">
                    <p class="member_point_type">완료</p>
                    <a class="member_point_status" href="javascript:void(0);"><span lang="en" class="end num"><?php echo  $total_counte;?></span><span class="tt"> 건</span></a>

                </div>
            </div><!-- .member_point_item -->
			  <div class="member_point_item mileage">
                <span class="hs_icon icon_cancel"></span>
                <div class="member_point_data cancel">
                    <p class="member_point_type">취소</p>
                    <a class="member_point_status" href="javascript:void(0);"><span lang="en" class="cancel num"><?php echo  $total_countc;?></span><span class="tt"> 건</span></a>

                </div>
            </div><!-- .member_point_item -->
        </div><!-- .member_point_item_wrap -->
    </div>

                    </div>
<div class="grayBox">
			<p class="txt">현재 <span class="blue_txt">결제대기</span>중인 강좌가 <a href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=001?center_id=<?php echo $_SESSION['center_id'];?>"><span class="blue_txt"><?php echo  $total_countd;?></span></a>건 있습니다.<?php if($total_countd!='0'){?><a class="my_lecture_btn m_right" href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=001" ><span>바로가기</span></a><?php }?></p>
		</div>
<?php

$before3=date("Ymd",strtotime("-3 month"));
$after3=date("Ymd");

		  $ss_date1 = substr($before3,2,2);
		  $ss_date2 = substr($before3,4,2);
		  $ss_date3 = substr($before3,6,2);

		  $ee_date1 = substr($after3,2,2);
		  $ee_date2 = substr($after3,4,2);
		  $ee_date3 = substr($after3,6,2);

?>


           <div class="mypage_prog">
                        <div class="mypage_prog__title">
                            <span class="mypage_prog__title-text">최근 신청 내역</span>
                            <span class="mypage_prog__title-period">최근 3개월(<?php echo $ss_date1;?>.<?php echo $ss_date2;?>.<?php echo $ss_date3;?>~<?php echo $ee_date1;?>.<?php echo $ee_date2;?>.<?php echo $ee_date3;?>)</span>
                        </div>
                        <div class="mypage_prog__list">
                            <div class="mypage_prog__item mypage_prog__item--checking mypage_prog__item--active">
                                <span class="mypage_prog__count"><?php echo  $total_countd;?></span>
                                <span class="mypage_prog__state">결제대기</span>
                            </div>
                            <div class="mypage_prog__item mypage_prog__item--progress">
                                <span class="mypage_prog__count"><?php echo  $total_counte;?></span>
                                <span class="mypage_prog__state">결제완료</span>
                            </div>
							 <div class="mypage_prog__item mypage_prog__item--cancel">
                                <span class="mypage_prog__count"><?php echo  $total_countx;?></span>
                                <span class="mypage_prog__state">결제취소</span>
                            </div>
                            <div class="mypage_prog__item mypage_prog__item--complete">
                                <span class="mypage_prog__count">0</span>
                                <span class="mypage_prog__state">환불완료</span>
                            </div>
                            <div class="mypage_prog__item mypage_prog__item--reject mypage_prog__item--last">
                                <span class="mypage_prog__count"><?php echo  $total_countc;?></span>
                                <span class="mypage_prog__state">신청취소</span>
                            </div>
                        </div>
                    </div>    
					
<?php


$http_host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$url = "https://".$http_host . $request_uri;

$before=date("Ymd",strtotime("-3 month"));
$after=date("Ymd");



$json_string = CF_Member_Basket_List_Main ($_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip, $before, $after);

$json_array = json_decode($json_string, true); 


$tcount=count($json_array['ResultData1']);


if ($tcount=='0'){

	

?>
<div class="my_lecture_list my_lecture_list_row">

<div class="noResult"><p class="tit">강좌신청현황이 존재하지 않습니다.</p></div>

</div>
</div>
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<?php


}?>

<?php


if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{

if ($tcount > '0'){

?>
<form name="lecture_list"  id="lecture_list" method="post">
<input type="hidden" name="page" id="page">
<input type="hidden" name="c_id" id="c_id">
<input type="hidden" name="idx" id="idx">
<input type="hidden" name="sales_code" id="sales_code">
<input type="hidden" name="lidx" id="lidx">
<input type="hidden" name="member_code" id="member_code">
<input type="hidden" name="state" id="state">
<input type="hidden" name="status" id="status">
<input type="hidden" name="trs_no" id="trs_no">
<input type="hidden" name="trs_seq" id="trs_seq">
 <div class="my_lecture_list my_lecture_list_row">

<?php

$m_code=get_session('m_code');

$sqlcnt = "SELECT count(*) as cnt FROM TB_Basket_Program  
             
 WHERE Sales_Division IN ('003') 
	   AND Online_Gubun     = 'Online'
   AND Member_Code     = '$m_code'
AND State ='001' 
AND (Sales_Date >= '$before' OR Sales_Date <= '$after')
AND CASE WHEN State = '001' THEN DATE_FORMAT(NOW(), '%Y%m%d') BETWEEN DATE_FORMAT(Payment_Start_Date, '%Y%m%d') AND DATE_FORMAT(Payment_End_Date, '%Y%m%d') ELSE 1 = 1 END 
ORDER BY IDX DESC ";

 $rowc = sql_fetch($sqlcnt);
 $total_countd= $rowc['cnt'];


 $sqlcnt2 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
  AND State    IN ('002', '005')
   AND Online_Gubun     = 'Online'
   AND (Sales_Date >= '$before' OR Sales_Date <= '$after')
   AND Member_Code     = '$m_code'";
   
  $row2 = sql_fetch($sqlcnt2);
 $total_counte= $row2['cnt'];


 $sqlcnt3 = "SELECT count(*) as cnt FROM TB_Basket_Program  
               WHERE Sales_Division IN ('003', '055')
     AND State     IN ('003', '009')
   AND Online_Gubun     = 'Online'
   AND (Sales_Date >= '$before' OR Sales_Date <= '$after')
   AND Member_Code     = '$m_code'";
   
  $row3 = sql_fetch($sqlcnt3);
 $total_countc= $row3['cnt'];



$i = 1;

 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	  
			 


	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
      


        	}
			
		 $state_name=$val['State_Name'];
		  $s_date=$val['Start_Date'];
		  $s_date1 = substr($s_date,2,2);
		  $s_date2 = substr($s_date,4,2);
		  $s_date3 = substr($s_date,6,2);


          $e_date=$val['End_Date'];
		  $e_date1 = substr($e_date,2,2);
		  $e_date2 = substr($e_date,4,2);
		  $e_date3 = substr($e_date,6,2);


          $s_time=$val['Start_Time'];
		  $s_time1 = substr($s_time,0,2);
		  $s_time2 = substr($s_time,2,2);

          $e_time=$val['End_Time'];
		  $e_time1 = substr($e_time,0,2);
		  $e_time2 = substr($e_time,2,2);

		  $stime=$s_time1.":".$s_time2;
          $etime=$e_time1.":".$e_time2; 

		$trs_no=$val['Trs_No'];
		$trs_seq=$val['Trs_Seq'];



        $sales_item_name=$val['Sales_Item_Name'];
		$sales_date=$val['Sales_Date'];
		  $a_date1 = substr($sales_date,2,2);
		  $a_date2 = substr($sales_date,4,2);
		  $a_date3 = substr($sales_date,6,2);

        $first_start_day_yn=$val['First_Start_Day_Yn'];

        $week_name=$val['Week_Name'];
		$receive_amount=$val['Receive_Amount'];
		$unit_price=$val['Unit_Price'];
		$idx=$val['IDX'];
		$center_id=$val['Center_ID'];
		$s_code=$val['Sales_Code'];
		$state=$val['State'];
	
		$sales_code=substr($val['Sales_Code'], -8, 8);


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


<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
                        <div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                                                                <div class="my_lecture_data_group ">
                                    <span class="my_lecture_status <?php echo $s_class;?>"><?php echo $state_name;?></span>
                                                                    </div>
                                                                <div class="my_lecture_lec_area">
                                    <a class="my_lecture_lec nc-open-bottom-popup" href="#!"><?php echo number_format($receive_amount);?></a>
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <a class="my_lecture_title" href="javascript:void(0);"><?php if($first_start_day_yn=="N"){?>[수시]<?php }?><?php echo $sales_item_name;?></a>
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont"><span class="one"><span class="bt">장소</span><?php echo get_session('center_name');?></span></span> <span class="two"><span class="bt">시간</span><?php echo $week_name;?> <?php echo $stime;?> ~ <?php echo $etime;?></span><span><span class="bt">기간</span><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?></span>  <span><span class="bt">접수</span><?php echo $a_date1;?>-<?php echo $a_date2;?>-<?php echo $a_date3;?></span></p>
                                                                                               
                            </div>                            
							                            <div class="my_lecture_btns my_lecture_btns_two <?php if($state=='001'){?>three<?php }?>">
  <?php if(($state=='001') and ($state=='002')){?>
  <a href="#!" class="my_lecture_btn my_lecture_detail" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $sales_code;?>','<?php echo $state;?>','<?php echo $status;?>','<?php echo $trs_no;?>','<?php echo $trs_seq;?>');"><span>상세보기</span></a>
  <?php }else{?>
									
											  <?php if(NC_IS_MOBILE) {?>
											 <a class="my_lecture_btn my_lecture_detail" href="./view.php?status=<?php echo $status;?>&page=<?php echo $page;?>&c_id=<?php echo $val['Center_ID'];?>&idx=<?php echo $idx;?>&sales_code=<?php echo $s_code;?>&state=<?php echo $state;?>"><span>상세보기</span></a>
											 <?php }else{?>
                                             <a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $s_code;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>','<?php echo $trs_no;?>','<?php echo $trs_seq;?>');"><span>상세보기</span></a> 
											 <?php }?>
                                           
										   		 
											 <!--

                                              <a class="my_lecture_btn my_lecture_detail open_in_modal_page" href="./view.php?status=<?php echo $status;?>&page=<?php echo $page;?>&c_id=<?php echo $val['Center_ID'];?>&idx=<?php echo $idx;?>&sales_code=<?php echo $s_code;?>&state=<?php echo $state;?>"><span>상세보기</span></a>
											  --> 
											 <?php }?>
<?php if($state=='001'){?>
<a class="my_lecture_btn my_lecture_cancel"  id="s_btnz_<?php echo $row;?>" href="javascript:void(0);""><span>수강취소</span></a>                      
<?php } ?>																					  
<?php if($state=='001'){?>
 <a href="javascript:void(0);" class="my_lecture_btn my_lecture_link incard" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $s_code;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>');" style="display:none;"><span>결제하기</span></a>
<?php }?>
<?php if($state=='003'){ ?>
<!--<a class="my_lecture_btn my_lecture_detail open_in_modal_page" href="./view.php?page=<?php echo $page;?>&center_id=<?php echo $val['Center_ID'];?>&idx=<?php echo $val['IDX'];?>&sales_code=<?php echo $val['Sales_Code'];?>"><span>상세보기</span></a>-->
<a class="my_lecture_btn my_lecture_link cancel" href="javascript:void(0);"><span>취소완료</span></a>
<?php }?>
<?php if($state=='009' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>결제취소완료</span></a>
<?php }?>
<?php if($state=='004' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>시간경과취소</span></a>
<?php }?>
<?php if($state=='005' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>환불신청</span></a>
<?php }?>
<?php if($state=='006' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>환불완료</span></a>
<?php }?>
<?php if($state=='002'){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>결제완료</span></a>
<?php } ?>

                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>


<?php if($tcount==$i){?>

<?php }else{?>
<div class="nc-separator"></div>
<?php }?>
         

<script>
		 $(document).ready(function () {	

        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());
		 //$("#s_btnz_<?php echo $row;?>").click(function(e){
		 
		 $(document).on("click","#s_btnz_<?php echo $row;?>",function(e){
		 e.preventDefault();
		 NC.alert({
				title    : '신청한 강좌를 취소하시겠습니까?',
				message  : '수강취소시 다시 신청해주세요.',
				ok       : '예',
				cancel   : '아니오',
				is_confirm : true,
				on_confirm : function(){
		 $.ajax({
		 url:'./ajax.basket_Cancel.php',
		 type: "POST",
		 data: {idx : "<?php echo $idx;?>"},
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
		 });
		</script>



          <?php
		  
		  	  $i=$i+1;
		  } ?>                             

</div>

</form>
<?php 
}

}
?>


                   <div class="nc-separator"></div>
<div class="nmypage-logout">
                        <span class="nmypage-logout__user-id"><?php echo get_session('m_id');?></span>
                        <a class="nmypage-logout__link" href="<?php echo NC_MEMBER_URL;?>/logout.php?center_id=<?php echo $_SESSION['center_id'];?>">로그아웃</a>
                    </div>
                  
					
                </div>
            </div>
        </div>


<script type="text/javascript">

// ================================================================================================
// 링크
// ================================================================================================
function goLink(page,c_id,idx,sales_code,member_code,state,status,trs_no,trs_seq){
  
  var frmx = document.getElementById('lecture_list');


frmx.page.value=page;
frmx.c_id.value=c_id;
frmx.idx.value=idx;
frmx.sales_code.value=sales_code;
frmx.member_code.value=member_code;
frmx.state.value=state;
frmx.status.value=status;
frmx.trs_no.value=trs_no;
frmx.trs_seq.value=trs_seq;
frmx.action="./view.php"


frmx.submit();

}

</script>


</div>
</div>
</div>
</main>
