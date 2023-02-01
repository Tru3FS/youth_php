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
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>비밀번호찾기</span></li></ul>
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
				<li class="depth_item depth1_item">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/member_division.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >회원가입</a>
		        </li>
				<li class="depth_item depth1_item">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/id_search.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >아이디찾기</a>
		        </li>
				<li class="depth_item depth1_item active">
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
		<h2>비밀번호찾기</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>비밀번호찾기</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-register">
<div class="article_header large-screen-only" style="display:none;"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">비밀번호찾기</h1></div></div></div>

<div class="article_body" >
                <div class="wrap">

                    <div class="nc-form-header">
                      <h3 class="nc-form-header__title">
                            <span class="nc-form-header__title-point">비밀번호</span>를 잊으셨나요?
                            <!--가치있는 노후의 행복 파트너,<p><b class="nc-form-header__title-bold">삼성노블카운티</b>입니다.--></p>
                        </h3>
                        <p class="nc-form-header__desc">회원가입시 등록한 아이디, 연락처 및 이름을 입력해주세요.<br>비밀번호 찾기시 고객님 연락처로 초기화된 문자가 발송됩니다.</p>
                    </div>

                      <form class="nc_frm id-search-form" id="nc_frm_pwd_search" method="post" autocomplete="off">
                           <div class="nc_frm__wrap">
					   <div class="nc_frm__data nc_frm--required" >
                                <label class="nc_frm__label" for="field_name">아이디</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="mem_id" class="nc_frm__field" id="field_id" />
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->
					      <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_tel">연락처(전화)</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="tel" name="mem_phone" class="nc_frm__field" id="field_tel" onkeyup="inputPhoneNumber(this);" maxlength="13">
                                </div>
                            </div>
					  
                               <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_name">이름</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="mem_name" class="nc_frm__field" id="field_name">
                                </div>
                            </div>
							
							
							
                            </div>                       

                        <div class="nc_frm__control">
                          <button class="nc_frm__action2"/>비밀번호확인</button>
                        </div><!-- .nc_frm__control -->
                    </form>
               </div><!-- .wrap -->
            </div>
</div>
</div>
</div>
</main>
