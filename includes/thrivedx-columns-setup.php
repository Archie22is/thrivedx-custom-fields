<?php
/**
 * Display custom fields on columns
 * @author Archie M
 * 
 */
function add_thrivedx_custom_fields_columns( $columns ) {
    
    $columns['custom_text'] = __( 'Custom Text', 'thrivedx-custom-fields' );
    $columns['custom_date'] = __( 'Custom Date', 'thrivedx-custom-fields' );
    $columns['custom_image'] = __( 'Custom Image', 'thrivedx-custom-fields' );
    return $columns;

}
add_filter( 'manage_realestate_posts_columns', 'add_thrivedx_custom_fields_columns' );



function display_thrivedx_custom_fields_columns( $column, $post_id ) {

    // Text column
    if ( $column == 'custom_text' ) {
        // Do stuff
    }

    // Text column
    if ( $column == 'custom_date' ) {
        // Do stuff
    }

    // Text column
    if ( $column == 'custom_image' ) {
        // Do stuff
    }
  
}
add_action( 'manage_realestate_posts_custom_column', 'display_thrivedx_custom_fields_columns', 10, 2);
