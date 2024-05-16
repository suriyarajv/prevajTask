<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );







/**task-1 Create a custom post_type without using the plugin.*/
/*custom post type creation */
// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                  => _x( 'Recipes Post Type', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Recipes Post', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Recipes Post Type', 'text_domain' ),
        'name_admin_bar'        => __( 'Recipes Post Type', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Recipes Post Type', 'text_domain' ),
        'description'           => __( 'Recipes Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'Recipes-Post', $args );

}
add_action( 'init', 'custom_post_type', 0 );



/**task-2 Create a custom hook, then add action to that hook.*/
//action using 
//only addition content add home page footer bottom
function my_custom_content_function() {
    // Your content goes here
    echo "<div style='text-align:center;'>This is my custom content!</div>";
}
add_action('my_custom_homepage_content', 'my_custom_content_function');

// Hook the custom content function to be displayed only on the homepage
function display_custom_content_on_homepage() {
    if (is_front_page()) { // Changed to is_front_page()
        do_action('my_custom_homepage_content');
    }
}
add_action('wp_footer', 'display_custom_content_on_homepage');




/**task-4 Create a custom shortcode to list the recent 6 posts*/
/**I want display recently published 6 custom posts */
/** [recent-posts] short code for defaltly 6 recent post shown in case adjust that post you can use the count attributes like this [recent-posts count="10"] */


// Create custom shortcode to list recent posts
function recent_posts_shortcode( $atts ) {
    // Set default attributes and parse user input
    $atts = shortcode_atts( array(
        'count' => 6, // Default number of posts to display
    ), $atts, 'recent-posts' );

    // Query recent posts
    $recent_posts = new WP_Query( array(
        'post_type'      => 'recipes-post', // Adjust this if you want to query a custom post type
        'posts_per_page' => $atts['count'],
    ) );

    // Start output buffer
    ob_start();

    // Display recent posts
    if ( $recent_posts->have_posts() ) :
        echo '<ul>';
        while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        endwhile;
        echo '</ul>';
    else :
        echo 'No recent posts found.';
    endif;

    // Reset post data
    wp_reset_postdata();

    // Return buffered output
    return ob_get_clean();
}
add_shortcode( 'recent-posts', 'recent_posts_shortcode' );


// task-5 In the cart page add a custom block above the Shipping details using a filter
// I have check filter hook but action hook used to acheive it
// Add custom block above shipping details on cart page
function custom_block_above_shipping_details() {
    echo '<div class="custom-block">';
    echo '<h6 style="text-align:center;">Our custom content here</h6>';
    echo '</div>';
}
add_action( 'woocommerce_before_cart_table', 'custom_block_above_shipping_details' );








