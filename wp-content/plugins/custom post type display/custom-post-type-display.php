<?php
/*
Plugin Name: Custom Post Type Display with Count
Description: Display a custom post type with count using a shortcode.
Version: 1.0
Author: Suriyaraj
License: GPL2
*/

// Add administration menu
function custom_post_type_display_menu() {
    add_menu_page(
        'Custom Post Type Display', // Page title
        'Custom Post Type Display', // Menu title
        'manage_options', // Capability
        'custom_post_type_display', // Menu slug
        'custom_post_type_display_page', // Callback function
        'dashicons-admin-generic', // Icon
        80 // Position
    );

    // Add submenu item to show description and insert shortcode
    add_submenu_page(
        'custom_post_type_display', // Parent slug
        'About Custom Post Type Display', // Page title
        'About', // Menu title
        'manage_options', // Capability
        'custom_post_type_display_about', // Menu slug
        'custom_post_type_display_about_page' // Callback function
    );
}
add_action('admin_menu', 'custom_post_type_display_menu');

// Main menu page content
function custom_post_type_display_page() {
    echo '<h1>Custom Post Type Display Settings</h1>';
    echo '<p>This plugin displays a custom post type with count using a shortcode.</p>';
}

// About submenu page content
function custom_post_type_display_about_page() {
    echo '<h1>About Custom Post Type Display Plugin</h1>';
    echo '<p>This plugin allows you to display a custom post type with count using the shortcode [custom_post_type_with_count].</p>';
    echo '<p>To use the shortcode, simply insert [custom_post_type_with_count] in any post or page content.</p>';
}

// Shortcode to display custom post type with count
function custom_post_type_with_count_shortcode($atts) {
    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'count' => -1, // Default count, -1 for all posts
            'post_type' => 'post', // Default post type is 'post'
        ),
        $atts,
        'custom_post_type_with_count'
    );

    // Query to get the custom post type count
    $custom_post_count = wp_count_posts($atts['post_type']);

    // Check if the publish property exists
    if (isset($custom_post_count->publish)) {
        // Output the count
        $output = '<div class="custom-post-count">';
        $output .= 'Total Count: ' . $custom_post_count->publish;
        $output .= '</div>';
    } else {
        $output = '<div class="custom-post-count">No custom posts found.</div>';
    }

    // Query to get and display the custom post type
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['count'], // Display specified number of posts
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output .= '<ul class="custom-post-list">';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    } else {
        $output .= '<p>No custom posts found.</p>';
    }

    return $output;
}
add_shortcode('custom_post_type_with_count', 'custom_post_type_with_count_shortcode');



// Enqueue styles
function custom_post_type_enqueue_styles() {
    wp_enqueue_style( 'custom-post-style', plugin_dir_url( __FILE__ ) . 'custom-post-style.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_post_type_enqueue_styles' );
