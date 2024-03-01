<?php
/**
 * Display custom fields on the front end
 * @author Archie M
 * 
 */
function thrivedx_display_custom_fields() {

    ob_start ();

    // I chose to display the fields on a single post page - no point listing on post list
    if ( is_single() ) {

        global $post;
        $post_id = $post->ID;

        $text_value = get_post_meta($post_id, '_thrivedv_custom_text', true);
        $date_value = get_post_meta($post_id, '_thrivedv_custom_date', true);
        $image_value = get_post_meta($post_id, '_thrivedv_custom_image', true);
        ?>

        <div id="thrivedx-cf">
            <?php if($text_value) : ?>
                <p><strong>Custom Text:</strong><br>
                <?php echo esc_html($text_value); ?> 
                </p>
            <?php endif; ?>

            <?php if($date_value) : ?>
                <p><strong>Custom Date:</strong><br> 
                <?php echo esc_html($date_value); ?>
                </p>
            <?php endif; ?>
            
            <?php if($image_value) :?>
                <p><strong>Custom Image:</strong><br> 
                <img src="<?php echo esc_url($image_value); ?>" alt="Custom ThriveDX Image" />
                </p>
            <?php endif;  ?>
        </div>

        <?php
    }

    $myvariable = ob_get_clean();
    return $myvariable;

}

// Hook to display custom fields on the front end
add_action('the_content', 'thrivedx_display_custom_fields');
