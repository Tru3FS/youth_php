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
    font-size: 1.3rem;
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
    margin-top: -6px;
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
 
.step_box2 .step_items > li .cont {height:24rem; overflow:hidden; overflow-y:auto; -webkit-box-flex:1; -ms-flex:1 1 auto; flex:1 1 auto; border:1px solid #e3e3e3; border-width:0 0 1px 0;}

	.step_box2 .step_items > li .cont {display:none; max-height:350px; height:auto; border-width:0 1px !important;}
    .step_box2 .step_items > li.on .cont {display:block;}
    .step_box2 .step_items > li .cont ul {padding:0;}
    .step_box2 .step_items > li:last-child .cont {border-bottom-width:1px !important;}
    .step_box2 .step_items > li .cont button {height:42px; padding:0 15px; font-size:15px;}
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
    padding-bottom: 2rem;
}
.quick_lecture .board_head {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
}
.board_head .count_area {
    font-size: 2.4rem;
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


}

@media screen and (max-width:768px){
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
    margin-top: 8px;
    text-align: right;
    font-size: 12px;
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
    margin-top: -2px;
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
<?php 

$page = (isset($_REQUEST["page"]) && $_REQUEST["page"]) ? $_REQUEST["page"] : '';

$center_id = (isset($_POST["center_id"]) && $_POST["center_id"]) ? $_POST["center_id"] : '01';
$cc_id = (isset($_POST["cc_id"]) && $_POST["cc_id"]) ? $_POST["cc_id"] : NULL;


$s_code = (isset($_POST["s_code"]) && $_POST["s_code"]) ? $_POST["s_code"] : '';
$g_code = (isset($_POST["g_code"]) && $_POST["g_code"]) ? $_POST["g_code"] : '';
$b_code = (isset($_POST["b_code"]) && $_POST["b_code"]) ? $_POST["b_code"] : '';

//echo $s_code;

?>

<div class="wrap">









<div class="article_header"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko">스포츠 · 문화센터 수강신청</h1></div></div></div>



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
								<!-- noData -->
								<div class="quick_nodata">
									<dl>
										<dt>센터를 먼저 선택하세요.</dt>
										<dd>그 다음, 항목 선택에 따라 원하는 강좌를 선택할 수 있습니다.</dd>
									</dl>
								</div>
								<!-- //noData -->

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

</main>
<?php


if($center_id=="01" || $center_id==""){


$center_id="01";


}




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

$('.step_box2 .step_items > li:nth-child(2) .title').removeClass('on');
$('.step_box2 .step_items > li:nth-child(3) .title').removeClass('on');

$('.btn_L_col1').attr('disabled', true);
         jQuery('html,body').animate({
            scrollTop : $('#quickLecture').offset().top - $('#header').height()-10
         }, 800);
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
 


$('.tabmenu2 li').each(function(){


            if($(this).hasClass('on')){
                var $this = $(this);
               	$(".quick_nodata").hide();
                subStepList($(this).find('a').data("id"));
	            $("#sSbjtAreList").show();


       $( '#tag_area' ).css("display","block");

              $.ajax({
	               type : 'POST',
	               url :  "./s_center/Lecture_Search_Step_01.ajax.php",
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
	               url :  "./s_center/Lecture_Search_Step_02.ajax.php",
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

               console.log('1');

 $( '#tag_area' ).css("display","none");
				 	$.ajax({
						type : 'POST',
						url :  "./s_center/Lecture_Search_List.ajax.php",
						dataType : 'html',
						data : {'item1':$(this).find('a').data("id"),'item2':'','target':'','page':'<?php echo $page;?>'},
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
						url :  "./s_center/Lecture_Search_List.ajax.php",
						dataType : 'html',
						data : {'item1':$(this).find('a').data("id"),'item2':'<?php echo $s_code;?>','target':'','page':'<?php echo $page;?>'},
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

     		 console.log($('#first_select li.on').length);

            

            var $selector   = $( '#tag_area' );

            var $new = $( "<li onclick='javascript:del()' data-target='<?php echo $s_code;?>'><span id='first'></span><button type='button' class='select_cancel'><i class='sr_only'>선택취소</i></button></li>" );
            $new.appendTo( $selector.find( 'ul.first' ) );

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
								url :  "./s_center/Lecture_Search_List.ajax.php",
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
		url :  "./s_center/Lecture_Search.ajax.php",
		dataType : 'html',
		data : {'area':parentClasCode,'target':target,'area':$(".tabs2 li.on").find('a').data('id')},
		async:false,
        cache : false,
		contentType:"application/x-www-form-urlencoded; charset=UTF-8",
		success : function(data){

			$('.step_box2').empty();
			$('.step_box2').html(data);
			$(".step_box2").show();
		 }
		, error : function(){
		}
	});	
}


</script>

