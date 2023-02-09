<?php
if(!defined('_SAMSUNG_')) exit;


// 모바일접속인가?
if(NC_IS_MOBILE) {
	//$NC_CARD_URL=NC_URL."/mobile/_1_start.php";
	$NC_CARD_BURL=NC_URL."/mo";
}else{
	//$NC_CARD_URL=NC_URL."/pc/_1_start.php";
	$NC_CARD_BURL=NC_URL."/pc";
}	


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



   
echo '<link rel="stylesheet" href="'.run_replace('head_css_url', '/s_css/mypage.css?ver='.NC_CSS_VER).'">'.PHP_EOL;
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
.mypage_lecture .my_lecture_cont span.one, .mypage_lecture .my_lecture_cont span.two {
    display: inline-block;
}
.mypage_lecture .my_lecture_cont span {
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
html.desktop .my_lecture_btns .my_lecture_btn.my_lecture_link.send{
background: #f4811f;border: 1px solid #f4811f;
width: 50%;
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
.mypage_lecture .my_lecture_cont span.one,.mypage_lecture .my_lecture_cont span.two {
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
.my_lecture_btns .my_lecture_btn.incard.send{
background: #f4811f;
width: 50%;
}
}

</style>

<main id="main" class="main_container">

<div id="my_top_menu">
						<h3 class="m_element">서브메뉴</h3>
						<ol>
							<li class="home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" title="홈 바로가기">홈</a></li>
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
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>내강좌</span></li></ul>

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


if($status=='001'){    //수강신청현황

?>

<div class="grayBox">
			<p class="txt">수강신청취소, 결제는 상세보기 화면에서 신청할 수 있습니다.</p>
		</div>

<?php


$http_host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$url = "https://".$http_host . $request_uri;




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

 $center_id =  $_SESSION['center_id'];

$sql = "";
$sql = $sql."SELECT PG_Merchant_Number, PG_Api_Key ";
$sql = $sql."  FROM TB_SystemSetting ";
$sql = $sql." WHERE Center_ID = '$center_id' ";

$row00 = sql_fetch($sql);
$mid   = $row00['PG_Merchant_Number'];

$clientId  = $mid;

$json_string = CF_Member_Basket_List_Cnt ( $_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{

$totalcount=$json_array['Result']['TotalCount'];


	$rows = 10;
$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
if($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $totalcount - (($page-1)*$rows);
   
$total_page = ceil($totalcount / $rows); // 전체 페이지 계산



if ($totalcount=='0'){

?>
<div class="my_lecture_list my_lecture_list_row">

<div class="noResult"><p class="tit">강좌신청현황이 존재하지 않습니다.</p></div>

</div>
</div>

<?php
}else{
	
	


	?>

<form name="lecture_list"  id="lecture_list" method="post" >

 <div class="my_lecture_list my_lecture_list_row">
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
<input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
<input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<?php


   
$qstr1 = "status=$status$qstr&n_type=mypage_lecture";


$json_string = CF_Member_Basket_List_Page( $_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip, $from_record, $rows);

$json_array = json_decode($json_string, true); 


if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{

   $i=1;
 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	  
			 


	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
      


        	}
			$i = 0;
		 $state_name=$val['State_Name'];
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
		$idx=$val['IDX'];
		$center_id=$val['Center_ID'];
		$s_code=$val['Sales_Code'];
		$state=$val['State'];
	
 $first_start_day_yn=$val['First_Start_Day_Yn'];

		$sales_code=substr($val['Sales_Code'], -8, 8);


   $sqlx="SELECT Sales_Place_Code, date_format(NOW(6), '%Y%m%d%H%i%s%f') as trs_no
            FROM TB_Saleitem
            WHERE  Sales_Code = '$s_code' ";	 


   $s_name = sql_fetch($sqlx);

   $D_Name  = $s_name['Sales_Place_Code'];
   $trs_no = $s_name['trs_no'];
   
   if ($D_Name=="01"){

       $ctxt="스포츠센터";
   }else{
          
		  $ctxt="문화센터";

   }
		 }

if($state=="000") { 
$s_class="";
 } elseif($state=="001") {
$s_class="";
 } elseif($state=="002" ) {
$s_class="end";
 }elseif($state=="003" ) {
$s_class="cancel";
 }elseif($state=="004" ) {
$s_class="tcancel";
 }elseif($state=="005" ) {
$s_class="refund";
$status='003';
 }elseif($state=="006" ) {
$s_class="refund_end";
 }elseif($state=="009" ) {
$s_class="xcancel";
 }		
                    
       ?>                 


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
                                             <?php if(($state=='001') && ($state=='002')){?>
											 <a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $s_code;?>','<?php echo $state;?>','<?php echo $status;?>','<?php echo $trs_no;?>');"><span>상세보기</span></a><?php }else{?>
											  <?php if(NC_IS_MOBILE) {?>
											 <a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $s_code;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>','<?php echo $trs_no;?>');"><span>상세보기</span></a> 
											 <?php }else{?>
                                             <a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $s_code;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>','<?php echo $trs_no;?>');"><span>상세보기</span></a> 
											 <?php }?>
											 
											 <?php }?>
<?php if($state=='001'){?>
<a class="my_lecture_btn my_lecture_cancel"  id="s_btnz_<?php echo $row;?>" href="javascript:void(0);"><span>수강취소</span></a>                      
<?php } ?>																					  
<?php if($state=='001'){?>
<a class="my_lecture_btn my_lecture_link incard" href="javascript:void(0);" onclick="goCard('<?php echo $sales_code;?>','<?php echo get_session('m_code').':'.$sales_item_name;?>','<?php echo $center_id;?>','<?php echo $idx;?>','<?php echo $receive_amount;?>','<?php echo get_session('m_code');?>','<?php echo get_session('m_name');?>','L','<?php echo $month_qty;?>','<?php echo $s_code;?>','<?php echo $startdate;?>','<?php echo $enddate;?>','<?php echo $trs_no;?>', '<?php echo $clientId;?>');"><span>결제하기</span></a>
<?php }?>
<?php if($state=='003'){ ?>
<!--<a class="my_lecture_btn my_lecture_detail open_in_modal_page" href="./view.php?page=<?php echo $page;?>&center_id=<?php echo $val['Center_ID'];?>&idx=<?php echo $val['IDX'];?>&sales_code=<?php echo $val['Sales_Code'];?>"><span>상세보기</span></a>-->
<a class="my_lecture_btn my_lecture_link cancel" href="javascript:void(0);"><span>취소완료</span></a>
<?php }?>
<?php if($state=='009'){ ?>
<!--<a class="my_lecture_btn my_lecture_detail open_in_modal_page" href="./view.php?page=<?php echo $page;?>&center_id=<?php echo $val['Center_ID'];?>&idx=<?php echo $val['IDX'];?>&sales_code=<?php echo $val['Sales_Code'];?>"><span>상세보기</span></a>-->
<a class="my_lecture_btn my_lecture_link cancel" href="javascript:void(0);"><span>결제취소완료</span></a>
<?php }?>
<?php if($state=='004' ){ ?>
<a class="my_lecture_btn my_lecture_link incard send" href="javascript:void(0);"><span>시간경과취소</span></a>
<?php }?>
<?php if($state=='005' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>환불신청</span></a>
<?php }?>
<?php if($state=='006' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>환불완료</span></a>
<?php }?>
<?php if($state=='002'){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>결제완료</span></a>
<?php }?>
 

                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>

<?php if($tcount==$i){?>
<div class="nc-separator no"></div>
<?php }else{?>
<div class="nc-separator"></div>
<?php }?>

<script>
		 $(document).ready(function () {	

   
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
		            }		
       
		  }
		  
		  
		  ?>                             


</div>
<input type="hidden" name="page" id="page">
<input type="hidden" name="c_id" id="c_id">
<input type="hidden" name="idx" id="idx">
<input type="hidden" name="sales_code" id="sales_code">
<input type="hidden" name="lidx" id="lidx">
<input type="hidden" name="member_code" id="member_code">
<input type="hidden" name="state" id="state">
<input type="hidden" name="status" id="status">
<input type="hidden" name="trs_no" id="trs_no">
</form>

<style>

#app_text .conts_subtitle {
    font-size: 20px;
    font-family: "NotoSans-Medium",sans-serif;
    margin-bottom: 10px;
    line-height: 1.7;
    position: relative;
    text-align: center;
}

#app_text .conts_subtitle .t_center {
    text-align: center;
    font-size: 14px;
    display: inline-block;
}
</style>


<script>
		 $(document).ready(function () {	

        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());

		  });

</script>

<script src="https://pay.nicepay.co.kr/v1/js/"></script>

<script type="text/javascript">
// ================================================================================================
// 링크
// ================================================================================================
function goLink(page,c_id,idx,sales_code,member_code,state,status,trs_no){
  
  var frmx = document.getElementById('lecture_list');


frmx.page.value=page;
frmx.c_id.value=c_id;
frmx.idx.value=idx;
frmx.sales_code.value=sales_code;
frmx.member_code.value=member_code;
frmx.state.value=state;
frmx.status.value=status;
frmx.trs_no.value=trs_no;
frmx.action="<?php echo NC_MYPAGE_URL;?>/view.php"


frmx.submit();


}


function goCard(goodsCode,goodsName,Center_ID,idx,goodsAmount,member_code,member_name,ptype,monthqty,scode,startdate,enddate, Trs_no, client_id){


  // NC.alert({
	//			title    : "17일 오전 9시부터 온라인 결제 오픈입니다.",
	//			message  : ''
	//		});
//return false;


/*
 var Frm = document.lecture_list;
   var Amt = goodsAmount;
   var trs_no = Trs_no;
   //var gName = Frm.GoodsName.value.substring(0, 10);

 AUTHNICE.requestPay({
      clientId: client_id,
      method: 'card',
      orderId: '' + trs_no + '',
      amount: '' + Amt + '',
      goodsName: '' + goodsName + '',
	  buyerName: '' + member_name + '',
      returnUrl: '<?php echo $NC_CARD_BURL;?>/response.php?idx='+idx+'&trs_no='+trs_no+'&center_id='+Center_ID  ,
      fnError: function (result) {
         alert('' + result.errorMsg + '')
      }
   });

*/


$.ajax({
        url:'./ajax.basket_check.php',
        type: "POST",
	    accept : "application/json",
        dataType: "json",
		data:{'sales_code': scode, 'center_id':Center_ID, 'idx':idx},
        async: true,
        cache: false,
		success: function(data, textStatus) {
	


            if(data.ResultCode != "") {
                //alert(data.rstate);
					
				//console.log(data.rstate);
				if (data.ResultCode=='001') {





  var frm = document.getElementById('lecture_list');

 var Frm = document.lecture_list;
   var Amt = goodsAmount;
   var trs_no = Trs_no;
   //var gName = Frm.GoodsName.value.substring(0, 10);

var goodsName2 = goodsName.substring(0, 35);


 AUTHNICE.requestPay({
      clientId: client_id,
      method: 'card',
      orderId: '' + trs_no + '',
      amount: '' + Amt + '',
      goodsName: '' + goodsName2 + '',
	  buyerName: '' + member_name + '',
      returnUrl: '<?php echo $NC_CARD_BURL;?>/response.php?idx='+idx+'&trs_no='+trs_no+'&center_id='+Center_ID  ,
      fnError: function (result) {
         alert('' + result.errorMsg + '')
      }
   });




						
	

                }else{


         if (data.ResultCode=='004') {

		     	NC.alert({
				title    :  data.Msg,
				message  : data.ResultMsg,
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){
               

			    location.href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>";
                
					return false;
                   

				},
               on_cancel  : function(){
               
			   location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>";

			   
			    return false;
                   
	        
				},
			});

		 }else{



         	NC.alert({
				title    :  data.Msg,
				message  : data.ResultMsg,
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
               


              if (data.ResultCode=='002') {

	             location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>";
                   
			  }else if (data.ResultCode=='005' || data.ResultCode=='006') {

			  

                 location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>";

			  }else if (data.ResultCode=='003' || data.ResultCode=='009') {

			  

                 location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>";

			  }
                


					return false;
                   

				},
               on_cancel  : function(){
               
	        
				},
			});





		 }



				}


          

     

 }


        },error:function(request, status,error){
		 // setTimeout(function(){isAjaxing = false;},10000);	
		}
    });

}


</script>



<?php
echo get_paging_ca(10, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&page=');
?> 

<?php 
}

}

}else if($status=='002'){    //수강이력현황

?>

<div class="grayBox">
			<p class="txt">환불신청, 재수강신청, 카드전표출력는 상세보기를 클릭하여 신청할 수 있습니다.</p>
		</div>

<?php


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



$json_string = CF_Member_Valid_List_Cnt ( $_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip);

$json_array = json_decode($json_string, true); 

if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{

$totalcount=$json_array['Result']['TotalCount'];




if ($totalcount=='0'){

?>
<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
<div class="my_lecture_list my_lecture_list_row">

<div class="noResult"><p class="tit">강좌이력현황이 존재하지 않습니다.</p></div>

</div>
</div>
<script>
		 $(document).ready(function () {	

        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());

});
</script>
<?php


}else{



$rows = 10;
$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
if($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $totalcount - (($page-1)*$rows);
   
$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
   


$qstr1 = "status=$status$qstr&n_type=mypage_lecture";



//echo $total_page;
//echo $from_record;
//echo $rows.'<br>';
//echo get_session('m_code');

/*echo get_session('center_id');
echo get_session('m_code');
echo get_session('m_id');*/

$age = get_session('m_age');

$json_string2 = CF_Member_Valid_List_Page( $_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip, $from_record, $rows, $age);


$json_array2 = json_decode($json_string2, true); 

if($json_array2['Result']['ResultCode'] != 0){
 echo $json_array2['Result']['ResultMsg'];
	


}else{




?>

<input type='hidden' id="d_count" name="d_count" value="<?php echo $total_countd;?>">
 <input type='hidden' id="e_count" name="e_count" value="<?php echo $total_counte;?>">
  <input type='hidden' id="c_count" name="c_count" value="<?php echo $total_countc;?>">
 <form name="lecture_list"  id="lecture_list" method="post" action="<?php echo $NC_CARD_BURL;?>/payRequest_utf.php">
<input type="hidden" name="page" id="page">
<input type="hidden" name="c_id" id="c_id">
<input type="hidden" name="idx" id="idx">
<input type="hidden" name="sales_code" id="sales_code">
<input type="hidden" name="lidx" id="lidx">
<input type="hidden" name="member_code" id="member_code">
<input type="hidden" name="state" id="state">
<input type="hidden" name="status" id="status">
<input type="hidden" name="insert_idx" id="insert_idx">
<input type="hidden" name="trs_no" id="trs_no">
<input type="hidden" name="trs_seq" id="trs_seq">
 <div class="my_lecture_list my_lecture_list_row">

<?php


$i=1;

 foreach ($json_array2['ResultData1'] as $row => $val){
			 

				  


	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
               //echo '1';


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
		$idx=$val['IDX'];


		$center_id=$val['Center_ID'];
		$s_code=$val['Sales_Code'];
		$state=$val['State'];
	    $repayment_yn=$val['Repayment_Yn'];
		$sales_code=substr($val['Sales_Code'], -8, 8);

$month_qty=$val['Month_Qty'];

$trs_no=$val['Trs_No'];
$trs_seq=$val['Trs_Seq'];
$refNo=$val['RefNo'];
$amount=$val['Receive_Amount'];

$tran_date=$val['Tran_Date'];

 $first_start_day_yn=$val['First_Start_Day_Yn'];




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
 } elseif($state=="001") {
$s_class="";
 } elseif($state=="002" ) {
$s_class="end";
 }elseif($state=="003" ) {
$s_class="cancel";
 }elseif($state=="004" ) {
$s_class="tcancel";
 }elseif($state=="005" ) {
$s_class="refund";
 }elseif($state=="006" ) {
$s_class="refund_end";
 }elseif($state=="009" ) {
$s_class="xcancel";
 }		
         
$thisyear = date('Y'); // 4자리 연도
$thismonth = date('m'); // 0을 포함 월
$today = date('d'); // 0을 포함 일

$reday=$thisyear."".$thismonth."".$today;
$after_start =  date("Ymd", strtotime($s_date. ' +25 days'));
         
    $sql = "";
	$sql = "SELECT CONCAT(DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 1 MONTH), '%Y%m'), '01') as start_date, 
	               DATE_FORMAT(DATE_ADD(DATE_ADD(CONCAT(DATE_FORMAT(DATE_ADD(SYSDATE(), INTERVAL 1 MONTH), '%Y%m'), '01'), INTERVAL CAST($month_qty as int) MONTH), INTERVAL -1 DAY), '%Y%m%d') as end_date 
		      FROM dual";	

	$row_1 = sql_fetch($sql);

	$startdate = $row_1['start_date'];
	$enddate = $row_1['end_date'];
		  




       ?>                 


                            <div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                            <div class="my_lecture_data_group ">
                            <span class="my_lecture_status <?php if($repayment_yn=='Y'){?><?php }else{?>end<?php }?>"><?php if($repayment_yn=='Y'){?>재수강접수<?php }else{?>결제완료<?php }?></span>
                            </div>
                            <div class="my_lecture_lec_area">
                                    <a class="my_lecture_lec nc-open-bottom-popup" href="#!"><?php echo number_format($receive_amount);?></a>
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <a class="my_lecture_title" href="javascript:void(0);"><?php if($first_start_day_yn=="N"){?>[수시]<?php }?><?php echo $sales_item_name;?></a>
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont"><span class="one"><span class="bt">장소</span><?php echo get_session('center_name');?></span></span> <span class="two"><span class="bt">시간</span><?php echo $week_name;?> <?php echo $stime;?> ~ <?php echo $etime;?></span><span><span class="bt">기간</span><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?></span> <span><span class="bt">접수</span><?php echo $a_date1;?>-<?php echo $a_date2;?>-<?php echo $a_date3;?></span></p>
                                                                                               
                            </div>                            
							                            <div class="my_lecture_btns my_lecture_btns_two <?php if($sales_date == $reday){?>three<?php }?>">

                                                                

                                                                                      
<?php if($repayment_yn=='Y'){?>





<a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink2('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $trs_no;?>','<?php echo $trs_seq;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>');"><span>상세보기</span></a> 
<a class="my_lecture_btn my_lecture_link incard" href="javascript:void(0);" onclick="goCard('<?php echo $sales_code;?>','<?php echo get_session('m_code').':'.$sales_item_name;?>','<?php echo $center_id;?>','<?php echo $idx;?>','<?php echo $unit_price;?>','<?php echo get_session('m_code');?>','<?php echo get_session('m_name');?>','L','<?php echo $month_qty;?>','<?php echo $s_code;?>','<?php echo $startdate;?>','<?php echo $enddate;?>','<?php echo $trs_no;?>','<?php echo $clientId;?>');"><span>재수강신청</span></a>
<?php }else{?>


 <a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink2('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $trs_no;?>','<?php echo $trs_seq;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>');"><span>상세보기</span></a> <a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>결제완료</span></a>
 <?php if($sales_date == $reday){
  
 $m_code=get_session('m_code');



 
 ?><a class="my_lecture_btn my_lecture_link incard cancel" onclick="goCard_Cancel('<?php echo $trs_no;?>','<?php echo $trs_seq;?>','<?php echo $refNo;?>','<?php echo $tran_date;?>','<?php echo $amount;?>','<?php echo get_session('m_name');?>','<?php echo get_session('m_code');?>','<?php echo  $_SESSION['center_id'];?>');"><span>결제취소</span></a><?php } ?>
<?php } ?>

                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>


<?php if($tcount==$i){?>
<div class="nc-separator no"></div>
<?php }else{?>
<div class="nc-separator"></div>
<?php }?>
         

          <?php
		  
		 
		
 }	  	
		 ?>                             

</div>
</form>

<?php 
}

}
?>	   

<script>
		 $(document).ready(function () {	

        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());

});
</script>
<script type="text/javascript">

