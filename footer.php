<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Thermochromism
 */
?>

<aside class="moco-large-promo">
	<?php moco_advertise_on_moco(); ?>
</aside> 
  
<ins class="google-ad" id="div-gpt-ad-1400338571847-0"></ins> 
  


<footer id="masthead" class="main-foot">
	

	<div id="moco-sponsors" class="promo">
		<h1>Sponsors</h1>
		<?php 
			moco_sponsor_architonic();
		 	moco_sponsor_jobs();   
		?>
 	</div>

 	<div id="moco-jobs"  class="promo">
 		<h1>Jobs</h1>
 		<?php moco_jobs_widget();  ?>
 	</div>

	<div id="moco-card" class="info">
		<h1>MoCo Loco</h1>
		<ul>
			<li><a href="#">qwer qwer qwr qwr</a></li>
			<li><a href="#">qwer qwer qwr qwr</a></li>
			<li><a href="#">qwer qwer qwr qwr</a></li>
			<li><a href="#">qwer qwer qwr qwr</a></li>

		</ul>
		<p class="copyright">
			<?php moco_copyright(); ?>
		</p>
	</div>

      	<?php #get_sidebar(); ?>
     			
   </footer>
	
   <nav id="navigation">
      <button class="navigation-toggle"><?php _e( 'Menu', 'thermochromism' ); ?></button>
      <?php thermochromism_nav_menu(array( 'theme_location' => 'primary', 'container' => false) ); ?>
    </nav>


<?php wp_footer(); ?>

</body>
</html>
