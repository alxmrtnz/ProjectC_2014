1. First load index.html code into index.php
2. Make style.css and upload necessary information into the file.
3. Make header.php and upload it
4. Make footer.php and upload it
5. Make functions.php and upload it.
6. Cut head code out of index.php and paste it into header.php
7. Cut footer code out of index.php and paste it into footer.php
8. Add <?php get_header(); ?> to index.php
9. Add <?php get_foooter(); ?> to index.php




Start working in the header.php

The <html> tag requires us to declare our language settings, but WordPress can do this for us. Since we want to make our themes as language independent as possible, it’s important to let the admin settings control the language.

Replace our <html> tag with the following code:

<html <?php language_attributes(); ?>>



<title>
What we did last time....

<title><?php the_title(); ?></title>



What we need to do....

<title><?php wp_title( '|' ); ?></title>

We are doing this as a best practice in the behind the scenes wordpress, it outputs better code for SEO and for plugin development.


But that's not all... we need to add the following code in the functions.php file to make it work.

<?php

function j2theme_filter_wp_title( $currenttitle, $sep, $seplocal ) {

  //Grab the site name
  $site_name = get_bloginfo( 'name' );

  // Add the site name after the current page title
  $full_title = $site_name . $currenttitle;

  // If we are on the front_page or homepage append the description
  if ( is_front_page() || is_home() ) {
//Grab the Site Description
    $site_desc = get_bloginfo( 'description' );

    //Append Site Description to title
    $full_title .= ' ' . $sep . ' ' . $site_desc;

  }

  // Return the modified title
  return $full_title;

}

  // Hook into 'wp_title'
add_filter( 'wp_title', 'j2theme_filter_wp_title', 10, 3 );


?>





<meta>

Unfortunately, some of the harder things to build into a theme are meta descriptions and keywords.

The good news is that there are several amazing WordPress SEO plugins out there. Most of them will generate meta tags for the user admin. This is why it’s so important to build themes in a way that makes it easy for user admins to incorporate plugins later.

One meta tag we can do now is the following....

<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>;
        charset=<?php bloginfo( 'charset' ); ?>">
        
        
it outputs the following....
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">







<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

You're probably wondering how we reference other files in our head... this is how.

Linking to other files is a very similar process, but instead of calling the bloginfo() function, we’re actually going to call get_template_directory_uri().

<script src="<?php echo get_template_directory_uri(); ?>/scripts/functions.js" type="text/javascript"></script>





<?php wp_head(); ?>
right before the </head>





<body> tag


<body <?php body_class( $class ); ?>>

Take a moment to view the source of your site at this time. Depending on your location, whether or not you’re logged in, and have the admin-bar turned on, you might see output like this:

<body class="home blog logged-in admin-bar">

If you would like to add your own class to this piece of code for any reason, replace the body code with this....

<body <?php body_class( 'container' ); ?>>

it will output something like this...

<body class="home blog logged-in admin-bar container">






footer.php

place <?php wp_footer(); ?> right before the closing </body> tag





Menus and Navigation

Even though it's not in my html right now, let's assume we are going to have a few menu locations in our theme.

<?php
register_nav_menus(
    array(
    'main-nav-header-left' => 'Main Nav, Left of Logo',
    'main-nav-header-right' => 'Main Nav, Right of Logo',
    'footer-nav' => 'Footer Menu'
    )
);

?>


Defaults if you need to know for the future....

$defaults = array(
    'theme_location'  => 'menu,
    'menu' => ,
    'container' => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'  => ,
    'menu_class'  => 'menu',
    'menu_id' => ,
    'echo'  => true,
    'fallback_cb' => 'wp_page_menu',
    'before' => ,
    'after' => ,
    'link_before'  => ,
    'link_after' => ,
    'items_wrap' => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
    'depth' => 0,
    'walker' =>
);





Note

If you’re not a PHP pro, that’s OK—just know that an array is a datatype with multiple values. You can see the pattern in the code and make sense of it regardless of your development background.


