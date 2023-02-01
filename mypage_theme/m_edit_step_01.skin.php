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



?>
<main id="main" class="main_container">
<div id="my_top_menu">
						<h3 class="m_element">서브메뉴</h3>
						<ol>
							<li class="home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" title="홈 바로가기">홈</a></li>
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
																					<li><a href="./lindex.php?status=001?center_id=<?php echo $_SESSION['center_id'];?>">강좌신청현황</a></li>
																					<li><a href="./lindex.php?status=002?center_id=<?php echo $_SESSION['center_id'];?>">강좌이력현황(재수강)</a></li>
																					<li><a href="./lindex.php?status=003?center_id=<?php echo $_SESSION['center_id'];?>">환불신청현황</a></li>
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
		<h2>회원정보수정</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원정보수정</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-login edit">

            <div class="article_body">
                <div class="wrap">

                    
					<div class="nc_frm-header">
                        <h3 class="nc_frm-header__title">
                            <span class="nc_frm-header__title-point">비밀번호 확인</span>
                        </h3>
                        <p class="nc_frm-header__desc">개인정보 보호를 위해 비밀번호를 다시 한 번 입력해 주세요.</p>
                    </div>

                   
       <form name="flogin"  method="post" class="nc_frm"  id="nc-login-form2">
   
		    <input type="hidden" name="modal_ox" id="modal_ox" class="modal_ox"  value="">
		    <input type="hidden" name="medit_link" id="medit_link" class="medit_link"  value="./m_edit_step_02.php?center_id=<?php echo $_SESSION['center_id'];?>">
           <input type="hidden" name="mem_t_id" id="mem_t_id" class=""  value="<?php echo get_session('m_id');?>">
                        <div class="nc_frm__wrap">
                            <div class="nc_frm__data">
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="member_id" class="nc_frm__field" id="member_id" placeholder="아이디" readOnly value="<?php echo get_session('m_id');?>" ><button type="button" class="nc_frm__clear-btn"></button>
                                </div><!-- .nc_frm__field-wrap -->
							</div>	
							  <div class="nc_frm__data">
                                <div class="nc_frm__field-wrap">
                                    <div class="nc_frm__password-toggle">
                                        <input type="password" name="member_pwd" class="nc_frm__field" id="member_pwd" placeholder="비밀번호" value='' ><button type="button" class="nc_frm__clear-btn"></button>
                                        <button type="button" class="nc_frm__password-toggle-btn"></button>
                                    </div>
                                </div><!-- .nc_frm__field-wrap -->
                                </div>
                            </div><!-- .nc_frm__data -->
                       <!-- .nc_frm__wrap -->

                        <div class="nc_frm__control">
                            <input type="submit" class="nc_frm__action nc_frm__action--full" value="로그인">
                        </div><!-- .nc_frm__control -->
                    </form><!-- .nc-login-form -->

                  
					
                </div>
            </div>
        </div>




</div>
</div>
</div>
<script>


jQuery(function($){




    $("#auto_login").click(function(){
		
		console.log('1');
 
     if($("input[name=auto_login]").prop('checked')==false){
			
		  NC.alert( '자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?');
          return false;
			
	 }	
	
		
		
    });

    $("#id_save").click(function(){
		
		console.log('1');
 
     if($("input[name=id_save]").prop('checked')==false){
			
		  NC.alert( '아이디 저장을 사용하시면 다음부터 아이디를 입력하실 필요가 없습니다.\n\n\공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n아이디를 저장하시겠습니까?');
          return false;
			
	 }	
	
		
		
    });	
	
	
	
	
});

function flogin_submit(f)
{
  if (!f.mb_id.value)
    {
        alert("아이디를 입력해 주세요.");
        f.mb_id.focus();
          return false;
    }
     if (!f.mb_pwd.value)
    {
        alert("비밀번호를 입력해 주세요.");
        f.mb_pwd.focus();
         return false;
    }
      f.submit();
 }
</script>
</main>
