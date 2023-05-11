<?php
/**
 * This function takes care the assets with enqueue
 *
 * @return void
 */
function rent_assets() {
    wp_enqueue_style( 'rent-home',
     get_stylesheet_directory_uri() . '/assets/css/master.css', 
     array(),
    filemtime( get_template_directory() . '/assets/css/master.css') );
}
add_action( 'wp_enqueue_scripts', 'rent_assets' );