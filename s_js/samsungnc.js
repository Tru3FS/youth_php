jQuery(function($) {

family_select();
minimize_header();
small_screen_nav_open();
small_screen_nav_toggle();
//https_redirect();

$('#my_top_menu ol > li.s_nav > a').click(function(){
		$(this).parent('li').toggleClass('on').find('dl').stop(true,true).slideToggle(400);
	});


// 메인페이지
if( $('body').hasClass('home') ) {

}

$(window).on('load',function() {

    if(NC.is_screen('1023')){
		match_height();
	}
		 $('#dbloading').removeClass("on");
	     $('#dbloading').removeClass("is-act");
		 $('#dbloading').removeClass("is-deact");
	

});
menu_layout_setting();
function menu_layout_setting(){

    // add small menu markup
    $('.small_tab_nav').append($('#tab_menu').clone().removeAttr('id').addClass('small_tab_menu'));

}

function small_screen_nav_open(){

    var $body = $('body'),
        $header = $('#header'),
        $menu_container = $('#small_menu_container'),
        $menu_overlay = $('#small_menu_overlay'),
        $menu_close_btn = $('#small_menu_close');
        $member_menu = $('#member_menu_container');
        $noti = $('.mobile_container');

    // open menu
    $('.total_menu_open,.mobile_open_btn').on('click', function(e){

		if($body.hasClass('open_menu')) return;

		e.preventDefault();
		// JT.smoothscroll.destroy();
        $body.addClass('open_menu');
        $header.removeAttr('style');

        // active menu check
        $('.small_depth_menu > li').each(function(){
            if($(this).hasClass('current-menu-ancestor')){
                var $this = $(this);
                // 2depth
                $this.addClass('active').find('> ul').show();

                // 3depth
                $this.find('> ul > li.current-menu-ancestor').each(function(){
                    $(this).addClass('active').find('> ul').show();
                })

                return false;
            }
        });

        // open
        TweenLite.to($menu_overlay, .3, {autoAlpha: 1,onStart: function() {$menu_overlay.css('display', 'block');}});
        TweenLite.fromTo($menu_container, .3, {x: '100%'}, {
            x: '0%',
            onStart: function() {

                $menu_container.css('display', 'block');

				// scroll to active
				var $tab = $('.small_tab_menu > li');
				var $scroll_area = $('#small_depth_menu');
				var $target = $('.small_depth_nav_inner .current-menu-item').closest('.current-menu-parent');
				if($target.length <= 0 && $('.small_depth_nav_inner .current-menu-item').length > 0){
				    $target = $('.small_depth_nav_inner .current-menu-item');
				}else if($('.small_depth_nav_inner .current-page-ancestor').length > 0){
					$target = $('.small_depth_nav_inner .current-page-ancestor').first();
				}

				if(typeof $target.offset() != "undefined"){
					var top_pos = $target.offset().top - $scroll_area.offset().top + $scroll_area.scrollTop();
					var offset = $tab.first().position().top;
					$('.small_depth_nav_inner').stop().animate( { scrollTop: top_pos - offset }, 0)
				}

            }
        });
        TweenLite.to($menu_close_btn, .5, {autoAlpha: 1});

		if ($(window).width() < 1024)	{
	        TweenLite.to($member_menu, .5, {autoAlpha: 1});
		}
		$noti.addClass('fixed');

    });

    // close menu
    $('#small_menu_close, #small_menu_overlay').on('click',function(){

        TweenLite.to($menu_overlay, .3, {autoAlpha: 0,onComplete: function() {$menu_overlay.css('display', 'none');}});
        TweenLite.to($menu_container, .3, {
            x: '100%',
            onComplete: function() {
				// JT.smoothscroll.init();
                $body.removeClass('open_menu');
            }
        });
        TweenLite.to($menu_close_btn, .3, {autoAlpha: 0, onComplete: function(){
				// $noti.removeClass('fixed');
			}
		});
		$noti.removeClass('fixed');

		if ($(window).width() < 1024)	{
	        TweenLite.to($member_menu, .3, {autoAlpha:1});
		}

    });

}
function https_redirect(){
if (window.location.protocol != "https:")
    window.location.href = "https:" + window.location.href.substring(window.location.protocol.length);
}

function small_screen_nav_toggle(){

    // menu top level link
	$('.small_depth_menu > li > ul.sub-menu').on('click', 'li.menu-item-has-children > a', function(e){

        e.preventDefault();

        var $parent = $(this).closest('ul');
        var $li = $(this).closest('li');

        if( !$parent.hasClass('sub-menu') ) { // 2depth

            $('.small_depth_menu > li.active > ul > li').removeClass('active').find('> ul').stop().slideUp(); // 3depth close

            if($(this).closest('li').hasClass('active')) { // 열려있는 menu 클릭시 닫기

                $(this).closest('li').removeClass('active').find('> ul').stop().slideUp();

            } else {

                $('.small_depth_menu > li').removeClass('active').find('> ul').stop().slideUp();

                $li.addClass('active');
                $li.find('> ul').stop().slideDown();

            }

        } else { // 3depth

            if($(this).closest('li').hasClass('active')) { // 열려있는 menu 클릭시 닫기

                $(this).closest('li').removeClass('active').find('> ul').stop().slideUp();

            } else {

                $('.small_depth_menu > li.active > ul > li').removeClass('active').find('> ul').stop().slideUp();

                $li.addClass('active');
                $li.find('> ul').stop().slideDown();

            }

        }

	});

}

 small_scroll_menu();
function small_scroll_menu(){

	var $tab = $('.small_tab_menu > li');
	var $items = $('.small_depth_menu > li');
	var $doc = $('html, body');
    var is_scrolling = false;



    if ( $( '.small_tab_menu > li.current-page-ancestor' ).length > 0 ) {

        var $current = $( '.small_tab_menu > li.current-page-ancestor' );

        $current.addClass( 'current_scroll' );

        var index           = $current.index();
        var $scroll_area    = $('#small_depth_menu');
        var $target         = $('#small_depth_menu > li').eq(index);
        var top_pos         = $target.offset().top - $scroll_area.offset().top + $scroll_area.scrollTop();
        var offset          = $tab.first().position().top;

        

    } else {

	    $tab.eq(0).addClass('current_scroll');

    }


	$('.small_tab_menu > li:first-child > a,.small_tab_menu > li:nth-child(2) > a,.small_tab_menu > li:nth-child(3) > a,.small_tab_menu > li:nth-child(4) > a ').on('click',function(e){

        e.preventDefault();

        is_scrolling = true;

        var $this = $(this);
        var index = $this.parent().index();
        var $scroll_area = $('#small_depth_menu');
        var $target = $('#small_depth_menu > li').eq(index);
        var top_pos = $target.offset().top - $scroll_area.offset().top + $scroll_area.scrollTop();
        var offset = $tab.first().position().top;

        $('.small_depth_nav_inner').stop().animate( { scrollTop: top_pos - offset }, 300,function(){

        	$this.parent().addClass('current_scroll').siblings().removeClass('current_scroll');
        	is_scrolling = false

        } );

	})

	$('.small_depth_nav_inner').on('scroll', function(){

        if(is_scrolling) return;

		//var scroll_Top = $(this).offset().top;
		var scroll_Top = $(this).offset().top + ($('#small_depth_menu > li').outerHeight() / 1);

		$items.each(function(idx){

			var $target = $items.eq(idx);
			var i = $target.index();
			var targetTop = $target.offset().top;

			if(targetTop <= scroll_Top){

				$tab.removeClass('current_scroll');
				$tab.eq(idx).addClass('current_scroll');

			}
		});

	});

}



	$(document).mouseup(function(e){

		if($("#breadcrumb_nav > li.depth1").has(e.target).length === 0){
			$("#breadcrumb_nav > li.depth1").removeClass('open');
		}
		if($("#breadcrumb_nav > li.depth2").has(e.target).length === 0){
			$("#breadcrumb_nav > li.depth2").removeClass('open');
		}
		if($("#breadcrumb_nav > li.depth3").has(e.target).length === 0){
			$("#breadcrumb_nav > li.depth3").removeClass('open');
		}

	});



	$("#breadcrumb_nav > li > a").click(function(e){
		if($(this).parent().hasClass('firstHome')){
			return true;
		}else{
			e.preventDefault();
			$(this).parent().toggleClass('open');
		}
	});



Tsub_bread_tab();
function Tsub_bread_tab() {



    if($("body").find(".brdWrap").length){
        $(".brdWrap").each(function(){
            var snbBtn = $(this).find(".tabBtn"),
                btn = snbBtn.children(".off");
            var sub_cont = $(this).find(".sub_cont"),
                cnt = sub_cont.children(".sub_cont_wrap");
            btn.on("click", function(){
                var ele = $(this),
                    eleIdx = ele.index();
                if( !ele.hasClass("act") ){
                    btn.removeClass("act");
                    cnt.removeClass("act");
                    ele.addClass("act");
                    cnt.eq(eleIdx).addClass("act");
					 $(".sub_bread_menu > li.depth2").removeClass("open");
					 $(".brdWrap #sub_bread_txt").text($(".brdWrap .sub_bread_menu li.act a").text());
                    return false;
                }else{
                    return false;
                }
            })
        })
    }

    }


screen_nav_a11y();

function screen_nav_a11y() {

    $('#menu .menu-item').on('focusin', function(){
		$(this).addClass('focusin');
	}).on('focusout', function(){
		$(this).removeClass('focusin');
	});

}

 scroll_top();
function scroll_top(){

    var $window = $(window);
    var $document = $(document);
    var $footer = $('#footer');
    var $scrollBtn = $('#go_top');

    $scrollBtn.on('click',function(){
        $("html, body").stop().animate({
            scrollTop: 0
        }, 600);

        return false;
    });

    $window.on('scroll', function() {
        if ($window.scrollTop() < $document.height() - $window.height() - $footer.outerHeight() + 20) {
            $scrollBtn.addClass('js_go_top_fix');
        } else {
            $scrollBtn.removeClass('js_go_top_fix');
        }

        if ($window.scrollTop() < $window.height()) {
            $scrollBtn.addClass('js_go_top_hide');
        } else {
            $scrollBtn.removeClass('js_go_top_hide');
        }
    });

}

scroll_down();
function scroll_down(){

    $('.scroll_down').on('click',function(){

        var target = $(this).attr('href');
        var target_top = $(target).offset().top;
        var header_height = $('#header').height();
        var space = 0;

        if(!$('#header').hasClass('minimize')) {
            if(!is_screen(1023)) {
                space = 15;
            } else if(!is_screen(768)) {
                space = 10;
            }
        }

        $('html,body').animate({
            scrollTop : target_top - header_height + space
        }, 600);

        return false;

    });

}

function match_height(){

    // element
	/*
	if(typeof selector == "undefined"){
	    selector = '.js_match_height > li'
	}

	var $item = $(selector);
	*/

	$item = $('.main_news_list .main_grid_list_second .nc_grid-list__item, .nc_slideshow .nc_card--division .nc_card__top');

    // init
    nc_equal_height();

    // resize
    $(window).resize(nc_equal_height);

    // Add closures to keep the $item alive
    function nc_equal_height(){

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;

        $item.each(function() {
            $el = $(this);
            $el.height('auto');
            topPostion = $el.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0;
                currentRowStart = topPostion;
                currentTallest = $el.height();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }

            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });

    } 

}

ios_debugging();


function ios_debugging(){

    var target = $('.nc_ios_debugging_btn');

	if( $('html').hasClass('ipad') || $('html').hasClass('iphone') || $('html').hasClass('ipod') ){

		target.on('click touchend',function(e){
            window.location = this.href;
		});

	}

}


mobile_tab_menu();

// mobile tab menu (toggle)
function mobile_tab_menu(){

	// first remove webview item
	if(!$('body').hasClass('nc_webview') || !$( 'body' ).hasClass( 'logged-in' ) ){
		$('.webview_mysubscribe_menu').remove();
	}

	// toogle see all tab
	$('.menu_control_btn').on('click', function(e){

		var $overlay = $('#tab_menu_overlay');

		e.preventDefault();

		if(!$(this).hasClass('active')){

			$('body').css('overflow','hidden'); // prevent scroll

			$(this).addClass('active');
			$('.tab_menu_container').addClass('active');
			TweenLite.to($overlay, .3, {autoAlpha: 1,onStart: function() {$overlay.css('display', 'block');}});

		}else{

			$('body').css('overflow','auto');

			$(this).removeClass('active');
			$('.tab_menu_container').removeClass('active');
			TweenLite.to($overlay, .4, {autoAlpha: 0,onComplete: function() {$overlay.css('display', 'none');}});
		}
	})

	// overlay click close tabmenu
	$('#tab_menu_overlay').on('click', function(){
        var $this = $(this);

        if($('.tab_menu_container').hasClass('active')){

			$('body').css('overflow','auto');

            $('.menu_control_btn').removeClass('active');
            $('.tab_menu_container').removeClass('active');
            TweenLite.to($this, .4, {autoAlpha: 0,onComplete: function() {$this.css('display', 'none');}});

        }

 });

	// scroll left
	var $scroll_area = $('.menu_container');
	var $target = $('#menu .current-menu-item, #menu .current-page-ancestor');
	if($target.length > 0){
		var left_pos = $target.offset().left - $scroll_area.offset().left + $scroll_area.scrollLeft();
		var offset = $('#logo').position().left;

		if($target.offset().left + $target.outerWidth() > $scroll_area.width() - $scroll_area.find('.menu_control_btn').width()){
			$('#menu').stop().animate( { scrollLeft: left_pos - offset }, 0);
		}
	}
}



focus_on_tab_only();

function focus_on_tab_only(){

    var $body = $('body');

    $body.on('mousedown', function(){

        $body.addClass('use_mouse');

    }).on('keydown', function() {

        $body.removeClass('use_mouse');

    });

}

function base64encode(str) {
    var CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
    var out = "", i = 0, len = str.length, c1, c2, c3;
    while (i < len) {
        c1 = str.charCodeAt(i++) & 0xff;
        if (i == len) {
            out += CHARS.charAt(c1 >> 2);
            out += CHARS.charAt((c1 & 0x3) << 4);
            out += "==";
            break;
        }
        c2 = str.charCodeAt(i++);
        if (i == len) {
            out += CHARS.charAt(c1 >> 2);
            out += CHARS.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
            out += CHARS.charAt((c2 & 0xF) << 2);
            out += "=";
            break;
        }
        c3 = str.charCodeAt(i++);
        out += CHARS.charAt(c1 >> 2);
        out += CHARS.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
        out += CHARS.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
        out += CHARS.charAt(c3 & 0x3F);
    }
    return out;
}

login_first();
detail_modal_page();

function detail_modal_page(){

    var page_title = document.title;
    var page_url = window.location.href;


	$('.open_in_modal_page').not('.nc_login-first').on('click',function(e){
     
  
		if($(window).width() >= 1024 && !$(this).hasClass('xl_open_in_modal_popup') || $('.ios body').hasClass('nc_webview')) return; 

		e.preventDefault();

		var $this = $(this);
		var url = $this.attr('href');
		var html = '';
		var close_txt = '뒤로';
        var popup_class = "";
        var is_popup = $this.hasClass('xl_open_in_modal_popup') && $(window).width() >= 1024;
        var scroll_top = $(window).scrollTop();

      

		if($this.attr('id') === "header_login_btn"){
			
			

			var current_url = window.location.href;

			if($('body').hasClass('404')){ 

				location.href=url;
				return;

			} else {

				url += "?redirect_to="+current_url;

			}
		}

		if($('html').hasClass('mobile')){
			close_txt = '뒤로';
		}

		push_state('',url);

		// Fix scroll
		$('body').addClass('modal_page_open');
		$('#dbloading').css('display','block');
           $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");   
	   

		if(is_popup){
			
			
		   popup_class = ' xl-modal-pop';
		   if($this.hasClass('xl_open_in_modal_popup_narrow')){
			   popup_class += ' xl-modal-pop--narrow';
		   }

		   if($this.hasClass('xl_open_in_modal_popup_full')){
			   popup_class += ' xl-modal-pop--full';
		   }
		}

		html += '<div id="modal_page" class="modal_page'+popup_class+'">';
		    html += '<div class="modal_page_content_container">';
				html += '<div id="modal_page_content" class="modal_page_content"><!--<div class="modal_page_loading"></div>--></div>';
			html += '</div>';
			html += '<div class="modal_page_header">';
				 html += '<div class="modal_page_header_inner">';
					 html += '<button class="modal_page_close">'+close_txt+'</button>';
				 html += '</div>';
			html += '</div>';
		html += '</div>';



		$('body').append(html);
        $('.modal_page .modal_ox').val('o');
        if(is_popup){
			

            TweenMax.set($('#modal_page'),{x:0});
			
		
        }

		TweenMax.to($('#modal_page'),0.3,{x:0,ease: Power3.easeOut,onComplete: function(){

			
			
			
			$.get(url, function(response){

				display_content(response,is_popup);

                $response = $(response);

				if($('link[rel="shortlink"]').length > 0 ){
					$('link[rel="shortlink"]').replaceWith( $response.filter('link[rel="shortlink"]'));
				} else {
				   $('head').append($response.filter('link[rel="shortlink"]').clone().wrapAll("<div/>").parent().html())
				}

				if($('meta[property="og:title"]').length > 0 ){
					$('meta[property="og:title"]').replaceWith( $response.filter('meta[property="og:title"]'));
				} else {
				   $('head').append($response.filter('meta[property="og:title"]').clone().wrapAll("<div/>").parent().html())
				}
               $('body').addClass('modal_login');
			   
			   
			   if($('body').hasClass('modal_login')){

			   
			   
	   
			   member_login_submit();





    function member_login_submit() {

        $( '#nc-login-form, #modal_page_content #nc-login-form' ).on( 'submit', function () {
 
         
		   
		  
     
            var $form       = $( '#nc-login-form' );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="member_id"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '아이디를 입력해 주세요.' );
           
            } 

            $target = $( '[name="member_pwd"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 입력해 주세요.' );

            } 

            var pwd = $target.val().trim();


            if ( $error ) {

               // $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                //$( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
				
		    //$('[name="member_pwd"]').val(sha256($('[name="member_pwd"]').val()));		
			



			var rsult="";	  
            var $form   = $( 'form#nc-login-form' );
            var url     = './login_check.php';
           // var data    =  $( 'form#nc-login-form' ).serialize();
           	var data    =  {'sales_code':$('[name="sales_code"]').val(),'s_code':$('[name="s_code"]').val(),'g_code':$('[name="g_code"]').val(),'b_code':$('[name="b_code"]').val(),'month_qty':$('[name="month_qty"]').val(),'unit_price':$('[name="unit_price"]').val(),'member_id':$('[name="member_id"]').val(),'member_t_id':$('[name="member_t_id"]').val(),'member_pwd':$('[name="member_pwd"]').val(),'auto_login':$('[name="auto_login"]').val(),'saved_id': $( '#saved_id' ).is( ':checked' ) ? 'Y' : 'N','url':$('[name="url"]').val(),'medit_link':$('[name="medit_link"]').val()};
		  
           $.post( url, data, function ( res ) {



                   if ( res.ResultCode == 0 ) {
                    
			      if ( res.RCode == 4 ) {



     NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});


						  } else if ( res.RCode == 0 ) {
/*
   NC.alert({
				title    : res.Msg,
				message  : res.ResultMsg
			});
                  location.href='../center_index.php';

*/

					                                    rsult += "<form name='form1' method='post' action='../center_index.php'>";
														rsult += "<input type='hidden' name='member_id' value='"+res.Msg+"'>";	
		                                                rsult += "<input type='hidden' name='member_name' value='"+res.ResultMsg+"'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();

                             return false;

						  }else{
                     
                         	if($('body').hasClass('member_join')){


						                             	rsult += "<form name='form1' method='post' action='"+res.links+"/?center_id="+res.center_id+"'>";
														//rsult += "<input type='hidden' name='center_id' value='"+res.center_id+"'>";	
		                                                rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
                        
						    }else{
								                       /*

					                                    rsult += "<form name='form1' method='post' action='"+res.links+"'>";
														rsult += "<input type='hidden' name='sales_code' value='"+$('[name="sales_code"]').val()+"'>";	
		                                                rsult += "<input type='hidden' name='s_code' value='"+$('[name="s_code"]').val()+"'>";	
		                                                rsult += "<input type='hidden' name='g_code' value='"+$('[name="g_code"]').val()+"'>";	
														rsult += "<input type='hidden' name='b_code' value='"+$('[name="b_code"]').val()+"'>";	
														rsult += "<input type='hidden' name='month_qty' value='"+$('[name="month_qty"]').val()+"'>";	
														rsult += "<input type='hidden' name='unit_price' value='"+$('[name="unit_price"]').val()+"'>";	
														rsult += "<input type='hidden' name='redirect_to' value='"+res.links+"'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
					                                */
					                                    rsult += "<form name='form1' method='post' action='"+res.links+"/?center_id="+res.center_id+"'>";
														//rsult += "<input type='hidden' name='center_id' value='"+res.center_id+"'>";	
		                                                rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
                              
							}
                             
						  }

                } else if( res.ResultCode == -30 || res.ResultCode == -20){
					
                       if ( res.RCode == 3 ) {
                        
               NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});

					   }else{
						   

           
               NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});


					   }          


					
					
				}else {
                    $('[name="member_pwd"]').val('');	
                     NC.alert({
				title    : res.Msg,
				message  : ''
			});

                }

            } );

			 
			   return false;	
           

                //return false;

            }

            function err_msg( $target, msg ) {

                if ( $target && $target.length > 0 ) {

                    var $wrap = $target.closest( '.nc_frm__data' );

                    $wrap.removeClass( 'nc_frm__data--error' );
                    $wrap.find( 'p.nc_frm__error' ).remove();

                    if ( $wrap.length > 0 ) {

                        $wrap.addClass( 'nc_frm__data--error' );
                    
                        $wrap.append( $( '<p />', { class: 'nc_frm__error', text: msg } ) );

                        if ( ! $error ) {

                            $error = $target;
							

                        }

                    }

                }

            }

        } );
	}

        $( '#nc-login-form [name*=member]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );

			   }
			   
				if(!is_popup){
					setTimeout(function(){
						$('.people_modal_close').addClass('focusin').focus();
						// add class and scroll pos tracker
						$('body').attr('data-scrolltop',scroll_top)
								 .css('position','fixed');
					},300);

					$('.modal_page_open').addClass('on');
				}

			});
		}});

		// Add Close event
		$('.modal_page_close').on('click',function(e){

			e.preventDefault();
			close_detail_ajax_page();
            $('.modal_page_open').removeClass('on');
		})

	});

    //뒤로가기 버튼
    if ( ! $( 'body' ).hasClass( 'nc_webview' ) ) {

	    if ("PopStateEvent" in window) {

            window.addEventListener("popstate", function(){

                // close modal
                if($('body').hasClass('modal_page_open')){
                    //if(window.location.hash !== ''){

                        close_detail_ajax_page(false);
                    //}
                }

            }, false);

        }

	}


	function display_content(response,is_popup){

	    var title = $(response).filter('title');
		var $content = $(response).filter('#main');

		// add finished_loading class
		$('#modal_page').addClass('finished_loading');


		document.title = title.text();

		// Append content
		$('#modal_page_content').html($content.html());
		$('.modal_page_loading').remove();
       
    

		// Add popup style close btn
		if(is_popup){
			$('#modal_page_content').append('<a href="#" class="xl-modal-pop__close nc_xl-only">close</a>');
			$('#modal_page').append('<div class="modal_page_overlay"></div>');
			

			$('.xl-modal-pop__close, .modal_page_overlay').on('click',function(e){
				e.preventDefault();
				close_detail_ajax_page();
			})
		}  
		  
		  $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').css('display','none');

		// show back content container
		TweenMax.set($('#modal_page_content'),{autoAlpha:1});

		// Destroy smoothscroll if required
		// NC.smoothscroll.destroy();

		// Facebook video
		// FB.XFBML.parse();

		// Reload js
		NC.ui.init();

		// Analytics
		//gtag('config', 'UA-********-**', {
		  //'page_location': url
		//});

		// pagination click init on each ajajx load
		$('.modal_page .single-pagination__link').on('click',function(e){

			 e.preventDefault();
			 TweenMax.set($('#modal_page_content'),{autoAlpha:0});
             var url = $(this).attr('href');
			 $.get(url, function(response){
				$('.modal_page_content_container').scrollTop(0);
				display_content(response,is_popup);

			});
	    });

	}






    // Close modal
	function close_detail_ajax_page(pushstate){

		if(typeof pushstate == "undefined") {
			pushstate = true
		}


				close(false);


		function close(reload){

			// restore scroll top
			var scroll_top = $('body').attr('data-scrolltop');
			$('body').removeAttr('style');
			window.scrollTo(0, scroll_top);

			// Hack motion
			if($('#modal_page').hasClass('xl-modal-pop') && $(window).width() >= 1024){

				TweenMax.set($('#modal_page'),{x:'101%'});
				$('#modal_page').remove();
				$('body').removeClass('modal_page_open');
                 
				if(pushstate){
					push_state(page_title,page_url);
				}

			}else{

				TweenMax.to($('#modal_page'),0.3,{x:'101%',ease: Power3.easeOut,onComplete: function(){

					$('#modal_page').remove();
					$('body').removeClass('modal_page_open');

					if(pushstate){
						push_state(page_title,page_url);
					}

		
					if(reload){
						window.location.reload();
					}

				}});
			}



		}

	}

}



