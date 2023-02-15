

jQuery(function($){

    var reg_phone   = /^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?[0-9]{3,4}-?[0-9]{4}$/;
    var reg_email   = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    var reg_eng     = /[a-zA-Z]/;
    var reg_num     = /[0-9]/;
	var regexNo = /(\w)\1\1/;
    var reg_special = /[~!@#$%^&*()_+|<>?:{}]/;
    var reg_blank   = /\s/;
    var cert_time, cert_timer;

    member_password_chk();
    certification();
    member_register_submit();

    member_find_actions();
    member_edit_actions();
    member_withdraw_actions();



    //check_unload_when_form_exists();

    /*
    $('#login h1 a').on('click',function(e){
        $(this).attr('href','/');
        $(this).removeAttr('title');
        $(this).text('');
    });
    */
	
	
	

   // if ( NC.cookies.read( 'user_login' ) && $( '#nc-login-form' ).length > 0 ) {

   //    $( '[name=member_id]' ).val( NC.cookies.read( 'user_login' ) );

   // }


    function member_password_chk() {

        $( '#nc_frm-register [name="mem_pwd"],#nc_frm-register2 [name="mem_pwd"]' ).on( 'input change', function () {

            var $this       = $( this );
            var $wrap       = $this.closest( '.nc_frm__data' );
            var $eng        = $( '.nc_frm__valid-message-group .nc_frm__valid-message.english', $wrap );
            var $num        = $( '.nc_frm__valid-message-group .nc_frm__valid-message.number', $wrap );
            var $special    = $( '.nc_frm__valid-message-group .nc_frm__valid-message.special', $wrap );
            var $length     = $( '.nc_frm__valid-message-group .nc_frm__valid-message.length', $wrap );
			var $continuity  = $( '.nc_frm__valid-message-group .nc_frm__valid-message.continuity', $wrap );

            $this.val( $this.val().replace( /\s/gi, '' ) );

            $wrap.find( '.nc_frm__valid-message-group .nc_frm__valid-message' ).removeClass( 'nc_frm__valid-message--error nc_frm__valid-message--clear nc_frm__valid-message--not-required' );

            if ( reg_eng.test( $this.val() ) ) {

                $eng.addClass( 'nc_frm__valid-message--clear' );

            } else {

                $eng.addClass( 'nc_frm__valid-message--error' );

            }

            if ( reg_num.test( $this.val() ) ) {

                $num.addClass( 'nc_frm__valid-message--clear' );

            } else {

                $num.addClass( 'nc_frm__valid-message--error' );

            }

            if ( $special.length > 0 ) {

                if ( reg_special.test( $this.val() ) ) {

                    $special.addClass( 'nc_frm__valid-message--clear' );

                } else {

                    $special.addClass( 'nc_frm__valid-message--error' );

                }

            }
           
		  
            
           if (!regexNo.test($this.val())) {
                if (!stck($this.val(), 3)) {
                   //err_msg( $target, '연속된 3자리 문자는 사용할 수 없습니다.'); 
                   // return false;
				     $continuity.addClass( 'nc_frm__valid-message--error' );

                }else{
                    $continuity.addClass( 'nc_frm__valid-message--clear' );
				}
            }else {
                //err_msg( $target, '3개 이상의 동일한 문자는 사용할 수 없습니다.'); 
			    $continuity.addClass( 'nc_frm__valid-message--error' );
                //return false;
            }







            if ( $this.val().trim().length > 9 && $this.val().trim().length < 21 ) {

                $length.addClass( 'nc_frm__valid-message--clear' );

            } else {

                $length.addClass( 'nc_frm__valid-message--error' );

            }

            if ( $length.hasClass( 'nc_frm__valid-message--clear' ) && $wrap.find( '.nc_frm__valid-message-group .nc_frm__valid-message--clear' ).length > 2 ) {

                $wrap.find( '.nc_frm__valid-message-group .nc_frm__valid-message:not(.nc_frm__valid-message--clear)' ).addClass( 'nc_frm__valid-message--not-required' );

            }

        } );

        $( '#nc_frm-register [name="mem_pwd_chk"],#nc_frm-register2 [name="mem_pwd_chk"]' ).on( 'input change', function () {

            var $this   = $( this );
            var pwd     = $this.closest( '#nc_frm-register,#nc_frm-register2' ).find( '[name="mem_pwd"]' ).val();
            var pwd_chk = $this.val();

            $this.closest( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );
            $this.closest( '.nc_frm__data' ).find( 'p.nc_frm__error' ).remove();

            if ( pwd !== pwd_chk ) {

                $this.closest( '.nc_frm__data' ).addClass( 'nc_frm__data--error' );
                $this.closest( '.nc_frm__data' ).append( $( '<p />', { class: 'nc_frm__error', text: '비밀번호가 일치하지 않습니다.' } ) );

            }

        } );

    }

function stck(str, limit) {
 
    var o, d, p, n = 0, l = limit == null ? 4 : limit;
    for (var i = 0; i < str.length; i++) {
        var c = str.charCodeAt(i);
        if (i > 0 && (p = o - c) > -2 && p < 2 && (n = p == d ? n + 1 : 0) > l - 3) 
            return false;
            d = p, o = c;
    }
    return true;
}




    function certification() {

        var $forms = $( '#nc_frm-register,#nc_frm-register2, #nc_frm-register-cert' );

        if ( $forms.length == 0 ) return;

        $forms.find( '[name="mem_id"]' ).on( 'input change', function () {

            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();


            if ( ! ( reg_eng.test( $this.val() ) || reg_num.test( $this.val() ) ) || ( ($this.val().length < 6) || ($this.val().length > 10) ) ){
            //if ( ! ( reg_eng.test( $this.val() ) || reg_num.test( $this.val() ) ) ) {

                $wrap.addClass( 'nc_frm__data--error' );
                $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '영문 또는 숫자 6~10자로 입력해 주세요.' } ) );
                //$wrap.append( $( '<p />', { class: 'nc_frm__error', text: '영문 또는 숫자로 입력해 주세요.' } ) );

                return false;

            }

            if ( $this.val() ) {

                $.post( './id_check.php', { data: $this.val() }, function ( res ) {

                     //console.log(res.ResultCode);
   
                  console.log(res.result);
   
                    if ( res.ResultCode == -30 ) {

                        $wrap.removeClass( 'nc_frm__data--error' );
                        $wrap.find( 'p.nc_frm__error' ).remove();

                        $wrap.addClass( 'nc_frm__data--error' );
                        $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '이미 등록된 아이디 입니다.' } ) );

                        $wrap.find( '.nc_frm-message' ).show();

                    } else if ( res.ResultCode == -10 ) {

                        $wrap.removeClass( 'nc_frm__data--error' );
                        $wrap.find( 'p.nc_frm__error' ).remove();

                        $wrap.addClass( 'nc_frm__data--error' );
                        $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '아이디중복체크실패' } ) );

                        $wrap.find( '.nc_frm-message' ).show();

                    } else {

                        $wrap.removeClass( 'nc_frm__data--error' );
                        $wrap.find( '.nc_frm-message' ).hide();
                        $wrap.find( 'p.nc_frm__error' ).remove();

                    }

                } );

            } else {

                $wrap.removeClass( 'nc_frm__data--error' );
                $wrap.find( '.nc_frm-message' ).hide();
                $wrap.find( 'p.nc_frm__error' ).remove();

            }

        } );

        $forms.find( '[name="member_email"]' ).on( 'input change', function () {

            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            if ( $this.val() && reg_email.test( $this.val().trim() ) ) {

                $.get( './email_check.php', { data: $this.val() }, function ( res ) {


                    if ( res.result !== false ) {

                        $wrap.addClass( 'nc_frm__data--error' );

                        if ( $( '.nc_frm__error', $wrap ).length == 0 ) {

                            $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '이미 등록된 이메일 입니다.' } ) );

                        } else {

                            $( '.nc_frm__error', $wrap ).text( '이미 등록된 이메일 입니다.' );

                        }

                    } else {

                        $wrap.removeClass( 'nc_frm__data--error' );
                        $( '.nc_frm__error', $wrap ).remove();

                    }

                    console.log( res );

                } );

            } else if ( $this.val() ) {

                $wrap.addClass( 'nc_frm__data--error' );

                if ( $( '.nc_frm__error', $wrap ).length == 0 ) {

                    $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '이메일 형식을 확인해주세요.' } ) );

                } else {

                    $( '.nc_frm__error', $wrap ).text( '이메일 형식을 확인해주세요.' );

                }

            } else {

                $wrap.removeClass( 'nc_frm__data--error' );
                $wrap.find( '.nc_frm__error' ).remove();

            }

        } );

        $forms.find( '.nc_frm__data-auth-group--tel input[name="mem_phone"]' ).on( 'input change', function () {

            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data--auth' );
            var $phone  = $wrap.find( 'input[name="mem_phone"]' );
            var $code   = $wrap.find( 'input[name="mem_pwd_chk"]' );

            if ( $( '.nc_frm__data-auth-complete', $wrap ).length > 0 ) {

                $code.val( '' );

                $( '.nc_frm__data-auth-group--tel .nc_frm__data-auth-complete', $wrap ).remove();
                $( '.nc_frm__data-auth-group--code', $wrap ).hide();
                $( '.nc_frm__data-auth-group--tel button', $wrap ).prop( 'disabled', false );
                $( '.nc_frm__data-auth-group--code button', $wrap ).prop( 'disabled', false );

            }

        } );

        $forms.find( '.nc_frm__data-auth-group--tel button' ).on( 'click', function () {

            var $this       = $( this );
            var $wrap       = $this.closest( '.nc_frm__data--auth' );
            var $phone      = $wrap.find( 'input[name="mem_phone"]' );
            var $code       = $wrap.find( 'input[name="mem_pwd_chk"]' );
            var $code_wrap  = $wrap.find( '.nc_frm__data-auth-group--code' );
            var phone       = $phone.val().trim();

			$this.addClass('nc_frm__protection-button');

            $code.val( '' );
            $code_wrap.hide();

            if ( phone.length == 0 ) {

                NC.alert( '휴대폰번호를 입력해 주세요.', function () {
					$phone.focus();
					$this.removeClass('nc_frm__protection-button');
				});
                return false;

            }

            if ( ! reg_phone.test( phone ) ) {

                NC.alert( '유효한 휴대폰번호를 입력해 주세요.', function () {
					$phone.focus();
					$this.removeClass('nc_frm__protection-button');
				} );
                return false;

            }

            $.get( './phone_check.php', { data: phone }, function ( result ) {

                if ( result.result !== false ) {

                    NC.alert( '이미 등록된 휴대폰번호 입니다.<br />관리자에게 문의 바랍니다.<br />', function () {
						$this.removeClass('nc_frm__protection-button');
					});
                    return false;

                } else {

                    $.get( '/auth/phone/get', { phone: phone }, function ( res ) {

                        if ( res.result ) {

                            NC.alert( '입력하신 휴대폰 번호로<br />인증번호가 발송되었습니다.', function () {
								$this.removeClass('nc_frm__protection-button');
								$this.find('span').text('재전송');
							} );

                            $code_wrap.show();

                            // TIMER START
                            cert_time   = 0;
                            clearInterval( cert_timer );

                            cert_timer  = setInterval( function () {

                                if ( cert_time < 1800 ) {

                                    var min = 29 - Math.floor( cert_time / 60 );
                                    var sec = 59 - Math.floor( cert_time % 60 );

                                    $( '.nc_frm__data-auth-limit', $wrap ).text( min.toLocaleString( 'en-US', { minimumIntegerDigits: 2, useGrouping: false } ) + ':' + sec.toLocaleString( 'en-US', { minimumIntegerDigits: 2, useGrouping: false } ) );

                                } else {

                                    clearInterval( cert_timer );
                                    $( '.nc_frm__data-auth-limit', $wrap ).text( '인증만료' );

                                }
                                cert_time++;

                            }, 1000 );

                        } else {

                            NC.alert( res.data ? res.data : '인증번호 발송 중 오류가 발생했습니다.<br />잠시 후 다시 시도해주세요.', function () {
								$this.removeClass('nc_frm__protection-button');
							} );
                            return false;

                        }
                    } );

                }

            } );

            return false;

        } );

        $forms.find( '.nc_frm__data-auth-group--code button' ).on( 'click', function () {

            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data--auth' );
            var $phone  = $wrap.find( 'input[name="mem_phone"]' );
            var $code   = $wrap.find( 'input[name="mem_pwd_chk"]' );

            var phone   = $phone.val().trim();
            var code    = $code.val().trim();

            if ( phone.length == 0 ) {

                NC.alert( '휴대폰번호를 입력해주세요.', function () { $phone.focus(); } );
                return false;

            }

            if ( ! reg_phone.test( phone ) ) {

                NC.alert( '유효한 휴대폰번호를 입력해 주세요.', function () { $phone.focus(); }  );
                return false;

            }

            if ( code.length == 0 ) {

                NC.alert( '인증번호를 입력해주세요.', function () { $phone.focus(); } );
                return false;

            }

            $.get( '/auth/phone/check', { phone: phone, code: code }, function ( res ) {

                if ( res.result ) {

                    NC.alert( '인증이 완료 되었습니다.', function () {

                        // TODO :: CERT COMPLETE
                        $( '.nc_frm__data-auth-group--tel', $wrap ).append( '<p class="nc_frm__data-auth-complete">본인인증 완료</p>' );
                        $( '.nc_frm__data-auth-group--code', $wrap ).hide();
                        $( '.nc_frm__data-auth-group--tel button', $wrap ).prop( 'disabled', true );
                        $( '.nc_frm__data-auth-group--code button', $wrap ).prop( 'disabled', true );

                    } );
                    clearInterval( cert_timer );

                } else {

                    NC.alert( '입력하신 인증번호가 일치하지 않습니다.<br />입력하신 정보가 정확한지 확인하세요!' );
                    return false;

                }

            } );


            return false;

        } );

    }



    function member_register_submit() {

        $( '#nc_frm-register' ).on( 'submit', function () {

            var $form       = $( this );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="mem_id"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '아이디를 입력해 주세요.' );

            //} else if ( ! ( reg_eng.test( $target.val() ) || reg_num.test( $target.val() ) ) || reg_blank.test( $target.val() ) || $target.val().length < 6 || $target.val().length > 10 ) {
            } else if ( ! ( reg_eng.test( $target.val() ) || reg_num.test( $target.val() ) ) || reg_blank.test( $target.val() ) ) {

                //err_msg( $target, '영문 또는 숫자 6-10자로 입력해 주세요.' );
                err_msg( $target, '영문 또는 숫자로 입력해 주세요.' );

            } else {

                $.ajax( {
                    url     : './id_check.php',
                    type: 'POST', // GET, PUT
                    data    : { data: $target.val() },
                    async   : false,
                    success : function ( res ) {
						
						
						     console.log(res.result);
						
						

                                if ( res.result !== false ) {

                                    err_msg( $target, '이미 등록된 아이디 입니다.' );

                                    $target.closest( '.nc_frm__data' ).find( '.nc_frm-message' ).show();

                                } else {

                                    $target.closest( '.nc_frm__data' ).find( '.nc_frm-message' ).hide();

                                }

                            }
                } );

            }

            $target = $( '[name="mem_pwd"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 입력해 주세요.' );

            } else if ( reg_blank.test( $target.val() ) || $target.val().length < 10 || $target.val().length > 20 ) {

                err_msg( $target, '영문, 숫자를 조합해 10~20자 이내로 입력해 주세요.' );

            } else {

                var tmp_cnt = 0;

                if ( reg_eng.test( $target.val() ) ) tmp_cnt++;
                if ( reg_num.test( $target.val() ) ) tmp_cnt++;
                if ( reg_special.test( $target.val() ) ) tmp_cnt++;
				if ( regexNo.test( $target.val() ) ) tmp_cnt++;

                if ( tmp_cnt < 2 ) {

                    err_msg( $target, '영문, 숫자를 조합해 10~20자 이내로 입력해 주세요.' );

                }


           if (!regexNo.test($target.val())) {
                if (!stck($target.val(), 3)) {
                   err_msg( $target, '연속된 3자리 문자는 사용할 수 없습니다.'); 
                   // return false;
                }
            }
            else {
               err_msg( $target, '3개 이상의 동일한 문자는 사용할 수 없습니다.'); 
                //return false;
            }



            }

            var pwd = $target.val().trim();

            $target = $( '[name="mem_pwd_chk"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 한번 더 입력해 주세요.' );

            } else if ( $target.val() !== pwd ) {

                err_msg( $target, '비밀번호가 일치하지 않습니다..' );

            }

            $target = $( '[name="mem_name"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '이름을 입력해 주세요.' );

            } else if ( $target.val().length < 2 ) {

                err_msg( $target, '2글자 이상 입력해 주세요.' );

            }

            //$target = $( '[name="member[email]"]', $form );
            //if ( $target.closest( '.nc_frm__data' ).hasClass( 'nc_frm--required' ) && ( $target.length == 0 || $target.val().length == 0 ) ) {

            //    err_msg( $target, '이메일을 입력해 주세요.' );

           // } else if ( $target.val().length > 0 && ! reg_email.test( $target.val().trim() ) ) {

           //     err_msg( $target, '유효한 이메일 주소를 입력해 주세요.' );

           // } else if ( $target.val().length > 0 ) {

           //     $.ajax( {
           //         url     : '/auth/email/unique',
           //         data    : { data: $target.val() },
           //         async   : false,
           //         success : function ( res ) {

            //                    if ( res.result ) {

            //                        err_msg( $target, '이미 등록된 이메일 입니다.' );

            //                    }

            //                }
            //    } );

            //}
            $target = $( '[name="mem_birth"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '생년월일을 입력해 주세요.' );

            } 
			
            $target = $( '[name="mem_phone"]', $form );
			$target2 = $( '[name="mb_phone"]', $form );

            if ( $target2.length == 0)
            {
           

            if ( $target.closest( '.nc_frm__data' ).hasClass( 'nc_frm--required' ) && ( $target.length == 0 || $target.val().trim().length == 0 ) ) {

                err_msg( $target, '휴대폰번호를 입력해 주세요.' );

            } else if ( $target.val().length > 0 && ! reg_phone.test( $target.val() ) ) {

                err_msg( $target, '유효한 휴대폰번호를 입력해 주세요.' );

            } else if ( $target.val().length > 0 ) {
/*
                $.ajax( {
                    url     : './phone_check.php',
                    data    : { data: $target.val() },
                    async   : false,
                    success : function ( res ) {

                                if ( res.result ) {

                                    err_msg( $target, '이미 등록된 휴대폰번호 입니다.' );

                                } else {

                                    $target = $( '[name="member_pwd_chk"]', $form );
                                    if ( $target.length == 0 || $target.val().trim().length == 0 ) {

                                        err_msg( $target, '휴대폰번호를 인증해 주세요.' );

                                    }

                                    if ( $( '.nc_frm__data-auth-complete', $form ).length == 0 ) {

                                        err_msg( $target, '휴대폰번호를 인증해 주세요.' );

                                    }

                                    $.ajax( {
                                        url     : '/phone/check',
                                        data    : { phone: $( '[name="member_phone"]', $form ).val(), code: $( '[name="member_pwd_chk"]', $form ).val() },
                                        async   : false,
                                        success : function ( res ) {

                                                    if ( ! res.result ) {

                                                        err_msg( $target, '휴대폰번호를 인증해 주세요.' );

                                                    }

                                                }

                                    } );

                                }

                            }
                } );
*/
            }
		 } 

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
			var rsult="";	  
            var $form   = $( 'form#nc_frm-register' );
            var url     = './member_join_proc.php';
            var data    =  $( 'form#nc_frm-register' ).serialize();

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == 0 ) {

             		//location.href = res.data;
					//NC.alert( res.ResultMsg );

					  
					   
					   
					                            NC.alert({
                                                title:res.Msg,
                                                message    : '',
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													    rsult += "<form name='form1' method='post' action='./m_join_end.php'>";
					                                    rsult += "<input type='hidden' name='member_name' value='"+res.member_name+"'>";	
		                                                rsult += "<input type='hidden' name='member_id' value='"+res.member_id+"'>";					 
		                                                rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					   

           
                  

                }else if ( res.ResultCode == 2){
            
                   
					                            NC.alert({
                                                 title    : "회원가입을 위해 본인인증을 해주세요.",
                                                message    : "본인인증을 하시겠습니까?",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
													     location.href="./m_join.php";
                                                    
                                                 }, on_cancel : function(){
                                                      
													   location.href="/";
                 

                                                 }  });

                }else if ( res.ResultCode == 8){
            
                   
					                            NC.alert({
                                                 title    : "어린이 회원(만 14세미만)가입입니다.",
                                                message    : "생년월일을 다시 확인하세요.",
				                                ok : '확인',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
                                                 } });

                }else if ( res.ResultCode == 9){
            
                   
					                            NC.alert({
                                                 title    : "본인인증된 정보와 입력된 회원가입정보가 일치하지 않습니다. 다시시도 해주세요..",
                                                message    : "",
				                                ok : '확인',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
                                                 } });

                } else {

                    NC.alert( res.Msg );

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


        $( '#nc_frm-register [name*=mem]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );


        $( '#nc_frm-register-cert' ).on( 'submit', function () {

            var $form = $( this );

            $( '.nc_frm__data', $form ).removeClass( 'nc_frm__data--error' );
            $( 'p.nc_frm__error', $form ).remove();

            var $target = $( '[name="member_phone"]', $form );
            var $wrap   = $target.closest( '.nc_frm__data' );

            if ( ! $target || ! $target.val() || $target.val().trim().length == 0 ) {

                add_err( $wrap, '휴대폰 번호를 입력해 주세요.' );

            } else {

                $target = $( '[name="member_pwd_chk"]', $form );

                if ( ! $target || ! $target.val() || $target.val().trim().length == 0 ) {

                    add_err( $wrap, '휴대폰 번호 인증코드를 입력해 주세요.' );

                } else {

                    $target = $( '.nc_frm__data-auth-complete', $form );

                    if ( $target.length == 0 ) {

                        add_err( $wrap, '휴대폰 번호 인증을 완료해 주세요.' );

                    }

                }

            }

            if ( $form.find( '.nc_frm__data--error' ).length > 0 ) {

                if ( $form.closest( '#jt-bottom-popup-offering' ).length > 0 ) {

                    $form.closest( '#jt-bottom-popup-offering' ).animate( { scrollTop: $form.find( '.nc_frm__data--error:first' ).offset().top - 150 } );

                } else {

                    $( 'html, body' ).animate( { scrollTop: $form.find( '.nc_frm__data--error:first' ).offset().top - 150 } );

                }

                return false;

            }

            var html = '';

            html +=  '<div class="nc-alert-loading">';
                html +=  '<div class="nc-alert-loading__container">';
                    html +=  '<div class="nc-alert-loading__content">';
        				html +=  '<h1>처리중입니다.</h1>';
        				html +=  '<div class="nc-alert-loading__progress">';
        				    html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-01"></div>';
        				    html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-02"></div>';
        				    html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-03"></div>';
        			    html +=  '</div> ';
        			html +=  '</div> ';
                html +=  '</div> ';
            html +=  '</div> ';

            // Body 안에 추가
            $('body').append(html);

            function add_err( $wrap, msg ) {

                if ( ! $wrap.hasClass( 'nc_frm__data--error' ) ) {

                    $wrap.addClass( 'nc_frm__data--error' );

                }

                if ( $wrap.find( 'p.nc_frm__error' ).length == 0 ) {

                    $( '<p />', { class: 'nc_frm__error', text: msg } ).appendTo( $wrap );

                }

            }

        } );

    }

//기존회원 회원가입 업데이트
 member_register_submit2();

  function member_register_submit2() {

        $( '#nc_frm-register2' ).on( 'submit', function () {

            var $form       = $( this );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="mem_id"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '아이디를 입력해 주세요.' );

            //} else if ( ! ( reg_eng.test( $target.val() ) || reg_num.test( $target.val() ) ) || reg_blank.test( $target.val() ) || $target.val().length < 6 || $target.val().length > 10 ) {
            } else if ( ! ( reg_eng.test( $target.val() ) || reg_num.test( $target.val() ) ) || reg_blank.test( $target.val() ) ) {

                //err_msg( $target, '영문 또는 숫자 6-10자로 입력해 주세요.' );
                err_msg( $target, '영문 또는 숫자로 입력해 주세요.' );

            } else {

                $.ajax( {
                    url     : './id_check.php',
                    type: 'POST', // GET, PUT
                    data    : { data: $target.val() },
                    async   : false,
                    success : function ( res ) {
						
						
						     console.log(res.result);
						
						

                                if ( res.result !== false ) {

                                    err_msg( $target, '이미 등록된 아이디 입니다.' );

                                    $target.closest( '.nc_frm__data' ).find( '.nc_frm-message' ).show();

                                } else {

                                    $target.closest( '.nc_frm__data' ).find( '.nc_frm-message' ).hide();

                                }

                            }
                } );

            }

            $target = $( '[name="mem_pwd"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 입력해 주세요.' );

            } else if ( reg_blank.test( $target.val() ) || $target.val().length < 10 || $target.val().length > 20 ) {

                err_msg( $target, '영문, 숫자를 조합해 10~20자 이내로 입력해 주세요.' );

            } else {

                var tmp_cnt = 0;

                if ( reg_eng.test( $target.val() ) ) tmp_cnt++;
                if ( reg_num.test( $target.val() ) ) tmp_cnt++;
                if ( reg_special.test( $target.val() ) ) tmp_cnt++;
				if ( regexNo.test( $target.val() ) ) tmp_cnt++;

                if ( tmp_cnt < 2 ) {

                    err_msg( $target, '영문, 숫자를 조합해 10~20자 이내로 입력해 주세요.' );

                }


           if (!regexNo.test($target.val())) {
                if (!stck($target.val(), 3)) {
                   err_msg( $target, '연속된 3자리 문자는 사용할 수 없습니다.'); 
                   // return false;
                }
            }
            else {
               err_msg( $target, '3개 이상의 동일한 문자는 사용할 수 없습니다.'); 
                //return false;
            }



            }

            var pwd = $target.val().trim();

            $target = $( '[name="mem_pwd_chk"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 한번 더 입력해 주세요.' );

            } else if ( $target.val() !== pwd ) {

                err_msg( $target, '비밀번호가 일치하지 않습니다..' );

            }

            $target = $( '[name="mem_name"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '이름을 입력해 주세요.' );

            } else if ( $target.val().length < 2 ) {

                err_msg( $target, '2글자 이상 입력해 주세요.' );

            }

            //$target = $( '[name="member[email]"]', $form );
            //if ( $target.closest( '.nc_frm__data' ).hasClass( 'nc_frm--required' ) && ( $target.length == 0 || $target.val().length == 0 ) ) {

            //    err_msg( $target, '이메일을 입력해 주세요.' );

           // } else if ( $target.val().length > 0 && ! reg_email.test( $target.val().trim() ) ) {

           //     err_msg( $target, '유효한 이메일 주소를 입력해 주세요.' );

           // } else if ( $target.val().length > 0 ) {

           //     $.ajax( {
           //         url     : '/auth/email/unique',
           //         data    : { data: $target.val() },
           //         async   : false,
           //         success : function ( res ) {

            //                    if ( res.result ) {

            //                        err_msg( $target, '이미 등록된 이메일 입니다.' );

            //                    }

            //                }
            //    } );

            //}
            $target = $( '[name="mem_birth"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '생년월일을 입력해 주세요.' );

            }
			
             $target = $( '[name="term_agree"]', $form );

            if ($target.val()=='N')
            {
            


            $target = $( '[name="agree2"]', $form );
            if ( $target.prop('checked')==false ) {

                err_msg( $target, '약관동의 필수항목을 체크해 주세요.' );

            }
			
            $target = $( '[name="agree3"]', $form );
            if ( $target.prop('checked')==false ) {

                err_msg( $target, '약관동의 필수항목을 체크해 주세요.' );

            }

           }
			
            $target = $( '[name="mem_phone"]', $form );
            if ( $target.closest( '.nc_frm__data' ).hasClass( 'nc_frm--required' ) && ( $target.length == 0 || $target.val().trim().length == 0 ) ) {

                err_msg( $target, '휴대폰번호를 입력해 주세요.' );

            } else if ( $target.val().length > 0 && ! reg_phone.test( $target.val() ) ) {

                err_msg( $target, '유효한 휴대폰번호를 입력해 주세요.' );

            } else if ( $target.val().length > 0 ) {
/*
                $.ajax( {
                    url     : './phone_check.php',
                    data    : { data: $target.val() },
                    async   : false,
                    success : function ( res ) {

                                if ( res.result ) {

                                    err_msg( $target, '이미 등록된 휴대폰번호 입니다.' );

                                } else {

                                    $target = $( '[name="member_pwd_chk"]', $form );
                                    if ( $target.length == 0 || $target.val().trim().length == 0 ) {

                                        err_msg( $target, '휴대폰번호를 인증해 주세요.' );

                                    }

                                    if ( $( '.nc_frm__data-auth-complete', $form ).length == 0 ) {

                                        err_msg( $target, '휴대폰번호를 인증해 주세요.' );

                                    }

                                    $.ajax( {
                                        url     : '/phone/check',
                                        data    : { phone: $( '[name="member_phone"]', $form ).val(), code: $( '[name="member_pwd_chk"]', $form ).val() },
                                        async   : false,
                                        success : function ( res ) {

                                                    if ( ! res.result ) {

                                                        err_msg( $target, '휴대폰번호를 인증해 주세요.' );

                                                    }

                                                }

                                    } );

                                }

                            }
                } );
*/
            }

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
			var rsult="";	  
            var $form   = $( 'form#nc_frm-register2' );
            var url     = './member_update_proc.php';
            var data    =  $( 'form#nc_frm-register2' ).serialize();

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == 0 ) {

             		//location.href = res.data;
					//NC.alert( res.ResultMsg );

					  
					   
					   
					                            NC.alert({
                                                title:res.Msg,
                                                message    : '',
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													    rsult += "<form name='form1' method='post' action='./m_join_end.php'>";
					                                    rsult += "<input type='hidden' name='member_name' value='"+res.member_name+"'>";	
		                                                rsult += "<input type='hidden' name='member_id' value='"+res.member_id+"'>";					 
		                                                rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					   

           
                  

                }else if ( res.ResultCode == 2){
            
                   
					                            NC.alert({
                                                 title    : "회원가입을 위해 본인인증을 해주세요.",
                                                message    : "본인인증을 하시겠습니까?",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
													     location.href="./m_join.php";
                                                    
                                                 }, on_cancel : function(){
                                                      
													   location.href="/";
                 

                                                 }  });

                }else if ( res.ResultCode == 8){
            
                   
					                            NC.alert({
                                                 title    : "어린이 회원(만 14세미만)가입입니다.",
                                                message    : "생년월일을 다시 확인하세요.",
				                                ok : '확인',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
                                                 } });

                }else if ( res.ResultCode == 10){
            
                   
					                            NC.alert({
                                                 title    : "이미 가입한 정보가 있습니다.",
                                                message    : "",
				                                ok : '확인',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
                                                 } });

                }else if ( res.ResultCode == 9){
            
                   
					                            NC.alert({
                                                 title    : "본인인증된 정보와 입력된 회원가입정보가 일치하지 않습니다. 다시시도 해주세요..",
                                                message    : "",
				                                ok : '확인',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
                                                 } });

                } else {

                    NC.alert( res.Msg );

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


        $( '#nc_frm-register2 [name*=mem]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );


        $( '#nc_frm-register-cert' ).on( 'submit', function () {

            var $form = $( this );

            $( '.nc_frm__data', $form ).removeClass( 'nc_frm__data--error' );
            $( 'p.nc_frm__error', $form ).remove();

            var $target = $( '[name="member_phone"]', $form );
            var $wrap   = $target.closest( '.nc_frm__data' );

            if ( ! $target || ! $target.val() || $target.val().trim().length == 0 ) {

                add_err( $wrap, '휴대폰 번호를 입력해 주세요.' );

            } else {

                $target = $( '[name="member_pwd_chk"]', $form );

                if ( ! $target || ! $target.val() || $target.val().trim().length == 0 ) {

                    add_err( $wrap, '휴대폰 번호 인증코드를 입력해 주세요.' );

                } else {

                    $target = $( '.nc_frm__data-auth-complete', $form );

                    if ( $target.length == 0 ) {

                        add_err( $wrap, '휴대폰 번호 인증을 완료해 주세요.' );

                    }

                }

            }

            if ( $form.find( '.nc_frm__data--error' ).length > 0 ) {

                if ( $form.closest( '#jt-bottom-popup-offering' ).length > 0 ) {

                    $form.closest( '#jt-bottom-popup-offering' ).animate( { scrollTop: $form.find( '.nc_frm__data--error:first' ).offset().top - 150 } );

                } else {

                    $( 'html, body' ).animate( { scrollTop: $form.find( '.nc_frm__data--error:first' ).offset().top - 150 } );

                }

                return false;

            }

            var html = '';

            html +=  '<div class="nc-alert-loading">';
                html +=  '<div class="nc-alert-loading__container">';
                    html +=  '<div class="nc-alert-loading__content">';
        				html +=  '<h1>처리중입니다.</h1>';
        				html +=  '<div class="nc-alert-loading__progress">';
        				    html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-01"></div>';
        				    html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-02"></div>';
        				    html +=  '<div class="nc-alert-loading__progress-icon nc-alert-loading__progress-icon-03"></div>';
        			    html +=  '</div> ';
        			html +=  '</div> ';
                html +=  '</div> ';
            html +=  '</div> ';

            // Body 안에 추가
            $('body').append(html);

            function add_err( $wrap, msg ) {

                if ( ! $wrap.hasClass( 'nc_frm__data--error' ) ) {

                    $wrap.addClass( 'nc_frm__data--error' );

                }

                if ( $wrap.find( 'p.nc_frm__error' ).length == 0 ) {

                    $( '<p />', { class: 'nc_frm__error', text: msg } ).appendTo( $wrap );

                }

            }

        } );

    }



    function member_find_actions() {

        if ( ! $( '#nc-find-id-form--tel' ) ) return;

        var $form       = $( '#nc-find-id-form--tel, #nc-find-id-form--mail, #nc-find-password-form--tel, #nc-find-password-form--mail, #jt-reset-pw-form' );
        var $id         = $( '[name="find[user_login]"]', $form );
        var $phone      = $( '[name="find[phone]"]', $form );
        var $code       = $( '[name="find[code]"]', $form );
        var $mail       = $( '[name="find[email]"]', $form );
        var $user_login = $( '[name="find[user_login]"]', $form );

        if ( $phone ) {

            $id.on( 'input change', function () {

                var $this   = $( this );
                var $wrap   = $this.closest( '.nc_frm__field-wrap' );

                $wrap.removeClass( 'nc_frm__data--error' );
                $wrap.find( 'p.nc_frm__error' ).remove();


                 //if ( ! ( reg_eng.test( $this.val() ) || reg_num.test( $this.val() ) ) || $this.val().length < 6 || $this.val().length > 10 ) {
                if ( ! ( reg_eng.test( $this.val() ) || reg_num.test( $this.val() ) ) ) {

                    $wrap.addClass( 'nc_frm__data--error' );
                    //$wrap.append( $( '<p />', { class: 'nc_frm__error', text: '영문 또는 숫자 6-10자로 입력해 주세요.' } ) );
                    $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '영문 또는 숫자로 입력해 주세요.' } ) );

                    return false;

                }

                if ( $this.val() ) {

                    $.get( './data.php', { data: $this.val() }, function ( res ) {

                        if ( res.result !== false ) {

                            $wrap.removeClass( 'nc_frm__data--error' );
                            $wrap.find( '.nc_frm-message' ).hide();
                            $wrap.find( 'p.nc_frm__error' ).remove();

                            $phone.prop( 'disabled', false );

                        } else {

                            $wrap.removeClass( 'nc_frm__data--error' );
                            $wrap.find( 'p.nc_frm__error' ).remove();

                            $wrap.addClass( 'nc_frm__data--error' );
                            $wrap.append( $( '<p />', { class: 'nc_frm__error', text: '입력하신 아이디가 잘못되었거나 일치하는 회원 아이디가 없습니다.' } ) );

                            $wrap.find( '.nc_frm-message' ).show();

                            $phone.prop( 'disabled', true );

                        }

                    } );

                } else {

                    $wrap.removeClass( 'nc_frm__data--error' );
                    $wrap.find( '.nc_frm-message' ).hide();
                    $wrap.find( 'p.nc_frm__error' ).remove();

                }

            } );

            $phone.on( 'input change', function () {

                var $this   = $( this );
                var $wrap   = $this.closest( '.nc_frm__data--auth' );

                if ( $( '.nc_frm__data-auth-complete', $wrap ).length > 0 ) {

                    $code.val( '' );

                    $( '.nc_frm__data-auth-group--tel .nc_frm__data-auth-complete', $wrap ).remove();
                    $( '.nc_frm__data-auth-group--code', $wrap ).hide();
                    $( '.nc_frm__data-auth-group--tel button', $wrap ).prop( 'disabled', false );
                    $( '.nc_frm__data-auth-group--code button', $wrap ).prop( 'disabled', false );

                }

            } );


            $form.find( '.nc_frm__data-auth-group--tel button' ).on( 'click', function () {

                var $this       = $( this );
                var $wrap       = $this.closest( '.nc_frm__data--auth' );
                var $code_wrap  = $code.closest( '.nc_frm__data-auth-group--code' );
                var phone       = $phone.val().trim();

				$this.addClass('nc_frm__protection-button');

                $code.val( '' );
                $code_wrap.hide();

                if ( phone.length == 0 ) {

                    NC.alert( '휴대폰번호를 입력해 주세요.', function () {
						$phone.focus();
						$this.removeClass('nc_frm__protection-button');
					} );
                    return false;

                }

                if ( ! reg_phone.test( phone ) ) {

                    NC.alert( '유효한 휴대폰번호를 입력해 주세요.', function () {
						$phone.focus();
						$this.removeClass('nc_frm__protection-button');
					}  );
                    return false;

                }

                $.get( '/auth/phone/get', { phone: phone }, function ( res ) {

                    if ( res.result ) {

						NC.alert( '입력하신 휴대폰 번호로<br />인증번호가 발송되었습니다.', function () {
							$this.removeClass('nc_frm__protection-button');
							$this.find('span').text('재전송');
						} );

                        $code_wrap.show();

                        // TIMER START
                        cert_time   = 0;
                        clearInterval( cert_time );

                        cert_timer  = setInterval( function () {

                            if ( cert_time < 1800 ) {

                                var min = 29 - Math.floor( cert_time / 60 );
                                var sec = 59 - Math.floor( cert_time % 60 );

                                $( '.nc_frm__data-auth-limit', $wrap ).text( min.toLocaleString( 'en-US', { minimumIntegerDigits: 2, useGrouping: false } ) + ':' + sec.toLocaleString( 'en-US', { minimumIntegerDigits: 2, useGrouping: false } ) );

                            } else {

                                clearInterval( cert_timer );
                                $( '.nc_frm__data-auth-limit', $wrap ).text( '인증만료' );

                            }
                            cert_time++;

                        }, 1000 );

                    } else {

                        NC.alert( res.data ? res.data : '인증번호 발송 중 오류가 발생했습니다.<br />잠시 후 다시 시도해주세요.', function () {
							$this.removeClass('nc_frm__protection-button');
						} );
                        return false;

                    }
                } );

                return false;

            } );


            $form.find( '.nc_frm__data-auth-group--code button' ).on( 'click', function () {

                var $this   = $( this );
                var $wrap   = $this.closest( '.nc_frm__data--auth' );
                var phone   = $phone.val().trim();
                var code    = $code.val().trim();

                if ( phone.length == 0 ) {

                    NC.alert( '휴대폰번호를 입력해주세요.', function () { $phone.focus(); } );
                    return false;

                }

                if ( ! reg_phone.test( phone ) ) {

                    NC.alert( '유효한 휴대폰번호를 입력해 주세요.', function () { $phone.focus(); }  );
                    return false;

                }

                if ( code.length == 0 ) {

                    NC.alert( '인증번호를 입력해주세요.', function () { $phone.focus(); } );
                    return false;

                }

                $.get( '/auth/phone/check', { phone: phone, code: code }, function ( res ) {

                    if ( res.result ) {

                        NC.alert( '인증이 완료 되었습니다.', function () {

                            // TODO :: CERT COMPLETE
                            $( '.nc_frm__data-auth-group--tel', $wrap ).append( '<p class="nc_frm__data-auth-complete">본인인증 완료</p>' );
                            $( '.nc_frm__data-auth-group--code', $wrap ).hide();
                            $( '.nc_frm__data-auth-group--tel button', $wrap ).prop( 'disabled', true );
                            $( '.nc_frm__data-auth-group--code button', $wrap ).prop( 'disabled', true );

                        } );
                        clearInterval( cert_timer );

                    } else {

                        NC.alert( '입력하진 인증번호가 일치하지 않습니다.<br />입력하신 정보가 정확한지 확인하세요!' );
                        return false;

                    }

                } );


                return false;

            } );

        }


        if ( $form.attr( 'id' ) == 'nc-find-id-form--tel' ) {

            $form.on( 'submit', function () {

                if ( $phone.length == 0 || $code.length == 0 ) {

                    NC.alert( '잘못된 접근입니다.', function () { location.reload(); } );
                    return false;

                }

                if ( ! $phone.val() ) {

                    NC.alert( '휴대폰번호를 입력해 주세요.' );
                    return false;

                }

                if ( ! reg_phone.test( $phone.val() ) ) {

                    NC.alert( '유효한 휴대폰번호를 입력해 주세요.' );
                    return false;

                }

                if ( ! $code.val() ) {

                    NC.alert( '인증번호를 입력해 주세요.' );
                    return false;

                }

                if ( ! $( '.nc_frm__data-auth-complete', $form ) ) {

                    NC.alert( '휴대폰 인증을 완료해 주세요.' );
                    return false;

                }

            } );

        }


        if ( $form.attr( 'id' ) == 'nc-find-id-form--mail' ) {

            $form.on( 'submit', function () {

                if ( ! $mail ) {

                    NC.alert( '잘못된 접근입니다.', function () { location.reload(); } );
                    return false;

                }

                if ( ! $mail.val() ) {

                    NC.alert( '이메일을 입력해 주세요.' );
                    return false;

                }

                if ( ! reg_email.test( $mail.val().trim() ) ) {

                    NC.alert( '이메일 형식을 확인해주세요.' );
                    return false;

                }

            } );

        }


        if ( $form.attr( 'id' ) == 'nc-find-password-form--tel' ) {

            $form.on( 'submit', function () {

                if ( ! $user_login || ! $phone || ! $code ) {

                    NC.alert( '잘못된 접근입니다.', function () { location.reload(); } );
                    return false;

                }

                if ( ! $user_login.val() ) {

                    NC.alert( '아이디를 입력해 주세요.' );
                    return false;

                }

                if ( ! $phone.val() ) {

                    NC.alert( '휴대폰번호를 입력해 주세요.' );
                    return false;

                }

                if ( ! reg_phone.test( $phone.val() ) ) {

                    NC.alert( '유효한 휴대폰번호를 입력해 주세요.' );
                    return false;

                }

                if ( ! $code.val() ) {

                    NC.alert( '인증번호를 입력해 주세요.' );
                    return false;

                }

                if ( ! $( '.nc_frm__data-auth-complete', $form ) ) {

                    NC.alert( '휴대폰 인증을 완료해 주세요.' );
                    return false;

                }

            } );

        }


        if ( $form.attr( 'id' ) == 'nc-find-password-form--mail' ) {

            $form.on( 'submit', function () {

                if ( ! $user_login || ! $mail ) {

                    NC.alert( '잘못된 접근입니다.', function () { location.reload(); } );
                    return false;

                }

                if ( ! $mail.val() ) {

                    NC.alert( '이메일을 입력해 주세요.' );
                    return false;

                }

                if ( ! reg_email.test( $mail.val().trim() ) ) {

                    NC.alert( '이메일 형식을 확인해주세요.' );
                    return false;

                }

            } );

        }


        if ( $form.attr( 'id' ) == 'nc-reset-pw-form' ) {

            $form.on( 'submit', function () {

                var chk_cnt     = 0;
                var $pwd        = $( '[name="reset[pwd]"]', $form );
                var $pwd_chk    = $( '[name="reset[pwd_chk]"]', $form );

                if ( ! $pwd || ! $pwd_chk ) {

                    NC.alert( '잘못된 접근입니다.', function () { location.reload(); } );
                    return false;

                }

                if ( ! $pwd.val() ) {

                    NC.alert( '비밀번호를 입력해 주세요.' );
                    return false;

                }

                if ( reg_eng.test( $pwd.val() ) ) chk_cnt++;
                if ( reg_num.test( $pwd.val() ) ) chk_cnt++;
                if ( reg_special.test( $pwd.val() ) ) chk_cnt++;


                if ( chk_cnt < 2 || $pwd.val().trim().length < 10 || $pwd.val().trim().length > 20 ) {

                    NC.alert( '영문, 숫자를 조합해 10~20자 이내로 입력해 주세요.' );
                    return false;

                }


                if ( ! $pwd_chk.val() ) {

                    NC.alert( '비밀번호를 한번 더 입력해 주세요.' );
                    return false;

                }


                if ( $pwd.val() !== $pwd_chk.val() ) {

                    NC.alert( '비밀번호가 일치하지 않습니다.' );
                    return false;

                }

            } );

        }

    }



    function member_edit_actions() {

        var $form = $( '#nc_frm-mypage-edit-step-02' );

        if ( $form.length == 0 ) return;


        var $phone  = $( '#field_tel', $form );
        var $code   = $( '#field_code', $form );
        if ( $phone.length > 0 ) {

            $phone.on( 'input change', function () {

                var $this   = $( this );
                var $wrap   = $this.closest( '.nc_frm__data' ).find( '.nc_frm__data--auth' );

                if ( $( '.nc_frm__data-auth-complete', $wrap ).length > 0 ) {

                    $code.val( '' );

                    $( '.nc_frm__data-auth-group--tel .nc_frm__data-auth-complete', $wrap ).remove();
                    $( '.nc_frm__data-auth-group--code', $wrap ).hide();
                    $( '.nc_frm__data-auth-group--tel button', $wrap ).prop( 'disabled', false );
                    $( '.nc_frm__data-auth-group--code button', $wrap ).prop( 'disabled', false );

                }

            } );

            $form.find( '.nc_frm__data-auth-group--tel button' ).on( 'click', function () {
				
			    var $this       = $( this );
                var $wrap       = $this.closest( '.nc_frm__data--auth' );
                var $code_wrap  = $code.closest( '.nc_frm__data-auth-group--code' );
                var phone       = $phone.val().trim();

                $code.val( '' );
                $code_wrap.hide();

                if ( phone.length == 0 ) {

                    NC.alert( '휴대폰번호를 입력해 주세요.', function () { $phone.focus(); } );
                    return false;

                }

                if ( ! reg_phone.test( phone ) ) {

                    NC.alert( '유효한 휴대폰번호를 입력해 주세요.', function () { $phone.focus(); }  );
                    return false;

                }

                if ( reg_phone.test( $phone.data( 'origin' ) ) ) {

                    if ( phone.replace( /-/g, '' ) == $phone.data( 'origin' ).replace( /-/g, '' ) ) {

                        NC.alert( '변경하실 휴대폰번호를 입력해 주세요.', function () { $phone.focus(); } );
                        return false;

                    }

                }

                if ( $phone.data( 'origin' ) ) {

                    $.post( './phone_change.php', { data: phone, user_id: $( '#field_name' ).val() }, function ( res ) {

                        if ( res.result != true ) {

                            var $tmp_wrap = $this.closest( '.nc_frm__data' );

                         //   if ( $tmp_wrap.length > 0 ) {

                         //       $tmp_wrap.addClass( 'nc_frm__data--error' );
                                //NC.alert( '전화번호가 변경되었습니다.' );
								
														  NC.alert(
                                    ( '전화번호가 변경되었습니다.'),
                                    function () {
                                      location.reload();
                                    }
                                );	
								
								
								
								
								

                         //   }
                            return false;

                        } else {
                             //NC.alert( '전화번호가 변경되었습니다.' );   
                            //send_auth( phone, $code_wrap );
							NC.alert(res.ResultMsg );

                        }

                    } );

                } else {

                    $.post( './phone_change.php', { data: phone, user_id: $( '#field_name' ).val() }, function ( res ) {

                        if ( res.result==true ) {

                            var $tmp_wrap = $this.closest( '.nc_frm__data' );

                            if ( $tmp_wrap.length > 0 ) {

                                $tmp_wrap.addClass( 'nc_frm__data--error' );
                                NC.alert( '이미 등록된 휴대폰번호 입니다.' );

                            }

                        } else {

                            NC.alert( '전화번호가 변경되었습니다.' );   

                        }
                    } );

                }

                function send_auth( phone, $code_wrap ) {

                    $.get( '/auth/phone/get', { phone: phone }, function ( res ) {

                        if ( res.result ) {

                            $code_wrap.show();

                            // TIMER START
                            cert_time   = 0;
                            clearInterval( cert_timer );

                            cert_timer  = setInterval( function () {

                                if ( cert_time < 1800 ) {

                                    var min = 29 - Math.floor( cert_time / 60 );
                                    var sec = 59 - Math.floor( cert_time % 60 );

                                    $( '.nc_frm__data-auth-limit', $code_wrap ).text( min.toLocaleString( 'en-US', { minimumIntegerDigits: 2, useGrouping: false } ) + ':' + sec.toLocaleString( 'en-US', { minimumIntegerDigits: 2, useGrouping: false } ) );

                                } else {

                                    clearInterval( cert_timer );
                                    $( '.nc_frm__data-auth-limit', $code_wrap ).text( '인증만료' );

                                }
                                cert_time++;

                            }, 1000 );

                        } else {

                            NC.alert( res.data ? res.data : '인증번호 발송 중 오류가 발생했습니다.<br />잠시 후 다시 시도해주세요.' );
                            return false;

                        }
                    } );


                }

                return false;

            } );

            $form.find( '.nc_frm__data-auth-group--code button' ).on( 'click', function () {

                var $this   = $( this );
                var $wrap   = $this.closest( '.nc_frm__data--auth' );
                var phone   = $phone.val().trim();
                var code    = $code.val().trim();

                if ( phone.length == 0 ) {

                    NC.alert( '휴대폰번호를 입력해주세요.', function () { $phone.focus(); } );
                    return false;

                }

                if ( ! reg_phone.test( phone ) ) {

                    NC.alert( '유효한 휴대폰번호를 입력해 주세요.', function () { $phone.focus(); }  );
                    return false;

                }

                if ( code.length == 0 ) {

                    NC.alert( '인증번호를 입력해주세요.', function () { $phone.focus(); } );
                    return false;

                }

                $.get( '/auth/phone/check', { phone: phone, code: code }, function ( res ) {

                    if ( res.result ) {

                        var url     = $form.data( 'ajax' );
                        var data    = {
                                        action              : 'member_edit',
                                        'member-edit-nonce' : $form.find( '[name="member-edit-nonce"]' ).val(),
                                        phone               : $phone.val(),
                                        code                : $code.val()
                                    };

                        $.post( url, data, function ( res ) {

                            NC.alert( '인증되었습니다.', function () {

                                location.reload();

                            } );
                            clearInterval( cert_timer );

                        } );

                    } else {

                        NC.alert( '인증에 실패했습니다.<br />인증번호를 다시 확인 해주세요.' );
                        return false;

                    }

                } );


                return false;

            } );


        }


        var $pwd        = $( '#field_pwd', $form );
        var $pwd_new    = $( '#field_pwd_new', $form );
        var $pwd_chk    = $( '#field_pwd_chk', $form );

        if ( $pwd.length > 0 && $pwd_new.length > 0 && $pwd_chk.length > 0 ) {

            var $pwd_wrap = $pwd.closest( '.nc_frm__data' );

            $pwd_wrap.on( 'click', '.nc_frm__field-btn--edit', function () {

                var $this = $( this );

                $this.removeClass( 'nc_frm__field-btn--edit' );
                $this.addClass( 'nc_frm__field-btn--cancel' );
                $this.find( 'span' ).text( '취소' );

                $pwd_wrap.find( '.pwd_edit_wrap' ).show();

                return false;

            } );

            $pwd_wrap.on( 'click', '.nc_frm__field-btn--cancel', function () {

                var $this = $( this );

                $this.removeClass( 'nc_frm__field-btn--cancel' );
                $this.addClass( 'nc_frm__field-btn--edit' );
                $this.find( 'span' ).text( '수정' );

                $pwd.val( '' );
                $pwd_new.val( '' );
                $pwd_chk.val( '' );

                $pwd_wrap.find( '.pwd_edit_wrap' ).hide();

                return false;

            } );

            $( '.pwd_edit_wrap a', $pwd_wrap ).on( 'click', function () {

                if ( $pwd.val() && $pwd_new.val() && $pwd_chk.val() ) {

                    var chk_cnt = 0;
                    if ( reg_eng.test( $pwd_new.val() ) ) chk_cnt++;
                    if ( reg_num.test( $pwd_new.val() ) ) chk_cnt++;
                    if ( reg_special.test( $pwd_new.val() ) ) chk_cnt++;
					if ( regexNo.test(  $pwd_new.val() ) ) tmp_cnt++;

                    if ( chk_cnt > 1 && $pwd_new.val().length >= 10 && $pwd_new.val().length <= 20 ) {



           if (!regexNo.test($pwd_new.val())) {
                if (!stck( $pwd_new.val() , 3)) {
                    
            NC.alert({
				title    : '연속된 3자리 문자는 사용할 수 없습니다.',
				message  : ''
			});

                   return false;
                }
            }
            else {
		      NC.alert({
				title    : '3개 이상의 동일한 문자는 사용할 수 없습니다.',
				message  : ''
			});

                                 return false;
            }


                        if ( $pwd_new.val() === $pwd_chk.val() ) {

                            var url     = './pwd_change.php';
                            var data    = {
                                            action              : 'pwd_change',
                                            pwd                 : $pwd.val(),
                                            pwd_new             : $pwd_new.val(),
                                            pwd_chk             : $pwd_chk.val()
                                        };

                            $.post( url, data, function ( res ) {
								
									if(res.ResultCode==-30){

                                  
		      NC.alert({
				title    : '비밀번호가 일치하지 않습니다.',
				message  : ''
			});

									}else if(res.ResultCode==-10){

                                  
           NC.alert({
				title    : '비밀번호변경실패',
				message  : ''
			});


									}else if(res.ResultCode==-20){

                                  
           NC.alert({
				title    : '현재와 동일한 비밀번호는 사용할수 없습니다.',
				message  : ''
			});


									}else if(res.ResultCode==1){
										
							/*	  NC.alert(
                                    ( '비밀번호가 변경되었습니다.'),
                                    function () {
                                      location.reload();
                                    }
                                );		*/

              NC.alert({
				title    : '비밀번호가 변경되었습니다.',
				message  : '',
				is_confirm : false,
				on_confirm  : function(){
               
			 location.reload();
	        
				}
			});


				}



                            } );

                        } else {

                          
           NC.alert({
				title    : '비밀번호가 일치하지 않습니다.',
				message  : ''
			});

                        }

                    } else {

          

           NC.alert({
				title    : '영문, 숫자를 조합 10~20자 이내로 입력해 주세요.',
				message  : ''
			});

                    }

                } else {
                          
           NC.alert({
				title    : '비밀번호를 입력해주세요.',
				message  : ''
			});


                }

                return false;


            } );

        }



   /*     $( '#field_marketing_sms', $form ).on( 'ifChanged', function () {

            var url     = $form.data( 'ajax' );
            var data    = {
                            action              : 'member_edit',
                            marketing_sms       : ( $( this ).is( ':checked' ) ? 'Y' : 'N' )
                        };

            $.post( url, data, function ( res ) {

                NC.alert( res.success ? 'SMS 수신동의 설정이 변경되었습니다.' : res.data );

            } );

        } );*/

   $( '#nc_frm-mypage-edit-step-02' ).on( 'submit', function () {
 
         
	   
            var $form       = $( '#nc_frm-mypage-edit-step-02' );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );
            $target = $( '[name="member_birth"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '생년월일을 입력해 주세요.' );

            }
			var rsult="";	  
            var $form   = $( 'form#nc_frm-mypage-edit-step-02' );
			var url     = './member_edit_proc.php';
            var data    =  $( 'form#nc_frm-mypage-edit-step-02' ).serialize();
			

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == 0 ) {



      NC.alert( {
				title :  '회원정보가 변경되었습니다.',
                message     : '',
                is_confirm  :false,
                ok          : '확인',
                on_confirm  : function () {

                         location.reload();
				},is_cancel : function(){

				}
	  });

                } else {

                    NC.alert( res.Msg );

                }

            });

			 
			   return false;	
           

                //return false;

            });

       

    }



    function member_withdraw_actions() {

        var $form = $( '#nc-withdraw-form' );

        if ( $form.length == 0 ) return;

     


        $form.on( 'submit', function () {

            var $form = $( this );
            var $target;

                   
			$target = $( '[name="member_pwd"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                  NC.alert( {
				title :  '비밀번호를 입력해주세요.',
                message     : ''
				  });




				return false;

            } 

            $target = $( '[name="withdraw_agree"]:checked' );
            if ( $target.length == 0 ) {

                  NC.alert( {
				title :  '회원 탈퇴에 동의해 주세요.',
                message     : ''
				  });


                return false;

            }

            $target = $( '[name="withdraw_privacy"]:checked' );
            if ( $target.length == 0 ) {

    
                  NC.alert( {
				title :  '개인정보 처리에 동의해 주세요.',
                message     : ''
				  });
				
				return false;

            }

            NC.alert( {
				title :  '탈퇴 시, 회원정보가 삭제됩니다.',
                message     : '정말 회원탈퇴를 하시겠습니까?',
                is_confirm  : true,
                ok          : '회원탈퇴',
                on_confirm  : function () {
            
			var rsult="";	
            var $form   = $( 'form#nc-withdraw-form' );
			var url     = './m_withdraw_proc.php';
            var data    = {
                                            action              : 'm_withdraw_proc',
                                            member_pwd                 : $('[name="member_pwd"]').val()
                                        };
			

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == 0 ) {


					                    NC.alert({
											    title :  '회원탈퇴 처리가 완료되었습니다.',
                                                message    : '그동안 예약 서비스를 이용해주셔서 감사합니다.',
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													    rsult += "<form name='form1' method='post' action='"+res.link+"'>";
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });	

                } else {

                    NC.alert( res.Msg );

                }

            });

			 
			   return false;	

                            }
            } );

            if ( $form.data( 'agree' ) == 'yes' ) {

                return true;

            }

            return false;

        } );

    }




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
           
            }else{
			
           	
			 //$target.textbox.readOnly = false;	
			}	

            $target = $( '[name="member_pwd"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 입력해 주세요.' );

            } 

            var pwd = $target.val().trim();
            
			

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
		   //$('[name="member_pwd"]').val(sha256($('[name="member_pwd"]').val()));
	     	//$form.$('[name="member_pwd"]').value = '';
		    
			//console.log($('[name="member_pwd"]').val());
			
			
			//alert('test');
			
			//return false;

  
			var rsult="";	  
            var $form   = $( 'form#nc-login-form' );
			
            var url     = './login_check.php';
            //var data    =  $( 'form#nc-login-form' ).serialize();
			var data    =  {'chg':$('[name="chg"]').val(),'sales_code':$('[name="sales_code"]').val(),'s_code':$('[name="s_code"]').val(),'g_code':$('[name="g_code"]').val(),'b_code':$('[name="b_code"]').val(),'month_qty':$('[name="month_qty"]').val(),'unit_price':$('[name="unit_price"]').val(),'member_id':$('[name="member_id"]').val(),'member_t_id':$('[name="member_t_id"]').val(),'member_pwd':$('[name="member_pwd"]').val(),'auto_login':$('[name="auto_login"]').val(),'saved_id':$( '#saved_id' ).is( ':checked' ) ? 'Y' : 'N','url':$('[name="url"]').val(),'medit_link':$('[name="medit_link"]').val(),'ntype':$('[name="ntype"]').val()};
		

           $.post( url, data, function ( res ) {
				   
               //console.log('11');

                   if ( res.ResultCode == 0 ) {
                    //NC.alert( res.links );
             		//location.href = res.links;
					//NC.alert( res.ResultMsg );
					   
					      if ( res.RCode == 4 ) {

                            NC.alert({
			             	title    : res.Msg,
				            message  : res.Msg2
			                });


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
                                                      
														if($('[name="chg"]').val()!=''){

                                                        location.href='/mypage/m_edit_step_02.php';

														}else{
                                                       
													   if(res.ntype=='1'){
														
														rsult += "<form name='form1' method='post' action='"+res.links+"/mypage/index.php?center_id="+res.center_id+"'>";
														//rsult += "<input type='hidden' name='center_id' value='"+res.center_id+"'>";	
		                                                rsult += "</form>"; 	 
									                        
													   }else{

														rsult += "<form name='form1' method='post' action='"+res.links+"/?center_id="+res.center_id+"'>";
														//rsult += "<input type='hidden' name='center_id' value='"+res.center_id+"'>";	
		                                                rsult += "</form>"; 	

													   }
									                  
                                                        $(rsult).appendTo('body').submit();
														}
						  }

					   
					   
					                /*    NC.alert({
                                                message    : res.Msg,
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
													self.loaction=res.link;
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					                */

           
                  return false;

                }else if( res.ResultCode == -30 || res.ResultCode == -20){
					
                       if ( res.RCode == 3 || res.Rcode==5 ) {
                        
               NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});


					   }else{
						   
console.log('2');
           
               NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});


					   }          


					         return false;
					
				} else {

               
            NC.alert({
				title    : res.Msg,
				message  : ''
			});

                          return false;
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



    member_login_submit2();


    function member_login_submit2() {

        $( '#nc-login-form2, #modal_page_content #nc-login-form2' ).on( 'submit', function () {
 
         
	
		  
     
            var $form       = $( '#nc-login-form2' );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="member_id"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '아이디를 입력해 주세요.' );
           
            }else{
			
           	
			 //$target.textbox.readOnly = false;	
			}	

            $target = $( '[name="member_pwd"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '비밀번호를 입력해 주세요.' );

            } 

            var pwd = $target.val().trim();
            
			

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
		   //$('[name="member_pwd"]').val(sha256($('[name="member_pwd"]').val()));
	     	//$form.$('[name="member_pwd"]').value = '';
		    
			//console.log($('[name="member_pwd"]').val());
			
			
			//alert('test');
			
			//return false;

  
			var rsult="";	  
            var $form   = $( 'form#nc-login-form2' );
			
            var url     = './login_check.php';
            //var data    =  $( 'form#nc-login-form' ).serialize();
			var data    =  {'sales_code':$('[name="sales_code"]').val(),'s_code':$('[name="s_code"]').val(),'g_code':$('[name="g_code"]').val(),'b_code':$('[name="b_code"]').val(),'month_qty':$('[name="month_qty"]').val(),'unit_price':$('[name="unit_price"]').val(),'member_id':$('[name="member_id"]').val(),'member_t_id':$('[name="member_t_id"]').val(),'member_pwd':$('[name="member_pwd"]').val(),'auto_login':$('[name="auto_login"]').val(),'saved_id':$( '#saved_id' ).is( ':checked' ) ? 'Y' : 'N','url':$('[name="url"]').val(),'medit_link':$('[name="medit_link"]').val()};
		

           $.post( url, data, function ( res ) {
				   
               //console.log('11');

                   if ( res.ResultCode == 0 ) {
                    //NC.alert( res.links );
             		//location.href = res.links;
					//NC.alert( res.ResultMsg );
					   
					      if ( res.RCode == 4 ) {

                            NC.alert({
			             	title    : res.Msg,
				            message  : res.Msg2
			                });


						  }else{

                                                       
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
													

													  //location.href='/NC_Noble2/';
						  }

					   
					   
					                /*    NC.alert({
                                                message    : res.Msg,
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
													self.loaction=res.link;
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					                */

           
                  return false;

                }else if( res.ResultCode == -30 || res.ResultCode == -20){
					
                       if ( res.RCode == 3 || res.Rcode==5 ) {
                        
               NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});

				console.log('1');

					   }else{
						   
console.log('2');
           
               NC.alert({
				title    : res.Msg,
				message  : res.Msg2
			});


					   }          


					         return false;
					
				} else {

               
            NC.alert({
				title    : res.Msg,
				message  : ''
			});

                          return false;
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

        $( '#nc-login-form2 [name*=member]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );




member_id_search();


    function member_id_search() {

        $( '#nc_frm_id_search' ).on( 'submit', function () {
 
         
	
		  
     
            var $form       = $( '#nc_frm_id_search' );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="mem_phone"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '연락처(전화)를 입력해 주세요.' );
           
            }else{
			
           	
			 //$target.textbox.readOnly = false;	
			}	

            $target = $( '[name="mem_name"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '이름을 입력해 주세요.' );

            } 

            var pwd = $target.val().trim();
            
			

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
		   //$('[name="member_pwd"]').val(sha256($('[name="member_pwd"]').val()));
	     	//$form.$('[name="member_pwd"]').value = '';
		    
			//console.log($('[name="member_pwd"]').val());
			
			
			//alert('test');
			
			//return false;
			var rsult="";	  
            var $form   = $( 'form#nc_frm_id_search' );
			
            var url     = './id_search_check.php';
            //var data    =  $( 'form#nc-login-form' ).serialize();
			var data    =  {'mem_name':$('[name="mem_name"]').val(),'mem_phone':$('[name="mem_phone"]').val()};
		

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == 0 ) {

             		//location.href = res.links;
					NC.alert( res.ResultMsg );
					   
					   
					   
					                /*    NC.alert({
                                                message    : res.Msg,
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
													self.loaction=res.link;
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					                */

           
                  

                } else if ( res.ResultCode == 1 ) {

             		//location.href = res.links;
					NC.alert('회원님의 아이디는 <span>'+ res.Member_ID + '</span>입니다.');
					   
					   
					   
					                /*    NC.alert({
                                                message    : res.Msg,
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
													self.loaction=res.link;
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					                */

           
                  

                } else {

                    NC.alert( res.Msg );

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

        $( '#nc_frm_id_search [name*=mem]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );



member_pwd_search();


    function member_pwd_search() {

        $( '#nc_frm_pwd_search' ).on( 'submit', function () {
 
         
	
		  
     
            var $form       = $( '#nc_frm_pwd_search' );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="mem_id"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '아이디를 입력해 주세요.' );

            }


            $target = $( '[name="mem_phone"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '연락처(전화)를 입력해 주세요.' );
           
            }else{
			
           	
			 //$target.textbox.readOnly = false;	
			}	

            $target = $( '[name="mem_name"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '이름을 입력해 주세요.' );

            } 

            var pwd = $target.val().trim();
            
			

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
		   //$('[name="member_pwd"]').val(sha256($('[name="member_pwd"]').val()));
	     	//$form.$('[name="member_pwd"]').value = '';
		    
			//console.log($('[name="member_pwd"]').val());
			
			
			//alert('test');
			
			//return false;
			var rsult="";	  
            var $form   = $( 'form#nc_frm_pwd_search' );
			
            var url     = './pwd_search_check.php';
            //var data    =  $( 'form#nc-login-form' ).serialize();
			var data    =  {'mem_id':$('[name="mem_id"]').val(),'mem_name':$('[name="mem_name"]').val(),'mem_phone':$('[name="mem_phone"]').val()};
		

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == -30 ) {

             		//location.href = res.links;
					NC.alert( res.ResultMsg );
					   
					   
					   
					                /*    NC.alert({
                                                message    : res.Msg,
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
													self.loaction=res.link;
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					                */

           
                  

                } else if ( res.ResultCode == -10 ) {

             		  NC.alert( res.Msg );
           
                  

                }else if ( res.ResultCode == 1 ) {

                       		//location.href = res.links;
					//NC.alert('회원님의 비밀번호는 <span>'+ res.New_Pw + '</span>입니다.');
					   
					   
					   
					       NC.alert({
				title    : '비밀번호가 변경되었습니다.',
				message  : '회원님의 비밀번호는 <span>'+ res.New_Pw + '</span>입니다.',
				ok       : '예',
				cancel   : '아니오',
				button_icon : false,
				is_confirm : false,
				on_confirm  : function(){
               
			    //location.href="../s_member/login.php?chg=N";
	        

                                                        rsult += "<form name='form1' method='post' action='../s_member/login.php'>";
														rsult += "<input type='hidden' name='chg' value='N'>";	
					                                    rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();


				},
               on_cancel  : function(){
               self.close;
	        
				},
			});


                } else {

                    NC.alert( res.Msg );

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

        $( '#nc_frm_pwd_search [name*=mem]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );





member_search();


    function member_search() {

        $( '#nc_frm_member_search' ).on( 'submit', function () {
 
         
	
		  
     
            var $form       = $( '#nc_frm_member_search' );
            var $target, $error;

            $( '.nc_frm__error' ).remove();
            $( '.nc_frm__data' ).removeClass( 'nc_frm__data--error' );

            $target = $( '[name="mem_phone"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '연락처(전화)를 입력해 주세요.' );
           
            }else{
			
           	
			 //$target.textbox.readOnly = false;	
			}	

            $target = $( '[name="mem_name"]', $form );
            if ( $target.length == 0 || $target.val().length == 0 ) {

                err_msg( $target, '이름을 입력해 주세요.' );

            } 


          $target = $( '[name="mem_birth"]', $form );
            if (  !(reg_num.test($target.val())) ) {

                err_msg( $target, '생년월일은 숫자만 입력 가능합니다.' );

            } 

           	 if ($target.val().length < 8 ) {

				 err_msg( $target, '생년월일은 8자리 입력하시기 바랍니다.' );


			 }


            var pwd = $target.val().trim();
            
			

            if ( $error ) {

                $( 'html, body' ).animate( { scrollTop: $error.offset().top - 170 } );
                return false;

            } else if ( $( '.nc_frm__data--error', $form ).length > 0 ) {

                $( 'html, body' ).animate( { scrollTop: $( '.nc_frm__data--error:first', $form ).offset().top - 170 } );
                return false;

            } else {
				
		   //$('[name="member_pwd"]').val(sha256($('[name="member_pwd"]').val()));
	     	//$form.$('[name="member_pwd"]').value = '';
		    
			//console.log($('[name="member_pwd"]').val());
			
			
			//alert('test');
			
			//return false;
			var rsult="";	  
            var $form   = $( 'form#nc_frm_member_search' );
			
            var url     = './member_search_check.php';
            //var data    =  $( 'form#nc-login-form' ).serialize();
			var data    =  {'mem_name':$('[name="mem_name"]').val(),'mem_phone':$('[name="mem_phone"]').val(),'mem_birth':$('[name="mem_birth"]').val()};
		

           $.post( url, data, function ( res ) {

                   if ( res.ResultCode == 0 ) {

             		//location.href = res.links;
					

                                     NC.alert({
									            title    : "회원정보가 존재합니다.",
                                                message    : "온라인 회원가입을 진행하시겠습니까?",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
													
													  //location.href='../s_member/m_join_step_01.php';

                                                        rsult += "<form name='form1' method='post' action='../s_member/m_join_step_02.php'>";
														rsult += "<input type='hidden' name='member_division' value='1'>";	
														rsult += "<input type='hidden' name='member_code'  value='"+res.member_code+"'>";	
											            rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();

                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });

           
                  

                } else if ( res.ResultCode == 1 ) {

             					   
					   
					              NC.alert({
									            title    : "일치하는 회원정보가 존재하지 않습니다.",
                                                message    : "온라인 회원가입을 진행하시겠습니까?",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
													
													location.href='../s_member/m_join.php';
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					               

           
                  

                }else if ( res.ResultCode == 2 ) {

              
					   
					              NC.alert({
									            title    : "일치하는 회원정보가 2건이상 존재합니다.",
                                                message    : "안내데스크로 문의해주시기 바랍니다.",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : false,
					                            on_confirm : function(){
													
													//self.loaction=res.link;
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					               

           
                  

                }else if ( res.ResultCode == 3 ) {

              
					   
					              NC.alert({
									            title    : "이미 가입된 정보가 있습니다.",
                                                message    : "로그인을 진행하시겠습니까?",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
													
										

                                                        rsult += "<form name='form1' method='post' action='../s_member/login.php'>";
														rsult += "<input type='hidden' name='member_id'  value='"+res.member_id+"'>";	
											            rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();

                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					               

           
                  

                }else if ( res.ResultCode == 4 ) {

              
					   
					              NC.alert({
									            title    : "이미 가입된 정보가 있습니다.",
                                                message    : "로그인을 진행하시겠습니까?",
				                                ok : '예',
                                                cancel : '아니오',
                  	                            is_confirm : true,
					                            on_confirm : function(){
													
			                                            rsult += "<form name='form1' method='post' action='../s_member/login.php'>";
														rsult += "<input type='hidden' name='member_id'  value='"+res.member_id+"'>";	
											            rsult += "</form>"; 	 
									 
                                                        $(rsult).appendTo('body').submit();
                            
                                                 }, on_cancel : function(){
                                  
                 
                                                 }  });
					               

           
                  

                } else {

                    NC.alert( res.Msg );

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

        $( '#nc_frm_member_search [name*=mem]' ).on( 'focus', function () {
           
            var $this   = $( this );
            var $wrap   = $this.closest( '.nc_frm__data' );

            $wrap.removeClass( 'nc_frm__data--error' );
            $wrap.find( 'p.nc_frm__error' ).remove();
            $wrap.find( '.nc_frm-message' ).hide();
             return false;
        } );





//14세미만//
  $('.agreement-form .nc_frm__action').on('click',function(e){

     if($("input[name=agree2]").prop('checked')==false && $("input[name=agree3]").prop('checked')==false){
			
		 
		       NC.alert({
				title    : '필수항목을 체크해 주세요.',
				message  : ''
			});


          return false;
			
	 }else if($("input[name=agree2]").prop('checked')==true && $("input[name=agree3]").prop('checked')==false){
			
		   NC.alert({
				title    : '필수항목을 체크해 주세요.',
					message  : '개인정보 수집 및 이용 동의를 선택해 주세요.'
			});
          return false;
			
	 }else if($("input[name=agree2]").prop('checked')==false && $("input[name=agree3]").prop('checked')==true){
			
	   NC.alert({
				title    : '필수항목을 체크해 주세요.',
				message  : '이용약관 동의를 선택해 주세요.'
			});
          return false;
			
	 }else{
	     //NC.alert( '필수항목을 체크완료.');
	     var pageTypeParam = "pageType=register";
         var type=""
		 var params = "";
		 var center_id = $("input[name=scenter_id]").val();
	     var request_url = "";
  
		if(!cert_confirm()) return false;
        params = "?" + pageTypeParam;
        
		//document.location.href='./m_join_step_01.php';
		//return false;
				

       var domain = location.origin;


        certify_win_open("nice-hp", domain +"/plugin/nice/checkplus_form.php?child=1&center_id="+center_id);
        return false;
 
	
     } 		 

    });

 $('.agreement-form .nc_frm__action2').on('click',function(e){

     if($("input[name=agree2]").prop('checked')==false && $("input[name=agree3]").prop('checked')==false){
			
		 
			    NC.alert({
				title    : '필수항목을 체크해 주세요.',
				message  : ''
			});


          return false;
			
	 }else if($("input[name=agree2]").prop('checked')==true && $("input[name=agree3]").prop('checked')==false){
			
		   NC.alert({
				title    : '필수항목을 체크해 주세요.',
					message  : '개인정보 수집 및 이용 동의를 선택해 주세요.'
			});
          return false;
			
	 }else if($("input[name=agree2]").prop('checked')==false && $("input[name=agree3]").prop('checked')==true){
			
	   NC.alert({
				title    : '필수항목을 체크해 주세요.',
				message  : '이용약관 동의를 선택해 주세요.'
			});
          return false;
			
	 }else{
	     //NC.alert( '필수항목을 체크완료.');
	     var pageTypeParam = "pageType=register";
         var type=""
		 var params = "";
		 var center_id = $("input[name=scenter_id]").val();
	     var request_url = "";
  
		if(!cert_confirm()) return false;
        params = "?" + pageTypeParam;
        
		//document.location.href='./m_join_step_01.php';
		//return false;
				

        var domain = location.origin;
	


        certify_win_open("nice-hp", domain +"/plugin/nice/checkplus_form.php?center_id="+center_id,'');
        return false;
 
	   //document.location.href='./m_join_step_01.php';
		//return false;
     } 		 

    });

    function check_unload_when_form_exists() {


        if ( $( '#nc_frm-register' ).length > 0 ) {

            $( window ).on( 'beforeunload', function ( e ) {

                var message = '입력된 정보가 초기화됩니다.\n회원가입을 그만하시겠습니까?';
                if (typeof event == 'undefined') {
                    event = window.event;
                }
                if (event) {
                    event.returnValue = message;
                }
                return message;

            } );

        }

        if ( $( '#nc-reset-pw-form' ).length > 0 ) {

            $( window ).on( 'beforeunload', function ( e ) {

                var message = '비밀번호 변경을\n그만하시겠습니까?';
                if (typeof event == 'undefined') {
                    event = window.event;
                }
                if (event) {
                    event.returnValue = message;
                }
                return message;

            } );

        }
    }

}); 