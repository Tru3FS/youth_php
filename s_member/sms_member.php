
<?php
include_once('./_common.php');

?>




<style>

.pro_body_section .agree_box b {
    display: block;
    font-size: 16px;
 
    line-height: 1.75;
    color: #000;
    font-weight: normal;
}
.pro_body_section .agree_box ul li:before {
    content: '';
    display: block;
    width: 4px;
    height: 4px;
    position: absolute;
    left: 0;
    top: 10px;
    background: #2c7fdf;
    border-radius: 0;
}
.pro_body_section .agree_box ul li:before {
    top: 7px;
}

.pro_body_section .agree_box ul li {
    padding-left: 10px;
    margin-bottom: 7px;
    position: relative;
    font-size: 14px;
    color: #222;
    letter-spacing: -0.01em;
    line-height: 1.6;font-weight:400;

}

.pro_body_section .agree_box ul li span{
  font-weight:500;

}

.pro_body_section .agree_box ul li {
    font-size: 13px;
}
@media (max-width: 767px){
.pro_body_section .agree_box ul li {
    padding-left: 8px;    line-height: 1.3;
	font-size: 13px;
}
.pro_body_section .agree_box ul li:before {
    top: 5px;
}

.mfp-close {
    width: 30px;
    height: 30px;
    top: -50px;
    right: -50px;
    font-size: 0;
    background: #f8f8f8;
    border-radius: 50%;
    cursor: pointer;
    opacity: 1;
	line-height: 30px;
}
.mfp-close:after{
font-size: 12px;
line-height: 30px;
}
}
@media (max-width: 540px){
.pro_body_section .agree_box ul li {
    padding-left: 8px;    line-height: 1;
	font-size: 13px;

}
.pro_body_section .agree_box ul li:before {
    position: absolute;
    left: 0;
    top: 5px;
}
html.ios .pro_body_section .agree_box ul li:before {top: 6px}

button.mfp-close, button.mfp-close:active {
    top: 6px;
    right: 6px;
}
.professional_data_head .popup-logo {
    max-width: 80px;
    position: absolute;
    right: 20px;
    top: 60px;
}
}
.type_table {width: 100%;position: relative;border-top: 2px solid #222;table-layout: fixed;margin-bottom:30px;margin-top:20px;}
.type_table caption {width: 1px;height: 1px;position: absolute;top: 0;left: 0;font-size: 0;line-height: 0;overflow: hidden;}
.type_table th {    text-align: center;
    padding: 4px 4px;
    position: relative;
    vertical-align: middle;
    font-size: 11px;
    /* font-weight: 600; */
    border-bottom: 2px solid #ddd;
    width: 50%;}
.type_table tbody th{ padding: 19px 30px;}
.type_table tbody > tr:first-child th:before {content: '';display: block;width: 1px;height: 17px;position: absolute;left: 0;top: 50%;-webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);transform: translateY(-50%);background: #ddd;}
.type_table tbody > tr:first-child th:first-child:before {display: none;}
.type_table td {    padding: 4px 4px;vertical-align: middle;font-size: 16px;border-bottom: 1px solid #eaeaea;border-left: 1px solid #eaeaea;    font-size: 11px; text-align:center;}
.type_table td:first-child {border-left: none;}
.type_table td b {font-weight: 600;color: #222;}
.professional_data_body .nicescroll_area {
    padding-right: 0;
}
.pro_body_section .agree_box ul li {
    padding-left: 8px;
    line-height: 1.5;
    font-size: 13px;
    margin-bottom: 3px;
}
.professional_data_head .popup-logo{
border-radius: 4px;
}
.pro_body_section p {
    margin-bottom: 5px;
}

</style>

<div class="professional_data">

    <div class="professional_data_head gry">
       <div >
 
<img class="popup-logo" src="../s_img/slogo.svg" alt="">

</div>


        <b data-font="secondary">SMS 수신동의</b>
        <p data-font="secondary"><?php echo get_session("center_name");?> SMS 수신동의 안내</p>
    </div>

    <div class="professional_data_body">
        <div class="nicescroll_area_outer">
            <div class="nicescroll_area">
         


  


<style>

.tableWrap{position:relative;}

.tableWrap .scrollDiv{overflow-x:auto;}
.tableWrap .scrollDiv::-webkit-scrollbar{height:7px; background:#f0f0f0;}
.tableWrap .scrollDiv::-webkit-scrollbar-thumb{background:#a9a9a9; border-radius:0;}

.tableWrap.management table tbody  tr:first-child th {
    padding: 20px;
    background:#f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size: 13px;
	vertical-align: middle;border-top: 0px solid #dae1e6;text-align: center;
}

.tableWrap.management table tbody th {
    padding: 20px;
    background: #f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size: 13px;
	vertical-align: middle;border-top: 1px solid #dae1e6;text-align: center;
}
.tableWrap .taL {
    text-align: left !important;
	    line-height: 1.6;
  font-weight:500;font-size: 13px;padding: 10px;
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




.tableR table tbody tr td.txt_right{text-align:right;}
.tableR table tbody tr td.txt_left{text-align:left;}
legend, caption, hr {
    display: none;
}
.professional_data_body .nicescroll_area {
    padding-right: 0;
}

.pro_body_section .cbottom {
   text-align: left !important;
    line-height: 1.6;
    font-weight: 500;
    font-size: 1.3rem;
    margin-top: 10px;color: #555;
}
.professional_data_body .nicescroll_area_outer {
      padding: 0 30px 0px 30px;
}
.professional_data_head .popup-logo {
    max-width: 100px;
    position: absolute;
    right: 35px;
    top: 60px;
}
@media (max-width:768px){
.professional_data_head .popup-logo {
    max-width: 80px;
    position: absolute;
    right: 35px;

    top: 55px;
}

.tableWrap.management table tbody tr:first-child th,.tableWrap.management table tbody th {
    padding: 20px;
    font-size: 13px;

}
.tableWrap .taL {
    text-align: left !important;
    line-height: 1.6;
    font-weight: 500;
    font-size: 13px;
    padding: 10px;
}
}
@media (max-width:640px){
.professional_data_head .popup-logo {
    max-width: 60px;
    position: absolute;
    right: 25px;

    top: 55px;
}
}
</style>


<div class="pro_body_section">
<div class="agree_box">


<div class="tableWrap management">
		



					<div class="tableR">
						<table><caption>
								sms 수신동의
							</caption>
							<colgroup><col width="30%"><col width="70%"></colgroup>
							<tbody><tr><th>
										수집 및 이용목적
	
									</th>
									
									<td class="borT0 taL">
								<?php echo $_SESSION['center_name'];?> 에서 제공하는 이벤트/혜택 등의 다양한 정보 휴대전화(문자) 수신

</td>
								</tr><tr><th>
										보유 및 이용기간


									</th>
									<td class="taL" style="font-size:1.5rem;line-height: 1.4;">
								회원 가입 기간 내에 데이터는 안전하게 보관되며, 회원 탈퇴 시에 데이터는 지체 없이 파기됩니다.


									</td>
								</tr><tr><th>
								거부 권리 및 불이익


									</th>
									<td class="taL"  style="font-size:1.5rem;line-height: 1.4;">
							해당 서비스에 대한 내용은 거부 하실 수 있으며, SMS 수신에 대한 선택적 사항이므로 동의하지 않더라도 이용에는 제한이 없습니다.
									</td>
								</tr></tbody></table></div>


				</div>

<div class="cbottom"><span>※ 해당 서비스는 동의 시에 위탁 운영되며, 위탁 업체에 관한 정보는 개인정보처리방침 페이지에 공개되어 있습니다.</span></div>
<div class="cbottom"><span style="font-size:1.4rem;">※ 정보통신망법 제50조 영리목적의 광고성 정보 전송 제한<br>
<ul>
<li>명시적인 사전 동의를 득해야 하며 수신거부시 전송을 금지, 오후 9시부터 익일 8시까지 전송 금지</li>
<li>수신자에 구체적인 사항을 안내 (전송자의 명칭 연락처, 수신거부 또는 동의 철회할 수 있는 방법)</li>
<li>수신 동의 및 거부/철회의 처리 결과를 수신자에게 알려야하며 2년마다 수신 동의 여부를 확인해야 함.</li>
</ul>
 </span></div>
			</div>


</div>


            </div>
        </div>
    </div>

</div>
