// JavaScript file
// console.log( 'hi, the file loads' );

jQuery(document).ready(function($) {
    $('.like-button').on('click', function(e){
        e.preventDefault();
        // console.log( 'clicked' ); // just to be sure

        let property_id = jQuery(this).attr('id') // we'll need this later
        // console.log( property_id );

        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: my_ajax_object.ajax_url,
            data: {
                action:'softuni_like_property', // PHP function
                property_id: property_id // we need to make this dynamic
            },
            success: function(msg){
                console.log(msg);
            }
        });
    });
});
