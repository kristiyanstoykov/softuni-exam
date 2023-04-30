<?php

add_theme_support( 'post-thumbnails' );


function softuni_assets() {

    wp_enqueue_style( 'softuni-homes', get_template_directory_uri() . '/css/master.css', array(), filemtime( get_theme_file_path( '/css/master.css' ) ) );

}
add_action('wp_enqueue_scripts', 'softuni_assets' );

/**
 * Registering our custom menus
 *
 * @return void
 */
function softuni_homes_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'softuni-homes' ),
        'footer_menu'  => __( 'Footer Menu', 'softuni-homes' ),
    ) );
}
add_action( 'after_setup_theme', 'softuni_homes_register_nav_menu', 0 );