<?php
    $main_nav_header_left = array(
      'theme_location' => 'main-nav-header-left',
      'container' => 'nav',
      'menu_class'  => 'left',
      'container_id' => 'header-main-nav',
      'depth' => 1
    );
?>
<?php wp_nav_menu( $main_nav_header_left ); ?>



<?php
    $main_nav_header_right = array(
      'theme_location' => 'main-nav-header-right',
      'container' => 'nav',
      'menu_class'  => 'right',
      'container_id' => 'header-main-nav',
      'depth' => 1
    );
?>
<?php wp_nav_menu( $main_nav_header_right ); ?>




Images that we haven't taken care of yet.

<?php echo get_template_directory_uri(); ?>




The Loop again....


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <!-- content here -->

<?php endwhile; else: ?>

      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>

The above line of code is an elegant way to utilize PHP shorthand. If there are posts to serve, then perform the following iteration of HTML and PHP as many times as there are posts. The while loop will continue to go as long as the function in its parentheses returns true. So as long as there are posts, we’ll be looping. The the_post() function preps the post and makes it available in the current iteration of The Loop. Without the the_post() function, much of the content would be unavailable for processing:



Here is a good starter loop for the index.php

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



Add this to your functions.php for the excerpt

<?php
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
?>





Sidebar.php

When theming for WordPress began, we utilized a very typical blogging design structure: the two-column layout. We’d put content on the left and a sidebar on the right. At that point, the term sidebar was very descriptive of its use. Today developers use sidebars and widgets in a variety of ways. Sidebars are placed throughout themes from headers to footers and everywhere in between.

Currently, it’s the web developer who defines (or registers) sidebars. When a sidebar is registered, the developer gives it a name and places widgets into it. Since the developer is in charge of naming and there’s no standard naming convention, the user admin risks losing all his widgets when he changes themes.

For now, think of sidebars as widget holders. When a sidebar is registered, a widget holder appears in Appearance → Widgets. You can then drag your widgets into these holders. In the theme, you can call a WordPress function to display the sidebar by name. You’ll be in charge of defining the HTML markup structure for the sidebar and the widgets. This gives you more control over how and where these sidebars are defined.

There’s also a template page called sidebar.php that can house any amount of content but is meant to hold the output of the get_sidebar() function. You can define multiple sidebar template pages and call them as necessary.

Widgets are essentially WordPress plugins designed to create simple solutions for displaying dynamic content. Typical widgets include recent posts, recent comments, links, menus, and search boxes, among others. You can write your own plugins to create your own widgets.

Let’s jump back into our functions.php file for this one. Registering a sidebar is easy and consistent with everything we’ve already learned. The register_sidebar() function accepts the following parameters:

<?php
$args = array(
  'name'          => '', //Sidebar Display Name
  'id'            => '', //sidebar-slug
  'description'   => '', //description (usually of location or function)
  'before_widget' => '', //HTML markup before the widget
  'after_widget'  => '', //HTML markup after the widget
  'before_title'  => '', //HTML markup before the widget title
  'after_title'   => '', //HTML markup after the widget title
);

Once you define the values of the above parameters, you need only pass them to the function like this:

register_sidebar( $args );

?>


Aside Sidebar

<?php
$steinbauer_aside_sidebar = array(
  'name'          => 'Aside',
  'id'            => 'aside',
  'description'   => 'Widgets placed here will go in the Right hand sidebar',
  'before_widget' => '<div class="individual_widget">',
  'after_widget'  => '</div><!-- class: individual_widget -->',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>',
);
register_sidebar( $steinbauer_aside_sidebar );
?>



Above Footer Sidebar

<?php
$steinbauer_above_footer_sidebar = array(
  'name'          => 'Above Footer',
  'id'            => 'above_footer',
  'description'   => 'Widgets placed here will go in the area above the footer',
  'before_widget' => '<li class="individual_widget">',
  'after_widget'  => '</li><!-- class: individual_widget -->',
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => '</h2>',
);
register_sidebar( $steinbauer_above_footer_sidebar );
?>







