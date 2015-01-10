(function ( adsbygoogle ) {
  if(!adsbygoogle){
    window.adsbygoogle = [{}];  
  }
})( window.adsbygoogle )

var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];



(function() {
  var gads = document.createElement('script');
  gads.async = true;
  gads.type = 'text/javascript';
  var useSSL = 'https:' == document.location.protocol;
  gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
  var node = document.getElementsByTagName('script')[0];
  node.parentNode.insertBefore(gads, node);
})();

googletag.cmd.push(function() {
 

  var mapping2 = googletag.sizeMapping().
    addSize([300, 50], [320,50]).
    addSize([500, 100], [320, 100]). 
    addSize([800, 200], [728,90]). 
    addSize([900, 300], [970,250]). 
    build();



var gptAdSlots = [
  googletag.defineSlot(
    '/1007845/320x100',
     [320, 50], 
     'div-gpt-ad-1400338156009-0'
  ).defineSizeMapping(mapping2).addService(googletag.pubads() ).setCollapseEmptyDiv(true),
  googletag.defineSlot('/1007845/300x250_Mobile', [300, 250], 'google-ad-square').defineSizeMapping(mapping2).addService(googletag.pubads()).setCollapseEmptyDiv(true),
  googletag.defineSlot('/1007845/moco_728x90_homepage', [728, 90], 'google-ad-banner-a').defineSizeMapping(mapping2).addService(googletag.pubads()).setCollapseEmptyDiv(true),
  googletag.defineSlot('/1007845/moco_970x250_homepage', [970, 250], 'google-ad-banner-b').defineSizeMapping(mapping2).addService(googletag.pubads()).setCollapseEmptyDiv(true)

];

  googletag.pubads().addEventListener('slotRenderEnded', function(slotEvent) {
    console.log(slotEvent);
    if (slotEvent.isEmpty) {
      // custom code to do something else.
    }
  });
  googletag.pubads().enableSingleRequest();
  googletag.enableServices();
  
}); //cmd.push()

googletag.cmd.push(function() { 
      googletag.display('google-ad-banner-a'); 
      googletag.display('google-ad-banner-b');
       googletag.display('google-ad-square'); 
});
