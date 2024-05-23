<?php get_header();
if (have_posts()) :
    while (have_posts()) :
        the_post();

        $terms = get_the_terms(get_the_ID(), 'product_cat');
        $id = $terms[0];
        $args = [
            'page_id' => $id,
            'page_title' => $terms[0]->name
        ];

        get_template_part('template-parts/breadcrumbs', null, $args); ?>
        
        <div class="container">
            <?php the_content(); ?>
        </div>

<?php
    endwhile; // End of the loop.
endif; ?>

<?php get_footer(); ?>