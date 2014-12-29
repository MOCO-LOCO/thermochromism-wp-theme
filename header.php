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
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- font_awesome: -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- /font_awesome -->

<!-- google_font: 
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic,300italic,300|Open+Sans:700,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
 /google_font -->

<?php wp_head(); ?>
</head>

<body <?php body_class('dev'); ?>>

 
  

	
	
