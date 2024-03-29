<?php
/**
 * The template for displaying search results pages.
 *
 * @package Thermochromism
 */

get_header(); ?>


     
<ins class="google-ad" id="google-banner-a"></ins> 

<main id="main" class="main-body">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'thermochromism' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
			?>

		<?php endwhile; ?>

		<?php thermochromism_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</main><!-- #main -->



<?php get_footer(); ?>
