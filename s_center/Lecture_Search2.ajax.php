<?php
include_once("./_common.php");
header('Content-Type: application/json');

$sales_place_code = $_POST["area"];
$ip=get_real_client_ip();
$member_id       = get_session('m_id');
$center_id = '01';


$json_string = CF_Search_Place ($center_id, $sales_place_code, $member_id, $url, $ip);

$json_array = json_decode($json_string, true); 

?>
<style>

.step_box2 .step_items > li .cont ul li {
    padding: 0;
    border-right: 0px solid #e3e3e3;
    display: inline-block;    width: calc((100% / 8) - 8px);margin: 4px;
}
.step_box2 .step_items > li .cont button {
    /* width: 100%; */
    /* height: 4rem; */
    padding: 0 2rem;
    font-size: 1.6rem;
    color: #666666;
    text-align: center;
    font-weight: 500;
    line-height: 1;
    border: 1px solid #dae1e6;
    background: #ffffff;
    word-break: keep-all;
    padding: 10px;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #FEFEFE; border-radius: 10px;
    height: 50px;
    color: #2c7fdf;
    font-size: 16px;
}
.step_box2 .step_options{
display:none;
}
.step_box2 .step_items > li .cont{

height:auto;
}
.step_box2 .step_items > li .cont ul {
    height: 100%;
    padding: 0;
    border-right: 0px solid #e3e3e3;
}
.step_box2 .step_items > li:first-child .cont {
    border-left-width:0px;
	border: 0px solid #e3e3e3;
}
.step_box2 .step_items {
    text-align: center;
}
.step_box2 .step_items > li .cont .on button {
    background-color: #2e3d61;
    font-weight: 500;
    color: #fff;
}

@media screen and (max-width: 1023px){
.step_box2 .step_items > li .cont {
    display: none;
    max-height: 350px;
    height: auto;
    border-width: 0 0px !important;
}
}
@media screen and (max-width: 768px){
.step_box2 .step_items > li .cont ul li {
    padding: 0;
    border-right: 0px solid #e3e3e3;    float: left;
    display: inline-block;    width: calc((100% / 3) - 6px);margin: 0 3px 10px;;
}
.rank_list2 td {
    height: 70px;
    padding-right: 2px;
    border-top: 1px solid #f3f3f3;
    float: left;
    padding-left: 15px;
}
}

</style>
<!-- 강좌찾기 -->
	<ul class="step_items">
		<li class="on">
			<h5 class="title" style="display:none;">
				<button type="button">
					<span>업장</span>
				</button>
			</h5>
			<div class="cont" id="first_select">
				<input type="hidden" id="subSChkVal" name="subChkVal" value="" />
			     
				<ul>
		
<?php
if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{			

		    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
	        
	
        	}

	
		$place_code=$val['Place_Code'];
		$place_name=$val['Place_Name'];
		    

?>					
					
					<li class="js_select" data-id="<?php echo $place_code;?>" data-txt="<?php echo $place_name;?>"><button type="button" onclick="javascript:clickCdNum('<?php echo $place_code;?>')" value="<?php echo $place_code;?>" name="btn" id="btn" class="btn" >
							<span><?php echo $place_name;?></span>
						</button></li>
				
					


<?php
}
?>



<?php


			}

?>

</ul>
<?php

}

?>


			</div>
		</li>
		<li class="on" style="display:none;">
			<h5 class="title">
				<button type="button">
					<span>종목</span>
				</button>
			</h5>
			<div class="cont">
		
				<ul id="subStepList">

				</ul>
			
			</div>
		</li>
		<li class="on" style="display:none;">
			<h5 class="title">
				<button type="button">
					<span>분류</span>
				</button>
			</h5>
			<div class="cont">
	
				<ul id="sSubStepList">
				
				</ul>
	
			</div>
		</li>
	</ul>
	<div class="step_options">
		<dl>
			<dt>추가선택</dt>
			<dd>
				<form id="quickSrchFm">
				<input type="hidden" id="item0" name="item0" value="" />
				<input type="hidden" id="item1" name="item1" value="" />
				<input type="hidden" id="item2" name="item2" value="" />
				<input type="hidden" id="item3" name="item3" value="" />
				<input type="hidden" id="item4" name="item4" value="" />
				<input type="hidden" id="page" name="page" value="" />
				<input type="hidden" id="ordType" name="ordType" value="" />
				<input type="hidden" id="reqType" name="reqType" value="A" />
				
				</form>				
			</dd>
		</dl>
		 <div class="btn_area">
           <div class="" id="tag_area">
           <ul class="first">
 		   </ul>
		      <ul class="second">
 		   </ul>
		   	<ul class="third">
 		   </ul>
           </div>

		   <div class="button_area" style="display:none;">
         <button type="button" class="btn_L_col1" onclick="javascript:reset()" disabled>
			<span>초기화</span>
		</button>
		<button type="button" class="btn_L_col2" onclick="javascript:searchSbjtList()">
			<span>강좌검색</span>
		</button>
		
		</div>
		</div>
