( function  ($) {
  $( function() {
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
    if(isAndroid) {
        var wh = $(window).height() + 60;
          $( '.sub-head, #brand' ).each( function () {
             var $tit = $( this );
              $(this).css('height', 0.61803398875 * wh )             
              $(this).css('min-height', 0.61803398875 * wh ) 
          } );

    }
  } );
} )(jQuery)