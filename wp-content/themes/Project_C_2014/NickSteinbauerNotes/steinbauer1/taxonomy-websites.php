<?php get_header(); ?>



		
<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>
	
	<section id="deco">
		<div class="inside clearfix">
			<div id="main_content_graphics" class="clearfix">
				
			<h1>These are my Websites</h1>

			
			<ul class="graphics">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<li>
				<?php the_post_thumbnail( 'post-thumb' ); ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="content">
						<?php the_field('custom_excerpt'); ?>
						
						<h3><a href="<?php the_permalink(); ?>">View <?php the_title(); ?></a></h3>
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











