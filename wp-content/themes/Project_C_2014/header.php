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


	<!-- form for ajax login, found here: natko.com/wordpress-ajax-login-without-a-plugin-the-right-way/-->
	<!-- check this for possible confirmation emails to new accounts: http://wordpress.org/support/topic/stop-spam-confirmation-emails-to-all-new-registrations maybe this too: http://wordpress.org/plugins/pie-register/ and maybe this: http://wordpress.org/plugins/dm-confirm-email/screenshots/ -->
	<form id="login" action="login" method="post" class="loginForm">
        <h1>Site Login</h1>
        <p class="status"></p>
        <label for="username">Username</label>
        <input id="username" type="text" name="username">
        <label for="password">Password</label>
        <input id="password" type="password" name="password">
        <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
        <input class="submit_button" type="submit" value="Login" name="submit">
        <a class="close" href="">(close)</a>
        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
    </form>
    
    
    

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
	                 
	                 
	                 <li class="signIn right">
		                 
		                 <?php if (is_user_logged_in()) { ?>
						    <a class="login_button" href="<?php echo wp_logout_url(get_permalink() ); ?>"> 
						    	<!--wordpress.org/support/topic/avatar-display-for-logged-in-users-->
						    	<?php global $userdata; get_currentuserinfo(); echo get_avatar( $userdata->ID, 20 ); ?>Sign Out
						    </a>
						<?php } else { ?>
						    <a class="login_button" id="show_login" href="">Sign In</a>
						<?php } ?>
	                 </li>
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
