<?php

function mytheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('post-thumbnail', 350, 215, true);
    // add_image_size('card-header', 350, 215, true);
    // remove_image_size('medium');
    // add_image_size('medium', 500, 500);
}

function mytheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery'); // To replace wp jquery with our own
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
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

function mytheme_menu_class(array $classes): array
{
    // Debug
    // var_dump(func_get_args());
    // die();
    $classes[] = 'nav-item';
    return $classes;
}

function mytheme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function mytheme_pagination()
{
    $pages = paginate_links(['type' => 'array']);
    if ($pages === null) {
        return;
    }

    echo '<nav aria-label="Page navigation example" class="my-4">';
    echo '<ul class="pagination">';

    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul';
    echo '</nav>';
}

add_action('after_setup_theme', 'mytheme_supports');
add_action('wp_enqueue_scripts', 'mytheme_register_assets');
// add_filter('wp_title', 'mytheme_title');
add_filter('document_title_separator', 'mytheme_title_separator');
// add_filter('document_title_parts', 'mytheme_document_title_parts');
add_filter('nav_menu_css_class', 'mytheme_menu_class');
add_filter('nav_menu_link_attributes', 'mytheme_menu_link_class');

require_once('metaboxes/sponso.php');
SponsoMetaBox::register();
