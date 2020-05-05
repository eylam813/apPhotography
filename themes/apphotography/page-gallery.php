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

get_header();
?>
    <section class="grid-x ap-whole-page large-12 medium-12 small-12">
                
        <div id="gallery-ap-primary" class=" gallery-template gallery-ap-content-area grid-x ">
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
                            <p><?php esc_html__('No Photo Albums at the moment') ?></p>
                        <?php endif; ?>
                    <div> <!-- #gallery-albums-inner-wrapper -->
                </div> <!--#gallery-albums-wrapper -->
            </div> <!--.gallery-content-->
        </div><!-- #gallery-ap-primary -->

        <?php
        get_footer();
        ?>

    </section> <!--whole page-->

<?php
