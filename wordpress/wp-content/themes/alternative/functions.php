<?php
/**
 * Display all alternative functions and definitions
 *
 * @package Theme Freesia
 * @subpackage Alternative
 * @since Alternative 1.0
 */

add_action( 'wp_enqueue_scripts', 'alternative_enqueue_styles' );

function alternative_enqueue_styles() {

	wp_enqueue_style( 'alternative-parent-style', trailingslashit(get_template_directory_uri() ) . '/style.css' );

}

add_image_size( 'alternative-popular-post', 75, 75, true );
require_once( trailingslashit( get_stylesheet_directory() ) . '/inc/widgets/widgets-functions/register-widgets.php' );
require_once( trailingslashit( get_stylesheet_directory() ) . '/inc/widgets/widgets-functions/popular-posts.php' );

function alternative_customize_register( $wp_customize ) {
	if(!class_exists('Edge_Plus_Features')){
		class Alternative_Customize_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
				<a title="<?php esc_attr_e( 'Review Alternative', 'alternative' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/alternative/' ); ?>" target="_blank" id="about_alternative">
				<?php esc_html_e( 'Review Alternative', 'alternative' ); ?>
				</a><br/>
				<a href="<?php echo esc_url( 'https://themefreesia.com/theme-instruction/alternative/' ); ?>" title="<?php esc_attr_e( 'Theme Instructions', 'alternative' ); ?>" target="_blank" id="about_alternative">
				<?php esc_html_e( 'Theme Instructions', 'alternative' ); ?>
				</a><br/>
				<a href="<?php echo esc_url( 'https://tickets.themefreesia.com' ); ?>" title="<?php esc_attr_e( 'Support Ticket', 'alternative' ); ?>" target="_blank" id="about_alternative">
				<?php esc_html_e( 'Tickets', 'alternative' ); ?>
				</a><br/>
			<?php
			}
		}

		$wp_customize->add_section('alternative_upgrade_links', array(
			'title'					=> __('About Alternative', 'alternative'),
			'priority'				=> 2,
		));
		$wp_customize->add_setting( 'alternative_upgrade_links', array(
			'default'				=> false,
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Alternative_Customize_upgrade(
			$wp_customize,
			'alternative_upgrade_links',
				array(
					'section'				=> 'alternative_upgrade_links',
					'settings'				=> 'alternative_upgrade_links',
				)
			)
		);
	}
}
	add_action( 'customize_register', 'alternative_customize_register' );

	/************ Renaming Panel and Section Customizer name  to Alternative *******************/
	add_action( 'customize_register', 'alternative_customize_register_wordpress_default' );
	function alternative_customize_register_wordpress_default( $wp_customize ) {
		$wp_customize->add_panel( 'edge_wordpress_default_panel', array(
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Alternative WordPress Settings', 'alternative' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'alternative_customize_register_options', 20 );
	function alternative_customize_register_options( $wp_customize ) {
		$wp_customize->add_panel( 'edge_options_panel', array(
			'priority' => 6,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Alternative Theme Options', 'alternative' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'alternative_customize_register_featuredcontent' );
	function alternative_customize_register_featuredcontent( $wp_customize ) {
		$wp_customize->add_panel( 'edge_featuredcontent_panel', array(
			'priority' => 7,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Alternative Slider Options', 'alternative' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'alternative_customize_register_widgets' );
	function alternative_customize_register_widgets( $wp_customize ) {
		$wp_customize->add_panel( 'widgets', array(
			'priority' => 8,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Alternative Widgets', 'alternative' ),
			'description' => '',
		) );
	}
	add_action( 'customize_register', 'alternative_customize_register_colors' );
	function alternative_customize_register_colors( $wp_customize ) {
		$wp_customize->add_panel( 'colors', array(
			'priority' => 9,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Alternative Colors', 'alternative' ),
			'description' => '',
		) );
	}

if(!class_exists('Edge_Plus_Features')){
	// Add Upgrade to Plus Button.
	require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/upgrade-plus/class-customize.php' );
}