input_clear();
function input_clear() {

	$('.nc_frm__field-wrap input[type=text]:not(.nc_frm__field--small), .nc_frm__field-wrap input[type=password], .global_search_field, .nc_nav-search__input, .nc_header-search__input, .small_search_field, .nc_search__input ').each(function(){

		var $input = $(this);

		$input.after('<button type="button" class="nc_frm__clear-btn" tabindex="-1"></button>');

		var $close_btn = $input.siblings('.nc_frm__clear-btn');

		$input.keydown(function(){
			TweenLite.to($close_btn, .3, {autoAlpha: 1});
		});

		$input.keyup(function(){
			if( $input.val() == '' ){
				TweenLite.to($close_btn, .3, {autoAlpha: 0});
			}
		});

		$input.focusout(function(){
			// if( $input.val() == '' ){
				TweenLite.to($close_btn, .3, {autoAlpha: 0});
			// }
		});

		$input.focusin(function(){
			if( !$input.val() == '' ){
				TweenLite.to($close_btn, .3, {autoAlpha: 1});
			}
		});

		$close_btn.on('click', function(e){
			e.preventDefault();
			$input.val('');
			$input.blur();
			$input.focus();
		})

	});

}

webview_custom();
function webview_custom(){

	if($('body').hasClass('nc_webview')){

	    // go home link custom
		$('#menu .menu-item-home > a, #logo a').each(function(){

		   var $this = $(this);
		   var home_item_href = $this.attr('href');
	       $this.attr('href',home_item_href+'?showhome');

	   });

	   // Fix ios app back button + target issue
	   if($('html').hasClass('ios')){
			$('[target="_blank"]').each(function(){
				var $this = $(this);
				if($this.is('[href^="/"]')){
					$this.removeAttr('target');
				}
			})
		}

	}

}


