

jQuery(function($) {


NC.ui.add( password_display, true );
NC.ui.add( input_clear, true );

NC.ui.add( nc_tab_scrolls, true );
NC.ui.add( nc_tab, true );






function nc_tab_scrolls(){

	// scroll left to active
	$('.nc_tab').each(function() {
		var $scroll_area = $(this);
		var $overflow_area = $scroll_area.find('.nc_tab__list');
		var $target = $scroll_area.find('.nc_tab__item--active, .nc_tab__management--active');

		if($target.length > 0){
			var left_pos = $target.offset().left - $scroll_area.offset().left + $scroll_area.scrollLeft();
			var offset = 0;
			/*
			if($target.hasClass('.nc_tab__item--last')){
				var offset = $control.width()
			}
			*/

			if($target.offset().left + $target.outerWidth() > $scroll_area.width() - 20){

				$overflow_area.stop().animate( { scrollLeft: left_pos - offset - 30}, 0);
			}
		}
	});

}
nc_auth_btn_active();

function nc_auth_btn_active(){

	$('.nc_frm__data-auth-group--tel').each(function(){

		var $input = $(this).find('.nc_frm__field');
		var $field_button = $(this).find('.nc_frm__field-btn');

		$input.keydown(function(){
			$field_button.addClass('active');
		});

		$input.keyup(function(){
			if( $input.val() == '' ){
				$field_button.removeClass('active');
			}
		});

		$input.focusout(function(){
			if( $input.val() == '' ){
				$field_button.removeClass('active');
			}
		});

	});

}


function nc_tab(){

    if($('.page-template-intro-floor .modal_page_content').length > 0) return;

    var $el = $('.nc_tab');
    var active_class_name = 'nc_tab--active nc_tab__item--active';

    $el.each(function(){

        var $this = $(this);

        // Hide tabs if not already hidden
        $this.find('> div > div').hide();

        // Init display the right tab
        if (location.hash !== "") {
            var current_hash = 	location.hash;
            var current_hash_index = $(current_hash).index();

            $this.find('> div > div').hide();
            $this.find('> div > div:eq('+current_hash_index+')').show();
            $this.find('> ul > li:first').removeClass(active_class_name);
            $this.find('> ul > li:eq('+current_hash_index+')').addClass(active_class_name);

            $('html,body').animate({scrollTop: 0},0);
			
        } else{
            $this.find('> div > div:first').show();
            $this.find('> ul > li:first').addClass(active_class_name);
        }

        // Add click event
        $this.find('> ul > li').on('click',function(){
            $('html,body').animate({scrollTop: $this.offset().top - $('#header').outerHeight()});

            var $that = $(this).find('a');
            var hash = $that.attr('href');
            $this.find('> ul > li').removeClass(active_class_name);
            $that.parent().addClass(active_class_name);

            var target_index = $that.parent().index();
            $this.find('> div > div').hide();
            $this.find('> div > div:eq('+target_index+')').show();
            $('#header').css('position','relative');

            // add hash
            if ('history' in window && 'pushState' in history && !$('body').hasClass('single-education')) {
                history.pushState(null, null, hash)
            }

            return false;
        });

        // Listner hash change
        // TODO DRY THIS CODE !!!
        if ("onhashchange" in window) {
            window.onhashchange = function locationHashChanged() {
                var _current_hash = location.hash;
                var _current_hash_index = $(_current_hash).index();

                $this.find('> div > div').hide();
                $this.find('> div > div:eq('+_current_hash_index+')').show();
                $this.find('> ul > li').removeClass(active_class_name);
                $this.find('> ul > li:eq('+_current_hash_index+')').addClass(active_class_name);
            }
        }

    });

}

NC.ui.add( lazyload_init, true );
NC.ui.add( nc_program_slide_area, true );
function nc_program_slide_area(){

	var $slider = $('.nc-program-slide_aplay');

    //slide
	var swiper = new Swiper($slider, {
		init: true,
        loop: true,
		speed:1000,
		slidesPerView: 1,
		freeMode: false,
			autoplay:false,
		//slidesOffsetAfter: 10,
		//longSwipesRatio : 0.1,
		simulateTouch:false,
		/*pagination: {
			el: '.nc-program-slide_aplay .swiper-pagination',
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '"><i><em class="sr_only">' + (index + 1) + '</em></i></span>';
			}
		},*/
		on: {
			init: function () {
			   // lazyload
				$("img[data-unveil]").unveil(300, function() {
					$(this).on('load',function() {
						$(this).addClass('nc-lazyload--loaded');
					});
				})
			},
		},
	});

    swiper.on('init', function(){
	   // nc_program_slide_area_transition(true);
    })

    //swiper.init();

    swiper.on('slideChange', function(){

      //  nc_program_slide_area_transition(false);

        swiper.autoplay.start();
        $slider.find('.swiper_play_state').removeClass('pause').addClass('play');

        console.log(333)

	});

	// autoplay setting
    $slider.find('.swiper_play_state').on('click', function(){
        if($(this).hasClass('play')){
            swiper.autoplay.stop();
            $(this).removeClass('play').addClass('pause');
        } else {
            swiper.autoplay.start();
            $(this).removeClass('pause').addClass('play');
        }
    });




}

// single slider autoplay slider helper
function nc_program_slide_area_transition(flag){

    var nc_program_slide_area = $('.nc-program-slide_aplay')[0].swiper;
	var $curr = $(nc_program_slide_area.slides[nc_program_slide_area.activeIndex]);

	if( !!$curr.find('iframe').length && !$('html').hasClass('ie10') ) {
		if( nc_program_slide_area_progress != null ) {
			nc_program_slide_area_progress.kill();
			TweenMax.set($('.nc-program-slide_aplay').find('.swiper-progress'), {width: '0%'});
		}
	} else {
		nc_program_slide_area_state(5000);
	}

	nc_program_slide_area_video_check(flag);

}


function slider_pause(){
    nc_program_slide_area_progress.pause()
    $('.nc-program-slide_aplay .swiper_play_state').removeClass('play').addClass('pause');
}

function slider_play(){
    nc_program_slide_area_progress.pause()
    $('.nc-program-slide_aplay .swiper_play_state').removeClass('play').addClass('pause');
}

function slider_ended(){
    nc_program_slide_area_state(0);
    $('.nc-program-slide_aplay .swiper_play_state').removeClass('pause').addClass('play');
}

function nc_program_slide_area_state(speed){

    // progress
	var $state = $('.nc-program-slide_aplay').find('.swiper_play_state');
	var $progress = $('.nc-program-slide_aplay').find('.swiper-progress');

	if( nc_program_slide_area_progress != null ) { nc_program_slide_area_progress.kill(); }

	nc_program_slide_area_progress = TweenMax.fromTo($progress, parseInt(speed/1000), {
		width: '0%'
	}, {
		width: '100%',
		ease: Power0.easeNone,
		onStart: function(){
			$state.removeClass('progress_max');
		},
		onComplete: function(){
			$state.addClass('progress_max');

			if($state.hasClass('play')){
				$('.nc-program-slide_aplay')[0].swiper.slideNext();
			}
		}
	});

}
// 우클릭 방지

//right_click_notworking();

function right_click_notworking(){
	$(document).on("contextmenu",function() {return false;}); 
}


function lazyload_init(){

    // lazyload inside main container only
    $("img[data-unveil]").unveil(300, function() {
        $(this).on('load',function() {
            $(this).addClass('nc-lazyload--loaded');
        });
    });

    // Modal ajax no lazyload
    $(".modal_page_content img[data-unveil]").each(function(){
        var $this = $(this);
        $this.attr('src', $this.attr('data-unveil'));
        $this.addClass('nc-lazyload--loaded');
    })

}

function nc_message(){

	// Close
	$('.nc_message__close').off().on('click',function(e){

		e.preventDefault();
		var $container = $(this).closest('.nc_message');
		var $uid = $container.attr('id');

		$container.slideUp(300);

		if ( $( '#' + $uid ).length > 0 ) {

            //$.post( '/wp-admin/admin-ajax.php', { action: 'popup_close_action', uid: $uid } );
		    // sessionStorage.setItem($uid, '1');

        }

	});

    // Hide if sessionStorage
	/*
	$('.nc_message').each(function(){

        var $this = $(this);
        var id = $this.attr('id');
		if(sessionStorage.getItem(id) == 1){
			$('#'+id).hide();
		}

	})
	*/


}


function password_display() {

	$('.nc_frm__password-toggle-btn').attr('tabIndex', -1);

    $('.nc_frm__password-toggle-btn').on('click', function(e){

        var $this = $(this)
        var $password = $this.siblings('input')

        if ($password.attr("type") == "password") {
            $password.attr("type", "text");
            $this.parent('.nc_frm__password-toggle').addClass('show_pwd')

        } else {
            $password.attr("type", "password");
            $this.parent('.nc_frm__password-toggle').removeClass('show_pwd')
        }


    });

}

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

NC.ui.add( selectric_init, true );

NC.ui.add( datepicker, true );
NC.ui.add( datepicker_inline, true );
NC.ui.add( openDaumZipAddress, true );



function selectric_init(el) {

    if(typeof el == "undefined"){
        el = '.nc-selectric,.nc_selectric'
    }

    $(el).each(function(){

        var $this = $(this);

        $this.on('selectric-init',function(event, element, selectric){

/*
    
            $this.closest('.selectric-wrapper').find('.selectric-scroll').niceScroll({
                autohidemode       : false,
                cursorborder       : "0px solid #717b84",
                cursorcolor        : "#717b84",
                background         : "#ddd",
                cursorwidth        : "4px",
                railwidth          : 4,
					
                cursorborderradius : "5px",
                zindex             : 1,
                railoffset		   : { top: 0, left: -1, },
                railpadding        : { top:  0, right: 0, left: 0, bottom: 1 }
            });
*/


        })

        $this.on('selectric-open',function(){
  
           /*   
            $this.closest('.selectric-wrapper').find('.selectric-scroll').getNiceScroll().resize();

            $this.closest('.selectric-wrapper').find('.selectric-scroll').css('width','100%');
           */




        })
        $this.on('selectric-close',function(){
        
        })

        // init selectric
        if(typeof $this.attr("multiple") != "undefined"){

            $this.addClass('nc-selectric--multiple').selectric({
                disableOnMobile: false,
                nativeOnMobile: false,
                labelBuilder: function(currItem) {
                    var label = '';
                    if(currItem.index === 0 ){
                        label = '<span class="nc-selectric__tag--default">' + currItem.text + '</span>';
                    }else{
                        label = '<span class="nc-selectric__tag">' + currItem.text + '</span>';
                    }
                    return label;
                },
    

            });

        }else{

            $this.selectric({
                disableOnMobile: true
            });

        }

    });


}






function datepicker(){

	

    if($('html').hasClass('mobile')) return;

    $('input[type=date]').each(function(){

        var $this = $(this);

        if($('body').hasClass('nc-bottom-popup-start-show')){

            $this.on('click',function(){
            $this.datepicker( "dialog",function(){
                // open
            },function(){
                // selected
                $this.val($(this).val());
            });
            });

        }else{
            $this.datepicker();
        }

    });




    $(function() {
        $.datepicker._updateDatepicker_original = $.datepicker._updateDatepicker;
        $.datepicker._updateDatepicker = function(inst) {
            $.datepicker._updateDatepicker_original(inst);
            var afterShow = this._get(inst, 'afterShow');
            if (afterShow)
            afterShow.apply((inst.input ? inst.input[0] : null));
        }
    });

    var now = new Date();
	var year =now.getFullYear;

    jQuery.datepicker.setDefaults( {
        dateFormat          : 'yy-mm-dd',
        prevText            : '이전 달',
        nextText            : '다음 달',
        monthNames          : [ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ],
        monthNamesShort     : [ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ],
        dayNames            : [ '일', '월', '화', '수', '목', '금', '토' ],
        dayNamesShort       : [ '일', '월', '화', '수', '목', '금', '토' ],
        dayNamesMin         : [ '일', '월', '화', '수', '목', '금', '토' ],
        showMonthAfterYear  : true,
        yearSuffix          : '.',
        yearRange         : '1920:'+year+'',
        changeYear        : true,
        afterShow        : function (){
            selectric_init('select.ui-datepicker-year');
        }
    } );

    if(!$('html').hasClass('mobile')){
        $('.nc_frm' ).find( 'input[type="date"]' ).prop( 'readonly', false );
        $('.nc_frm').find('input[type="number"],input[type="date"],input[type="time"]').attr('type','text');
    }


}

	// 모두선택
	$("input[name=chk_all]").click(function() {
		if ($(this).prop('checked')) {
			$("input[name^=agree]").prop('checked', true);
		} else {
			$("input[name^=agree]").prop("checked", false);
		}
	});

	$("input[name^=agree]").click(function() {
		
		console.log($("input[name^=agree]").prop('checked'));
		$("input[name=chk_all]").prop("checked", false);
		
		if($("input[name=agree2]").prop('checked')==true && $("input[name=agree3]").prop('checked')==true ){
			
		$("input[name=chk_all]").prop("checked", true);	
			
	}		

		
	});

function datepicker_inline(){

    

    var now = new Date();
	var year =now.getFullYear;
    
    jQuery.datepicker.setDefaults( {
        dateFormat          : 'yy-mm-dd',
        prevText            : '이전 달',
        nextText            : '다음 달',
        monthNames          : [ '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12' ],
        monthNamesShort     : [ '1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월' ],
        dayNames            : [ '일', '월', '화', '수', '목', '금', '토' ],
        dayNamesShort       : [ '일', '월', '화', '수', '목', '금', '토' ],
        dayNamesMin         : [ '일', '월', '화', '수', '목', '금', '토' ],
        showMonthAfterYear  : true,
        yearSuffix          : '.',
        yearRange         : '1920:'+year+'',
        changeYear          : true,
        afterShow           : function () {
                                selectric_init('select.ui-datepicker-year');
                            }
    } );

    if(!$('html').hasClass('mobile')){
        $('.nc_frm' ).find( 'input[type="date"]' ).prop( 'readonly', false );
        $('.nc_frm').find('input[type="number"],input[type="date"],input[type="time"]').attr('type','text');
    }


    // datepicker inline
    $.extend($.datepicker, {

        // Reference the orignal function so we can override it and call it later
        _inlineDatepicker2: $.datepicker._inlineDatepicker,

        // Override the _inlineDatepicker method
        _inlineDatepicker: function (target, inst) {

            // Call the original
            this._inlineDatepicker2(target, inst);

            var beforeShow = $.datepicker._get(inst, 'beforeShow');

            if (beforeShow) {
                beforeShow.apply(target, [target, inst]);
            }
        }
    });

    $( '.nc_frm-calendar' ).datepicker( {
        inline              : true,
        minDate             : 0,
        beforeShowDay       : function ( date ) {

                                /*
                                var $wrap       = $( input );
                                var weeks       = $wrap.data( 'weeks' );
                                var lectures    = $wrap.data( 'lectures' );
                                console.log( input, inst );

                                var day1 = date.getDay();
                                return [(day1 != weekend_strtday && day1 != weekend_endday)];
                                */

                                try {

                                    var $wrap = $( this );
                                    var weeks    = $wrap.data( 'weeks' );
                                    return [ weeks.indexOf( date.getDay().toString() ) >= 0 ];

                                } catch ( e ) {

                                   console.log( e );

                                }

                            },
        onSelect            : function ( d, i ) {

                                var $wrap       = $( this ).closest( '.nc_frm-calendar' );
                                var $list       = $( '.nc_frm__data-list' );
                                var lectures    = $wrap.data( 'lectures' );

                                if ( lectures.length > 0 ) {

                                    var arr_lecture = [];

                                    $.each( lectures, function () {
                                        arr_lecture.push( this.hour + '|' + this.time );
                                    } );

                                    var form_id = $wrap.closest( 'form' ).find( '[name="_form_id"]' ).val();

                                    $.post( '/wp-admin/admin-ajax.php', { action: 'form_get_lecture_available_date', form_id: form_id, date: d, lecture: arr_lecture }, function ( res ) {

                                        var html = '';
                                        html += '<div class="nc_frm__data nc_frm__data-time-person">';
                                            html += '<div class="nc_frm__field-wrap">';
                                                html += '<input type="text" name="nc_form[_lecture][0][date]" class="nc_frm__field date" value="' + d + '" readonly />';
                                            html += '</div>';
                                            html += '<div class="nc_frm__field-wrap nc_frm__time">';
                                                html += '<div class="nc-selectric__wrap">';
                                                    html += '<select name="nc_frm[_lecture][0][lecture]" class="nc-selectric lecture">';
                                                        html += '<option value="">선택해주세요</option>';

                                                        $.each( lectures, function () {



                                                            var hour        = this.hour.split( '.' );
                                                            if ( hour[ 0 ] > 12 ) { // 2021-04-26 오전12시 > 오후12시 표기 변경

                                                                var txt_hour = '오후 ' + ( hour[ 0 ] - 12 ) + '시';

                                                            } else if ( hour[ 0 ] == 12 ) {

                                                                var txt_hour = '오후 ' + hour[ 0 ] + '시';

                                                            } else if ( hour[ 0 ] < 12 ) {

                                                                var txt_hour = '오전 ' + hour[ 0 ] + '시';

                                                            }
                                                            //var txt_hour    = ( hour[ 0 ] >= 12 ? '오후 ' + ( hour[ 0 ] - 12 ) : '오전 ' + hour[ 0 ] ) + '시';
                                                            var tmp_value   = ( this.hour + '|' + this.time );

                                                            if ( hour.length > 1 ) {

                                                                txt_hour += ' 30분';

                                                            }

                                                            if ( res.data[ tmp_value ].available > 0 ) {

                                                                html    += '<option value="' + tmp_value + '" data-count="' + this.count + '" ' + ( check_is_unique( d, tmp_value ) ? '' : 'disabled' ) + '>' +
                                                                            this.time + ' (' + txt_hour + ')'
                                                                        '</option>';

                                                            }

                                                        } );

                                                    html += '</select>';
                                                html += '</div>';
                                            html += '</div><!-- .nc_frm__field-wrap -->';
                                            html += '<div class="nc_frm__field-wrap nc_frm__preson">';
                                                html += '<div class="nc-selectric__wrap">';
                                                    html += '<select name="nc_frm[_lecture][0][count]" class="nc-selectric count">';
                                                        html += '<option value="">선택해주세요</option>';
                                                    html += '</select>';
                                                html += '</div>';
                                            html += '</div><!-- .nc_frm__field-wrap -->';
                                            html += '<div class="nc_frm__field-wrap nc_frm__name">';
                                                html += '<div class="nc-selectric__wrap">';
                                                    html += '<input type="text" name="jt_form[_lecture][0][name]" class="nc_frm__field name" value="' + $wrap.data( 'user' ) + '">';
                                                html += '</div>';
                                            html += '</div><!-- .nc_frm__field-wrap -->';
                                            html += '<button type="button" class="nc_frm__date-delete"><span class="sr-only">삭제</span></button>';
                                        html += '</div><!-- .nc_frm__data -->';

                                        var $item = $( html );

                                        // console.log( $item.find( '.lecture option[value]:not(:disabled)' ).length );

                                        if ( $item.find( '.lecture option[value]:not(:disabled)' ).length > 0 ) {

                                            $( 'select.lecture', $item ).on( 'change', change_lecture_action );

                                            $( 'button.nc_frm__date-delete', $item ).on( 'click', function () {

                                                $( this ).closest( '.nc_frm__data-time-person' ).fadeOut( 'fast', function () {

                                                    $( this ).remove();
                                                    check_unique_selector( this );
                                                    toggle_empty();

                                                } );

                                            } );

                                            // $( 'button.nc_frm__date-delete', $item ).on( 'click', check_unique_selector );
                                            $( 'select.lecture, select.count', $item ).on( 'change', function () { check_unique_selector( this ); } );

                                            $item.appendTo( $list );

                                            selectric_init( $( 'select.nc-selectric', $item ) );

                                        }

                                        toggle_empty();

                                    } );


                                }

                                toggle_empty();

                            }
    } );

    if ( $( '.nc_frm-calendar' ).data( 'maxdate' ) ) $( '.nc_frm-calendar' ).datepicker( 'option', 'maxDate', $( '.nc_frm-calendar' ).data( 'maxdate' ) );
    if ( $( '.nc_frm-calendar' ).data( 'mindate' ) ) $( '.nc_frm-calendar' ).datepicker( 'option', 'minDate', $( '.nc_frm-calendar' ).data( 'mindate' ) );
    if ( new Date( $( '.nc_frm-calendar' ).datepicker( 'option', 'minDate' ) ) - ( new Date() ) < 0 ) $( '.nc_frm-calendar' ).datepicker( 'option', 'minDate', $.datepicker.formatDate( 'yy-mm-dd', ( new Date() ) ) );


    if ( $( '.nc_frm__data-time-person' ).length > 0 ) {

        toggle_empty();


        $( 'button.nc_frm__date-delete' ).on( 'click', function () {

            $( this ).closest( '.nc_frm__data-time-person' ).fadeOut( 'fast', function () {

                $( this ).remove();
                check_unique_selector( this );
                toggle_empty();

            } );

        } );

        var $changes = [];

        $( '.nc_frm__data-time-person .lecture' ).each( function () {

            var $tmp = check_unique_selector( this, true );

            $.each( $tmp, function () {

                if ( $changes.indexOf( this.get( 0 ) ) < 0 ) $changes.push( this.get( 0 ) );

            } );

        } );

        $.each( $changes, function () { selectric_init( this ); } );


    }

    function check_is_unique( date, value ) {

        var is_unique   = true;
        var $dates      = $( '.nc_frm__data-list input.date[value="' + date + '"]' );

        if ( $dates.length > 0 ) {

            $dates.each( function () {

                if ( $( this ).closest( '.nc_frm__data-time-person' ).find( 'select.lecture option[value="' + value + '"]:selected' ).length > 0 ) {

                    is_unique = false;
                    return false;

                }

            } );

        }

        return is_unique;

    }


    function check_unique_selector( target, skip_refresh ) {

        var $wrap   = $( target ).closest( '.nc_frm__data-time-person' );
        var date    = $( 'input.date', $wrap ).val();
        var data    = [];
        var $changes    = [];

        // var tmp     = new Date();

        $( '.nc_frm__data-time-person input.date[value="' + date + '"]' ).each( function () {

            if ( $( this ).closest( '.nc_frm__data-time-person' ).find( 'select.lecture' ).val() )
                data.push( $( this ).closest( '.nc_frm__data-time-person' ).find( 'select.lecture' ).val() );

        } );

        $( '.nc_frm__data-time-person input.date[value="' + date + '"]' ).each( function () {

            var changed     = false;
            var $lecture    = $( this ).closest( '.nc_frm__data-time-person' ).find( 'select.lecture' );

            $( 'option[value]', $lecture ).each( function () {

                if ( this.selected == false && data.indexOf( this.value ) >= 0 ) {

                    this.disabled = true;
                    changed = true;

                } else if ( this.selected == false && data.indexOf( this.value ) < 0 && this.disabled == true ) {

                    this.disabled = false;
                    changed = true;

                }

            } );

            // console.log( changed, $lecture );

            if ( changed ) {

                if ( skip_refresh ) $changes.push( $lecture );
                else $lecture.selectric( 'refresh' );
                // selectric_init( $lecture );

            }

        } );

        // console.log( 'done', ( new Date() ) - tmp );

        // console.log( $changes );

        return $changes;

    }


    function toggle_empty() {

        var $wrap   = $( '.nc_frm__data-list' );
        var $items  = $( '.nc_frm__data-time-person', $wrap );

        $items.each( function ( idx, item ) {

            var $item = $( item );
            $( 'input.date', $item ).attr( 'name', 'nc_frm[_lecture][' + idx + '][date]' );
            $( 'select.lecture', $item ).attr( 'name', 'nc_frm[_lecture][' + idx + '][lecture]' );
            $( 'select.count', $item ).attr( 'name', 'nc_frm[_lecture][' + idx + '][count]' );
            $( 'input.name', $item ).attr( 'name', 'nc_frm[_lecture][' + idx + '][name]' );

        } );

        if ( $items.length > 0 ) {

            $( '.nc_frm__data-empty', $wrap ).hide();

        } else {

            $( '.nc_frm__data-empty', $wrap ).show();

        }



    }

}


function openDaumZipAddress(){

    //$('#billing_postcode').after('<button id="billing_postcode_btn">우편번호 찾기</button>');
    $( '.nc_frm__postcode-btn, input[data-atype="postcode"]' ).on('click', function(event){

        var $wrap = $(this).closest( '.nc_frm__data' );
        var $postcode = $wrap.find( 'input[data-atype="postcode"]' );
        var $address = $wrap.find( 'input[data-atype="address"]' );
        var $sub_address = $wrap.find( 'input[data-atype="sub_address"]' )


        if( typeof daum == "object" && typeof daum.Postcode == "function" ){

            event.preventDefault ? event.preventDefault() : event.returnValue = false;
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
                    // 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로 이동한다.

                    //$('#billing_postcode').val(data.postcode1+'-'+data.postcode2);
                    $postcode.val(data.zonecode);
                    var addr = data.address.replace(/(\s|^)\(.+\)$|\S+~\S+/g, '');
                    $address.val(addr);
                    console.log(addr)

                    //전체 주소에서 연결 번지 및 ()로 묶여 있는 부가정보를 제거하고자 할 경우,
                    //아래와 같은 정규식을 사용해도 된다. 정규식은 개발자의 목적에 맞게 수정해서 사용 가능하다.
                    //var addr = data.address.replace(/(\s|^)\(.+\)$|\S+~\S+/g, '');
                    //document.getElementById('addr').value = addr;
                    $sub_address.focus();
                }
            }).open();

        } else {

        }
        return false;
    });

};

