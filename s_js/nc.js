'use strict';

var NC = NC || {};

(function(win, $) {

	/**
	 *
	 * @param {string|object} args - the message or an options object for more custom.
	 * @param {string} args.message - 알림 메시지 내용
	 * @param {string} [args.title=false] - 알림 메시지 제목
	 * @param {string} [args.style=basic] - 미리 정의 된 스타일은 "basic", "classic"이며 원하는 클래스 이름을 추가하여 확장 할 수 있습니다
	 * @param {string} [args.type=none] - 미리 정의 된 스타일은 "info", "success", "warning", "error"이며 원하는 클래스 이름을 추가하여 확장 할 수 있습니다
	 * @param {string} [args.has_icon=false] - 알림 메세지의 상태를 나타내는 아이콘을 메세지 상단에 추가합니다
	 * @param {string} [args.primary_title=false] - 확장된 제목 스타일을 제공합니다
	 * @param {string} [args.is_confirm=false] - 컨펌 타입 Alert 출력 (취소버튼 추가로 제공)
	 * @param {string} [args.primary_button=true] - 확장된 버튼 스타일을 제공합니다
	 * @param {string} [args.button_icon=true] - 버튼에 고유 아이콘을 추가로 제공합니다
	 * @param {string} [args.ok=확인] - 확인 버튼 커스텀 텍스트
	 * @param {string} [args.cancel=취소] - 취소 버튼 커스텀 텍스트
	 * @param {callback} [args.on_confirm] - 확인 버튼을 눌렀을때 실행되는 콜백
	 * @param {callback} [args.on_cancel] - 취소 버튼을 눌렀을때 실행되는 콜백
	 * @param {callback} [cb] - 간단한 확인 콜백
	 *
	 * @todo create custom ui
	 *
	 * @example
	 * // String minimal required option :
	 * NC.alert('Some alert message');
	 *
	 * // String type with callback :
	 * NC.alert('Some alert message', function(){
	 *     console.log('Alert 끝!');
	 * });
	 *
	 * // Object type parameter옵션 :
	 * NC.alert({
	 *	   title       : '유효성 검사 안내',
	 *     message     : '개인정보수집 및 이용안내에 동의하여 주십시오.',
	 *     ok          : '확인 버튼 커스텀 텍스트',
	 *     cancel      : '취소 버튼 커스텀 텍스트',
	 *     style       : 'classic',
	 *     type        : 'success',
	 *     button_icon : false,
     *     on_confirm  : function(){
	 *         console.log('Alert 끝!');
     *     },
     *     on_cancel   : function(){
	 *         console.log('Alert 취소!');
     *     }
	 * });
	 *
	 */
	NC.alert = function(args,cb){

        if(typeof args !== 'object' && typeof args !== 'string') return;

		if(typeof cb == 'undefined') {
			cb = '';
		}

        var message, title, style, type, has_icon, primary_title, is_confirm, primary_button, button_icon, ok, cancel, on_confirm, on_cancel;

        // string or object parameter
        if(typeof args == 'object'){
            message = args.message;
            on_confirm = args.on_confirm;
			on_cancel = args.on_cancel;
        }else{
            message = args;
        }

		// if has on_confirm callback second parameter (TODO : improve the parameter 확인 logic)
		if(typeof cb == 'function' && typeof args != 'object'){
		    on_confirm = cb;
		}

		// set default value
		title = (typeof args.title != 'undefined') ? args.title : false;
		style = (typeof args.style != 'undefined') ? args.style : 'basic';
		type = (typeof args.type != 'undefined') ? args.type : 'none';
		has_icon = (typeof args.has_icon != 'undefined' && args.type != 'none' && args.has_icon) ? true : false;
		primary_title = (typeof args.primary_title != 'undefined') ? args.primary_title : false;
		is_confirm = (typeof args.is_confirm != 'undefined') ? args.is_confirm : false;
		primary_button = (typeof args.primary_button != 'undefined') ? args.primary_button : true;
		button_icon = (typeof args.button_icon != 'undefined') ? args.button_icon : true;
		ok = (typeof args.ok != 'undefined') ? args.ok : '확인';
        cancel = (typeof args.cancel != 'undefined') ? args.cancel : '취소';

        // Get a unique id
        var now  = new Date().getTime();
        var uid  = now / 1000 | 0;
        var id   = 'nc-alert--' + uid;

		// defined class
		var css_class = 'nc-alert';

		css_class += ' nc-alert__style-' + style;
		css_class += ' nc-alert__type-' + type;

		if(has_icon){
			css_class += ' nc-alert--has-icon';
		}

		if(is_confirm){
		    css_class += ' nc-alert--confirm';
		}

		if(primary_title){
		    css_class += ' nc-alert--primary-title';
		}

		if(primary_button){
		    css_class += ' nc-alert--primary-button';
		}

		if(button_icon){
		    css_class += ' nc-alert--button-icon';
		}

        // html 생성
        var html = '';

        html +=  '<div id="'+ id +'" class="'+css_class+'" role="alert">';
            html +=  '<div class="nc-alert__container">';
                html +=  '<div class="nc-alert__content">';
				    if(title){
					html +=  '<h1>'+ title+'</h1>';
					}
					html +=  '<p>'+ message+'</p>';
				html +=  '</div> ';
                html +=  '<div class="nc-alert__actions">';
                    if(is_confirm){
				    	html +=  '<button class="nc-alert__btn nc-alert--cancel">'+cancel+'</button>';
				    }
				    html +=  '<button class="nc-alert__btn nc-alert--ok">'+ok+'</button>';
                html +=  '</div>';
            html +=  '</div> ';
        html +=  '</div> ';

        // Body 안에 추가
        $('body').append(html);

        // A11y - focus
        $('#'+ id +' .nc-alert--ok').attr('tabindex', 0).focus();

        // callback
        $('#'+ id).find('.nc-alert--ok').on('click', function(e) {
            e.preventDefault();
            $('#'+ id).remove();

            if(typeof on_confirm === 'function'){
                on_confirm();
            }
        });

		$('#'+ id).find('.nc-alert--cancel').on('click', function(e) {
            e.preventDefault();
            $('#'+ id).remove();

            if(typeof on_cancel === 'function'){
                on_cancel();
            }

        });

        // ESC keyevent 연동
		var esc = function(e){
            if (e.which == '27') {
                $('#'+ id).remove();
            }
        };
        $(document).off('keyup', esc);
        $(document).on('keyup', function(e){
            esc(e);
        });

	};


	NC.confirm = function(msg){
		confirm(msg);
	};


	NC.scrollTo = function(target,container){
		var $target = $(target);
		var offset = 10;
		var $container, container;

		if($target.length > 0){
			if(container == undefined || $(container).length <= 0){
				$container = $("html");
			} else {
				$container = $(container);
			}

			$container.stop().animate({
				scrollTop: ($target.offset().top - $container.offset().top + $container.scrollTop()) - offset
			},function(){
				//console.log('complete');
			});

		}
	};

	NC.smoothscroll = {

		passive : function(){
			var supportsPassive = false;
			try {
			  document.addEventListener("test", null, { get passive() { supportsPassive = true }});
			} catch(e) {}

			return supportsPassive;
		},
		init : function(){

			if($('html').hasClass('mobile') || $('html').hasClass('mac')) return;

			var $window = $(window);
			var scrollTime = 1;
			var distance_offset = 2.5;
			var scrollDistance = $window.height() / distance_offset;

			if(this.passive()){
			    window.addEventListener("wheel",this.scrolling,{passive: false});
			}else{
                $window.on("mousewheel DOMMouseScroll", this.scrolling);
			}

		},
		destroy : function(){

			if(this.passive()){
			    window.removeEventListener("wheel",this.scrolling);
			}else{
               $(window).off("mousewheel DOMMouseScroll", this.scrolling);
			}
			TweenMax.killChildTweensOf($(window),{scrollTo:true});

		},
		scrolling : function(event){

			event.preventDefault();

			var $window = $(window);
			var scrollTime = 1;
			var distance_offset = 2.5;
			var scrollDistance = $window.height() / distance_offset;
			var delta = 0;

			if(NC.smoothscroll.passive()){
			    delta = event.wheelDelta/120 || -event.deltaY/3;
			}else{
				if(typeof event.originalEvent.deltaY != "undefined"){
					delta = -event.originalEvent.deltaY/120;
				}else{
				    delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
				}
			}

			var scrollTop = $window.scrollTop();
			var finalScroll = scrollTop - parseInt(delta*scrollDistance);

			TweenMax.to($window, scrollTime, {
				scrollTo : { y: finalScroll, autoKill:true },
				ease: Power3.easeOut,
				overwrite: 5
			});


		}

	};


	NC.is_screen = function(max_width){
		if(win.matchMedia){
			return win.matchMedia('(max-width:'+ max_width +'px)').matches;
		}else{
			return win.innerWidth <= max_width;
		}
	};



	NC.loading = {		
		show : function(message){
			message = typeof message === 'undefined' ? '로딩중' : message;
			if($('.nc-alert-loading').length <= 0){	
				var html = '';
				html +=  '<div class="nc-alert-loading">';
					html +=  '<div class="nc-alert-loading__container">';
						html +=  '<div class="nc-alert-loading__content">';
							html +=  '<h1 class="nc-alert-loading__content-message">'+message+'</h1>';
							html +=  '<div class="nc-alert-loading__progress">';
								html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-01"></div>';
								html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-02"></div>';
								html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-03"></div>';
							html +=  '</div> ';
						html +=  '</div> ';
					html +=  '</div> ';
				html +=  '</div> ';
				$('body').append(html);
			}else{
				$('.nc-alert-loading__content-message').html(message);
			}
		},
		remove : function(){
			$('.nc-alert-loading').remove();
			
		}		
	};
	
	
	NC.modal = function(){
		
	};



	NC.globals = {};



	NC.cookies = {

		create : function(name,value,days) {
			if (days) {
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
		},

		read : function(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		},

		destroy : function(name) {
			NC.cookies.create(name,"",-1);
		}

	};


	NC.has_webgl = function () {
		try {
		    var canvas = document.createElement('canvas');
		    return !!window.WebGLRenderingContext && (canvas.getContext('webgl') || canvas.getContext('experimental-webgl'));
		} catch(e) {
		    return false;
		}
	};


    NC.ui = {

        list: {},

		init: function () {

            try {

                for ( var func_name in this.list ) {

                    if ( typeof this.list[ func_name ] === 'function' ) {

                        this.list[ func_name ].call();

                    }

                }

            } catch ( e ) {

                console.log( e );

            }

        },

		add: function ( func, exec_flag ) {

            try {

                if ( typeof func === 'function' ) {

                    var func_name = ( ! func.name ? 'func_' + ( new Date() ).getTime() : func.name );

                    this.list[ func_name ] = func;

                    if ( typeof exec_flag !== 'undefined' && exec_flag === true ) {

                        func.call();

                    }

                }

            } catch ( e ) {

                //console.log( e );

            }

        },

		del: function ( func_name ) {

            try {

                delete this.list[ func_name ];

            } catch ( e ) {

                console.log( e );

            }

        },

		replace: function ( func_name, func ) {

            try {

                if ( typeof func === 'function' ) {

                    this.list[ func_name ] = func;

                }

            } catch ( e ) {

                console.log( e );

            }

        },

		get: function ( func_name ) {

            try {

                return this.list[ func_name ];

            } catch ( e ) {

                console.log( e );
                return null;

            }

        },

		call: function ( func_name ) {

            try {

                this.list[ func_name ].call();

            } catch ( e ) {

                console.log( e );

            }

        }

    };


    NC.josa = function ( word, format, join ) {

        var _f = [
            function ( string ) { return _hasJong(string) ? '을' : '를'; }, //을/를 구분
            function ( string ) { return _hasJong(string) ? '은' : '는'; }, //은/는 구분
            function ( string ) { return _hasJong(string) ? '이' : '가'; }, //이/가 구분
            function ( string ) { return _hasJong(string) ? '과' : '와'; }, //와/과 구분
            function ( string ) { return _hasJong(string) ? '으로' : '로'; } //으로/로 구분
        ];

        var _formats = {
            '을/를'     : _f[0],
            '을'        : _f[0],
            '를'        : _f[0],
            '을를'      : _f[0],
            '은/는'     : _f[1],
            '은'        : _f[1],
            '는'        : _f[1],
            '은는'      : _f[1],
            '이/가'     : _f[2],
            '이'        : _f[2],
            '가'        : _f[2],
            '이가'      : _f[2],
            '와/과'     : _f[3],
            '와'        : _f[3],
            '과'        : _f[3],
            '와과'      : _f[3],
            '으로/로'   : _f[4],
            '으로'      : _f[4],
            '로'        : _f[4],
            '으로로'    : _f[4]
        }


        if ( typeof _formats[ format ] === 'undefiend' ) throw 'Invalid format';

        return ( join ? word : '' ) + _formats[ format ]( word.replace( /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi, '' ) );


        function _hasJong( string ) { //string의 마지막 글자가 받침을 가지는지 확인

            return ( string.charCodeAt( string.length - 1 ) - 0xac00 ) % 28 > 0;

        }

	},
		

    NC.task = function () {
        var taskQueue = [];
        function enqueueTask( task ) {
            return taskQueue.push( task );
        }
        function runTask() {
            var task = taskQueue.shift();
            task( function () {
                if ( taskQueue.length > 0 ) {
                    runTask();
                }
            } );
        }
        return {
            push: enqueueTask,
            run: runTask
        }
    }



})(window, jQuery);
