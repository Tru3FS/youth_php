jQuery(function($) {

$('.home').not('.logged-in').find('.main_news_list .main_grid_list_first .js_full_click').removeClass('js_full_click').addClass('nc_login-first');



NC.ui.add( icheck_init, true );
NC.ui.add( selectric_init, true );
NC.ui.add( custom_input_file, true );

NC.ui.add( lazyload_init, true );

NC.ui.add( sns_popup_init, true );
NC.ui.add( share_function, true );
NC.ui.add( nicescroll_init, true );

function nicescroll_init() {

    var nicscroll_option = {
        autohidemode       : false,
        cursorborder       : "0px solid #fff",
        cursorcolor        : "#ddd",
        background         : "#f4f5f6",
        cursorwidth        : "4px",
        railwidth          : 4,
        cursorborderradius : "5px",
        zindex             : 1,
        railoffset		   : { top: 10, left: 0, },
        railpadding        : { top:  0, right: 0, left: 0, bottom: 1 }
    };

    if($(window).width() < 1024 ){
        $('.nicescroll_area').not('.nicescroll-xl-only').niceScroll(nicscroll_option);
    }else{
        $('.nicescroll_area').niceScroll(nicscroll_option);
    }

}

$(window).on('load',function() {

   

});


function init_resize(){


}


$(window).on('resize',init_resize);


function icheck_init() {

    $('.nc-icheck').iCheck({
        checkboxClass: 'nc-icheck--icheckbox',
        radioClass: 'nc-icheck--iradio'
    });

}

function selectric_init(el) {

    if(typeof el == "undefined"){
        el = '.nc-selectric,.nc_selectric'
    }

    // custom multiple select
    $(el).each(function(){

        var $this = $(this);

        $this.on('selectric-init',function(event, element, selectric){
/*
            $this.closest('.selectric-wrapper').find('.selectric-scroll').niceScroll({
                autohidemode       : false,
                cursorborder       : "0px solid #717b84",
                cursorcolor        : "#1d3661",
                background         : "#F8F8FA",
                cursorwidth        : "6px",
                railwidth          : 6,
                cursorborderradius : "5px",
                zindex             : 1,
                railoffset		   : { top: 2, left: -4, },
                railpadding        : { top:  0, right: 0, left: 0, bottom: 6 },
					cursorfixedheight: 	false,
cursorminheight: 	20,
enablekeyboard: 	true,
horizrailenabled: 	true,
bouncescroll: 		false,
smoothscroll: 		true,
iframeautoresize: 	true,
touchbehavior: 		false,
zindex: 1
            });
*/



        })

        $this.on('selectric-open',function(){
            // NC.smoothscroll.destroy();
            $this.closest('.selectric-wrapper').find('.selectric-scroll').getNiceScroll().resize();

        })
        $this.on('selectric-close',function(){
            // NC.smoothscroll.init();

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
                //optionsItemBuilder: function(itemData) {
                    //return itemData.value.length ? '<span class="ico ico-' + itemData.value +  '"></span>' + itemData.text : itemData.text;
                    //return itemData.value.length ? '<label class="nc_icheck__label"><input class="nc_icheck" type="checkbox" /><span>'+itemData.text+'</span></label>': itemData.text;
                //}

            });

        }else{

            $this.selectric({
                disableOnMobile: false
            });

        }

    });

    $('.nc_form__timezone .nc-selectric').selectric().on('change', function() {

        var $this = $(this)

        var $timezone_val_hour = $this.closest('.nc_form__data--datetime').find('.nc_form__timezone--hour option:selected').val();
        var $timezone_val_minute = $this.closest('.nc_form__data--datetime').find('.nc_form__timezone--minute option:selected').val();

        if ($timezone_val_hour === "") {
            var $timezone_val_hour = '00'
        }

        if ($timezone_val_minute === "") {
            var $timezone_val_minute = '00'
        }

        $this.parents('.nc_form__data--datetime').find('#appt-time').val($timezone_val_hour + ':' + $timezone_val_minute);

    })

}


function custom_input_file(){

    $('.nc_form__field--customfile').customFile({
        input_class: 'nc_form__field', // input text에 추가할 class
        input_placeholder: '선택된 파일 없음', // input text placeholder
        // btn_class: '', // 파일찾기 버튼에 추가할 class
        btn_text: '찾아보기', // 파일찾기 버튼에 들어갈 value
        // remove_btn_class: '', // 삭제 버튼에 추가할 class
        remove_btn_text: '삭제' // 삭제 버튼에 들어갈 value
    });


    $('.jt_custom_file').customFile({
        input_class: 'customfile_input nc_file-upload__input nc_form__field', // input text에 추가할 class
        // input_placeholder: '선택된 파일 없음', // input text placeholder
        btn_text: '찾아보기', // btn에 들어갈 value
        btn_class: 'customfile_btn nc_file-upload__btn' // btn에 추가할 class
    });

    $( '.nc_form__field--customfile, .jt_custom_file' ).on( 'change', check_extensions ); // [201] 2021-01-28 확장자 체크 추가

    $( 'a.file_list_del' ).on( 'click', function () {

        var $this   = $( this );
        var $wrap   = $this.parents( 'div.file_upload_list:first' );
        var $target = $wrap.find( 'input[name="jt_board[del_file][]"]' );

        $wrap.fadeOut( 'fast', function () {

            $target.prop( 'disabled', false );

        } );

        return false;

    } );

    $( 'a.add_file' ).on( 'click', function () {

        var $this       = $( this );
        var $wrap       = $this.closest( '.nc_form__field-wrap' ); // parents( 'div.form_control_wrap:first' ).parents( 'div:first' );
        var file_cnt    = $wrap.find( '.form_control_wrap' ).length; // $( 'div.file_wrapper', $wrap ).length + $( 'input[name="jt_board[del_file][]"]:disabled', $wrap ).length;
        var $file       = $( 'input[type=file]', $wrap ).eq( 0 );
        var max         = parseInt( $file.data( 'max' ) );

        if ( max && file_cnt < max ) {

            var $target     = $( '<div class="form_control_wrap"></div>' );
            var $new_file   = $file.clone();

            $new_file.val( '' );

            if ( $new_file.attr( 'id' ) ) {

                $new_file.attr( 'id', $new_file.attr( 'id' ) + '-' + file_cnt );

            }

            $target.append( $new_file );
            $target.append( '<a href="#" class="del_file"><span>삭제</span></a>' );

            /*
            var $target = $(
                '<div class="form_control_wrap">' +
                //    '<div class="file_wrapper">' +
                        '<input type="file" ' + ( $file.attr( 'name' ) == 'jt_board[]' ? 'id="jt_board_file_' + file_cnt + '"' : '' ) + ' name="' + $file.attr( 'name' ) + '" class="' + $file.attr( 'class' ) + '" data-ext="' + $file.attr( 'data-ext' ) + '" data-size="' + $file.attr( 'data-size' ) + '" />' +
                        '<a href="#" class="del_file"><span>삭제</span></a>' +
                //    '</div>' +
                '</div>'
            );

            $( 'div.file_upload_list', $target ).remove();
            */

            $( 'input[type=file]', $target ).customFile( {
                input_class: 'customfile_input nc_file-upload__input nc_form__field', // input text에 추가할 class
                // input_placeholder: '선택된 파일 없음', // input text placeholder
                btn_text: '찾아보기', // btn에 들어갈 value
                btn_class: 'customfile_btn nc_file-upload__btn' // btn에 추가할 class
            } );

            $( 'input[type=file]', $target ).on( 'change', check_extensions ); // [201] 2021-01-28 확장자 체크 추가
            $( 'a.del_file', $target ).on( 'click', remove_file_action );

            $target.hide().appendTo( $wrap ).fadeIn( 'fast' );
            // $target.css( 'opacity', 0 );
            // $wrap.append( $target );
            // $target.animate( { opacity: 1 }, 'fast' );

        } else {

            NC.alert( '첨부파일은 최대 ' + max + '개까지 등록가능합니다.' );

        }

        return false;

    } );

    $( 'a.del_file' ).on( 'click', remove_file_action );


    function check_extensions() {

        var $this   = $( this );

        if ( $this.val() && $this.data( 'ext' ) ) {

            var exts    = $this.data( 'ext' ).split( ',' ).map( function ( item ) { return item.trim(); } );
            var ext     = $this.val().split( '.' ).pop();

            if ( exts.indexOf( ext ) < 0 ) {

                $this.val( '' ).trigger( 'change' );
                NC.alert( '첨부할 수 없는 파일입니다.' );

            }

        }

    }

    function remove_file_action() {

        var $this   = $( this );
        var $wrap   = $this.closest( '.nc_form__data' );
        var $target = $this.parents( 'div.form_control_wrap:first' );

        if ( $wrap.find( 'div.form_control_wrap' ).length > 1 ) {

            $target.fadeOut( 'fast', function () {

                $target.remove();

            } );

        } else {

            $target.find( 'input:file' ).val( '' ).trigger( 'change' );

        }

        return false;

    }

}






function nicescroll_init() {

    var nicscroll_option = {
        autohidemode       : false,
        cursorborder       : "0px solid #fff",
        cursorcolor        : "#ddd",
        background         : "#f4f5f6",
        cursorwidth        : "4px",
        railwidth          : 4,
        cursorborderradius : "5px",
        zindex             : 1,
        railoffset		   : { top: 10, left: 0, },
        railpadding        : { top:  0, right: 0, left: 0, bottom: 1 }
    };

    if($(window).width() < 1024 ){
        $('.nicescroll_area').not('.nicescroll-xl-only').niceScroll(nicscroll_option);
    }else{
        $('.nicescroll_area').niceScroll(nicscroll_option);
    }

}

NC.ui.add( etc_nicescroll, true );

function etc_nicescroll(){
             $('.content_area_rent .nicescroll_area').niceScroll({
                    autohidemode       : false,
                    background         : "#f5f5f5",
                    cursorborder       : "0px solid #aaa",
                    cursorcolor        : "#d8e2e5",
                    cursorwidth        : "7px",
                    railwidth          : 7,
                    cursorborderradius : "4px",
                    zindex             : 1,
                    railoffset		   : {top: 0, left: 10}
                });
}



function lazyload_init(){

    // lazyload inside main container only
    $("#main img[data-unveil]").unveil(300, function() {
        $(this).on('load',function() {
            $(this).addClass('nc_lazyload--loaded');
        });
    });

    // Modal ajax no lazyload
    $(".modal_page_content img[data-unveil]").each(function(){
        var $this = $(this);
        $this.attr('src', $this.attr('data-unveil'));
        $this.addClass('nc_lazyload--loaded');
    })

}

function sns_popup_init(){

    // SNS POPUP
    $('.nc_share__item').each(function(){

        var element = this;
        var $element = $(element);

        $element.on('click', function(e){

            // return kakao share
            if($(this).hasClass('nc_share--kakao') || $(this).hasClass('nc_share--link')) { return; }

            e.preventDefault();

            // OPTIONS
            var options = {
                href        : this.href,    // 주소
                title       : '',           // 타이틀
                width       : '600',        // { number } 열리는 창의 가로 크기
                height      : '600',        // { number } 열리는 창의 세로 크기
                top         : '0',          // { number } 열리는 창의 좌표 위쪽
                left        : '0',          // { number } 열리는 창의 좌표 왼쪽
                status      : 'no',         // { yes | no | 1 | 0 } 상태 표시바 보이거나 숨기기
                fullscreen  : 'no',         // { yes | no | 1 | 0 } 전체 창 (기본값은 no)
                channelmode : 'no',         // { yes | no | 1 | 0 } 채널모드 F11 키 기능이랑 같음
                location    : 'no',         // { yes | no | 1 | 0 } 주소창 (기본값은 yes)
                menubar     : 'no',         // { yes | no | 1 | 0 } 메뉴바 (기본값은 yes)
                toolbar     : 'no',         // { yes | no | 1 | 0 } 툴바 (기본값은 yes)
                resizable   : 'yes',        // { yes | no | 1 | 0 } 창 (기본값은 yes)
                scrollbars  : 'yes'         // { yes | no | 1 | 0 } 창 스크롤바 (기본값은 yes)
            };

            // ALIGN CENTER
            var align_center = {
                top : Math.round(($(window).height() / 2) - (options.height / 2)),
                left : Math.round(($(window).width() / 2) - (options.width / 2))
            };

            // WINDOW OPEN
            window.open(''+ options.href +'',''+ options.title +'','width='+ options.width +',height='+ options.height +',top='+ align_center.top +',left='+ align_center.left +',status='+ options.status +',fullscreen='+ options.fullscreen +', channelmode='+ options.channelmode+', location='+ options.location+', menubar='+ options.menubar +', toolbar='+ options.toolbar +', resizable='+ options.resizable +', scrollbars='+ options.scrollbars +'');

        });

    });

}



function share_function(){

    $('.nc_share-popup-wrap').prepend('<div class="nc_share-popup-overlay"></div>');

    $('.nc_share__button').on('click', function(e){
        e.preventDefault();

        if ('share' in navigator && $('html').hasClass('mobile')) {
            var title = $('meta[property="og:title"]').attr('content');
            var url = $('link[rel=shortlink]').attr('href');
            navigator.share({
                title: title,
                //text: '',
                url: url,
            })

            return false;
        }else{

            $('body').addClass('open_share')
            $('.nc_share-popup-wrap').show();
            $('.nc_share-popup-wrap').appendTo('body')
            share_clipboard();
        }

    });

    $('.nc_share--close, .nc_share-popup-overlay').on('click', function(e){
        e.preventDefault();
        $('body').removeClass('open_share');
        $('.nc_share-popup-wrap').hide();
    })

}


// clipboard
function share_clipboard(){

    $('.nc_share--link').each(function(){

        if(typeof Clipboard != "undefined"){

            var $this = $(this);
            var clipboard = new Clipboard($this[0]);
            var $clipboard_tooltip = $this.closest('.nc_share-popup').next();

            $clipboard_tooltip.appendTo('.nc_share-popup-wrap');

            $this.on('click', function(e){


                e.preventDefault();
                e.stopPropagation();

                clipboard.on('success', function(e) {

                    e.clearSelection();
                    TweenMax.fromTo($clipboard_tooltip, 0.2, {autoAlpha: 0}, {autoAlpha: 1});

                    setTimeout(function(){

                        TweenMax.fromTo($clipboard_tooltip, 0.2, {autoAlpha: 1}, {autoAlpha: 0});

                    }, 3000);

                });

            });

        }

    }); // end each


}

function split_word_helper(){

    $(".nc_split-word").each(function(){

        var $this = $(this);
        var words = $this.text().split(" ");

        $this.empty();

        $.each(words, function(i, v) {
            $this.append(jQuery("<span>").text(v));
        });

    });

}



function datepicker(){

    if($('html').hasClass('mobile')) return;

    $('input[type=date]').each(function(){

        var $this = $(this);

        if($('body').hasClass('nc_bottom-popup-start-show')){

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

    //trigger custom callback
    $(function() {
        $.datepicker._updateDatepicker_original = $.datepicker._updateDatepicker;
        $.datepicker._updateDatepicker = function(inst) {
            $.datepicker._updateDatepicker_original(inst);
            var afterShow = this._get(inst, 'afterShow');
            if (afterShow)
            afterShow.apply((inst.input ? inst.input[0] : null));
        }
    });

    // jQuery DatePicker Default Setting ( KOR )
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
        yearSuffix          : '년',
        yearRange         : '1920:2050',
        changeYear        : true,
        afterShow        : function (){
            selectric_init('select.ui-datepicker-year');
        }
    } );

    if(!$('html').hasClass('mobile')){
        $('.nc_form' ).find( 'input[type="date"]' ).prop( 'readonly', true );
        $('.nc_form').find('input[type="number"],input[type="date"],input[type="time"]').attr('type','text');
    }


}




function openDaumZipAddress(){

    //$('#billing_postcode').after('<button id="billing_postcode_btn">우편번호 찾기</button>');
    $( '.nc_form__postcode-btn, input[data-atype="postcode"]' ).on('click', function(event){

        var $wrap = $(this).closest( '.nc_form__data' );
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



}); // End jQuery
