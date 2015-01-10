<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Thermochromism
 */
?>

<article id="page-<?php the_ID(); ?>" <?php post_class('sub'); ?>>

	<header class="sub-head" style="background-image:url('<?php thermochromism_post_header_image_src( ); ?>');">
    <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    <?php thermochromism_post_header_meta_content(); ?>
	</header>

	<div class="body">
		<?php the_content(); ?>
	</div>

	<footer class="meta">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thermochromism' ),
				'after'  => '</div>',
			) );
		?>
		<?php edit_post_link( __( 'Edit', 'thermochromism' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	
</article>
