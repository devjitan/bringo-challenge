<?php get_header(); ?>

    <div class="h-100 py-5 my-5">
        <div class="text-center welcome animate__bounceIn">
            <h1 style="font-size:5rem;"><i class="far fa-file"></i></h1>
            <h1 class="m-0"><strong>Index</strong></h1>
            <h5><strong>This is index.php</strong></h5>
        </div>
    </div>

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
