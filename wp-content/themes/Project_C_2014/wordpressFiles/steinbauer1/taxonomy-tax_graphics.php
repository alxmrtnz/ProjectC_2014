<?php get_header(); ?>



		
<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>
	
	<section id="deco">
		<div class="inside clearfix">
			<div id="main_content_graphics" class="clearfix">
				
			<h1>These are my Graphics</h1>

			
			<ul class="graphics">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<li>
				<?php the_post_thumbnail( 'post-thumb' ); ?>
					<h2><?php the_title(); ?></h2>
					<div class="content">
						<?php the_excerpt(); ?>
					</div>
				</li>
			<?php endwhile; else: ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>
			</ul><!-- end of ul.graphics -->

			</div><!-- end of div#main_content -->
			
			
		</div><!-- end of div.inside -->
	</section><!-- end of section#deco -->
	
	
			<?php get_sidebar( 'above-footer' ); ?> <!-- sidebar-aside.php -->
	
	
<?php get_footer(); ?> 











