<?php

// Load scripts, css and fonts
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/lightbox.css');
    wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.js', array(), '1.0', true);
    wp_enqueue_script('lightbox2', get_stylesheet_directory_uri() . '/assets/js/lightbox2.js', array('jquery'), '1.0', true);
    wp_enqueue_script('Ajax-load-more', get_stylesheet_directory_uri() . '/assets/js/load-more.js', array('jquery'), '1.0', true);
    wp_enqueue_script('Ajax-filters-and-sort', get_stylesheet_directory_uri() . '/assets/js/filters-and-sort.js', array('jquery'), '1.0', true);
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

//   Remove admin-bar
function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');

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

// Hook for load-more button (with Ajax)
function load_more()
{
    $ajax_query = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $_POST['paged'],
    ]);

    $max_pages = $ajax_query->max_num_pages;
    $output = '';

    if ($ajax_query->have_posts()) {
        ob_start();
        while ($ajax_query->have_posts()) {
            $ajax_query->the_post();
            get_template_part('templates_part/photos-list');
        }
        $output = ob_get_clean();
    }
    $result = [
        'max' => $max_pages,
        'html' => $output,
    ];
    wp_reset_postdata();
    wp_send_json($result);
    exit;
}
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');


// Hook for filters and sort (with Ajax) 

function filter_and_sort_photos()
{
    $taxonomy_query = array('relation' => 'AND');

    $custom_taxonomies = ['categorie', 'format'];

    foreach ($custom_taxonomies as $custom_taxonomy) {
        if (isset($_POST[$custom_taxonomy]) && !empty($_POST[$custom_taxonomy])) {
            $taxonomy_query[] = array(
                'taxonomy' => $custom_taxonomy,
                'field' => 'slug',
                'terms' => $_POST[$custom_taxonomy],
            );
        }
    }

    $ajax_filters = new WP_Query([
        'post_type'      => 'photo',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => $_POST['date'],
        'tax_query'      => $taxonomy_query,
    ]);

    $response = '';

    if ($ajax_filters->have_posts()) {
        while ($ajax_filters->have_posts()) {
            $ajax_filters->the_post();
            $response .= get_template_part('templates_part/photos-list');
        }
    } else {
        echo '<p class="no-photo">Aucun résultat</p>';
    }

    echo $response;
    wp_reset_postdata();
    exit;
}

add_action('wp_ajax_filter_and_sort_photos', 'filter_and_sort_photos');
add_action('wp_ajax_nopriv_filter_and_sort_photos', 'filter_and_sort_photos');

// To find the taxonomy
function overlay_taxonomy($taxonomy)
{
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    foreach ($terms as $term) {
        $term = $term->name;
    }
    echo $term;
}
