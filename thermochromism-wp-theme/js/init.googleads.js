 var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
  (function() {
  var gads = document.createElement('script');
  gads.async = true;
  gads.type = 'text/javascript';
  var useSSL = 'https:' == document.location.protocol;
  gads.src = (useSSL ? 'https:' : 'http:') + 
  '//www.googletagservices.com/tag/js/gpt.js';
  var node = document.getElementsByTagName('script')[0];
  node.parentNode.insertBefore(gads, node);
  })();

  googletag.cmd.push(function() {
        if(window.innerWidth < 600 ){
        googletag.defineSlot('/1007845/320x100', [320, 50], 'google-banner-b').addService(googletag.pubads()).setCollapseEmptyDiv(true);
        googletag.defineSlot('/1007845/300x250_Mobile', [300, 250], 'google-banner-a').addService(googletag.pubads()).setCollapseEmptyDiv(true);        
      }else{
        googletag.defineSlot('/1007845/moco_728x90_homepage', [728, 90], 'google-banner-b').addService(googletag.pubads()).setCollapseEmptyDiv(true);
        googletag.defineSlot('/1007845/moco_970x250_homepage', [970, 250], 'google-banner-a').addService(googletag.pubads()).setCollapseEmptyDiv(true);
      }
     
    googletag.pubads().addEventListener('slotRenderEnded', function(slotEvent) {
      console.log(slotEvent,'#' + slotEvent.slot.getSlotId().getDomId());
      // $('#' + slotEvent.slot.getSlotId().getDomId()).remove()
      if( slotEvent.isEmpty ){
        // console.log(slotEvent.getSlotId());
        // custom code to do something else.
      }
     })

    googletag.pubads().enableSingleRequest( false );
    googletag.enableServices();
    googletag.cmd.push(function() { googletag.display('google-banner-a'); });
    googletag.cmd.push(function() { googletag.display('google-banner-b'); });
  });//cmd.push()