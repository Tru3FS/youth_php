<?php
if(!defined('_SAMSUNG_')) exit;


?>


<style>

#contents {
    width: 100%;
    min-height: 600px;
    margin-top: 40px;
    background: #fff;
}

</style>


<style>
.pro_body_section .agree_box ul li {
    padding-left: 8px;
    line-height: 1.8;
    font-size: 2rem;
    margin-bottom: 3px;
}
.pro_body_section .agree_box b {
    display: block;
    font-size: 2rem;
 
    line-height: 1.75;
    color: #000;margin-bottom:5px;
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
    top: 8px;
}

@media (min-width: 1280px){
.pro_body_section .agree_box ul li:before {
    top: 1.4rem;
}
}

@media (max-width: 1280px){

.pro_body_section .agree_box ul li:before {
    top: 0.8rem;
}

.pro_body_section .agree_box ul li {
    padding-left: 8px;
    line-height: 1.8;
    font-size: 1.3rem;
    margin-bottom: 3px;
}

}



.pro_body_section .agree_box ul li {
    padding-left: 10px;
    margin-bottom: 7px;
    position: relative;
     color: #666;
    letter-spacing: -0.01em;
   font-weight:400;

}
.pro_body_section > div {
    display: block;
    vertical-align: top;
    border-top: 0px solid #ddd;
    padding-top: 5px;
    /* position: relative; */
}
.pro_body_section .agree_box ul li span{
  font-weight:400;

}

