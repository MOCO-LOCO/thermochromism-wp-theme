<?php
/**
 * The template for displaying all single posts.
 *
 * @package Thermochromism
 */

get_header(); ?>

  <header id="brand" style="background-image:url('<?php header_image(); ?>');">
     <h1 class="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
     <h2 class="tagline"><?php bloginfo( 'description' ); ?></h2>
  </header>
  
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

      <nav class="timeline">
        <?php thermochromism_page_footer_meta_content(); ?>
      </nav>
			
      
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				//if ( comments_open() || get_comments_number() ) :
				//	comments_template();
				//endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->



<?php get_footer(); ?>
