<?php
/**
 * The template for displaying the front-page
 *
 * This page shows the feature image as the full background and has the text on top of the image.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apPhotography
 */

get_header(); 

	?>
	<div class="ap-content-area page front-page content-area">
        <main>
            <?php 
                if ( have_posts() ) : 
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif; 
                wp_reset_query()
            ?>
        </main><!-- #main -->
            <div class="gallery-content grid-x large-12 meduim-12 small-12">
                <div id="gallery-title-wrapper" class="cell"><h3>Gallery</h3></div>
                <div id="gallery-albums-wrapper" class="cell">
                    <div id="gallery-albums-inner-wrapper" class="cell grid-x">
                    <?php 
                    $args = array (
                        'post_type' => 'apphoto_album',
                        'posts_per_page' => 12,
                    );
                    // the query
                    $events = new WP_Query($args);
                    if($events->have_posts()) :
                        // the loop
                        while ($events->have_posts()) :
                            $events->the_post();
                    ?>
                        <a class="single-album-wrapper large-4 medium-6 small-12" href="<?php echo get_permalink() ?>">
                            <div class="single-album-inner-wrapper cell album-image">
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail();
                                } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/comAlexPino144.png" alt="<?php the_title(); ?>" />
                                <?php } ?>
                            </div>
                            <h2 class="large-12 album-title"> <?php the_title(); ?></h2>
                        </a>
                        <?php endwhile; ?>
                        <!-- end of loop -->
                        <?php else : ?>
                            <p><?php esc_html__('') ?></p>
                        <?php endif; ?>
                    <div> <!-- #gallery-albums-inner-wrapper -->
                </div> <!--#gallery-albums-wrapper -->
            </div> <!--.gallery-content-->

        <?php get_footer(); ?>
	</div><!-- #primary -->
	</div>
<?php

