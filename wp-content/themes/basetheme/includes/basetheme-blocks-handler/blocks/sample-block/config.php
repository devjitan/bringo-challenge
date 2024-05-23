<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

include dirname(__FILE__).'/variables.php';

acf_register_block_type(array(
    'name'              => $block_name,
    'title'				=> __($block_title),
    'description'		=> __($block_description),
    'render_template'   => dirname(__FILE__).'/block-template.php',
    'category'          => 'basetheme-blocks',
    'icon'              => $block_icon,
    'keywords'          => $block_keywords,
    'mode'			    => 'edit',
    'supports'		=> [
        'mode'          => false,
        'align'			=> false,
        'anchor'		=> true,
        'customClassName'	=> true,
    ],
    'example'  => array( // Block Hover preview
        'attributes' => array(
            'mode' => 'preview'
        )
    ),



    // For Container Block ------
    // 'mode'			    => 'preview',
    // 'supports'		=> [
    //     'mode'          => false,
    //     'align'			=> false,
    //     'anchor'		=> true,
    //     'customClassName'	=> true,
    //     'jsx' 			=> true,
    // ]

    // For HEADINGS no preview needed
    // 'mode'			    => 'edit',
    // 'supports'		=> [
    //     'mode'          => false,
    //     'align'			=> false,
    //     'align_text'    => true,
    //     'anchor'		=> true,
    //     'customClassName'	=> true,
    // ]
));