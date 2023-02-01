<?php
if(!defined('_SAMSUNG_')) exit;



?>


<div id="my_top_menu">
						<h3 class="m_element">서브메뉴</h3>
						<ol>
							<li class="home"><a href="<?php echo NC_URL;?>/?center_id=<?php echo $_SESSION['center_id'];?>" title="홈 바로가기">홈</a></li>
							<li class="s_nav s_nav1">
								<a href="javascript:;">마이페이지</a>
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
																					<li><a href="./lindex.php?status=002&center_id=<?php echo $_SESSION['center_id'];?>">강좌이력현황</a></li>
																					<li><a href="./lindex.php?status=003&center_id=<?php echo $_SESSION['center_id'];?>">환불신청현황</a></li>
											</ul>
									</dd>
								</dl>
							</li>
		  			</ol>
					</div>
				