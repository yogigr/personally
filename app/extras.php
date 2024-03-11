<?php


if (!function_exists('custom_nav_menu')) {
    function custom_nav_menu($location="") {
       $menus = wp_get_nav_menu_items(get_nav_menu_locations()[$location]);
       return array_map(function($item) {
            return [
                'title' => $item->title,
                'url' => $item->url,
                'active' => $item->object_id == get_queried_object_id()
            ];
       }, $menus);
    }
}

if (!function_exists('current_category()')) {
    function current_category() {
        $term_id = get_queried_object()->term_id;
        $title = single_term_title("", false);
        $desc = str_replace(['<p>', '</p>', "\n"], "", category_description());
        return [$term_id, $title, $desc];
    }
}

if (!function_exists('get_custom_categories')) {
    function get_custom_categories() {
        return array_map(function($cat) {
            return [
                'term_id' => $cat->term_id,
                'name' => $cat->name,
                'url' => get_category_link($cat->term_id)
            ];
        }, get_categories([
            'orderby' => 'name',
            'order' => 'ASC',
            'parent' => 0
        ]));
    }
}

if (!function_exists('homepage_settings')) {
    function homepage_settings() {
        $tagline = get_theme_mod('personally_homepage_tagline_setting');
        $description = get_theme_mod('personally_homepage_description_setting');
        $url = get_theme_mod('personally_url_setting');
        return [
            $tagline,
            $description,
            $url
        ];
    }
}