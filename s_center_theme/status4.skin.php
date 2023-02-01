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

<main id="main" class="main_container status">

<div id="top_bg_join" style="display:none;">
<div class="_wrap">
<div class="top_title">
            <h2></h2>
</div>
</div>
</div>
<div class="top_area" style="display:none;">
<div class="wrap">
<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL; ?>" class="home">Home</a></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span><?php echo $center_txt;?></span></li><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>접수현황</span></li></ul>
</div>
</div>

<div class="wrap">

<div id="sidebar" style="display:none;">
				<div class="stit">
						<p>CENTER</p>
						<h2>접수현황</h2>
					</div>
					<div id="sidemenu" class="sidebar">
					
	<div class="side_menu">
		<nav class="menu init">
			<h2 class="skip">좌측 메뉴</h2>
			<div class="depth depth1">
				<ul class="depth_list depth1_list">
				<li class="depth_item depth1_item <?php if($center_id=='01'){?>active<?php }?>">
		            		<a href="<?php echo NC_CENTER_URL; ?>/status.php?center_id=01" class="depth_text depth1_text" target="_self"  >스포츠센터</a>
													
							
							
		        </li>	
	<li class="depth_item depth1_item <?php if($center_id=='02'){?>active<?php }?>">
		            		<a href="<?php echo NC_CENTER_URL; ?>/status.php?center_id=02" class="depth_text depth1_text" target="_self"  >문화센터</a>
													
							
							
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

<?php 

$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : '';

$center_id = (isset($_REQUEST["center_id"]) && $_REQUEST["center_id"]) ? $_REQUEST["center_id"] : '';
$cc_id = (isset($_REQUEST["cc_id"]) && $_REQUEST["cc_id"]) ? $_REQUEST["cc_id"] : NULL;


$s_code = (isset($_REQUEST["s_code"]) && $_REQUEST["s_code"]) ? $_REQUEST["s_code"] : '';
$g_code = (isset($_REQUEST["g_code"]) && $_REQUEST["g_code"]) ? $_REQUEST["g_code"] : '';
$b_code = (isset($_REQUEST["b_code"]) && $_REQUEST["b_code"]) ? $_REQUEST["b_code"] : '';

//echo $center_id;
//echo $s_code;


if($center_id=="") { 
$center_id="01";
 }


?>

<style>

.step_box2 .step_items {display:-webkit-box;display:-ms-flexbox;display:flex;}
.step_box2 .step_items > li {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-orient:vertical; -webkit-box-direction:normal; -ms-flex-direction:column; flex-direction:column; width:100%; -webkit-box-flex:1; -ms-flex:1 1 auto; flex:1 1 auto;}
.step_box2 .step_items > li .title {position:relative; -webkit-box-flex:0; -ms-flex:none; flex:none; display:-webkit-box; display:-ms-flexbox; display:flex; -webkit-box-flex:1; -ms-flex:1 1 auto; flex:1 1 auto; -webkit-box-pack:center; -ms-flex-pack:center; justify-content:center; -webkit-box-align:center; -ms-flex-align:center; align-items:center; height:100%; height:5rem; font-size:1.8rem; color:#999; font-weight:bold;     border: 1px solid #d8e2e5;
    border-width: 1px 0;
    background: #f7f9fa;
	border-width:1px 0;}
