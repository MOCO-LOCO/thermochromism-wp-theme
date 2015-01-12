<?php
/**
 * @package Thermochromism
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('sub'); ?>>

  <header class="sub-head" style="background-image:url('<?php thermochromism_post_header_image_src(); ?>');">
      <?php the_title( sprintf( '<h1 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    	<?php thermochromism_post_header_meta_content(); ?>
  </header><!-- 
   --><ins class="google-ad" id="google-banner-a"></ins><!-- 
   --><div class="sub-body">
      <?php the_content(); ?>
      <!-- 
   --><footer class="sub-foot"><?php thermochromism_post_footer_meta_content(); ?></footer>
  </div>
    
</article>