// ================================================================================================
// 링크
// ================================================================================================
function goLink(page,c_id,idx,sales_code,member_code,state,status){
  
  var frmx = document.getElementById('lecture_list');


frmx.page.value=page;
frmx.c_id.value=c_id;
frmx.idx.value=idx;
frmx.sales_code.value=sales_code;
frmx.state.value=state;
frmx.member_code.value=member_code;
frmx.status.value=status;
frmx.action="./view.php"


frmx.submit();

}


function goLink2(page,c_id,trs_no,trs_seq,member_code,state,status){
  
  var frmx = document.getElementById('lecture_list');


frmx.page.value=page;
frmx.c_id.value=c_id;
frmx.trs_no.value=trs_no;
frmx.trs_seq.value=trs_seq;
frmx.state.value=state;
frmx.member_code.value=member_code;
frmx.status.value=status;
frmx.action="./view.php"


frmx.submit();

}

</script>


<?php
echo get_paging_ca(10, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&page=');
?> 

<?php 

}
}else if($status=='003'){    //환불이력현황



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



$json_string = CF_Member_Refund_RequestList_Cnt ( $_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip);

$json_array = json_decode($json_string, true); 

if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	

}else{

$totalcount=$json_array['Result']['TotalCount'];




if ($totalcount=='0'){


?>

<div class="my_lecture_list my_lecture_list_row">

<div class="noResult"><p class="tit">환불신청현황이 존재하지 않습니다.</p></div>

</div>
</div>


<?php


}else{

$rows = 10;
$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
if($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$num = $totalcount - (($page-1)*$rows);
   
$total_page = ceil($totalcount / $rows); // 전체 페이지 계산
   


$qstr1 = "status=$status$qstr&n_type=mypage_lecture";




$json_string = CF_Member_Refund_RequestList ( $_SESSION['center_id'],get_session('m_code'), get_session('m_id'), $url, $ip, $from_record, $rows);

$json_array = json_decode($json_string, true); 


$tcount=count($json_array['ResultData1']);


if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{


if ($tcount=='0'){

?>
<div class="my_lecture_list my_lecture_list_row">

<div class="noResult"><p class="tit">환불신청현황이 존재하지 않습니다.</p></div>

</div>
</div>
<?php }else{?>



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




 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	  
			 


	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
               echo '1';


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
		$idx=$val['IDX'];
		$center_id=$val['Center_ID'];
		$s_code=$val['Sales_Code'];
		$state=$val['State'];
	
		$sales_code=substr($val['Sales_Code'], -8, 8);

$trs_no=$val['Trs_No'];
$trs_seq=$val['Trs_Seq'];


       $first_start_day_yn=$val['First_Start_Day_Yn'];

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



                    
       ?>                 


                        <div class="my_lecture_item my_lecture_item_first" style="visibility: inherit; opacity: 1;">

                            <div class="my_lecture_content">
                                                                <div class="my_lecture_data_group ">
                                    <span class="my_lecture_status <?php if($state=='005'){?>refund<?php }else{?>refund_end<?php } ?>"><?php echo $state_name;?></span>
                                                                    </div>
                                                                <div class="my_lecture_lec_area">
                                    <a class="my_lecture_lec nc-open-bottom-popup" href="#!"><?php echo number_format($receive_amount);?></a>
                                </div><!-- .my_lecture_lec_area -->
                                                                                                    <a class="my_lecture_title" href="javascript:void(0);"><?php if($first_start_day_yn=="N"){?>[수시]<?php }?><?php echo $sales_item_name;?></a>
																									<!--<div class="my_lecture_deadline">재수강신청</div>-->
																									<p class="my_lecture_cont"><span class="one"><span class="bt">장소</span><?php echo get_session('center_name');?></span></span> <span class="two"><span class="bt">시간</span><?php echo $week_name;?>  <?php echo $stime;?> ~ <?php echo $etime;?></span><span><span class="bt">기간</span><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?></span>  <span><span class="bt">접수</span><?php echo $a_date1;?>-<?php echo $a_date2;?>-<?php echo $a_date3;?></span></p>
                                                                                               
                            </div>                            
							                            <div class="my_lecture_btns my_lecture_btns_two ">

                                              <?php if(NC_IS_MOBILE) {?>
											 <a class="my_lecture_btn my_lecture_detail" href="./view.php?status=<?php echo $status;?>&page=<?php echo $page;?>&c_id=<?php echo $val['Center_ID'];?>&idx=<?php echo $idx;?>&sales_code=<?php echo $s_code;?>&state=<?php echo $state;?>&trs_no=<?php echo $trs_no;?>&trs_seq=<?php echo $trs_seq;?>"><span>상세보기</span></a>
											 <?php }else{?>
                                             <a href="javascript:void(0);" class="my_lecture_btn my_lecture_detail" onclick="goLink('<?php echo $page;?>','<?php echo $val['Center_ID'];?>','<?php echo $idx;?>','<?php echo $s_code;?>','<?php echo get_session('m_code');?>','<?php echo $state;?>','<?php echo $status;?>','<?php echo $trs_no;?>','<?php echo $trs_seq;?>');"><span>상세보기</span></a> 
											 <?php }?>

<!--                                                                                      
<?php if($state=='001'){?>
<a class="my_lecture_btn my_lecture_link incard" href="javascript:void(0);" onclick="goCard('<?php echo $sales_code;?>','<?php echo $sales_item_name;?>','<?php echo $center_id;?>','<?php echo $idx;?>','<?php echo $receive_amount;?>','<?php echo get_session('m_code');?>','<?php echo get_session('m_name');?>','L');"><span>결제하기</span></a>
<?php }else{?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>결제완료</span></a>
<?php } ?>
-->

          
<?php if($state=='005' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>환불신청</span></a>
<?php }?>			
<?php if($state=='006' ){ ?>
<a class="my_lecture_btn my_lecture_link incard end" href="javascript:void(0);"><span>환불완료</span></a>
<?php }?>

                                                            </div>
                            <div class="my_lecture_btn-overlay"></div>
							                        </div>

<div class="nc-separator"></div>

          <?php } ?>                             

</div>
</form>
<?php 
}
}
}
?>	   
<script>
		 $(document).ready(function () {	

        $(".dagi span.num").text($('#d_count').val());
        $(".wan span.num").text($('#e_count').val());
		$(".cancel span.num").text($('#c_count').val());

});
</script>

<script type="text/javascript">

// ================================================================================================
// 링크
// ================================================================================================

function goLink(page,c_id,idx,sales_code,member_code,state,status,trs_no, trs_seq){
  
  var frmx = document.getElementById('lecture_list');


frmx.page.value=page;
frmx.c_id.value=c_id;
frmx.idx.value=idx;
frmx.sales_code.value=sales_code;
frmx.state.value=state;
frmx.member_code.value=member_code;
frmx.status.value=status;
frmx.trs_no.value=trs_no;
frmx.trs_seq.value=trs_seq;
frmx.action="./view.php"


frmx.submit();

}
</script>		
<?php
echo get_paging_ca(10, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&page=');
?> 


<?php }


?>


                   <!--<div class="nc-separator"></div>-->

                  
					
                </div>
            </div>
        </div>

<?php }



