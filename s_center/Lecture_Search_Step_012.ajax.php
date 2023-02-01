<?php
include_once("./_common.php");
header('Content-Type: application/json');

$sales_place_code = $_POST["area"];
$ip=get_real_client_ip();
$member_id       = get_session('m_id');
$center_id = '01';
$place_code=$_POST["item2"];

$json_string =  CF_Search_Event ($center_id, $sales_place_code, $place_code, $member_id, $url, $ip);

$json_array = json_decode($json_string, true); 

?>
<form name="quickFrm" id="quickFrm">
	<input type="hidden" id="item5" name="item5" value="" />
	<input type="hidden" name="target1" value="" />
	<input type="hidden" name="area1" value="<?php echo $sales_place_code;?>" />
	<input type="hidden" name="item21" value="<?php echo $place_code;?>" />
<input type="hidden" id="subSChkVal2" name="subSChkVal2" value="" />

<?php
if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	


}else{			

		    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
	        
	
        	}

	
		$event_code=$val['Event_Code'];
		$event_name=$val['Event_Name'];
		    

?>					


<li class="js_select" data-id="<?php echo $event_code;?>" data-txt="<?php echo $event_name;?>">
		<button type="button" onclick="javascript:subClickCdNum('<?php echo $event_code;?>')" name="btn" id="btn" class="btn" value="<?php echo $event_code;?>">
			<span><?php echo $event_name;?></span>
		</button>
	</li>


<?php
}
?>



<?php


			}

?>
<?php

}

?>
</form>
<script>
function subClickCdNum(learnstep){


	console.log('두번째클릭');
	var item2 = "<?php echo $place_code;?>";
	var area = "<?php echo $sales_place_code;?>";
	$('.btn_L_col2').attr('disabled', false);
$('#tag_area ul.third li').remove();

		$('#item21').val('');
		$('#item3').val('');
		$('#item4').val('');
        $('#item5').val('');
//console.log(learnstep);

$('.step_box2 .step_items > li:nth-child(3) .title').addClass('on');

$('#subStepList li.js_select').each(function(index, item){

var $selector   = $( '#tag_area' );
$selector.find( '.second li[data-target="' + $(this).data( 'id' ) + '"]' ).remove();




if ( $(this).data('id') == learnstep ) {


//console.log( $(this).data('txt'));

                 var $new = $( '<li onclick="javascript:del2()"  data-target='+$(this).data("id")+'>');

                        $new.append( $( '<span />', { text: $(this).data( 'txt' ) } ) );
                        $new.append( $( '<button />', { type: 'button', class: 'select_cancel', html: $( '<i />', { class: 'sr_only', text: '선택취소' } ) } ) );

                        $new.appendTo( $selector.find( 'ul.second' ) );

  }else{


   $selector.find( '.second li[data-target="' + $(this).data( 'id' ) + '"]' ).remove();

  }



});






	$("#subSChkVal2").val(learnstep);
	var target = $(".chkVal").children().val();
 	$.ajax({
		type : 'POST',
    	url :  "./s_center/Lecture_Search_Step_022.ajax.php",
		dataType : 'html',
		data : {'item2':item2, 'target':target, 'learnstep':learnstep, 'area':area},
		async:false,
        cache : false,
		contentType:"application/x-www-form-urlencoded; charset=UTF-8",
		success : function(data){

	
			
			$('#sSubStepList').empty();
			$('#sSubStepList').html(data);
			
		 }
		, error : function(){
		}
	});
	

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
					//$("#item3").val($("#quickFrm [name=learnstep1]").val());
					//$("#item4").val($("#quickFrm [name=item5]").val());
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
          }, 300);



    //     jQuery('html,body').animate({
    //        scrollTop : $('#sSbjtAreList').offset().top - $('#header').height()-10
    //     }, 800);



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