agree_popup();
function agree_popup(){

    var _body = $('body');

    $('.agreement-list, .nc_frm-social-agree__desc,.nc-icheck__label').magnificPopup({
        delegate: '.nc_agree_link.agree',
        type: 'ajax',
        mainClass: 'mfp-fade',
        autoFocusLast: false,
        removalDelay: 100,
        ajax: {
            settings: null,
            cursor: 'mfp-ajax-cur',
            tError: '불러오는데 실패했습니다.'
        },
        callbacks: {
            beforeOpen: function() {

                //DN.smoothscroll.destroy();

				if(!_body.hasClass('lyrics_popup_open')){
					_body.addClass('lyrics_popup_open');
				}

            },
            ajaxContentAdded: function() {

                $('.professional_data .nicescroll_area').niceScroll({
                    autohidemode       : false,
                    background         : "#f5f5f5",
                    cursorborder       : "0px solid #aaa",
                    cursorcolor        : "#aaa",
                    cursorwidth        : 5,
                    cursorborderradius : "25px",
                    railoffset		   : {top: 0, left: 10}
                });

            },
            close: function(){

				if(_body.hasClass('lyrics_popup_open')){
					_body.removeClass('lyrics_popup_open');
				}

                //DN.smoothscroll.init();

            }
        }
    });

}


});
