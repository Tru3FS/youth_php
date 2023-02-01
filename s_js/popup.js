jQuery(function($) {

/* **************************************** *
 * INIT
 * **************************************** */
jt_popup_slider(true);
jt_popup_floating();
jt_popup_setting();
jt_popup_close();

/* **************************************** *
 * Functions
 * **************************************** */

 function jt_popup_slider(first){

	$('.jt-popup--slideshow').each(function(){

		var $this = $(this);
		var $slider = $this.find('.swiper-container');
		var $slider_item = $this.find('.jt-popup__item');
		var switch_color = function(index){
			var $strap_slider = $('.jt-popup--strap');
			var $current_slide = $strap_slider.find('.swiper-slide').eq(index);
			var color = $current_slide.attr('data-controlcolor');
			var $control = $strap_slider.find('.jt-popup__control');

			$strap_slider.find('.jt-popup__close').css('color',color);
			$strap_slider.find('.jt-popup__close-separator').css('backgroundColor',color);
			$control.find('.jt-popup__arrow').css('color',color);
			$control.find('.swiper-pagination-bullet').css({'borderColor':color,'backgroundColor':'transparent'});
			$control.find('.swiper-pagination-bullet-active').css('backgroundColor',color);
			$control.find('.swiper_play_state_btn').css('color',color);
		}

		if( !$slider.length ) return;

		if( $this.hasClass('jt-popup--strap')){ // strap
			if( $slider_item.length < 2) return;
		} else { // floating
            if( !first ) return;
        }

		if( $this.hasClass('jt-popup__floating-list')){

			if( ($(window).width() >= 1024 && $slider_item.length < 3) || ($(window).width() < 1024 && $slider_item.length < 2)){
				$this.addClass('jt-popup__inner--count-less-2');
                return;
			}

			/*
			if( $slider_item.length < 3) {
				$this.addClass('jt-popup__inner--count-less-2');
			}

			if( $slider_item.length < 3) return;
			*/

			var swiper = new Swiper($slider, {
				loop: true,
				slidesPerView: 2,
				navigation: {
					nextEl: '.jt-popup__floating-list .jt-popup__control .jt-popup__arrow--right',
					prevEl: '.jt-popup__floating-list .jt-popup__control .jt-popup__arrow--left',
				},
				pagination: {
					el: '.jt-popup__floating-list .jt-popup__control .swiper-pagination',
					clickable: true,
					renderBullet: function (index, className) {
						return '<span class="' + className + '"><i><em class="sr_only">' + (index + 1) + '</em></i></span>';
					}
				},
				breakpoints: {
					1024: {
						slidesPerView: 1,
					}
				},
				on: {
					init: function () {
					   // lazyload
						$this.find("img[data-unveil]").unveil(300, function() {
							$(this).on('load',function() {
								$(this).addClass('jt-lazyload--loaded');
							});
						})
					},
				}
			});

		}else{

			// swiper option
			var slider_options = {
				effect : 'fade',
				loop: true,
				slidesPerView: 1,
				navigation: {
					nextEl: '.jt-popup--strap .jt-popup__control .jt-popup__arrow--right',
					prevEl: '.jt-popup--strap .jt-popup__control .jt-popup__arrow--left',
				},
				pagination: {
					el: '.jt-popup--strap .jt-popup__control .swiper-pagination',
					clickable: true,
					renderBullet: function (index, className) {
						return '<span class="' + className + '"><i><em class="sr_only">' + (index + 1) + '</em></i></span>';
					}
				},
				autoplay: {
					delay: 5000,
					disableOnInteraction: true
				},
				on: {
					init: function () {
                        switch_color(this.activeIndex);

						if(!first) {
                            // reinit
                            $slider.find('.jt-popup__item').each(function(){
                                var $this = $(this);
                                $this.css( $this.data('bgtype') , $this.data('bgcolor') );
                            });
                        }
					},
				    slideChange : function(){
                        switch_color(this.activeIndex);
					}
				}
			}

			// manually change effect swiper not allow change effect on breakpoint option
			if($(window).width() >= 1024){
				slider_options.effect = 'slide';
				slider_options.direction = 'vertical';
			}

			// init swiper
			var swiper = new Swiper($slider, slider_options);

			// autoplay setting
			$('.jt-popup__control .swiper_play_state').on('click', function(){
				if($(this).hasClass('play')){
					swiper.autoplay.stop();
					$(this).removeClass('play').addClass('pause');
				} else {
					swiper.autoplay.start();
					$(this).removeClass('pause').addClass('play');
				}
			});
		}
	})
}



function jt_popup_floating(){

	$('.jt-popup--floating').mouseover(function(){
		floating_popup_show();
	}).on('mouseleave', function(){
		floating_popup_hide();
	});

	function floating_popup_show(){
		var bar_h = $('.jt-popup__floating-bar').innerHeight();
		var list_h = $('.jt-popup__floating-list').innerHeight();

		$(".jt-popup--floating").addClass('active');
		$('.jt-popup__floating-bar').css('bottom', -bar_h);
		$('.jt-popup__floating-list').css('top', -list_h);

		if($(window).width() < 1024){
			setTimeout(function(){	
				$('.jt-popup__floating-bar').css('opacity','0');
			}, 500);
		}
	}

	function floating_popup_hide(){
		var bar_h = $('.jt-popup__floating-bar').innerHeight()
		var list_h = $('.jt-popup__floating-list').innerHeight()

		$(".jt-popup--floating").removeClass('active');
		$('.jt-popup__floating-bar').css('bottom','0');
		$('.jt-popup__floating-list').css('top', '0');

		if($(window).width() < 1024){
			$('.jt-popup__floating-bar').css('opacity','1');
		}
	}

	jt_popup_floating_scroll();
}



function jt_popup_floating_scroll(){

    var $window = $(window);
    var $document = $(document);
    var $footer = $('#footer');
    var $popup = $('.jt-popup--floating');

    $window.on('scroll', function() {

		if( $window.scrollTop() < ($document.height() - $window.height() - $footer.outerHeight() - $popup.outerHeight())){
			$popup.addClass('fixScroll');
			$popup.removeClass('fixBottom');
			TweenMax.to( $('.jt-popup__floating-bar'), 0.4, { y: 0, ease: Power3.easeOut });
			TweenMax.to( $('.jt-popup__floating-list'), 0.4, { y: 0, ease: Power3.easeOut });
			//$('.jt-popup__floating-bar').css('bottom','0');
			//$('.jt-popup__floating-list').css('top', -list_h);
		}else{
			$popup.removeClass('fixScroll');
			$popup.addClass('fixBottom');
			TweenMax.to( $('.jt-popup__floating-bar'), 0.4, { y: $('.jt-popup__floating-bar').outerHeight() + 0.5, ease: Power3.easeOut });
			TweenMax.to( $('.jt-popup__floating-list'), 0.4, { y: $('.jt-popup__floating-bar').outerHeight() + 0.5, ease: Power3.easeOut });
			//$('.jt-popup__floating-bar').css('bottom', -bar_h);
			//$('.jt-popup__floating-list').css('top', '0');
		}
    });
}



function jt_popup_setting(){

    // hide if class
    if(sessionStorage.getItem('hide_popup_strap')){
        $('.jt-popup--strap').hide();
    }
    if(sessionStorage.getItem('hide_popup_floating')){
    	$('.jt-popup--floating').hide();
    }

    // show/hide fallback class strap popup
	if($('#header .jt-popup--strap').not('.jt-popup--strap-bottom').is(':visible')){
		$('body').addClass('show_popup');
	} else{
		$('body').removeClass('show_popup');
	}

	// resize
	var init_win_width = $(window).width();
	var resize_sniff_init  = function(){

		if( !!$('#jt-popup--strap').length ){

            var slide = $('#jt-popup--strap .swiper-container')[0].swiper;

			if( $(window).width() < 1024 ) { // to mobile
                if(typeof slide != "undefined" && slide.params.effect != 'fade'){
                    slide.destroy();
                    jt_popup_slider(false);
                }
			} else { // to pc
			    if(typeof slide != "undefined" && slide.params.effect != 'slide'){
                    slide.destroy();
                    jt_popup_slider(false);
                }
			}

		}

	}
	// resize_sniff_init();
	$(window).on('resize', resize_sniff_init);
}



function jt_popup_close(){

    $('.jt-popup__close').on('click',function(){

        var $this   = $( this );
	    var $parent = $this.closest( '.jt-popup' );
	    var hide_key_type = "";

        // hide
	    $parent.hide();
		$('body').removeClass('show_popup');

		// display only once in this tab
        if($parent.hasClass('jt-popup--strap')){
            hide_key_type = "hide_popup_strap";
        }else if($parent.hasClass('jt-popup--floating')){
        	hide_key_type = "hide_popup_floating";
        }

        $.post( '/wp-admin/admin-ajax.php', { action: 'popup_close_action', uid: hide_key_type } );
		// sessionStorage.setItem(hide_key_type,'1');

	})
}



});