Let's go ahead and make two new php files... 

sidebar-aside.php
sidebar-above_footer.php

and replace the area that begins with <aside> and </aside> with the following code....

<?php get_sidebar( 'aside' ); ?> <!-- sidebar-aside.php -->

In the file sidebar-aside.php place the following code between the two asides....

<?php dynamic_sidebar( 'Aside' ); ?>







Replace the section#widgets_low with the following code....

<?php get_sidebar( 'above-footer' ); ?> <!-- sidebar-above-footer.php -->

In the sidebar-above-footer.php place the following code....

<section id="widgets_low">
		<div class="inside clearfix">
			<ul>
			
				<?php dynamic_sidebar( 'Above Footer' ); ?>
			
			</ul>
		</div><!-- end of div.inside -->
	</section><!-- end of section#widgets_low -->





Let's clean up the functions.php file



Let's add a new file called nav_logo.php

Cut the logo and nav area and paste into nav_logo.php

replace with the following....

<?php get_template_part( 'nav_logo' );  // Navigation and Logo (nav_logo.php) ?>




Single


make a new file and call it single.php


paste the index code in it.

Add Featured Image....

Add this to your functions....

add_theme_support( 'post-thumbnails' );


Add this to your single.

<?php the_post_thumbnail(); ?>

The loop...


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



Post Metadata


<p>Posted <time datetime="<?php the_time('Y-m-d'); ?>" pubdate="pubdate">
        <?php the_time('M n'); ?></time> &#149; <a href="#comments"><?php
        comments_number( '0 comments', 'only 1 comment', '% comments' ); ?>
        </a></p>
        
        
        
The Content....

<?php the_content(); ?>



The Taxonomy


<footer class="single">

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


The Author

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

Pagination

</footer>

<ul class="pagination">
  <?php previous_post_link( '<li>%link</li>', '&lt; Previous Post' ); ?>
  <?php next_post_link( '<li>%link</li>', 'Next Post &gt;' ); ?>
</ul>



Place this in style css at approx line 292


ul.pagination	{
	list-style-type: none;
	padding: 0;
	margin-top: 20px;
	margin-bottom: 20px;
}

