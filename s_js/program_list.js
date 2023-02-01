
var program_load = false;

jQuery(function($) {


program_code_init();
//program_ostatus();
program_pagination();

//smooth_scroll();
function is_mob(){
	return (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera);
}

function is_mac(){
	return navigator.platform.indexOf('Mac') > -1;
}

function is_chrome(){
	return /Chrome/.test(navigator.userAgent);
}

function is_firefox(){
	return /Firefox/.test(navigator.userAgent);
}

function smooth_scroll(){

    if($('html').hasClass('mobile') || $('html').hasClass('mac') || $('html').hasClass('ff')) return;


    if($('body').hasClass('post-search')){
        return;
    }

	var $window = $(window);

    if(smooth_scroll_passive()){
        window.addEventListener("wheel",smooth_scroll_scrolling,{passive: false});
    }else{
        $window.on("mousewheel DOMMouseScroll", smooth_scroll_scrolling);
    }

}

function smooth_scroll_passive(){

    var supportsPassive = false;
    try {
        document.addEventListener("test", null, { get passive() { supportsPassive = true }});
    } catch(e) {}

    return supportsPassive;

}

function smooth_scroll_scrolling(event){

	event.preventDefault();

    var $window = $(window);
	var scrollTime = 1;
	var scrollDistance = $window.height() / 2.5;
	var delta = 0;

    if(smooth_scroll_passive()){
	    delta = event.wheelDelta/120 || -event.originalEvent.detail/3;
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





// program_category_init();

	program_category_init();
	
	function program_category_init() {

 

         $('.program_form').on( 'click', '.nc_program_select-refresh', function () {

            var $form = $( this ).closest( 'form' );
            var $target = $( this );
		    $(".nc_selectric_area").removeClass( 'on' );
			$( '#z_center', $form ).val('');
			$( '#z_center_idx', $form ).val('');
            $( '#z_gcode_idx', $form ).val('');
			$( '#z_scode_idx', $form ).val('');
			$( '#z_bcode_idx', $form ).val('');			
			$( '#z_scode', $form ).val('');
			$( '#z_gcode', $form ).val('');
            $( '#z_gcode_idx2', $form ).val('');
			$( '#z_scode_idx2', $form ).val('');
			$( '#z_bcode_idx2', $form ).val('');			
			$( '#cc_id', $form ).val('');
            $( '#s_codex', $form ).val('');
			$( '#g_codex', $form ).val('');
            $( '#u_codex', $form ).val('');
			$( '#z_scode_idx3', $form ).val('');
            $( '#z_gcode_idx3', $form ).val('');
			$( '#z_jcode', $form ).val('');
			$( '#tscode', $form ).val('');
			$( '#tgcode', $form ).val('');
			$( '#tucode', $form ).val('');
			$( '#tzcode', $form ).val('');
			$( '#tcode', $form ).val('');
			$( '#xcode', $form ).val('');
			$( '#z_bcode', $form ).val('');

             //console.log('reset')


            $( 'select[name=center_id]', $form ).val( '0' );
            $( 'select[name=s_code]', $form ).val( '0' );
            $( 'select[name=g_code]', $form ).val( '0' );
            $( 'select[name=b_code]', $form ).val( '0' );

             $( 'select[name=s_code]').find( 'option:not(:first)' ).remove();
             $( 'select[name=g_code]').find( 'option:not(:first)' ).remove();
			 $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();

            $( 'input[name=search]', $form ).val( '' );

           $( 'select[name=center_id]', $form ).selectric( 'refresh' );
           $( 'select[name=s_code]', $form ).selectric( 'refresh' );
           $( 'select[name=g_code]', $form ).selectric( 'refresh' );
		   $( 'select[name=b_code]', $form ).selectric( 'refresh' );
    

            $( this ).closest( 'form' ).trigger( 'submit' );

        //    jQuery('html,body').animate({
        //        scrollTop : $('.program_list_area').offset().top - $('#header').height()
        //    }, 800);

            return false;

        });



    }



    function program_ajax( url, callback_func ) {

        //$( '.nicescroll-rails' ).remove();


        $.get( url, function ( response ) {
    var $wrap = $( '#resetP', response );

           // $wrap.imagesLoaded( function () {

               $( '#resetP' ).replaceWith( $wrap );




if($('body').hasClass('home') && $("#cc_id").val() !=''){

                program_list_init2();
		         initTableScroll();

}else{

				 $( '#cc_id' ).val('');
				 	 $( '#s_codex' ).val('');
					  $( '#g_codex' ).val('');
					  $( '#u_codex' ).val('');
					  $( '#z_scode_idx3' ).val('');

 program_list_init();
  		 initTableScroll();
}

 program_pagination();
               //program_pagination();
                //window.history.pushState( null, null, url );

               // window.history.pushState( null, null, url );

                if ( callback_func ) {

                    callback_func();

                }

           // } );

        } );
    }
function initTableScroll() {
    
		
		defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
	    
	    
	}
    function program_pagination() {

 

            $( '#resetP' ).on( 'click', 'div.ds_pagination a', function () {

                program_ajax( $( this ).attr( 'href' ) );
                return false;

            } );



    }


 function program_reset() {

        $('.program_form').on( 'click', '.nc_program_select-refresh', function () {

            var $form = $( this ).closest( 'form' );
            var $target = $( this );

			$(".nc_selectric_area").removeClass( 'on' );

			$( '#z_center', $form ).val('');
			$( '#z_center_idx', $form ).val('');
            $( '#z_gcode_idx', $form ).val('');
			$( '#z_scode_idx', $form ).val('');
			$( '#z_bcode_idx', $form ).val('');			
			$( '#z_scode', $form ).val('');
			$( '#z_gcode', $form ).val('');
            $( '#z_gcode_idx2', $form ).val('');
			$( '#z_scode_idx2', $form ).val('');
			$( '#z_bcode_idx2', $form ).val('');
			$( '#cc_id', $form ).val('');
            $( '#s_codex', $form ).val('');
			$( '#g_codex', $form ).val('');
            $( '#u_codex', $form ).val('');
			$( '#z_scode_idx3', $form ).val('');
            $( '#z_gcode_idx3', $form ).val('');
			$( '#z_jcode', $form ).val('');
			$( '#tscode', $form ).val('');
			$( '#tgcode', $form ).val('');
			$( '#tucode', $form ).val('');
			$( '#tzcode', $form ).val('');
			$( '#tcode', $form ).val('');
			$( '#xcode', $form ).val('');
			$( '#z_bcode', $form ).val('');




            $( 'select[name=center_id]', $form ).val( '0' );
            $( 'select[name=s_code]', $form ).val( '0' );
            $( 'select[name=g_code]', $form ).val( '0' );
            $( 'select[name=b_code]', $form ).val( '0' );
             $( 'select[name=s_code]').find( 'option:not(:first)' ).remove();
             $( 'select[name=g_code]').find( 'option:not(:first)' ).remove();
             $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();
            $( 'input[name=search]', $form ).val( '' );

           $( 'select[name=center_id]', $form ).selectric( 'refresh' );
           $( 'select[name=s_code]', $form ).selectric( 'refresh' );
           $( 'select[name=g_code]', $form ).selectric( 'refresh' );
           $( 'select[name=b_code]', $form ).selectric( 'refresh' );

            $( this ).closest( 'form' ).trigger( 'submit' );

        //    jQuery('html,body').animate({
        //        scrollTop : $('.program_list_area').offset().top - $('#header').height()
        //    }, 800);

            return false;

		});

}
 function program_list_init() {






var result="";	
             

           //console.log('로딩시작');
           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");






     tmp_select_pcode = {
        'center_id'  : $( 'select[name=center_id]' ).val(),
        's_code' : $( 'select[name=s_code]' ).val(),
        'g_code'  : $( 'select[name=g_code]' ).val(),
		'b_code'  : $( 'select[name=b_code]' ).val()
                    };


        $.get( ajaxurl_T, { action: 'nc_all', programcode: $( '#z_center_idx' ).val(), center_id: $( 'select[name=center_id]' ).val(), s_code:$( 'select[name=s_code]' ).find(':selected').data('scode'), g_code:$( 'select[name=g_code]' ).find(':selected').data('gcode'), b_code:$( 'select[name=b_code]' ).val() , p_code:$( '#z_gcode' ).val() }, function ( response ) {




             if ( response.success ) {


                                   

                $( response.data ).each( function ( idx, data ) {




                   if (data.status=="1") {


                    

       
			             
                             }else{
                         




							 }






                    try {


       

  if (data.cntid ==''){
	    $('.nc_program_num').text('0');
    $('.noResult').css('display','block');
    $('#nc_program_list').css('display','none');
	$('.ds_pagination').css("display","none");
	
  }else if(data.tcnt2=='0'){	
    $('.nc_program_num').text('0');
    $('.noResult').css('display','none');
    $('#resetP').append('<div class="noResult"><p class="tit">센터 및 종목을 선택해 주세요.</p></div>');
    //$( 'select[name=s_code]').val( '' );
        // $( 'select[name=s_code]').selectric( 'refresh' );  
  //  $( 'select[name=s_code]').find( 'option:not(:first)' ).remove();
   $('#nc_program_list').css('display','none');
	$('.ds_pagination').css("display","none");
		 
  }else{

    if (data.cnt !=="0") {
     
/*
var myScroll = new IScroll('.new_scroll',{
    mouseWheel: true,
    scrollbars: false,
   scrollX: true,
	scrollY: false,
    snap: 'div>.c'
  });
  document.addEventListener('touchmove', function (e) { e.preventDefault(); }, true);
*/



	initTableScroll();

	 $('.noResult').css('display','none');
	  $('.nc_program_num').text(data.cnt2);
	 $('#nc_program_list').css('display','block');


 


	}else{
         
		 

		 
     $('.noResult').css('display','block');
     $('#nc_program_list').css('display','none');
	}


  }


//var $form = $( '.program_form' );

//$form.submit();

//    $( '[name="depart"], [name="cate"], [name="sort"]', $form ).on( 'change', function () {

 //       $form.submit();

  //  } );

 
//program_reset();


//$('div#resetP').append(result);


//program_reset();



                    } catch( e ) {

                  
   console.log('에러');

                    }














                } );

            }


        }, 'json' ).done(function() {




    //alert( "second success" );
  }).fail(function() {
 //alert( "error" );
  }).always(function() {
//alert( "finished" );
   // $(".loading-container").hide();
	//$(".map_bg").hide();
          
         jQuery('html,body').animate({
            scrollTop : $('.nc_program').offset().top - $('#header').height()-10
         }, 800);
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').css('display','none');
		   //console.log('로딩완료');
  });

    }


 function program_list_init2() {






var result="";	
             

           //console.log('로딩시작');
           $('#dbloading').css('display','block');
	       $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').addClass("on");
		   $('#dbloading').addClass("is-act");
		   $('#dbloading').addClass("is-deact");
		   $('#dbloading').find("is-act").css("display","block");
		   $('#dbloading').find("is-deact").css("display","block");
		   $('#dbloading').find("on").css("display","block");


$( 'select[name=center_id]' ).on( 'change', function () {

 $( '#z_scode' ).val('');
 $( '#z_gcode' ).val('');
 $( '#z_scode_idx' ).val('');
 $( '#z_gcode_idx' ).val('');
 $( '#z_bcode' ).val('');
 $( '#z_bcode_idx' ).val('');

 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');
            $( 'select[name=s_code]').val( '0' );
            $( 'select[name=g_code]').val( '0' );
            $( 'select[name=b_code]').val( '0' );
   // $( 'select[name=s_code]').prop('selectedIndex', 0).selectric('refresh');
	        $( 'select[name=s_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=s_code]' ).selectric( 'refresh' );
						
 });

$( 'select[name=s_code]' ).on( 'change', function () {

 $( '#z_gcode' ).val('');
 $( '#z_gcode_idx' ).val('');
 $( '#z_gcode_idx2' ).val('');
 $( '#z_bcode' ).val('');
 $( '#z_bcode_idx' ).val('');
 $( '#z_bcode_idx2' ).val('');
 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');
            $( 'select[name=g_code]').val( '0' );
            $( 'select[name=b_code]').val( '0' );
   // $( 'select[name=s_code]').prop('selectedIndex', 0).selectric('refresh');
   	        $( 'select[name=g_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=g_code]' ).selectric( 'refresh' );
	        $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=b_code]' ).selectric( 'refresh' );



 });
 
  $( 'select[name=g_code]' ).on( 'change', function () {
 $( '#z_bcode' ).val('');
 $( '#z_bcode_idx' ).val('');
 $( '#z_bcode_idx2' ).val('');

 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');
            $( 'select[name=b_code]').val( '0' );
   // $( 'select[name=s_code]').prop('selectedIndex', 0).selectric('refresh');
	        $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=b_code]' ).selectric( 'refresh' );

 });

     tmp_select_pcode = {
        'center_id'  : $( 'select[name=center_id]' ).val(),
        's_code' : $( 'select[name=s_code]' ).val(),
        'g_code'  : $( 'select[name=g_code]' ).val(),
	    'b_code'  : $( 'select[name=b_code]' ).val()	
                    };


$('.nc-selectric,.nc_selectric').selectric({
  maxHeight:500
});


        $.get( ajaxurl_T, { action: 'nc_all', programcode: $( '#cc_id' ).val(), center_id:$( '#cc_id' ).val(), s_code:$('#z_scode_idx').val(), g_code:$( '#z_gcode_idx').val() , b_code:$( '#b_code' ).val() }, function ( response ) {




             if ( response.success ) {


                        //console.log(response.tcnt);              


                $( response.data ).each( function ( idx, data ) {




                   if (data.status=="1") {


                    

       
			             
                             }else{
                         




							 }






                    try {



  


  if (data.cntid ==''){
	 $('.nc_program_num').text('0');
    $('.noResult').css('display','block');
    $('#nc_program_list').css('display','none');
  }else if(data.tcnt2=='0'){
	 $('.nc_program_num').text('0');
    $('.noResult').css('display','block');
    $('#nc_program_list').css('display','none');
  }else{

    if (data.cnt !=="0") {
     

	initTableScroll();



	 $('.noResult').css('display','none');
	  $('.nc_program_num').text(data.cnt2);
	 $('#nc_program_list').css('display','block');




	}else{

     $('.noResult').css('display','block');
     $('#nc_program_list').css('display','none');
	}


  }



                    } catch( e ) {

                  
   console.log('에러');

                    }














                } );

            }

      


        }, 'json' ).done(function() {




    //alert( "second success" );
  }).fail(function() {
 //alert( "error" );
  }).always(function() {
//alert( "finished" );
   // $(".loading-container").hide();
	//$(".map_bg").hide();
          
         //jQuery('html,body').animate({
         //   scrollTop : $('.nc_program').offset().top - $('#header').height()-10
         //}, 800);
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   $('#dbloading').css('display','none');
		  // console.log('로딩완료');
  });

    }







    var tmp_select_pcode = {
        'center_id'  : $( 'select[name=center_id]' ).val(),
        's_code' : $( 'select[name=s_code]' ).val(),
        'g_code'  : $( 'select[name=g_code]' ).val(),
		'b_code'  : $( 'select[name=b_code]' ).val()
    };







 nc_search_inline();

function nc_search_inline(){

	$('.nc-open-inline-search').each(function(){

		var $this = $(this);
		var target_id = $(this).attr('href');
		var $target  = $(target_id);
		var $target_field = $target.find('.nc-nav-search__input');

		$this.on('click',function(e){
			e.preventDefault();
			$target.toggle();
			$target_field.focus();
	    });

	})

}
 nc_header_search();

function nc_header_search(){

	$('.nc-header__button.nc-header__search').on('click',function(e){
		e.preventDefault();
	    var $form = $(this).closest('.nc-header').find('.nc-header-search__form');
		//$form.show();
		$form.addClass('active');
		setTimeout(function(){
			$form.find('.nc-header-search__input').focus();
		},100);
	});

	$('.nc-header-search__close').on('click',function(e){
		e.preventDefault();
		var $form =  $(this).closest('.nc-header-search__form');
		//$form.hide();
		$form.removeClass('active');
		setTimeout(function(){
			$form.find('.nc-header-search__input').blur();
		},100);

	})

}

nc_nav_search();

function nc_nav_search(){

	$('.nc-nav__search').on('click',function(){
	    var $form = $(this).closest('.nc-nav-header').find('.nc-nav-search__form');
		$form.show();
		$form.find('.nc-nav-search__input').focus();
	});

	$('.nc-nav-search__close').on('click',function(){
		var $form =  $(this).closest('.nc-nav-search__form');
		$form.hide();
		$form.find('.nc-nav-search__input').blur();

	})

}






 function program_code_init() {

        $( 'select.programcode' ).on( 'change', function () {

 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');
				     $( '#cc_id' ).val('');
				 	 $( '#s_codex' ).val('');
					  $( '#g_codex' ).val('');
					  $( '#u_codex' ).val('');
					  $( '#z_scode_idx3' ).val('');
            var $form = $( this ).closest( 'form' );
            var $this = $( this );
            var $pcode= $( 'select.programcode' );
		
            $pcode.each( function ( idx, item ) {


               //console.log($('.nc_program_select_pro.two  .selectric-scroll li.last').text());

                if ( idx > $pcode.index( $this ) && $this.val() != tmp_select_pcode[ $this.attr( 'name' ) ] ) {

                    var $parent = $pcode.eq( idx - 1);
                    var $target = $( this );
					
					

				   

                  //console.log($target);

                    $target.find( 'option:not(:first)' ).remove();


$( 'select[name=center_id]' ).on( 'change', function () {

 $( '#z_scode' ).val('');
 $( '#z_gcode' ).val('');
 $( '#z_scode_idx' ).val('');
 $( '#z_gcode_idx' ).val('');
 $( '#z_bcode' ).val('');
 $( '#z_bcode_idx' ).val('');
 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');
            $( 'select[name=s_code]').val( '0' );
            $( 'select[name=g_code]').val( '0' );
            $( 'select[name=b_code]').val( '0' );
   // $( 'select[name=s_code]').prop('selectedIndex', 0).selectric('refresh');
	        $( 'select[name=s_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=s_code]' ).selectric( 'refresh' );
		    $( 'select[name=g_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=g_code]' ).selectric( 'refresh' );
            $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=b_code]' ).selectric( 'refresh' );
			$(".nc_selectric_area.two").removeClass("on");
			$(".nc_selectric_area.three").removeClass("on");
			$(".nc_selectric_area.four").removeClass("on");



 });


 $( 'select[name=s_code]' ).on( 'change', function () {

 $( '#z_gcode' ).val('');
 $( '#z_gcode_idx' ).val('');
 $( '#z_gcode_idx2' ).val('');
 $( '#z_bcode' ).val('');
 $( '#z_bcode_idx' ).val('');
 $( '#z_bcode_idx2' ).val('');
 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');
            $( 'select[name=g_code]').val( '0' );
            $( 'select[name=b_code]').val( '0' );
		    $( 'select[name=g_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=g_code]' ).selectric( 'refresh' );
            $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=b_code]' ).selectric( 'refresh' );
				$(".nc_selectric_area.three").removeClass("on");
				$(".nc_selectric_area.four").removeClass("on");

 });
 
  $( 'select[name=g_code]' ).on( 'change', function () {
 $( '#z_bcode' ).val('');
 $( '#z_bcode_idx' ).val('');
 $( '#z_bcode_idx2' ).val('');

 $( '#search' ).val('');
 $('.nc-nav-search__close').trigger('click');

     
            $( 'select[name=b_code]').val( '0' );
            $( 'select[name=b_code]').find( 'option:not(:first)' ).remove();
            $( 'select[name=b_code]' ).selectric( 'refresh' );
	$(".nc_selectric_area.four").removeClass("on");
 });

 




                    $target.find( 'option:not(:first)' ).remove();
		


$( '#z_center' ).val($(".nc_selectric_area.first .selectric  span.label").text());


  var z_center =    $(".nc_selectric_area.first .selectric  span.label").text();

             if (z_center=="센터")
             {

				$( '#z_center' ).val('');
				$( '#z_scode' ).val('');
                $( '#z_gcode' ).val('');
				$( '#z_bcode' ).val('');
				$( '#z_scode_idx' ).val('');
                $( '#z_gcode_idx' ).val('');
				$( '#z_bcode_idx' ).val('');
				$( '#z_scode_idx2' ).val('');
                $( '#z_gcode_idx2' ).val('');		
                $( '#z_bcode_idx2' ).val('');					 
				$( '#cc_id' ).val('');
				$( '#s_codex' ).val('');
				$( '#g_codex' ).val('');
				$( '#u_codex' ).val('');
				$( '#z_scode_idx3' ).val('');
                $(".nc_selectric_area.first").removeClass("on");
		        $(".nc_selectric_area.first").addClass("off");
				//$(".nc_selectric_area").removeClass( 'on' );
				$(".nc_selectric_area.two").removeClass("on");
				$(".nc_selectric_area.three").removeClass("on");
				$(".nc_selectric_area.four").removeClass("on");
             }else{


                //$(".nc_selectric_area.first").addClass( 'on' );
                $( '#z_center' ).val($(".nc_selectric_area.first .selectric  span.label").text());
                $( '#z_center_idx' ).val($(".nc_selectric_area.first .programcode").val());

                $(".nc_selectric_area.first").removeClass("off");
		        $(".nc_selectric_area.first").addClass("on");
				  $(".nc_selectric_area.two").removeClass("on");
 $(".nc_selectric_area.three").removeClass("on");
  $(".nc_selectric_area.four").removeClass("on");
			 }


                  				
						
					 
                     


                    if ($parent.val() > 0) {
                            
							
						

						$.post( ajaxurl, { action: 'program_code1',programcode: $parent.val(), center_id:  $( 'select[name=center_id]' ).val(), s_code:$( 'select[name=s_code]' ).val(), g_code:$( 'select[name=g_code]' ).find(':selected').data('gcode') , b_code:$( 'select[name=b_code]' ).val()}, function ( response ) {

                            if ( response.success && response.data.length > 0 ) {


                                    
$target.selectric({
  maxHeight:500
});

                                 			

                               
                                $.each( response.data, function () {
								
									
                    
									 $('#z_tcnt').val(this.tcnt2);   




                                        if(this.ccode!='' && this.cname!=''){
											 
										 $txt2=	 this.cname;
										 $value= this.ccode;	
										}else{
                                         $txt2= this[ $target.attr( 'name' ).replace( 'programcode_', '' ) ];
										 $value= this.uid;	
										}											
                               

                                    $( '<option />', {
                                        'data-text' : this[ $target.attr( 'name' ).replace( 'programcode_', '' ) ],
										'data-scode' :this.scode,
                                        'data-gcode' :this.gcode,
                                        'data-pcode' :this.pcode,
										'data-ccode' :this.ccode,
										'data-cname' :this.cname,
                                        value       : $value,
										text        : $txt2
                                    } ).appendTo( $target );




if (this.tcnt2=='0')
{
	//console.log('값없음');
	//console.log($target.attr( 'name' ));
	//$target.find('.selectric-scroll .last').css('display','none');
	$target.find( 'option:not(:first)' ).remove();
    $target.selectric( 'refresh' );
}
                                } );

                         
    //console.log(this.tcnt2);
  //console.log($target.attr( 'name' ).val(''););
                              



                            }

                            $target.selectric( { disableOnMobile: false} );

                        } );

                    } else {

                        $target.selectric( { disableOnMobile: false} );

                    }

                }

            } ).promise().done( function () {

            
             var z_scode =    $( '#z_scode' ).val($( 'select[name=s_code]' ).find(':selected').data('text'));

             if (z_scode=="업장" || $( '#z_scode' ).val()=="")
             {
				 $( '#z_scode' ).val('');
				 $( '#z_scode_idx' ).val('');
                 $( '#z_gcode_idx' ).val('');
                 $( '#z_gcode_idx2' ).val('');
				 $( '#z_bcode_idx' ).val('');
				 $( '#z_scode_idx2' ).val('');
 				 $( '#z_bcode_idx2' ).val('');

				 $( '#cc_id' ).val('');
				 	 $( '#s_codex' ).val('');
					  $( '#g_codex' ).val('');
					  $( '#u_codex' ).val('');
					  $( '#z_scode_idx3' ).val('');

                $(".nc_selectric_area.two").removeClass("on");
		        $(".nc_selectric_area.two").addClass("off");
				$(".nc_selectric_area.three").removeClass("on");
				$(".nc_selectric_area.four").removeClass("on");
           //console.log('1');

             }else{

                $( '#z_bcode_idx' ).val('');
                $( '#z_scode' ).val($( 'select[name=s_code]' ).find(':selected').data('text'));
				$( '#z_scode_idx' ).val($( 'select[name=s_code]' ).find(':selected').val());
				$( '#z_scode_idx2' ).val($( 'select[name=s_code]' ).find(':selected').data('scode'));
				$( '#tcode' ).val($( 'select[name=s_code]' ).find(':selected').val());
				$( '#xcode' ).val($( 'select[name=s_code]' ).find(':selected').data('scode'));
	            $(".nc_selectric_area.two").removeClass("off");
		        $(".nc_selectric_area.two").addClass("on");
			 }

           var z_gcode =     $( '#z_gcode' ).val($( 'select[name=g_code]' ).find(':selected').data('text'));

		   console.log($( '#z_gcode' ).val());

             if (z_gcode=="종목" || $( '#z_gcode' ).val()=="" )
             {
				 $( '#z_gcode' ).val('');
				 $( '#z_gcode_idx' ).val('');
			     $( '#z_gcode_idx2' ).val('');	
	             $( '#z_bcode_idx' ).val('');
				 $( '#z_bcode_idx2' ).val('');
			     $(".nc_selectric_area.three").removeClass("on");
		         $(".nc_selectric_area.three").addClass("off"); 
			     $(".nc_selectric_area.four").removeClass("on");
                console.log("종목변경")

             }else{

                $( '#z_gcode' ).val($( 'select[name=g_code]' ).find(':selected').data('text'));
				$( '#z_gcode_idx' ).val($( 'select[name=g_code]' ).find(':selected').data('gcode'));
				$( '#z_gcode_idx2' ).val($( 'select[name=g_code]' ).find(':selected').data('gcode'));
				$( '#z_bcode_idx' ).val('');
			    $( '#z_bcode_idx2' ).val('');	
			    //$("#g_code").val($( 'select[name=g_code]' ).find(':selected').data('gcode'));  
			
			     
			
                 //$('#etxt').text( $( '#z_gcode' ).val());
                $(".nc_selectric_area.three").removeClass("off");
		        $(".nc_selectric_area.three").addClass("on");
			 }


             var z_bcode =     $( '#z_bcode' ).val($( 'select[name=b_code]' ).find(':selected').data('cname'));
			 
			 

             if (z_bcode=="분류" || $( '#z_bcode' ).val()=="" )
             {
				 $( '#z_bcode' ).val('');
				 $( '#z_bcode_idx' ).val('');
				 $( '#z_bcode_idx2' ).val('');
				 
				 //  console.log('3');
			    $(".nc_selectric_area.four").removeClass("on");
		        $(".nc_selectric_area.four").addClass("off"); 
             }else{

                $( '#z_bcode' ).val($( 'select[name=b_code]' ).find(':selected').data('cname'));
				$( '#z_bcode_idx' ).val($( 'select[name=b_code]' ).find(':selected').data('ccode'));
				$( '#z_bcode_idx2' ).val($( 'select[name=b_code]' ).find(':selected').data('ccode'));
		        $(".nc_selectric_area.four").removeClass("off");
		        $(".nc_selectric_area.four").addClass("on");	
			      
			 //console.log('4');
                 //$('#etxt').text( $( '#z_gcode' ).val());
            
			 }
            
			

               

           tmp_select_pcode = {
        'center_id'  : $( 'select[name=center_id]' ).val(),
        's_code' : $( 'select[name=s_code]' ).val(),
        'g_code'  : $( 'select[name=g_code]' ).val(),
        'b_code'  : $( 'select[name=b_code]' ).val()		
                };



            
			
		
             if($('#z_tcnt').val() !='0' || $('#z_tcnt').val() !='' || $('#cc_id').val() !='' ){

             $(this).closest( 'form' ).trigger('submit');
			  
			 }

            } );


  
            return false;

			

        } );
     $( '.program_form' ).on( 'submit', function () {

	
              //console.log('전송');

            var $elms   = $( 'select.programcode, #z_scode_idx1, #z_scode_idx2, #z_gcode_idx1, #z_gcode_idx2, #z_gcode, #z_bcode_idx1, #z_bcode_idx2, #z_bcode' );

            var param   = { search: $( 'input[name=search]' ).val() };

            $.each( $elms, function ( idx, item ) {

                param[ $( item ).attr( 'name' ) ] = $( item ).val();

                //console.log($('#g_code').val());
				

            } ).promise().done( function () {

             //program_list_init();
       




             program_ajax( ( './index.php' ) + '?' + $.param( param ));

            } );

            return false;

        } );

    }


	if($('body').hasClass('home') && $("#cc_id").val() !='0'){
         // jQuery('html,body').animate({
         //   scrollTop : $('.nc_program').offset().top - $('#header').height()-10
         //}, 800);
		   $('#dbloading').removeClass("on");
		   $('#dbloading').removeClass("is-act");
		   $('#dbloading').removeClass("is-deact");
		   //console.log('로딩완료');
	}

