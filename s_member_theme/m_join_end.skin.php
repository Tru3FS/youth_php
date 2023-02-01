<?php
if(!defined('_SAMSUNG_')) exit;


$redirect_to=(isset($_REQUEST["redirect_to"]) && $_REQUEST["redirect_to"]) ? $_REQUEST["redirect_to"] : NULL;
$mb_pwd=(isset($_REQUEST["mb_pwd"]) && $_REQUEST["mb_pwd"]) ? $_REQUEST["mb_pwd"] : NULL;
$mb_id=(isset($_REQUEST["mb_id"]) && $_REQUEST["mb_id"]) ? $_REQUEST["mb_id"] : NULL;


// 아이디 자동저장
$ck_id_save = get_cookie("ck_id_save");

if ($ck_id_save) {
$ch_id_save_chk = "checked";
}


if($mb_id==''  && $mb_pwd==''){

$errotxt="아이디 또는 휴대폰 번호를 입력하세요.";

}elseif($mb_id!='' && $mb_pwd==''){

$errotxt="비밀번호를 입력하세요.";
}



?>
<main id="main" class="main_container">

<div id="top_bg_join" style="display:none;">
<div class="_wrap">
<div class="top_title">
            <h2></h2>
</div>
</div>
</div>
<div class="top_area" style="display:none;">
<div class="wrap">
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원가입완료</span></li></ul>
</div>
</div>

<div class="wrap">

<div id="sidebar">
				<div class="stit">
						<p><!--FACILITIES-->MEMBER</p>
						<h2>회원</h2>
					</div>
					<div id="sidemenu" class="sidebar">
					
	<div class="side_menu">
		<nav class="menu init">
			<h2 class="skip">좌측 메뉴</h2>
			<div class="depth depth1">
				<ul class="depth_list depth1_list">
				<li class="depth_item depth1_item active">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/login.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_narrow" target="_self"  >로그인</a>
							<!--
							<div class="depth depth2">
		            			<ul class="depth_list depth2_list">
			            						<li class="depth_item depth2_item active ">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >로그인</a>
			            						</li>
			            						
		            					</ul>
		            		</div>
							-->
		        </li>
					<li class="depth_item depth1_item active">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/member_division.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >회원가입</a>
		        </li>
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/id_search.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >아이디찾기</a>
		        </li>
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/pwd_search.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >비밀번호찾기</a>
		        </li>
		        </ul>
			</div>
		</nav>
	</div>









					</div>
				

		
				
	
		
				
			</div>


<div id="contents">
<div id="cont_head">
		<h2>회원가입완료</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원가입완료</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-login">

            <div class="article_body">
                <div class="wrap">

                    
					<div class="nc_frm-header">
                        <h3 class="nc_frm-header__title">
                            <span class="nc_frm-header__title-point">로그인</span>
                        </h3>
                        <p class="nc_frm-header__desc"><?php echo get_session('center_name');?> 로그인 후, <br>스포츠센터 및 문화센터 강좌 예약을 진행하세요.</p>
                    </div>

                   
        <form name="flogin" action=""  method="post" class="nc_frm"  id="nc-login-form">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">
		 <input type="hidden" name="refer_url" value="<?php echo $login_url ?>">

                        <div class="nc_frm__wrap">
                            <div class="nc_frm__data">
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="member_id" class="nc_frm__field" id="member_id" placeholder="아이디"  autocorrect="off" autocapitalize="none"   <?php if ($ck_id_save) { ?>value='<?php $ck_id_save?>'<?php } else { ?>value='<?php echo $member_id;?>'<?php } ?> ><button type="button" class="nc_frm__clear-btn"></button>
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
                                 <div class="nc_frm__data">
                                <div class="nc_frm__login-option">
                                    <!--<label class="nc-icheck__label"><div class="nc-icheck--icheckbox"><input type="checkbox"  name="auto_login" id="auto_login"  value="1"  class="nc-icheck"></div><span>자동 로그인</span></label>-->
                                    <label class="nc-icheck__label"><div class="nc-icheck--icheckbox"><input type="checkbox" name='id_save' id='id_save'  value="Y"  <?php $ch_id_save_chk;?> class="nc-icheck"></div><span>아이디 저장</span></label>
                                </div>
								 </div>
                            </div><!-- .nc_frm__data -->
                       <!-- .nc_frm__wrap -->

                        <div class="nc_frm__control">
                            <input type="submit" class="nc_frm__action nc_frm__action--full" value="로그인">
                        </div><!-- .nc_frm__control -->
                    </form><!-- .nc-login-form -->

                    <div class="nc_frm__separator"></div>

                    <p class="nc_frm__go-to">
                        <a class="nc_frm__go-to-link" href="./id_search.php?center_id=<?php echo $_SESSION['center_id'];?>">아이디</a>
                        혹은
                        <a class="nc_frm__go-to-link" href="./pwd_search.php?center_id=<?php echo $_SESSION['center_id'];?>">비밀번호</a>를 잊으셨나요?
                    </p>

                    <div class="nc_frm__btn-wrap">
                        <a class="nc_frm__btn nc_frm__btn--full" href="./member_division.php?center_id=<?php echo $_SESSION['center_id'];?>"><span>회원가입</span></a>
                    </div>
					
                </div>
            </div>
        </div>




</div>
</div>
</div>
</main>
<script>


jQuery(function($){




    $("#auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
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