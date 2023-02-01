<?php
if(!defined('_SAMSUNG_')) exit;
?>

<style>
.article_title p:after {
    content: '';
    display: block;
    width: 100%;
    height: 10px;
    position: absolute;
    bottom: 0px;
    left: 0;
    background: #eee;
    z-index: -1;
}
.article_title p{
    position: relative;
    display: inline-block;
    z-index: 1;  
    font-weight: bold;
    line-height: 1.25;
}
@media (min-width: 768px){
.article_header_inner {
    position: relative;
	margin-top:30px;
}
}
.main_links {width: 100%;
    margin-top: 10rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;}
a.main_link_item {display: block;
    width: 32.83%;
    padding: 1px;
    text-align: center;
    font-size: 2.5rem;
    font-weight: 500;
    -webkit-box-shadow: 0 1px 3px rgb(0 0 0 / 3%);
    box-shadow: 0 1px 3px rgb(0 0 0 / 3%);
    -webkit-box-shadow: 0 3px 30px rgb(125 139 200 / 3%);
    box-shadow: 0 3px 30px rgb(125 139 200 / 3%);
}
a.main_link_item > div {width:100%;padding:40px 0;border:1px solid #eee;border-radius:4px;    letter-spacing: -0.053em;
    font-weight: 500;}
a.main_link_item:hover > div, a.main_link_item:focus > div {border-color:#2c7fdf;background-color:#2c7fdf;color:#fff;}
a.main_link_item > div > div {width:70%;max-width:100px;max-height:100px;margin:0 auto 20px; padding:0; background-position:0 0;background-repeat:no-repeat;background-size:cover;}
a.main_link_item > div > div img {width:100%;}
a.main_link_item:nth-child(1) > div > div {background-image:url(./s_img/index_icon_01.png);}/*
a.main_link_item:nth-child(2) > div > div {background-image:url(../../img/index_icon_02.png);}*/
a.main_link_item:nth-child(2) > div > div {background-image:url(./s_img/index_icon_03.png);}
a.main_link_item:nth-child(2) > div > div.logins {background-image:url(./s_img/index_icon_05.png);}
a.main_link_item:nth-child(3) > div > div {background-image:url(./s_img/index_icon_04.png);}

a.main_link_item:nth-child(1):hover > div > div, a.main_link_item:nth-child(1):focus > div > div {background-image:url(./s_img/index_icon_01_on.png);}/*
a.main_link_item:nth-child(2):hover > div > div, a.main_link_item:nth-child(2):focus > div > div {background-image:url(../s_img/index_icon_02_on.png);}*/
a.main_link_item:nth-child(2):hover > div > div, a.main_link_item:nth-child(3):focus > div > div {background-image:url(./s_img/index_icon_03_on.png);}
a.main_link_item:nth-child(2):hover > div > div.logins, a.main_link_item:nth-child(3):focus > div > div.logins {background-image:url(./s_img/index_icon_05_on.png);}
a.main_link_item:nth-child(3):hover > div > div, a.main_link_item:nth-child(4):focus > div > div {background-image:url(./s_img/index_icon_04_on.png);}

@media (max-width:768px) {
a.main_link_item {
    display: block;
    width: 100%;
    padding: 1px;
    text-align: center;
    font-size: 2.0rem;
    font-weight: 500;
}

.main_links {
    width: 100%;
    margin-top: 2rem;
	 margin-bottom: 4rem;
    display: flex;
    flex-wrap: wrap;
}

#logo {
    top: 12px;

}

.article_header {
    padding: 2.4rem 0 1.0rem;
}

}

@media (max-width:540px) {
	a.main_link_item {width:100%;margin-bottom:10px;}
}

</style>

<main id="main" class="main_container">





<div class="wrap">

<div class="article_header"><div class="wrap"><div class="article_header_inner"><h1 class="article_title" lang="ko"><p><?php echo get_session("center_name");?></p> 온라인 수강예약</h1></div></div></div>
<div class="main_links">

			<a href="<?php echo NC_URL; ?>/center_index.php?center_id=<?php echo $_SESSION['center_id'];?>" class="main_link_item">
				<div>
					<div><img src="./s_img/index_wrap.png"/></div>
					수강신청
				</div>
			</a>
			
			<!--a href="/rent/index" class="main_link_item">
				<div>
					<div><img src="../../img/index_wrap.png"/></div>
					대관
				</div>
			</a-->
			<a href="#!" class="main_link_item" id="join">
				<div>
					<div><img src="./s_img/index_wrap.png"/></div>
					회원가입
				</div>
			</a>
			

			<a href="#!" class="main_link_item"  id="mypage">
				<div>
					<div><img src="./s_img/index_wrap.png"/></div>
					마이페이지
				</div>
			</a>
			
		</div>
</div>

</main>



<script>

$(document).ready(function () {
	
	

var rsult="";	  

$("#join").click(function(e){	
	
	<?php if(get_session("m_id") != ""){?>
		      NC.alert({
				title    : '이미 로그인 상태입니다.',
				message  : '마이페이지로 이동하시겠습니까?.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){
               
       

                                                        rsult += "<form name='form1' method='post' action='<?php echo NC_MYPAGE_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>'>";
														//rsult += "<input type='hidden' name='center_id' value='<?php echo $_SESSION['center_id'];?>'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();


				},
               on_cancel  : function(){
               self.close;
	        
				},
			});
  <?php }else{?>


                                                        rsult += "<form name='form1' method='post' action='./s_member/member_division.php?center_id=<?php echo $_SESSION['center_id'];?>'>";
														//rsult += "<input type='hidden' name='center_id' value='<?php echo $_SESSION['center_id'];?>'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();


<?php } ?>

	
 });	


$("#mypage").click(function(e){	
	
<?php if(get_session("m_id") != ""){?>


                                                        rsult += "<form name='form1' method='post' action='<?php echo NC_MYPAGE_URL; ?>/?center_id=<?php echo $_SESSION['center_id'];?>'>";
														//rsult += "<input type='hidden' name='center_id' value='<?php echo $_SESSION['center_id'];?>'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();



  <?php }else{?>

		      NC.alert({
				title    : '로그인 후 이용가능 합니다.',
				message  : '로그인 페이지로 이동하시겠습니까?.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : true,
				on_confirm  : function(){
               
       

                                                        rsult += "<form name='form1' method='post' action='./s_member/login.php'>";
														rsult += "<input type='hidden' name='center_id' value='<?php echo $_SESSION['center_id'];?>'>";	
														rsult += "<input type='hidden' name='ntype' value='1'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();


				},
               on_cancel  : function(){
                                       self.close;
	        
				},
			});



<?php } ?>
	
 });

});	


</script>

</script>
