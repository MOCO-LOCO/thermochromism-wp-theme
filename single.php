<?php
/**
 * The template for displaying all single posts.
 *
 * @package Thermochromism
 */

get_header(); ?>

<main id="main" class="main-body" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
              
              	<?php get_template_part( 'content', 'single' ); ?>

                     	<nav class="timeline">
                            	<?php thermochromism_page_footer_meta_content(); ?>
                            </nav>
            			
                  
    		<?php
    			//If comments are open or we have at least one comment, load up the comment template
    			if ( comments_open() || get_comments_number() ) :
    				comments_template();
    			endif;
    		?>

	<?php endwhile; ?>

</main><!-- #main -->



<?php get_footer(); ?>
