window.viewportUnitsBuggyfill.init();
!(function ( $ ) {
  $('header').each(function () {
    var h = (this.offsetHeight||$(this).height()) + 'px';
    $(this).css( { height: h, minHeight: h, maxHeight: h });
  })
  $(function () {
    if( $(window).width() < 1024 ){
      return;
    }
    $container = $('.images');
    var height = $container.next('.text').height();
    
    $container.height( height );
    if( $container.length ){
      var $images = $container.children('img');
      var total  = $images.length;
      var loaded = 0;
      if( total ){
        var complete = function () {
          $images.sort( function ( a, b ) {
            var aShape = $( a ).data('shape');
            var bShape = $( b ).data('shape');
            if( aShape > bShape ) return -1;
            if( aShape < bShape ) return 1;
            return 0;
          }).detach().appendTo( $container ).each( function () {
            var $i = $( this );
                                    var $wrap = $('<a>');
                                    var shape = $i.data('shape');
                                    var h = Math.floor( height / ($images.length*2)  );
                                    $wrap.addClass( "image-link " + shape ).attr( 'href', $i.attr('src') );
                                    $wrap.css({
                                     'background-image': 'url(' + $i.attr('src') + ')',
                                     'background-position': 'center',
                                     'background-size': 'cover',
                                     'min-width': (shape === 'landscape' ? '50%' : shape === 'portrait' ? '25%' : '25%'),
                                     'max-width': (shape === 'landscape' ? '50%' : shape === 'portrait' ? '25%' : '25%'),             
                                     'min-height': 0,
                                     // 'padding-bottom': (shape === 'landscape' ? '25%' : shape === 'portrait' ? '50%' : '25%'),
                                     'padding-bottom': (shape === 'landscape' ?  ( h * 4)+ 'px' : shape ==- 'portrait' ? ( h * 2) + 'px'  : ( h * 4) + 'px'), 
                                     'height':0
                                    });
                                    $i.replaceWith($wrap)
          });
        }
        $images.each( function ( ) {
          var $i = $( this );
          $i.css('opacity', 0).on('error', function () {
            loaded++;
          }).one('load', function () {      
            var w = $i.width(), h = $i.height(), klass = '';
            if( w > h ){
              klass = 'landscape';
            }else if( h > w){
              klass = 'portrait';
            }else{
              klass = 'square';
            }
            $i.addClass(klass).data('shape', klass );
            if( ++loaded >= total ){
              $(window).resize(complete).resize()
            }
          });
          if( this.complete ) $( this ).load()
        });
      }
    }

  })
    
    
    
  // // Round to Nearest
  //   function rn( n, mult ) {
  //     mult = mult||1;
  //     return Math.ceil(n/mult) * mult;
  //   }
  //   
  //   // Greatest Common Divisor (two numbers)
  //   function _gcd(a,b) {
  //       if( arguments.length < 2 ) throw "BR";
  //       if (a < 0) a = -a;
  //       if (b < 0) b = -b;
  //       if (b > a) {var temp = a; a = b; b = temp;}
  //       while (true) {
  //           a %= b;
  //           if (a == 0) return b;
  //           b %= a;
  //           if (b == 0) return a;
  //       }
  //   }
  //   // Greatest Common Divisor (list)
  //   function gcd( list ){
  //     var first = list[0];
  //     return list.slice(1).reduce( _gcd, first );
  //   }
  //   
  //   $(function () {
  //     var $c = $('.images').css({display: 'flex'});
  //     var $images = $('img');
  //     var widths = [];
  //     var heights = [];
  //     $images.map( function () {
  //       var w = this.naturalWidth||this.offsetWidth||this.width;
  //       var h = this.naturalHeight||this.offsetHeight||this.height;
  //       widths.push( w );
  //       heights.push( h );
  //     });
  //     var tw = widths.reduce(function ( a, n ) {
  //       return a + n;
  //     }, 0 )/widths.length;
  //     var th = heights.reduce(function ( a, n ) {
  //       return a + n;
  //     }, 0 )/heights.length;
  //     var wgcd = gcd( widths );
  //     var hgcd = gcd( heights );
  //     var sgcd  = gcd([wgcd,hgcd]);
  //     $images.map(function ( i ) {
  //       var $img = $( this );
  //       var $repl = $( '<a>' ).addClass('image-link');
  //       var w = rn( widths[i], sgcd);
  //       var h = rn( heights[i], sgcd);
  //       if( w > h ){
  //         $repl.addClass('landscape')
  //       }else if( w < h ){
  //         $repl.addClass('portrait')
  //       }else{
  //         $repl.addClass('square')
  //       }
  //       
  //       //console.log( w = $c.width()*w/tw, h = $c.width()*h/tw );
  //      
  //      $repl.css({ 'background-image': 'url("'+$img.attr("src")+'")' });
  //      $repl.attr( 'href', $img.attr('src') );
  //      // console.log(w,h);
  //      // var iw = $img.width();
  //      // var ih = $img.height();
  //      
  //      // $img.css({
  //      //       position: 'absolute',
  //      //       width: iw,
  //      //       height: ih,
  //      //       top: '50%',
  //      //       left: '50%',
  //      //       'margin-left': -.5 * iw,
  //      //       'margin-top': -.5 * ih
  //      //     });
  //      //     
  //      $img.replaceWith( $repl );
  //      // $repl.append( $img );
  //      
  //      
  //       
  //     });
  //     new Packery( $c.get(0), {
  //       itemSelector: '.imagelink',
  //       isHorizontal: true,
  //       gutter:0
  //     })
  //   });
  //   
  
})( jQuery.noConflict() )