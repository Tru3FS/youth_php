<?php
if(!defined('_SAMSUNG_')) exit;

//$_SESSION["sales_code"] = $sales_code;

//echo $sales_code;
//echo $s_code;
//echo $g_code;
//echo $b_code;

//echo $unitprice;

$event_name=urldecode($event_name);



if($s_code==""){
   $jtext=$cc_id;
   }else{
   $jtext=$cc_id;
}

if($cx_id==''){

$cx_id='01';

}


//------------------------------------------------------------------------------------
// ● 함수명 : CF_Search_Sales_Code_Info
// ● 설  명 : 프로그램 상세 조회
//------------------------------------------------------------------------------------

$json_string = CF_Search_Sales_Code_Info2('01',$sales_code,$unitprice);

$json_array = json_decode($json_string, true); 


//echo $sales_code;

if($json_array['Result']['ResultCode'] == -10 || $sales_code==''){
 //echo $json_array['Result']['ResultMsg'];
	   
?>

<script>
  location.href = 'http://112.217.123.82:10001/Noble/';
</script>

<?php

}else{


 foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

   
        
		if ($len == 0){
	      


        	}
		
		 $lecture_place=$val['Lecture_Place'];
		  $s_date=$val['Start_Date'];
		  $s_date1 = substr($s_date,0,4);
		  $s_date2 = substr($s_date,4,2);
		  $s_date3 = substr($s_date,6,2);


         $e_date=$val['End_Date'];
		  $e_date1 = substr($e_date,0,4);
		  $e_date2 = substr($e_date,4,2);
		  $e_date3 = substr($e_date,6,2);


		   $s_time=$val['Start_Time'];
		   $s_time1 = substr($s_time,0,2);
		   $s_time2 = substr($s_time,2,2);

		   $e_time=$val['End_Time'];
		   $e_time1 = substr($e_time,0,2);
		   $e_time2 = substr($e_time,2,2);
		
		 
		$lecture_introduce=$val['Lecture_Introduce'];
		$lecture_detail_contents=$val['Lecture_Detail_Contents'];
		$lecture_guide=$val['Lecture_Guide'];

        $sales_item_name=$val['Sales_Item_Name'];
		$event_name=$val['Event_Name'];
        $sales_place_code=$val['Sales_Place_Code'];
		$sales_division=$val['Sales_Division'];
		$vat_yn=$val['Vat_Yn'];
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

	 $unitprice=$val['Unit_Price'];
	 $state=$val['State'];

$month_qty=$val['Month_Qty'];

$week_name=$val['Week_Name'];
$lecture_place=$val['Lecture_Place'];

$monthqty= $month_qty*1;

$json_string = CF_Basket_Check ($cx_id, $sales_division, get_session('m_code'), $sales_code, $sales_item_name, $week_name, $month_qty, $monthqty,  $unitprice, $s_date, $e_date, $vat_yn, get_session('m_id'), $url, $ip);


$json_array = json_decode($json_string, true); 

//if($json_array['Result']['ResultCode'] == -30){
 //echo $json_array['Result']['ResultMsg'];
//$state_idx="0";
//$state_txt="이미 신청한 강좌입니다.";

//}elseif($json_array['Result']['ResultCode'] == -40){
 //echo $json_array['Result']['ResultMsg'];

//$state_idx="1";
//$state_txt="이미 결제한 강좌이거나 수강중입니다.";
//}elseif($json_array['Result']['ResultCode'] == -50){
 //echo $json_array['Result']['ResultMsg'];



//$state_idx="2";
//$state_txt="해당 강좌는 마감되었습니다.";
//}else{
//$state_idx="3";
//$state_txt="수강신청중";
//}





$json_string = CF_Web_Application_Search ('01', $sales_place_code, $s_code, $g_code, $b_code);


$json_array = json_decode($json_string, true); 

if($json_array['Result']['ResultCode'] == -10){

}else{



		    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
	        
	
        	}




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


//if($json_array['Result']['ResultCode'] == -30){
 //echo $json_array['Result']['ResultMsg'];
 // $state_idx="0";
 // $state_txt="이미 신청한 강좌입니다.";

//}elseif($json_array['Result']['ResultCode'] == -40){
 //echo $json_array['Result']['ResultMsg'];

//$state_idx="1";
//$state_txt="이미 결제한 강좌이거나 수강중입니다.";
//}elseif($json_array['Result']['ResultCode'] == -50){
//echo $json_array['Result']['ResultMsg'];

//$state_idx="2";
//$state_txt="해당 강좌는 마감되었습니다.";
//}else{
//$state_idx="3";
//$state_txt="수강신청중";
//}





	if($toymd  >= $Web_New_Start && $toymd <= $Web_New_End){
		if($toyhm >= $Web_New_STime && $toyhm <= $Web_New_ETime){
		
		
  if($json_array['Result']['ResultCode'] == -30){
 //echo $json_array['Result']['ResultMsg'];
  
  $state_idx="0";
  $s_class="bgb";	
  $s_txt="이미 신청한 강좌입니다.";	
  $s_txt2="온라인 강좌접수 기간입니다.";	
  $s_tag = 'N';
}elseif($json_array['Result']['ResultCode'] == -40){
 //echo $json_array['Result']['ResultMsg'];

$state_idx="1";
$state_txt="이미 결제한 강좌이거나 수강중입니다.";
}elseif($json_array['Result']['ResultCode'] == -50){
//echo $json_array['Result']['ResultMsg'];
$s_class="bgb";	
$s_txt="접수마감";
$s_txt2="온라인 접수가 마감되었습니다.";	
$state_idx="2";
$s_tag = 'N';
}else{
$s_class="";	
$state_idx="3";
$s_txt="강좌접수중";	
$s_txt2="온라인 강좌접수 기간입니다.";	
$s_tag = 'Y';
}
		
		
		
		}else{
			$s_txt="접수준비";	
			$s_txt2="온라인 강좌접수 기간이 아닙니다.";	
			$state_idx="2";
			//$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'N';	
		}
	}else if($toymd  >= $Web_Re_Start && $toymd <= $Web_Re_End){
		if($toyhm >= $Web_Re_STime && $toyhm <= $Web_Re_ETime){
			$s_class="bgr";	
			$s_txt="내강좌 ··> 강좌이력현황에서 진행하세요.";
			$s_txt2="재등록 강좌접수 기간입니다.";	
			$state_idx="4";
			//$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'Y';
		}else{
		    $s_txt="접수준비";	
			$s_txt2="온라인 수강신청 기간이 아닙니다.";	
			$state_idx="2";
			//$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
			$s_tag = 'N';
		}
	}else{ 
	$s_txt="접수불가";	
	$s_class="bgb";	
	$s_txt2="온라인 접수 기간이 아닙니다.";	
	$state_idx="5";
	//$s_people="<span>".$row2['Capacity_On_OffLine'].	"</span>";	
	$s_tag = 'N';	
	}

}




 }
	 }
	 }
