<?php
if(!defined('_SAMSUNG_')) exit;
?>
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
	.error_404_container h1 {font-size:6rem;}
	.error_404_container p {font-size:1.6rem; line-height: 1.63; padding: 1.3rem 0 4.6rem;}
	.error_404_button_wrap .nc-btn__basic {min-width: 21rem;}
    html.desktop .error_404_button_wrap .nc-btn__basic:hover {background:#1d3661; border-color:#1d3661;color:#fff;}

}
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
</style>

<main id="main" class="main_container">

<div class="error_404">
	<div class="error_404_bg"></div>
	<div class="error_404_container">
		<h1 lang="en">500 Error</h1>
		<p>일시적인 오류 또는 네트워크 문제로 서비스 접속에 실패했습니다.<br>잠시후 다시 접속하시기 바랍니다</p>

		<div class="error_404_button_wrap">
			<a lang="en" class="nc-btn__basic nc-btn--type-02" href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>"><span>메인으로</span></a>
		</div><!-- .error_404_button_wrap -->
	</div><!-- .error_404_container -->
</div>
</main>

<script>

$(document).ready(function() {
 $('.postzoom').css('display','none');
 $('#dbloading').css('display','none');
});


</script>

