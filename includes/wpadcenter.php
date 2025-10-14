<?php

// custom wpadcenter plugins

function wpadcenter_manage_edit_ads_columns_custom($columns)
{
    $columns['ad-unit'] = __( 'Ad Unit', 'wpadcenter' );

    return $columns;
}

add_action( 'wp_adcenter_manage_edit_ads_columns', 'wpadcenter_manage_edit_ads_columns_custom' );

function wp_adcenter_manage_ads_column_values_custom($return_value, $column, $ad_id)
{
    switch ($column) {
        case 'ad-unit':
            $names = wp_get_post_terms( $ad_id, 'ad-unit', array( 'fields' => 'names' ) );

            if ( ! count( $names ) ) {
                $return_value = esc_html( '-' );
            } else {
                $return_value = esc_html( implode( ', ', $names ) );
            }

            break;
    }

    return $return_value;
}

add_action( 'wp_adcenter_manage_ads_column_values', 'wp_adcenter_manage_ads_column_values_custom', 10, 3);

function query_ads(string $adUnit)
{
    $tags = get_dfp_targets();
    $args = [
        'post_type' => 'wpadcenter-ads',
        'meta_query' => [
            [
                'key'       => 'wpadcenter_start_date',
                'value'     => time(),
                'compare'   => '<=',
            ],
            [
                'key'       => 'wpadcenter_end_date',
                'value'     => time(),
                'compare'   => '>=',
            ]
        ],
        'tax_query' => [
            [
                'taxonomy' => 'ad-unit',
                'field' => 'slug',
                'terms' => $adUnit,
            ],
            [
                'taxonomy' => 'page-targeting',
                'field' => 'slug',
                'terms' => $tags,
            ]
        ]
    ];

    $query = new WP_Query($args);

    return $query;
}

function get_ads(string $adUnit, string $align = 'center')
{
    $query = query_ads($adUnit);

    foreach ($query->posts as $ad) {
        if (function_exists('wpadcenter_display_ad')) {
            wpadcenter_display_ad( [
                'id' => $ad->ID,
                'align' => $align
            ]);
        }
    }
}

function insert_ad_mid_post($content) {
    if (is_single() && in_the_loop() && is_main_query()) {
        // Split the post into paragraphs
        $paragraphs = explode('</p>', $content);
        $insert_after = floor(count($paragraphs) / 2); // middle of post
        $ads = query_ads('middle-leaderboard');

        foreach ($ads->posts as $index => $ad) {
            $ad_shortcode = '[wp_adcenter_ad id="' . $ad->ID . '" align="center"]';
            $ad_html = do_shortcode($ad_shortcode);
            array_splice($paragraphs, $insert_after + $index, 0, $ad_html);
        }
        // Rejoin the content
        $content = implode('</p>', $paragraphs);
    }

    return $content;
}

add_filter('the_content', 'insert_ad_mid_post');