?>







<?php




if($s_status=="000" || $s_status=="001" || $s_status=="002"){
?>


<?php
$READY_API_URL = $NC_CARD_BURL."/payRequest_utf.php"	;
   
   	
?>
<!--
<script type="text/javascript" src="../s_js/AXUtil.js"></script>
<script src="https://web.nicepay.co.kr/flex/js/nicepay_tr_utf.js" language="javascript"></script>
-->
<script>
	$(function(){
	
	});
	
	/**
	결제를 취소 할때 호출됩니다.
	*/

</script>
<script type='text/javascript'> 





function ajaxJSON(url,data,fn_success,fn_error){
//	
//	if(GV_SEARCH_FLAG){
//		alert('처리중입니다.');
//		return;
//	}
//	
//	GV_SEARCH_FLAG = true;
//	loading(true);
	
	
	try{
		window.setTimeout(function(){
			$.ajax({
		      	'url':url,
		      	'type':'post',
		      	'data':data,
		      	'dataType':'json',
		      	'async':false,
		      	'success':function(result){
		      		if(result.resCode=='0'){
		      			fn_success(result);
		      		}else{
		      			
		      			if(fn_error!=undefined){
		      				fn_error(result);
		      			}
		      			
		      			alert(result.message);
		      			
		      		}
		      	},
				complete : function() {
//					GV_SEARCH_FLAG = false;
//					loading(false);
				},
				error : function(request, status, error) {
				
					if (request.status == "901") {
						
						var errMsg = "비인가된 접근입니다.";
						if (request.responseText) {
							errMsg = request.responseText;
						}
						alert(errMsg);
						location.href="/";
						return;
					}

//					if(request.status == '401'){
//						top.location.href="../home/Login.jsp";
//					}else{
						alert('처리중 에러가 발생 하였습니다.')
//					}
//					
//					GV_SEARCH_FLAG = false;
//					loading(false);
				}
	      });
		},50);
		
		
	}catch(e){
		alert(e);
	}
}


function goLink(page,c_id,idx,sales_code,member_code,state,status,trs_no){
  
  var frmx = document.getElementById('lecture_list');


frmx.page.value=page;
frmx.c_id.value=c_id;
frmx.idx.value=idx;
frmx.sales_code.value=sales_code;
frmx.member_code.value=member_code;
frmx.state.value=state;
frmx.status.value=status;
frmx.trs_no.value=trs_no;
frmx.action="<?php echo NC_MYPAGE_URL;?>/view.php"


frmx.submit();


}


 var READY_API_URL = "<?=$READY_API_URL?>";


function goCard(goodsCode,goodsName,Center_ID,idx,goodsAmount,member_code,member_name,ptype,monthqty,scode,startdate,enddate,Trs_no, client_id){

<?php if($s_status=='002'){?>

$.ajax({
        url:'./ajax.reservation_proc.php',
        type: "POST",
        data: $(frm).serialize(),
	    accept : "application/json",
        dataType: "json",
		data:{'sales_code': scode,'unit_price':goodsAmount,'start_date':startdate,'end_date':enddate,'first_start_day_yn':'Y', 'monthqty':monthqty, 'center_id':Center_ID},
        async: true,
        cache: false,
		success: function(data, textStatus) {
			//console.log(data);
			//setTimeout(function(){isAjaxing = false;},10000);
            if(data.rstate != "") {
                //alert(data.rstate);
					
				//console.log(data.rstate);
				if ( data.rstate=='30' ) {
						
				NC.alert({
				title    : '이미 신청한 강좌입니다.',
				message  : '마이페이지 > 내강좌에서 확인하세요.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			  // location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001";
	        
				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});


					return false;
                   
                }else if(data.rstate=='40'){

				NC.alert({
				title    : '이미 결제한 강좌이거나 수강중입니다.',
				message  : '마이페이지 > 내강좌에서 확인하세요.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			  // location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001";
	        
				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});


					return false;
				}else if(data.rstate=='50'){


              NC.alert({
				title    : '해당 강좌는 마감되었습니다.',
				message  : '다른 강좌를 선택해 주세요.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			  // location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001";
	        
				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});

					return false;
				}else if(data.rstate=='60'){


              NC.alert({
				title    : '해당월 강좌 할인 수량을 초과하였습니다.',
				message  : '',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			  // location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001";
	        
				},
               on_cancel  : function(){
               
			   //location.href="<?php echo NC_URL; ?>";
	        
				},
			});

					return false;
				}else if(data.rstate=='3'){

  /*
          NC.alert({
				title    : '재수강신청이 완료되었습니다.',
				message  : '로그인 하시겠습니까?'
		  });
*/
		  location.href="./lindex.php";


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
					 
					 
				}else if(data.rstate=='8'){
					//$( '.v_btn.v_btn_check' ).addClass('no');
			        //$( '.teacher_inv_top .lec_status span' ).text('이미 결제한 강좌입니다.');
					//$( '.v_btn.v_btn_check em' ).text('중복신청불가');
					NC.alert('이미 결제한 강좌입니다.');
				}else if(data.rstate=='5'){
					//성별 상태
					 NC.alert('해당 강좌에 제한된 성별입니다!!');
					  return false;
					 
					 
				}else if(data.rstate=='6' || data.rstate=='7'){
					//나이 상태
					NC.alert('해당 강좌 신청가능 나이가 아닙니다!!');
				    return false;
					  
					 
				}else if(data.rstate=='11'){
					//나이 상태
					NC.alert('접수오류');
				    return false;
					  
					 
				}						
				
				
		        return false;
            }
              


                 
                   
                //}
          
        },error:function(request, status,error){
		 // setTimeout(function(){isAjaxing = false;},10000);	
		}
    });

<?php }else{?>

console.log('2');


$.ajax({
        url:'./ajax.basket_check.php',
        type: "POST",
	    accept : "application/json",
        dataType: "json",
		data:{'sales_code': scode, 'center_id':Center_ID, 'idx':idx},
        async: true,
        cache: false,
		success: function(data, textStatus) {
	


            if(data.ResultCode != "") {
                //alert(data.rstate);
					
				//console.log(data.rstate);
				if (data.ResultCode=='001') {





  var frm = document.getElementById('lecture_list');

 var Frm = document.lecture_list;
   var Amt = goodsAmount;
   var trs_no = Trs_no;
   //var gName = Frm.GoodsName.value.substring(0, 10);

	var goodsName2 = goodsName.substring(0, 35);

 AUTHNICE.requestPay({
      clientId: client_id,
      method: 'card',
      orderId: '' + trs_no + '',
      amount: '' + Amt + '',
      goodsName: '' + goodsName2 + '',
	  buyerName: '' + member_name + '',
      returnUrl: '<?php echo $NC_CARD_BURL;?>/response.php?idx='+idx+'&trs_no='+trs_no+'&center_id='+Center_ID  ,
      fnError: function (result) {
         alert('' + result.errorMsg + '')
      }
   });




						
	

                }else{


         if (data.ResultCode=='004') {

		     	NC.alert({
				title    :  data.Msg,
				message  : data.ResultMsg,
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){
               

			    location.href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>";
                
					return false;
                   

				},
               on_cancel  : function(){
               
			   location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>";

			   
			    return false;
                   
	        
				},
			});

		 }else{



         	NC.alert({
				title    :  data.Msg,
				message  : data.ResultMsg,
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
               


              if (data.ResultCode=='002') {

	             location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>";
                   
			  }else if (data.ResultCode=='005' || data.ResultCode=='006') {

			  

                 location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>";

			  }else if (data.ResultCode=='003' || data.ResultCode=='009') {

			  

                 location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>";

			  }
                


					return false;
                   

				},
               on_cancel  : function(){
               
	        
				},
			});





		 }



				}


          

     

 }


        },error:function(request, status,error){
		 // setTimeout(function(){isAjaxing = false;},10000);	
		}
    });






<?php }?>




}

<?php if($s_status=='002'){?>


	
<?php }else{?>



<?php }?>


</script> 
<?php }?>

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


	});

</script>
<?php }?>
</div>
</div>
</div>

</main>
