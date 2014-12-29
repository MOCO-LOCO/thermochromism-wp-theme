<?php
/**
 * @package Thermochromism
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="title" style="background-image:url('<?php thermochromism_post_header_image_src(); ?>');">
      <?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
    	<?php thermochromism_posted_on(); ?>
	</header>

  <ins class="google-ad" id="div-gpt-ad-1400338571847-0"></ins> 

	<div class="body">
		<?php the_content(); ?>
	</div>

  <ins class="google-ad" id="div-gpt-ad-1400338571847-0"></ins> 

	<footer class="meta">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thermochromism' ),
				'after'  => '</div>',
			) );
		?>
		<?php thermochromism_entry_footer(); ?>
	</footer>
	
</article>
