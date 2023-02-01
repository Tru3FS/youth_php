<?php
if(!defined('_SAMSUNG_')) exit;




?>
<style>

</style>

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
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원가입</span></li></ul>
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
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/login.php" class="depth_text depth1_text open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_narrow" target="_self"  >로그인</a>
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
		            		<a href="<?php echo NC_MEMBER_URL; ?>/member_division.php" class="depth_text depth1_text" target="_self"  >회원가입</a>
		        </li>
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/id_search.php" class="depth_text depth1_text" target="_self"  >아이디찾기</a>
		        </li>
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/pwd_search.php" class="depth_text depth1_text" target="_self"  >비밀번호찾기</a>
		        </li>

		        </ul>
			</div>
		</nav>
	</div>









					</div>
				

		
				
	
		
				
			</div>
<style>
.m_join_age_info {
    border: 1px solid #e6e7e9;
    background: #ffffff;
    word-break: keep-all;
    padding: 20px;border-radius:4px;
	box-sizing:border-box;background-color:#FEFEFE;
}
.m_join_age_info strong {
	color:#E0002A;
	font-size:18px;
	display:inline-block;
	margin-bottom:5px;font-weight:500;
}
.m_join_age_info div {
	box-sizing:border-box;
	color:#888888;	font-size:13px;
	line-height:24px;
	letter-spacing:-0.04em;
	word-wrap:break-word;
	word-break: keep-all;font-weight:400;
}
@media only all and (max-width:1024px) {

.m_join_age_info {
    padding: 10px;
}
.m_join_age_info div {
	font-size:12px;
}

.m_join_age_info strong {
	
	font-size:16px;

}
}

@media (min-width: 1024px){
.nc_frm__action ,.nc_frm__action2 {

    font-size: 1.8rem;

}

.nc_frm__action, .nc_frm__action2, .nc_frm__action--type-02{

max-width: 28rem;
}

}

</style>

<div id="contents">
<div id="cont_head">
		<h2>약관동의</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>약관동의</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-register">
<div class="article_header large-screen-only" style="display:none;"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">약관동의</h1></div></div></div>

<div class="article_body" >
                <div class="wrap">
<nav class="steps_nav">
                        <ul class="steps">
                            <li class="active">
                                <span lang="en">STEP 01</span>
                                <span>약관동의</span>
                            </li>
                            <li>
                                <span lang="en">STEP 02</span>
                                <span>회원정보 입력</span>
                            </li>
                            <li>
                                <span lang="en">STEP 03</span>
                                <span>회원가입 완료</span>
                            </li>
                        </ul><!--.register_tabs-->
                    </nav>
                    <div class="nc-form-header">
                      <h3 class="nc-form-header__title">
                            <span class="nc-form-header__title-point">환영합니다.</span><br>
                            한번에 쉽게 간편하게,<p><b class="nc-form-header__title-bold"><?php echo get_session("center_name");?></b>입니다.</p>
                        </h3>
                        <p class="nc-form-header__desc">약관 선택 후 휴대전화 개인인증 절차가 진행됩니다.</p>
                    </div>
                  <div class="m_join_age_info">
						<strong>※ 알려드립니다.</strong>
						<div>
							<p>만 14세 미만 어린이는 보호자(법정대리인)와 함께 가입해 주시기 바랍니다.개인정보보호법 39조의 3에서 만 14세 미만 아동의 개인정보 수집 시 부모의 동의를 얻도록 규정하고 있습니다.</p>
							<p>만 14세 미만 어린이의 경우 회원가입 시 보호자(법정대리인)의 실명 인증을 통한 가입 동의가 필요합니다.</p>
						</div>
					</div>
                      <form class="nc_frm agreement-form" id="nc_frm_agree"  name="nc_frm_agree" method="post" autocomplete="off">
					  <input type="hidden" name="cert_type" value="">
					  <input type="hidden" name="scenter_id" value="<?php echo $_SESSION['CENTER_ID'];?>">
                       <ul class="agreement-list">
					   <li><label class="checkbox"><input type="checkbox" name="chk_all"><i class="icon"></i><div>모두 동의합니다.</div></label></li>
					   <li><label class="checkbox"><input type="checkbox" data-type="1" name="agree2"><i class="icon"></i><span class="essential">(필수)</span> 이용약관 동의</label><a class="nc_agree_link agree" href="./agree_member.php" id="agree">보기</a></li>
					   <li><label class="checkbox"><input type="checkbox" data-type="2" name="agree3"><i class="icon"></i><span class="essential">(필수)</span> 개인정보 수집 및 이용 동의</label><a class="nc_agree_link agree" href="./privacy_member_01.php" id="privacy">보기</a></li>
					   <!--<li><label class="checkbox"><input type="checkbox" data-type="3" name="agree4"><i class="icon"></i><span class="essential">(필수)</span> 개인정보처리방침</label><a class="nc_frm-social-agree__link open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_full" href="./privacy.php">보기</a></li>-->
					   </ul>                            


  

                        <div class="nc_frm__control">
                            <button class="nc_frm__action" />소아 · 청소년 가입(만14세 미만)</button>  <button class="nc_frm__action2" />일반가입(만14세 이상)</button>
                        </div><!-- .nc_frm__control -->
                    </form>
               </div><!-- .wrap -->
            </div>
</div>
</div>
</div>
</main>
