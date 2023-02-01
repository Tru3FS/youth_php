<?php
if(!defined('_SAMSUNG_')) exit;


if(defined('_INDEX_')) { // index에서만 실행
//	include_once(NC_LIB_PATH.'/popup.inc.php'); // 팝업레이어
//echo get_cookie('ck_id_save');
//echo get_session('member_id');
//echo get_cookie('ck_auto');
}



?>
 <style>

#logo a svg, #logo a img {
    width: 1.9rem;
    top: 0px;
}
#logo {
      top: 2.5rem;
}
#logo > a > h2 {
    font-size: 2.4rem !important;
	color:#111;
	font-weight:bold;
    font-family: 'NotoSansKR', sans-serif;
}

.member_menu_container {
      top: 3.7rem;

}
.small_menu_top div h2 {
font-family: 'NotoSansKR', sans-serif;    font-weight: bold;
}
@media (max-width: 1024px){

#logo a svg, #logo a img {
    width: 20px;
    top: 1px;
}

#logo {
  
    top: 1.4rem;
}
#logo > a > h2 {
   
    font-size: 1.7rem !important;

}
.member_menu_container {
    top: 1.7rem;
}
.small_menu_top .grayBox.top .txt {
    margin-left: 18px;
}
}
.small_menu_top:after {
    background-image: url(../s_img/slogo_w.svg);
 }
@media (max-width: 768px){
#logo {
    top: 17px  !important;

}
#logo a svg, #logo a img {
    width: 14px;
    top: 1px;
}

#logo > a > h2 {
    font-size: 16px !important;
}
.member_menu_container {
    top: 18.2px;
}
#logo > a > h2 {
 
    font-family: 'NotoSansKR', sans-serif;
}
.small_menu_top .grayBox.top {
    margin-top: 10px;
    padding: 10px 6% 20px;
    background-position: center 25px;
    background-size: 40px;
}

.small_menu_top .grayBox.top:before {
    top: 41%;
}

}


@media (max-width: 480px){

<?php if ($is_member) {?>

.member_menu > li:first-child {
    display: none;
}

.open_menu .member_menu > li:first-child {
    display: inline-block;
}
.member_menu > li:last-child {
    margin-right: 0px;
}
<?php }else{?>

.member_menu > li:first-child {
    display: inline-block;
	margin-right: 5px;
}


.member_menu > li:nth-child(2) {
    display: none;
}
.open_menu .member_menu > li:nth-child(2) {
    display: inline-block;
}
.open_menu .member_menu > li:first-child {
    display: inline-block;
	margin-right: 0px;
}



<?php }?>
.small_menu_top .grayBox.top .txt {
    margin-left: 23px;
}

}

 </style>

<div id="skip">
        <a href="#main">메인 콘텐츠 바로가기</a>
    </div>
<header id="header">
<div class="header_wrap">

  <div id="logo">
                <a href="<?php echo NC_URL; ?>/?center_id=<?php echo $center_id;?>">
                          <span class="sr-only">서울특별시 공공서비스 예약</span>
          <img src="<?php echo NC_URL; ?>/s_img/slogo_symbol.svg">&nbsp;<h2><?php echo get_session("center_name");?></h2>
                </a>
            </div><!-- #logo -->

<nav class="tab_menu_container" style="display:block;">
                <ul id="tab_menu" class="tab_menu">
				<li class="menu-item  <?php if($page_info=='index' || $n_type=='program_view'){?>current-menu-item<?php }?>"><a href="<?php echo NC_URL; ?>/center_index.php?center_id=<?php echo $center_id;?>"><span>인터넷접수</span></a> 
				<ul class="sub-menu">
	<li id="" class="menu-item "><a href="<?php echo NC_URL; ?>/center_index.php?center_id=<?php echo $center_id;?>"><span>수강신청</span></a></li>
	<li id="" class="menu-item "><a href="#"><span>접수현황</span></a></li>
</ul></li>

<li class="menu-item " id="mypage_nav" style="display: block;"><a href="#!"><span>마이페이지</span></a>
 <ul class="sub-menu">
