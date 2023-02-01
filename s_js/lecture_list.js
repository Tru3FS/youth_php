
var post_load = false;

jQuery(function($) {

post_map_init();
post_code_init();
post_ostatus();
post_pagination();
post_map_relocate();

post_loadmore();


post_list_nicescroll();

function post_list_nicescroll(){


   if ( ! POST.is_screen( 540 ) ) {

                    $('.post_DB_BT').niceScroll({
	    autohidemode       : false,
		cursorborder       : "0px solid #bebebe",
		cursorcolor        : "#FF0D01",
		background         : "#F8F8FA",
		cursorwidth        : 10,
		cursorborderradius : "10px",
			touchbehavior: false,
			preventmultitouchscrolling: false,
zindex: 1
			

                    });

            }else{

       $('.post_DB_BT').niceScroll({
	    autohidemode       : false,
		cursorborder       : "0px solid #bebebe",
		cursorcolor        : "#FF0D01",
		background         : "#F8F8FA",
		cursorwidth        : 10,
		cursorborderradius : "10px",

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

			}

}


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





 post_category_init();

	
	
	function post_category_init() {

 

            var $form = $( this ).closest( 'form' );



            $( 'select[name=post_sido]', $form ).val();
            $( 'select[name=post_gugun]', $form ).val();

            $( 'input[name=search]', $form ).val( '' );

    


            $( this ).closest( 'form' ).trigger( 'submit' );

        //    jQuery('html,body').animate({
        //        scrollTop : $('.post_list_area').offset().top - $('#header').height()
        //    }, 800);

            return false;



    }



    function post_loadmore() {

        if ( $( 'div.post_list_DB' ).length == 0 ) { return; };




        $( '.post_DB_BT' ).on( 'scroll', function ( event ) {

            var $this     = $( this );
            var $loadmore = $( '.post_loadmore', $this );

            if ( $loadmore.length > 0 ) {

                if ( $( '.postinfo_list', $this ).height() - $this.scrollTop() < 1500 && post_load == false ) {

                    post_load = true;

                    var url = $loadmore.data( 'url' );

                    $.get( url, function ( response ) {

                        $loadmore.fadeOut( 'slow', function () {

                            $( this ).remove();

                            var $new_items = $( 'div.postinfo_list', response );
                            $new_items.imagesLoaded( function () {

POSTINFO();

                                $.when( $( 'div.postinfo_list' ).append( $( 'div.postinfo_list', response ).children() ) )
                                .then( function () {

                                    post_map_relocate();

                                    try {
POSTINFO();
                                        $( '.post_DB_BT' ).getNiceScroll().resize();

                                    } catch ( e ) { console.log( e ); }

                                    post_load = false;

                                } );

                            } );

                        });

                    } );

                }

            }

        } );

    }

    function post_ajax( url, callback_func ) {

        $( '.nicescroll-rails' ).remove();

        $.get( url, function ( response ) {



            var $wrap = $( 'div.post_list_DB', response );





            $wrap.imagesLoaded( function () {

                $( 'div.post_list_DB' ).replaceWith( $wrap );


                var map = naver.maps.Map.__instances[ 0 ];
                var $list_item = $( 'div.post_list_DB div.postinfo_list_item:first' );

                if ( $list_item.length > 0 ) {

                    map.setCenter( new naver.maps.LatLng( $list_item.data( 'lat' ), $list_item.data( 'lng' ) ) );

                }

POSTINFO();



                post_map_relocate();


   if ( ! POST.is_screen( 540 ) ) {

                    $('.post_DB_BT').niceScroll({
	    autohidemode       : false,
		cursorborder       : "0px solid #bebebe",
		cursorcolor        : "#FF0D01",
		background         : "#F8F8FA",
		cursorwidth        : 10,
		cursorborderradius : "10px",
			touchbehavior: false,
			preventmultitouchscrolling: false
                    });

            }else{


       $('.post_DB_BT').niceScroll({
	    autohidemode       : false,
		cursorborder       : "0px solid #bebebe",
		cursorcolor        : "#FF0D01",
		background         : "#F8F8FA",
		cursorwidth        : 10,
		cursorborderradius : "10px",
    emulatetouch: true,
    cursordragontouch: true,
    touchbehavior: true,
    preventmultitouchscrolling: false,
                    });

			}



                post_loadmore();

                window.history.pushState( null, null, url );

                if ( callback_func ) {

                    callback_func();

                }

            } );

        } );
    }

    function post_pagination() {

        if ( $( 'div.post_list_area' ).length > 0 ) {

            $( 'div.article_body' ).on( 'click', 'div.jt_pagination a', function () {

                post_ajax( $( this ).attr( 'href' ) );
                return false;

            } );

        }

    }


    function post_ostatus() {

        if ( $( 'div.post_list_area' ).length > 0 ) {

	            $( 'div.sub_con' ).on( 'click', '.all', function () {
	
                var $this    = $( this );
               

                if ( ! $this.hasClass( 'active' ) ) {

                    var $elms = $( 'select.pcode' );
                    var param = { search: $( 'input[name=search]' ).val(), ostatus: "all" };

                    $.each( $elms, function ( idx, item ) {

                        param[ $( item ).attr( 'name' ) ] = $( item ).val();

                    } );

          post_ajax( ( '/postarea/default.asp' ) + '?' + $.param( param ) );

                }

            } );	

            $( 'div.sub_con' ).on( 'click', 'ul.post_rtype > li', function () {
	
                var $this    = $( this );
                var sort_idx = $( 'ul.post_rtype li' ).index( $this );
                var sort     = ( sort_idx == 0 ? 'open' : 'close' );

   

                if ( ! $this.hasClass( 'active' ) ) {

                    var $elms = $( 'select.pcode' );
                    var param = { search: $( 'input[name=search]' ).val(), ostatus: sort };

                    $.each( $elms, function ( idx, item ) {

                        param[ $( item ).attr( 'name' ) ] = $( item ).val();

                    } );

          post_ajax( ( '/postarea/default.asp' ) + '?' + $.param( param ) );

                }

            } );

        }

    }



function removeMarkers() {
			for (var i = 0; i < map.map_marker.length; i++) {
				map.map_marker[i].setMap(null);
			}
			 map.map_marker = [];
			 map.infoWindows = [];
		}

 //map.removeMarkers();



POSTINFO();
function POSTINFO() {

         $( 'div.postinfo_list_item' ).on( 'click',  function () {

        var $this = $( this );

        var $map = $( '#post_list_map_wrap' );

       var map;// console.log( this );
        var lat    =$this.attr('data-lat');
        var lon   =$this.attr('data-lng');
        var title   =$this.attr('data-name');
        var post_status =$this.attr('data-status');
        var post_tel   =$this.attr('data-tel');
        var pidx   =$this.attr('data-idx');
		var post_status   =$this.attr('data-status');


        //  var map        = naver.maps.Map.__instances[pidx];
	
     
	map=naver.maps.Map.__instances[0];
      

	//	var mapCooder = new naver.maps.LatLng(lat, lon);
	

	//	$map.setCenter(mapCooder);
	//	$map.setZoom(10);


map.setCenter( new naver.maps.LatLng(lat, lon ) );
map.setZoom(10);




                   if (post_status=="1") {

			                 post_marker='/post_img/n_post_location_img.png'
							 post_status='정상운영중입니다.'
							 anchorColorA="#ff0d01"
							 infobg="cc"
							//   console.log(pimgs)
                             }else{
                            post_marker='/post_img/n_post_location_img_x.png'
							post_status='일시중단중입니다.'
							anchorColorA="#D9D7D6"
							infobg="dd"
						//	 console.log(pimgs)
							 }




                    try {

                        var smarker = new naver.maps.Marker({
                            position: new naver.maps.LatLng( lat, lon ),
                            map: map,
                            icon: {
                                url: post_marker
                            }
                        });





                          var contentString = ['<div class="post_info_area '+ infobg +'"><div class="post_info_area_wrap"><p class="top_tit">'+ title +'</p><p class="b_tit">'+ post_tel +'</p><p class="b_tit">'+ post_status +'</p></div></div>'].join( '' );

                        var infowindow = new naver.maps.InfoWindow( {
                            content         : contentString,
                            borderWidth: 0,
                            disableAnchor: false,
                            backgroundColor: "transparent",
                            anchorSize: new naver.maps.Size(28, 10),
                            anchorSkew: false,
                            anchorColor: anchorColorA,
	                        borderColor: false,
	                        borderWidth:0,
                            position : new naver.maps.LatLng( lat, lon ),
                            pixelOffset: new naver.maps.Point(0, -5)
                        } );

                        naver.maps.Event.addListener( smarker, 'click', function(e) {
                            if (infowindow.getMap()) {
                                infowindow.close();
                            } else {
                                infowindow.open(map, smarker);
                            }
                        });


                           if (infowindow.getMap()) {
                                infowindow.close();
                            } else {
                                infowindow.open(map, smarker);
                            }

                    } catch( e ) {

                  

                    }


       } );

	}




  function post_map_init() {





        var $map = $( '#post_list_map_wrap' );


        if ( $map.length == 0 ) return;

        var lng        = $map.attr('data-lng');
        var map_marker = $map.attr('data-image');
        var map        = naver.maps.Map.__instances[ 0 ];
       



              var width = 0;
              var height = 0;
              var left = 0;
              var top = 0;

              width = 94;
              height = 100;


             // top = ( $(window).height() - height ) / 2 + $(window).scrollTop();
             // left = ( $(window).width() - width ) / 2 + $(window).scrollLeft();

 

              if($(".loading-container").length != 0) {
                     $(".loading-container").css({
                          "top": "calc(50% - 50px)",  
						  "left": "calc(50% - 50px)"
							
						//	"top": "50%",
                        //   "left": "50%"
                     });
                     $(".loading-container").show();
					  $(".map_bg").show();
              }
              else {
                     $('body .post_list_area_W').append('<div class="map_bg">  <div class="loading-container">    <div class="loading"></div>    <div id="loading-text">로딩중입니다.</div></div></div>'); 
 
              }


     tmp_select_pcode = {
            'post_sido'  : $( 'select[name=post_sido]' ).val(),
        'post_gugun' : $( 'select[name=post_gugun]' ).val()
                    };


        $.post( ajaxurl_T, { action: 'post_all', post_sido: $( 'select[name=post_sido]' ).val(), post_gugun: $( 'select[name=post_gugun]' ).val()  }, function ( response ) {





             if ( response.success ) {




                $( response.data ).each( function ( idx, data ) {




                   if (data.status=="1") {

			                 post_marker='/post_img/n_post_location_img.png'
							 post_status='정상운영중입니다.'
							 anchorColorA="#ff0d01"
							 infobg="cc"
							//   console.log(pimgs)
                             }else{
                            post_marker='/post_img/n_post_location_img_x.png'
							post_status='일시중단중입니다.'
							anchorColorA="#D9D7D6"
							infobg="dd"
						//	 console.log(pimgs)
							 }




                    try {

                        var marker = new naver.maps.Marker({
                            position: new naver.maps.LatLng( data.map.lat, data.map.lng ),
                            map: map,
                            icon: {
                                url: post_marker
                            }
                        });





                        var contentString = ['<div class="post_info_area '+ infobg +'"><div class="post_info_area_wrap"><p class="top_tit">'+ data.title +'</p><p class="b_tit">'+ data.posttel +'</p><p class="b_tit">'+ post_status +'</p></div></div>'].join( '' );

                        var infowindow = new naver.maps.InfoWindow( {
                            content         : contentString,
            borderWidth: 0,
            disableAnchor: false,
    backgroundColor: "transparent",
    anchorSize: new naver.maps.Size(28, 10),
    anchorSkew: false,
    anchorColor: anchorColorA,
	borderColor: false,
	borderWidth:0,
                               position : new naver.maps.LatLng( data.map.lat, data.map.lng ),
                    pixelOffset: new naver.maps.Point(0, -5)
                        } );

                        naver.maps.Event.addListener( marker, 'click', function(e) {
                            if (infowindow.getMap()) {
                                infowindow.close();
                            } else {
                                infowindow.open(map, marker);
                            }
                        });

                    } catch( e ) {

                  

                    }

                } );

            }

            var $list_item = $( 'div.post_list_DB div.postinfo_list_item:first' );


            if ( $list_item.length > 0 ) {

                if ( $list_item.data( 'lat' ) && $list_item.data( 'lng' ) ) {

                    map.setCenter( new naver.maps.LatLng( $list_item.data( 'lat' ), $list_item.data( 'lng' ) ) );

                


                } else {

                   
                    map.setCenter( new naver.maps.LatLng( 37.5615629, 126.9821154 ) );

                }

            }





        }, 'json' ).done(function() {
    //alert( "second success" );
  }).fail(function() {
 //alert( "error" );
  }).always(function() {
//alert( "finished" );
   // $(".loading-container").hide();
	//$(".map_bg").hide();
	$(".loading-container").fadeOut(1000);
	$(".map_bg").fadeOut(1000);
  });

    }

    var tmp_select_pcode = {
        'post_sido'  : $( 'select[name=post_sido]' ).val(),
        'post_gugun' : $( 'select[name=post_gugun]' ).val()
    };
















 function post_code_init() {

        $( 'select.pcode' ).on( 'change', function () {

            var $this = $( this );
            var $pcode= $( 'select.pcode' );
		
            $pcode.each( function ( idx, item ) {

                if ( idx > $pcode.index( $this ) && $this.val() != tmp_select_pcode[ $this.attr( 'name' ) ] ) {

                    var $parent = $pcode.eq( idx - 1 );
                    var $target = $( this );

                    $target.find( 'option:not(:first)' ).remove();

                    if ( $parent.val() > 0 ) {

                        $.post( ajaxurl, { action: 'post_code', pcode: $this.val(),post_sido: $( 'select[name=post_sido]' ).val() , post_gugun: $( 'select[name=post_gugun]' ).val() }, function ( response ) {

                            if ( response.success && response.data.length > 0 ) {

                                $.each( response.data, function () {

                                    $( '<option />', {
                                        'data-text' : this[ $target.attr( 'name' ).replace( 'post_', '' ) ],
                                        value       : this.uid,
                                        text        : this[ $target.attr( 'name' ).replace( 'post_', '' ) ]
                                    } ).appendTo( $target );

                                } );

                            }

                            $target.selectric( { disableOnMobile: false } );

                        } );

                    } else {

                        $target.selectric( { disableOnMobile: false } );

                    }

                }

            } ).promise().done( function () {

                tmp_select_pcode = {
                    'post_sido'  : $( 'select[name=post_sido]' ).val(),
                    'post_gugun' : $( 'select[name=post_gugun]' ).val()   
                };

                $this.closest( 'form' ).trigger( 'submit' );

            } );

            return false;

        } );
        $( 'form[name=post_search]' ).on( 'submit', function () {

            var $elms   = $( 'select.pcode' );
            var param   = { search: $( 'input[name=search]' ).val() };

            $.each( $elms, function ( idx, item ) {

                param[ $( item ).attr( 'name' ) ] = $( item ).val();

            } ).promise().done( function () {

     

               post_map_init();
             post_ajax( ( '/postarea/default.asp' ) + '?' + $.param( param ));

            } );

            return false;

        } );

    }















    function cpost_code_init() {

        $( 'select.pcode' ).on( 'change', post_search_action );
        $( 'form[name=post_search]' ).on( 'submit', post_search_action );




        function post_search_action() {
          


            var $this   = $( this );
            var name    = $this.attr( 'name' );
            var $elms   = $( 'select.pcode' );
            var data    = { action: 'post_code', pcode: $this.val(),post_sido: $( 'select[name=post_sido]' ).val() , post_gugun: $( 'select[name=post_gugun]' ).val() };
            var $target = $( $elms[ $elms.index( $this ) + 1 ] );
            var param   = { search: $( 'input[name=search]' ).val() };
			var page   = { page: $( 'input[name=page]' ).val() };
  


            if ( $target && $this.val() != tmp_select_pcode[ $this.attr( 'name' ) ] ) {



                $.each( $elms, function ( idx, item ) {

                    if ( idx > $elms.index( $this ) ) {

                        $( item ).find( 'option:not(:first)' ).remove();
                        $( item ).selectric( { disableOnMobile: false } );

                    }

                    param[ $( item ).attr( 'name' ) ] = $( item ).val();


        

                } );

                $.post( ajaxurl, data, function ( response ) {

 if ( response.success && response.data.length > 0 ) {

                    if ( response.data.length > 0 ) {

                                $.each( response.data, function () {

                      
 

                                 $( '<option />', {
                                        'data-text' : this[ $target.attr("name").replace("post_", "" ) ],
                                        value       : this.uid,
                                        text        : this[ $target.attr("name").replace("post_","" ) ]
                                    } ).appendTo( $target );

						
                                } );
    }

                        $target.selectric( { disableOnMobile: false } );

                    }

                    tmp_select_pcode = {
            'post_sido'  : $( 'select[name=post_sido]' ).val(),
        'post_gugun' : $( 'select[name=post_gugun]' ).val()
                    };

                } );

	    if ($( 'select[name=post_sido]' ).val()==0)
    {
        var $form = $( this ).closest( 'form' );
  $( 'select[name=post_gugun]', $form ).val( '0' );
	
    }


             post_map_init();
             post_ajax( ( '/postarea/default.asp' ) + '?' + $.param( param ) + '&' + $.param( page ) );

            }

            return false;

        };

    }


    function post_map_relocate() {

        return;

        $( 'body' ).on( 'hover', 'div.postinfo_list_item', function () {

            var map;// console.log( this );
            var lat = $( this ).data( 'lat' );
            var lng = $( this ).data( 'lng' );
     

            if ( lat && lng ) {

                $.each( naver.maps.Map.__instances, function () {

                    if ( $( this.getElement() ).attr( 'id' ) == 'post_list_map_wrap' ) {

                        map = this;
                        return;

                    }

                } );

                if ( map ) {



                    map.setCenter( new naver.maps.LatLng( lat, lng ) );

                }

            }

        } );

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


}); // End jQuery