function minimize_header() {

    var $window = $(window);
	var $header = $('#header');
	var $body = $('body');
	var $header_wrap = $('.header_wrap');
    var didScroll     = null;
    var currentScroll = 0;
    var lastScroll    = 0;
    var moveScroll    = 10;

	$window.on('scroll', function() {
        didScroll = true;

        if ($window.scrollTop() > $header.height()) {
			$header.addClass('minimize')
			$body.addClass('top-minimize');
		} else {
			$header.removeClass('minimize');
			$body.removeClass('top-minimize');
		}
	});

    setInterval(function() {

        if (didScroll && !$('body').hasClass('open_menu')) {
            hasScrolled();
            didScroll = false;
        }

    }, 50);

    function hasScrolled(){
        
		

        currentScroll = $(this).scrollTop();
        
		


        // Make sure they scroll more than moveScroll
        if(Math.abs(lastScroll - currentScroll) <= moveScroll) return;

        if(currentScroll > lastScroll){ // ScrollDown
            if($('html').hasClass('mobile')){
            	if(currentScroll > $(window).height() / 3){
					if($('body').is('.ios .nc_webview') == false){
						TweenMax.to( $header, 0.25, { y: -$header.outerHeight(), ease: Power3.easeOut });
					}
					$('body').removeClass('show_nav');
		
				}
            } else {
				if(currentScroll > $(window).height() / 3){
					if($('body').is('.ios .nc_webview') == false){
						TweenMax.to( $header, 0.25, { y: -$header.outerHeight(), ease: Power3.easeOut });
					}
					$('body').removeClass('show_nav');

				}
            }
        }
        else { // ScrollUp
			if($('body').is('.ios .nc_webview') == false){
				TweenMax.to( $header, 0.25, { y: 0, ease: Power3.easeOut, onComplete: function(){
					$header.removeAttr('style');
				}});
			}

			if( $(window).width() < 1024) {
				$('body').addClass('show_nav');
			}
        }

        lastScroll = currentScroll;

        if($(window).scrollTop() + $(window).height() > $(document).height() - 90 && $('html').hasClass('ios')) {
			if($('body').is('.ios .nc_webview') == false){
				TweenMax.to( $header, 0.25, { y: -$header.outerHeight(), ease: Power3.easeOut });
			}
           $('body').removeClass('show_nav');
		   
				}

    }

}