<!-- //강의찾기 -->

<script>

$(document).ready(function() {
var sum = 0;

$('#first_select ul li').each(function() {
   //sum += $(this).height();
});

console.log(sum);
if($(document).width() > 768 ){
if(sum >210){
//$('#first_select ul').height(sum);
}else{


//$('#first_select ul').height('100%');

}
}
/*

function nicescroll_init() {

    $('.nicescroll_area_outer').niceScroll({
        autohidemode       : false,
        cursorborder       : "0px solid #f4f5f6",
        cursorcolor        : "#aaa",
        background         : "#ddd",
        cursorwidth        : 6,
        cursorborderradius : "0px",
        railoffset		   : {top: 0, left: 0}
    });

}


		 $(".nicescroll_area").getNiceScroll().remove();
		 nicescroll_init();
	  */
});




	function clickCdNum(item2){
		//$("#sSbjtAreList").hide();





$('.step_box2 .step_items > li:nth-child(2) .title').addClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');
$('#first_select li.js_select').each(function(index, item){


$( '#tag_area' ).css("display","block");

var $selector   = $( '#tag_area' );
$selector.find( '.first li[data-target="' + $(this).data( 'id' ) + '"]' ).remove();
$selector.find( '.second li' ).remove();
$selector.find( '.third li' ).remove();
if ( $(this).data('id') == item2 ) {




//console.log( $(this).data('txt'));

                 var $new = $( '<li  onclick="del()" data-target='+$(this).data("id")+'>');

                        $new.append( $( '<span />', { text: $(this).data( 'txt' ) } ) );
                        $new.append( $( '<button />', { type: 'button', class: 'select_cancel', html: $( '<i />', { class: 'sr_only', text: '선택취소' } ) } ) );

                        $new.appendTo( $selector.find( 'ul.first' ) );

  }else{


   $selector.find( '.first li[data-target="' + $(this).data( 'id' ) + '"]' ).remove();

  }



});



		$('.btn_L_col2').attr('disabled', false);
		$('.btn_L_col1').attr('disabled', false);
		var target = $(".chkVal").children().val();
		$("#subSChkVal").val(item2);
		var area = "<?php echo $sales_place_code;?>";
		$.ajax({
			type : 'POST',
			url :  "./s_center/Lecture_Search_Step_012.ajax.php",
			dataType : 'html',
			data : {'item2':item2, 'target':target, 'area':area},
			async:false,
            cache : false,
			contentType:"application/x-www-form-urlencoded; charset=UTF-8",
			success : function(data){
				$('#subStepList').empty();
				$('#sSubStepList').empty();
				$('#subStepList').html(data);
				
			 }
			, error : function(){
			}
		});	
		



		if($("#subSChkVal").val() != undefined || $("#subSChkVal").val() != "" || $("#subSChkVal").val() == ""){
			if($("#subSChkVal2").val() != undefined || $("#subSChkVal2").val() != "" || $("#subSChkVal2").val() == ""){
				if($("#item5").val() != undefined || $("#item5").val() != "" || $("#item5").val() == ""){
		

     				$("#item0").val($("#quickFrm [name=target1]").val());
					$("#item1").val($("#quickFrm [name=area1]").val());
					$("#item2").val($("#quickFrm [name=item21]").val());
					$("#item3").val($("#quickFrm [name=learnstep1]").val());
					$("#item4").val($("#quickFrm [name=item5]").val());
					$("#page").val($("#quickFrm [name=page]").val());
					$("#ordType").val(ordType);


                   if($("#item1").val()==''){

                        $("#item1").val($(".tabs2 li.on").find('a').data('id'));

				   }

                 

					var quickSrchFm = $('#quickSrchFm').serialize();
				

                




				 	$.ajax({
						type : 'POST',
								url :  "./s_center/Lecture_Search_List2.ajax.php",
						dataType : 'html',
						data : quickSrchFm,
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						
           beforeSend: function( xhr ) {
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");	   


           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");

	       },
						success : function(data){

						



							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						



						 }

						, error : function(){
						},
    		complete:function()
    		{
    			    	   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //$('#dbloading').css('display','none');
		  // console.log('로딩완료');


		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 450);


    		}
					});

      	 





       //  jQuery('html,body').animate({
       //     scrollTop : $('#sSbjtAreList').offset().top - $('#header').height()-10
       //  }, 800);



				}else{
					NC.alert("분류를 선택하세요");
				}

			}else{
				NC.alert("종목을 선택하세요");
			}
		
		}else{
			NC.alert("업장을 선택하세요");
		}






	}
