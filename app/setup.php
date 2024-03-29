<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');

   /**
     * Adding Custom Logo support
     *
     * @link https://developer.wordpress.org/themes/functionality/custom-logo/
     */
    add_theme_support('custom-logo', [
        'height'               => 16,
		'width'                => 99,
        'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true,
    ]);

    /**
     * Disable Admin Bar for All Users Except Admins
     *
     * @link https://www.wpbeginner.com/wp-tutorials/how-to-disable-wordpress-admin-bar-for-all-users-except-administrators/
     */
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
/*
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
*/


add_action('customize_register', function($wp_customize) {
    // remove static front page section
    $wp_customize->remove_section('static_front_page');

    // add custom homepage setting section
    $wp_customize->add_section( 'personally_homepage_settings_section' , array(
        'title'      => __( 'Homepage settings', 'personally' ),
        'priority'   => 30,
    ));

    // tagline setting & control
    $wp_customize->add_setting( 'personally_homepage_tagline_setting', array());
    $wp_customize->add_control( new \WP_Customize_Control(
        $wp_customize,
        'personally_homepage_tagline_control',
            array(
                'label'      => __( 'Homepage tagline', 'personally' ),
                'section'    => 'personally_homepage_settings_section',
                'settings'   => 'personally_homepage_tagline_setting',
                'priority'   => 1
            )
        )
    );

    // description setting and & control
    $wp_customize->add_setting( 'personally_homepage_description_setting', array());
    $wp_customize->add_control( new \WP_Customize_Control(
        $wp_customize,
        'personally_homepage_description_control',
            array(
                'label'      => __( 'Homepage description', 'personally' ),
                'section'    => 'personally_homepage_settings_section',
                'settings'   => 'personally_homepage_description_setting',
                'priority'   => 1
            )
        )
    );

    // url setting and & control
    $wp_customize->add_setting( 'personally_url_setting', array());
    $wp_customize->add_control( new \WP_Customize_Control(
        $wp_customize,
        'personally_url_control',
            array(
                'label'      => __( 'URL', 'personally' ),
                'section'    => 'personally_homepage_settings_section',
                'settings'   => 'personally_url_setting',
                'priority'   => 1
            )
        )
    );
});
