<?php/*
Plugin Name: Héritage du Cercle - GrandChild Theme
Plugin URI: https://www.heritageducercle.fr/
Description: A WordPress Grandchild Theme (as a plugin) for Héritage du Cercle
Author: Héritage du Cercle
Version: 0.1
Author URI: https://www.heritageducercle.fr/
*/

// I got this code here : https://www.wp-code.com/wordpress-snippets/wordpress-grandchildren-themes/

// These two lines ensure that your CSS is loaded alongside the parent or child theme's CSS
add_action('wp_head', 'swswhdc_theme_add_headers', 0);
add_action('init', 'swhdc_theme_add_css');

// This filter replaces a complete file from the parent theme or child theme with your file (in this case the archive page).
// Whenever the archive is requested, it will use YOUR archive.php instead of that of the parent or child theme.

// add_filter ('archive_template', create_function ('', 'return plugin_dir_path(__FILE__)."archive.php";'));

function swhdc_theme_add_headers () {
    wp_enqueue_style('swswhdc_style');
}

function swhdc_theme_add_css() {
    $timestamp = @filemtime(plugin_dir_path(__FILE__).'/style.css');
    wp_register_style ('swswhdc_style', plugins_url('style.css', __FILE__).'', array(), $timestamp);
}

// In the rest of your plugin, add your normal actions and filters, just as you would in functions.php in a child theme.
