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
.count_area p {
    font-weight: 500;
}
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
    border: 1px solid #e6e7e9;
    background: #ffffff;
    word-break: keep-all;
    padding: 10px;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #FEFEFE; border-radius: 10px;
    height: 50px;
    color: #006ecd;
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
    font-weight: bold;
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
}

</style>
<!-- 강좌찾기 -->
	<ul class="step_items">
		<li class="on">
			<h5 class="title">
				<button type="button">
					<span>업장</span>
				</button>
			</h5>
			<div class="cont">
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
					
					<li class="js_select"><button type="button" onclick="javascript:clickCdNum('<?php echo $place_code;?>')" value="<?php echo $place_code;?>">
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
		<li class="on">
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
		<li class="on">
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
				<input type="hidden" id="ordType" name="ordType" value="" />
				<input type="hidden" id="reqType" name="reqType" value="A" />
				
				</form>				
			</dd>
		</dl>
		<button type="button" class="btn_L_col2" onclick="javascript:searchSbjtList()" disabled>
			<span>강좌검색</span>
		</button>
<!-- //강의찾기 -->

<script>

	function clickCdNum(item2){
		$("#sSbjtAreList").hide();
		$('.btn_L_col2').attr('disabled', true);
		var target = $(".chkVal").children().val();
		$("#subSChkVal").val(item2);
		var area = "A100";
		$.ajax({
			type : 'POST',
			url :  "./s_center/Lecture_Search_Step_01.ajax.php",
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
		
	}
	
	function searchSbjtList(ordType){
		if($("#subSChkVal").val() != undefined && $("#subSChkVal").val() != ""){
			if($("#subSChkVal2").val() != undefined && $("#subSChkVal2").val() != ""){
				if($("#item5").val() != undefined && $("#item5").val() != ""){
		
					$("#item0").val($("#quickFrm [name=target1]").val());
					$("#item1").val($("#quickFrm [name=area1]").val());
					$("#item2").val($("#quickFrm [name=item21]").val());
					$("#item3").val($("#quickFrm [name=learnstep1]").val());
					$("#item4").val($("#quickFrm [name=item5]").val());
					$("#ordType").val(ordType);
					var quickSrchFm = $('#quickSrchFm').serialize();
				
				 	$.ajax({
						type : 'POST',
						url :  "/ebs/lms/QuickSrchLec/quickSrchLecSbjtListAjax.ajax",
						dataType : 'html',
						data : quickSrchFm,
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
						 }
						, error : function(){
						}
					});
				}else{
					alert("학습수준을 선택하세요");
				}

			}else{
				alert("학습단계를 선택하세요");
			}
		
		}else{
			alert("과목을 선택하세요");
		}
	}
</script>
