<?php
include_once('./common.php');


if($_SESSION["center_id"] != ""){ 


$n_type="404";
$page_info="404";



$n_type="404";
$page_info="404";




include_once(NC_PATH.'/head2.php'); 
include_once(NC_THEME_PATH.'/404.skin.php'); 



include_once(NC_PATH.'/tail.php');








}else{

?>

<!DOCTYPE html>
<html lang="ko-KR">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta content="yes" name="apple-mobile-web-app-capable" />  
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, viewport-fit=cover">
<link rel="icon" type="icon/x-image" sizes="32x32 192x192" href="../s_img/favicon.png" size="192x192">
<link rel="apple-touch-icon" href="/s_img/touch-icon-web.jpg" />
<link rel="apple-touch-icon-precomposed" href="../s_img/touch-icon-web.jpg">
<meta name="msapplication-TileImage" content="../s_img/favicon.png" size="270x270" />
<meta name="title" content="서울특별시 공공서비스 예약" />
<meta name="keywords" content="서울특별시 공공서비스 예약, 체육시설, 문화시설" />
<meta name="description" content="한번에 쉽게 간편하게 서울특별시 공공서비스 예약" />
<title>서울특별시 공공서비스 예약</title>
<script src="./s_js/browser-selector.js"></script>
<link rel='stylesheet' id='font-css'  href='../s_css/font.css?ver=20230118171208' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href='../s_css/magnific-popup.css' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-motion-css'  href='../s_css/magnific-popup-motion.css' type='text/css' media='all' />
<link rel='stylesheet' id='datapicker-css'  href='../s_css/datapicker-jquery-ui.min.css?ver=20230118171208' type='text/css' media='all' />
<link rel='stylesheet' id='selectric-css'  href='../s_css/selectric.css' type='text/css' media='all' />
<link rel='stylesheet' id='icheck-css'  href='../s_css/icheck.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-css'  href='../s_css/slick.css' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css'  href='../s_css/swiper.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='reset-css'  href='../s_css/reset.css' type='text/css' media='all' />
<link rel='stylesheet' id='default-css'  href='../s_css/default.css?ver=20230118171208' type='text/css' media='all' />
<link rel="shortcut icon" href="../s_img/favicon.ico">
<link rel='icon' href='../s_img/favicon.ico'>
<link rel='stylesheet' id='default_etc-css'  href='../s_css/default_etc.css?ver=20230118171208' type='text/css' media='all' />
<script  src='../s_js/jquery-1.10.2.min.js'></script>
<script  src='../s_js/jquery-ui.min.js'></script>
<style>


.nc-btn__basic {
    display: inline-block;
    position: relative;
    vertical-align: middle;
    line-height: 1;
    text-align: center;
    padding: 1.5rem 3.2rem;
    font-size: 1.4rem;
    font-weight: 500;
    letter-spacing: -0.025em;
    color: #222;
    border: 0.2rem solid #222;
    background: transparent;
    -webkit-transition: all 300ms;
    transition: all 300ms;
}
.nc-btn__basic.nc-btn--type-02 {
    border-color: #034EA2;
    color: #fff;
    background: #034EA2;
}
.error404 .main_container {padding-bottom: 0;}
.error404 .go_top {display: none;}

.error_404 {padding: 16rem 0 16.7rem; position: relative;}
.error_404_bg {position: absolute; top: 0; left: 0; width: 100%; height: 100%;  background-size: cover; background-position: center center;}
.error_404_container {position: relative;text-align: center;}
.error_404_container h1 {font-size: 2.2rem;font-weight: 600;line-height: 1.4;color: #222; letter-spacing: -0.025em;}
.error_404_container p {padding: 1.4rem 0 3.4rem;font-size: 1.5rem;font-weight: 400;line-height: 1.67;color: #222; letter-spacing: -0.025em;}
.error_404_button_wrap {font-size: 0;}
.error_404_button_wrap .jt-btn__basic {min-width: 16rem;}

.mobile_br {
    display: block;
}


@media (min-width: 1024px){
.mobile_br {
    display: none;
}

.nc-btn__basic {
    border-width: 0.2rem;
    padding: 1.9rem 1rem 2.1rem;
    font-size: 1.6rem;
    min-width: 21rem;
    transition: background 0.3s, border 0.3s;
    -webkit-transition: background 0.3s, border 0.3s;
}

     .error_404 {padding:19rem 0 19rem;}
	.error_404_bg {}
	.error_404_container h1 {font-size:10rem;}
	.error_404_container p {font-size:1.6rem; line-height: 1.63; padding: 1.3rem 0 4.6rem;}
	.error_404_button_wrap .nc-btn__basic {min-width: 21rem;}
    html.desktop .error_404_button_wrap .nc-btn__basic:hover {background:#1d3661; border-color:#1d3661;color:#fff;}

}

</style>

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


.member_menu > li:first-child {
    display: none;
}

.open_menu .member_menu > li:first-child {
    display: inline-block;
}
.member_menu > li:last-child {
    margin-right: 0px;
}
.small_menu_top .grayBox.top .txt {
    margin-left: 23px;
}

}

 </style>

</head>
<body>
<main id="main" class="main_container">

<div class="error_404">
	<div class="error_404_bg"></div>
	<div class="error_404_container">
		<h1 lang="en">400 ERROR</h1>
		<p>존재하지 않는 주소를 입력하셨거나, <br>요청하신 페이지의 주소가 변경, 삭제되어 <br class="mobile_br">찾을 수 없습니다.</p>

		<div class="error_404_button_wrap">
			<a lang="en" class="nc-btn__basic nc-btn--type-02" href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>"><span>메인으로</span></a>
		</div><!-- .error_404_button_wrap -->
	</div><!-- .error_404_container -->
</div>



</main>


<script  src='../s_js/jquery.easing.1.3.js'></script>
<script  src='../s_js/TweenMax.min.js'></script>
<script  src='../s_js/ScrollToPlugin.min.js'></script>
<script  src='../s_js/clipboard.min.js'></script>
<script  src='../s_js/favicon.min.js'></script>
<script  src='../s_js/datapicker/jquery-ui.min.js'></script>
<script  src='../s_js/jquery.magnific-popup.min.js'></script>
<script  src='../s_js/jquery.selectric.js'></script>
<script  src='../s_js/icheck.min.js'></script>
<script  src='../s_js/jquery.nicescroll.min.js'></script>
<script  src='../s_js/jquery.customFile_Nc.js'></script>
<script  src='../s_js/jquery.waypoints.min.js'></script>
<script  src='../s_js/slick.min.js'></script>
<script  src='../s_js/swiper.min.js'></script>
<script  src='../s_js/unveil.js'></script>
<script  src='../s_js/imagesloaded.min.js?ver=20230118171208'></script>
<script  src='../s_js/isotope.pkgd.min.js'></script>
<script  src='../s_js/nc.js?ver=20230118171208'></script>
<script  src='../s_js/nc_etc.js?ver=20230118171208'></script>
<script  src='../s_js/samsungnc.js?ver=20230118171208'></script>
<script  src='../s_js/samsungnc_etc.js?ver=20230118171208'></script>
<script  src='../s_js/popup.js?ver=20230118171208'></script>
<script  src='../s_js/login.js?ver=20230118171208'></script>
<script  src='../s_js/common.js?ver=20230118171208'></script>


</body>
</html>
 <?php }?>