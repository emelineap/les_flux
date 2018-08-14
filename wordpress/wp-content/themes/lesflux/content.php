<?php
/**
 * The template for displaying content.
 *
 * @package Theme Freesia
 * @subpackage Edge
 * @since Edge 1.0
 */
?>

<?php

$edge_settings = edge_get_theme_options(); ?>
<article class="one-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $edge_blog_post_image = $edge_settings['edge_blog_post_image'];
    if (has_post_thumbnail() && $edge_blog_post_image == 'on') { ?>
        <div class="post-image-content">
            <figure class="post-featured-image">
                <a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute('echo=0'); ?>">
                    <?php the_post_thumbnail('large', array( 'class' => 'post-thumbnail' )); ?>
                </a>
            </figure><!-- end.post-featured-image  -->
        </div> <!-- end.post-image-content -->
    <?php } ?>
    <header class="entry-header">
        <h4 class="entry-title"><a href="<?php the_permalink(); ?>"
                                   title="<?php the_title_attribute(); ?>"> <?php the_title(); ?> </a></h4>
        <!-- end.entry-title -->
        <?php if ($entry_format_meta_blog == 'show-meta') { ?>
            <div class="entry-meta">
					<span class="posted-on"><a title="<?php echo esc_attr(get_the_time()); ?>"
                                               href="<?php the_permalink(); ?>">
						<?php the_time(get_option('date_format')); ?> </a></span>
            </div><!-- end .entry-meta -->
        <?php } ?>
    </header><!-- end .entry-header -->
    <div class="entry-content">
        <?php $content_display = $edge_settings['edge_blog_content_layout'];
        if ($content_display == 'fullcontent_display'):
            the_content();
        else:
            the_excerpt();
        endif; ?>
    </div> <!-- end .entry-content -->
    <?php
    $excerpt = get_the_excerpt();
    $content = get_the_content();
    $disable_entry_format = $edge_settings['edge_entry_format_blog'];
    if ($disable_entry_format == 'show' || $disable_entry_format == 'show-button' || $disable_entry_format == 'hide-button') { ?>
        <footer class="entry-footer">
            <?php
            $edge_tag_text = $edge_settings['edge_tag_text'];
            if (strlen($excerpt) < strlen($content) && $disable_entry_format != 'hide-button') { ?>
                <a class="more-link" title="<?php echo the_title_attribute('echo=0'); ?>"
                   href="<?php the_permalink(); ?>">
                    Lire la suite
                </a>
            <?php }
            $format = get_post_format();
            if ($disable_entry_format != 'show-button') { ?>
                <div class="entry-meta">
                    <?php
                    if (current_theme_supports('post-formats', $format)) {
                        printf('<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
                            sprintf(''),
                            esc_url(get_post_format_link($format)),
                            get_post_format_string($format)
                        );
                    } ?>
                </div> <!-- end .entry-meta -->
            <?php } ?>
        </footer> <!-- end .entry-footer -->
    <?php } ?>
</article><!-- end .post -->