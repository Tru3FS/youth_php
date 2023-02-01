<?php
if(!defined('_SAMSUNG_')) exit;


   
?>
<style>
.m_join_age_info {
    border: 1px solid #e6e7e9;
    background: #ffffff;
    word-break: keep-all;
    padding: 20px;border-radius:4px;
	box-sizing:border-box;background-color:#FEFEFE;
}
.m_join_age_info p{
font-size: 1.5rem;
    display: block;
    padding: 3px 0px 6px;    color: #222;font-weight:500;
}
.m_join_age_info strong {
	color: #2c7fdf;
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
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원가입</span></li></ul>
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


<div id="contents">
<div id="cont_head">
		<h2>회원가입</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원정보 입력</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-register">
<div class="article_header large-screen-only" style="display:none;"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">회원가입</h1></div></div></div>

<div class="article_body" >
                <div class="wrap">
<nav class="steps_nav">
                        <ul class="steps">
                            <li class="">
                                <span lang="en">STEP 01</span>
                                <span>약관동의</span>
                            </li>
                            <li class="active">
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
                        <p class="nc-form-header__desc"> 회원가입후 <?php echo get_session("center_name");?> 센터를 이용하실수 있습니다.</p>
                    </div>

 <?php if($child!=""){?>
 <div class="m_join_age_info">
						<strong>※ 법정대리인(보호자) 정보</strong>
						<div>
							<p>이름 : <?php echo $mb_name;?></p>
							<p>휴대폰 : <?php echo $mb_hp;?></p>
						</div>
					</div>
					<br>
	<?php }?>
                      <form class="nc_frm" id="nc_frm-register" method="post" autocomplete="off">
                        <input type="text" id="user_id" style="opacity:0;position:absolute;left:-100vw;" />
                        <input type="password" style="opacity:0;position:absolute;left:-100vw;" />
                        <input type="hidden" name="cert_type" id="cert_type" value="<?php echo $cert_type; ?>">
	                    <input type="hidden" name="cert_no" id="cert_no" value="<?php echo $cert_no;?>">
						<input type="hidden" name="ss_cert_dupinfo" id="ss_cert_dupinfo" value="<?php echo $ss_cert_dupinfo;?>">
						<input type="hidden" name="mb_name" id="mb_name" value="<?php echo $mb_name;?>">
						<input type="hidden" name="mb_phone" id="mb_name" value="<?php echo $mb_hp;?>">
						<input type="hidden" name="child" id="child" value="<?php echo $child;?>">
                        <div class="nc_frm__wrap" >
                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_id">아이디</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="mem_id" class="nc_frm__field" id="field_id" placeholder="영문 또는 숫자 6-10자" autocorrect="off" autocapitalize="none"/>
                                </div><!-- .nc_frm__field-wrap -->

                                <div class="nc_frm-message" style="display: none;">
                                    <p class="nc_frm-message__desc">바로 로그인 하시겠습니까?</p>
                                    <a class="nc_frm-message__link" href="./login.php">로그인 하러가기</a>
                                </div>
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data nc_frm--required" >
                                <label class="nc_frm__label" for="field_name">이름</label>
                                <div class="nc_frm__field-wrap">
                                   <?php if($child!=""){?>
									<input type="text" name="mem_name" class="nc_frm__field" id="field_name" value="" />
									<?php }else{?>
                                     <input type="text" name="mem_name" class="nc_frm__field" id="field_name" value="<?php echo $mb_name;?>" readonly/>   
									<?php }?>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_user_pw">비밀번호</label>
                                <div class="nc_frm__field-wrap">
                                    <div class="nc_frm__password-toggle">
                                        <input type="password" name="mem_pwd" class="nc_frm__field" id="field_user_pw" placeholder="영문,숫자 조합 10~20자 이내"/>
                                        <button type="button" class="nc_frm__password-toggle-btn" tabindex="-1"></button>
                                    </div>
                                </div><!-- .nc_frm__field-wrap -->
                                <div class="nc_frm__valid-message-group">
                                    <p class="nc_frm__valid-message nc_frm__valid-message--error english">영문</p>
                                    <p class="nc_frm__valid-message nc_frm__valid-message--error number">숫자</p>
                                    <!-- <p class="nc_frm__valid-message nc_frm__valid-message--error special">특수문자</p> -->
                                    <p class="nc_frm__valid-message nc_frm__valid-message--error length">10자 이상</p>
									<p class="nc_frm__valid-message nc_frm__valid-message--error continuity">연속/동일3자리</p>
                                    <!-- <p class="nc_frm__valid-message nc_frm__valid-message--clear length">6자 이상</p> -->
                                </div>
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_user_pw_confirm">비밀번호 확인</label>
                                <div class="nc_frm__field-wrap">
                                    <div class="nc_frm__password-toggle">
                                        <input type="password" name="mem_pwd_chk" class="nc_frm__field" id="field_user_pw_confirm" />
                                        <button type="button" class="nc_frm__password-toggle-btn" tabindex="-1"></button>
                                    </div>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->
                            <!--       
                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_mail">이메일</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="member[email]" class="nc_frm__field" id="field_mail" autocorrect="off" autocapitalize="none" />
                                </div>
                            </div>
                            -->

                            <?php if($child==""){?>

                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_tel">연락처(전화)</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="tel" name="mem_phone" class="nc_frm__field" id="field_tel" value="<?php echo $mb_hp;?>" onkeyup="inputPhoneNumber(this);" maxlength="13" readonly />
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->
                            <?php }else{?>


                           <?php }?>
                            <div class="nc_frm__data">
                                <span class="nc_frm__label">성별</span>
                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_gender" class="nc-icheck" value="M" <?php if($ss_cert_sex=="M"){?>checked<?php }?> />
                                        <span>남성</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_gender" class="nc-icheck" value="F" <?php if($ss_cert_sex=="F"){?>checked<?php }?> />
                                        <span>여성</span>
                                    </label>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_birth">생년월일</label>
                                <div class="nc_frm__field-wrap">
                                    <?php if($child!=""){?>
									<input type="date" name="mem_birth" class="nc_frm__field nc_frm__field-date" id="field_birth"  placeholder="2008-01-01" value="2008-01-01" />
									<?php }else{?>
                                    <input type="date" name="mem_birth" class="nc_frm__field nc_frm__field-date" id="field_birth"  placeholder="<?php echo $birth_date;?>" value="<?php echo $birth_date;?>" disabled />
									<?php }?>
                                </div>

                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_birth_type" class="nc-icheck" value="0" checked />
                                        <span>양력</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_birth_type" class="nc-icheck" value="1" />
                                        <span>음력</span>
                                    </label>
                                </div>
                            </div>
                 

                        </div><!-- .nc_frm__wrap -->

                        <div class="nc_frm-social-agree" >
                            <label class="nc-icheck__label nc-icheck__label--full">
                                <input type="checkbox" name="mem_marketing" class="nc-icheck" value="Y" /><span>SMS 수신 동의(선택)</span><a class="nc_agree_link agree"  href="./sms_member.php">보기</a>
                            </label>
                            <p class="nc_frm-social-agree__desc">
                                본인은 만 14세 이상이며, <a class="nc_agree_link agree" href="./agree_member.php">이용약관</a>, <a class="nc_agree_link agree" href="./privacy_member_01.php">개인정보수집 및 이용</a>에 대한 내용을 확인 하였으며 동의합니다.
                            </p>
                        </div><!-- .nc_frm-social-agree -->

                        <p class="nc_frm__go-to nc_frm__go-to--align-center">이미 회원이신가요? <a class="nc_frm__go-to-link" href="./login.php">로그인</a></p>

                        <div class="nc_frm__control">
                            <input type="submit" class="nc_frm__action" name="submit" id="nc_submit" value="동의하고 가입하기" />
                        </div><!-- .nc_frm__control -->
                    </form>
               </div><!-- .wrap -->
            </div>
</div>
</div>
</div>
</main>
<style>

.nc-icheck__label .nc_agree_link {
    display: inline-block;
    vertical-align: top;
    position: relative;
    color: #666;
    float: right;
    font-size: 1.4rem;
    position: absolute;
    z-index: 1;
    right: 28px;
}

@media (min-width: 1024px){
.nc-icheck__label .nc_agree_link {
    display: inline-block;
    vertical-align: top;
    position: relative;
    color: #666;
    float: right;
    font-size: 1.4rem; position: absolute;z-index:1;    right: 28px;
}
}
.nc-icheck__label .nc_agree_link:after {
    content: '';
    display: block;
    width: 100%;
    height: 0.1rem;
    background: #666;
    position: absolute;
    bottom: 0.2rem;
    left: 0;
}

</style>