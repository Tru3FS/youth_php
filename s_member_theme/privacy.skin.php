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
		<h2>개인정보처리방침</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>" class="home">Home</a></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>개인정보처리방침</span></li></ul>

		</div>				
	</div>

<b style="font-weight:500;">&nbsp;</b>

<?php if(get_session('center_id')=='118'){?>

<div class="pro_body_section">
<div class="agree_box">
<b style="font-weight:500;"></b>
<ul>
<li><span>
[개인정보보호법 제15조에 의거  <?php echo get_session("center_name");?> 관련업무를 위해 본인의 생년월일, 주소, 연락처, 차량번호 등의 개인정보가 회원 탈퇴시까지 활용됨에 동의합니다.</span>

</li>
<br>
<li><span>신청인은 개인정보의 수집 및 활용에 동의하지 않을 수 있으며, 미동의 시 청소년수련관 이용이 제한됩니다.]
</span>
</li>
<br>

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
<li><span>[개인정보보호법 제15조에 의거 <?php echo get_session("center_name");?> 관련업무를 위해 본인의 생년월일, 주소, 연락처, 차량번호 등의 개인정보가 회원 탈퇴시까지 활용됨에 동의합니다.
</span>
</li>
<br>
<li><span>신청인은 개인정보의 수집 및 활용에 동의하지 않을 수 있으며, 미동의 시 청소년수련관 이용이 제한됩니다.]
</span>
</li>
<br>
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
<li><span>
[개인정보보호법 제15조에 의거  <?php echo get_session("center_name");?> 관련업무를 위해 본인의 생년월일, 주소, 연락처, 차량번호 등의 개인정보가 회원 탈퇴시까지 활용됨에 동의합니다.</span>

</li>
<br>
<li><span>신청인은 개인정보의 수집 및 활용에 동의하지 않을 수 있으며, 미동의 시 청소년수련관 이용이 제한됩니다.]
</span>
</li>
<br>

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
[개인정보보호법 제15조에 의거  <?php echo get_session("center_name");?> 관련업무를 위해 본인의 생년월일, 주소, 연락처, 차량번호 등의 개인정보가 회원 탈퇴시까지 활용됨에 동의합니다.</span>

</li>
<br>
<li><span>신청인은 개인정보의 수집 및 활용에 동의하지 않을 수 있으며, 미동의 시 청소년수련관 이용이 제한됩니다.]
</span>
</li>
<br>

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
[개인정보보호법 제15조에 의거  <?php echo get_session("center_name");?> 관련업무를 위해 본인의 생년월일, 주소, 연락처, 차량번호 등의 개인정보가 회원 탈퇴시까지 활용됨에 동의합니다.</span>

</li>
<br>
<li><span>신청인은 개인정보의 수집 및 활용에 동의하지 않을 수 있으며, 미동의 시 청소년수련관 이용이 제한됩니다.]
</span>
</li>
<br>

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
