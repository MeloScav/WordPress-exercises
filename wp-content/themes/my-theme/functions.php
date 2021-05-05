<?php

function mytheme_supports()
{
    add_theme_support('title-tag');
}

function mytheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery'); // To replace wp jquery with our own
    wp_register_script('jquery', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

// function mytheme_title($title)
// {
//     return 'Salut ' . $title;
// }

function mytheme_title_separator()
{
    return '|';
}

// function mytheme_document_title_parts($title)
// {
//     // unset($title['tagline']);
//     $title['demo'] = 'Salut';
//     return $title;
// }


add_action('after_setup_theme', 'mytheme_supports');
add_action('wp_enqueue_scripts', 'mytheme_register_assets');
// add_filter('wp_title', 'mytheme_title');
add_filter('document_title_separator', 'mytheme_title_separator');
// add_filter('document_title_parts', 'mytheme_document_title_parts');
