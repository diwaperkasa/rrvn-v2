<?php

/**
 * This is file for all of your custom functions for the project
 */

/**
 * Enables the Link Manager that existed in WordPress until version 3.5.
 */
// add_filter('pre_option_link_manager_enabled', '__return_true');

/*
    db.post
    .aggregate([
        // { $match: {	"_id": ObjectId("6752c1df517f65e75aebfad1") }},
        {
            "$addFields": {
                "post_id": {
                    "$toString": "$_id"
                }
            }
        },
        {
            "$addFields": {
                "seo_id": {
                    "$toObjectId": "$seoId"
                }
            }
        },
        {
            "$addFields": {
                "seo_url_id": {
                    "$toObjectId": "$seoUrlId"
                }
            }
        },
        {
            "$addFields": {
                "user_id": {
                    "$toObjectId": "$authorId"
                }
            }
        },
        {
            "$addFields": {
                "category_id": {
                    "$toObjectId": "$primaryCategoryId"
                }
            }
        },
        {
            $sort: {
                publishedAt: -1
            }
        },
        {
            $lookup: {
                from: 'postcontent',
                localField: 'post_id',
                foreignField: 'postId',
                pipeline: [
                    // {$project: {slider: 1, content: 1} },
                    {
                        $sort: {
                            idx: 1
                        }
                    }
                ],
                as: 'postcontent'
            },
        },
        {
            $lookup: {
                from: 'seo_aio',
                localField: 'seo_id',
                foreignField: '_id',
                as: 'seo_aio'
            },
        },
        {
            $unwind: {
                path: "$seo_aio",
            }
        },
        {
            $lookup: {
                from: 'keywords',
                let: {
                    item_ids: "$seo_aio.keyword_id"
                },
                pipeline: [{
                    $match: {
                        $expr: {
                            $in: ["$_id", {
                                $map: {
                                    input: "$$item_ids",
                                    as: "id",
                                    in: {
                                        $toObjectId: "$$id"
                                    }
                                }
                            }]
                        }
                    }
                }],
                as: 'keywords'
            },
        },
        {
            $lookup: {
                from: 'seo_url',
                localField: 'seo_url_id',
                foreignField: '_id',
                as: 'seo_url'
            },
        },
        {
            $unwind: {
                path: "$seo_url",
            }
        },
        {
            $lookup: {
                from: 'users',
                localField: 'user_id',
                foreignField: '_id',
                as: 'user'
            },
        },
        {
            $unwind: {
                path: "$user",
            }
        },
        {
            $lookup: {
                from: 'categories',
                localField: 'category_id',
                foreignField: '_id',
                as: 'category'
            },
        },
        {
            $unwind: {
                path: "$category",
            }
        },
        {
            $limit: 10
        },
    ]);
 */

function my_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-json';

    return $path;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

