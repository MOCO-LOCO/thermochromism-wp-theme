<?php
/**
 * @package Thermochromism
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="title" style="background-image:url('<?php thermochromism_post_header_image_src(); ?>');">

      <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    	<?php thermochromism_post_header_meta_content(); ?>
  	
  </header>

  <footer class="meta">

  	<?php thermochromism_post_footer_meta_content(); ?>
  	
    <aside class="small party"></aside>
	
  </footer>

</article>