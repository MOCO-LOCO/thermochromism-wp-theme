<?php 


function moco_jobs_widget(){
    ?><script type="text/javascript" id="jb_scr_mini">
            (function () {
                    var src = document.createElement('script');
                            src.type = 'text/javascript';
                            src.async = true;
                            src.src = document.location.protocol + "//www.coroflot.com/javascripts/partners/mocoloco_mini.js?number_of_jobs=3";
                            document.getElementsByTagName('head')[0].appendChild(src);
            } ());
    </script><?php
}

function moco_sponsor( $name='' )
{
    
	/* Architonic Ad */
	if( $name == 'architonic' ):
		echo '<a id="architonic-ad" class="moco-ad" href="http://www.architonic.com/" target="_blank" title="Architonic | architecture and design"><img src="http://mocoloco.com/gmida/architonic_145x120px_130108.gif" title="Architonic" title="Architonic | architecture and design" alt="Architonic | architecture and design" width="145" height="120" border="0"></a>';
	endif;    
	
	/* Moco Jobs Ad */
	if( $name == 'jobs' ):
		echo '<a id="moco-jobs-ad" class="moco-ad" href="http://mocoloco.com/jobs/" target="_blank" title="MOCO Jobs"><img src="http://mocojobs.com/stage/wp-content/uploads/2014/07/moco_jobs_145x120.jpg"  title="MOCO Jobs" alt="MOCO Jobs" width="145" height="120" border="0"></a>';
	endif;

}

function moco_sponsor_architonic(){

	moco_sponsor( 'architonic' );

}

function moco_sponsor_jobs(){

	moco_sponsor( 'jobs' );

}

function moco_advertise_on_moco()
{
    
	echo '<a id="moco-ad-network" style="text-decoration:none" href="http://mocoloco.com/advertising.php">Advertising directly on <b>MoCo Loco</b> is quick, simple, precisely targeted and cost-effective: <u>learn more</u></a>';

}

function moco_copyright(){

	$year = date("Y");
	echo "&copy; 2003 - $year MoCo Loco";

}

?>
