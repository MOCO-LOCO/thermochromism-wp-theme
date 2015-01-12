<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thermochromism
 */

get_header(); ?>

<header class="main-head">
    <?php
	the_archive_title( '<h1 class="title">', '</h1>' );
    ?>
</header>

<main id="main" class="site-main" role="main">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php
			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
		?>

		<?php endwhile; ?>

		<?php thermochromism_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</main><!-- #main -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>
