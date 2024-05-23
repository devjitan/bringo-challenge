<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$block_name = basename(dirname(__FILE__)); // Block folder name as block name
$block_title = 'Sample Block';
$block_description = 'Sample block or block boilerplate, just duplicate the whole folder and change the values on variables.php';
$block_icon = 'cover-image';
$block_keywords = array( 'sample','related','kewords' );