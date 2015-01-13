/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

( function($) {
    console.log('nav', $)
$(function  () {
    var $nav = $('#navigation');
    var $tog =  $('#navigation .navigation-toggle');
    $tog.on('click touchstart',function (e) {
        if( e.type === 'touchstart'){
            $tog.off('click');
        }else{
             $tog.off('touchstart');
        }
        e.preventDefault()
        console.log('QWERQWEr');
        $nav.toggleClass('toggled').removeClass('nav-up')
    });
   
})
 
} )(jQuery);
