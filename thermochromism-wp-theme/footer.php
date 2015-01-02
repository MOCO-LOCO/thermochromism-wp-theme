<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Thermochromism
 */
?>


  
  
  <ins class="google-ad" id="div-gpt-ad-1400338571847-0"></ins> 
  
  
	<footer id="masthead">
	
	    <?php #get_sidebar(); ?>
			<!--<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'thermochromism' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'thermochromism' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>-->
			<?php printf( __( 'Theme: %1$s by %2$s.', 'thermochromism' ), 'Thermochromism', '<a href="http://mocoloco.com" rel="designer">Francois Lafortune</a>' ); ?>
			
	</footer>
	
	<nav id="navigation">
  
    <button><?php _e( 'Menu', 'thermochromism' ); ?></button>
    <?php thermochromism_nav_menu(array( 'theme_location' => 'primary', 'container' => false) ); ?>
    
  </nav>


<?php wp_footer(); ?>

</body>
</html>
