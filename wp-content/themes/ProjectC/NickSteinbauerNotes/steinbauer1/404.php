<?php get_header(); ?>



		
<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>
	
	<section id="deco">
		<div class="inside clearfix">
			<div id="main_content" class="clearfix">
				
<h1 class="error">Whoops, 404!</h1>
			<blockquote>We're sorry, we can't find what you're looking for. It's
        probably our fault. Please use the navigation above or below and try
        again!</blockquote>
			
			
			<?php get_search_form(); ?>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article>
					
					<h2><?php the_title(); ?></h2>
					<div class="content">
						<?php the_excerpt(); ?>
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











