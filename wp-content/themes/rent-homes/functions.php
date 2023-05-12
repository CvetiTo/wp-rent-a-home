<?php
/**
 * This function takes care the assets with enqueue
 *
 * @return void
 */
add_theme_support( 'home-thumbnails' );
add_image_size( 'home-thumbnail', 120, 120 );

function rent_assets() {
    wp_enqueue_style( 'rent-home',
     get_stylesheet_directory_uri() . '/assets/css/master.css', 
     array(),
    filemtime( get_template_directory() . '/assets/css/master.css') );
}
add_action( 'wp_enqueue_scripts', 'rent_assets' );

/**
  * Taking care of our custom menus
  *
  * @return void
  */
  function rent_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'rent' ),
        'footer_menu'  => __( 'Footer Menu', 'rent' ),
    ) );
  }
  add_action( 'after_setup_theme', 'rent_register_nav_menu', 0 );