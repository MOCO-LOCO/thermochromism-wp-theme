<?php

$fb_appid = '1510080215872330';


function thermochromism_post_share_links(  ){
  if ( 'post' != get_post_type() ){  return false; }
  global $wp;
  global $fb_appid;
  $title = (get_the_title() || '');
  $description = (get_the_title() || '');
  $url = get_permalink();
  
  $title = urlencode($title);
  $description = urlencode($description);
  $tag = get_bloginfo('name');
  $image = urlencode(thermochromism_post_header_image_src(false));
  $current_url = urlencode(trailingslashit( add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) ));
  $url = urlencode($current_url);
  $fburl = "https://www.facebook.com/dialog/share?app_id=$fb_appid&display=popup&href=$url&redirect_uri=$current_url";
  $twurl = "https://twitter.com/share?url=$url&text=$title&hashtags=$tag";
  $tmurl = "http://www.tumblr.com/share/photo?source=$image&caption=$title&clickthru=$url";
  $facebook  = "<a title=\"Share on Facebook\" class=\"facebook\" href=\"$fburl\"><i class=\"fa fa-facebook\"></i></a>";
  $twitter   = "<a title=\"Share on Twitter\"  class=\"twitter\"  href=\"$twurl\"><i class=\"fa fa-twitter\"></i></a>";
  $tumblr   = "<a title=\"Share on Tumblr\"    class=\"tumblr\"   href=\"$tmurl\"><i class=\"fa fa-tumblr\"></i></a>";
  echo '<span class="social">' . $facebook . $twitter . $tumblr. '</span>'; 
}

function thermochromism_post_category_links(){
  if ( 'post' != get_post_type() ){  return false; }
  $list = get_the_category_list( __( ', ', 'thermochromism' ) );
  echo '<span class="categories">' . strip_tags($list, '<a>'). '</span>';
}

function thermochromism_post_author_links(){
  if ( 'post' != get_post_type() ){  return false; }
  $author_string = _x( 'by %s', 'post author', 'thermochromism' );
  $author_link = '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';
  echo '<span class="author">' . sprintf( $author_string , $author_link ) . '</span>';
}


function thermochromism_post_date_links( ){
  if ( 'post' != get_post_type() ){  return ''; }
  $posted_on = '';
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date updated" data-published-datetime="%1$s" data-published-text="%2$s" datetime="%3$s">%4$s</time>';
	}
  if( !empty($time_string) ){
  	$time_string = sprintf( $time_string,
  		esc_attr( get_the_date( 'c' ) ),
  		esc_html( get_the_date() ),
  		esc_attr( get_the_modified_date( 'c' ) ),
  		esc_html( get_the_modified_date() )
  	);
  	$posted_on_string = _x( 'Posted on %s', 'post date', 'thermochromism' );
  	$posted_on_anchor = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
  	echo '<span class="publication">' . sprintf( $posted_on_string , $posted_on_anchor ) . '</span>';
  }
}

function thermochromism_post_tag_links( ){
  if ( 'post' != get_post_type() ){  return ''; }
  $tags_list = get_the_tag_list( '', __( ', ', 'thermochromism' ) );
  if ( $tags_list && is_single() ) {
    printf( '<span class="tags">' . __( 'Tagged %1$s', 'thermochromism' ) . '</span>', $tags_list );
  }
}

function thermochromism_page_nav_links() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) { return; }
	$previous_link = previous_post_link( '<div class="previously">%link</div>', _x( '<cite>%title</cite>', 'Previous post link', 'thermochromism' ) );
	$next_link = next_post_link(     '<div class="nextup">%link</div>',     _x( '<cite>%title</cite>', 'Next post link',     'thermochromism' ) );
	if( !empty( $previous_link ) ){
	  $previous_link = str_replace('<a', '<a class="previous" ', $previous_link);
	}
	if( !empty( $next_link ) ){
	  $next_link = str_replace('<a', '<a class="previous" ', $next_link);
	}
	echo '<span class="other">'.$previous_link.$next_link.'</span>';
}

function thermochromism_post_header_meta_content(){
  if ( 'post' != get_post_type() ){  return ''; }
  ?>
  
    <aside class="share-out">
      <?php thermochromism_post_share_links(); ?>
    </aside>
    
    <div class="meta">
      <?php 
        thermochromism_post_category_links(); 
        thermochromism_post_date_links(); 
        #thermochromism_post_author_links();
      ?>
    </div>
    
  <?php
}

function thermochromism_post_footer_meta_content(){
  if ( 'post' != get_post_type() ){  return ''; }
  ?>
  
    <div class="meta">
      <?php thermochromism_post_tag_links(); ?>
      <aside class="party"></aside>
    </div>
    
  <?php
}

function thermochromism_page_footer_meta_content(){
  ?>
  
    <div class="meta">
      <?php thermochromism_page_nav_links(); ?>
    </div>
    
  <?php
}


/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Thermochromism
 */
 
 if ( ! function_exists( 'thermochromism_nav_menu' ) ) :
 /**
  * Display navigation to next/previous set of posts when applicable.
  */
 function thermochromism_nav_menu( $args ) {
   $args['echo'] = 0;
   $m = wp_nav_menu($args); 
   echo strip_tags($m, '<a>'); 	
 }
 endif;