//Add Style
function theme_enqueue_styles()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//Add Script
function theme_enqueue_script()
{
    // wp_enqueue_script('ant-design', 'https://cdnjs.cloudflare.com/ajax/libs/antd/5.23.3/antd.min.js', [], false, true);
    if (is_category()) {
        // load more button on category page
        $termIds = get_term_children(get_queried_object()->term_id, 'category');
        $termIds[] = get_queried_object()->term_id;

        $args = array(
            'nonce' => wp_create_nonce('load-more-category-post-nonce'),
            'url'   => site_url('wp-json/wp/v2/posts'),
            'query' => [
                'embed_html' => 1,
                'order' => 'desc',
                'orderby' => 'date',
                'status' => 'publish',
                'categories' => $termIds,
                'page' => 1,
                'per_page' => 10,
            ],
        );

        wp_localize_script('scripts', 'load_more_category_post', $args);
    }

    // search bar
    $args = array(
        'nonce' => wp_create_nonce('search-post-nonce'),
        'url'   => site_url('wp-json/wp/v2/posts'),
        'query' => [
            'order' => 'desc',
            'orderby' => 'date',
            'status' => 'publish',
            'page' => 1,
            'per_page' => 10,
        ],
    );

    wp_localize_script('scripts', 'search_post', $args);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_script');

function json_to_html( $response, $post, $request ) {
    if ($request->get_param('embed_html')) {
        setup_postdata($post);
        ob_start();
        get_template_part('parts/category-post');
        $html = ob_get_contents();
        ob_end_clean();
        $response->data['html'] = $html;
    }
  
    return $response;
}

add_filter( 'rest_prepare_post', 'json_to_html', 10, 3 );

// DFP Tags
function get_dfp_targets()
{
    global $post;
    $targets = ["all"];

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
        $targets[] = 'category';
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

function rrvn_customize_register( $wp_customize ) {

    // Add a Section
    $wp_customize->add_section( 'rrvn_media_social', array(
        'title'    => __( 'RobbReport Settings'),
        'priority' => 30,
    ));

    // Add a Setting
    $wp_customize->add_setting( 'rrvn_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_setting( 'facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting( 'instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting( 'youtube_url', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting( 'wedding_dreams_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_setting( 'wedding_dreams_url', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting( 'gourmet_collection_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_setting( 'gourmet_collection_url', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_setting( 'subscribe_url', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add a Control (Text Field)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rrvn_logo_control', array(
        'label'    => __( 'RobbReport Logo'),
        'section'  => 'rrvn_media_social',
        'settings' => 'rrvn_logo',
    )));

    $wp_customize->add_control( 'facebook_control', array(
        'label'    => __( 'Facebook URL'),
        'section'  => 'rrvn_media_social',
        'settings' => 'facebook_url',
        'type'     => 'text',
    ));

    $wp_customize->add_control( 'instagram_control', array(
        'label'    => __( 'Instagram URL'),
        'section'  => 'rrvn_media_social',
        'settings' => 'instagram_url',
        'type'     => 'text',
    ));

    $wp_customize->add_control( 'youtube_control', array(
        'label'    => __( 'Instagram URL'),
        'section'  => 'rrvn_media_social',
        'settings' => 'youtube_url',
        'type'     => 'text',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wedding_dreams_image_control', array(
        'label'    => __( 'Wedding Dreams Image'),
        'section'  => 'rrvn_media_social',
        'settings' => 'wedding_dreams_image',
    )));

    $wp_customize->add_control( 'wedding_dreams_control', array(
        'label'    => __( 'Wedding Dreams Link'),
        'section'  => 'rrvn_media_social',
        'settings' => 'wedding_dreams_url',
        'type'     => 'text',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gourmet_collection_image_control', array(
        'label'    => __( 'Gourmet Collection Image'),
        'section'  => 'rrvn_media_social',
        'settings' => 'gourmet_collection_image',
    )));

    $wp_customize->add_control( 'gourmet_collection_control', array(
        'label'    => __( 'Gourmet Collection Link'),
        'section'  => 'rrvn_media_social',
        'settings' => 'gourmet_collection_url',
        'type'     => 'text',
    ));

    $wp_customize->add_control( 'subscribe_control', array(
        'label'    => __( 'Subscribe Link'),
        'section'  => 'rrvn_media_social',
        'settings' => 'subscribe_url',
        'type'     => 'text',
    ));
}

add_action( 'customize_register', 'rrvn_customize_register' );

function post_link_custom($permalink, $post)
{
    if ($customLink = get_field('external_article_link', $post->ID)) {
        return $customLink;
    }

    return $permalink;
}

add_filter( 'post_link', 'post_link_custom', 10, 2);

function rest_send_nocache_headers_custom($isUserLoggedIn)
{
    return true;
}

add_filter('rest_send_nocache_headers', 'rest_send_nocache_headers_custom');

function dom_modify_img($content) {
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML('<?xml encoding="utf-8" ?>' . $content);
    $tags = $doc->getElementsByTagName('img');

    foreach ($tags as $tag) {
        // ex: /images/2022/09/HERECOMESTHESUN-27-MainDeck-cinema.jpg
        $src = $tag->getAttribute('src');
        $src = str_replace('/images', 'https://storage.googleapis.com/td-robb-media', $src);
        $tag->setAttribute('src', $src);
    }

    $body = $doc->getElementsByTagName('body')->item(0);
    $content = '';

    foreach ($body->childNodes as $child) {
        $content .= $doc->saveHTML($child);
    }

    return $content;
}

add_filter('the_content', 'dom_modify_img');

include "wpadcenter.php";