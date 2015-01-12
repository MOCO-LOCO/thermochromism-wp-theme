<?php
/**
 * Thermochromism functions and definitions
 *
 * @package Thermochromism
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'thermochromism_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various ad features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thermochromism_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Thermochromism, use a find and replace
	 * to change 'thermochromism' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'thermochromism', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
  add_filter('show_admin_bar', '__return_false');
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thermochromism' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',  'caption' #, 'gallery',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	
  
	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'thermochromism_custom_background_args', array(
	//     'default-color' => 'ffffff',
	//     'default-image' => '',
	//   ) ) );
	
	// Supports Custom Header Image
	add_theme_support( 'custom-header' );

  // Filter Post Images
  add_filter( 'the_content', 'thermochromism_restructure_post_images', 20 );
  
}
endif; // thermochromism_setup
add_action( 'after_setup_theme', 'thermochromism_setup' );


/**
 * Separate Images from Text Content if Detected
 *
 */

function thermochromism_restructure_post_images( $content ){
  
  $dom = new DOMDocument();
  $dom->loadHTML( $content );
  $xpath  = new DOMXPath( $dom );

  $images = $xpath->query('//img|//a[img]');

  if( count( $images ) == 0){
    return $content;
  }
  
  
    
  $textbox  = $dom->createElement('div');
  $gallery  = $dom->createElement('div');
  
  $gallery->setAttribute('class','images');
  $textbox->setAttribute('class','text');  
  

  foreach( $images as $image ){
    if( $image->nodeName === 'p' ){
      $image = $image->getElementsByTagName('img');
    }
    $gallery->appendChild( $image );
  }
  
  $others = $xpath->query('/*');
  
  foreach( $others as $other ){
    $textbox->appendChild( $other );
  }

  $dom->appendChild(  $gallery );
  $dom->appendChild(  $textbox );
  
  // Cleanup 
  
  $anchors = $xpath->query('//a|//p');
  
  foreach( $anchors as $anchor ){
    if(!$anchor->hasChildNodes() ){
      $anchor->parentNode->removeChild( $anchor );      
    }
  }
  
  return $dom->saveHTML();
  
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function thermochromism_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'thermochromism' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'thermochromism_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thermochromism_scripts() {
	wp_enqueue_style( 'thermochromism-style', get_stylesheet_uri() );

  wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'thermochromism-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'thermochromism-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  # Dont load front-end in admin (esp. social)!
  if( !is_admin() ){
     //wp_enqueue_script( 'thermochromism-adsbygoogle', 'http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js' );
     wp_enqueue_script( 'thermochromism-init-google-ads', get_bloginfo('template_directory') . '/js/init.googleads.js' );

    wp_enqueue_script( 'thermochromism-bower', get_bloginfo('template_directory') . '/js/bower.js' );
    
    wp_enqueue_script( 'thermochromism-imagepacker', get_bloginfo('template_directory') . '/js/imagepacker.js', array(), time(), true  );
        wp_enqueue_script( 'thermochromism-scolling', get_bloginfo('template_directory') . '/js/scrolling.js', array(), time(), true  );

        wp_enqueue_script( 'thermochromism-development', get_bloginfo('template_directory') . '/js/dev.js', array(), time(), true  );

    // # Tumblr Share
    //    wp_enqueue_script( 'thermochromism-share-on-tumblr', 'http://platform.tumblr.com/v1/share.js', array('jquery') );
    //    
    //    # Twitter Share
    //    wp_enqueue_script( 'thermochromism-share-on-twitter', get_bloginfo('template_directory') . '/js/init.twitter.js', array('jquery') );
    //    
    //    # Facebook SDK
    //    wp_register_script( 'facebook-sdk',
    //       'http://connect.facebook.net/en_US/all.js',
    //       array(), '', TRUE);
    //    wp_enqueue_script( 'facebook-sdk' );
    //    # Feacbook share register and load the facebook initalizer script
    //    wp_register_script('facebook-init',
    //        get_bloginfo('template_directory') . '/js/init.facebook.js',
    //        array('jquery','facebook-sdk'), '1.0', TRUE);
    //    wp_enqueue_script('facebook-init');
  }
  
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'thermochromism_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom template tags for Moco.
 */
require get_template_directory() . '/inc/moco-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
