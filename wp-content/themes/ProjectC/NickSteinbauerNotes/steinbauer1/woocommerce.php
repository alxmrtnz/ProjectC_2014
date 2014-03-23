<?php get_header(); ?>
<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>

	<section id="deco">
		<div class="inside clearfix">
		
		<nav class="breadcrumb clearfix">
			<p><?php if( function_exists( 'bcn_display' ) ) {
				bcn_display();
				} ?></p>
        </nav><!-- breadcrumb -->


		
			<div id="main_content" class="clearfix">
				
				<?php woocommerce_content(); ?>
			
			
			</div><!-- end of div#main_content -->
			
			<?php get_sidebar( 'aside' ); ?> <!-- sidebar-aside.php -->
			
		</div><!-- end of div.inside -->
	</section><!-- end of section#deco -->

	<?php get_sidebar( 'above-footer' ); ?> <!-- sidebar-aside.php -->



<?php get_footer(); ?> 
