<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html>
<head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="author" href="humans.txt">

    <!-- BEGIN WEB FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- END WEB FONTS -->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="wrapper">

	<header>

		<nav>
            <a class="home" href="/"><div></div></a>

			<?php

                $menu = array(
                    'theme_location'  => 'primary',
                    'menu'            => '',
                    'container'       => false,
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'mainNavItems',
                    'menu_id'         => 'nav',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => new Project_C_Standard_Menu
                );

                wp_nav_menu($menu);

             ?>
             <ul class="rightNavItems">
                 <li class="right"><a href="" class="donate">Donate</a></li>
                 <li class="signIn right"><a href="">Sign In</a></li>
                 <li class="menuLink right"><a href="">Menu</a></li>
             </ul>
		</nav>

	</header>
