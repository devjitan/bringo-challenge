<?php
/**
 * Template Name: General Page
 */

get_header(); ?>

<div class="text-center">
    <?php
    if(have_posts()){
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile; // End of the loop.
    }
    ?>
</div>

<?php get_footer(); ?>
