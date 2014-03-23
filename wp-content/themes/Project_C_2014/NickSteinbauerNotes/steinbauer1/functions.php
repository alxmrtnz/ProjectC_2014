<?php

// This is my title function =========================================================

function steinbauer_filter_wp_title( $currenttitle, $sep, $seplocal ) {

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
add_filter( 'wp_title', 'steinbauer_filter_wp_title', 10, 3 );

// This is my menu function =========================================================

register_nav_menus(
    array(
    'main-nav-header-left' => 'Main Nav, Left of Logo',
    'main-nav-header-right' => 'Main Nav, Right of Logo',
    'footer-nav' => 'Footer Menu'
    )
);

// This is my read more function for the_excerpt ======================================================

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// This is my Aside Sidebar ==================================================

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

// This is my Above Footer Sidebar ==========================================

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

// This is my Post Thumbnails ===================================================
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-thumb', 260, 175, true );
add_image_size( 'sm-post-thumb', 65, 50, true );
add_image_size( 'slideshow', 865, 523, true );

// Adding Excerpt to Page Template ==============================================
add_post_type_support( 'page', 'excerpt' );

// Adding Custom Post Types ================================================
// Graphic Custom Post Type
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
		'menu_name'          => 'Graphic'
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

// Website Custom Post Type
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
		'menu_name'          => 'Website'
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


// Add custom taxonomies
add_action( 'init', 'home_create_taxonomies', 0 );

function home_create_taxonomies() 
{
	// Graphics
	register_taxonomy('tax_graphics',array('graphic'),array(
		'hierarchical' => true,
		'label' => 'Graphics Taxonomy',
		'singular_name' => 'Graphic Taxonomy',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'tax_graphics' )
	));
	
	// Websites
	register_taxonomy('websites',array('website'),array(
		'hierarchical' => true,
		'label' => 'Websites Taxonomy',
		'singular_name' => 'Website Taxonomy',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'websites' )
	));
}	



