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
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>??????</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>????????????</span></li></ul>
</div>
</div>

<div class="wrap">

<div id="sidebar">
				<div class="stit">
						<p><!--FACILITIES-->MEMBER</p>
						<h2>??????</h2>
					</div>
					<div id="sidemenu" class="sidebar">
					
	<div class="side_menu">
		<nav class="menu init">
			<h2 class="skip">?????? ??????</h2>
			<div class="depth depth1">
				<ul class="depth_list depth1_list">
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/login.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_narrow" target="_self"  >?????????</a>
							<!--
							<div class="depth depth2">
		            			<ul class="depth_list depth2_list">
			            						<li class="depth_item depth2_item active ">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >?????????</a>
			            						</li>
			            						
		            					</ul>
		            		</div>
							-->
		        </li>
				<li class="depth_item depth1_item active">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/member_division.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >????????????</a>
		        </li>
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/id_search.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >???????????????</a>
		        </li>
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/pwd_search.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >??????????????????</a>
		        </li>

		        </ul>
			</div>
		</nav>
	</div>









					</div>
				

		
				
	
		
				
			</div>


<div id="contents">
<div id="cont_head">
		<h2>????????????</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>??????</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>???????????? ??????</span></li></ul>

		</div>				
	</div>
<div class="article sub-member-register">
<div class="article_header large-screen-only" style="display:none;"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">????????????</h1></div></div></div>

<div class="article_body" >
                <div class="wrap">
