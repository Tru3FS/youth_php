<?php
if(!defined('_SAMSUNG_')) exit;

$center_id= $_SESSION['center_id'];
 


$json_string = CF_MEMBER_ID($center_id,$member_id, $url);

$json_array = json_decode($json_string, true); 




if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
 return;	
	
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
		<h2>회원정보수정</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>마이페이지</span></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원정보수정</span></li></ul>

		</div>				
	</div>
<div class="article sub-mypage-edit-02">
<div class="article_header large-screen-only" style="display:none;"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">회원가입</h1></div></div></div>

<div class="article_body" >
                <div class="wrap">
<nav class="steps_nav" style="display:none;">
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
                    <div class="nc-form-header" style="display:none;">
                      <h3 class="nc-form-header__title">
                            <span class="nc-form-header__title-point">환영합니다.</span><br>
                            한번에 쉽게 간편하게,<p><b class="nc-form-header__title-bold"><?php echo get_session("center_name");?></b>입니다.</p>
                        </h3>
                        <p class="nc-form-header__desc" style="display:none;"></p>
                    </div>
                     <br><br><br>
<?php 

       
         $i=0;	
         $tcount=count($json_array['ResultData1']); 



		
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
		
		 
		
?>		 
                 

					 <form class="nc_frm" id="nc_frm-mypage-edit-step-02" method="post" autocomplete="off">
                        <input type="text" id="user_id" style="opacity:0;position:absolute;left:-100vw;" />
                        <input type="password" style="opacity:0;position:absolute;left:-100vw;" />
                        
                        <div class="nc_frm__wrap" >
                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_id">아이디</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="member_id" class="nc_frm__field" id="field_id" value="<?php echo $m_id;?>" disabled />
                                </div><!-- .nc_frm__field-wrap -->

                                <div class="nc_frm-message" style="display: none;">
                                    <p class="nc_frm-message__desc">바로 로그인 하시겠습니까?</p>
                                    <a class="nc_frm-message__link" href="./login.php">로그인 하러가기</a>
                                </div>
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data" >
                                <label class="nc_frm__label" for="field_name">이름</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="text" name="member_name" class="nc_frm__field" id="field_name" value="<?php echo $m_name;?>" disabled />
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->
                          <div class="nc_frm__data" >
                                <label class="nc_frm__label" for="field_pwd">비밀번호</label>
                                <div class="nc_frm__field-wrap">
                                   <?php if($up_date!=''){?> <p class="nc_frm__text">
                                        최종수정일
                                        <span class="nc_frm__text__date">
                                            <?php echo $up_date1;?>.<?php echo $up_date2;?>.<?php echo $up_date3;?>                                        </span>
								   </p><?php }else{?><p class="nc_frm__text">
                                        최종수정일
                                        <span class="nc_frm__text__date">
                                           없음                                        </span>
								   </p><?php }?>
                                    <button type="button" class="nc_frm__field-btn nc_frm__field-btn--edit"><span>수정</span></button>
                                 </div>
                                <div class="pwd_edit_wrap" style="display:none;">
                                    <div class="nc_frm__field-wrap">
                                        <input type="password" class="nc_frm__field" id="field_pwd" placeholder="기존 비밀번호" />
                                    </div>
                                    <div class="nc_frm__field-wrap">
                                        <input type="password" class="nc_frm__field" id="field_pwd_new" placeholder="신규 비밀번호 (영문,숫자 조합 10~20자 이내)" />
                                    </div>
                                    <div class="nc_frm__field-wrap">
                                        <input type="password" class="nc_frm__field" id="field_pwd_chk" placeholder="신규 비밀번호 확인" />
                                    </div>
                                    <a class="nc-frm__btn nc-frm__btn--type-02" href="#"><span>비밀번호 변경</span></a>
                                </div>
                            </div>
					  
					        
                            <div class="nc_frm__data nc-frm__data--edit nc_frm__data-auth-group--tel">
                                <label class="nc_frm__label" for="field_tel">연락처(전화)</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="tel" name="member_phone" class="nc_frm__field" id="field_tel" onkeyup="inputPhoneNumber(this);" data-origin="<?php echo $m_phone;?>" value='<?php echo $m_phone;?>' maxlength="13" />
									<button type="button" class="nc_frm__field-btn nc_frm__field-btn--edit"><span>수정</span></button>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->
                               <div class="nc-frm__field-wrap nc-frm__field-wrap--icheck">
                                        <label class="nc-icheck__label nc-icheck__label--full">
                                            <input type="checkbox" class="nc-icheck" name="member_marketing" id="member_marketing" value="Y" <?php if($sms_yn=="Y"){?>checked<?php }?>  />
                                            <span>SMS 수신동의</span>
                                        </label>
                                    </div><!-- .jt-form__field-wrap -->
                            <div class="nc_frm__data">
                                <span class="nc_frm__label">성별</span>
                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="member_gender" class="nc-icheck" value="M" <?php if($m_sex=="M"){?>checked<?php }?> />
                                        <span>남성</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="member_gender" class="nc-icheck" value="F" <?php if($m_sex=="F"){?>checked<?php }?> />
                                        <span>여성</span>
                                    </label>
                                </div><!-- .nc_frm__field-wrap -->
                            </div><!-- .nc_frm__data-->

                            <div class="nc_frm__data">
                                <label class="nc_frm__label" for="field_birth">생년월일</label>
                                <div class="nc_frm__field-wrap">
                                    <input type="date" name="member_birth" class="nc_frm__field nc_frm__field-date" id="member_birth" placeholder="<?php echo $m_birth1;?>-<?php echo $m_birth2;?>-<?php echo $m_birth3;?>" value="<?php echo $m_birth1;?>-<?php echo $m_birth2;?>-<?php echo $m_birth3;?>"/>
                                </div>

                                <div class="nc_frm__field-wrap nc_frm__field-wrap--icheck">
                                    <label class="nc-icheck__label">
                                        <input type="radio" name="member_birth_type" class="nc-icheck" value="0" <?php if($solar_yn=="0"){?>checked<?php }?> />
                                        <span>양력</span>
                                    </label>

                                    <label class="nc-icheck__label">
                                        <input type="radio" name="member_birth_type" class="nc-icheck" value="1" <?php if($solar_yn=="1"){?>checked<?php }?> />
                                        <span>음력</span>
                                    </label>
                                </div>
                            </div>
                 

                        </div>

                        <!--<div class="nc_frm-social-agree" >
                            <label class="nc-icheck__label nc-icheck__label--full">
                                <input type="checkbox" name="member_marketing" class="nc-icheck" value="Y"checked /><span>SMS 수신 동의(선택)</span>
                            </label>
                            <p class="nc_frm-social-agree__desc">
                                본인은 만 14세 이상이며, <a class="nc_frm-social-agree__link open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_full" href="./agreement.php">이용약관</a>, <a class="nc_frm-social-agree__link open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_full" href="./privacy.php">개인정보수집 및 이용</a>에 대한 내용을 확인 하였으며 동의합니다.
                            </p>
                        </div>-->

                      

                        <div class="nc_frm__control">
                            <input type="submit" class="nc_frm__action" name="submit" id="nc_submit" value="회원정보 수정" />
                        </div><!-- .nc_frm__control -->
						
						<div class="nc-separator nc-xl-separator"></div>
						<div class="bottom_exit">
						<div class="nc_frm-sub-header">
                            <div class="nc_frm-sub-header__title">회원탈퇴</div>
                            <div class="nc_frm-sub-header__desc">회원 탈퇴 시 현재 서비스를 이용할 수 없습니다. <br></div>
                        </div>
						<a class="nc_frm__btn" href="./m_withdraw.php"><span>회원 탈퇴하기</span></a>
						</div>
                    </form>
<?php
		 }
		 $i=$i+1;
    }
?>
		 
               </div><!-- .wrap -->
            </div>
</div>
</div>
</div>
</main>
