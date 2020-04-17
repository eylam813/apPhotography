<?php
/**
 * The template for displaying the the Gallery Categories vertically in a row.
 *
 * This is the template that displays all albums by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apPhotography
 */


?>
    <section class="grid-x ap-whole-page">
        <!-- header -->
        <!-- <header class="large-3 medium-3 small-12 grid-x"> -->
            <?php
                get_header();
            ?>
        <!-- </header> -->

        <!-- <section class="ap-main-content-wrapper large-9 medium-9 small-12 grid-x"> -->
                
                <div id="gallery-ap-primary" class=" gallery-template gallery-ap-content-area cell">
                <!-- <div id="primary" class="content-area"> -->
                    <div class="grid-x">
                        <main id="gallery-ap-main" class="ap-site-main gallery-ap-main-content-wrapper grid-x">
                        <!-- <main id="main" class="site-main ap-main-content-wrapper"> -->
                            <!-- <div class="gallery-image large-4 medium-12 small-12" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div> -->

                            <div class="gallery-content large-12 meduim-12 small-12">
                                <h3>This is my page-gallery template!</h3>

                                <?php 
                                $args = array (
                                    'post_type' => 'sample_theme_book',
                                    'posts_per_page' => 2,
                                );
                                // the query
                                $events = new WP_Query($args);

                                if($events->have_posts()) :
                                    // the loop
                                    while ($events->have_posts()) :
                                        $events->the_post();
                                ?>
                                    <a class="single-album-wrapper" href="<?php echo get_permalink() ?>">
                                        <div class="single-album-inner-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                                            <h2 class="large-12"><?php the_title(); ?></h2>
                                        </div>
                                    </a>
                                    <?php endwhile; ?>
                                    <!-- end of loop -->
                                    <?php else : ?>
                                        <p><?php esc_html__('No Photo Albums at the moment') ?></p>
                                    <?php endif; ?>          
                                    

                                        </div> <!--.left-feature-content -->
                                        
                                        <br>
                            </div>
                        </main><!-- #left-feature-ap-main .ap-main-content-wrapper-->
                    </div>  <!-- .grid-x -->
                </div><!-- #ap-primary -->

                <?php
                get_sidebar();
                get_footer();
                ?>
            
        <!-- </section>  -->
        <!--.ap-main-content-wrapper-->
    </section> <!--whole page-->

<?php
