<?php

/**
 * This is file for all of your custom functions for the project
 */

/**
 * Enables the Link Manager that existed in WordPress until version 3.5.
 */
// add_filter('pre_option_link_manager_enabled', '__return_true');

function my_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-json';

    return $path;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

//Add Style
function theme_enqueue_styles()
{
    // wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/vendor/bootstrap/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
    
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//Add Script
function theme_enqueue_script()
{
    // wp_enqueue_script('ant-design', 'https://cdnjs.cloudflare.com/ajax/libs/antd/5.23.3/antd.min.js', [], false, true);
}

// DFP Tags
function get_dfp_targets()
{
    global $post;
    $targets = [];

    if (is_home() || is_front_page() || is_page(['newsletter', 'print-and-digital-subscription'])) {
        $targets[] = 'home';
    } elseif (is_singular(array('post', 'features'))) {
        $categories = wp_get_object_terms($post->ID, 'category');
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $targets[] = $category->slug;
            }
        }
        $targets[] = array_push($targets, "$post->ID");
    } elseif (is_author()) {
        $targets[] = 'home';
    } elseif (is_category()) {
        $term = get_queried_object();
        if ($term->parent > 0) {
            $term      = get_term_by('id', $term->parent, 'category');
            $targets[] = $term->slug;
        } else {
            $targets[] = $term->slug;
        }
    }

    return $targets;
}

function theme_setup()
{
    /* add woocommerce support */
    add_theme_support('woocommerce');
    /* add title tag support */
    add_theme_support('title-tag');
    /* Add default posts and comments RSS feed links to head */
    add_theme_support('automatic-feed-links');
    /* Add excerpt to pages */
    add_post_type_support('page', 'excerpt');
    /* Add support for post thumbnails */
    add_theme_support('post-thumbnails');
    /* Add support for Selective Widget refresh */
    add_theme_support('customize-selective-refresh-widgets');
    /** Add sensei support */
    add_theme_support('sensei');
    /* Add support for HTML5 */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'widgets',
    ));
    /*  Enable support for Post Formats */
    add_theme_support('post-formats', array('video'));
    /* Register Menus */
    register_nav_menus( [
        'mobile_menu' => __( 'Mobile', 'rrvn' ),
    ]);
}

add_action('after_setup_theme', 'theme_setup');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}