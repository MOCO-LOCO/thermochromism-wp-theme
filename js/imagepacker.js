!(function ( $ ) {
  
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
  
})( jQuery )