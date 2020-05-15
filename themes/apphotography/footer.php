<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apPhotography
 */

?>


</div><!-- #page -->
	<footer id="colophon" class="site-footer">
		<?php
			// loading the menu
			if ( has_nav_menu( 'menu-2' ) ) {
				$args = array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
					'container'		 => 'ul',
					'container_class' => 'menu',
				);
				wp_nav_menu($args);
			}
						?>
		<div class="site-info">
		Copyright &copy; <script>
                document.write(new Date().getFullYear());
            </script> Alejandro Pino  - Design Implemented by <a href="http://zferguson.ca/" target="_blank">Zoe</a> and <a href="http://emilylam.ca/" target="_blank">Emily</a>
		
		<!-- Social Media Links -->
		<?php if (get_theme_mod('apphotography_facebook_url') || get_theme_mod('apphotography_twitter_url')) { ?>
				<div class="social-media-footer">
					<?php if (get_theme_mod('apphotography_facebook_url')) { ?>

						<!-- dynamic social media links -->
						<!-- dynamic facebook link -->
						<a href="<?php echo get_theme_mod('apphotography_facebook_url'); ?>"><?php echo esc_html__('', 'apphotography'); ?> <img src="<?php echo get_template_directory_uri() . '/assets/img/facebook.svg'; ?>" title="<?php echo esc_html__('', 'apphotography'); ?>" height="50" width="50"> </a>
						<?php } ?>
						<?php if (get_theme_mod('apphotography_twitter_url')) { ?>
						<!-- dynamic twitter link -->
						<a href="<?php echo get_theme_mod('apphotography_twitter_url'); ?>"><?php echo esc_html__('', 'apphotography'); ?> <img src="<?php echo get_template_directory_uri() . '/assets/img/twitter.svg'; ?>" title="<?php echo esc_html__('', 'apphotography'); ?>" height="50" width="50"> </a>
						<?php } ?>
						<?php if (get_theme_mod('apphotography_instagram_url')) { ?>
						<!-- dynamic instagram link -->
						<a href="<?php echo get_theme_mod('apphotography_instagram_url'); ?>"><?php echo esc_html__('', 'apphotography'); ?> <img src="<?php echo get_template_directory_uri() . '/assets/img/instagram.svg'; ?>" title="<?php echo esc_html__('', 'apphotography'); ?>" height="50" width="50"> </a>

					<?php } ?>
				</div> <!--social media-->
			<?php } ?>
			</div>
		<!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</div><!-- #ap-content -->
</section><!-- #ap-content-wrapper -->
</body>
</html>
