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
<style>
.m_join_age_info {
    border: 1px solid #e6e7e9;
    background: #ffffff;
    word-break: keep-all;
    padding: 20px;border-radius:4px;
	box-sizing:border-box;background-color:#FEFEFE;text-align:center;
}
.m_join_age_info strong {
	color:#E0002A;
	font-size:3rem;
	display:inline-block;
	margin-bottom:5px;font-weight:600;    -webkit-box-shadow: inset 0 -1.2rem 0 0 rgb(218 225 230 / 50%);
    box-shadow: inset 0 -1.2rem 0 0 rgb(218 225 230 / 50%);
}
.m_join_age_info div {
	box-sizing:border-box;
	color:#888888;	font-size:1.6rem;
	line-height:24px;
	letter-spacing:-0.04em;
	word-wrap:break-word;
	word-break: keep-all;font-weight:500;
}

.m_join_age_info div b{
	box-sizing:border-box;
	color:#222;	

}

@media only all and (max-width:1024px) {

.m_join_age_info {
    padding: 10px;
}
.m_join_age_info div {
	font-size:12px;
}

.m_join_age_info strong {
	
	font-size:2rem; -webkit-box-shadow: inset 0 -1.2rem 0 0 rgb(218 225 230 / 0%);
    box-shadow: inset 0 -1.2rem 0 0 rgb(218 225 230 / 0%);

}
}

</style>

<div id="contents">
<div id="cont_head">
		<h2>회원가입 구분</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원가입</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원가입 구분</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-register ">

<div class="article_body" >
                <div class="wrap ">
                    <div class="nc-form-header">
                      <h3 class="nc-form-header__title">
                            <span class="nc-form-header__title-point">환영합니다.</span><br>
                             <b class="nc-form-header__title-bold"><?php echo get_session("center_name");?></b> 회원가입 안내입니다.</p>
                        </h3>
                        <p class="nc-form-header__desc">체육 · 문화강좌를 이용 중인 고객님께서는 '예'를 클릭해주세요.</p>
                    </div>
                  <div class="m_join_age_info">
						<strong><?php echo get_session("center_name");?> 이용 중이십니까?</strong>
						<div style="display:none;">
							<p>기존 <?php echo get_session("center_name");?> 오프라인 및 온라인 회원가입 없이 이용하셨던 고객님들께서는 아래 <b>기존회원가입</b>로 회원가입을 진행해주시기 바랍니다.</p>
							<p>신규 회원가입을 원하시는 고객님들께서는 신규회원가입으로 진행해 주시기 바랍니다.</p>
							</div>
					</div><br><br>
                       <div class="agreement-form">

                        <div class="nc_frm__control ">
                            <button class="nc_frm__action" onclick="location.href='./member_search.php?center_id=<?php echo $_SESSION['center_id'];?>';" />예</button>  <button class="nc_frm__action2" onclick="location.href='./m_join.php?center_id=<?php echo $_SESSION['center_id'];?>';" />아니오</button>
                        </div><!-- .nc_frm__control -->
                    </div>
               </div><!-- .wrap -->
            </div>
</div>
</div>
</div>
</main>
