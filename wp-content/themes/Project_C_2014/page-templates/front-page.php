<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page.
 */

get_header(); ?>

<div class="index">

<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content' ); ?>
		
        <section id="2014index_orgs">
        
        		<img src="<?php the_field('featured_organization'); ?>" alt="Featured Organization" />
        
                <?php the_field('organization_description'); ?>
                
        </section>

        
        
	<?php endwhile; ?>





 	

	
	
    
</div>

	
<?php get_footer(); ?>