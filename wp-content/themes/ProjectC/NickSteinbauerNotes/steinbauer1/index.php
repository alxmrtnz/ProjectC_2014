<?php get_header(); ?>



	<header id="slideshow">
		<div class="flexslider inside clearfix">
			<ul class="slides">
			
			<?php
				// Start WP_Query for only the ID's from above
				$first_query = new WP_Query(
					array(
						'post_type' => 'website',
						'posts_per_page' => 3,
						'order' => 'ASC',
						'tax_query' => 
							array(
							'taxonomy' => 'websites',
							'field' => 'slug',
							'terms' => 'slideshow'
							)
					)
				);
				?>
				 
				<?php while($first_query->have_posts()) : $first_query->the_post(); ?>				  
				    <li>
						<div class="left"><?php the_post_thumbnail( 'slideshow' ); ?></div>
						<div class="slide_text">
						
							<h1><?php the_title(); ?></h1>
							
							<?php the_field('custom_excerpt'); ?>
							
							<div style="margin-top:20px;"><a href="<?php the_permalink();?>"> View <?php the_title(); ?> &gt;</a></div>
							
						</div>
					</li>

				<?php endwhile; ?>
				  <!-- end of the loop -->
				  				
				<?php wp_reset_postdata(); ?>
								
							
			</ul>
		</div><!-- end of div.inside -->
	</header><!-- end of header#slideshow -->

<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>
	
	<section id="deco">
		<div class="inside clearfix">
			<div id="main_content" class="clearfix">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article>
					
					<h1><?php the_title(); ?></h1>
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