?>		
  
 
<main id="main" class="main_container">

<div class="wrap">

<ul id="nc-breadcrumb" class="nc-breadcrumb" style="display:none;"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>프로그램정보</span></li></ul>


<div class="article_header"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko"><?php echo $sales_item_name;?></h1></div></div></div>

<form name="program_form" class="program_form" id="program_form" method="post">
<input type="hidden" name="sales_code" id="sales_code" value="<?php echo $sales_code;?>">

<input type="hidden" name="page" value="<?php echo $page;?>">
<div class="program_wrap">
                            <div class="pro_top">
                                <div class="pro_top_inner pro_top_inner_6">

                                                               <div class="nc-program-slide_aplay swiper-container">
															   <span class="visual_state <?php echo $s_class;?>"><?php echo $s_txt;?></span>
                                        <div class="nc-program-slide__inner swiper-wrapper">
                                            
                                                
                                                    
                                                        <div class="swiper-slide nc-program-slide__slide">
                                                            <figure class="nc-program-slide__figure nc-lazyload">
                                                                <span class="nc-lazyload__color-preview"></span>

                                                                <img class="nc-program-slide__img" data-unveil="../s_img/<?php echo $imgname;?>.jpg" src="../s_img/no_img.gif" alt="" />
                                                                <noscript><img class="nc-program-slide__img" src="../s_img/<?php echo $imgname;?>.jpg" alt="" /></noscript>
                                                            </figure>
                                                        </div>
                                                  
                                                    
                                                
                                                                                    </div>

                                        <div class="swiper_control">
                                            <div class="swiper-pagination"></div>
                                            <div class="swiper-progress-wrap"><span class="swiper-progress"></span></div>
                                            <div class="swiper_play_state play">
                                                <button class="swiper_play_state_btn swiper_state_play"><span class="sr_only">재생</span></button>
                                                <button class="swiper_play_state_btn swiper_state_pause"><span class="sr_only">일시정지</span></button>
                                            </div>
                                        </div>
                                    </div>
                                  


                                </div>
             
                                <div class="pro_top_inner pro_top_inner_3">
                                    <div class="program_wrap__info-wrap">
                                        <div class="info_area">
                                            <div class="program_wrap__info">
                                               
                                                    <p class="program_wrap__info-category"><?php echo $event_name?></p>

                                     
                                                <ul class="program_wrap__info-desc">
                                                    <li><span>강습장소</span><p><?php echo $lecture_place;?></p></li> 
                                                     <li><span>강습기간</span><p><?php echo $s_date1;?>-<?php echo $s_date2;?>-<?php echo $s_date3;?>~<?php echo $e_date1;?>-<?php echo $e_date2;?>-<?php echo $e_date3;?>(<?php echo $monthqty2;?>개월)</p></li>                                                      
													 <li><span>강습시간</span><p><?php echo $week_name;?> / <?php echo $s_time1;?>:<?php echo $s_time2;?> ~ <?php echo $e_time1;?>:<?php echo $e_time2;?></p></li>            
													 <li><span>수강요금</span><p>₩<?php echo number_format($unitprice);?></p></li>            
													 <li><span>접수기간</span><p><?php echo $s_txt2;?></p></li>  
													<!-- <?php if($state_idx!="3"){?> <li><span>접수상태</span><p><?php echo $state_txt;?> </p></li>  <?php }?>-->
													 </ul>

                                                    <div class='pr_btn_area'>
                                                    <!--<a href="javascript:void(0);" onclick="goLink('<?php echo $cc_id;?>','<?php echo $s_code;?>','<?php echo $g_code;?>','<?php echo $b_code;?>','<?php echo $page;?>');" title="" id="pro_list" class="nc_button blist">목록가기</a><a href="javascript:void(0)" id="btnSubmit" class="nc_button">수강신청</a>-->
													<a href="javascript:void(0);" onclick="goLink('<?php echo $cc_id;?>','<?php echo $s_code;?>','<?php echo $g_code;?>','<?php echo $b_code;?>','<?php echo $page;?>');" title="" id="pro_list" class="nc_button blist">목록가기</a><?php if($state_idx=="0"){?><a href="javascript:void(0)" id="btnSubmit2" class="nc_button one" >결제대기</a><?php }elseif($state_idx=="1"){?><a href="javascript:void(0)" id="btnSubmit" class="nc_button two" >결제완료</a><?php }elseif($state_idx=="5"){?><a href="javascript:void(0)" id="cbtnSubmit" class="nc_button bend" >접수불가</a><?php }elseif($state_idx=="4"){?><a href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=002" id="cbtnSubmit" class="nc_button bend" >재수강접수</a><?php }elseif($state_idx=="2"){?><a href="javascript:void(0)" id="cbtnSubmit" class="nc_button bend" >접수마감</a><?php }elseif($state_idx=="3"){?><a href="javascript:void(0)" id="btnSubmit" class="nc_button">수강신청</a><?php }else{?><?php }?>
                                                    </div>
                                                                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

 <div class="nc_tab">
                                <ul class="nc_tab__menu">
                                    <li class="nc_tab--active"><a href="#info"><span>강좌소개</span></a></li>
                                    <li><a href="#tinfo"><span>강좌세부내용</span></a></li>
                                    <li><a href="#guide"><span>강좌신청안내 및 주의사항</span></a></li>
                                 </ul><!-- 강의상세 -->

                                <div class="nc_tab__panels">
                                    <div id="info">
                                      <?php if($lecture_introduce!=''){?>
                                          
										 <?php echo $lecture_introduce;?>
                                         
									  <?php }else{?>
<div class="noResult"><p class="tit">강좌소개 준비중입니다.</p></div>

									  <?php }?>
									  
									
                                    </div><!-- 강좌소개 -->

                                    <div class="tinfo">
                                   <?php if($lecture_detail_contents!=''){?>
                                          
										 <?php echo $lecture_detail_contents;?>
                                         
									  <?php }else{?>
<div class="noResult"><p class="tit">강좌세부내용 준비중입니다.</p></div>

									  <?php }?>
                                    </div><!-- 강좌세부내용 -->

                                    <div id="guide">
                                      <?php if($lecture_guide!=''){?>
                                          
									 <?php echo $lecture_guide;?>
                                         
									  <?php }else{?>
<div class="noResult"><p class="tit">강좌신청안내 및 주의사항 준비중입니다.</p></div>

									  <?php }?>
                                    </div><!-- 이용안내 -->

                                  
                                </div><!-- .nc_tab__panels -->
                            </div><!-- .nc_tab -->


							</div>

<input type="hidden" id="center_id" name="center_id">
<input type="hidden" id="cc_id" name="cc_id">
<input type="hidden" id="u_code" name="u_code">
<input type="hidden" id="j_code" name="j_code">
<input type="hidden" id="d_code" name="d_code">
<input type="hidden" id="z_code" name="z_code">
<input type="hidden" id="idx" name="idx">
<input type="hidden" id="n_type" name="n_type">
<input type="hidden" id="z_codex" name="z_codex">
<input type="hidden" id="z_scode_idx2" name="z_scode_idx2" value="<?php echo $tcode;?>">
<input type="hidden" id="z_gcode_idx2" name="z_gcode_idx2"  value="<?php echo $z_gcode_idx;?>">
<input type="hidden" id="z_gcode" name="z_gcode"  value="<?php echo $z_gcode;?>">
<input type="hidden" id="z_scode" name="z_scode"  value="<?php echo $upjang;?>">


<input type="hidden" id="s_code" name="s_code"  value="<?php echo $s_code;?>">
<input type="hidden" id="g_code" name="g_code" value="<?php echo $g_code;?>">
<input type="hidden" id="b_code" name="b_code" value="<?php echo $b_code;?>">
<input type="hidden" id="sales_code" name="sales_code" value="<?php echo $sales_code;?>">
<input type="hidden" id="event_name" name="event_name" value="<?php echo $event_name;?>">
<input type="hidden" id="ntitle" name="ntitle" value="<?php echo $ntitle;?>">
<input type="hidden" id="cx_id" name="cx_id">
</form>
<style>

.nc_button.one{
background: #1d3661;
}
.nc_button.two{
background: #034EA2;
}
</style>
<?php
		
?>

</div>
</main>
<script type="text/javascript">


$(document).ready(function() {
 

            var _value="";
            var frm = document.frm; 
			




			
				$("#btnCancle").click(function(){

		    





			$("#program_form").attr("action","./reserv_cancle.php");
			//$("input[name='hp']").val($("#hp1").val()+"-"+$("#hp2").val()+"-"+$("#hp3").val());
			//$("input[name='tel']").val($("#tel1").val()+"-"+$("#tel2").val()+"-"+$("#tel3").val());

			if(confirm("예약신청을 취소하시겠습니까?")) $("#program_form").submit();
          
			else  return false;  
			//HiddenSecuiSubmit($("#frm"),"reservation_proc.php","2");	//암호화

		});	


    	$("#btnSubmit").click(function(){
 
    /*
           if(frm.agreex.checked!=true){ 
		    alert("요금 환불 약관 동의에 동의하신 후 진행 하실 수 있습니다."); 
		    frm.agreex.focus();
		    return false; 
	        }
     */
			//$("#frm").attr("action","./reservation_proc.php");
			//$("input[name='hp']").val($("#hp1").val()+"-"+$("#hp2").val()+"-"+$("#hp3").val());
			//$("input[name='tel']").val($("#tel1").val()+"-"+$("#tel2").val()+"-"+$("#tel3").val());
            
	
			
		$.ajax({
        url:'./ajax.reservation_proc.php',
        type: "POST",
        data: $(frm).serialize(),
	    accept : "application/json",
        dataType: "json",
		data:{'sales_code':'<?php echo $sales_code;?>','unit_price':'<?php echo $unit_price;?>'},
        async: true,
        cache: false,
		success: function(data, textStatus) {
			//console.log(data);
			//setTimeout(function(){isAjaxing = false;},10000);
            if(data.rstate != "") {
                //alert(data.rstate);
					
				//console.log(data.rstate);
				if ( data.rstate=='30' ) {
						
                    //$( '.v_btn.v_btn_check' ).addClass('no');
			        //$( '.teacher_inv_top .lec_status span' ).text('이미 신청한 강좌입니다.');
					//$( '.v_btn.v_btn_check em' ).text('중복신청불가');
					//NC.alert('이미 신청한 강좌입니다.');


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
					
					//$( '.v_btn.v_btn_check' ).addClass('no');
					//$( '.v_btn.v_btn_check em' ).text('접수마감');
					//NC.alert('이미 결제한 강좌이거나 수강중입니다.');

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
					
					//$( '.v_btn.v_btn_check' ).addClass('no');
					//$( '.v_btn.v_btn_check em' ).text('접수마감');
					//NC.alert('해당 강좌는 마감되었습니다.');

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
				}else if(data.rstate=='3'){
					
					//$( '.teacher_inv_top .lec_status span' ).text('온라인 접수가 완료되었습니다.');
					//$( '.v_btn.disabled' ).addClass('v_btn_check');
					//$( '.v_btn.v_btn_check' ).addClass('no');
					//$( '.v_btn.v_btn_check em' ).text('접수완료');
					//alert('온라인 접수가 완료되었습니다.');
					//document.location.href="<?php echo NC_MYPAGE_URL; ?>/llist.php";
				NC.alert({
				title    : '온라인 접수가 완료되었습니다.',
				message  : '마이페이지에서 결제를 진행하시겠습니까?',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){
               
			   location.href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001";
	        
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
														rsult += "<input type='hidden' name='redirect_to' value='<?php echo NC_CENTER_URL;?>/lecture_view.php'>";	
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
					  
					 
				}else if(data.rstate=='9'){
					//온라인 수강신청 기간 확인
					NC.alert('온라인 접수기간 및 시간이 아닙니다.!!');
				    return false;
					  
					 
				}else if(data.rstate=='10'){
					//온라인 수강신청 기간 버튼 활성화
					  
					  $( '.teacher_inv_top .lec_status span' ).removeClass('lec_status_off');
					  $( '.teacher_inv_top .lec_status span' ).addClass('lec_status_on');
					  $( '.teacher_inv_top .lec_status span' ).text('온라인 수강신청 기간입니다.');
					  $( '.v_btn.disabled' ).addClass('v_btn_check');
					  $( '.v_btn.v_btn_check em' ).text('수강신청하기');
					  //location.reload();
					  //return true; 
				}else if(data.rstate=='11'){
					//온라인 수강신청 기간 확인
					NC.alert('강좌접수 신청 시 오류가 발생하였습니다!!');
				    return false;
					  
					 
				}else if(data.rstate=='12'){
					NC.alert('할인적용을 받을 수 있습니다.!! 성인 금액을 선택하세요!!');
				    return false;
					  
					 
				}else if(data.rstate=='97'){
					//온라인 수강신청 기간 확인
					NC.alert('백신 접종일이 확인되지 않았습니다!! 센터에 문의해 주세요!!');
				    return false;
					  
					 
				}else if(data.rstate=='98'){
					//온라인 수강신청 기간 확인
					NC.alert('백신 접종 유효기간이 경과하였습니다!! 센터에 문의해 주세요!!');
				    return false;
					  
					 
				}else if(data.rstate=='99'){
					//온라인 수강신청 기간 확인
					NC.alert('백신 패스가 확인되지 않았습니다!! 센터에 문의해 주세요!!');
				    return false;
					  
					 
				}
				
				
				
		        return false;
            }
              


                 
                   
                //}
          
        },error:function(request, status,error){
		 // setTimeout(function(){isAjaxing = false;},10000);	
		}
    });
			//if(confirm("수강신청하시겠습니까?")) $("#frm").submit();
          
			//else  return false;  
			//HiddenSecuiSubmit($("#frm"),"reservation_proc.php","2");	//암호화

		});
  
	});


// ================================================================================================
// 링크
// ================================================================================================
function goLink(center_id,s_code,g_code,b_code,page){
  
  var frm = document.getElementById('program_form');


frm.cc_id.value=center_id;
frm.center_id.value=center_id;
frm.cx_id.value=center_id;
frm.s_code.value=s_code;
frm.g_code.value=g_code;
frm.b_code.value=b_code;
frm.page.value;
frm.n_type.value="program";
frm.action="<?php echo NC_URL;?>/index3.php"


frm.submit();

}







</script>
