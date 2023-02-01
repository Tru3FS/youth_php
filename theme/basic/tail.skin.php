<?php
if(!defined('_SAMSUNG_')) exit;
?>
		<!--
		<?php
		if(!defined('_INDEX_')) { // index가 아니면 실행
			echo '</div>'.PHP_EOL;
		}
		?>
	</div>
   -->
	<!-- 카피라이터 시작 { -->
		<footer id="footer">
		<a href="javascript:void(0);" id="go_top" class="go_top js_go_top_hide"><span class="sr_only">TOP</span></a>

		<div class="footer_top">
			<nav class="footer_menu_wrap">
				<ul class="footer_menu agreement-list">
					<li class="privacy"><a class="nc_agree_link privacy" href="<?php echo NC_MEMBER_URL; ?>/privacy.php?center_id=<?php echo $_SESSION['center_id'];?>">개인정보처리방침</a></li>
					<li><a class="nc_agree_link privacy" href="<?php echo NC_MEMBER_URL; ?>/agree.php?center_id=<?php echo $_SESSION['center_id'];?>">이용약관</a></li>
					<!--<li><a href="#!">이메일무단수집거부</a></li>-->
				</ul>
			</nav>
		</div>

		<div class="footer_bottom">
			<div class="footer_inner">
				<div class="family_select">
                    <div class="family_select_overlay"></div>
					<button type="button" class="family_select_title" lang="en"><span>Family Site</span></button>
                    <div class="family_select_list_container">
						<div class="nicescroll_area_outer">
                            <div class="nicescroll_area_footer">
								<ul>
									<li><a target="_blank" rel="noopener" href="https://www.seoul.go.kr/main/index.jsp">서울특별시</a></li>
									<li><a target="_blank" rel="noopener" href="http://www.mohw.go.kr/react/index.jsp">보건복지부</a></li>
								</ul>
                            </div><!-- .nicescroll_area -->
                        </div><!-- .nicescroll_area_outer -->
					</div><!-- .family_select_list_container -->
                </div><!-- .solution_select -->

				<div class="footer_info">
					<p><span lang="en">사업자명 : <?php echo get_session("center_name");?> | 사업자번호 : <?php echo get_session("corp_no");?> | 대표자명 : <?php echo get_session("president");?></span></p>
					<p><span lang="en">(우) <?php echo get_session("post_no");?>  <?php echo get_session("address");?></span></p>
					<p>
						<span lang="en">TEL. <a href="tel:<?php echo get_session("telephone");?>"><?php echo get_session("telephone");?></a></span>
						<span lang="en" style="display:none;">FAX. <?php echo get_session("telephone");?></span>
					</p>
				</div><!-- .footer_info -->

				<p lang="en" class="copyright">&copy;Seoul Metropolitan Government. All Right Reserved.</p>

			</div><!-- .footer_inner -->
		</div><!-- .footer_bottom -->
	</footer>
<!--
<div id="dbloading" class="ld-overlay is-act is-full-page is-deact" style="display:none;">
<div class="ld-background"></div>
<div class="ld-icon ld-pc-icon">
<div data-v-202205="" class="loading-container">
<div data-v-202205="" class="loading-content step1">
<div data-v-202205="" class="spinner">
<div data-v-202205="" class="bounce1"></div>
<div data-v-202205="" class="bounce2"></div>
<div data-v-202205="" class="bounce3"></div>
<div data-v-202205="" class="bounce4"></div>
</div>
<br data-v-202205=""><strong data-v-202205="" class="title">잠시만 기다려 주세요</strong></div>
<div data-v-202205="" class="round"></div></div></div></div>
-->
<style>
@media (min-width: 1024px){
.footer_menu > li:after { content: ''; display: block; width: 0.5rem; height: 0.8rem; background: url(<?php echo NC_IMG_URL; ?>/footer-spr.png); background-size: 0.5rem 0.8rem; position: absolute; top: 50%; right: -0.2rem; margin-top: -0.4rem; }
}
</style>




<script  src='/s_js/jquery.easing.1.3.js'></script>
<script  src='/s_js/TweenMax.min.js'></script>
<script  src='/s_js/ScrollToPlugin.min.js'></script>
<script  src='/s_js/clipboard.min.js'></script>
<script  src='/s_js/favicon.min.js'></script>
<script  src='/s_js/datapicker/jquery-ui.min.js'></script>
<script  src='/s_js/jquery.magnific-popup.min.js'></script>
<script  src='/s_js/jquery.selectric.js'></script>
<script  src='/s_js/icheck.min.js'></script>
<script  src='/s_js/jquery.nicescroll.min.js'></script>
<script  src='/s_js/jquery.customFile_Nc.js'></script>
<script  src='/s_js/jquery.waypoints.min.js'></script>
<script  src='/s_js/slick.min.js'></script>
<script  src='/s_js/swiper.min.js'></script>
<script  src='/s_js/unveil.js'></script>
<script  src='/s_js/imagesloaded.min.js?ver=<?php echo NC_JS_VER;?>'></script>
<script  src='/s_js/isotope.pkgd.min.js'></script>
<script  src='/s_js/nc.js?ver=<?php echo NC_JS_VER;?>'></script>
<script  src='/s_js/nc_etc.js?ver=<?php echo NC_JS_VER;?>'></script>
<script  src='/s_js/samsungnc.js?ver=<?php echo NC_JS_VER;?>'></script>
<script  src='/s_js/samsungnc_etc.js?ver=<?php echo NC_JS_VER;?>'></script>
<script  src='/s_js/popup.js?ver=<?php echo NC_JS_VER;?>'></script>
<script  src='/s_js/login.js?ver=<?php echo NC_JS_VER;?>'></script>
<!--<script  src='/s_js/program_list.js?ver=<?php echo NC_JS_VER;?>'></script>-->
<script  src='/s_js/common.js?ver=<?php echo NC_JS_VER;?>'></script>
<script	src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js"></script>
