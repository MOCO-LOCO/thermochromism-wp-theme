<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thermochromism
 */
?>

<!-- Going with this fn: http://stackoverflow.com/questions/13517773/semantic-html-for-confirmation-error-and-warnings-messages -->
<aside class="message info-message">

  <strong class="title">
  	<?php _e( 'Nothing Found', 'thermochromism' ); ?>
  </strong>
  
  <p class="body">
    	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

  			<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'thermochromism' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>

  		<?php elseif ( is_search() ) : ?>

  			<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thermochromism' ); ?>
  			<?php #get_search_form(); ?>

  		<?php else : ?>

  			<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'thermochromism' ); ?></p>
  			<?php #get_search_form(); ?>

  		<?php endif; ?>
  </p>
  
</aside>
