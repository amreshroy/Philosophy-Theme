<?php
/**
 * Template Name: Contact Page
 */
the_post();
get_header();
?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php the_title();?>
                </h1>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail("single_post"); ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="s-content__media col-full">
                <div id="map-wrap">
                    <?php if ( is_active_sidebar( 'contact-google-maps' ) ) { ?>
                            <?php dynamic_sidebar('contact-google-maps'); ?>
                    <?php 
                    } 
                    ?>
                </div>
                    <?php the_content(); ?>

                <div class ="row block-1-2 block-tab-full">
                    <?php if ( is_active_sidebar( 'contact-page-sidebar' ) ) { ?>
                            <?php dynamic_sidebar('contact-page-sidebar'); ?>
                    <?php 
                    } 
                    ?>
                </div>

            </div> <!-- end s-content__main -->

            <h3><?php echo _e("Says Hello", "philosophy"); ?></h3>

            <div>
                <?php
                if(get_field("contact_form_shortcode")){
                    echo do_shortcode(get_field("contact_form_shortcode"));
                }
                ?>
            </div>

        </article>

   <?php
   get_footer();
   ?>