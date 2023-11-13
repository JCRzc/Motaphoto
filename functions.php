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
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('init', 'register_my_menus');

//   Remove 32px margin-top by default 
function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');

// fonction qui ajoute la taxonomie et le CPT.
function motaphoto_init()
{
    register_taxonomy('categorie', '{custom_post_type}', [
        'labels' => [
            'name' => 'Catégorie',
            'singular_name' => 'Catégorie',
            'plural_name' => 'Catégories',
            'search_items' => 'Rechercher des catégories',
            'all_item' => 'Toutes les catégories',
            'edit_item' => 'Editer la catégorie',
            'update_item' => 'Mettre à jour la catégories',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'new_item_name' => 'Ajouter une nouvelle catégorie',
            'menu_name' => 'Catégorie',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ]);
    register_taxonomy('format', '{custom_post_type}', [
        'labels' => [
            'name' => 'Format',
            'singular_name' => 'Format',
            'plural_name' => 'Formats',
            'search_items' => 'Rechercher des formats',
            'all_item' => 'Toutes les formats',
            'edit_item' => 'Editer le format',
            'update_item' => 'Mettre à jour le format',
            'add_new_item' => 'Ajouter un nouveau format',
            'new_item_name' => 'Ajouter un nouveau format',
            'menu_name' => 'Format',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ]);
    register_post_type('photo', [
        'label' => 'Photo',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-camera',
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'taxonomies' => ['categorie', 'format'],
        'has_archive' => true,
    ]);
}

add_action('init', 'motaphoto_init');


// Taxonomy finder function
function taxo_get_the_terms($taxonomy)
{
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    foreach ($terms as $term) {
        $term = $term->name;
    }
    echo $term;
}

// Function to add a class to previous / next links
function add_class_to_post_link($html, $class)
{
    $html = str_replace('<a ', '<a class="' . esc_attr($class) . '" ', $html);
    return $html;
}

// Hook to add a class to previous links
function add_class_previous_link($html)
{
    return add_class_to_post_link($html, 'link-previous-arrow');
}
add_filter('previous_post_link', 'add_class_previous_link');

// Hook to add a class to next links
function add_class_next_link($html)
{
    return add_class_to_post_link($html, 'link-next-arrow');
}
add_filter('next_post_link', 'add_class_next_link');
