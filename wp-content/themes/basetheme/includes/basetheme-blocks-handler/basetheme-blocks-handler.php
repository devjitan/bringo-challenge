<?php
/*
*   Base Theme Blocks Handler
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

//Register a custom Category Block
function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_unshift(  // array_unshift to show this Category First
            $block_categories,
            array(
                'slug'  => 'basetheme-blocks',
                'title' => __( 'Theme Blocks', 'basetheme-blocks' ),
                'icon'  => null,
            )
        );
    }

    return $block_categories;
}
add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );

// Registering Custom Blocks
function acf_init_block_types() { // Need to be unique to avoid conflict with other blocks
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        $paths = glob( dirname(__FILE__).'/blocks/*', GLOB_BRACE );

        foreach( $paths as $blocks) {
            $block_name = basename($blocks);
            include dirname(__FILE__).'/blocks/'.$block_name.'/config.php';
        }
    }
}
add_action('acf/init', 'acf_init_block_types');
