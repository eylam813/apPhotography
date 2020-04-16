<?php
/**
 * The template for displaying the the Gallery Categories vertically in a row.
 *
 * Template Name: Vertical Gallery
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
                
                <div id="left-feature-ap-primary" class=" left-feature-temp left-feature-ap-content-area cell">
                <!-- <div id="primary" class="content-area"> -->
                    <div class="grid-x">
                        <main id="left-feature-ap-main" class="ap-site-main left-feature-ap-main-content-wrapper grid-x">
                        <!-- <main id="main" class="site-main ap-main-content-wrapper"> -->
                            <!-- <div class="left-feature-image large-4 medium-12 small-12" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div> -->

                            <div class="left-feature-content large-12 meduim-12 small-12">
                            <?php 
                                if ( have_posts() ) : 
                                    while ( have_posts() ) : the_post();
                                        ?> <h1> <?php the_title(); ?> </h1> <?php
                                        // the_title( '&lt;h1>', '&lt;/h1>' );
                                        the_content();
                                    endwhile;
                                    
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                endif; 
                                wp_reset_query()
                            ?>
                            </div> <!--.left-feature-content -->
                            
                            <br>
                            </div>
                        </main><!-- #main -->
                    </div>  <!--.ap-main-content-wrapper-->
                </div><!-- #ap-primary -->

                <?php
                get_sidebar();
                get_footer();
                ?>
            
        <!-- </section>  -->
        <!--.ap-main-content-wrapper-->
    </section> <!--whole page-->

<?php