function reset(){

	$( '#tag_area' ).css("display","none");
$('#subStepList').empty();
$('#sSubStepList').empty();
$( '#tag_area ul.first').empty();
$( '#tag_area ul.second').empty();
$( '#tag_area ul.third').empty();
		$('#ss_code').val('');
		$('#gg_code').val('');
		$('#bb_code').val('');
		$('#item1').val('');
		$('#item2').val('');
		$('#item3').val('');
		$('#item4').val('');
        $('#item5').val('');
		$('#item21').val('');
		$('#learnstep1').val('');
		$('#area1').val('');

$('.btn_L_col1').attr('disabled', true);

$('.step_box2 .step_items > li:nth-child(2) .title').removeClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');





$('.js_select').removeClass('on');
				 	$.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List2.ajax.php",
						dataType : 'html',
						data : {'item1':'<?php echo $sales_place_code;?>','target':''},
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){

			
					    
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
		


						 }

						, error : function(){
						}
					});

         jQuery('html,body').animate({
            scrollTop : $('#quickLecture').offset().top - $('#header').height()-10
         }, 800);



}
	function searchSbjtList(ordType){

   		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");	   


           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");


		if($("#subSChkVal").val() != undefined || $("#subSChkVal").val() != "" || $("#subSChkVal").val() == ""){
			if($("#subSChkVal2").val() != undefined || $("#subSChkVal2").val() != "" || $("#subSChkVal2").val() == ""){
				if($("#item5").val() != undefined || $("#item5").val() != "" || $("#item5").val() == ""){
		

     				$("#item0").val($("#quickFrm [name=target1]").val());
					$("#item1").val($("#quickFrm [name=area1]").val());
					$("#item2").val($("#quickFrm [name=item21]").val());
					$("#item3").val($("#quickFrm [name=learnstep1]").val());
					$("#item4").val($("#quickFrm [name=item5]").val());
					$("#page").val($("#quickFrm [name=page]").val());
					$("#ordType").val(ordType);


                   if($("#item1").val()==''){

                        $("#item1").val($(".tabs2 li.on").find('a').data('id'));

				   }

                 

					var quickSrchFm = $('#quickSrchFm').serialize();
				

                




				 	$.ajax({
						type : 'POST',
								url :  "./s_center/Lecture_Search_List2.ajax.php",
						dataType : 'html',
						data : quickSrchFm,
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){

						



							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						



						 }

						, error : function(){
						}
					});

      	   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //$('#dbloading').css('display','none');
		  // console.log('로딩완료');

		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 550);



         jQuery('html,body').animate({
            scrollTop : $('#sSbjtAreList').offset().top - $('#header').height()-10
         }, 800);



				}else{
					NC.alert("분류를 선택하세요");
				}

			}else{
				NC.alert("종목을 선택하세요");
			}
		
		}else{
			NC.alert("업장을 선택하세요");
		}
	}







</script>
