<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if(!defined('_SAMSUNG_')) exit; // 개별 페이지 접근 불가

$begin_time = get_microtime();

define('NC_JS_VER',  date("YmdHis", time()));
define('NC_CSS_VER', date("YmdHis", time()));



/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/




?>
<!DOCTYPE html>
<html lang="ko-KR">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta content="yes" name="apple-mobile-web-app-capable" />  
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, viewport-fit=cover">
<link rel="icon" type="icon/x-image" sizes="32x32 192x192" href="/s_img/favicon.png" size="192x192">
<link rel="apple-touch-icon" href="/s_img/touch-icon-web.jpg" />
<link rel="apple-touch-icon-precomposed" href="/s_img/touch-icon-web.jpg">
<meta name="msapplication-TileImage" content="/s_img/favicon.png" size="270x270" />
<meta name="title" content="서울특별시 공공서비스 예약" />
<meta name="keywords" content="서울특별시 공공서비스 예약, 체육시설, 문화시설" />
<meta name="description" content="한번에 쉽게 간편하게 서울특별시 공공서비스 예약" />
<meta property="og:locale" content="ko_KR" />
<meta property="og:site_name" content="서울특별시 공공서비스 예약" />
<meta property="og:url" content="<?php echo NC_URL; ?>"/>
<meta property="og:type" content="website" />
<meta property="og:title" content="서울특별시 공공서비스 예약" />
<meta property="og:description" content="한번에 쉽게 간편하게 서울특별시 공공서비스 예약" />
<meta property="og:image" content="<?php echo NC_URL; ?>/s_img/og_img.png" />
<title>서울특별시 공공서비스 예약</title>
<script src="/s_js/browser-selector.js"></script>
<link rel='stylesheet' id='font-css'  href='/s_css/font.css?ver=<?php echo NC_CSS_VER;?>' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-css'  href='/s_css/magnific-popup.css' type='text/css' media='all' />
<link rel='stylesheet' id='magnific-popup-motion-css'  href='/s_css/magnific-popup-motion.css' type='text/css' media='all' />
<link rel='stylesheet' id='datapicker-css'  href='/s_css/datapicker-jquery-ui.min.css?ver=<?php echo NC_CSS_VER;?>' type='text/css' media='all' />
<link rel='stylesheet' id='selectric-css'  href='/s_css/selectric.css' type='text/css' media='all' />
<link rel='stylesheet' id='icheck-css'  href='/s_css/icheck.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-css'  href='/s_css/slick.css' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css'  href='/s_css/swiper.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='reset-css'  href='/s_css/reset.css' type='text/css' media='all' />
<link rel='stylesheet' id='default-css'  href='/s_css/default.css?ver=<?php echo NC_CSS_VER;?>' type='text/css' media='all' />
<link rel="shortcut icon" href="/s_img/favicon.ico">
<link rel='icon' href='/s_img/favicon.ico'>
<link rel='stylesheet' id='default_etc-css'  href='/s_css/default_etc.css?ver=<?php echo NC_CSS_VER;?>' type='text/css' media='all' />
<script  src='/s_js/jquery-1.10.2.min.js'></script>
<script  src='/s_js/jquery-ui.min.js'></script>

<script>
var nc_url = "<?php echo NC_URL; ?>";
var nc_is_member = "<?php echo $is_member; ?>";
var nc_is_mobile = "<?php echo NC_IS_MOBILE; ?>";
var nc_cookie_domain = "<?php echo NC_COOKIE_DOMAIN; ?>";
</script>



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
<?php if($n_type=='index') {?>
<body class="home">
<?php } elseif($n_type=='program'  || $n_type=='program_view') {?>
<body class="program_view">
<?php } elseif($n_type=='login') {?>
<body class="login">
<?php } elseif($n_type=='member_join') {?>
<body class="member_join">
<?php } elseif($n_type=='mypage') {?>
<body class="mypage">
<?php } elseif($n_type=='status') {?>
<body class="status">
<?php } elseif($n_type=='mypage_lecture') {?>
<body class="mypage_lecture">
<?php } elseif($n_type=='mypage_lecture_view') {?>
<body class="mypage_lecture_view">
<?php } elseif($n_type=='login') {?>
<body class="login">
<?php } elseif($n_type=='reservation') {?>
<body class="reservation">
<div id="dbloading" class="ld-overlay is-act is-full-page is-deact" style="display:none;">
<div class="ld-background"></div>
<div class="ld-icon ld-pc-icon" >
<div data-v-202205="" class="loading-container">
<div data-v-202205="" class="loading-content step1">
<div data-v-202205="" class="spinner">
<div data-v-202205="" class="bounce1"></div>
<div data-v-202205="" class="bounce2"></div>
<div data-v-202205="" class="bounce3"></div>
<div data-v-202205="" class="bounce4"></div>
</div>
<br data-v-202205=""><strong data-v-202205="" class="title">잠시만 기다려 주세요</strong></div>
<div data-v-202205="" class="round"><!--<img src="/d_img/re_logo.png">--></div></div></div></div>
<?php } elseif($n_type=='member' || $n_type=='agreement'  || $n_type=='privacy' ) {?>
<body class="sub">
<?php}else{?>
<body class="sub">
<?php }?>



		<div class="wrap">
		<div class="postzoom">
                        <button type="button" class="zoom_btn out"><span class="content_chg">화면확대</span></button>
                        <button type="button" class="zoom_btn reset" title="100% 화면"><span class="content_chg"></span><span class="pro font-chg">100%</span></button>
                        <button type="button" class="zoom_btn in"><span class="content_chg">화면축소</span></button>
                    </div>

    </div>
