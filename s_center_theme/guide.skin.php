<?php
if(!defined('_SAMSUNG_')) exit;


?>
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
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span><?php echo $center_txt;?></span></li><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>수강안내</span></li></ul>
</div>
</div>

<div class="wrap">

<div id="sidebar">
				<div class="stit">
						<p>CENTER</p>
						<h2>수강안내</h2>
					</div>
					<div id="sidemenu" class="sidebar">
					
	<div class="side_menu">
		<nav class="menu init">
			<h2 class="skip">좌측 메뉴</h2>
			<div class="depth depth1">
				<ul class="depth_list depth1_list">
				<li class="depth_item depth1_item <?php if($center_id=='01'){?>active<?php }?>">
		            		<a href="<?php echo NC_CENTER_URL; ?>/guide.php?center_id=01" class="depth_text depth1_text" target="_self"  >스포츠센터</a>
													
							
							
		        </li>	
	<li class="depth_item depth1_item <?php if($center_id=='02'){?>active<?php }?>">
		            		<a href="<?php echo NC_CENTER_URL; ?>/guide.php?center_id=02" class="depth_text depth1_text" target="_self"  >문화센터</a>
													
							
							
		        </li>	
		   <!--
				<li class="depth_item depth1_item">
		            		<a href="#!" class="depth_text depth1_text" target="_self"  >문화센터</a>
							<div class="depth depth2">
		            			<ul class="depth_list depth2_list">
			            						<li class="depth_item depth2_item">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >문화센터</a>
			            						</li>
			            						<li class="depth_item depth2_item ">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >문화센터</a>
			            						</li>	
												<li class="depth_item depth2_item ">
			            						<a href="#!" class="depth_text depth2_text" target="_self" >문화센터</a>
			            						</li>	
		            					</ul>
		            		</div>
		        </li>
			   -->
		        </ul>
			</div>
		</nav>
	</div>









					</div>
				

		
				
	
		
				
			</div>


<div id="contents">
<div id="cont_head">
		<h2><?php echo $center_txt;?> 수강안내</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>" class="home">Home</a></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span><?php echo $center_txt;?></span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>수강안내</span></li></ul>

		</div>				
	</div>
<div class="article mypage">

            <div class="article_body">
             

                  <div class="brdWrap">
<nav id="nav_sub_bread" class="nav_sub_bread animate-element fadeIn">
	<div class="inner">
		<ul id="breadcrumb_nav" class="sub_bread_menu">
		<li class="depth2"><a href="#!" id="sub_bread_txt">이용안내</a>
		<ul class="tab_2 tabBtn">
		<li class="off act"><a href="#!">이용안내</a></li>
		<li class="off"><a href="#!">환불</a></li>
		</ul>
		</li>
		</ul>
		</div>
</nav>
<style>


.tableWrap{position:relative;}

