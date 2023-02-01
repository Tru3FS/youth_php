<?php
if(!defined('_SAMSUNG_')) exit;


$redirect_to=(isset($_REQUEST["redirect_to"]) && $_REQUEST["redirect_to"]) ? $_REQUEST["redirect_to"] : NULL;
$mb_pwd=(isset($_REQUEST["member_pwd"]) && $_REQUEST["member_pwd"]) ? $_REQUEST["member_pwd"] : NULL;
$mb_id=(isset($_REQUEST["member_id"]) && $_REQUEST["member_id"]) ? $_REQUEST["member_id"] : NULL;




if($mb_id==''  && $mb_pwd==''){

$errotxt="아이디 또는 휴대폰 번호를 입력하세요.";

}elseif($mb_id!='' && $mb_pwd==''){

$errotxt="비밀번호를 입력하세요.";
}


$p_startdate=date('Y-m-d', strtotime("+0 day", time()));

?>
<main id="main" class="main_container">
<div id="my_top_menu">
						<h3 class="m_element">서브메뉴</h3>
						<ol>
							<li class="home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" title="홈 바로가기">홈</a></li>
							<li class="s_nav s_nav1">
								<a href="javascript:;">회원정보수정</a>
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
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원정보수정</span></li></ul>
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
		<h2>개인정보처리방침</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>개인정보처리방침</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-login edit">

            <div class="article_body">
                <div class="wrap">
<form name="frm" id="frm" method="post" accept-charset="utf-8"  enctype="multipart/form-data" autocomplete="off" action="./privacy_Proc.php" >
<div id="inquiry_form" class="inquiry_form two">
<ul>
<li class=""><label for="your_name"><sup>필수</sup>날짜선택</label>
<div class="your_input"><span class=""><input type="date" name="date" class="nc_frm__field nc_frm__field-date" id="date"  placeholder="<?php echo $p_startdate;?>" value="<?php echo $p_startdate;?>" /></span></div>
</li>
<!--<li style="width:100%;padding:0"></li>-->
<!--
<li><label for="your_name">이용시간</label>
<div class="your_input"><span class="">13:00 ~ 14:00</span></div>
</li>
<li><label for="your_name"><sup>필수</sup>이용목적</label>
<div class="your_input"><span class=""><input type="text" name="reason" value="" size="40" class="" id="reason" ></span></div>
</li>-->
</ul>
</div>                    
					
<div><br><?php echo $daum_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?><br></div>
                  
					
<div class="agreement-form">

                        <div class="nc_frm__control ">
                            <button class="nc_frm__action" onclick="location.href='./privacy.php?center_id=<?php echo $_SESSION['center_id'];?>';">목록</button>  <button class="nc_frm__action2" id="btnSubmit">입력</button>
                        </div><!-- .nc_frm__control -->
                    </div>
</form>
                </div>
            </div>
        </div>




</div>
</div>
</div>
<style>

.msg_sound_only, .sound_only {display:inline-block !important;position:absolute;top:0;left:0;width:0;height:0;margin:0 !important;padding:0 !important;font-size:0;line-height:0;border:0 !important;overflow:hidden !important}
.inquiry_form li:nth-child(1) {
    width: 100%;
    border-right: 0px solid #DEDEDE;
}
.inquiry_form {
    position: relative;
    width: 100%;
    margin-bottom: 0px;
    display: inline-block;
}
.inquiry_form label { color: #444444;font-size: 14px; }
.inquiry_form ul { margin-bottom: 40px;   padding: 0px; }
	
.inquiry_form li { display: table; width: 100%; height: 54px; border-bottom: 1px solid #ededed;float: left;  }
.inquiry_form.view li { display: table; width: 100%; height: 50px; border-bottom: 1px solid #ededed;float: left;  }
.inquiry_form li > label,
.inquiry_form li > div { display: table-cell; padding: 10px 20px; font-size: 13px; vertical-align: middle;}
.inquiry_form.view li > label,
.inquiry_form.view li > div { display: table-cell; padding: 5px 20px; font-size: 13px; vertical-align: middle; }


.inquiry_form li > div { padding-right: 0px; }
.inquiry_form li > div.your_input_company {
    /* padding-right: 40px; */
}
.inquiry_form h2 sup { vertical-align: middle; }
.inquiry_form sup { overflow: hidden; position: relative; display: inline-block; width: 15px; height: 15px; margin-left: 2px; vertical-align: middle; text-indent: 30px; color: #B60005; }
.inquiry_form sup:after { position: absolute; top: 0; left: 0; font-size: 17px; text-indent: 0; content: '*'; }
.inquiry_form input[type=text],
.inquiry_form input[type=email],
.inquiry_form input[type=password],
.inquiry_form input[type=tel],
.inquiry_form select,
.inquiry_form textarea { -moz-box-sizing: border-box; box-sizing: border-box; width: 100%; height: 32px; padding: 10px; background: #fff; border-radius: 0px;    font-size: 13px;}
.inquiry_form li > label,
.inquiry_form li > div { display: table-cell; padding: 10px 20px; font-size: 13px; vertical-align: middle;}
.inquiry_form.view li > label,
.inquiry_form.view li > div { display: table-cell; padding: 5px 20px; font-size: 13px; vertical-align: middle;}


.inquiry_form li > div { padding-right: 0px; }
.inquiry_form li > div.your_input_company {
    /* padding-right: 40px; */
}
.inquiry_form li > label { width: 180px; border-right: 1px solid #ededed; background: #f7f7f7;}

</style>



<script>






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
			alert(msg);
			$(object).focus();
			return false;
		}
		if (value.length >  0 && value != "none"){
			return true;
		}else{
			alert(msg);
			$(object).focus();
			return false;
		}
	}
	var _chkNumValue = function (object,msg){
		var num = $(object).val();
		var flag=true;
		if (num == null || num == ""){
			alert(msg);
			$(object).focus();
			flag=false;
			return flag;
		}
		if (num.length > 0){
			for(var i =0 ; i<num.length ; i++){
			c = num.charAt(i);
			   if(!(c>='0' && c<='9')) {
					alert(msg);
					$(object).focus();
					flag=false;
					break;
			   }
			}
		}else {
			alert(msg);
			$(object).focus();
			flag=false;
		}
		return flag;
    }
 
       function valueChanged()
    {
        if($('.refund').is(":checked"))   
            $(".refund_wrap").show();
        else
            $(".refund_wrap").hide();
    }
 
	$(function() {
 
		var _value="";
       



       	$("#btnSubmit").click(function(){
				
				   //<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>
				
		   	    var content = "";
   var frm = document.frm;
		var _validator = new Trex.Validator();
		var _formGen = Editor.getForm();
		var _content = Editor.getContent();

if(!_validator.exists(_content)) {
	 alert("내용을 입력해주세요.");
		Editor.focus();
		return false;
	} else {
    _formGen.createField(
      tx.textarea({ 
        'name': "bContent", 
        'style': { 'display': "none" } 
      },
      _content)
    );
  }
        

	     if(confirm("글을 등록하시겠습니까?")) frm.submit();
            else  return false;

		



		});	


  
	});






</script>		


</main>
