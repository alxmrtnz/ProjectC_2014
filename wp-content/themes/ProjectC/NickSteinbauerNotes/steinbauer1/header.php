<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>;
        charset=<?php bloginfo( 'charset' ); ?>">

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider/flexslider.css" type="text/css" media="screen" />


<title><?php wp_title( '|' ); ?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class( 'container' ); ?>>

<section id="main">
