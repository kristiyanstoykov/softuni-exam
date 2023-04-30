<?php

/**
 * Enqueue our scripts
 *
 * @return void
 */
function my_enqueue() {
	wp_enqueue_script( 'softuni-exam-like-script', plugins_url( 'assets/script/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'softuni-exam-like-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );


/**
 * Count every view a job gets
 *
 * @param integer $property_id  // the post id of job
 * @return void
 */
function softuni_view_counter( $property_id = 0 ) {
    if ( empty( $property_id ) ) {
        return;
    }

    $views_meta_key = 'property_views';
    $view_counter = get_post_meta( $property_id, $views_meta_key, true );

    if ( empty( $view_counter ) ) {
        $view_counter = 1;
        update_post_meta( $property_id, $views_meta_key, $view_counter );
    } else {
        $view_counter += 1;
        update_post_meta( $property_id, $views_meta_key, $view_counter );
    }
}


/**
 * Get a single post term
 *
 * @param [int] $property_id
 * @param [string] $taxonomy
 * @return string[]
 */
function softuni_display_single_term( $jobs_id, $taxonomy ) {
    if( empty( $jobs_id ) || empty( $taxonomy ) ) {
        return;
    }

    $terms = get_the_terms( $jobs_id, $taxonomy );

    if ( empty( $terms ) === true ) {
        return;
    }

    $output = '';

    for ($i=0; $i < count( $terms ); $i++) {
        $output .= $terms[$i]->name . ', ';
    }

    $output = substr_replace( $output, "", -2);

    return $output;

}

/**
 * Filter the content
 *
 * @param [string] $content
 * @return string
 */
function change_text_another_callback( $content ) { 

    $filtered_content = str_replace( "Lorem", "Dummy text to fill in spaces", $content );

    return $filtered_content;
}

add_filter( 'the_content', 'change_text_another_callback');



/**
 * Function for liking a property
 *
 * @return void
 */
function softuni_like_property() {
	$job_id = esc_attr( $_POST['property_id'] );
	$likes_number = get_post_meta( $job_id, 'property_likes', true );

    if ( empty( $likes_number ) ) {
        update_post_meta( $job_id, 'property_likes', 1 );
    } else {
	    update_post_meta( $job_id, 'property_likes', ++$likes_number );
    }

    wp_die();
}

add_action( 'wp_ajax_nopriv_softuni_like_property', 'softuni_like_property' );
add_action( 'wp_ajax_softuni_like_property', 'softuni_like_property' );



/**
 * Count the words inside the content of post and show estimated reading time
 *
 * @return int
 */
function softuni_estimated_reading_time( $atts ) {

    $a = shortcode_atts( array(
        'id' => null
    ), $atts );

    $post_id = $a['id'];
    $content_post = get_post( $post_id );
    if ( empty( $content_post ) ) {
        return;
    }
    $content = $content_post->post_content;
    $content = str_replace(']]>', ']]&gt;', $content);

    $output = '';
    $reading_time = ceil( str_word_count( $content )/200 );
    if ( str_word_count( $content )/200 <= 1 ) {
        $output = esc_html__( 'Estimated reading time: under ' . $reading_time . ' minute', 'softuni' );
    }
    else {
        $output = esc_html__( 'Estimated reading time: ' . $reading_time . ' minutes', 'softuni' );
    }

    return '<i style="font-size: 14px;">' . $output . '</i>';
}

add_shortcode( 'estimated_reading_time', 'softuni_estimated_reading_time' );