.tableWrap .scrollDiv{overflow-x:auto;}
.tableWrap .scrollDiv::-webkit-scrollbar{height:7px; background:#f0f0f0;}
.tableWrap .scrollDiv::-webkit-scrollbar-thumb{background:#a9a9a9; border-radius:0;}

.tableWrap.management table tbody  tr:first-child th {
    padding: 20px;
    background:#f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size: 1.5rem;
	vertical-align: middle;border-top: 0px solid #dae1e6;text-align: center;
}

.tableWrap.management table tbody th {
    padding: 20px;
    background: #f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size: 1.5rem;
	vertical-align: middle;border-top: 1px solid #dae1e6;text-align: center;
}
.tableWrap .taL {
    text-align: left !important;
	    line-height: 1.6;
  font-weight:500;font-size: 1.5rem;padding: 10px;
}


.tableR{border-top:3px solid #006ecd;}
.tableR.type2{border-top:1px solid #ddd}
.tableR table{width:100%; table-layout:fixed; /*border-top:3px solid #000;*/    border-collapse: collapse;}
.tableR table thead tr{border-bottom:1px solid #dae1e6;}
.tableR table thead tr th{font-weight:500; color:#333; font-size:1.8rem; padding:20px 0; border-right:1px solid #dae1e6; background:#f7f9fa;text-align:center;vertical-align: middle;}

.tableR table{
    min-height: auto;
}

.tableR table thead tr th.wht{font-weight:500; color:#333; font-size:13px; padding:20px 0; border-right:1px solid #dae1e6; background:#fff;text-align:center;vertical-align: middle;}


.tableR table thead tr th:last-child{border-right:none;    border-left: 1px solid #dae1e6;}
.tableR table thead tr th p{margin-top:5px; font-weight:500; font-size:18px;}
.tableR table tbody{border-bottom:1px solid #dae1e6;}
.tableR table tbody tr.thead{background:#f7f7f7;}
.tableR table tbody tr.thead td{padding:20px 0; font-weight:500; color:#333; font-size:20px; border-right:1px solid #dae1e6;}
.tableR table tbody tr.tfoot{background:#fbfbfb; background:#fbfbfb;}
.tableR table tbody tr.tfoot td{font-weight:500; color:#333; font-size:14px;}
.tableR table tbody tr.blueBg{background:#ecfaf3;}
.tableR table tbody tr td{padding:20px 8px; text-align:center; font-size:14px; line-height:1.3; border-right:1px solid #dae1e6; border-top:1px solid #dae1e6;font-weight:500;vertical-align: middle;    color: #555;}


.tableR table tbody tr td.price{padding:5px 8px; text-align:right; font-size:14px; line-height:1.3; border-right:1px solid #dae1e6; border-top:1px solid #dae1e6;font-weight:500;vertical-align: middle;}



.tableR table tbody tr td:first-child{padding:6px 10px; text-align:center; font-size:14px; line-height:1.3; border-right:1px solid #dae1e6; border-top:1px solid #dae1e6;font-weight:500;vertical-align: middle;}
.tableR table tbody tr:first-child td{border-top:none;}
.tableR table tbody tr:last-child td{border-bottom:1px solid #dae1e6;}
.tableR table tbody tr td.nsB{font-weight:500;}
.tableR table tbody tr td .txt_right{text-align:right;}
.tableR table tbody tr td .txt_left{text-align:left;}
.tableR table tbody tr td.noBt{border-top:none;}
.tableR table tbody tr td.smTable p{font-size:12px;}
.tableR table tbody tr td p{font-weight:500; font-size:12px;}
.tableR table tbody tr td p.nsEB{font-weight:500; font-size:12px;}
.tableR table tbody tr td span{font-weight:500;}
.tableR table tbody tr td .downArea{overflow:hidden;}
.tableR table tbody tr td .downArea .downTit{float:left; line-height:40px;}
.tableR table tbody tr td .downArea a{float:right;}
.tableR table tbody tr td:last-child{border-right:none;    border-left: 1px solid #dae1e6;    color: #555;}
.tableR table tbody tr td.strongBd{border-bottom:1px solid #ccc;}
.tableR table tbody tr td.thead{font-weight:500; color:#333; font-size:12px; background:#f7f7f7;}
.tableR table tfoot tr td{padding:20px 20px; font-weight:500; color:#333; font-size:12px; text-align:center; line-height:30px; border-right:1px solid #dae1e6; border-bottom:1px solid #ccc; background:#fbfbfb;}
.tableR .tableTxt{margin-top:27px; font-size:22px;}




.tableR table td .re {
    border-color: #e60012;
    background: #e60012;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}


.tableR table td .rt {
    border-color: #00C73C;
    background: #00C73C;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}



.tableR table td .rk {
    border-color: #090f33;
    background: #090f33;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}

.tableR table td .rb {
    border-color: #379DF6;
    background: #379DF6;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}

.tableR table td .ry {
    border-color: #f4811f;
    background: #f4811f;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}

.tableR table td .rh {
    border-color: #ffbb3b;
    background: #ffbb3b;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}
.tableR table td .rx {
    border-color: #d8e2e5;
    background: #fff;
    color: #222;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    border: 1px solid #d8e2e5;
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}


.tableR table td .rc {
    border-color: #f4811f;
    background: #f4811f;
    color: #fff;
    min-height: 30px;
    min-width: 80px;
    padding: 3px 8px;
    margin: 0;
    font-size: 11px;
    line-height: 2;
    /* color: #898989; */
    /* border: 1px solid #d8e2e5; */
    border-radius: 5px;
    text-align: center;
    font-family: "NotoSans-Regular",sans-serif;
}

.tableR table tbody tr td.txt_right{text-align:right;}
.tableR table tbody tr td.txt_left{text-align:left;}
legend, caption, hr {
    display: none;
}
.grayBox {
    margin-top: 50px;
    padding: 40px 10px 40px 50px;
    background: #f8f8f8;
    position: relative; font-size: 16px;font-weight:500;
}
.grayBox:before {
    content: '\E83F';
    top: 42%;
    font-size: 19px;
    font-family: 'nc-font';
    left: 24px;
    position: absolute;
}
.grayBox .txt {
    line-height: 30px;
}

.guide_wrap {
    margin-top: 0px;
    width: 100%;
    padding: 15px 0px;
}

@media only screen and (max-width: 768px){

.tableWrap.management table tbody tr:first-child th {
    font-size: 1.3rem;

}
.scrollDiv .tableR {
    width: 855px;
    /* width: 200%; */
    padding-bottom: 10px;
}
.tableWrap.management table tbody th {

    font-size: 1.3rem;

}
.tableWrap .taL {
    text-align: left !important;
    line-height: 1.6;
    font-weight: 500;
    font-size: 1.3rem;
}
 .grayBox {
    margin-top: 40px;
    padding: 25px 6% 25px;
    background-position: center 25px;
    background-size: 40px;
}
.grayBox .txt {
    font-size: 13px;
    line-height: 19px;margin-left: 30px;
}
.grayBox:before {
    top: 37%;

}
}


</style>


<div class="sub_cont">
        <!-- 컨텐츠 1 -->
        <div class="sub_cont_wrap act">
				   <div class="guide_wrap">
<div class="content_area_rent">
<h3 class="conts_subtitle">
<span>이용안내</span>
</h3>
<?php if($center_id=="01"){?>
  <div class="tableWrap management">
				<div class="scrollDiv">



					<div class="tableR">
						<table><caption>
								이용안내
							</caption>
							<colgroup><col width="30%"><col width="70%"></colgroup><tbody><tr><th>
										접수시간	
									</th>
									
									<td class="borT0 taL">
									평일 06:00~21:00 <br>토요일 06:00~19:00  <br>공휴일 09:00~18:00  <br> 네번째 목요일 휴관일 09:00~16:30
</td>
								</tr><tr><th>
										신규회원 등록 기간	

									</th>
									<td class="taL">
										매월 25일 06:00 선착순 접수(일요일, 공휴일, 휴관일은 09:00부터)

									</td>
								</tr><tr><th>
									현 회원 등록 기간	

									</th>
									<td class="taL">
										매월 15일 ~ 20일

									</td>
								</tr><tr><th>
									현 회원 반 변경	
									</th>
									<td class="taL">
										매월 21일 ~ 24일

									</td>
								</tr><tr><th>
										접수처

									</th>
									<td class="taL">
										지하 3층 안내데스크

									</td>
								</tr></tbody></table></div>


				</div>
			</div>
</div>
<br><br>
<div class="content_area_rent">
<h3 class="conts_subtitle">
<span>영업시간</span>
</h3>
  <div class="tableWrap management">
				<div class="scrollDiv">



					<div class="tableR">
							<table>
								<caption>
									이용안내
								</caption>
								<colgroup>
									<col width="33.3333%">
								<col width="33.3333%">
								<col width="33.3333%">
								</colgroup>
								<thead>
									<tr>
										<th>
											<span style="font-size: 14px;">평일</span>
										</th>
										<th>
											<span style="font-size: 14px;">토요일</span>
										</th>
											<th>
											<span style="font-size: 14px;">공휴일, 일요일</span>
										</th>
									</tr>
								
								</thead>
								<tbody>
								
						<tr>
						<td>06:00 ~ 22:00</td>
						<td>06:00 ~ 20:00</td>
						<td>10:00 ~ 19:00</td>
						</tr>
				           </tbody>
							</table>
						</div>


				</div>
			</div>
</div>


<div class="grayBox">
			<p class="txt">문의 및 접수 : 031-208-8887~8</p>
		</div>

<?php }else{?>


<div class="tableWrap management">
				<div class="scrollDiv">



					<div class="tableR">
						<table><caption>
								이용안내
							</caption>
							<colgroup><col width="30%"><col width="70%"></colgroup><tbody><tr><th>
										접수기간	
									</th>
									
									<td class="borT0 taL">
									[2022년 겨울학기]<br>
2022.11.7(월) ~ 선착순 마감<br><br>

*수강료는 현금 및 신용카드로 결재할 수 있습니다.<br><br>

*강좌 수강료 외 재료비,교재비는 별도입니다.<br><br>

*방문 접수 및 온라인 접수 가능합니다.<br><br>

*온라인 접수는 당일 취소만 가능합니다.<br><br>

</td>
								</tr><tr><th>
										접수시간	

									</th>
									<td class="taL">
										방문   : 평일 09:00~17:00 (주말 및 공휴일 접수불가)  <br>
										온라인 : 평일 05:00~24:00

									</td>
								</tr><tr><th>
									재등록기간	

									</th>
									<td class="taL">
										*재등록은 어린이문화센터에만 해당됨.<br>
										[2022년 겨울학기] 2022.11.1(화) ~ 2022.11.4(금) <br>

									</td>
								</tr><tr><th>
								문의 및 접수	
									</th>
									<td class="taL">
									성  인 ☎031-208-8842 (지상 3층)  / 어린이 ☎031-208-8840 (지하 1층)

									</td>
								</tr></tbody></table></div>


				</div>
			</div>
<div class="grayBox">
			<p class="txt">문의 및 접수 : 성  인 ☎031-208-8842 (지상 3층)  / 어린이 ☎031-208-8840 (지하 1층)</p>
		</div>
</div>
<?php }?>
    </div>		
           </div>
		   <!-- 컨텐츠 1 -->
  <!-- 컨텐츠 2 -->
        <div class="sub_cont_wrap">
		     <div class="guide_wrap">
<!--
<h3 class="conts_subtitle">
<span>환불/변경/연기 규정</span>
</h3>
-->
<?php if($center_id=="01"){?>
  <div class="content_area_rent">
<h3 class="conts_subtitle">
<span>환불규정</span>
</h3>

<!--
<ul class="conts_list nomg"><li class="nodot">등록 당일만 100% 환불 됩니다. (마감 전 1시간)</li>
</ul>
-->
<ul class="conts_list"><li>등록 당일만 100% 환불 됩니다. (마감 전 1시간)</li>
<li>개강 전 환불 시 등록 1일 경과 환불 수수료(이용료의 10%)를 공제 후 환불됩니다.</li>
<li>개강 이후 환불 시 환불 수수료와 일할 계산에 의한 사용분 공제 후 환불됩니다.</li>
<li>환불 신청 당일도 사용분에 포함되어 공제됩니다.</li>
<li>환불금의 경우 천원 미만의 금액 절사됩니다.</li>
<li>현금 결제한 프로그램은 계좌 작성 필요합니다.</li>
<li>강습 달이 지날 경우 환불 불가합니다.</li>
<li>현금 결제한 프로그램은 계좌 작성 필요합니다.</li>
<li>환불 시 다음강습은 신규로 접수하셔야 합니다.</li>
<li>연기 된 프로그램은 환불 및 변경이 불가능 합니다.</li>
</ul>
<br><br>
<ul class="conts_list nomg"><li class="nodot"><strong>유아체능단 신규접수 시 입단비 환불규정</strong></li></ul>
<ul class="conts_list">
<li>단복 맞츰 전 위약금 10% 공제 후 환불 됩니다.</li>
<li>단복 맞춤 후 입단비 환불 불가합니다.</li>
</ul>
<br><br>
<ul class="conts_list nomg"><li class="nodot"><strong>건강 상태 환불규정</strong></li></ul>
<ul class="conts_list">
<li>강습 회원 기준 센터를 이용하지 않고 다음달 7일 전에 전달 소견서를 첨부하시면 100% 환불 가능합니다.</li>
<li>다음달 센터를 이용하지 않으셨더라도 7일 이후 신청하시면 수수료 10% 공제 후 환불 됩니다.</li>
<li>7일 이내 전달 소견서를 첨부하셨더라도 다음달 센터를 이용하신 경우 이용하신 날짜에 수수료 10% 공제됩니다.</li>
</ul>
</div>


<div class="content_area_rent">
<h3 class="conts_subtitle">
<span>변경규정</span>
</h3>

<ul class="conts_list"><li>매달 7일 이내 잔여 인원이 있을 경우 변경 가능</li>
<li>연기 된 프로그램은 환불 및 변경이 불가능 합니다.</li>
</ul></div>

<div class="content_area_rent">
<h3 class="conts_subtitle">
<span>연기규정</span>
</h3>

<ul class="conts_list"><li>헬스 3개월 2회 최대 30일 (최소 7일부터)</li>
<li>6개월 강습1회 한 달 (한 달 단위로만 가능)</li>
<li>12개월  2회 두 달 (달 단위로만 가능)</li>
<li>프로그램 연회원 3회 60일 (최소 7일부터)</li>
<li>골드 연회원 4회 90일 (최소 7일부터)</li>
<li>연기 된 프로그램은 환불 및 변경이 불가능 합니다.</li>
</ul><ul class="conts_list nomg"><li class="nodot"></span>
</li>

</ul>
</div>
<?php }else{ ?>
<div class="content_area_rent">
<h3 class="conts_subtitle">
<span>환불규정</span>
</h3>

<!--
<ul class="conts_list nomg"><li class="nodot">등록 당일만 100% 환불 됩니다. (마감 전 1시간)</li>
</ul>
-->
<ul class="conts_list">
<li> 수업 변경 및 취소는 최초 강의 개시일 전일까지 가능하며, 연기 또는 타인에게 양도가 불가합니다.</li>
<li> 수업 당일 취소 시 해당일의 환불이 적용되지 않습니다. (수업 당일은 수업경과에 해당)</li>
<li> 일일특강 환불은 수업일 기준 3일전까지만 가능하며, 이후 환불되지 않습니다.</li>
<li> 환불 신청은 수강자 본인이 직접 방문하시어 환불신청서를 작성해주셔야 합니다. <br>
     단, 부득이한 사유(입원 등)로 본인 방문이 어려운 경우에는 반드시 수강자 명의 통장사본을 지참해주셔야 합니다.</li>
<li> 환불금은 수강자 본인 계좌로 입금됩니다. </li>
<li> 환불 기준은 평생교육법 시행령에 의거해 환불됩니다.[평생교육법 시행령 제23조]</li>
</ul>

<?php }?>
    </div>		
           </div>
		   <!-- 컨텐츠 2 -->


</div>
            </div>
        </div>




</div>
</div>
</div>
</main>
