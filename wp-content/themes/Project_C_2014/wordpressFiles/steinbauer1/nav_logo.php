<?php
/*
	This is my Nav and Logo header, use on every page.
*/
?>	
	<nav id="nav_main" class="clearfix">
	<div class="inside">
		<div class="border_top"></div>
<?php
    $main_nav_header_left = array(
      'theme_location' => 'main-nav-header-left',
      'container' => 'nav',
      'menu_class'  => 'left',
      'container_id' => 'header-main-nav',
      'depth' => 1
    );
?>
<?php wp_nav_menu( $main_nav_header_left ); ?>
		<div class="border_bottom"></div>

		<div class="logo"><div><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="NickSteinbauer Logo"><h1>Nick Steinbauer</h1></div></div>
		
		<div class="border_top right"></div>
<?php
    $main_nav_header_right = array(
      'theme_location' => 'main-nav-header-right',
      'container' => 'nav',
      'menu_class'  => 'right',
      'container_id' => 'header-main-nav-right',
      'depth' => 1
    );
?>
<?php wp_nav_menu( $main_nav_header_right ); ?>

		<div class="border_bottom right"></div>

	</div>
	</nav><!-- end of nav#nav_main -->