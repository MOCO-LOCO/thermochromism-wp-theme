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
  var mapping1 = googletag.sizeMapping().
    addSize([0, 0], []).
    addSize([1200, 200], [970, 350]). // Desktop
    addSize([960, 300], [930, 180]). // Desktop
    addSize([600, 100], [468, 60]). // Desktop    
    addSize([320, 50], [320, 50]). // Desktop        
    build();
  var gptAdSlots = [];

  // This mapping will only display ads when user is on mobile or tablet sized viewport
  var mapping2 = googletag.sizeMapping().
    addSize([0, 0], []).
    addSize([320, 700], [300, 250]). // Tablet
    addSize([1050, 200], []). // Desktop
    build();

  // googletag.defineSlot('/1007845/320x100', [320, 50], 'div-gpt-ad-1400338156009-0').addService(googletag.pubads()).setCollapseEmptyDiv(true);
  // googletag.defineSlot('/1007845/300x250_Mobile', [300, 250], 'div-gpt-ad-1400338571847-0').addService(googletag.pubads()).setCollapseEmptyDiv(true);
  // googletag.defineSlot('/1007845/moco_728x90_homepage', [728, 90], 'div-gpt-ad-1400338156009-0').addService(googletag.pubads()).setCollapseEmptyDiv(true);
  gptAdSlots[0] = googletag.defineSlot('/1007845/moco_970x250_homepage', [970, 250], 'div-gpt-ad-1400338571847-0').addService(googletag.pubads()).setCollapseEmptyDiv(true);
  gptAdSlots[0].defineSizeMapping( mapping1 );
  gptAdSlots[0].setCollapseEmptyDiv( false );
    
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
      googletag.display('div-gpt-ad-1400338571847-0'); 
});
