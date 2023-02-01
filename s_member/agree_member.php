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
  font-weight:400;

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


        <b data-font="secondary">회원이용약관</b>
        <p data-font="secondary"><?php echo get_session("center_name");?> 이용약관</p>
    </div>

    <div class="professional_data_body">
        <div class="nicescroll_area_outer">
            <div class="nicescroll_area">
         


  


<style>
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
    top: 60px;
}
@media (max-width:768px){
.professional_data_head .popup-logo {
    max-width: 80px;
    position: absolute;
    right: 35px;

    top: 55px;
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
    top: 8px;
}

.pro_body_section .agree_box ul li {
    padding-left: 10px;
    margin-bottom: 7px;
    position: relative;
    font-size: 14px;
    color: #666;
    letter-spacing: -0.01em;
    line-height: 1.6;font-weight:400;

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
    font-size: 13px;
}
@media (max-width: 767px){
.pro_body_section .agree_box ul li {
    padding-left: 8px;    line-height: 1.3;
	font-size: 13px;
}
.pro_body_section .agree_box ul li:before {
    top: 10px;
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
    font-size: 1.5rem;
    margin-bottom: 5px;
}
.professional_data_head .popup-logo{
border-radius: 4px;
}
.pro_body_section p {
    margin-bottom: 5px;
}
@media (min-width: 1280px){
.pro_body_section .agree_box ul li:before {
    top: 0.8rem;
}
}

@media (max-width: 1280px){

.pro_body_section .agree_box ul li:before {
    top: 0.8rem;
}
}

</style>
<div class="pro_body_section">
<div class="agree_box">



<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>본인은 <?php echo get_session("center_name");?> 회원으로 가입하여 시설을 이용함에 있어 다음사항을 이행할 것을 서약합니다.</span>
<br><br>
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
<br>
<li><span>구비서류</span><br>
•	개강일이란 프로그램별로 처음 나오는 날<br>
•	본 규정은 공정거래위원회 고시 제2019-3호 [소비자 분쟁 해결 기준]과 서울청소년시설 운영 매뉴얼에 관한 조례에 의거<br>
•	등록 미달 시에는 폐강될 수 있으며, 수강료는 전액 환불 됩니다.<br>
•	환불 신청은 방문 접수만 가능합니다.<br>
•	환불 신청은 방문 접수만 가능합니다.<br>
<br>
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

</div>
</div>


            </div>
        </div>
    </div>

</div>
