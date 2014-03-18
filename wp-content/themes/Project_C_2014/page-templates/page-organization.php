<?php
/*
Template Name: Organization
*/
?>
<?php
get_header(); ?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1393430014263319";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	
	<section class="mast">
                <div class="videoMast">
                    <div class="iframeContainer">

                        <iframe class="vimeo-iframe" data-setup="{}" src="<?php the_field('field_name'); ?>" width="1200" height="675.6" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    </div>
                    <div class="close">
                        <div class="exit">
                            Close Video
                        </div>
                    </div>
                </div>

                <div class="default">
                    <div class="playBtn">

                    </div>
                    <div class="copy">
                        <div class="copyWrapper">
                            <h1>The Gathering Place</h1>
                            <p class="subtitle">Supporting people with mental illness through personal development</p>
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

                            <div class="button">Vote</div>
                        </div><!-- end .voting -->
                        <div class="sharing">
                            <div class="button fb">Share</div>
                            <div class="button twitter">Tweet</div>
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
                        <div class="breadCrumbs">
                            Home > 2014 Nonprofits > The Gathering Place
                        </div>
                        <div class="story">
                            <p>Nearly five years ago Andi Watt moved to Athens, Ohio. Overcome with fear, sadness and a defeating sense of loneliness, Watt was lost.</p>

                            <p>“We came from podunksville, and I was scared to death,” Watt said about moving to Athens. Watt was born and raised in Jackson, a town located 40 miles southwest of Athens. “Jackson is only forty minutes away, but [Athens] was still a big culture shock,” she said. </p>

                            <p>A volunteer coordinator at Good Works, a rural homeless shelter where Watt and her family resided upon moving to Athens, recommended she visit The Gathering Place for help with her anxiety and depression. </p>
                            <p>The Gathering Place is a community support center where adults with mental disabilities and conditions can feel safe, supported, and at home. Its mission is to create a better sense of well-being for its members by providing social and recreational activities for them, as well as by developing and maintaining learned skills for social interaction, referring them to health and social services, and holding workshops fostering wellness for physical and mental health. The Gathering Place is located at 7 N. Congress St., one block west of Ohio University’s uptown bar district. </p>

                            <p>Founded in 1976, The Gathering Place was created in response to the nationwide movement for deinstitutionalizing psychiatric hospitals, following the 1963 passage of the Community Mental Health Act. That act provided federal funding for community mental health centers, where community-based care could be obtained as an alternative to </p>


                        </div><!-- end .story -->

                    </section><!-- end .mainContent -->
                </div> <!-- end .content -->
            </div><!-- end .orgContentWrapper -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>