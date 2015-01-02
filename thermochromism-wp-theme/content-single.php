<?php
/**
 * @package Thermochromism
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="title" style="background-image:url('<?php thermochromism_post_header_image_src(); ?>');">
      <?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    	<?php thermochromism_post_header_meta_content(); ?>
	</header>

  <ins class="google-ad" id="div-gpt-ad-1400338571847-0"></ins> 
	
  <?php the_content(); ?>
		
	<footer>
	
    <?php thermochromism_post_footer_meta_content(); ?>
		
	</footer>
	
</article>
