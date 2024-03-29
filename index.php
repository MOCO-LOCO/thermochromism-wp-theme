<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thermochromism
 */

get_header(); ?>

<ins class="google-ad" id="google-banner-a"></ins> 

<main id="content" class="main-body">

	<?php 
	if ( have_posts() ) :
  		while ( have_posts() ) : the_post(); get_template_part( 'content', get_post_format() );endwhile; 
			thermochromism_paging_nav();
		else :
  			get_template_part( 'content', 'none' );
	endif; ?>

</main>


<?php get_footer(); ?>
