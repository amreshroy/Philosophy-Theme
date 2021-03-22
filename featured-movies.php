<?php
/*
Template Name: Featured Movies
*/
?>
<?php get_header();?>
    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <?php
                $philosophy_arguments = array(
                    'post_type' => 'movie',
                    'meta_key' => 'is_featured',
                    'meta_value' => true
                );
                $philosophy_movies = New WP_Query($philosophy_arguments);
                while ($philosophy_movies->have_posts()){
                    $philosophy_movies->the_post();
                    get_template_part("/template-parts/post-formats/post", get_post_format());
                }
                wp_reset_query();
                ?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->
        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                     <?php philosophy_pagination(); ?>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->

    <!-- s-extra
    ================================================== -->
    <?php get_footer();?>