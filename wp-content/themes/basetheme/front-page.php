<?php get_header();

$product_id = 34; // Replace with your product ID

$terms = get_the_terms($product_id, 'product_cat');
$id = $terms[0];
$args = [
    'page_id' => $product_id,
    'page_title' => $terms[0]->name
];

get_template_part('template-parts/breadcrumbs', null, $args); ?>


<div class="container">
    <?php
    // Query for specific product
    $product = wc_get_product($product_id);
    if ($product) {
        echo do_shortcode('[product_page id="' . $product_id . '"]');
    }
    ?>
</div>

<?php get_footer(); ?>