if ( ! function_exists( 'thermochromism_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function thermochromism_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'thermochromism' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'thermochromism' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'thermochromism' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'thermochromism_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function thermochromism_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) { return; }
	?>
	<nav id="elsewhere">
			<?php
		    previous_post_link( '<div class="previously">%link</div>', _x( '<cite>%title</cite>', 'Previous post link', 'thermochromism' ) );
				next_post_link(     '<div class="nextup">%link</div>',     _x( '<cite>%title</cite>', 'Next post link',     'thermochromism' ) );
			?>
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'thermochromism_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function thermochromism_posted_on() {
  
  if ( 'post' != get_post_type() ){
    return '';
  }
  
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date updated" data-published-datetime="%1$s" data-published-text="%2$s" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'thermochromism' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'thermochromism' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="meta"><span class="cats">'. get_the_category_list( __( ', ', 'thermochromism' ) ) ."</span>" . $posted_on . '</span>';//'<span class="byline"> ' . $byline . '</span>';

}
endif;


if ( ! function_exists( 'thermochromism_post_header_image_src' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function thermochromism_post_header_image_src( $print=true ) {
	// Header image because feature iamge is harder to fallback than just doing this.
	if ( 'post' == get_post_type() ) {
	  
    $src = (get_header_image()||'');
	  if( has_post_thumbnail() ){
	    $html = get_the_post_thumbnail();
	  }else{
	    $html = get_the_content();
	  }
	  $dom  = new DOMDocument();
	  if( !$html ){
	    return '';
	  }
	  $dom->loadHTML( $html );
    $xpath = new DOMXPath( $dom );
    $image = $xpath->query( '//img|a[img][0]' );
    if( count( $image ) == 0 ){
      $src = get_header_image();
    }else{
      $item = $image->item(0);
      if( $item ){
        $src = $item->getAttribute('src');
      }
    }
    if($print){
      print $src;
    }
    return $src;
	}


}

endif;

if ( ! function_exists( 'thermochromism_post_header_image' ) ) :
/**
 * Header image because feature iamge is harder to fallback than just doing this.
 */
function thermochromism_post_header_image() {

	if ( 'post' == get_post_type() ) {
	  print "<img src=\"".thermochromism_post_header_image_src( false )."\" width=\"1000\" />";
	}

}

endif;

if ( ! function_exists( 'thermochromism_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function thermochromism_entry_footer() {
  
    $tags_list = get_the_tag_list( '', __( ', ', 'thermochromism' ) );
    
    if ( $tags_list && is_single() ) {
      printf( '<nav id="tags">' . __( 'Tagged %1$s', 'thermochromism' ) . '</nav>', $tags_list );
    }
    
    /*translators: used between list items, there is a space after the comma */
      // $tags_list = get_the_tag_list( '', __( ', ', 'thermochromism' ) );
      // if ( $tags_list ) {
      //   printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'thermochromism' ) . '</span>', $tags_list );
      // }
	// Hide category and tag text for pages.
	// if ( 'post' == get_post_type() ) {
	//     /* translators: used between list items, there is a space after the comma */
	//     $categories_list = get_the_category_list( __( ', ', 'thermochromism' ) );
	//     if ( $categories_list && thermochromism_categorized_blog() ) {
	//       printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'thermochromism' ) . '</span>', $categories_list );
	//     }
	// 
	//     /* translators: used between list items, there is a space after the comma */
	//     $tags_list = get_the_tag_list( '', __( ', ', 'thermochromism' ) );
	//     if ( $tags_list ) {
	//       printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'thermochromism' ) . '</span>', $tags_list );
	//     }
	//   }
	// 
	//   if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	//     echo '<span class="comments-link">';
	//     comments_popup_link( __( 'Leave a comment', 'thermochromism' ), __( '1 Comment', 'thermochromism' ), __( '% Comments', 'thermochromism' ) );
	//     echo '</span>';
	//   }

	//edit_post_link( __( 'Edit', 'thermochromism' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'thermochromism' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'thermochromism' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'thermochromism' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'thermochromism' ), get_the_date( _x( 'Y', 'yearly archives date format', 'thermochromism' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'thermochromism' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'thermochromism' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'thermochromism' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'thermochromism' ) ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = _x( 'Asides', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = _x( 'Galleries', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = _x( 'Images', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = _x( 'Videos', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = _x( 'Quotes', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = _x( 'Links', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = _x( 'Statuses', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = _x( 'Audio', 'post format archive title', 'thermochromism' );
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = _x( 'Chats', 'post format archive title', 'thermochromism' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'thermochromism' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'thermochromism' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'thermochromism' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function thermochromism_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'thermochromism_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'thermochromism_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so thermochromism_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so thermochromism_categorized_blog should return false.
		return false;
	}
}






/**
 * Flush out the transients used in thermochromism_categorized_blog.
 */
function thermochromism_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'thermochromism_categories' );
}
add_action( 'edit_category', 'thermochromism_category_transient_flusher' );
add_action( 'save_post',     'thermochromism_category_transient_flusher' );