.step_box2 .step_items > li:first-child .title {border-left-width:1px;}
.step_box2 .step_items > li:last-child .title {border-right-width:1px;}
.step_box2 .step_items > li .title button {height:100%; width:100%; line-height:1; color:#2e3d61; font-size:1.6rem; font-weight:500;}
.step_box2 .step_items > li .title button span {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-align:center; -ms-flex-align:center; align-items:center; -webkit-box-pack:center; -ms-flex-pack:center; justify-content:center;}
.step_box2 .step_items > li .title button span::after {content:''; display:inline-block; position:absolute; left:-9px; top:50%;border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-left: 9px solid #2e3d61;-webkit-transform:translateY(-50%); -ms-transform:translateY(-50%); transform:translateY(-50%);}
.step_box2 .step_items > li:first-child .title button span::after {display:none;}
.step_box2 .step_items > li .cont {height:24rem; overflow:hidden; overflow-y:auto; -webkit-box-flex:1; -ms-flex:1 1 auto; flex:1 1 auto; border:1px solid #e3e3e3; border-width:0 0 1px 0;}
.step_box2 .step_items > li:first-child .cont {border-left-width:1px;}
.step_box2 .step_items > li:last-child .cont {border-right-width:1px;}
.step_box2 .step_items > li .cont button {width:100%; height:4rem; padding:0 2rem; font-size:1.6rem; color:#666666; text-align:left; font-weight:500; line-height:1.5;;}
.step_box2 .step_items > li .cont ul {height:100%; padding:0; border-right:1px solid #e3e3e3;}


.step_box2 .step_items > li .cont ul li{ padding:0; border-right:0px solid #e3e3e3;}
.step_box2 .step_items > li:last-child .cont ul {border-right:0;}
.step_box2 .step_items > li .cont .on button {background-color:#f9f9f9; font-weight:bold; color:#2e3d61;}
.step_box2 .step_items .step_submit {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-pack:center; -ms-flex-pack:center; justify-content:center; margin-top:3rem;}
.step_box2 .step_options {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between; -webkit-box-align:center; -ms-flex-align:center; align-items:center; min-height:6rem; padding:10px 10px; background-color: #f8f8f8; border:1px solid #e3e3e3; border-top:0;    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;}
.step_box2 .step_options dl {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-align:center; -ms-flex-align:center; align-items:center;}
/* .step_box2 .step_options dl dt {color:#000000; font-size:1.6rem; margin-right:6rem; padding-left:2rem; line-height:1;} */
.step_box2 .step_options dl dt {position:fixed; overflow: hidden; border: 0; margin:-1px; width: 1px; height: 1px; clip: rect(1px, 1px, 1px, 1px); -webkit-clip-path: inset(50%); clip-path: inset(50%);}
.step_box2 .step_options dl dd {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-align:center; -ms-flex-align:center; align-items:center; }
.step_box2 .step_options dl dd .chk_box {margin:0;}
.step_box2 .step_options dl dd .chk_box + .chk_box {margin-left:3rem;}
.step_box2 .step_options dl dd .msg {margin-left:2rem; font-size:1.4rem; color:#666; font-weight:300;}
.step_box2 .step_options dl dd .msg::before {content:'※ ';}
.step_box2 .step_options .btn_L_col2 {font-size: 1.3rem;
    font-weight: 500;
    color: #fff;
    letter-spacing: -0.01em;
    border-radius: 4px;
    position: relative;
    min-height: auto;
    height: auto;
    min-width: 100px;    line-height: normal;margin-right:0;
    padding: 8px 0px 8px 0px;}
	.step_box2 .step_options .btn_L_col1 {margin-right:0; font-size: 1.3rem;
    font-weight: 500;
    color: #fff;
    letter-spacing: -0.01em;    line-height: normal;
    border-radius: 4px;
    position: relative;
    min-height: auto;margin-right:3px;
    height: auto;
    min-width: 100px;
    padding: 8px 0px 8px 0px;}


.step_box2 .step_options .btn_L_col1:after {
    content: '\e925';
    font-family: 'nc-font';
    font-size: 1.3rem;
    color: #fff;
    line-height: 1;font-weight: normal;    position: relative;
    top: 0px;
}

.step_box2 .step_options .btn_L_col2:after {
    content: '\E932';
    font-family: 'nc-font';
    font-size: 1.3rem;
    color: #fff;
    line-height: 1;font-weight: normal;    position: relative;
    top: 0px;
}
.step_box2 .step_options .btn_L_col1:disabled:after {
    color: #a0a0a0;
}

.step_box2 .step_options .btn_L_col1:disabled span {
    color: #a0a0a0;
}


.btn_area{
width:100%;margin-bottom: 1px;
}

.step_box2 + .thumb_list_wrap, .list_keyword + .thumb_list_wrap, .list_keyword + .card_list_wrap, .list_keyword + .thumb_list_wrap + .card_list_wrap {
    margin-top: 3.5rem;
}

.tabmenu2_wrap.type_noline .tabmenu2_body {
    padding: 2rem 0 3rem 0;
}
.board_head {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    height: auto;
    padding-bottom: 1rem;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    line-height: 1;
}
.board_head .count_area {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    font-size: 1.6rem;
    color: #000;
}
.board_head .count_area .tot {
    color:#2c7fdf;    font-size: 1.8rem;
}
.board_head .order_area {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}


.content_top_tit.nomgb {
    font-size: 0;
    margin-top: 24px;
    margin-bottom: 0px;
    border-bottom: 0px solid #222;
    padding-bottom: 10px;
}



.content_top_tit {font-size: 0;
    margin-top: 24px;
    margin-bottom: 24px;
    border-bottom: 3px solid #222;
    padding-bottom: 10px;}
.content_top_tit > span {display: inline-block;padding: 0 10px;vertical-align: top;position: relative;font-size: 14px;letter-spacing: -0.01em;color: #666;}
.content_top_tit > span:first-child {padding-left: 0;}
.content_top_tit > span:last-child {padding-right: 0;float: right;font-weight:600;}
.content_top_tit > span:before {content: '';display: block;width: 1px;height: 10px;position: absolute;left: 0;top: 50%;margin-top: -5px;background: #aaa;}
.content_top_tit > span:first-child:before {display: none;}
.content_top_tit > span:last-child:before {display: none;}
.content_top_tit > span > b {padding-right: 4px;font-style: normal;font-weight:600;}
.content_top_tit > span > i {font-style: normal;color:#27b4c5;    }
.content_top_tit > span > i.color-red{font-style: normal;color:#e60012; }




.lecture_form_tit {
    font-size: 18px;
    color: #111;
    letter-spacing: -0.01em;
    display: inline-block;
    vertical-align: middle;
    width: 16%;
    margin-top: -2px;

}


.lecture_form_item {
    border-bottom: 0px solid #111;
    margin-bottom: 29px;
    font-size: 0;
    -webkit-transition: border .3s;
    transition: border .3s;
}

.lecture_form_item.lecture_form_area .lecture_form_tit {
    font-size: 18px;
    color: #111;
    letter-spacing: -0.01em;
    display: inline-block;
    vertical-align: middle;
    width: 16%;
    margin-top: 12px;
	    margin-bottom: 12px;
}

.lecture_form_item_etc {
    /*border-bottom: 0px solid #111;
    margin-bottom: 29px;*/
	  display: inline-block;

}


.vprogress-bar-holder{
        height: 100%;
        border:0px solid #ccc;
        padding: 0;
         -webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		width: 20px;
		background: #f6f6f6; border-radius: 13px;
      }
      .vprogress-bar{
        width:20px;
        text-align: right;
        background:#00c300;
        height: 0px;
        padding: 0px;
		-webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		    float: left;
      }
 .tableR table tbody tr td .vprogress-bar span{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 11px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height:2;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    right: 18px;
    letter-spacing: 0.04em;
      }

 .tableR table tbody tr td  .end .vprogress-bar span{
 color:#fff;
height: 40px;
}
.end .vprogress-bar {
    background: #e60012;
}




.record_table td.last_td{

    background: #fff;
}

 .progress-bar-holder{
        width: 100%;
        border:0px solid #ccc;
        padding: 0;
         -webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		height: 18px;position: relative;
		background: #f6f6f6; border-radius: 13px;
      }
      .progress-bar{
        height:18px;
        text-align: right;
        background:#27b4c5;
        width: 0px;
        padding: 0px;
		-webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		    float: left;    background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;
    background-size: 1000%;
    box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
      }
 .tableR table tbody tr td .progress-bar span{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 11px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height:2;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    right: 18px;
	left:auto;
    letter-spacing: 0.04em;

      }
      .progress-bar.end{
        height:18px;
        text-align: right;
        background:#27b4c5;
        width: 0px;
        padding: 0px;
		-webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		    float: left;    background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;
    background-size: 1000%;
    box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
      }




.tableR table tbody tr td .progress-bar-holder span.t_left{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: #fff;
    /* height: 15px; */
    line-height:1.75;
    vertical-align: middle;
    position: absolute;
    z-index: 10;float:left;
    left: 8px;
	float:left;
	    right: auto;

    letter-spacing: 0.04em;
 
      }
	  
	 .tableR table tbody tr td .progress-bar-holder span.t_right{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height:1.8;
    vertical-align: middle;
    position: absolute;
    z-index: 10;float:left;
    right: 8px;
	    left: auto;
		float:right;
    letter-spacing: 0.04em;

      } 
	  
 .tableR table tbody tr td  .end .progress-bar span{
 color:#fff;

}
.end .progress-bar {
    background: #e60012;
}

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
.tableR table thead tr th{font-weight:500; color:#333; font-size:13px; padding:20px 0; border-right:1px solid #dae1e6; background:#f7f9fa;text-align:center;vertical-align: middle;}

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
.record_table table {
    width: 100%;
    margin-top: 0px;
    border-right: 1px solid #fff;
    border-spacing: 0;
    border-collapse: separate;
}
.rank_list2:last-child li{
    height: 110px;
}
.record_table td.last_td {
    background: #fff;
	 height: 40px;padding: 0px 8px;
}
.rank_list2:last-child li > div {
    height: 100%;
}
.progress-bar-holder span.t_left {
    /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: #fff;
    /* height: 15px; */
    line-height: 1.8;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    float: left;
    left: 8px;
    float: left;
    right: auto;
    letter-spacing: 0.04em;

}

.progress-bar-holder span.t_right {
    /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height: 1.8;
    vertical-align: middle;
    position: absolute;
    z-index: 10;
    float: left;
    right: 8px;
    left: auto;
    float: right;
    letter-spacing: 0.04em;
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

/* tabmenu2 */
.title_wrap2 + .tabmenu2 {margin-top:0rem;}
.tabmenu2_wrap {position:relative; margin-top:2rem; border:1px solid #dddddd;}
.tabmenu2_wrap .tabmenu_prev,
.tabmenu2_wrap .tabmenu_next {display:none;}
.tabmenu2_body {padding:5rem 0;}
.tabmenu2 {display:-webkit-box;display:-ms-flexbox;display:flex; position:relative; width:100%; -ms-flex-wrap:nowrap; flex-wrap:nowrap;    background: #f8f8f8;
    border-radius: 50px;    max-width: 400px;margin: 0 auto;margin-bottom:1rem;}
.tabmenu2 li {position:relative; flex:1 1 auto; width:100%; display: inline-block;
    vertical-align: middle;
    width: 50%;
    text-align: center;}
.tabmenu2 li a {position:relative; display:-webkit-box; display:-ms-flexbox; display:flex; width:100%; height:100%; -webkit-box-align:center; -ms-flex-align:center; align-items:center; -webkit-box-pack:center; -ms-flex-pack:center; justify-content:center; font-size:1.6rem; font-weight:600; /*border-bottom:1px solid #dddddd;*/ color:#424242;padding: 14px 10px 14px;}
.tabmenu2 li:hover a,
.tabmenu2 li:focus a, 
.tabmenu2 li.on a {font-weight:bold;  color: #fff;
 }

 .tabmenu2 li:hover a{
color: #2c7fdf;

 }

  .tabmenu2 li.on:hover a{
color: #fff;

 }

.tabmenu2 li.on{   color: #fff;
    background: #2c7fdf;
    border-radius: 50px;    width: 55%;background: linear-gradient(#3b92e5,#2c7fdf);}


.tabmenu2 li a:hover::after,
.tabmenu2 li a:focus::after, 
.tabmenu2 li.on a::after {content:''; display:block; position:absolute; bottom:-1px; left:0; width:100%; height:0.3rem; /*background-color:#2c7fdf;*/}
.tabmenu2.has_outline {border:1px solid #dddddd; border-bottom:0;}
.tabmenu2_summary {position:relative; margin-bottom:3.5rem;}
.tabmenu2_summary .tit {margin-bottom:0.5rem; font-size:2rem; font-weight:bold; color:#000000; line-height:2.8rem;}
.tabmenu2_summary .explain {font-size:1.6rem; font-weight:300; color:#898989; line-height:2.8rem;}
.tabmenu2_summary.has_btn {padding-right:6rem;}
.tabmenu2_summary.has_btn button {position:absolute; right:0; bottom:0;}

.tabmenu2_wrap.type_noline {margin-top:2rem; border:0; border-bottom:0px solid #ddd;}
.tabmenu2_wrap.type_noline .tabmenu2_body {padding:2rem 0 3rem 0;}

.tabmenu2_wrap.type_purple li:hover a,
.tabmenu2_wrap.type_purple li:focus a, 
.tabmenu2_wrap.type_purple li.on a {color:#5b64b6;}
.tabmenu2_wrap.type_purple li a:hover::after,
.tabmenu2_wrap.type_purple li a:focus::after, 
.tabmenu2_wrap.type_purple li.on a::after {background-color:#5b64b6;}

@media screen and (max-width:768px){
.tabmenu2 {display:-webkit-box;display:-ms-flexbox;display:flex; position:relative; width:100%; -ms-flex-wrap:nowrap; flex-wrap:nowrap;    background: #f8f8f8;
    border-radius: 50px;    max-width: 300px;margin: 0 auto;margin-bottom:1rem;}

.tabmenu2 li a {
    font-size: 1.3rem;

}

}
@media screen and (max-width:768px){
.board_head .count_area .tot {
    color: #2c7fdf;
    font-size: 1.7rem;
}
}
</style>


<div id="contents">
<div id="cont_head">
		<h2>스포츠 · 문화센터 접수현황</h2>
		<div id="location">
			<ul id="nc-breadcrumb" class="nc-breadcrumb"><li class="nc-breadcrumb__item nc-breadcrumb__item--home"><a href="<?php echo NC_URL;?>" class="home">Home</a></li><li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>접수현황</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--separator"><span>&gt;</span></li> <li class="nc-breadcrumb__item nc-breadcrumb__item--current"><span>스포츠 · 문화센터 접수현황</span></li></ul>

		</div>				
	</div>
<div class="article mypage">

            <div class="article_body">
             
<div id="quickLecture" class="quick_lecture_wrap">
<div class="quick_lecture">
<div class="tabmenu2_wrap type_noline">
							<ul class="tabmenu2 ea6 tabs2">
								<li class="<?php if($center_id=="01" || $center_id==""){?>on<?php }?>">
									<a href="javascript:subStepList('01')" data-id="01">스포츠센터</a>
								</li>
								<li class="<?php if($center_id=="02"){?>on<?php }?>">
									<a href="javascript:subStepList('02')"  data-id="02">문화센터</a>
								</li>
															
							</ul>
							<div class="tabmenu2_body">
							

								<!-- 강의찾기 -->
								<div class="step_box2" style="display: none">
									
								</div>
								<!-- //강의찾기 -->

								<!-- 시리즈 목록 -->
								<div id="sSbjtAreList" class="thumb_list_wrap">
								
								</div>
								<!--// 시리즈 목록 -->

							</div>
						</div>
						<!-- //영역별 강좌목록 -->
</div>







</div>
</div>
</div>
                 

</div>
            </div>
        </div>



<script src="<?php echo NC_JS_URL; ?>/scroller.js"></script>

<script type="text/javascript">

	$(document).ready(function () {


proGrss(); 	 
function proGrss(){
	
	$('.progress-bar').each(function() {

        var $this = $(this);
         var percentage = parseInt($this.data("value"));
		   
        //$(this).animate({'width':'0%'}, 800);

        $this.waypoint(function() {
          
		  
		    if(percentage < 1){
              $this.animate({'width':''+percentage+'%'}, 800);
		   }else if(percentage < 10){
		     $this.animate({'width':'5%'}, 800);
            }else if(percentage < 100){
              $this.animate({'width':''+percentage+'%'}, 800);
            }else if(percentage >=100){
              //$(this).css({'width':'100%'}, 800);
			  $this.animate({'width':''+percentage+'%'}, 800);
			    $this.css({'color':'black', 'background-image':'none'}, 800);
			    $this.addClass('end');
            
			}else{
              $this.css({'color':'black', 'background':'none'}, 800);
            }    
		   
		   
		   
        }, {
            offset: "110%"
        });

    });

}	




 		  
		  
});
	
	
	
	
</script>

</div>
</div>
</div>
</main>

<script src="<?php echo NC_JS_URL; ?>/scroller.js"></script>
<script type="text/javascript">

var	$window			= null,
	$document		= null,
	$html			= null,
	$body			= null,
	$html_body		= null,
	$wrap			= null,
	$header			= null,
	$activeFocus	= null
;




$(document).ready(function() {






/*         $('#first_select .js_select').removeClass('on');
         $('#subStepList .js_select').removeClass('on');
        $('#sSubStepList .js_select').removeClass('on');
		$('#sSubStepList .js_select').removeClass('itemS');
		$('#subStepList').empty();
		$('#sSubStepList').empty();
		$('#item21').val('');
		$('#item3').val('');
		$('#item4').val('');
        $('#item5').val('');
		$('#subSChkVal2').val('');
		$('#tag_area ul.first li').remove();
		$('#tag_area ul.second li').remove();
		$('#tag_area ul.third li').remove();

$('.step_box2 .step_items > li:nth-child(2) .title').removeClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on'); */



setElements(); 
tabInit();
selectInit();






function setElements(){
	$window		= $(window);
	$document	= $(document);
	$html		= $('html');
	$body		= $('body');
	$html_body	= $('html, body');
	$wrapper	= $('.wrap');
	$header		= $('header');
	$document.off('focusin.eleEvent click.eleEvent').on('focusin.eleEvent click.eleEvent', function(e){
		$activeFocus = $(e.target);
	})
}
/* Tab */
function tabInit(){
	$document.off('click.tabEvent').on('click.tabEvent', '.tab > ul li', function(e){ 
		e.preventDefault();
		var id = $(this).data('id');
		var callback = null;

		//속성으로 콜백함수 처리
		if ($(this).data('callback') != '' && $(this).data('callback') != undefined){
			var str = $(this).data('callback');
			callback = getNewFunction(str);
		}
		tabAction(id, function(){ callback });
	});
}
function tabAction(id, callback){
	var $btn = $('[data-id="'+id+'"]');
	var $cont = $("#"+ id);
	var $tab = $("#"+ id).closest('.tab');
	
	$btn.addClass('on').siblings().removeClass('on');
	$cont.addClass('on').siblings('.con_box').removeClass('on');

	//콜백처리
	if (typeof(callback) == 'function'){ callback }
}


/* Selec Active */
function selectInit(){
	$(document).off('click.selectEvent').on('click.selectEvent', '.js_select', function(){
		$(this).addClass('on').siblings().removeClass('on');
	})
}

});
 


<?php

echo $center_id;

if ($center_id !=''){
	
	
	?>

          


		       subStepList(<?php echo $center_id;?>);




              $.ajax({
	               type : 'POST',
	               url :  "./tLecture_Search_Step_012.ajax.php",
	               dataType : 'html',
	               data : {'item2':'', 'target':'', 'area':$(this).find('a').data("id")},
	               async:false,
				   cache : false,
	               contentType:"application/x-www-form-urlencoded; charset=UTF-8",
	               success : function(data){
				$('#subStepList').empty();
				$('#subStepList').html(data);
             
				   }
	               , error : function(){
	               }
	               });	

                 $.ajax({
	               type : 'POST',
	               url :  "./tLecture_Search_Step_022.ajax.php",
	               dataType : 'html',
	               data : {'item2':'', 'target':'', 'learnstep':'', 'area':'<?php echo $center_id;?>'},
	               async:false,
                   cache : false,
	               contentType:"application/x-www-form-urlencoded; charset=UTF-8",
	               success : function(data){
	            $('#sSubStepList').empty();
                $('#sSubStepList').html(data);




				   }
	               , error : function(){
	               }
	               });	




	        
			<?php if($center_id !='' && ($s_code=="" || $s_code=='undefined')  ){ ?>



$( '#first_select .js_select:first-child' ).addClass("on");


				 	$.ajax({
						type : 'POST',
						url :  "./tLecture_Search_List2.ajax.php",
						dataType : 'html',
						data : {'item1':'<?php echo $center_id;?>','item2':'','target':'','page':'<?php echo $page;?>'},
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){

					        $('#sSbjtAreList').empty();
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						
						 }

						, error : function(){
						}
					});
        <?php }else if($center_id !='' && $s_code!="" ){ ?>
           
            $('.btn_L_col1').attr('disabled', false);

 $( '#tag_area' ).css("display","block");
 $('.step_box2 .step_items > li:nth-child(2) .title').addClass('on');
	               $.ajax({
						type : 'POST',
						url :  "./tLecture_Search_List2.ajax.php",
						dataType : 'html',
						data : {'item1':'<?php echo $center_id;?>','item2':'<?php echo $s_code;?>','target':'','page':'<?php echo $page;?>'},
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){

					        $('#sSbjtAreList').empty();
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						
						 }

						, error : function(){
						}



					});

     		 //console.log($('#first_select li.on').length);

         <?php }?>

          
            
<?php }?>



$('#first_select li.js_select .btn').each(function(index, item){



if($(this).val()=='<?php echo $s_code;?>'){

$(this).parent('li').addClass("on");

}

});



//센터영역 클릭
$(".tabmenu2 li").on("click", function(){


         jQuery('html,body').animate({
            scrollTop : $('#quickLecture').offset().top - $('#header').height()-10
         }, 800);



	$(this).addClass("on");
	$(".tabmenu2 li").not($(this)).removeClass("on");
	$(".quick_nodata").hide();
	$("#sSbjtAreList").show();
	


             console.log($(this).find('a').data("id"));



				 	$.ajax({
						type : 'POST',
								url :  "./tLecture_Search_List2.ajax.php",
						dataType : 'html',
							data : {'item1':$(this).find('a').data("id"),'target':'','area':$(this).find('a').data("id")},
						async:false,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){

					        
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						
						 }

						, error : function(){
						}
					});


});



// 영역 불러오기
function subStepList(parentClasCode){
	var target = $(".chkVal").children().val();

   


	$.ajax({
		type : 'POST',
		url :  "./tLecture_Search2.ajax.php",
		dataType : 'html',
		data : {'area':parentClasCode,'target':target,'area':$(".tabs2 li.on").find('a').data('id')},
		async:false,
        cache : false,
		contentType:"application/x-www-form-urlencoded; charset=UTF-8",
		success : function(data){

			$('.step_box2').empty();
			$('.step_box2').html(data);
			$(".step_box2").show();

            $( '#first_select .js_select:first-child' ).addClass("on");

		 }
		, error : function(){
		}
	});	
}


</script>