.pro_body_section .agree_box ul li {

}
@media (max-width: 767px){
.pro_body_section .agree_box ul li {
    padding-left: 8px;    line-height: 1.3;
	font-size: 13px;
}
.pro_body_section .agree_box ul li:before {
    top: 8px;
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
    top: 9px;
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

.professional_data_head .popup-logo{
border-radius: 4px;
}
.pro_body_section p {
    margin-bottom: 5px;
}

</style>

<style>

.tableWrap{position:relative;}

.tableWrap .scrollDiv{overflow-x:auto;}
.tableWrap .scrollDiv::-webkit-scrollbar{height:7px; background:#f0f0f0;}
.tableWrap .scrollDiv::-webkit-scrollbar-thumb{background:#a9a9a9; border-radius:0;}

.tableWrap.management table tbody  tr:first-child th {
    padding: 20px;
    background:#f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size:  13px;
	vertical-align: middle;border-top: 0px solid #dae1e6;text-align: center;
}

.tableWrap.management table tbody th {
    padding: 20px;
    background: #f7f9fa;
    border-right: 1px solid #dae1e6;
    font-weight:500;font-size:  13px;
	vertical-align: middle;border-top: 1px solid #dae1e6;text-align: center;
}
.tableWrap .taL {
    text-align: left !important;
	    line-height: 1.3;
  font-weight:400;font-size:  12px;;padding: 10px;
}


.tableR{border-top:3px solid #2c7fdf;}
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
.pro_body_section .tableR table tbody tr.tfoot{background:#fbfbfb; background:#fbfbfb;}
.pro_body_section .tableR table tbody tr.tfoot td{font-weight:500; color:#333; font-size:1.5rem;}
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
.professional_data_body .nicescroll_area_outer {
      padding: 0 30px 0px 30px;
}
.professional_data_head .popup-logo {
    max-width: 100px;
    position: absolute;
    right: 35px;
    top: 30px;
}
.nc_privacy_area + .nc_privacy_area {
    margin-top: 15px;
}

.nc_privacy_area .nc_privacy_text{
       font-size: 1.5rem;
    font-weight: 400;
    letter-spacing: -0.04em;
    line-height: 1.7;
    color: #666;
    position: relative;
    margin-top: 0rem;
}
.nc_privacy_title {
    display: block;
    font-size: 2rem;
    font-weight: 500;
    line-height: 1.5;
    letter-spacing: -0.025em;
    color: #222;
}
.nc_privacy_list {
   margin-top: 8px;
}
.nc_privacy_area{
position: relative;
width:100%;

}
.pro_body_section .agree_box ul li.no_bullet:before {
    content: '';
    display: none;
    width: 4px;
    height: 4px;
    position: absolute;
    left: 0;
    top: 10px;
    background: #2c7fdf;
    border-radius: 50%;
}
.pro_body_section .agree_box ul li.no_bullet {
    padding-left: 0px;
    line-height: 1.5;
    font-size: 1.5rem;
    margin-bottom: 3px;
}
.pro_body_section .agree_box ul li.no_bullet.ng {
    padding-left: 8px;
}

.pro_body_section .agree_box .nc_privacy_area b{
       font-size: 1.8rem;
    font-weight: 600;
    letter-spacing: -0.04em;
    line-height: 1.7;
    color: #222;
    position: relative;
    margin-top: 0rem;
}
.pro_body_section .tableR table thead tr th {
    font-weight: 500;
    color: #333;
    font-size: 1.5rem;
    padding: 16px 0;
    border-right: 1px solid #dae1e6;
    background: #f7f9fa;
    text-align: center;
    vertical-align: middle;
}

.pro_body_section .tableR table thead tr th:last-child {
    font-weight: 500;
    color: #333;
    font-size: 1.5rem;
    padding: 10px 0;
    border-right: 0px solid #dae1e6;
    background: #f7f9fa;
    text-align: center;
    vertical-align: middle;
}

.pro_body_section .tableR table tbody tr td:last-child {
    padding: 6px 6px;
    text-align: center;
    font-size: 1.5rem;
    line-height: 1.3;
    border-right: 0px solid #dae1e6;
    border-top: 1px solid #dae1e6;
    font-weight: 500;
    vertical-align: middle;
    color: #555;
}

.pro_body_section .tableR table tbody tr td:first-child {
    padding: 16px 16px;
    text-align: center;
    font-size: 1.5rem;
    line-height: 1.3;
    border-right: 1px solid #dae1e6;
    border-top: 1px solid #dae1e6;
    font-weight: 500;
    vertical-align: middle;
}
.pro_body_section .tableR table tbody tr td {
  padding: 16px 16px;
    text-align: center;
    font-size: 1.5rem;
    line-height: 1.3;
    border-right: 1px solid #dae1e6;
    border-top: 1px solid #dae1e6;
    font-weight: 500;
    vertical-align: middle;
    color: #555;
}
@media (max-width:768px){
.professional_data_head .popup-logo {
    max-width: 80px;
    position: absolute;
    right: 35px;

    top: 55px;
}
.scrollDiv .tableR {
    width: 855px;
    /* width: 200%; */
    padding-bottom: 10px;
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
.pro_body_section .tableR table thead tr th {
    font-weight: 500;
    color: #333;
    font-size: 12px;
    padding: 10px 0;
    border-right: 1px solid #dae1e6;
    background: #f7f9fa;
    text-align: center;
    vertical-align: middle;
}

.pro_body_section .tableR table tbody tr td:first-child {
    padding: 16px 16px;
    text-align: center;
    font-size: 12px;
    line-height: 1.3;
    border-right: 1px solid #dae1e6;
    border-top: 1px solid #dae1e6;
    font-weight: 500;
    vertical-align: middle;
}
.pro_body_section .tableR table tbody tr td {
  padding: 16px 16px;
    text-align: center;
    font-size: 12px;
    line-height: 1.3;
    border-right: 1px solid #dae1e6;
    border-top: 1px solid #dae1e6;
    font-weight: 500;
    vertical-align: middle;
    color: #555;
}
.pro_body_section .agree_box ul li {
    padding-left: 8px;
    line-height: 1.8;
    font-size: 1rem;
    margin-bottom: 3px;
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


<main id="main" class="main_container status">
<div class="wrap">
<div id="contents">
<div id="cont_head">
		<h2>회원이용약관</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>회원이용약관</span></li></ul>

		</div>				
	</div>

<?php if(get_session('center_id')=='118'){?>

<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>
본인은 <?php echo get_session("center_name");?>의 회원으로 가입하여 시설을 이용함에 있어 다음사항을 이행할 것을 서약합니다.</span>

</li>
<br>
<li><span>이용안내</span><br>
1.	본인의 부주의로 시설물을 훼손할 시에는 즉시 변상한다.<br>
2.	시설을 이용함에 있어서 지도자(또는 직원)의 지도에 반하는 일체의 행위를 하지않으며, 안전사고 예방에 항상 최선을 다한다. 만약 본인의 부주의로 인하여 안전사고 및 개인소지품 분실시, 이로 인한 일체의 민형사상 손해배상을 수련관에 요구하지 않는다.
<br>
3.	회원증을 타인에게 양도하거나 대여하는 등 이용질서를 어지럽히는 일체의 부정행위를 하지 않는다.<br>
4.	타프로그램을 무단 이용하다가 적발시는 해당프로그램 수강료의 30배 징수 및 고발조치에 이의를 제기하지 않는다.<br>
5.	스포츠프로그램은 중환자 또는 질병(심장, 혈압이상 등)으로 운동이 곤란하신 분은 참여하실 수 없습니다.<br>
지병이 있으신 분은 수강 전 반드시 지도자와 상담 후 허가 받아 등록하여야 합니다.<br>
6.	질병, 재해, 이사, 출장 등의 사유로 환불시에는 방문접수만 가능하며 아래와 같이 처리함에 동의한다.<br>
•	프로그램 개시 1일전까지 취소신청 한 경우 : 사용료 100% 환불<br>
•	프로그램 개시일 이후에 취소신청 한 경우 : 사용료 총액의 10%를 위약금으로 공제한 후 잔여일에 대하여 일할 계산하여 환불 (8일이후는 환불 불가)<br>
•	환불방법은 환불 신청서를 작성하신 후 처리 절차에 의해 통장입금<br><br>
</li>
<br>

<li><span>구비서류</span><br>
•	본  인  : (신분증, 통장사본)<br>
•	대리인 : (본인+대리인신분증, 통장사본)<br>
•	어린이프로그램(부모신분증, 통장사본, 등본)
<br><br>

</li>
</ul>
<br>
<br>
<!--
<b style="font-weight:500;">부칙</b>
<ul>
<li>(시행일) 이 약관은 2022년 07월 25일부터 적용합니다.</li>
</ul>
-->
</div>
</div>

<?php } else if(get_session('center_id')=='126'){?>

<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>
본인은 <?php echo get_session("center_name");?>의 회원으로 가입하여 시설을 이용함에 있어 다음사항을 이행할 것을 서약합니다.</span>

</li>
<br>
<li><span>이용안내</span><br>
1.	본인의 부주의로 시설물을 훼손할 시에는 즉시 변상한다.<br>
2.	시설을 이용함에 있어서 지도자(또는 직원)의 지도에 반하는 일체의 행위를 하지않으며, 안전사고 예방에 항상 최선을 다한다. 만약 본인의 부주의로 인하여 안전사고 및 개인소지품 분실시, 이로 인한 일체의 민형사상 손해배상을 수련관에 요구하지 않는다.
<br>
3.	회원증을 타인에게 양도하거나 대여하는 등 이용질서를 어지럽히는 일체의 부정행위를 하지 않는다.<br>
4.	타프로그램을 무단 이용하다가 적발시는 해당프로그램 수강료의 30배 징수 및 고발조치에 이의를 제기하지 않는다.<br>
5.	스포츠프로그램은 중환자 또는 질병(심장, 혈압이상 등)으로 운동이 곤란하신 분은 참여하실 수 없습니다.<br>
지병이 있으신 분은 수강 전 반드시 지도자와 상담 후 허가 받아 등록하여야 합니다.<br>
6.	질병, 재해, 이사, 출장 등의 사유로 환불시에는 방문접수만 가능하며 아래와 같이 처리함에 동의한다.<br>
•	프로그램 개시 1일전까지 취소신청 한 경우 : 사용료 100% 환불<br>
•	프로그램 개시일 이후에 취소신청 한 경우 : 사용료 총액의 10%를 위약금으로 공제한 후 잔여일에 대하여 일할 계산하여 환불 (8일이후는 환불 불가)<br>
•	환불방법은 환불 신청서를 작성하신 후 처리 절차에 의해 통장입금<br>
</li>
<br>

<li><span>구비서류</span><br>
•	본  인  : (신분증, 통장사본)<br>
•	대리인 : (본인+대리인신분증, 통장사본)<br>
•	어린이프로그램(부모신분증, 통장사본, 등본)
<br><br>

</li>
</ul>
<br>
<br>
<!--
<b style="font-weight:500;">부칙</b>
<ul>
<li>(시행일) 이 약관은 2022년 07월 25일부터 적용합니다.</li>
</ul>
-->
</div>
</div>


<?php } else if(get_session('center_id')=='140'){?>

<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>본인은 <?php echo get_session("center_name");?>의 회원으로 가입하여 시설을 이용함에 있어 다음사항을 이행할 것을 서약합니다.</span>

</li>
<br>
<li><span>이용안내</span><br>
1.	본인의 부주의로 시설물을 훼손할 시에는 즉시 변상한다.<br>
2.	시설을 이용함에 있어서 지도자(또는 직원)의 지도에 반하는 일체의 행위를 하지않으며, 안전사고 예방에 항상 최선을 다한다. 만약 본인의 부주의로 인하여 안전사고 및 개인소지품 분실시, 이로 인한 일체의 민형사상 손해배상을 수련관에 요구하지 않는다.
<br>
3.	회원증을 타인에게 양도하거나 대여하는 등 이용질서를 어지럽히는 일체의 부정행위를 하지 않는다.<br>
4.	타프로그램을 무단 이용하다가 적발시는 해당프로그램 수강료의 30배 징수 및 고발조치에 이의를 제기하지 않는다.<br>
5.	스포츠프로그램은 중환자 또는 질병(심장, 혈압이상 등)으로 운동이 곤란하신 분은 참여하실 수 없습니다.<br>
지병이 있으신 분은 수강 전 반드시 지도자와 상담 후 허가 받아 등록하여야 합니다.<br>
6.	질병, 재해, 이사, 출장 등의 사유로 환불시에는 방문접수만 가능하며 아래와 같이 처리함에 동의한다.<br>
•	개강 전 취소신청 한 경우 : 사용료 100% 환불<br>
•	개강 후 취소신청 한 경우 : 총 교습기간의 1/3 경과전 – 수강료의2/3 해당액 환불<br>
•	개강 후 취소신청 한 경우 : 총 교습기간의 1/2 경과전 – 수강료의1/2 해당액 환불<br>
•	개강 후 취소신청 한 경우 : 총 교습기간의 1/2 경과 이후 – 미환불<br>
<br>
</li>
<li><span>구비서류</span><br>
•	개강일이란 프로그램별로 처음 나오는 날<br>
•	본 규정은 공정거래위원회 고시 제2019-3호 [소비자 분쟁 해결 기준]과 서울청소년시설 운영 매뉴얼에 관한 조례에 의거<br>
•	등록 미달 시에는 폐강될 수 있으며, 수강료는 전액 환불 됩니다.<br>
•	환불 신청은 방문 접수만 가능합니다.<br>
•	환불 신청은 방문 접수만 가능합니다.<br>
<br><br>

</li>
<br>
<li><span>환불필요서류</span><br>
•	환불신청서, 주민등록등본or가족관계증명서, 신분증, 통장 사본- 확인용

<br><br>

</li>
<br>
<li><span>환불방식</span><br>
•	환불은 무통장 입금으로 처리되며, 환불 접수 후 7일 이내 소요

<br><br>

</li>
</ul>
<br>
<br>
<!--
<b style="font-weight:500;">부칙</b>
<ul>
<li>(시행일) 이 약관은 2022년 07월 25일부터 적용합니다.</li>
</ul>
-->
</div>
</div>

<?php } else if(get_session('center_id')=='142'){?>

<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>
본인은 <?php echo get_session("center_name");?>의 회원으로 가입하여 시설을 이용함에 있어 다음사항을 이행할 것을 서약합니다.</span>

</li>
<br>
<li><span>이용안내</span><br>
1.	본인의 부주의로 시설물을 훼손할 시에는 즉시 변상한다.<br>
2.	시설을 이용함에 있어서 지도자(또는 직원)의 지도에 반하는 일체의 행위를 하지않으며, 안전사고 예방에 항상 최선을 다한다. 만약 본인의 부주의로 인하여 안전사고 및 개인소지품 분실시, 이로 인한 일체의 민형사상 손해배상을 수련관에 요구하지 않는다.
<br>
3.	회원증을 타인에게 양도하거나 대여하는 등 이용질서를 어지럽히는 일체의 부정행위를 하지 않는다.<br>
4.	타프로그램을 무단 이용하다가 적발시는 해당프로그램 수강료의 30배 징수 및 고발조치에 이의를 제기하지 않는다.<br>
5.	스포츠프로그램은 중환자 또는 질병(심장, 혈압이상 등)으로 운동이 곤란하신 분은 참여하실 수 없습니다.<br>
지병이 있으신 분은 수강 전 반드시 지도자와 상담 후 허가 받아 등록하여야 합니다.<br>
6.	질병, 재해, 이사, 출장 등의 사유로 환불시에는 방문접수만 가능하며 아래와 같이 처리함에 동의한다.<br>
•	프로그램 개시 1일전까지 취소신청 한 경우 : 사용료 100% 환불<br>
•	프로그램 개시일 이후 1/3 경과전 취소신청 한 경우 : 사용료의 2/3 환불<br>
•	프로그램 개시일 이후 1/2 경과전 취소신청 한 경우 : 사용료의 1/3 환불<br>
•	프로그램 개시일 이후 1/2 경과후 취소신청 한 경우 : 미환불<br>
•	환불방법은 환불 신청서를 작성하신 후 처리 절차에 의해 통장입금<br>
<br>
</li>
<br>
<li><span>구비서류</span><br>
•	본  인  : (신분증, 통장사본)<br>
•	대리인 : (회원신분증, 주민등록등본 또는 의료보험증 사본, 통장사본)<br>
•	어린이프로그램(부모신분증, 통장사본, 등본)
<br><br>

</li>
</ul>
<br>
<br>
<!--
<b style="font-weight:500;">부칙</b>
<ul>
<li>(시행일) 이 약관은 2022년 07월 25일부터 적용합니다.</li>
</ul>
-->
</div>
</div>

<?php }else{ ?>

<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>
본인은 <?php echo get_session("center_name");?>의 회원으로 가입하여 시설을 이용함에 있어 다음사항을 이행할 것을 서약합니다.</span>

</li>
<br>
<li><span>이용안내</span><br>
1.	본인의 부주의로 시설물을 훼손할 시에는 즉시 변상한다.<br>
2.	시설을 이용함에 있어서 지도자(또는 직원)의 지도에 반하는 일체의 행위를 하지않으며, 안전사고 예방에 항상 최선을 다한다. 만약 본인의 부주의로 인하여 안전사고 및 개인소지품 분실시, 이로 인한 일체의 민형사상 손해배상을 수련관에 요구하지 않는다.
<br>
3.	회원증을 타인에게 양도하거나 대여하는 등 이용질서를 어지럽히는 일체의 부정행위를 하지 않는다.<br>
4.	타프로그램을 무단 이용하다가 적발시는 해당프로그램 수강료의 30배 징수 및 고발조치에 이의를 제기하지 않는다.<br>
5.	스포츠프로그램은 중환자 또는 질병(심장, 혈압이상 등)으로 운동이 곤란하신 분은 참여하실 수 없습니다.<br>
지병이 있으신 분은 수강 전 반드시 지도자와 상담 후 허가 받아 등록하여야 합니다.<br>
6.	질병, 재해, 이사, 출장 등의 사유로 환불시에는 방문접수만 가능하며 아래와 같이 처리함에 동의한다.<br>
•	프로그램 개시 1일전까지 취소신청 한 경우 : 사용료 100% 환불<br>
•	프로그램 개시일 이후에 취소신청 한 경우 : 사용료 총액의 10%를 위약금으로 공제한 후 잔여일에 대하여 일할 계산하여 환불 (8일이후는 환불 불가)<br>
•	환불방법은 환불 신청서를 작성하신 후 처리 절차에 의해 통장입금<br><br>
</li>
<br>

<li><span>구비서류</span><br>
•	본  인  : (신분증, 통장사본)<br>
•	대리인 : (본인+대리인신분증, 통장사본)<br>
•	어린이프로그램(부모신분증, 통장사본, 등본)
<br><br>

</li>
</ul>
<br>
<br>
<!--
<b style="font-weight:500;">부칙</b>
<ul>
<li>(시행일) 이 약관은 2022년 07월 25일부터 적용합니다.</li>
</ul>
-->
</div>
</div>

<?php }?>

			</div>

</div>



</div>

</div>
</main>