<nav class="steps_nav">
                        <ul class="steps">
                              <li class="active">
                                <span lang="en">STEP 01</span>
                                <span>???????????? ??????</span>
                            </li>
                            <li>
                                <span lang="en">STEP 02</span>
                                <span>???????????? ??????</span>
                            </li>
                        </ul><!--.register_tabs-->
                    </nav>
                    <div class="nc-form-header">
                      <h3 class="nc-form-header__title">
                            <span class="nc-form-header__title-point">???????????????.</span><br>
                             ????????? ?????? ????????????,<p><b class="nc-form-header__title-bold"><?php echo get_session("center_name");?></b>?????????.</p>
                        </h3>
                        <p class="nc-form-header__desc"> ???????????????  <?php echo get_session("center_name");?> ????????? ??????????????? ????????????.</p>
                    </div>

                      <form class="nc_frm" id="nc_frm-register2" method="post" autocomplete="off">
						<input type="hidden" name="member_code" id="member_code" value="<?php echo $member_code;?>">
						<input type="hidden" name="term_agree" id="term_agree" value="<?php echo $termagree;?>">
                       <div class="nc_frm__wrap" >
                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_id">?????????</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="mem_id" class="nc_frm__field" id="field_id" placeholder="?????? ?????? ?????? 6-10???" autocorrect="off" autocapitalize="none"/>
                                </div><!-- .nc_frm__field-wrap -->

                                <div class="nc_frm-message" style="display: none;">
                                    <p class="nc_frm-message__desc">?????? ????????? ???????????????????</p>
                                    <a class="nc_frm-message__link" href="./login.php">????????? ????????????</a>
                                </div>
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data nc_frm--required" >
                                <label class="nc_frm__label" for="field_name">??????</label>
                                <div class="nc_frm__field-wrap">
                             	<input type="text" name="mem_name" class="nc_frm__field" id="field_name" value="<?php echo $m_name;?>" />
								</div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_user_pw">????????????</label>
                                <div class="nc_frm__field-wrap">
                                    <div class="nc_frm__password-toggle">
                                        <input type="password" name="mem_pwd" class="nc_frm__field" id="field_user_pw" placeholder="??????,?????? ?????? 10~20??? ??????"/>
                                        <button type="button" class="nc_frm__password-toggle-btn" tabindex="-1"></button>
                                    </div>
                                </div><!-- .nc_frm__field-wrap -->
                                <div class="nc_frm__valid-message-group">
                                    <p class="nc_frm__valid-message nc_frm__valid-message--error english">??????</p>
                                    <p class="nc_frm__valid-message nc_frm__valid-message--error number">??????</p>
                                    <!-- <p class="nc_frm__valid-message nc_frm__valid-message--error special">????????????</p> -->
                                    <p class="nc_frm__valid-message nc_frm__valid-message--error length">10??? ??????</p>
									<p class="nc_frm__valid-message nc_frm__valid-message--error continuity">??????/??????3??????</p>
                                    <!-- <p class="nc_frm__valid-message nc_frm__valid-message--clear length">6??? ??????</p> -->
                                </div>
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_user_pw_confirm">???????????? ??????</label>
                                <div class="nc_frm__field-wrap">
                                    <div class="nc_frm__password-toggle">
                                        <input type="password" name="mem_pwd_chk" class="nc_frm__field" id="field_user_pw_confirm" />
                                        <button type="button" class="nc_frm__password-toggle-btn" tabindex="-1"></button>
                                    </div>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->
                            <!--       
                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_mail">?????????</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="member[email]" class="nc_frm__field" id="field_mail" autocorrect="off" autocapitalize="none" />
                                </div>
                            </div>
                            -->
                            <div class="nc_frm__data nc_frm--required">
                                <label class="nc_frm__label" for="field_tel">?????????(??????)</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="tel" name="mem_phone" class="nc_frm__field" id="field_tel" value="<?php echo $m_phone;?>" onkeyup="inputPhoneNumber(this);" maxlength="13"  />
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data">
                                <span class="nc_frm__label">??????</span>
                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_gender" class="nc-icheck" value="M" <?php if($m_sex=="M"){?>checked<?php }?> />
                                        <span>??????</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_gender" class="nc-icheck" value="F" <?php if($m_sex=="F"){?>checked<?php }?> />
                                        <span>??????</span>
                                    </label>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_birth">????????????</label>
                                <div class="nc_frm__field-wrap">
                                 
                                    <input type="date" name="mem_birth" class="nc_frm__field nc_frm__field-date" id="field_birth"  placeholder="<?php echo $m_birth1;?>-<?php echo $m_birth2;?>-<?php echo $m_birth3;?>" value="<?php echo $m_birth1;?>-<?php echo $m_birth2;?>-<?php echo $m_birth3;?>" />
					
                                </div>

                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_birth_type" class="nc-icheck" value="0" <?php if($solar_yn=="1"){?>checked<?php }?>  />
                                        <span>??????</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="mem_birth_type" class="nc-icheck" value="1" <?php if($solar_yn=="2"){?>checked<?php }?>   />
                                        <span>??????</span>
                                    </label>
                                </div>
                            </div>
           
				 <?php if($termagree=='N'){?>
				 <div class="nc_frm__data">
                                <label class="nc_frm__label agree" for="field_birth">????????????</label>
                                <div class="nc_frm__field-wrap">
                                 <div class="agreement-form">
                            <ul class="agreement-list">
					   <li><label class="checkbox"><input type="checkbox" name="chk_all"><i class="icon"></i><div>?????? ???????????????.</div></label></li>
					   <li><label class="checkbox"><input type="checkbox" data-type="1" name="agree2"><i class="icon"></i><span class="essential">(??????)</span> ???????????? ??????</label><a class="nc_agree_link agree" href="./agree_member.php" id="agree">??????</a></li>
					   <li><label class="checkbox"><input type="checkbox" data-type="2" name="agree3"><i class="icon"></i><span class="essential">(??????)</span> ???????????? ?????? ??? ?????? ??????</label><a class="nc_agree_link privacy" href="./privacy_member_01.php" id="privacy">??????</a></li>
					   <!--<li><label class="checkbox"><input type="checkbox" data-type="3" name="agree4"><i class="icon"></i><span class="essential">(??????)</span> ????????????????????????</label><a class="nc_agree_link open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_full" href="./privacy.php">??????</a></li>-->
					   </ul>                            
					 </div>
                                </div>

                              
                            </div>
                    <?php }?>
                        </div><!-- .nc_frm__wrap -->

                        <div class="nc_frm-social-agree" >
                            <label class="nc-icheck__label nc-icheck__label--full">
                                <input type="checkbox" name="mem_marketing" class="nc-icheck" value="Y" <?php if($sms_yn=="Y"){?>checked<?php }?> /><span>SMS ?????? ??????(??????)</span><a class="nc_agree_link privacy"  href="./sms_member.php">??????</a>
                            </label>
                            <p class="nc_frm-social-agree__desc">
                                ????????? ??? 14??? ????????????, <a class="nc_agree_link agree" href="./agree_member.php">????????????</a>, <a class="nc_agree_link privacy" href="./privacy_member_01.php">?????????????????? ??? ??????</a>??? ?????? ????????? ?????? ???????????? ???????????????.
                            </p>
                        </div><!-- .nc_frm-social-agree -->

                        <p class="nc_frm__go-to nc_frm__go-to--align-center">?????? ??????????????????? <a class="nc_frm__go-to-link" href="./login.php">?????????</a></p>

                        <div class="nc_frm__control">
                            <input type="submit" class="nc_frm__action" name="submit" id="nc_submit" value="???????????? ????????????" />
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