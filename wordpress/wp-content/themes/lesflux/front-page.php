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
    <div class="header-home-desktop">
        <div class="header-home-container">
            <img class="alignnone size-large wp-image-93 banner-desktop"
                 src="/wp-content/themes/lesflux/assets/img/lesflux_banner_line.png" alt="les flux banner" width="100%"/>
            <!--<div class="header-home-text">
                <p class="banner-home">Une initiative <span class="banner-underlined">féministe</span></p>
                <p class="banner-home">pour la réappropriation des savoirs médicaux</p>
                <p class="banner-home">sur les <span class="banner-underlined">cycles menstruels</span>, les <span class="banner-underlined">règles</span> et la <span class="banner-underlined">vulve</span></p>
            </div>-->
        </div>
    </div>

    <div class="header-home-mobile">
        <div class="header-home-container">
            <img class="alignnone size-large wp-image-93 banner-mobile"
                 src="/wp-content/themes/lesflux/assets/img/lesflux_banner_line_mobile.png" alt="les flux banner" width="100%"/>
            <!--<div class="header-home-text">
                <p class="banner-home">Une initiative <span class="banner-underlined">féministe</span></p>
                <p class="banner-home">pour la réappropriation des savoirs médicaux</p>
                <p class="banner-home">sur les <span class="banner-underlined">cycles menstruels</span>, les <span class="banner-underlined">règles</span> et la <span class="banner-underlined">vulve</span></p>
            </div>-->
        </div>
    </div>

    <h2>DERNIERS ARTICLES</h2>

    <div class="wp-all-posts site-width">
        <!-- Get last 3 posts -->
        <?php
        query_posts(array(
            'posts_per_page' => 3,
            'offset' => 0,
            'category_name' => 'Articles',
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
        ));

        while (have_posts()) {
            the_post();
            get_template_part('content', get_post_format());
        }
        ?>
    </div>

    <div class="newsletter">
        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup">
            <form id="mc-embedded-subscribe-form" class="validate"
                  action="https://tumblr.us14.list-manage.com/subscribe/post?u=5bd0d33a577ee592df934d133&amp;id=6ea9ff353e"
                  method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
                <div id="mc_embed_signup_scroll">
                    <p class="signup-newsletter">Abonnez-vous à la Newsletter de ma chatte</p>
                    <div class="mc-field-group"><label for="mce-EMAIL">
                        </label>
                        <div class="signup-block">
                            <div class="newsletter-input">
                                <input id="mce-EMAIL" class="required email" name="EMAIL" type="email" value=""
                                       placeholder="Mon email"/>
                                <div id="mce-responses" class="clear">
                                    <div id="mce-error-response" class="response" style="display: none;"></div>
                                    <div id="mce-success-response" class="response" style="display: none;"></div>
                                </div>
                            </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input tabindex="-1"
                                       name="b_5bd0d33a577ee592df934d133_6ea9ff353e"
                                       type="text"
                                       value=""/>
                            </div>
                            <div class="clear">
                                <input id="mc-embedded-subscribe" class="button" name="subscribe"
                                       type="submit" value="M'abonner"/></div>
                        </div>
                    </div>
                    <p class="newsletter-footer">
                        <a href="https://us14.campaign-archive.com/home/?u=5bd0d33a577ee592df934d133&id=6ea9ff353e" target="_blank">Consultez
                            les newsletters déjà parues</a>
                    </p>
                </div>
            </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
        <script type='text/javascript'>(function ($) {
                window.fnames = new Array();
                window.ftypes = new Array();
                fnames[0] = 'EMAIL';
                ftypes[0] = 'email';
                /*
                       * Translated default messages for the $ validation plugin.
                        * Locale: FR
                        */
                $.extend($.validator.messages, {
                    required: "Ce champ est requis.",
                    remote: "Veuillez remplir ce champ pour continuer.",
                    email: "Veuillez entrer une adresse email valide.",
                });
            }(jQuery));
            var $mcj = jQuery.noConflict(true);</script>
        <!--End mc_embed_signup-->
    </div>

    <div class="row site-width">
        <div class="last-videos col-xs-12 col-lg-6">
            <ul>
                <li><img src="/wp-content/themes/lesflux/assets/img/lesflux_videos.png"
                         alt="dernières vidéos" class="thumbnail-last-videos"></li>
                <li><a href="http://lesflux.fr/videos/"><h4>Voir les dernières vidéos</h4></a></li>
            </ul>
        </div>

        <div class="last-ateliers col-xs-12 col-lg-6">
            <ul>
                <li><img src="/wp-content/themes/lesflux/assets/img/lightpainting_chatte_web.jpg"
                         alt="prochains ateliers" class="thumbnail-last-ateliers"></li>
                <li><a href="http://lesflux.fr/les-ateliers/"><h4>Voir les dates des prochains ateliers</h4></a></li>
            </ul>
        </div>
    </div>
<?php

include 'footer.php'

?>