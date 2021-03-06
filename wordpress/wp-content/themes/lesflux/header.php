<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage Edge
 * @since Edge 1.0
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<?php
$edge_settings = edge_get_theme_options(); ?>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- BOOTSTRAP CDN -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/lesflux/assets/favicon.ico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/wp-content/themes/lesflux/assets/favicon.ico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/lesflux/assets/favicon.ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/themes/lesflux/assets/favicon.ico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/lesflux/assets/favicon.ico/favicon-16x16.png">
<link rel="manifest" href="/wp-content/themes/lesflux/assets/favicon.ico/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/wp-content/themes/lesflux/assets/favicon.ico/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<!-- Masthead ============================================= -->
<header id="masthead" class="site-header">
		<?php if ( function_exists( 'the_custom_header_markup' ) ) {
			if ( is_header_video_active() && ( has_header_video() || is_customize_preview() ) ) {
				echo '<div class="custom-header">
					<div class="custom-header-media">';
				the_custom_header_markup();
				echo '</div>
				</div>';
			}else{ 
				if ( has_header_image() ) {?>
					<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php header_image(); ?>" class="header-image" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" /> </a>
				<?php }
			}
		} else { ?>
		<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php header_image(); ?>" class="header-image" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" /> </a>
		<?php } ?>
		<div class="top-header">
			<div class="container clearfix">
				<?php
				if( is_active_sidebar( 'edge_header_info' )) {
					dynamic_sidebar( 'edge_header_info' );
				}
				if($edge_settings['edge_top_social_icons'] == 0):
					echo '<div class="header-social-block">';
						do_action('social_links');
					echo '</div>'.'<!-- end .header-social-block -->';
				endif;
				 do_action('edge_site_branding'); ?>
			</div> <!-- end .container -->
		</div> <!-- end .top-header -->

		<!-- Main Header============================================= -->
				<div id="sticky_header">
					<div class="container clearfix">
					  	<!-- <h3 class="nav-site-title">
							<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"><?php bloginfo('name');?></a>
						</h3> -->
					<!-- end .nav-site-title -->

						<!-- Main Nav ============================================= -->
						<?php
							if (has_nav_menu('primary')) { ?>
						<?php $args = array(
							'theme_location' => 'primary',
							'container'      => '',
							'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
							); ?>
						<nav id="site-navigation" class="main-navigation clearfix">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span class="line-one"></span>
					  			<span class="line-two"></span>
					  			<span class="line-three"></span>
						  	</button>
					  		<!-- end .menu-toggle -->
							<?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
						</nav> <!-- end #site-navigation -->

						<?php } else {// extract the content from page menu only ?>
						<nav id="site-navigation" class="main-navigation clearfix">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span class="line-one"></span>
					  			<span class="line-two"></span>
					  			<span class="line-three"></span>
						  	</button>
					  	<!-- end .menu-toggle -->
							<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>')); ?>
						</nav> <!-- end #site-navigation -->
						<?php }
						$search_form = $edge_settings['edge_search_custom_header'];
						if (1 != $search_form) { ?>
							<div id="search-toggle" class="header-search"></div>
							<div id="search-box" class="clearfix">
								<?php get_search_form();?>
							</div>  <!-- end #search-box -->
						<?php } 

			echo '</div> <!-- end .container -->
			</div> <!-- end #sticky_header -->';
		$enable_slider = $edge_settings['edge_enable_slider'];
		edge_slider_value();
		if ($enable_slider=='frontpage'|| $enable_slider=='enitresite'){
			if(is_front_page() && ($enable_slider=='frontpage') ) {
				if($edge_settings['edge_slider_type'] == 'default_slider') {
						edge_page_sliders();
				}else{
					if(class_exists('Edge_Plus_Features')):
						edge_image_sliders();
					endif;
				}
			}
			if($enable_slider=='enitresite'){
				if($edge_settings['edge_slider_type'] == 'default_slider') {
						edge_page_sliders();
				}else{
					if(class_exists('Edge_Plus_Features')):
						edge_image_sliders();
					endif;
				}
			}
		} ?>
</header> <!-- end #masthead -->

<!-- Main Page Start ============================================= -->
<div id="content">
<div class="clearfix">
<?php 
if(is_front_page()){
	do_action('edge_display_frontpage_features');
}
if(!is_home()){?>
	<!--<div class="page-header">
		<h1 class="page-title"><?php /*echo edge_header_title(); */?></h1>
		<!-- .page-title -->
		<?php /*edge_breadcrumb(); */?>
		<!-- .breadcrumb -->
	</div>
	<!-- .page-header -->
<?php }