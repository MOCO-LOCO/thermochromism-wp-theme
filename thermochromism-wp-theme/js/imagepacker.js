window.viewportUnitsBuggyfill.init();
!(function ( $ ) {

        var cells=2;
       // if( $(window).width() < 900 ){ return }
  // $('header').each( function () {
  //   var h = (this.offsetHeight||$(this).height()) + 'px';
  //   $(this).css( { height: h, minHeight: h, maxHeight: h });
  // })
    $(function () {

        $container = $('.images');
        $parent      =  $container.parent('.sub-body');
        var height  = $parent.height();
        var width   = $container.width();
        var pack;
        
        

    

        if( $container.length ){
          
            var $images = $container.children('img');
            var total  = $images.length;
            var loaded = 0;
            var init = true;
             if( total ){
                var complete = function () {
                    if( init){
                        init = false;
                        $images.map(function () {
                            $i = $( this );
                            var shape = $i.data('shape');

                            $wrap = $('<a>').attr('href', $i.attr('src') ).addClass('image-link ' + $i.data('shape'));
                            $wrap.css('background-image', 'url('+$i.attr('src')+')');
                            $wrap.appendTo( $container );
                            if( shape === 'square'){
                                $wrap.css('width', width/2);
                                $wrap.css('height', width/2);
                            }
                             if( shape === 'portrait'){
                                $wrap.css('height', width);
                            }
                              if( shape === 'landscape'){
                                $wrap.css('width', width);
                            }
                        })
                        pack = new Packery($container.get(0), {transitionDuration:0,isOriginLeft: false, itemSelector: '.image-link', containerStyle: null});
                    }
                    if( $(window).width < 900 ){
                        pack.unbindResize();
                        $container.css({
                            height: 'auto',
                            overflow: 'hidden'
                        } );

                        $parent.css('height', 'auto');
                        
                    }else{
                        pack.layout()
                        pack.bindResize();
                    
                    }
              
                }
                //       var complete = function () {
                //       var width = $container.width();
                //       var mult = (width / 2 ) * ( cells  / 2);
                //       // $container.add( $parent ).css({height: mult, minHeight: mult });
                //       $images.each( function () {
                //               var $i = $( this ).css('opacity', 1);
                //               var $wrap = $('<a>');
                //               var shape = $i.data('shape');
                //               var h = Math.floor( height / ($images.length*2)  );
                //               $wrap.addClass( "image-link  " + shape ).attr( 'href', $i.attr('src') );
                //               $wrap.css({ 'background-image': 'url(' + $i.attr('src') + ')'});
                //               $container.prepend( $wrap );
                //               $wrap.on('click', function  ( e ) {
                //                     $('#navigation').hide()
                //                     e.preventDefault();
                //                     var $cl = $(this).clone(false).addClass('preview').appendTo('body')
                //                     $cl.one('click', function  (e) {
                //                                                             e.preventDefault();
                //                         $('#navigation').show()
                //                         $cl.remove();                                  })
                //                   $i.toggleClass('preview')
                //               });

                                              
                //     });
                //     new Packery($container.get(0), {transitionDuration:0,isOriginLeft: false, itemSelector: '.image-link', containerStyle: null});
                //   }
        $images.each( function ( ) {
          var $i = $( this );
          $i.on('error', function () {
            loaded++;
          }).one('load', function () {      
            var w = $i.width(), h = $i.height(), klass = '';
            cells+=1;
            klass = 'square';
            if( w > h ){
              klass = 'landscape';
              cells+=1;
            }else if( h > w){
              klass = 'portrait';
              cells+=1;
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