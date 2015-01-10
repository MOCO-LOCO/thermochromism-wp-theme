<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Thermochromism
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  
  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- font_awesome: -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- /font_awesome -->

<?php wp_head(); ?>
</head>

<body <?php body_class('main'); ?>>

 <header id="brand" class="main-head" style="background-image:url('<?php header_image(); ?>');">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <h1 class="name"><?php bloginfo( 'name' ); ?></h1>
      <h2 class="tagline"><?php bloginfo( 'description' ); ?></h2>
   </a>
</header>