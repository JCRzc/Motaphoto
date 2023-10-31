<?php

// Charger le css du thème
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Ajoute l'options "Menus" dans le type de contenu apparence 
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

//   Supprime margin-top de 32px par défaut 
function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');
