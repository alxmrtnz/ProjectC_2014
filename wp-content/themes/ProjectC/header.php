<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html>
<head>

	<title><?php wp_title( '| Project C', true, 'right' ); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="author" href="humans.txt">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


    <!-- BEGIN WEB FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	    <!-- begin icon fonts -->
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fontello.css" type="text/css" >
	    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animation.css" type="text/css" >
	    <!--[if IE 7]>
	    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fontello-ie7.css">
	    <![endif]-->
	    <script>
	      function toggleCodes(on) {
	        var obj = document.getElementById('icons');

	        if (on) {
	          obj.className += ' codesOn';
	        } else {
	          obj.className = obj.className.replace(' codesOn', '');
	        }
	      }

	    </script>
		<!-- end icon fonts -->


    <!-- END WEB FONTS -->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="wrapper">

	<header>
		<div class="navWrapper">
			<nav class="mainNav">
	            <a class="logo" href="/"><div></div></a>

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
	                 <li class="menuLink right">Menu</li>
	             </ul>
			</nav>

			<nav class="mobile">
	            <div class="mobileHeight">
                <?php

                    $menu = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => false,
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'mobileNavItems',
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
                 <li class="signIn right"><a href="">Sign In</a></li>
            </div>
	        </nav>
		</div><!-- end .navWrapper -->
	</header>
