<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apPhotography
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site grid-container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'apphotography' ); ?></a>
<div class="large-2">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<div>
							<!-- Social Media Links -->
							<?php if (get_theme_mod('apphotography_facebook_url') || get_theme_mod('apphotography_twitter_url')) { ?>
								<div class="social-media">
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

								<?php } ?>
								</div>
						</div>
						
										</header><!-- #masthead -->
										</div><!--large-2-->
	<div id="content" class="site-content">