ul.pagination li	{
	margin: 10px 10px 10px 0;
	display: inline-block;
	padding: 6px;
	-webkit-border-radius: 3px;
    border-radius: 3px;
    background: #e8e8e8; /* Old browsers */
background: -moz-linear-gradient(top,  #e8e8e8 0%, #ffffff 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e8e8e8), color-stop(100%,#ffffff)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #e8e8e8 0%,#ffffff 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #e8e8e8 0%,#ffffff 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #e8e8e8 0%,#ffffff 100%); /* IE10+ */
background: linear-gradient(to bottom,  #e8e8e8 0%,#ffffff 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8e8e8', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */

}

ul.pagination li a	{
	text-decoration: none;
}

footer.single	{
	padding-top: 10px;
	padding-bottom: 10px;	
	border-top: 1px solid #99845b;
	border-bottom: 1px solid #99845b;
}

div.tax	{
	float: left;
}

div.author	{
	float: right;
}

div.the_comments	{
	margin-top: 20px;
	margin-bottom: 20px;
}

blockquote.tagline	{
	padding: 20px;
	margin: 20px;
    font-family: 'elsie_swash_capsregular';
	font-size: 1.6em;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #fff;

}






Comments.... if you want them...

<?php comments_template(); ?>



Pages.... Static Content

make a new file page.php



Add Featured Image

<?php the_post_thumbnail(); ?>


Add Breadcrumbs

		<nav class="breadcrumb">
			<p><?php if( function_exists( 'bcn_display' ) ) {
				bcn_display();
				} ?></p>
        </nav><!-- breadcrumb -->
        

Download NavXT and install....




Add excerpt to page....

add_post_type_support( 'page', 'excerpt' );


<?php if( get_the_excerpt() ) { ?>
  <h2 class="tagline"><?php echo get_the_excerpt(); ?></h2>
<?php } ?>



Custom Page Templates....


The default page template we just created in page.php will be used to display all page content (including hierarchical post types). Basically, anytime a user visits a page, the page.php template structure is used to properly display that content. You have the option to define additional page templates to give the user admin more control over page layout. In this theme we’ll also define a page template that has no sidebar and content that is “full width.”


At the top of the page-full-width.php file, insert the following commented-out PHP code:

<?php
/*
Template Name: Full Width
*/
?>




Archive Page Template

The Archive uses the archive.php page template file. This file displays archives from categories, tags, dates, and even authors. We learned in Chapter 3, “WordPress Template Hierarchy,” that the template hierarchy comes into full effect with archives because of the specificity with which we can drill down with content.

By default the template hierarchy defaults to archive.php



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






Search Results....

Did you know that in most cases a user can search a WordPress website, even if there’s no search form available? WordPress uses a get var in the URL to initiate a search query. Whether you type “hello” into a search box or append ?s=hello to the end of your URL, you’ll get the same result. WordPress runs a query for posts or pages that contain the word “hello.” Fire up the search.php template file, which dictates the layout and functionality of the Search Results page.


make a new file called search.php


copy archive.php and start from that file.


Change h1
<h1><?php _e( 'You are searching for "' . get_search_query() . '"' );?></h1>


Add search form code after h1

<?php get_search_form(); ?>


If you want to modify the way search is displayed you must make a new file called searchform.php and modify the output.




404 Error



The 404 template page is used whenever anyone attempts to travel to a page, post, or other area of the site that doesn’t exist. It could be the user’s fault because he typed in something incorrectly, or it could be ours because we took down a page and didn’t define a proper redirect. Either way, it’s better to take the blame for it and move the user down the right path.


Start with our search.php file and rename it 404.php


<h1 class="error">Whoops, 404!</h1>
			<blockquote>We're sorry, we can't find what you're looking for. It's
        probably our fault. Please use the navigation above or below and try
        again!</blockquote>
			
			
<?php get_search_form(); ?>





Custom Post Types....


This is where the true functionality of wordpress comes in...

First let's change the permalinks so you can better understand what's going on...


Next Let's add some media sizing, for different sized thumbnails...

Add this right after your add_theme_support in your functions...

add_image_size( 'post-thumb', 260, 175, true );
add_image_size( 'sm-post-thumb', 65, 50, true );

This will allow multiple thumbnail sizes to be added immediately when you upload files in wordpress. Saves you time, and you don't have to upload multiple files.


Next, Custom post types. Simplest type of custom post type.....

<?php
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'acme_product',
		array(
			'labels' => array(
				'name' => __( 'Products' ),
				'singular_name' => __( 'Product' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'products'),
		)
	);
}
?>

See that works... but I want to try something more specific...

<?php
// Custom Post Types ========================================================
function my_custom_post_graphic() {
	$labels = array(
		'name'               => _x( 'Graphics', 'post type general name' ),
		'singular_name'      => _x( 'Graphic', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Graphic' ),
		'edit_item'          => __( 'Edit Graphic' ),
		'new_item'           => __( 'New Graphic' ),
		'all_items'          => __( 'All Graphics' ),
		'view_item'          => __( 'View Graphic' ),
		'search_items'       => __( 'Search Graphics' ),
		'not_found'          => __( 'No graphics found' ),
		'not_found_in_trash' => __( 'No graphics found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Graphics'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'All of my graphics',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'graphic', $args );	
}
add_action( 'init', 'my_custom_post_graphic' );
?>

When you make a graphic it will view in the archive.php file... let's make our own archives file called archive-graphic.php


The thing that makes Wordpress a real CMS is the addition of Custom Post types and Custom Taxonomies.

<?php
// Add custom taxonomies
add_action( 'init', 'home_create_taxonomies', 0 );

function home_create_taxonomies() 
{
	// Markets
	register_taxonomy('tax_graphics',array('graphic'),array(
		'hierarchical' => true,
		'label' => 'Graphics Taxonomy',
		'singular_name' => 'Graphic Taxonomy',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'tax_graphics' )
	));
}	
?>

Let's make a custom taxonomy archive page.... 

Add this to your style.css

ul.graphics li	{
	width: 31%;
	float: left;
	margin: 10px 1%;
}

ul.graphics li img	{
	display: block;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 20px;
}


and duplicate archive.php again...

taxonomy-tax_graphics.php

<?php the_post_thumbnail( 'post-thumb' ); ?>



Let's finish up this site by adding the website pages custom post types and some taxonomies.
We will also setup the index page's slideshow and get it running. 

Download Flexslider...

Rename flexslider folder "flexslider"

Upload to your theme directory... 

Let's add this to our header.php

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider/flexslider.css" type="text/css" media="screen" />

And this to our footer.php right above wp_footer

<!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="<?php echo get_template_directory_uri(); ?>/flexslider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    // Can also be used with $(document).ready()
		$(window).load(function() {
		  $('.flexslider').flexslider({
		    animation: "slide"
		  });
		});  
  </script>

Now we have laid the groundwork to adding a custom slideshow!

Back to adding a new custom post type and custom taxonomy..


Add this to your funcitons.php....

Around line 78 add this after your last Post Thumbnail...
add_image_size( 'slideshow', 865, 523, true );


After your first Custom Post Type, Let's add a new one... Don't include the opening and closing php statements...

<?php
// Website
function my_custom_post_website() {
	$labels = array(
		'name'               => _x( 'Websites', 'post type general name' ),
		'singular_name'      => _x( 'Website', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Website' ),
		'edit_item'          => __( 'Edit Website' ),
		'new_item'           => __( 'New Website' ),
		'all_items'          => __( 'All Websites' ),
		'view_item'          => __( 'View Website' ),
		'search_items'       => __( 'Search Websites' ),
		'not_found'          => __( 'No websites found' ),
		'not_found_in_trash' => __( 'No websites found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Websites'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'All of my websites',
		'public'        => true,
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'website', $args );	
}
add_action( 'init', 'my_custom_post_website' );
?>

Right after your graphics taxonomy let's add this new one.... once again don't add the <?php ?>

<?php
// Websites
	register_taxonomy('websites',array('website'),array(
		'hierarchical' => true,
		'label' => 'Websites Taxonomy',
		'singular_name' => 'Website Taxonomy',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'websites' )
	));
?>


Now let's go back to the Wordpress backend and add a new Advanced Custom Field....

Name it Custom Excerpt and Add it to your Website Post type.
Add a Wysywig editor....


Add a couple categories to the new taxonomy

Now we can add content....

Make 3 posts with the images provided.

Duplicate taxonomy-graphics.php and call it taxonomy-websites.php

open and change the title... then see your results.


Okay back to the slideshow and index.php.






The WP_Query class is one of the most important parts of the WordPress codebase. Among other things, it determines the query you need on any given page and pulls posts accordingly. It also saves a lot of information about the requests it makes, which helps a great deal when optimizing pages (and troubleshooting them).


Replace the current slideshow with this code...




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
						'tax_query' => array(
							array(
							'taxonomy' => 'websites',
							'field' => 'slug',
							'terms' => 'slideshow'
							)
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
	
	
	
	<ul class="products clearfix">
		

			<?php
				// Start WP_Query for only the ID's from above
				$first_query = new WP_Query(
					array(
							'post_type' => 'product',
							'posts_per_page' => 12,
						    'product_cat' => 'bridal'		
					)
				);
				?>
				 
				<?php while($first_query->have_posts()) : $first_query->the_post(); ?>				  
						
							<?php woocommerce_get_template_part( 'content', 'product' );	?>						

				<?php endwhile; ?>
				  <!-- end of the loop -->
				  				
				<?php wp_reset_postdata(); ?>

		</ul>

	
	
	
	
	
	
	
