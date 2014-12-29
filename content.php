<?php
/**
 * @package Thermochromism
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="title" style="background-image:url('<?php thermochromism_post_header_image_src(); ?>');">
      <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    	<?php thermochromism_posted_on(); ?>
      <span class="share">
          	<?php thermochromism_social_share_buttons(  ); ?>
      </span>
	</header>
	
	<aside class="party">
	</aside>
  
  
  
	<footer class="meta">
	
	
		<?php thermochromism_entry_footer(); ?>
	</footer>
	
	
</article>