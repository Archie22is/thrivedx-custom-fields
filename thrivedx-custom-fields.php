<?php
/*
Plugin Name:        ThriveDX Custom Fields (Assessment)
Description:        A ThriveDX plugin that allows users to add and display custom fields on the front end of WordPress posts. Supports custom text, date, and image fields and ensure user-friendly customization options.
Version:            1.0.0
Text Domain: 		thrivedx-custom-fields
Author:             Archie Makuwa (Archie M)
Author URI: 		https://archie.makuwa.co.za
License: 			N/A
*/

// Security check - not allow direct access allowe
defined('ABSPATH') or die('No direct access allowed!');



// Includes (load all required files) 
include_once(plugin_dir_path(__FILE__) . '/includes/thrivedx-custom-fields-display.php');
include_once(plugin_dir_path(__FILE__) . '/includes/thrivexd-load-assets.php');
//include_once(plugin_dir_path(__FILE__) . '/includes/thrivedx-columns-setup.php');     // Not required



// Register custom fields and assign to post 
function custom_fields_register() {

    add_post_type_support('post', 'custom-fields');

}
add_action('init', 'custom_fields_register');



// Add custom fields to post editor
function custom_fields_meta_box() {

    add_meta_box('custom_fields_box', 'ThriveDX Custom Fields', 'custom_fields_callback', 'post', 'normal', 'high');

}
add_action('add_meta_boxes', 'custom_fields_meta_box');



// Callback function to render custom fields meta box
function custom_fields_callback($post) {

    // Add nonce for security
    wp_nonce_field('custom_fields_nonce', 'custom_fields_nonce');

    // Text field
    $text_value = get_post_meta($post->ID, '_thrivedv_custom_text', true);
    echo '<div class="thrivedx-fields-wrapper">';
    echo '<label for="thrivedv_custom_text">Custom Text Field:</label>';
    echo '<input type="text" id="thrivedv_custom_text" name="thrivedv_custom_text" value="' . esc_attr($text_value) . '" />';
    echo '</div>';

    // Date field
    $date_value = get_post_meta($post->ID, '_thrivedv_custom_date', true);
    echo '<div class="thrivedx-fields-wrapper">';
    echo '<label for="thrivedv_custom_date">Custom Date Field:</label>';
    echo '<input type="date" id="thrivedv_custom_date" name="thrivedv_custom_date" value="' . esc_attr($date_value) . '" />';
    echo '</div>';

    // Image field
    $image_value = get_post_meta($post->ID, '_thrivedv_custom_image', true);
    echo '<div class="thrivedx-fields-wrapper">';
    echo '<label for="thrivedv_custom_image">Custom Image Field:</label>';
    echo '<input type="text" id="thrivedv_custom_image" name="thrivedv_custom_image" value="' . esc_attr($image_value) . '" />';
    echo '<button id="upload_image_button">Upload Image</button>';
    echo '</div>';

}



// Save custom field data
function thrivedx_custom_fields_save($post_id) {

    // Check nonce
    if ( !isset($_POST['custom_fields_nonce']) || !wp_verify_nonce($_POST['custom_fields_nonce'], 'custom_fields_nonce') ) {
        return $post_id;
    }

    // Save text field
    if ( isset($_POST['thrivedv_custom_text']) ) {
        $thrivedx_text_value = sanitize_text_field( $_POST['thrivedv_custom_text'] );
        if (!empty($thrivedx_text_value)) {
            update_post_meta($post_id, '_thrivedv_custom_text', $thrivedx_text_value );
        }
    }

    // Save date field
    if ( isset($_POST['thrivedv_custom_date']) ) {
        $thrivedx_date_value = sanitize_text_field( $_POST['thrivedv_custom_date'] );
        if (!empty($thrivedx_date_value)) {
            update_post_meta($post_id, '_thrivedv_custom_date', $thrivedx_date_value );
        }
    }

    // Save image field
    if (isset($_POST['thrivedv_custom_image'])) {
        $thrivedx_image_value = sanitize_text_field( $_POST['thrivedv_custom_image'] );
        if (!empty($thrivedx_image_value)) {
            update_post_meta($post_id, '_thrivedv_custom_image', $thrivedx_image_value );
        }
    }

}

add_action('save_post', 'thrivedx_custom_fields_save');
