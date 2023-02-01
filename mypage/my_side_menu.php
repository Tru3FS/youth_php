<?php
if(!defined('_SAMSUNG_')) exit;



?>

<div id="sidemenu" class="sidebar">
					
	<div class="side_menu">
		<nav class="menu init">
			<h2 class="skip">좌측 메뉴</h2>
			<div class="depth depth1">
				<ul class="depth_list depth1_list">
					<li class="depth_item depth1_item <?php if($n_type=="mypage"){?>active<?php } ?>">
		            		<a href="<?php echo NC_MYPAGE_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >마이페이지</a>
													
							
							
		        </li>

	<li class="depth_item depth1_item <?php if($n_type=="mypage_lecture" || $n_type=="mypage_lecture_view"){?>active<?php } ?>">
		            		<a href="#!" class="depth_text depth1_text" target="_self"  >내 강좌</a>
							<div class="depth depth2">
		            			<ul class="depth_list depth2_list">
			            						<li class="depth_item depth2_item <?php if(($n_type=="mypage_lecture" || $n_type=="mypage_lecture_view") && $status=="001"){?>active<?php } ?>">
			            						<a href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=001&center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth2_text" target="_self" >강좌신청현황</a>
			            						</li>
			            						<li class="depth_item depth2_item <?php if(($n_type=="mypage_lecture" || $n_type=="mypage_lecture_view") && $status=="002"){?>active<?php } ?>">
			            						<a href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth2_text" target="_self" >강좌이력현황(재수강)</a>
			            						</li>	
												<li class="depth_item depth2_item <?php if(($n_type=="mypage_lecture" || $n_type=="mypage_lecture_view") && $status=="003"){?>active<?php } ?>">
			            						<a href="<?php echo NC_MYPAGE_URL;?>/lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth2_text" target="_self" >환불신청현황</a>
			            						</li>	
		            					</ul>
		            		</div>
		        </li>

				<li class="depth_item depth1_item <?php if($n_type=="member_edit"){?>active<?php } ?>">
		            		<a href="<?php echo NC_MYPAGE_URL; ?>/m_edit_step_01.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >회원정보수정</a>
													
							
							
		        </li>	
		   
			
				<li class="depth_item depth1_item">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/logout.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >로그아웃</a>
													
							
							
		        </li>	
		    	<?php if($_SESSION['m_id']=="dreamix"){?>
				<li class="depth_item depth1_item <?php if($n_type=="privacy"){?>active<?php } ?>">
		            		<a href="<?php echo NC_MYPAGE_URL; ?>/privacy.php?center_id=<?php echo $_SESSION['center_id'];?>" class="depth_text depth1_text" target="_self"  >개인정보처리방침</a>
		        </li>
				<?php }?>
				<!--
				<li class="depth_item depth1_item ">
		            		<a href="<?php echo NC_MEMBER_URL; ?>/pwd_search.php" class="depth_text depth1_text" target="_self"  >비밀번호찾기</a>
		        </li>-->
		        </ul>
			</div>
		</nav>
	</div>









					</div>
				