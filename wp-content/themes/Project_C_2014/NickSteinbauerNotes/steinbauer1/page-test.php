<?php
/*
Template Name: Test Page
*/
get_header(); ?>
<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>

	<section id="deco">
		<div class="inside clearfix">
		
		<nav class="breadcrumb">
			<p><?php if( function_exists( 'bcn_display' ) ) {
				bcn_display();
				} ?></p>
        </nav><!-- breadcrumb -->
		
		<?php the_post_thumbnail(); ?>
		
			<div id="main_content" class="clearfix">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article>
					<h1><?php the_title(); ?></h1>
					
					
					
					<div class="content">
					
					<?php if( get_the_excerpt() ) { ?>
					<blockquote class="tagline"><?php echo get_the_excerpt(); ?></blockquote>
					<?php } ?>
					
						<?php the_content(); ?>
					</div>
				</article>


			
			
			<?php endwhile; else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				

			<?php endif; ?>
			


			</div><!-- end of div#main_content -->
			
			<?php get_sidebar( 'aside' ); ?> <!-- sidebar-aside.php -->
			
		</div><!-- end of div.inside -->
	</section><!-- end of section#deco -->
	
	<?php get_sidebar( 'above-footer' ); ?> <!-- sidebar-aside.php -->



<?php get_footer(); ?> 
