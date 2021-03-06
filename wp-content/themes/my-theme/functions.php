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

function mytheme_init()
{
    register_taxonomy('sport', 'post', [
        'labels' => [
            'name'          => 'Sport',
            'singular_name' => 'Sport',
            'plural_name'   => 'Sports',
            'search_items'  => 'Rechercher des sports',
            'all_items'     => 'Tous les sports',
            'edit_item'     => 'Editer le sport',
            'update_item'   => 'Mettre à jour le sport',
            'add_new_item'  => 'Ajouter un nouveau sport',
            'new_item_name' => 'Ajouter un nouveau sport',
            'menu_name'     => 'Sport'
        ],
        'show_in_rest'      => true,
        'hierarchical'      => true,
        'show_admin_column' => true
    ]);

    register_post_type('bien', [
        'label' => 'Bien',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true
    ]);
}

add_action('init', 'mytheme_init');
add_action('after_setup_theme', 'mytheme_supports');
add_action('wp_enqueue_scripts', 'mytheme_register_assets');
// add_filter('wp_title', 'mytheme_title');
add_filter('document_title_separator', 'mytheme_title_separator');
// add_filter('document_title_parts', 'mytheme_document_title_parts');
add_filter('nav_menu_css_class', 'mytheme_menu_class');
add_filter('nav_menu_link_attributes', 'mytheme_menu_link_class');

require_once('metaboxes/sponso.php');
require_once('options/agency.php');

SponsoMetaBox::register();
AgencyMenuPage::register();

// Bien
add_filter('manage_bien_posts_columns', function ($columns) {
    return [
        'cb' => $columns['cb'],
        'thumbnail' => 'Miniature',
        'title' => $columns['title'],
        'date' => $columns['date']
    ];
});

add_filter('manage_bien_posts_custom_column', function ($column, $postId) {
    the_post_thumbnail('thumbnail', $postId);
}, 10, 2);

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('admin_mytheme', get_template_directory_uri() . '/assets/admin.css');
});

// Article
add_filter('manage_post_posts_columns', function ($columns) {
    $newColumns = [];

    foreach ($columns as $k => $v) {
        if ($k === 'date') {
            $newColumns['sponso'] = 'Article sponsorisé ?';
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});

add_filter('manage_post_posts_custom_column', function ($column, $postId) {
    if ($column === 'sponso') {
        if (!empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true))) {
            $class = 'yes';
        } else {
            $class = 'no';
        }
        echo '<div class="bullet bullet-' . $class . '"></div>';
    }
}, 10, 2);

// URL management and search
function mytheme_pre_get_posts(WP_Query $query)
{
    // if (is_admin() || !is_home() || !$query->is_main_query()) {
    //     return;
    // }

    if (is_admin() || !is_search() || !$query->is_main_query()) {
        return;
    }

    if (get_query_var('sponso') === '1') {
        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => SponsoMetaBox::META_KEY,
            'compare' => 'EXISTS'
        ];
        $query->set('meta_query', $meta_query);
    }
}

function mytheme_query_vars($params)
{
    $params[] = 'sponso';
    return $params;
}

add_action('pre_get_posts', 'mytheme_pre_get_posts');
add_filter('query_vars', 'mytheme_query_vars');

// SIDEBAR - WIDGET
require_once('widgets/YoutubeWidget.php');

function mytheme_register_widget()
{
    register_widget(YoutubeWidget::class);
    register_sidebar([
        'id' => 'homepage',
        'name' => 'Sidebar Accueil',
        'before_widget' => '<div class="p-4 %2$s" i="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="font-italic">',
        'after_title' => '</h4>'
    ]);
}

add_action('widgets_init', 'mytheme_register_widget');
