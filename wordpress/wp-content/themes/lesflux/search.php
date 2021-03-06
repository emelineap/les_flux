<?php
/**
 * The template for displaying search results.
 *
 * @package Theme Freesia
 * @subpackage Edge
 * @since Edge 1.0
 */
get_header();
$edge_settings = edge_get_theme_options();
global $edge_content_layout;
?>

    <h3 class="posts-page-title">RÉSULTATS DE RECHERCHE</h3>

<?php
if( $post ) {
    $layout = get_post_meta( $post->ID, 'edge_sidebarlayout', true );
}
if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
    $layout = 'default';
}
if( 'default' == $layout ) { //Settings from customizer
if(($edge_settings['edge_sidebar_layout_options'] != 'nosidebar') && ($edge_settings['edge_sidebar_layout_options'] != 'fullwidth')){ ?>
<div id="primary">
    <?php }
    }?>
    <div class="container-all-posts">
        <main id="main" class="site-width site-main clearfix">
            <?php
            if (have_posts()) {
                ?>
                <div class="wp-all-posts">
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part('content', get_post_format());
                    }
                    ?>
                </div>
                <?php
            } else { ?>
                <h2 class="entry-title">
                    <?php get_search_form(); ?>
                    <p>&nbsp; </p>
                    <?php esc_html_e( 'No Posts Found.', 'edge' ); ?>
                </h2>
            <?php } ?>
        </main> <!-- #main -->
        <?php get_template_part( 'pagination', 'none' );
        if( 'default' == $layout ) { //Settings from customizer
        if(($edge_settings['edge_sidebar_layout_options'] != 'nosidebar') && ($edge_settings['edge_sidebar_layout_options'] != 'fullwidth')): ?>
    </div> <!-- #primary -->
</div>
<?php endif;
}
// get_sidebar();
get_footer();