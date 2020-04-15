<?php
/**
 * The template for displaying the feature image on the left side of the page
 *
 * Template Name: Feature Left
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
    <section class="grid-x ap-whole-page">
        <!-- header -->
        <header class="large-3 medium-3 small-12">
            <?php
                get_header();
            ?>
        </header>

        <section class="ap-main-content-wrapper large-9 medium-9 small-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <?php
            get_sidebar();
            get_footer();
            ?>
        </section> <!--.ap-main-content-wrapper-->
    </section> <!--whole page-->

<?php
