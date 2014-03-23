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
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article>
					<?php the_post_thumbnail(); ?>
					<h1><?php the_title(); ?></h1>
					<div class="content">
					<p>Posted <time datetime="<?php the_time('Y-m-d'); ?>" pubdate="pubdate">
        <?php the_time('M n'); ?></time> &#149; <a href="#comments"><?php
        comments_number( '0 comments', 'only 1 comment', '% comments' ); ?>
        </a></p>
						<?php the_content(); ?>
						
<footer class="single clearfix">

<div class="tax">
  <div class="alignleft">
    <p>Filed under: <?php the_category( ', ' ); ?></p>
  </div>
  <?php if( get_the_tags() ) { ?>
    <div class="alignright txtrt">
      <p><?php the_tags(); ?></p>
    </div>
  <?php } ?>
</div><!-- tax -->				
						
<div class="author">
  <h3>Written by: <?php the_author_posts_link(); ?></h3>
  <?php echo get_avatar( get_the_author_meta( 'email' ), '50', 'Mystery Man',
        'Avatar of ' . get_the_author_meta( 'first_name' ) . '
        ' . get_the_author_meta( 'last_name' ) ); ?>
  <?php if( get_the_author_meta( 'description' ) ) { ?>
    <p><?php the_author_meta( 'description' ); ?> </p>
  <?php } ?>
  <?php if( get_the_author_meta( 'user_url' ) ) { ?>
    <a href="<?php the_author_meta( 'user_url' ); ?>" title="<?php
        the_author_meta('first_name' ); ?>'s Website" target="_blank">
        <?php the_author_meta( 'user_url' ); ?></a>
  <?php } ?>
</div><!-- author -->


</footer>

<ul class="pagination">
  <?php previous_post_link( '<li>%link</li>', '&lt; Previous Post' ); ?>
  <?php next_post_link( '<li>%link</li>', 'Next Post &gt;' ); ?>
</ul>


<?php comments_template(); ?>


						
						
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