favicon_change();


// favicon setting
function favicon_change(){

	var domain = location.origin;
	var disable_url = domain + '/s_img/favicon-192-off.png';
	var active_url = domain + '/s_img/favicon-192.png';

	$(window).on("blur focus", function(e) {
		var prevType = $(this).data("prevType");

		if (prevType != e.type) {
			switch (e.type) {
				case "blur":
					favicon.change(disable_url);
					break;
				case "focus":
					favicon.change(active_url);
					break;
			}
		}

		$(this).data("prevType", e.type);
	});

}

function family_select(){

    if($('html').hasClass('mobile')){

		var options_html = '<option value="">선택해주세요</option>';
        $('.family_select_list_container ul li a').each(function(){

            var $this = $(this);
            var url = $this.attr('href');
            var txt = $this.text();

            options_html += '<option value="'+url+'">'+txt+'</option>';

        })

        $('.family_select').first().append('<select id="family_select_mobile" class="family_select_mobile">'+options_html+'</select>');

        $('#family_select_mobile').on('change',function(){
        	var url = $(this).find("option:selected" ).val();
			if(url !== ""){
               var open = window.open(url,'_blank');
			   if (open == null || typeof(open)=='undefined'){
				   // If popup blocked
				   window.location.href = url;
			   }
			}
        });

    }else{

		$('.nicescroll_area_footer').niceScroll({
			autohidemode       : false,
			cursorborder       : "0px solid #fff",
			cursorcolor        : "#fff",
			background         : "#717b84",
			cursorwidth        : "4px",
			railwidth          : 4,
			cursorborderradius : "5px",
			railoffset		   : { top: 0, left: 10 },
			railpadding        : { top:  0, right: 0, left: 0, bottom: 0 }
		});

		$(document).on('click','.family_select_title, .family_select_overlay',function(){

			var is_home = $('body').hasClass('home');

			if(!$('.family_select').hasClass('open')){
				$('.family_select_list_container').fadeIn(200);
				$('.family_select').addClass('open');
			}else{
				$('.family_select_list_container').fadeOut(200);
				$('.family_select').removeClass('open');
			}

			$('.family_select_list_container .nicescroll_area_footer').getNiceScroll().resize();

		});

    }

}

