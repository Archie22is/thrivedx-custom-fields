<?php
/**
 * Enqueue admin plugin JavaScript for image upload
 * @author Archie M
 * 
 */ 
function thrivedx_enqueue_admin_custom_fields_assets() {
    
    // JS enqueue
    wp_enqueue_media();
    wp_enqueue_script(
        'custom-fields-script', 
        plugin_dir_url(__FILE__) . '../js/thrivedx-script.js', 
        array('jquery'), null, true 
    );

    // CSS enqueue
    wp_enqueue_style( 'custom-fields-css', 
        plugin_dir_url(__FILE__) . '../css/thrivedx-style.css', 
        false, '1.0.0' );

}
add_action('admin_enqueue_scripts', 'thrivedx_enqueue_admin_custom_fields_assets');