<?php
if(!defined('_SAMSUNG_')) exit;


$json_string = CF_DIVISION_ID($_SESSION['center_id'],$member_code, $url);

$json_array = json_decode($json_string, true); 




if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
 return;	
	
}


     foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
        	}
		
		 
		 
          $m_name = $val['Member_Name'];
		  $m_id = $val['Web_ID'];
		  $m_code = $val['Member_Code'];
		  $m_phone = $val['Cellular'];
		  $m_birth = $val['Birth_Date'];
		  $m_birth1 = substr($m_birth,0,4);
		  $m_birth2 = substr($m_birth,4,2);
		  $m_birth3 = substr($m_birth,6,2);
		  $m_sex = $val['Sex'];
		  $sms_yn = $val['Sms_Yn'];
		  $up_date = $val['Upd_Date'];
		  $up_date1 = substr($up_date,0,4);
		  $up_date2 = substr($up_date,4,2);
		  $up_date3 = substr($up_date,6,2);
		  $solar_yn = $val['Solar_Yn'];
          $term_agree = $val['Term_Agree'];


 if($term_agree=="N" || $term_agree==''){
      $termagree="N";
 }else{
    
	 $termagree=$val['Term_Agree'];
 
 }
   

   


		 }

	 }

?>
<style>
@media (min-width: 1024px){
.nc_frm__field-wrap .agreement-form {
    margin-top: 0px;
    width: 100%; 
    padding: 10px 0;
}

.wrap .nc_frm__field-wrap .agreement-form{
    margin-top: 0px;
    width: 100%;
    padding: 10px 0px;
}
.nc_frm__label.agree{
    vertical-align: top;
}
.agreement-list {
    margin-bottom: 0;
}

.wrap .nc_frm__field-wrap .agreement-form > ul > li:first-child {
    border-bottom: 1px solid #e5e5e5;
    padding: 0;
    margin: 0;
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
                              <li class="active">
                                <span lang="en">STEP 01</span>
                                <span>회원정보 입력</span>
                            </li>
                            <li>
                                <span lang="en">STEP 02</span>
                                <span>회원가입 완료</span>
                            </li>
                        </ul><!--.register_tabs-->
                    </nav>
                    <div class="nc-form-header">
                      <h3 class="nc-form-header__title">
                            <span class="nc-form-header__title-point">환영합니다.</span><br>
                             한번에 쉽게 간편하게,<p><b class="nc-form-header__title-bold"><?php echo get_session("center_name");?></b>입니다.</p>
                        </h3>
                        <p class="nc-form-header__desc"> 회원가입후  <?php echo get_session("center_name");?> 센터를 이용하실수 있습니다.</p>
                    </div>

                      <form class="nc_frm" id="nc_frm-register2" method="post" autocomplete="off">
						<input type="hidden" name="member_code" id="member_code" value="<?php echo $member_code;?>">
						<input type="hidden" name="term_agree" id="term_agree" value="<?php echo $termagree;?>">
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
                             	<input type="text" name="mem_name" class="nc_frm__field" id="field_name" value="<?php echo $m_name;?>" />
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
                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_tel">연락처(전화)</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="tel" name="mem_phone" class="nc_frm__field" id="field_tel" value="<?php echo $m_phone;?>" onkeyup="inputPhoneNumber(this);" maxlength="13"  />
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data">
                                <span class="nc_frm__label">성별</span>
                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_gender" class="nc-icheck" value="M" <?php if($m_sex=="M"){?>checked<?php }?> />
                                        <span>남성</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_gender" class="nc-icheck" value="F" <?php if($m_sex=="F"){?>checked<?php }?> />
                                        <span>여성</span>
                                    </label>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_birth">생년월일</label>
                                <div class="nc_frm__field-wrap">
                                 
                                    <input type="date" name="mem_birth" class="nc_frm__field nc_frm__field-date" id="field_birth"  placeholder="<?php echo $m_birth1;?>-<?php echo $m_birth2;?>-<?php echo $m_birth3;?>" value="<?php echo $m_birth1;?>-<?php echo $m_birth2;?>-<?php echo $m_birth3;?>" />
					
                                </div>

                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_birth_type" class="nc-icheck" value="0" <?php if($solar_yn=="1"){?>checked<?php }?>  />
                                        <span>양력</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_birth_type" class="nc-icheck" value="1" <?php if($solar_yn=="2"){?>checked<?php }?>   />
                                        <span>음력</span>
                                    </label>
                                </div>
                            </div>
           
				 <?php if($termagree=='N'){?>
				 <div class="nc_frm__data">
                                <label class="nc_frm__label agree" for="field_birth">약관동의</label>
                                <div class="nc_frm__field-wrap">
                                 <div class="agreement-form">
                            <ul class="agreement-list">
					   <li><label class="checkbox"><input type="checkbox" name="chk_all"><i class="icon"></i><div>모두 동의합니다.</div></label></li>
					   <li><label class="checkbox"><input type="checkbox" data-type="1" name="agree2"><i class="icon"></i><span class="essential">(필수)</span> 이용약관 동의</label><a class="nc_agree_link agree" href="./agree_member.php" id="agree">보기</a></li>
					   <li><label class="checkbox"><input type="checkbox" data-type="2" name="agree3"><i class="icon"></i><span class="essential">(필수)</span> 개인정보 수집 및 이용 동의</label><a class="nc_agree_link privacy" href="./privacy_member_01.php" id="privacy">보기</a></li>
					   <!--<li><label class="checkbox"><input type="checkbox" data-type="3" name="agree4"><i class="icon"></i><span class="essential">(필수)</span> 개인정보처리방침</label><a class="nc_agree_link open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_full" href="./privacy.php">보기</a></li>-->
					   </ul>                            
					 </div>
                                </div>

                              
                            </div>
                    <?php }?>
                        </div><!-- .nc_frm__wrap -->

                        <div class="nc_frm-social-agree" >
                            <label class="nc-icheck__label nc-icheck__label--full">
                                <input type="checkbox" name="mem_marketing" class="nc-icheck" value="Y" <?php if($sms_yn=="Y"){?>checked<?php }?> /><span>SMS 수신 동의(선택)</span><a class="nc_agree_link privacy"  href="./sms_member.php">보기</a>
                            </label>
                            <p class="nc_frm-social-agree__desc">
                                본인은 만 14세 이상이며, <a class="nc_agree_link agree" href="./agree_member.php">이용약관</a>, <a class="nc_agree_link privacy" href="./privacy_member_01.php">개인정보수집 및 이용</a>에 대한 내용을 확인 하였으며 동의합니다.
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