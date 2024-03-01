/**
 * ThriveDX Custom Fields Scripts 
 * @author: Archie M
 * Last Update: ???
 *
 */
jQuery(document).ready(function ($) {

    // Manage image upload button
    $(document).on('click', '#upload_image_button', function (e) {
        e.preventDefault();

        let frame = wp.media({
            title: 'Select or Upload Image',
            button: {
                text: 'Use this image',
            },
            multiple: false,
        });

        frame.on('select', function () {
            let attachment = frame.state().get('selection').first().toJSON();
            $('#thrivedv_custom_image').val(attachment.url);
        });

        frame.open();
    });

});
