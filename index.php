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

<header id="brand" style="background-image:url('<?php header_image(); ?>');">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <h1 class="name"><?php bloginfo( 'name' ); ?></h1>
      <h2 class="tagline"><?php bloginfo( 'description' ); ?></h2>
   </a>
</header>
 

<ins class="google-ad" id="div-gpt-ad-1400338571847-0"></ins> 


<main id="content">

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
		<?php
		if ( get_post_gallery() ) :
		  
            $gallery = get_post_galleries_images( get_the_ID(), false );
            
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] AS $src )
            {
                ?>
                
                <img src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" />
                
                <?php
            }
    endif;
		?>

	<?php endwhile; ?>

	<?php thermochromism_paging_nav(); ?>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

</main>


<?php get_footer(); ?>
