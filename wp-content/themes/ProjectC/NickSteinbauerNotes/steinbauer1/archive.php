<?php get_header(); ?>



		
<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>
	
	<section id="deco">
		<div class="inside clearfix">
			<div id="main_content" class="clearfix">
				
			<h1>
			<?php
  if ( is_day() )
    _e( 'You are viewing the ' . get_the_date() . ' daily archives' );
  elseif ( is_month() )
    _e( 'You are viewing the ' . get_the_date( 'F Y' ) . ' monthly archives' );
  elseif ( is_year() )
    _e( 'You are viewing the ' . get_the_date( 'Y' ) . ' yearly archives' );
  elseif ( is_author() )
    _e( 'You are viewing author archives' );
  else
    _e( 'You are viewing the "'. single_cat_title( '', false ) . '" Archives' );
?>
			</h1>

			
			
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











