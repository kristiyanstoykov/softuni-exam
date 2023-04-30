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
 * Function for liking a property
 *
 * @return void
 */
function softuni_like_property() {
	$job_id = esc_attr( $_POST['job_id'] );
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
