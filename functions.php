<?php

// Load theme scripts, css and fonts
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme.css');
    wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);   
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Add the "Menus" option to the "Appearance" content type
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');

//   Remove 32px margin-top by default 
function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');
