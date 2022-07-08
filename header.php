<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dsignfly1
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

<!-- <body <?php body_class(); ?> style="box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2);"> -->
<body <?php body_class(); ?> style="background: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/rapeatable-bg.png')">
<?php wp_body_open(); ?>
<div class="container">
<header id="masthead" class="site-header">
	<div class="header-logo">
		<a href="http://localhost/wordpress101/">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" alt="header-logo" >
		</a>
	</div>
	<nav id="site-navigation" class="main-navigation">
		<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'dsignfly1' ); ?></button> -->
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1', // theme loaction to be used.
				'menu_id'        => 'primary-menu', // Id that is applied to ul element which forms them menu.
			)
		);
		?>
		<form action="<?php echo esc_url( get_site_url() ); ?>" method="get" role="search">
				<li class="nav-list__item nav-list--item6">

					<input class="nav-link header__search" type="search" name="s" id="s" required autocomplete="off">
					<button type="submit" id="searchsubmit" style="padding:0; background-color: transparent; border: none; position:relative; top:4px;">
					<img class="cursor-pointer" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/header-search.png" alt="search icon">
					</button>

				</li>
		</form>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->
</div>
