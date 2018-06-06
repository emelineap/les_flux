<?php
/**
* The template for displaying the homepage.
*
* @package Theme Freesia
* @subpackage Edge
* @since Edge 1.0
*/

include 'header.php';
?>

<div class="container-fluid">

	<div class="row">
		<div class="header-home">
			<img class="alignnone size-large wp-image-93" src="http://localhost:8888/perso/les_flux/wordpress/wp-content/uploads/2018/06/lesflux_fakehome-big-1024x575.jpg" alt="" width="790" height="444" />
		</div>
	</div>

	<div class="row">
		<div class="last-posts">

			<!-- Get last 3 posts -->
			<?php
			$args = array(
				'numberposts' => 3,
				'offset' => 0,
				'category' => 0,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' =>'',
				'post_type' => 'post',
				'post_status' => 'publish',
				'suppress_filters' => true
			);

			$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
			?>

			<!-- Get the posts thumbnails -->
			<?php
			function get_the_post_thumbnail( $post = null, $size = 'post-thumbnail', $attr = '' ) {
				$post = get_post( $post );
				if ( ! $post ) {
					return '';
				}
				$post_thumbnail_id = get_post_thumbnail_id( $post );
				?>

				<h2>Derniers articles</h2>
				<ul>
					<?php
					$recent_posts = wp_get_recent_posts();
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
					wp_reset_query();
					?>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="newsletter">
				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup"><form id="mc-embedded-subscribe-form" class="validate" action="https://tumblr.us14.list-manage.com/subscribe/post?u=5bd0d33a577ee592df934d133&amp;id=6ea9ff353e" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
					<div id="mc_embed_signup_scroll">
						<p class="signup-newsletter">Abonnez-vous à la Newsletter de ma chatte</p>
						<div class="mc-field-group"><label for="mce-EMAIL">
						</label>
						<div class="signup-block">
							<div class="newsletter-input">
								<input id="mce-EMAIL" class="required email" name="EMAIL" type="email" value="" placeholder="Votre email" />
								<div id="mce-responses" class="clear">
									<div id="mce-error-response" class="response" style="display: none;"></div>
									<div id="mce-success-response" class="response" style="display: none;"></div>
								</div>
							</div>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;" aria-hidden="true"><input tabindex="-1" name="b_5bd0d33a577ee592df934d133_6ea9ff353e" type="text" value="" /></div>
							<div class="clear"><input id="mc-embedded-subscribe" class="button" name="subscribe" type="submit" value="S'abonner" /></div>
						</div>
					</div>
				</div>
			</form></div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email'; /*
 * Translated default messages for the $ validation plugin.
 * Locale: FR
 */
 $.extend($.validator.messages, {
 	required: "Ce champ est requis.",
 	remote: "Veuillez remplir ce champ pour continuer.",
 	email: "Veuillez entrer une adresse email valide.",
 });}(jQuery));var $mcj = jQuery.noConflict(true);</script>
 <!--End mc_embed_signup-->
</div>

<div class="row">
	<div class="last-videos"></div>
</div>

<div class="row">
	<div class="last-ateliers"></div>
</div>

</div>

<?php

include 'footer.php'

?>