//nicescroll_init();

function nicescroll_init() {

    $('.nicescroll_area').niceScroll({
        autohidemode       : false,
        cursorborder       : "0px solid #f4f5f6",
        cursorcolor        : "#aaa",
        background         : "#ddd",
        cursorwidth        : 6,
        cursorborderradius : "0px",
        railoffset		   : {top: 0, left: 0}
    });

}




function postZoom(){
		var nowZoom = 100, $btnZoom = $('.zoom_btn'), $pro = $('.zoom_btn.reset .pro');
		var zoomControl  = {
			zoomOut : function(){
				nowZoom = nowZoom - 5;
				if(nowZoom <= 90) nowZoom = 90;
				zoomControl.zooms();
				$pro.text(nowZoom+'%')
			},
			zoomIn : function(){
				nowZoom = nowZoom + 5;
				if(nowZoom >= 120) nowZoom = 120; 
				zoomControl.zooms();
				$pro.text(nowZoom+'%')
			},
			zoomReset : function(){		
				nowZoom = 100;
				zoomControl.zooms();
				$pro.text(nowZoom+'%')
			},
			zooms : function(){
				document.body.style.zoom = nowZoom + "%";
				if(nowZoom == 90) {
					alert("화면을 더 이상 축소할 수 없습니다.");  
				}
				if(nowZoom == 120) {
					alert("화면을 더 이상 확대할 수 없습니다.");
				}
			}
		}
		$btnZoom.on("click", function(){
			var $this = $(this),
				isClone = $this.closest('.clone').length ? true : false,
				focusBtn = '.reset';
			if($this.hasClass('out')){
				zoomControl.zoomIn();
				if(isClone)focusBtn = '.out';
			} else if($this.hasClass('in')) {
				zoomControl.zoomOut();
				if(isClone)focusBtn = '.in';
			} else {
				zoomControl.zoomReset();
			}
		});		
	};

	postZoom();

