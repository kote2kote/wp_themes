<?php

/*==========================================================
reset
===========================================================*/

//フィード配信の削除
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
//CSSを削除
remove_action('wp_head', 'wp_print_styles', 8);
//link rel="EditURI"の削除
remove_action('wp_head', 'rsd_link');
//link rel="wlwmanifest"の削除
remove_action('wp_head', 'wlwmanifest_link');
//link rel="prev"、link rel="next"の削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
//link rel="canonical"の削除
remove_action('wp_head', 'rel_canonical');
//link rel="index"の削除
remove_action('wp_head', 'index_rel_link');
//link rel="up"の削除
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
//link rel="strat"の削除
remove_action('wp_head', 'start_post_rel_link', 10, 0);
//link rel="shortlink"の削除
remove_action('wp_head', 'wp_shortlink_wp_head');
//meta name="genarator"（WPのバージョン情報）の削除
remove_action('wp_head', 'wp_generator');
//絵文字関連の削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('admin_print_styles', 'print_emoji_styles');
//embed関連の削除
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
//DNS Prefetchingの削除
remove_action('wp_head', 'wp_resource_hints', 2);
//jqueryの削除
function my_delete_local_jquery() {
    wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

/*==========================================================
functions
===========================================================*/

function easiestwp_scripts() {
	wp_enqueue_style( 'easiestwp-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'easiestwp_scripts' );

function easiestwp_setup() {
	add_theme_support( 'title-tag' );

  // アイキャッチ
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'easiestwp-thumbnail', 190, 130, true );

	add_image_size( 'easiestwp-hero', 1200, 630, true );

	register_nav_menus( array(
		'global' => 'Global Menu',
	) );
}
add_action( 'after_setup_theme', 'easiestwp_setup' );

function easiestwp_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
	) );

	register_sidebar( array(
		'name' => 'Footer',
		'id' => 'footer',
	) );
}
add_action( 'widgets_init', 'easiestwp_widgets_init' );
