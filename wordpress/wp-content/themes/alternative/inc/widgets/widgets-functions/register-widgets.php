<?php
/**
 * Registering Widgets
 *
 * @package Theme Freesia
 * @subpackage Alternative
 * @since Alternative 1.0
 */
/**************** ALTERNATIVE REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'alternative_widgets_init');
function alternative_widgets_init() {

	register_widget( 'Alternative_popular_Widgets' );

}