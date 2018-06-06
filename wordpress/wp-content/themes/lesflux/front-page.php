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

			<h2>Derniers articles</h2>

			<!-- Get last 3 posts -->
			<?php
			query_posts( array(
				'numberposts' 	=> 3,
				'offset' => 0,
				'category' => 0,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'post_status' => 'publish',
				'suppress_filters' => true,
				'post_type' => 'post',
				'meta_key' => '_thumbnail_id',
				'meta_value_num' => 0,
				'meta_compare' => '!=' 
			) );

			while (have_posts()) : the_post(); ?>
			<ul>
				<li><img class="post-thumbnail" src="<?php the_post_thumbnail(); ?></li>
				<li><a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a></li>
				<li><?php the_excerpt(__('(more…)')); ?></li>
			</ul>
			<?php 
		endwhile; 
		?>

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