<li id="" class="menu-item <?php if($page_info=='mypage_leture' && $status=='001'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>"><span>강좌신청현황</span></a></li>
	<li id="" class="menu-item <?php if($page_info=='mypage_leture' && $status=='002'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>"><span>강좌이력현황(재수강)</span></a></li>
	<li id="" class="menu-item <?php if($page_info=='mypage_leture' && $status=='003'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>"><span>환불신청현황</span></a></li>
	<li id="" class="menu-item"><a href="<?php echo NC_MYPAGE_URL; ?>/m_edit_step_01.php?center_id=<?php echo $_SESSION['center_id'];?>"><span>회원정보수정</span></a></li>
</ul></li>
<!--<li class="menu-item  menu-item-189"><a href="#!"><span>오시는길</span></a></li>-->

</ul>
                <a href="#" class="total_menu_open_button total_menu_open"><span class="sr_only">전체 메뉴 열기</span></a>
            </nav>

 <div class="member_menu_container" id= "member_menu_container">
                <ul class="member_menu">
				
		

                    
                        <?php if ($is_member) {?>
						<li><a id="header_login_btn" href="<?php echo NC_MEMBER_URL; ?>/logout.php?center_id=<?php echo $_SESSION['center_id'];?>">로그아웃</a></li> <li  class="my"><a href="<?php echo NC_MYPAGE_URL; ?>/index.php?center_id=<?php echo $_SESSION['center_id'];?>">마이페이지</a></li><li  class="mylecture"><!--<a href="<?php echo NC_MYPAGE_URL; ?>/m_edit_step_01.php" class="">회원정보수정</a>--><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?center_id=<?php echo $_SESSION['center_id'];?>">내강좌</a></li>
						<?php }else{?>
						<li><a id="header_login_btn" <?php if(($n_type=="login") || ($n_type=="program_view")){?><?php }else{?>class="open_in_modal_page xl_open_in_modal_popup xl_open_in_modal_popup_narrow"<?php }?> href="<?php echo NC_MEMBER_URL; ?>/login.php?center_id=<?php echo $_SESSION['center_id'];?>">로그인</a></li>         
						<li><a id="header_register_btn" href="<?php echo NC_MEMBER_URL; ?>/member_division.php?center_id=<?php echo $_SESSION['center_id'];?>" class="">회원가입</a></li>
						<?php } ?>
                                    </ul>
            </div><!-- .member_menu_container -->

<div class="mobile_container">
                <a href="#" id="mobile_open_btn" class="mobile_open_btn"><span class="sr_only">메뉴 열기</span></a>
                <i class="noti_count"></i>
            </div>
</div>

  <div id="small_menu_close"><span class="sr_only">close</span></div>
        <div id="small_menu_overlay"></div>
        <div id="small_menu_container" class="small_menu_container">
            <div class="small_menu_container_inner">
                <div class="small_menu_top">
                <div>
				<h2><?php echo get_session('center_name');?></h2>
				<div class="grayBox top">
			<p class="txt"><a href="tel:<?php echo get_session("telephone");?>"><?php echo get_session("telephone");?></a></p>
		</div>
                </div>
				
				</div><!-- .small_search_container -->

                <div class="small_menu_area">
                    <div class="small_tab_nav"></div>

                    <div class="small_depth_nav">
                        <div class="small_depth_nav_inner">
                            <ul id="small_depth_menu" class="small_depth_menu">
							<li class="menu-item  menu-item-has-children <?php if($n_type=='index' || $n_type=='program_view'){?>current-menu-item<?php }?>"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $center_id;?>"><span>인터넷접수</span></a>
<ul class="sub-menu">
	<li class="menu-item  <?php if($n_type=='cindex' ){?>current-menu-item<?php }?>"><a href="<?php echo NC_URL; ?>/center_index.php?center_id=<?php echo $_SESSION['center_id'];?>"><span>수강신청</span></a></li>
	<li class="menu-item  <?php if($n_type=='index' && $center_id=='01'){?>current-menu-item<?php }?>"><a href="#!"><span>접수현황</span></a></li>	
	</ul>