function login_first(){

    $(document).on('click','.nc-login-first',function(e){

		if(!$('body').hasClass('logged-in')){

			e.preventDefault();
			e.stopPropagation();

			NC.alert({
				title    : '로그인이 필요한 서비스입니다.',
				message  : '로그인 하시겠습니까?',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				has_icon : false,
				is_confirm : true,
				primary_button: true,
				type     : 'info',
				on_confirm  : function(){

                    if ( $( 'body' ).hasClass( 'nc_webview' ) ) {

                        location.href = $( '#header_login_btn' ).attr( 'href' ) + '?redirect_to=' + location.href; // '//';

                    } else if ( $( 'body' ).hasClass( 'login' ) || $( 'body' ).hasClass( 'member_join' ) ) {
                       
				         location.href = $( '#header_login_btn' ).attr( 'href' ) + '?redirect_to=' + location.href; // '//';

                    }else{
						
						 $('#header_login_btn').trigger('click');
					}	
				},
			});
		}

    });
}

breadcrumb_debug();

function breadcrumb_debug(){

	if($('body').hasClass('single-people')){
		$('#nc_breadcrumb').find('li').eq(2).find('a').attr('href','/../../');
	}

}

webview_custom();

function webview_custom(){

	if($('body').hasClass('nc_webview')){

	    // go home link custom
		$('#menu .menu-item-home > a, #logo a').each(function(){

		   var $this = $(this);
		   var home_item_href = $this.attr('href');
	       $this.attr('href',home_item_href+'?showhome');

	   });

	   // Fix ios app back button + target issue
	   if($('html').hasClass('ios')){
			$('[target="_blank"]').each(function(){
				var $this = $(this);
				if($this.is('[href^="/"]')){
					$this.removeAttr('target');
				}
			})
		}

	}

}