//program_xcode_init();
	  function initTableScroll() {
    
		
		defaultNewIscroll("#record_scroll", horizontalScrollOpt, { preventVerticalScroll: true });
	    
	    
	}
	if($('body').hasClass('home') && $("#cc_id").val() !=''){

      //program_xcode_init();

      $(".nc_selectric_area.first").addClass("on");
	initTableScroll();

              if($("#z_scode_idx").val() !='0'){
                $scode=$("#s_code").val();
				$programcode=$("#s_code").val();
				//console.log('체크');
			  }else{
                $scode='';
				$programcode=$("#cc_id").val();
				
			  }
              if($("#z_gcode_idx").val() !='0'){
                $gcode=$("#g_code").val();
			  }else{
                $gcode='';
			  }
			   if($("#z_bcode_idx").val() !='0'){
				   
						   
                $bcode=$("#b_code").val();
				
							
			  }else{
                $bcode='';
			  }








						$.post( ajaxurl, { action: 'program_code',programcode: $("#cc_id").val(), center_id:  $("#cc_id").val(), s_code:$("#z_scode_idx2").val(), g_code:$("#z_gcode_idx2").val(), b_code:$bcode, g_code:$("#z_gcode_idx2").val(), x_code:$("#z_scode_idx2").val(), xcode:$("#z_scode_idx2").val()}, function ( response ) {

                            if ( response.success && response.data.length > 0 ) {

                                $.each( response.data, function () {


									 $('#z_tcnt').val(this.tcnt2);   


                                        if(this.ccode!=''){
											 
										 $txt2=	 this.cname;
										 $value= this.ccode;	
										}else{
                                         $txt2= this[ $('select#s_code.nc_selectric.programcode').attr( 'name' ).replace( 'programcode_', '' ) ];
										 $value= this.uid;	
										}											
                               

                                    $( '<option />', {
                                        'data-text' : this[ $('select#s_code.nc_selectric.programcode').attr( 'name' ).replace( 'programcode_', '' ) ],
										'data-scode' :this.scode,
                                        'data-gcode' :this.gcode,
                                        'data-pcode' :this.pcode,
										'data-ccode' :this.ccode,
										'data-cname' :this.cname,
                                        value       : $value,
										text        : $txt2
                                    } ).appendTo($('select#s_code.nc_selectric.programcode') );

								
                                  
                                    $('select#s_code option[value="'+$('#z_scode_idx').val()+'"]').attr('selected', true);
                                    $( '#xcode' ).val($('select#s_code option:selected').data('scode'));
                                    $( '#z_scode_idx2' ).val($('select#s_code option:selected').data('scode'));
                                    $('#s_code').val($('select#s_code option:selected').data('scode'));								
	
                                    $("select#s_code.nc_selectric.programcode").val($("#z_scode_idx").val()).attr("selected", "selected");
                                    
									if($("#z_scode_idx").val()!=''){
									$(".nc_selectric_area.two").addClass("on");
									}
								 //$("select#g_code.nc_selectric.programcode").val('3').attr("selected", "selected");


                                    $('select#s_code').selectric( { disableOnMobile: false} );
                                    } );


                                    if(response.data2.length > 0){
                                    if ( response.success && response.data2.length > 0 ) {

                                    $.each( response.data2, function () {

								
                                
  									 $('#z_tcnt').val(this.tcnt2);   


                                        if(this.ccode!=''){
											 
										 $txt2=	 this.cname;
										 $value= this.ccode;	
										}else{
                                         $txt2= this[ $('select#g_code.nc_selectric.programcode').attr( 'name' ).replace( 'programcode_', '' ) ];
										 $value= this.uid;	
										}											
                               

                                    $( '<option />', {
                                        'data-text' : this[ $('select#g_code.nc_selectric.programcode').attr( 'name' ).replace( 'programcode_', '' ) ],
										'data-scode' :this.scode,
                                        'data-gcode' :this.gcode,
                                        'data-pcode' :this.pcode,
										'data-ccode' :this.ccode,
										'data-cname' :this.cname,
                                        value       : $value,
										text        : $txt2
                                    } ).appendTo($('select#g_code.nc_selectric.programcode') );
                                                                    
                                  $("select#g_code.nc_selectric.programcode").val($('#z_gcode_idx').val()).attr("selected", "selected");
                               		if($("#z_gcode_idx").val()!=''){
									$(".nc_selectric_area.three").addClass("on");
									}
                                 
								 //$("select#g_code.nc_selectric.programcode").val('3').attr("selected", "selected");


	                             $('select#g_code').selectric( { disableOnMobile: false} );
                                } );

                                    }

                                    }
               
			   
			   
			   
                                    if(response.data3.length > 0){
                                    if ( response.success && response.data3.length > 0 ) {

                                    $.each( response.data3, function () {

								
                                
  									 $('#z_tcnt').val(this.tcnt2);   


                                        if(this.ccode!=''){
											 
										 $txt2=	 this.cname;
										 $value= this.ccode;	
										}else{
                                         $txt2= this[ $('select#b_code.nc_selectric.programcode').attr( 'name' ).replace( 'programcode_', '' ) ];
										 $value= this.uid;	
										}											
                               

                                    $( '<option />', {
                                        'data-text' : this[ $('select#b_code.nc_selectric.programcode').attr( 'name' ).replace( 'programcode_', '' ) ],
										'data-scode' :this.scode,
                                        'data-gcode' :this.gcode,
                                        'data-pcode' :this.pcode,
										'data-ccode' :this.ccode,
										'data-cname' :this.cname,
                                        value       : $value,
										text        : $txt2
                                    } ).appendTo($('select#b_code.nc_selectric.programcode') );
                                                                    
                                  $("select#b_code.nc_selectric.programcode").val($('#z_bcode_idx').val()).attr("selected", "selected");
                                   if($("#z_bcode_idx").val()!=''){
									$(".nc_selectric_area.four").addClass("on");
									}
                                 
								 //$("select#g_code.nc_selectric.programcode").val('3').attr("selected", "selected");


	                        $('select#b_code').selectric( { disableOnMobile: false} );
                                } );

                            }

                            }





                                    }
                                    
   
					


 		




              //console.log('전송');

           var $elms   = $( '#center_id, #z_scode_idx,#z_scode_idx2,  #z_gcode_idx, #z_gcode_idx2,#z_bcode_idx, #z_bcode_idx2, #z_gcode, #page, #xcode, #s_code, #g_code, #b_code' );

            var param   = { search: $( 'input[name=search]' ).val() };

            $.each( $elms, function ( idx, item ) {

                param[ $( item ).attr( 'name' ) ] = $( item ).val();

                //console.log($('#z_jcode').val());

            } ).promise().done( function () {

         
             program_ajax( ( './index.php' ) + '?' + $.param( param ));

            } );


            } );


  
            return false;


    }


 


function is_mobile(){
    return (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera);
}
function is_mobile_ios(){
	return !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
}


function is_browser_chrome(){
    return /Chrome/.test(navigator.userAgent);
}
function is_browser_safari(){
    return /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
}
function is_browser_firefox(){
    return /Firefox/.test(navigator.userAgent);
}
function is_browser_ie(){
	return ((navigator.appName == 'Microsoft Internet Explorer') || ((navigator.appName == 'Netscape') && (new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) !== null)));
}
function is_browser_ie9(){
    return ($.browser.msie  && parseInt($.browser.version, 10) <= 9) ? true : false;
}


function is_mac_os(){
    return navigator.platform.indexOf('Mac') > -1;
}


function is_screen(max_width){
    if(!!window.matchMedia){
        return window.matchMedia('(max-width:'+ max_width +'px)').matches;
    }
}


}); 