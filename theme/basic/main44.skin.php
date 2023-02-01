<?php
if(!defined('_SAMSUNG_')) exit;



?>
<main id="main" class="main_container">




<style>
button {
    border: 0;
    background-color: transparent;
    vertical-align: middle;
    cursor: pointer;
    outline: none;
}

.article_title {
    font-size: 3.2rem;
    font-weight: bold;
    line-height: 1.25;
    margin-left: 0px;
    letter-spacing: -0.05em;
    margin-bottom: 0;
    font-family: 'Gotham', 'NotoSansKR', sans-serif;
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

.tabmenu2_wrap.type_noline {margin-top:0; border:0; border-bottom:0px solid #ddd;}
.tabmenu2_wrap.type_noline .tabmenu2_body {padding:2rem 0 3rem 0;}

.tabmenu2_wrap.type_purple li:hover a,
.tabmenu2_wrap.type_purple li:focus a, 
.tabmenu2_wrap.type_purple li.on a {color:#5b64b6;}
.tabmenu2_wrap.type_purple li a:hover::after,
.tabmenu2_wrap.type_purple li a:focus::after, 
.tabmenu2_wrap.type_purple li.on a::after {background-color:#5b64b6;}

.search_box + .tabdepth2 {padding-top:3rem;}
.tabmenu + .tabdepth2 {margin-top:3rem;}
.tabdepth2 {display:-webkit-box;display:-ms-flexbox;display:flex; position:relative; width:100%;}
.tabdepth2 li {position:relative;}
.tabdepth2 li + li {margin-left:0.4rem;}
.tabdepth2 li a {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-align:center; -ms-flex-align:center; align-items:center; -webkit-box-pack:center; -ms-flex-pack:center; justify-content:center; min-width:18rem; padding:0 3rem; border:1px solid #898989; height:3.6rem; font-size:1.6rem; color:#898989; border-radius:18px; text-align:center;}
.tabdepth2 li a:hover,
.tabdepth2 li a:focus, 
.tabdepth2 li.on a {color:#fff; background-color:#2c7fdf; border-color:transparent;}
.tabdepth2.ea6 li a {min-width:1px;}
.tabdepth2.ea8 li a {min-width:1px;}
.tabdepth2.ea9 li a {min-width:1px;}
.tabdepth2_wrap {position:relative; display:-webkit-box; display:-ms-flexbox; display:flex; -webkit-box-pack:justify; -ms-flex-pack:justify; justify-content:space-between; -webkit-box-align:center; -ms-flex-align:center; align-items:center;}
.tabdepth2_wrap .tabdepth2 {width:auto;}
.tabdepth2_wrap .label_wrap .label_check {display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex; -webkit-box-align:center; -ms-flex-align:center; align-items:center; color:#5267d0; font-size:1.6rem; font-weight:bold;}
.tabdepth2_wrap .label_wrap .label_check::before {content:''; display:inline-block; position:relative; top:1px; width:1.4rem; height:1.6rem; margin-right:0.8rem; background:url(../images/common/ico_comp_check.png) no-repeat center center / 100% auto;}
.tabdepth2_wrap .label_wrap .label_prgs {display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex; -webkit-box-align:center; -ms-flex-align:center; align-items:center; color:#ff5b5b; font-size:1.6rem; font-weight:bold;}
.tabdepth2_wrap .label_wrap .label_prgs::before {content:''; display:inline-block; position:relative; top:1px; width:1.4rem; height:1.6rem; margin-right:0.8rem; background:url(../images/common/ico_comp_prgs.png) no-repeat center center / 100% auto;}
.tabdepth2_explain {margin-top:1rem; font-weight:300; font-size:1.4rem; line-height:1.5;}


.quick_lecture .tabmenu2_wrap {
    margin-top: 0rem;
}
/* 빠른강좌 영역찾기 */
.quick_nodata {padding:3rem 0 5rem;}
.quick_nodata dl {display:-webkit-box;display:-ms-flexbox;display:flex; -webkit-box-orient:vertical; -webkit-box-direction:normal; -ms-flex-direction:column; flex-direction:column; -webkit-box-align:center; -ms-flex-align:center; align-items:center; line-height:1; width:100%; padding:0 2rem; text-align:center;}
.quick_nodata dl::before {/*content:''; display:block; width:18.3rem; height:14.7rem; margin-left:-3.6rem; background:url(../images/common/ico_quickTabselect.png) no-repeat center center / 100% 100%;*/}
.quick_nodata dt {margin-top:3rem; color:#212121; font-size:2.6rem;}
.quick_nodata dd {margin-top:2.6rem; color:#919191; font-size:1.8rem; line-height: 1.5;}
.step_nodata .quick_nodata {padding:6rem 0;}

/*
.nicescroll_area {
    width: 100%;
    height: 100%;
    padding-right: 0px;
    position: relative;
	   overflow: hidden;
}


 .nicescroll_area {
    max-height: 215px;
}


.nicescroll_area_outer {

}

.nicescroll_area_outer {
    height: 100%;
    padding: 10px 26px 10px 25px;
    border: none;
    position: relative;
	    overflow: hidden;
}

.nicescroll_area_outer {
    padding-left: 15px;
    padding-right: 15px;
}
*/



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
.step_box2 .step_items > li .cont {height:18rem; overflow:hidden; overflow-y:auto; -webkit-box-flex:1; -ms-flex:1 1 auto; flex:1 1 auto; border:1px solid #e3e3e3; border-width:0 0 1px 0;}
.step_box2 .step_items > li:first-child .cont {border-left-width:1px;}
.step_box2 .step_items > li:last-child .cont {border-right-width:1px;}
.step_box2 .step_items > li .cont button {width:100%; height:auto; padding:0 2rem; font-size:1.4rem; color:#666666; text-align:left; font-weight:500; line-height:1.5;;}
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

#tag_area ul{
    display: inline-block;

}
#tag_area li {
    display: inline-block;
    vertical-align: middle;
    cursor: pointer;
    padding: 9px 17px 9px 17px;
    margin-right: 5px;
    background: #27b4c5;
    font-size: 1.2rem;
    font-weight: 500;
    color: #fff;
    letter-spacing: -0.01em;
    border-radius: 30px;
    position: relative;

}

#tag_area .select_cancel {
    background: none;
    border: none;
    padding: 0px 0px 0 0px;
    cursor: pointer;
    position: relative;
    vertical-align: middle;
    margin-left: 6px;
    margin-top: -5px;
}
#tag_area .select_cancel:before {
    font-family: 'nc-font';
    content: '\E828';
    font-size: 10px;
    font-weight: normal;
    color: #fff;
}

.button_area{
display:inline-block;
float:right;

}

#tag_area{
display:inline-block;
float:left;

}

/*
.step_box .step_cont {margin-top:2rem; padding:3em 3rem; border:1px solid #dbdbdb;}
.step_box2 .step_items {display:flex; border:1px solid #d8e9f6; background-color:#f2f7fb;}
.step_box2 .step_items li {position:relative; display:flex; flex:1 1 auto; justify-content:center; align-items:center; height:100%; height:5.9rem; font-size:1.8rem; color:#999; font-weight:bold;}
.step_box2 .step_items li.completed,
.step_box2 .step_items li.current {color:#0b408c;}
.step_box2 .step_items li + li::after {content:''; display:block; position:absolute; left:-0.7rem; top:50%; border-top:0.4rem solid transparent; border-bottom:0.4rem solid transparent; border-left:0.7rem solid #0b408c; transform:translateY(-50%);}
.step_box2 .step_cont {border:1px solid #e3e3e3; border-top:0;}
*/

[class^='btn_L_col'] {
    display: inline-block;
    min-width: 10rem;
    min-height: 3.8rem;
    margin-right: 0.5rem;
    padding: 0 1.7rem;
    font-size: 1.6rem;
    line-height: 3.6rem;
    color: #fff;
    text-align: center;
    border: 0px solid transparent;
}
.btn_L_col2 {
    background: #2e3d61;
}
.btn_L_col1{
    background: #2c7fdf;
}

.btn_L_col2:disabled {
    background: #e8e8e8;
    border: 1px solid #dbdbdb;
    color: #a0a0a0;
    line-height: 3.6rem;
}
.btn_L_col1:disabled {
    background: #e8e8e8;
    border: 1px solid #dbdbdb;
    color: #a0a0a0;
    line-height: 3.6rem;
}


.step_box2 .step_options .btn_L_col1:disabled {
    background: #e8e8e8;
    border: 1px solid #dbdbdb;
    color: #a0a0a0;
    padding: 7px 0px 7px 0px;
}



.step_box2 + .thumb_list_wrap, .list_keyword + .thumb_list_wrap, .list_keyword + .card_list_wrap, .list_keyword + .thumb_list_wrap + .card_list_wrap {
    margin-top: 3.5rem;
}
.board_head {
    /* display: -webkit-box; */
    display: -ms-flexbox;
    /* display: flex; */
    /* height: auto; */
    padding-bottom: 1rem;
    /* -webkit-box-pack: justify; */
    -ms-flex-pack: justify;
    /* justify-content: space-between; */
    line-height: 1;
    position: relative;
    width: 100%;
}
.board_head .count_area {
    /* display: -webkit-box; */
    display: -ms-flexbox;
    /* display: flex; */
    /* -webkit-box-align: center; */
    -ms-flex-align: center;
    align-items: center;
    font-size: 1.6rem;
    color: #000;
    font-weight: 500;
    /* width: 100%; */
    /* position: relative; */
    text-align: right;
}
.board_head .count_area .tot {
    color:#2c7fdf;font-size: 1.8rem;
}
.board_head .order_area {
    /*display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;*/
}

.quick_lecture {
    position: relative;
    z-index: 11;
    top: 1rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    max-width: 128rem;
    width: 100%;
    margin: auto;
    background-color: white;
   
}

@media screen and (max-width: 1023px){



.step_box2 .step_items {-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;}
    .step_box2 .step_items > li .title {border-width:1px !important; height:48px;}
    .step_box2 .step_items > li .title button {font-size:16px;}
    .step_box2 .step_items > li .title button span::after {position:relative; left:0; top:-0.2rem;     width: 10px;
    height: 10px; margin-left:8px; border:4px solid #0b408a; border-width:2px 2px 0 0; }
    .step_box2 .step_items > li:first-child .title button span::after {display:inline-block;}

    .step_box2 .step_items > li:first-child .title button span:after {top: 2px;    border: 0;
    content: '\E839';
    font-family: 'nc-font';
    font-size: 13px;
    color: #2e3d61;
    line-height: 1;
    font-weight: bold;
    transform: translateY(-50%);
   -webkit-transition: -webkit-transform 300ms;
    transition: -webkit-transform 300ms;
    transition: transform 300ms;
    transition: transform 300ms, -webkit-transform 300ms;-webkit-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    transform: rotate(-180deg);  }




    .step_box2 .step_items > li .title button span:after {top: 2px;    border: 0;
    content: '\E839';
    font-family: 'nc-font';
    font-size: 13px;
    color: #2e3d61;
    line-height: 1;
    font-weight: bold;
    transform: translateY(-50%);
   -webkit-transition: -webkit-transform 300ms;
    transition: -webkit-transform 300ms;
    transition: transform 300ms;
    transition: transform 300ms, -webkit-transform 300ms;  

	}






    .step_box2 .step_items > li.on .title.on button span:after {top: 0px;    border: 0;
    content: '\E839';
    font-family: 'nc-font';
    font-size: 13px;
    color: #2e3d61;
    line-height: 1;
    font-weight: bold;
    transform: translateY(-50%);
	-webkit-transition: -webkit-transform 300ms;
    transition: -webkit-transform 300ms;
    transition: transform 300ms;
    transition: transform 300ms, -webkit-transform 300ms;    -webkit-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    transform: rotate(-180deg);
		

	
	}
 

    .step_box2 .step_items > li.last-child .title button span:after {
display:none;
	}
.step_box2 .step_items > li .cont ul{

    border-right: 0px solid #e3e3e3;
}



	.step_box2 .step_items > li .cont {display:none; max-height:350px; height:auto; border-width:0 1px !important;}
    .step_box2 .step_items > li.on .cont {display:block;}
    .step_box2 .step_items > li .cont ul {padding:0;}
    .step_box2 .step_items > li:last-child .cont {border-bottom-width:1px !important;}
    .step_box2 .step_items > li .cont button {height:42px; padding:0 15px; font-size:1.4rem;}
	 .tabmenu2_body {
    padding: 3rem;
}


.thumb_list_wrap {
    display: block;
    position: relative;
}
.board_head {
    height: auto;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    padding-bottom: 1rem;
}
.quick_lecture .board_head {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
}
.board_head .count_area {
font-size: 2.4rem;
    text-align: left;
    display: inline-block;
  
}
.board_head .count_area .tot {
   font-size: 2.6rem;
}
.board_head .order_area {
    -webkit-box-flex: 0;
    -ms-flex: none;
    flex: none;
}
.board_head .count_area + .order_area {
    margin-top: 2rem;
}
.quick_lecture .board_head .count_area + .order_area {
    width: auto;
    margin-top: 0;
  float: none;
}
.quick_lecture {
    -webkit-box-shadow: none;
    box-shadow: none;
    margin: 0;
}
.btn_order span {
    height: 3rem;
    line-height: 3rem;
    font-size: 2.4rem;
}
.btn_wrap .note {
    margin-top: -18px;
    text-align: right;
    font-size: 14px;
    color: #999;
    letter-spacing: -0.05em;
    display: none;
    float: right;
}


}

@media screen and (max-width:1023px){
.step_box2 .step_items > li:first-child .title {
    border-width: 1px !important;
    height: 48px;
}
.step_box2 .step_items > li:nth-child(2) .title {
border-width: 1px !important;
border-bottom:0px;
}

.step_box2 .step_items > li:nth-child(2) .title.on {
border-width: 1px !important;
    border-bottom: 1px solid #d8e2e5;
}

.step_box2 .step_items > li:nth-child(3) .title {
    border-width: 1px !important;
    height: 48px;
border-bottom:0px;
}

.step_box2 .step_items > li:nth-child(3) .title.on {
    border-width: 1px !important;
    height: 48px;
    border-bottom: 1px solid #d8e2e5;
}
.step_box2 .step_items > li .cont ul {
    border-left: 0px solid #e3e3e3;
}

}

@media screen and (max-width:768px){
.step_box2 .step_items > li:first-child .title {
    border-width: 1px !important;
    height: 48px;
}
.step_box2 .step_items > li:nth-child(2) .title {
border-width: 1px !important;
border-bottom: 1px solid #d8e2e5;
}

.step_box2 .step_items > li:nth-child(2) .title.on {
border-width: 1px !important;
    border-bottom: 1px solid #d8e2e5;
}

.step_box2 .step_items > li:nth-child(3) .title {
    border-width: 1px !important;
    height: 48px;
border-bottom:0px;
}

.step_box2 .step_items > li:nth-child(3) .title.on {
    border-width: 1px !important;
    height: 48px;
    border-bottom: 1px solid #d8e2e5;
}

.step_box2 .step_items > li .cont ul {
    height: 100%;
    padding: 0;
    border-right: 0px solid #e3e3e3;
}
#tag_area li {
    display: inline-block;
    vertical-align: middle;
    cursor: pointer;
    padding: 6px 8px 8px 9px;
    margin-right: 5px;
    background: #27b4c5;
    font-size: 1.2rem;
    font-weight: 600;
    color: #fff;
    letter-spacing: -0.01em;
    border-radius: 30px;
    position: relative;
}
#tag_area .select_cancel {
    background: none;
    border: none;
    padding: 0px 0px 0 0px;
    cursor: pointer;
    position: relative;
    vertical-align: middle;
    margin-left: 6px;
    margin-top: -5px;
}

.step_box2 .step_items > li .title{
    border-width: 0px !important;
    height: 48px;
}

.button_area {
    display: block;
    float: none;
	text-align:center;
}
#tag_area {
    display: block;
    float: none;
	margin-bottom:10px;
}
.btn_area {
    width: 100%;
    margin-bottom: 1px;
    text-align: center;
}
.step_box2 .step_options .btn_L_col1:after {
    content: '\e925';
    font-family: 'nc-font';
    font-size: 1.3rem;
    color: #fff;
    line-height: 1;font-weight: normal;    position: relative;
    top: -2px;
}

.step_box2 .step_options .btn_L_col2:after {
    content: '\E932';
    font-family: 'nc-font';
    font-size: 1.3rem;
    color: #fff;
    line-height: 1;font-weight: normal;    position: relative;
    top: -2px;
}


.step_box2 .step_options .btn_L_col1 {

    min-width: 110px;

}
.step_box2 .step_options .btn_L_col2 {
 
    min-width: 110px;

}
}
@media screen and (max-width:768px){
.tabmenu2 {display:-webkit-box;display:-ms-flexbox;display:flex; position:relative; width:100%; -ms-flex-wrap:nowrap; flex-wrap:nowrap;    background: #f8f8f8;
    border-radius: 50px;    max-width: 300px;margin: 0 auto;margin-bottom:1rem;}

.tabmenu2 li a {
    font-size: 1.3rem;

}

}

@media screen and (max-width:480px){
.board_head .count_area {
    font-size: 1.8rem;
}
.board_head .count_area .tot {
   font-size: 2rem;
}
.board_head {
    height: auto;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    padding-bottom: 1rem;
}
.btn_wrap .note {
    margin-top: -12px;
    text-align: right;
    font-size: 14px;
    color: #999;
    letter-spacing: -0.05em;
   }
   .btn_wrap .note {

    text-align: right;
    font-size: 14px;
    color: #999;
    letter-spacing: -0.05em;
   }
.button_area {
    display: block;
    float: none;
	text-align:center;
}
#tag_area {
    display: block;
    float: none;
	margin-bottom:10px;
    display: none;
}
.btn_area {
    width: 100%;
    margin-bottom: 1px;
    text-align: center;
}
#tag_area .select_cancel {
    background: none;
    border: none;
    padding: 0px 0px 0 0px;
    cursor: pointer;
    position: relative;
    vertical-align: middle;
    margin-left: 6px;
    margin-top: -5px;
}
#tag_area li {
    display: inline-block;
    vertical-align: middle;
    cursor: pointer;
    padding: 6px 8px 6px 8px;
    margin-right: 5px;
    background: #27b4c5;
    font-size: 1.2rem;
    font-weight: 600;
    color: #fff;
    letter-spacing: -0.01em;
    border-radius: 30px;
    position: relative;
}
}

</style>
<style>
.rank_list2 table{
  width:100%;
}
.rank_list2 td, .rank_list2 td > a, .rank_list2 td > div {
    height: 70px;width:100%;
}
.rank_list2 td{
    height: 70px;
    padding-right: 0px;
    border-top: 1px solid #e4e8eb;    float: none;padding-left: 15px;vertical-align: middle;
    display: table-cell;
}
.rank_list2 tr{
display:none;
}

.rank_list2 tr.cc, .rank_list2 tr.tt{
display:block;display: table;
width: 100%;
}
.rank_list2 tr.cc{
height:80px;
    float: left;
    width: 100%;    
	position: relative;display: table;
}
.rank_list2 tr.tt{
height:120px;
    float: left;
    width: 100%;    
	position: relative;display: table;
}
.rank_list2 tr.pp{
    height: 160px;
    float: left;
    width: 100%;    
	position: relative;display: table;
}
.rank_list2 tr.ee{
    height: 200px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.ff{
    height: 240px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.ss{
    height: 280px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.vv{
    height: 320px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.gg{
    height: 360px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.nn{
    height: 400px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.jone{
    height: 80px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.jtwo{
    height: 120px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.jthree{
    height: 160px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.jfour{
    height: 200px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2 tr.jfive{
    height: 240px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}

.rank_list2 tr.jone td{
    height: 50px;
    float: left;
    width: 100%;
	    position: relative;display: table;
}
.rank_list2  tr.jone td, .rank_list2  tr.jone td > a, .rank_list2  tr.jone td > div {
    height: 50px;width:100%;
}
.rank_list2  tr.jtwo td, .rank_list2  tr.jtwo td > a, .rank_list2  tr.jtwo td > div {
    height: 79px;width:100%;
}
.rank_list2  tr.jthree td, .rank_list2  tr.jthree td > a, .rank_list2  tr.jthree td > div {
    height: 119px;width:100%;
}

.record_table tr.jone td {
    height: 51px !important;
    padding: 1px 8px;
}

.record_rank div.title {
   background-color: #f7f9fa;
    width: 100%;
}
.rank_list2  tr.tt td,.rank_list2  tr.pp td,.rank_list2  tr.ee td,.rank_list2  tr.ff td,.rank_list2  tr.ss td,.rank_list2  tr.vv td,.rank_list2  tr.gg td ,.rank_list2  tr.nn td  {
    height: 100%;
    padding-right: 0px;padding-left: 15px;
    border-top: 1px solid #e4e8eb;
    float: none;
    vertical-align: middle;display: table-cell;
}

.record_table tr.cc {
    visibility: visible;
}


.record_table tr.xx td {
    background-color: #f9f9f9;height: 40px;padding: 10px 8px;
}
.record_table td {
    height: 40px !important;
    padding: 1px 8px;    border-top: 1px solid #e4e8eb;border-right: 1px solid #e4e8eb;border-left: 1px solid #fff;
}


.record_table td.evt {
    overflow: hidden;
    text-overflow: ellipsis;
    /* display: -webkit-box; */
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    line-height: 1;
    vertical-align: middle;
}
.record_table td.gry {
   
}
.record_table td:first-child {
    border-left: 1px solid #fff;
}
.record_table td:last-child {
   border-right: 0px solid #e4e8eb;
}

@media (min-width: 768px){

}
@media screen and (max-width:1024px){
.rank_list2 td {

    padding-right: 2px;

}
}


@media screen and (max-width: 786px){
.record_table tr.xx td {
    background-color: #f9f9f9;
    height: 40px;
    padding: 10px 8px;font-size: 12px;
}
}
</style>
<style>
	
	.record_table tr{
    visibility: hidden;
}
.record_table tr.cc{
    visibility: visible;
}
.record_table #record_header{
    visibility: visible;
}
.record_table .cc{
    visibility: visible;
}

.record_table tr.pp td.cc{
    height: auto !important;
}
.record_table tr.pp td.cnc{
   
}
.record_table tr.cc.pp td.cnc.cc {
    height: 70px !important;
}

.record_table tr.pp td:first-child{
   
 
}
.record_table tr.pp td:nth-child(2),.record_table tr.pp td:nth-child(3),.record_table tr.pp td:nth-child(4),.record_table tr.pp td:nth-child(5){
   
    

}
.record_table tr.pp td:nth-child(6),.record_table tr.pp td:nth-child(7),.record_table tr.pp td:nth-child(8),.record_table tr.pp td:nth-child(9),.record_table tr.pp td:nth-child(10){
   
    height: 40px !important;

}
.progress-bar-holder{
        width: 100%;
        border:0px solid #ccc;
        padding: 0;
         -webkit-border-radius: 13px;
        -moz-border-radius: 13px;
        border-radius: 13px;
		height: 18px;position: relative;
		background: #eee; border-radius: 13px;
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
		    float: left;background-image: linear-gradient( -45deg,#00a0af,#00c0ca, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#008b9c,#00c0ca,#00a0af) !important;    
			background-size: 1000%;box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
      }

.progress-bar.end {
    height: 18px;
    text-align: right;
    background: #27b4c5;
    width: 0px;
    padding: 0px;
    -webkit-border-radius: 13px;
    -moz-border-radius: 13px;
    border-radius: 13px;
    float: left;
    background-image: linear-gradient( -45deg,#2e3d61,#2e3d61, #008b9c,#28708b,#285f74, #22404d,#285f74,#28708b,#2e3d61,#2e3d61,#2e3d61) !important;
    background-size: 1000%;
    box-shadow: 0 2px 5px rgb(50 50 50 / 10%);
}


.progress-bar span{
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
 .progress-bar-holder span.t_left{
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
	  
 .progress-bar-holder span.t_right{
       /* margin-right: 10px; */
    /* margin-top: 5px; */
    font-size: 10px;
    color: rgb(35, 31, 32);
    /* height: 15px; */
    line-height:1.75;
    vertical-align: middle;
    position: absolute;
    z-index: 10;float:left;
    right: 8px;
	    left: auto;
		float:right;
    letter-spacing: 0.04em;

      } 
	  
 .end .progress-bar span{
 color:#fff;

}
.end .progress-bar {
    background: #e60012;
}

.record_table td{
height: 40px !important;
padding: 1px 8px;
}

.record_table tr {
    visibility:visible;
}

@media (max-width: 1024px){
.btn_wrap .note {
   
    display: block;
}
.btn_wrap .note:after{
    content: '';
    display: inline-block;
    width: 40px;
    height: 11px;
    background: url(./s_img/scroll_arrow.png) -32.5px 0 no-repeat;
    background-size: 200px auto;
    -webkit-background-size: 200px auto;
    margin-left: 4px;
}
.tableWrap .note {
    display: block;
}
.tableWrap .note:after{
    content: '';
    display: inline-block;
    width: 40px;
    height: 11px;
    background: url(./s_img/scroll_arrow.png) -32.5px 0 no-repeat;
    background-size: 200px auto;
    -webkit-background-size: 200px auto;
    margin-left: 4px;
}

}

.rank_list2 .wrap span{
    letter-spacing: -0.023em;

}
.record_rank div.title {
    font-size: 12px; letter-spacing: -0.023em;
}
.record_table th{
font-size: 12px; letter-spacing: -0.023em;
}
.record_table td{
    font-size: 12px; letter-spacing: -0.023em;
}
.record_table td > span{
    font-size: 12px; letter-spacing: -0.023em;
}
.record_table td > span.price{
font-size: 12px; letter-spacing: -0.023em;
}
.record_table td > span.sm {
    height: auto;
    font-size: 12px;
    line-height: 1;
    font-weight: 500;
    margin-top: 4px; letter-spacing: -0.023em;
}


.rbf,.rbx,.rbn.ss,.rbb,.rbn,.rbd,.rbx,.rbd.ss,.rbw{
font-size: 12px; letter-spacing: -0.023em;
}
	</style>

<style>
.step_box2 .step_items > li .cont ul li {
    padding: 0;
    border-right: 0px solid #e3e3e3;
	
    /* display: inline-block; */
    /* width: calc((100% / 8) - 8px); */
    /* margin: 4px;*/
}
.step_box2 .step_items > li .cont button {
   /*width: 100%; */
    /* height: 4rem; */
    padding: 0 2rem;
    font-size: 1.6rem;
    color: #666666;
    /* text-align: center; */
    font-weight: 500;
    line-height: 1;
    /* border: 1px solid #dae1e6; */
    background: #ffffff;
    word-break: keep-all;
    padding: 10px;
    /* border-radius: 4px; */
    box-sizing: border-box;
    background-color: #FEFEFE;
    /* border-radius: 10px; */
    height: 45px;
    color: #2c7fdf;
    font-size: 1.5rem;letter-spacing: -0.023em;
}
.step_box2 .step_options{
/*display:none;*/
}
.step_box2 .step_items > li .cont{
/*
height:auto;
*/
position:relative;
}
.step_box2 .step_items > li .cont ul {
    height: 100%;
    padding: 0;
}
.step_box2 .step_items > li:first-child .cont {
    /*border-left-width:0px;
	border: 0px solid #e3e3e3;*/ 
}
.step_box2 .step_items {
    text-align: center;
}
.step_box2 .step_items > li .cont .on button {
    background-color: #2e3d61;
    font-weight: 500;
    color: #fff;
}
.step_box2 .step_items > li:last-child .cont{
padding: 1.2rem 0 0;
}
.step_box2 .step_items > li .cont .search{

 position: relative;
   
}
.step_box2 .step_items > li .cont ul li.blink {
    border-right: 0px solid #e3e3e3;
}
.cont .search {
    position: absolute;
    top: 2rem;
    left: 50%;
    margin-left: -45%;
    width: 90%;
    height: 4.4rem;
    z-index: 105;margin-bottom:40px;
}

 .cont .search input {display:inline-block; width:100%; height:100%; line-height:1.5; padding-left:1rem; padding-right:5rem; font-size:1.6rem; border:0; vertical-align:middle; border:0.2rem solid #e3e3e3; border-radius:4px; background:#fff; -webkit-transition:-webkit-box-shadow 0.2s ease; transition:-webkit-box-shadow 0.2s ease; -o-transition:box-shadow 0.2s ease; transition:box-shadow 0.2s ease; transition:box-shadow 0.2s ease, -webkit-box-shadow 0.2s ease;}
 .cont .search input:focus {outline:0; -webkit-box-shadow:0 0 0 0px rgb(82, 68, 68); box-shadow:0 0 0 0px rgb(82, 68, 68);border:0.2rem solid #2e3d61;}
 .cont .search input:-ms-input-placeholder {color:#707070;}
 .cont .search .btn_search {position:absolute; right:1rem; top:50%; -webkit-transform:translateY(-50%); -ms-transform:translateY(-50%); transform:translateY(-50%); display:inline-block; width:4.6rem; height:4.6rem; background:url('../images/common/ico_head_search.png') no-repeat center center; background-size:2.6rem 2.6rem; vertical-align:middle;}
 .cont .search label > button {width:4.6rem;height:4.6rem;text-indent:-9999px;}

@media screen and (max-width: 1023px){
.step_box2 .step_items > li .cont {
    display: none;
    max-height: 300px;
    height: 100%;
    min-height: 90px;
    border-width: 0;
}

.step_box2 .step_items > li:last-child .cont.tt{
    display: block;
    max-height: 300px;
    height: 200px;
    border-width: 1px !important;
	position:relative;padding: 0 2rem;
}
.step_box2 .step_items > li .cont .search {
    position: absolute;
    top: 24px;
    /* left: 0; */
    right: 0;
    /* margin-left: 0; */
    width: 90%;
    /* height: 6.2rem; */
    border: 0.2rem solid #e3e3e3;
    background: #fff;
}
.step_box2 .step_items > li .cont .search input {
    font-size: 1.4rem;
    border: 0;
    vertical-align: middle;
}
.step_box2 .step_items > li:last-child .title button span:after{
display:none;
}

.step_box2 .step_items > li .cont button {

    font-size: 1.3rem;
}

}
@media screen and (max-width: 768px){
.step_box2 .step_items > li .cont ul li {
    padding: 0;
    border-right: 0px solid #e3e3e3;/*    float: left;
    display: inline-block;    width: calc((100% / 3) - 6px);margin: 0 3px 10px;;*/
}
.article_title{
    font-size: 2.2rem;
}
.step_box2 .step_items > li .cont button {
    height: 42px;font-size: 1.2rem;
}
.step_box2 .step_items > li:first-child .title {
    height: 40px;
}
.step_box2 .step_items > li .title {
   height: 40px;
}
.step_box2 .step_items > li:nth-child(3) .title {
    height: 40px;
}
.step_box2 .step_items > li:last-child .cont.tt{
    display: block;
    height: 140px;
    border-width: 1px 1px !important;
}
.step_box2 .step_items > li .cont .search input {
    font-size: 1.3rem;
    border: 0;
    vertical-align: middle;    padding-left: 1rem;
}
.step_box2 .step_items > li .cont .search {
    position: relative;
    top: 15px;
    left: auto;
    right: auto;
    margin-left: auto;
    width: 100%;
    margin: 0 auto;
    height: 3.5rem;
    border: 0.2rem solid #e3e3e3;
    background: #fff;
}
.step_box2 .step_items > li:last-child .title button span:after {
display:none;
}
}

.srcBox {
    margin: 20px 0 10px;
    padding: 0px 5px 0px 22px;
    background: #fff;
	border-radius:0px;
    position: relative;  font-size: 1.3rem;
    font-weight: 400;
    text-align: left;color: #b2b2c1;
}
.srcBox:before {
    content: '\E846';
     top: 10%;
    /* left: 50%; */
    transform: translate(-50%, -10%);
    font-size: 15px;
    font-family: 'nc-font';
    left: 10px;
	color:#b2b2c1;
    position: absolute;
}
.srcBox .txt {
    line-height: 1.5;
}

.guide_wrap {
    margin-top: 0px;
    width: 100%;
    padding: 15px 0px;
}

@media only screen and (max-width: 768px){

 .srcBox {
    margin-top: 10px;
    padding: 10px 2% 10px;
    background-position: center 25px;
    background-size: 40px;
}
.srcBox .txt {
    font-size: 13px;
    line-height: 19px;margin-left: 10px;
	letter-spacing: -0.023em;
}
.srcBox:before {
    top: 33%;
    /* left: 50%; */
    left: 5px;
    transform: translate(-50%, -33%);

}

.step_box2 .step_items > li .cont button {

    font-size: 1.3rem;
}
.rank_list2 td {
     padding-left: 12px;

}
.record_rank div.title {
    padding-left: 12px;
}

}
.step_box2 .step_items > li .cont ul li.blink{
    font-weight: 400;
    /* line-height: 1; */
    /* border: 1px solid #dae1e6; */

    /* word-break: keep-all; */
    padding: 10px;
    /* border-radius: 4px; */
    box-sizing: border-box;
  
    /* border-radius: 10px; */
    /* height: 100%; */
    color: #2c7fdf;
    font-size: 16px;
    color: #b2b2c1;
    width: 100%;
    vertical-align: middle;
    position: absolute;
    left: 50%;
    top: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
	}




</style>


<?php 
/*
$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : '';

$center_id = (isset($_POST["center_id"]) && $_POST["center_id"]) ? $_POST["center_id"] : NULL;
$cc_id = (isset($_POST["cc_id"]) && $_POST["cc_id"]) ? $_POST["cc_id"] : NULL;


$s_code = (isset($_POST["s_code"]) && $_POST["s_code"]) ? $_POST["s_code"] : NULL;
$g_code = (isset($_POST["g_code"]) && $_POST["g_code"]) ? $_POST["g_code"] : NULL;
$b_code = (isset($_POST["b_code"]) && $_POST["b_code"]) ? $_POST["b_code"] : NULL;
*/
//echo $center_id;
//echo $s_code;



$page = isset($_REQUEST['page']) ? clean_xss_tags($_REQUEST['page'], 1, 1) : '';
$center_id = $_SESSION['center_id'];
$cc_id = isset($_REQUEST['cc_id']) ? clean_xss_tags($_REQUEST['cc_id'], 1, 1) : '';
$s_code = isset($_REQUEST['s_code']) ? clean_xss_tags($_REQUEST['s_code'], 1, 1) : '';
$g_code = isset($_REQUEST['g_code']) ? clean_xss_tags($_REQUEST['g_code'], 1, 1) : '';
$b_code = isset($_REQUEST['b_code']) ? clean_xss_tags($_REQUEST['b_code'], 1, 1) : '';


$json_string = CF_Search_Event ($center_id, $sales_place_code, $place_code,$member_id, $url, $ip);

$json_array = json_decode($json_string, true); 


?>

<div class="wrap">









<div class="article_header"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko"><?php echo get_session("center_name");?> 수강신청</h1></div></div></div>



<div id="quickLecture" class="quick_lecture_wrap">
<div class="quick_lecture">
<div class="tabmenu2_wrap type_noline one">
							<ul class="tabmenu2 ea6 tabs2"  style="display:none;">
								
								
								<li class="<?php if($_SESSION['center_id'] !=""){?>on<?php }?>">
									<a href="javascript:subStepList('<?php echo $_SESSION['center_id'];?>')"  data-id="<?php echo $_SESSION['center_id'];?>" data-area="culture">...</a>
								</li>
															
							</ul>
							<div class="tabmenu2_body"  >
								<!-- noData -->
								<div class="quick_nodata"  style="display:none;">
									<dl>
										<dt>종목를 먼저 선택하세요.</dt>
										<dd>그 다음, 강습반을 선택할 수 있습니다.</dd>
									</dl>
								</div>
								<!-- //noData -->

								<!-- 강의찾기 -->
								<div class="step_box2" style="display: block">
									<!-- 강좌찾기 -->
	<ul class="step_items">
		<li class="on">
			<h5 class="title" style="">
				<button type="button">
					<span>종목</span>
				</button>
			</h5>
			<div class="cont" id="first_select">
				<input type="hidden" id="subSChkVal" name="subChkVal" value="" />
			     
				<ul>
		
<?php
if($json_array['Result']['ResultCode'] != 0){
 echo $json_array['Result']['ResultMsg'];
	

}else{			

		    foreach ($json_array['ResultData1'] as $row => $val){
			 
			 	 
			 
	     if (is_array($val)){
		$len = count($val);

       
        
		if ($len == 0){
	
	        
	
        	}

	
		$event_code=$val['Event_Code'];
		$event_name=$val['Event_Name'];



		    

?>					
					
					<li class="js_select" data-id="<?php echo $event_code;?>" data-txt="<?php echo $event_name;?>"><button type="button" onclick="javascript:clickCdNum('<?php echo $event_code;?>')" value="<?php echo $event_code;?>" name="btn" id="btn" class="btn" >
							<span><?php echo $event_name;?></span>
						</button></li>
				
					


<?php
}
?>



<?php


			}

?>

</ul>
<?php

}

?>


			</div>
		</li>
		<li class="on"  style="">
			<h5 class="title">
				<button type="button">
					<span>강습반</span>
				</button>
			</h5>
			<div class="cont">
		
				<ul id="subStepList">
              <li class='blink'>종목을 선택해 주세요.</li>
				</ul>
			
			</div>
		</li>
		<li class="on"  style="display:block;">
			<h5 class="title">
				<button type="button">
					<span>강습명</span>
				</button>
			</h5>
			<div class="cont tt">
	            <div class="search">
				<input type="text" id="searchT" name="searchT" placeholder="강습명을 입력하세요." value="">
			    
	<div class="srcBox">
	<p class="txt">원하시는 종목 및 강습반을 선택해 주세요.<br>강습명 검색시 선택된 종목, 강습반은 초기화 됩니다.</p>
		</div>
		</div>
			</div>
		</li>
	</ul>
	<div class="step_options">
		<dl>
			<dt>추가선택</dt>
			<dd>
				<form id="quickSrchFm">
				<input type="hidden" id="item0" name="item0" value="" />
				<input type="hidden" id="item1" name="item1" value="" />
				<input type="hidden" id="item2" name="item2" value="" />
				<input type="hidden" id="item3" name="item3" value="" />
				<input type="hidden" id="item4" name="item4" value="" />
				<input type="hidden" id="search" name="search" value="" />
				<input type="hidden" id="page" name="page" value="" />
				<input type="hidden" id="ordType" name="ordType" value="" />
				<input type="hidden" id="reqType" name="reqType" value="A" />
				
				</form>				
			</dd>
		</dl>
		 <div class="btn_area">
           <div class="" id="tag_area">
           <ul class="first">
 		   </ul>
		      <ul class="second">
 		   </ul>
		   	<ul class="third">
 		   </ul>
           </div>

		   <div class="button_area"  style="display:block;">
         <button type="button" class="btn_L_col1" id="reset" disabled>
			<span>초기화</span>
		</button>
		<button type="button" class="btn_L_col2" onclick="javascript:searchSbjtList()">
			<span>강좌검색</span>
		</button>
		
		</div>
		</div>
		</div>
<!-- //강의찾기 -->
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

</main>
<?php

//echo $_SESSION['center_id'];


?>




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



  


function del(){
    // 선택된 필터 항목 삭제


        console.log('1번째 삭제');
        $( '#tag_area' ).css("display","none");
        //var $this   = $( this );

         $('#first_select .js_select').removeClass('on');
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
$("#subStepList").append("<li class='blink'>종목을 선택해 주세요.</li>");
$('.step_box2 .step_items > li:nth-child(2) .title').removeClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');

$('.btn_L_col1').attr('disabled', true);
         jQuery('html,body').animate({
            scrollTop : $('#quickLecture').offset().top - $('#header').height()-10
         }, 100);
        return false;

  
}

function del2(){
    // 선택된 필터 항목 삭제


        console.log('2번째 삭제');

        //var $this   = $( this );

        $('#subStepList .js_select').removeClass('on');
        $('#sSubStepList .js_select').removeClass('on');
		$('#sSubStepList .js_select').removeClass('itemS');
		$('#sSubStepList').empty();
		$('#item21').val('');
		$('#item3').val('');
		$('#item4').val('');
        $('#item5').val('');
		$('#subSChkVal2').val('');
		$('#tag_area ul.second li').remove();
		$('#tag_area ul.third li').remove();
        
	
				
		$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');
		
		return false;


}

function del3(){
    // 선택된 필터 항목 삭제



        console.log('3번째 삭제');
        //var $this   = $( this );
        $('#sSubStepList .js_select').removeClass('on');
		$('#sSubStepList .js_select').removeClass('itemS');
		$('#tag_area ul.third li').remove();
		$('#item5').val('');
       
 
        return false;

   
}


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
 


// 영역 불러오기

/*

function subStepList(parentClasCode){
	var target = $(".chkVal").children().val();

  

	$.ajax({
		type : 'POST',
		url :  "./s_center/Lecture_Search4.ajax.php",
		dataType : 'html',
		data : {'area':parentClasCode,'target':target,'area':$(".tabs2 li.on").find('a').data('id'), 'search':$("#searchT").val()},
		async:false,
        cache : false,
		contentType:"application/x-www-form-urlencoded; charset=UTF-8",
		success : function(data){

			$('.step_box2').empty();
			$('.step_box2').html(data);
			$(".step_box2").show();
			$( '#first_select .js_select:first-child' ).addClass("");
		 }
		, error : function(){
		}
	});	
}
*/
$('.tabmenu2 li').each(function(){


            if($(this).hasClass('on')){
                var $this = $(this);
               	$(".quick_nodata").hide();
                //subStepList($(this).find('a').data("id"));
	            $("#sSbjtAreList").show();


       $( '#tag_area' ).css("display","block");

              $.ajax({
	               type : 'POST',
	               url :  "./s_center/Lecture_Search_Step_014.ajax.php",
	               dataType : 'html',
	               data : {'item2':'<?php echo $s_code;?>', 'target':'<?php echo $g_code;?>', 'area':'<?php echo  $_SESSION['center_id'];?>', 'search':$("#searchT").val()},
	               async:true,
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
	               url :  "./s_center/Lecture_Search_Step_024.ajax.php",
	               dataType : 'html',
	               data : {'item2':'<?php echo $s_code;?>', 'target':'<?php echo $g_code;?>',  'area':'<?php echo  $_SESSION['center_id'];?>', 'search':$("#searchT").val()},
	               async:true,
                   cache : false,
	               contentType:"application/x-www-form-urlencoded; charset=UTF-8",
	               success : function(data){
	            $('#sSubStepList').empty();
                $('#sSubStepList').html(data);

$("#subStepList").append("<li class='blink'>종목을 선택해 주세요.</li>");


				   }
	               , error : function(){
	               }
	               });	



	        
				<?php if( ($_SESSION['center_id'] !='') && ($s_code=="" || $s_code=='undefined')  ){ ?>


 $( '#first_select .js_select:first-child' ).addClass("");



 $( '#tag_area' ).css("display","none");
				 	$.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : {'item1':'<?php echo  $_SESSION['center_id'];?>','item2':'','target':'','page':'<?php echo $page;?>', 'search':$("#searchT").val()},
						async:true,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
  beforeSend: function( xhr ) {
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");	   


           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");

	       },
						success : function(data){


                               console.log('1');

					        $('#sSbjtAreList').empty();
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						
						 }

						, error : function(){
						},
    		complete:function()
    		{
    		
			$('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //$('#dbloading').css('display','none');
		  // console.log('로딩완료');


		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 100);


    		}
					});
        <?php }else if(($_SESSION['center_id'] !='') && ($s_code!="") ){ ?>
           
            $('.btn_L_col1').attr('disabled', false);

$( '#first_select .js_select:first-child' ).removeClass("on");
 $( '#tag_area' ).css("display","block");
 $('.step_box2 .step_items > li:nth-child(2) .title').addClass('on');
	               $.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : {'item1':'<?php echo  $_SESSION['center_id'];?>','item2':'<?php echo $s_code;?>','target':'','page':'<?php echo $page;?>', 'search':$("#searchT").val()},
						async:true,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						success : function(data){

					        $('#sSbjtAreList').empty();
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						
						 }, beforeSend: function( xhr ) {
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");	   


           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");

	       }

						, error : function(){
						}



					});

     		 console.log($('#first_select li.on').length);

            

            var $selector   = $( '#tag_area' );

            var $new = $( "<li onclick='javascript:del()' data-target='<?php echo $s_code;?>'><span id='first'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.first' ) );




     <?php }else if($_SESSION['center_id'] !='' && $s_code!=""  && $g_code!="" && $b_code==""  ){ ?>
 $( '#tag_area' ).css("display","block");
           $('.step_box2 .step_items > li:nth-child(2) .title').addClass('on');
		   $('.step_box2 .step_items > li:nth-child(3) .title').addClass('on');
            var $selector   = $( '#tag_area' );

            var $new = $( "<li onclick='javascript:del()' data-target='<?php echo $s_code;?>'><span id='first'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.first' ) );

            var $new = $( "<li onclick='javascript:del2()' data-target='<?php echo $g_code;?>'><span id='second'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.second' ) );




         $('.btn_L_col1').attr('disabled', false);

	               $.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : {'item1':$(this).find('a').data("id"),'item2':'<?php echo $s_code;?>','item3':'<?php echo $g_code;?>','target':'','page':'<?php echo $page;?>', 'search':$("#searchT").val()},
						async:true,
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
         <?php }else if(($_SESSION['center_id'] !='') && ($s_code!="")  && ($g_code!="") && ($b_code!="")){ ?>
 $( '#tag_area' ).css("display","block");

           $('.step_box2 .step_items > li:nth-child(2) .title').addClass('on');
		   $('.step_box2 .step_items > li:nth-child(3) .title').addClass('on');

                   $('.btn_L_col1').attr('disabled', false);
     
            var $selector   = $( '#tag_area' );

            var $new = $( "<li onclick='javascript:del()' data-target='<?php echo $s_code;?>'><span id='first'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.first' ) );

            var $new = $( "<li onclick='javascript:del2()' data-target='<?php echo $g_code;?>'><span id='second'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.second' ) );

            var $new = $( "<li onclick='javascript:del3()' data-target='<?php echo $b_code;?>'><span id='third'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.third' ) );

 
	               $.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : {'item1':$(this).find('a').data("id"),'item2':'<?php echo $s_code;?>','item3':'<?php echo $g_code;?>','item4':'<?php echo $b_code;?>','target':'','page':'<?php echo $page;?>'},
						async:true,
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



         <?php }?>
      	   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		  //$('#dbloading').css('display','none');
		  // console.log('로딩완료');

                return false;
            }






});



$('#first_select li.js_select .btn').each(function(index, item){



if($(this).val()=='<?php echo $s_code;?>'){

$(this).parent('li').addClass("on");

}

});


$('#subStepList li.js_select .btn').each(function(index, item){



if($(this).val()=='<?php echo $g_code;?>'){

$(this).parent('li').addClass("on");

}

});


$('#sSubStepList li.js_select .btn').each(function(index, item){

//console.log($(this).val());

if($(this).val()=='<?php echo $b_code;?>'){

$(this).parent('li').addClass("on");

}

});

 $('.tabmenu2_body').addClass('sports');

//센터영역 클릭
$(".tabmenu2 li").on("click", function(){

    
         jQuery('html,body').animate({
            scrollTop : $('#quickLecture').offset().top - $('#header').height()-10
         }, 800);

   
    
	$(this).addClass("on");
	$(".tabmenu2 li").not($(this)).removeClass("on");
	$(".quick_nodata").hide();
	$("#sSbjtAreList").show();
	
     //$('.tabmenu2_body').not($(this)).removeClass($(this).find('a').data("area"));
	 //$('.tabmenu2_body').addClass($(this).find('a').data("area"));

    //$('.tabmenu2_body').removeClass($(this).find('a').data("area"));
    //$('.tabmenu2_body').addClass($(this).find('a').data("area"));

   $('.tabmenu2_body').removeClass('sports');
    $('.tabmenu2_body').removeClass('culture');
   $('.tabmenu2_body').addClass($(this).find('a').data("area"));

             //console.log($(this).find('a').data("id"));



				 	$.ajax({
						type : 'POST',
								url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
							data : {'item1':$(this).find('a').data("id"),'target':'','area':$(this).find('a').data("id"), 'search':$("#searchT").val()},
						async:true,
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




</script>


<script>

$(document).ready(function() {
var sum = 0;

				
$('#first_select ul li').each(function() {
   //sum += $(this).height();
});

//console.log(sum);
if($(document).width() > 768 ){
if(sum >210){
//$('#first_select ul').height(sum);
}else{


//$('#first_select ul').height('100%');

}
}
/*

function nicescroll_init() {

    $('.nicescroll_area_outer').niceScroll({
        autohidemode       : false,
        cursorborder       : "0px solid #f4f5f6",
        cursorcolor        : "#aaa",
        background         : "#ddd",
        cursorwidth        : 6,
        cursorborderradius : "0px",
        railoffset		   : {top: 0, left: 0}
    });

}


		 $(".nicescroll_area").getNiceScroll().remove();
		 nicescroll_init();
	  */


<?php if(($_SESSION['center_id'] !="") && ($s_code=='')){?>








   var $selector   = $( '#tag_area' );
   var $new = $( '<li  onclick="del()" data-target='+$('#first_select li.js_select:first-child').data("id")+'>');

  $new.append( $( '<span />', { text: $('#first_select li.js_select:first-child').data( 'txt' ) } ) );
  $new.append( $( '<button />', { type: 'button', class: 'select_cancel', html: $( '<i />', { class: 'sr_only', text: '선택취소' } ) } ) );
  $new.appendTo( $selector.find( 'ul.first' ) );





	var target = $(".chkVal").children().val();
		$("#subSChkVal").val(item2);
		var area = "<?php echo $_SESSION['center_id'];?>";
		$.ajax({
			type : 'POST',
			url :  "./s_center/Lecture_Search_Step_014.ajax.php",
			dataType : 'html',
			data : {'item2':'', 'target':target, 'area':area, 'search':$("#searchT").val()},
			async:true,
            cache : false,
			contentType:"application/x-www-form-urlencoded; charset=UTF-8",
    
			success : function(data){

				$('#subStepList').empty();
				$('#sSubStepList').empty();
				$('#subStepList').html(data);
				

$("#subStepList").append("<li class='blink'>종목을 선택해 주세요.</li>");
				
			 }
			, error : function(){
			},
    		complete:function()
    		{
    		


    		}
		});	
<?php }?>

});




	function clickCdNum(item2){
		//$("#sSbjtAreList").hide();

		$('#search').val('');
		$('#searchT').val('');

$('.step_box2 .step_items > li:nth-child(2) .title').addClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');
$('#first_select li.js_select').each(function(index, item){


$( '#tag_area' ).css("display","block");

var $selector   = $( '#tag_area' );
$selector.find( '.first li[data-target="' + $(this).data( 'id' ) + '"]' ).remove();
$selector.find( '.second li' ).remove();
$selector.find( '.third li' ).remove();
if ( $(this).data('id') == item2 ) {




//console.log( $(this).data('txt'));

                 var $new = $( '<li  onclick="del()" data-target='+$(this).data("id")+'>');

                        $new.append( $( '<span />', { text: $(this).data( 'txt' ) } ) );
                        $new.append( $( '<button />', { type: 'button', class: 'select_cancel', html: $( '<i />', { class: 'sr_only', text: '선택취소' } ) } ) );

                        $new.appendTo( $selector.find( 'ul.first' ) );

  }else{


   $selector.find( '.first li[data-target="' + $(this).data( 'id' ) + '"]' ).remove();

  }



});



		$('.btn_L_col2').attr('disabled', false);
		$('.btn_L_col1').attr('disabled', false);
		var target = $(".chkVal").children().val();
		$("#subSChkVal").val(item2);
		var area = "<?php echo $_SESSION['center_id'];?>";
		$.ajax({
			type : 'POST',
			url :  "./s_center/Lecture_Search_Step_014.ajax.php",
			dataType : 'html',
			data : {'item2':item2, 'target':target, 'area':area, 'search':$("#searchT").val()},
			async:false,
            cache : false,
			contentType:"application/x-www-form-urlencoded; charset=UTF-8",
			success : function(data){
				$('#subStepList').empty();
				$('#sSubStepList').empty();
				$('#subStepList').html(data);
				

			 }
			, error : function(){
			}
		});	
		



		if($("#subSChkVal").val() != undefined || $("#subSChkVal").val() != "" || $("#subSChkVal").val() == ""){
			if($("#subSChkVal2").val() != undefined || $("#subSChkVal2").val() != "" || $("#subSChkVal2").val() == ""){
				if($("#item5").val() != undefined || $("#item5").val() != "" || $("#item5").val() == ""  || $("#search").val() == ""){
		

     				$("#item0").val($("#quickFrm [name=target1]").val());
					$("#item1").val($("#quickFrm [name=area1]").val());
					$("#item2").val($("#quickFrm [name=item21]").val());
					$("#item3").val($("#quickFrm [name=learnstep1]").val());
					$("#item4").val($("#quickFrm [name=item5]").val());
					$("#page").val($("#quickFrm [name=page]").val());
					$("#search").val($("#quickFrm [name=searchT]").val());

					$("#ordType").val(ordType);


                   if($("#item1").val()==''){

                        $("#item1").val($(".tabs2 li.on").find('a').data('id'));

				   }

                 

					var quickSrchFm = $('#quickSrchFm').serialize();
				


                                if($("#searchT").val() !=''){
$('.step_box2 .step_items > li:nth-child(2) .title').removeClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');

				};




				 	$.ajax({
						type : 'POST',
								url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : quickSrchFm,
						async:true,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
						
           beforeSend: function( xhr ) {
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");	   


           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");

	       },
						success : function(data){

						



							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						



						 }

						, error : function(){
						},
    		complete:function()
    		{
    		
			$('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //$('#dbloading').css('display','none');
		  // console.log('로딩완료');


		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 100);


    		}
					});

      	 





       //  jQuery('html,body').animate({
       //     scrollTop : $('#sSbjtAreList').offset().top - $('#header').height()-10
       //  }, 800);



				}else{
					NC.alert("분류를 선택하세요");
				}

			}else{
				$("#subStepList").append("<li class='blink'>종목을 선택해 주세요.</li>");
				NC.alert("종목을 선택하세요");
			}
		
		}else{
			NC.alert("업장을 선택하세요");
		}






	}


 $("#reset").click(function () {    // 권장


	$( '#tag_area' ).css("display","none");
$('#subStepList').empty();
$('#sSubStepList').empty();
$( '#tag_area ul.first').empty();
$( '#tag_area ul.second').empty();
$( '#tag_area ul.third').empty();
		$('#ss_code').val('');
		$('#gg_code').val('');
		$('#bb_code').val('');
		$('#item1').val('');
		$('#item2').val('');
		$('#item3').val('');
		$('#item4').val('');
        $('#item5').val('');
		$('#item21').val('');
		$('#search').val('');
		$('#searchT').val('');
		$('#learnstep1').val('');
		$('#area1').val('');
$("#subStepList").append("<li class='blink'>종목을 선택해 주세요.</li>");
$('.btn_L_col1').attr('disabled', true);

$('.step_box2 .step_items > li:nth-child(2) .title').removeClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');





$('.js_select').removeClass('on');
				 	$.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : {'item1':'<?php echo $_SESSION['center_id'];?>','target':'', 'search':$("#searchT").val()},
						async:true,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
					   beforeSend:function(){

           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");


                        },
						success : function(data){

			
					    
							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
		


						 }

						, error : function(){
						}  ,complete:function(){

        	   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //$('#dbloading').css('display','none');
		  // console.log('로딩완료');

		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 0);

    }
					});





         jQuery('html,body').animate({
            scrollTop : $('#quickLecture').offset().top - $('#header').height()-10
         }, 500);



});
	function searchSbjtList(ordType){



   		  


		if($("#subSChkVal").val() != undefined || $("#subSChkVal").val() != "" || $("#subSChkVal").val() == ""){
			if($("#subSChkVal2").val() != undefined || $("#subSChkVal2").val() != "" || $("#subSChkVal2").val() == ""){
				if($("#item5").val() != undefined || $("#item5").val() != "" || $("#item5").val() == "" || $("#search").val() == ""){
		

     				$("#item0").val($("#quickFrm [name=target1]").val());
					$("#item1").val($("#quickFrm [name=area1]").val());
					$("#item2").val($("#quickFrm [name=item21]").val());
					$("#item3").val($("#quickFrm [name=subSChkVal2]").val());
					$("#item4").val($("#quickFrm [name=item5]").val());
					$("#page").val($("#quickFrm [name=page]").val());
					$("#search").val($("[name=searchT]").val());
					$("#ordType").val(ordType);


                   if($("#item1").val()==''){

                        $("#item1").val($(".tabs2 li.on").find('a').data('id'));

				   }

                 

					var quickSrchFm = $('#quickSrchFm').serialize();
				
      
                if($("#searchT").val() !=''){

	$( '#tag_area' ).css("display","none");
$('#subStepList').empty();
$('#sSubStepList').empty();
$( '#tag_area ul.first').empty();
$( '#tag_area ul.second').empty();
$( '#tag_area ul.third').empty();
		$('#ss_code').val('');
		$('#gg_code').val('');
		$('#bb_code').val('');
		$('#item1').val('');
		$('#item2').val('');
		$('#item3').val('');
		$('#item4').val('');
        $('#item5').val('');
		$('#item21').val('');
		$('#learnstep1').val('');
		$('#area1').val('');
$("#subStepList").append("<li class='blink'>종목을 선택해 주세요.</li>");
//$('.btn_L_col1').attr('disabled', true);

$('.step_box2 .step_items > li .cont ul li').removeClass('on');

				};



				 	$.ajax({
						type : 'POST',
								url :  "./s_center/Lecture_Search_List4.ajax.php",
						dataType : 'html',
						data : quickSrchFm,
						async:true,
                        cache : false,
						contentType:"application/x-www-form-urlencoded; charset=UTF-8",
			   beforeSend:function(){

		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");	   

           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");


                        },
						success : function(data){

						



							$('#sSbjtAreList').html(data);
							$('#sSbjtAreList').show();
					    	defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
						



						 }

						, error : function(){
						}, complete : function(){



   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //$('#dbloading').css('display','none');
		  // console.log('로딩완료');

		  setTimeout(function() {
          $('#dbloading').css('display','none');
          }, 100);

						}
					});

      	



         jQuery('html,body').animate({
            scrollTop : $('#sSbjtAreList').offset().top - $('#header').height()-10
         }, 500);



				}else{
					NC.alert("분류를 선택하세요");
				}

			}else{
				NC.alert("종목을 선택하세요");
			}
		
		}else{
			NC.alert("업장을 선택하세요");
		}
	}







</script>