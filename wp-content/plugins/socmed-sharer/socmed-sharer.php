<?php /*
Plugin Name:  Social Media Share
Description:  Share buttons.
Version:      1.0
Author:       Jimson Tan
*/

function backend_sm_enqueue_script()
{
    wp_enqueue_script('socmed-main', plugins_url('assets/js/be-main.js', __FILE__), '1.0.0', false);
    wp_enqueue_style('socmed-main', plugins_url('assets/css/be-main.css', __FILE__), '1.0.0', false);
}
add_action('admin_enqueue_scripts', 'backend_sm_enqueue_script');

function frontend_sm_enqueue_script()
{
    wp_enqueue_script('socmed-main', plugins_url('assets/js/fe-main.js', __FILE__), '1.0.0', false);
    wp_enqueue_style('socmed-main', plugins_url('assets/css/fe-main.css', __FILE__), '1.0.0', false);
}
add_action('wp_enqueue_scripts', 'frontend_sm_enqueue_script');

require_once 'includes/sm-shortocde.php';


// Register Menu
function register_pd_menus()
{

    add_menu_page(
        'SM Share',
        'SM Share',
        'edit_others_posts',
        'social-media-share',
        function () {
            include "includes/social-media.php";
        },
        'dashicons-share',
        6
    );
}


add_action('admin_menu', 'register_pd_menus');
