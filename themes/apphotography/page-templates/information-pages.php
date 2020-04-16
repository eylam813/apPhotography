<?php
/**
 * The template for displaying informative pages
 *
 * Template Name: Information Pages
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apPhotography
 */


?>
    <!-- <section class="grid-x ap-whole-page"> -->
        <!-- header -->
        <!-- <header class="large-3 medium-3 small-12 grid-x"> -->
            <?php
                get_header();
            ?>
        <!-- </header> -->

        <!-- <section class="ap-main-content-wrapper large-9 medium-9 small-12 grid-x"> -->
            
                <div id="ap-primary" class="ap-content-area infoPage">
                <!-- <div id="primary" class="content-area"> -->
                    <div class="grid-x">
                        <main id="ap-main" class="ap-site-main ap-main-content-wrapper">
                        <!-- <main id="main" class="site-main ap-main-content-wrapper"> -->

                            <?php
                            while ( have_posts() ) :
                                ?>
                                <div class="large-3 medium-3 small-12">
                                    <?php the_post_thumbnail(); ?>
                                </div>

                                <?php
                                
                                the_post();

                                get_template_part( 'template-parts/content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>
                        </main><!-- #main -->
                    </div>  <!--.ap-main-content-wrapper-->
                </div><!-- #primary -->

                <?php
                get_footer();
                ?>
            
        <!-- </section>  -->
        <!--.ap-main-content-wrapper-->
    </section> <!--whole page-->

<?php