function push_state(title,url){

	if ('history' in window && 'pushState' in history) {
		history.pushState(null, title, url);
	}

}
 var $window = $(window),
        $html = $('html');


 lnb_nav_toggle();

function lnb_nav_toggle(){
        var $container = $('.main_container'),
            $side = $container.find('.sidebar'),
            $sideDepthItem = $side.find('.depth_item'),
            $sideMenu = $side.find('.menu').addClass('init'),
            $sideSpy = $sideMenu.find('.spy:last');

        $sideDepthItem.on('click.menu', function(event) {
            var $this = $(this),
                $depthText = $this.children('.depth_text'),
                eventTarget = event.target;

            if($depthText.find(eventTarget).length || $depthText[0] === eventTarget) {
                if($this.hasClass('depth1_item')) {
                    if($this.hasClass('active')) {
                        $html.removeClass('side_open');
                    }else{
                        $html.addClass('side_open');
                    }
                }

                if($this.children('.depth').length) {
                    $this.toggleClass('active').siblings('.depth_item').removeClass('active');
                    event.preventDefault();
                }
            }

            event.stopPropagation();
        }).each(function(index, element) {
            var $element = $(element);

            if($element.children('.depth').length) {
                $element.addClass('has');
            }
        });

        if($sideSpy.length) {
            $html.addClass('side_open');
            $sideSpy.parents('.depth_item').addClass('active');
        }
    }

}); 