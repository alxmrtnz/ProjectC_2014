<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
 ?>
<?php
get_header(); ?>





	<section class="mast">
                <div class="videoMast">
                    <div class="iframeContainer">

                        <iframe class="vimeo-iframe" data-setup="{}" src="<?php the_field('video_link'); ?>" width="1200" height="675.6" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    </div>
                    <div class="close">
                        <div class="exit">
                            Close Video
                        </div>
                    </div>
                </div>

                <div class="default">
                
                	<?php if( get_field('video_link') ): ?>
						<div class="playBtn">

						</div>
					<?php endif; ?>
                    
                    <div class="copy">
                        <div class="copyWrapper">
                            <h1><?php wp_title(''); ?></h1>
                            <p class="subtitle"><?php the_field('subtitle'); ?></p>
                        </div><!-- end .copyWrapper -->

                    </div><!-- end .copy -->
                    <div class="bg">
                    	<?php the_post_thumbnail(); ?>
                    
                      
                    </div>
                </div>

            </section><!-- end .orgMast -->



            <div class="orgContentWrapper">
                <div class="content">
                    <div class="leftColumn">
                    
                        <div class="voting">
                            <div class="currentVoteContainer">
                                <div class="currentVotes">Current Votes</div>
                                <div class="tally">236</div>
                            </div>

                            <div class="defaultButton button">Vote</div>
                        </div><!-- end .voting -->
                        <div class="sharing">
                        
                            <div class="button fb">
                            	<a target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=https://developers.facebook.com/docs/plugins/"><i class="icon-facebook"></i> Share
	                            	
                            	</a>
                            </div>
                            <div class="button twitter"><a target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://twitter.com/share?text=This%20is%20so%20easy"><i class="icon-twitter"></i> Tweet</a></div>
                            
                            <!-- link to article on possible centering of popup window:stackoverflow.com/questions/4068373/center-a-popup-window-on-screen -->
                        </div><!-- end .sharing -->
                        <div class="subNav">
                            <ul>
                                <li>Our Story</li>
                                <li>Share Your Story</li>
                                <li>Infographic</li>
                            </ul>
                        </div>
                    </div>
                    <section class="mainContent">
                        <nav class="breadCrumbs">
							<?php if( function_exists( 'bcn_display' ) ) {
								bcn_display();
								} ?>
				        </nav><!-- breadcrumb -->
                        <div class="story">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php the_content();?>
							
							<?php endwhile; else: ?>
							
							      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							
							<?php endif; ?>
							
						


                        </div><!-- end .story -->

                    </section><!-- end .mainContent -->
                    <section class="mainContent" id="infographic">
                    
	                    <?php the_field('infographic_title'); ?>
                    
						<?php the_field('infographic_subtitle'); ?>
						
						
						<img class="alignnone  wp-image-35" alt="gatheringplace" src="<?php the_field('infographic_image'); ?>" width="" height="auto">
                    
                    </section>
                </div> <!-- end .content -->
            </div><!-- end .orgContentWrapper -->
            
            


<?php get_sidebar(); ?>
<?php get_footer(); ?>