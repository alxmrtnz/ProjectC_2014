<?php
/**
 * The template used for displaying page content in page.php
 */
?>

	<article <?php post_class(); ?>>
	
		<header>
			<?php the_post_thumbnail(); ?>
		</header>

		<div>
			<?php the_content(); ?>
		</div>
		
	</article>