</li>

<li class="menu-item  menu-item-has-children <?php if($page_info=='mypage'){?>current-menu-item<?php }?>"><a href="#!"><span>마이페이지</span></a>
<ul class="sub-menu">
<li class="menu-item   <?php if($n_type=='mypage'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/index.php?center_id=<?php echo $_SESSION['center_id'];?>"><span>메인페이지</span></a></li>
	<li class="menu-item   <?php if($n_type=='member_edit'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/m_edit_step_01.php?center_id=<?php echo $_SESSION['center_id'];?>"><span>회원정보수정</span></a></li>
	<li class="menu-item  menu-item-has-children <?php if($n_type=='mypage_lecture'){?>current_page_ancestor active<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>"><span>내강좌</span></a>
		<ul class="sub-menu"  <?php if($n_type=='mypage_lecture'){?>style="display:block"<?php }?>>
		<li class="menu-item  <?php if($n_type=='mypage_lecture' && $status=='001'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>"><span>강좌신청현황</span></a></li>
		<li class="menu-item  <?php if($n_type=='mypage_lecture' && $status=='002'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>"><span>강좌이력현황(재수강)</span></a></li>
		<li class="menu-item  <?php if($n_type=='mypage_lecture' && $status=='003'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>"><span>환불신청현황</span></a></li>
		<!--<li class="menu-item  <?php if($n_type=='member_edit'){?>current-menu-item<?php }?>"><a href="<?php echo NC_MYPAGE_URL; ?>/lindex.php?status=003"><span>회원정보수정</span></a></li>-->
	</ul>
</li>
	<li class="menu-item  "><a href="<?php echo NC_MEMBER_URL; ?>/logout.php?center_id=<?php echo $_SESSION['center_id'];?>"><span>로그아웃</span></a></li>
</ul>
</li>


				<!--		<li class="worship menu-item  menu-item-has-children "><a href="#!"><span>오시는길</span></a></li>-->
                            <div class="small_depth_sns">
                                <b lang="en">FAMILY SITE</b>
                                <ul>
                                   <li class="blank"><a target="_blank" rel="noopener" href="https://www.seoul.go.kr/main/index.jsp">서울특별시</a></li>
									<li class="blank"><a target="_blank" rel="noopener" href="http://www.mohw.go.kr/react/index.jsp">보건복지부</a></li>
								  							                                </ul>
                            </div><!-- .small_depth_sns -->
                        </div><!-- .small_depth_nav_inner -->

                    </div><!-- .small_depth_nav -->
                </div><!-- .small_menu_area -->
            </div><!-- .small_menu_container_inner -->
        </div><!-- .small_menu_container -->




</header>
<div class="mobile_nav_bar">
        <?php if ($is_member) {?> <a class="mobile_nav_btn mylecture" href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>"><i></i><span>내강좌</span></a><?php }else{?> <a class="mobile_nav_btn call" href="tel:<?php echo get_session("telephone");?>"><i></i><span>콜센터</span></a><?php } ?>
        <a class="mobile_nav_btn weekly" href="<?php echo NC_URL; ?>/center_index.php?center_id=<?php echo $_SESSION['center_id'];?>"><i></i><span>수강신청</span></a>
        <a class="mobile_nav_btn home" href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>"><i></i><span>홈</span></a>
        <?php if ($is_member) {?><a class="mobile_nav_btn account" href="<?php echo NC_MYPAGE_URL; ?>?center_id=<?php echo $_SESSION['center_id'];?>"><i></i><span lang='en'>MY</span></a><?php }else{?><a class="mobile_nav_btn account nc-login-first" href="<?php echo NC_MEMBER_URL; ?>/login.php?center_id=<?php echo $_SESSION['center_id'];?>"><i></i><span lang='en'>MY</span></a><?php } ?>
        <a class="mobile_nav_btn menu total_menu_open" href="#" id="small_menu_btn"><i></i><span>메뉴</span></a>
    </div>
	<div id="tab_menu_overlay"></div>