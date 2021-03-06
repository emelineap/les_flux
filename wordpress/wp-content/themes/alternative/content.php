<?php
/**
 * The template for displaying content.
 *
 * @package Theme Freesia
 * @subpackage Edge
 * @since Edge 1.0
 */
$edge_settings = edge_get_theme_options();
$disable_entry_format = $edge_settings['edge_entry_format_blog'];
$tag_list = get_the_tag_list( '', __( ', ', 'alternative' ) );
$format = get_post_format(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<?php $edge_blog_post_image = $edge_settings['edge_blog_post_image'];
	if( has_post_thumbnail() && $edge_blog_post_image == 'on') { ?>
		<div class="post-image-content">
			<figure class="post-featured-image">
				<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
				</a>
			</figure><!-- end.post-featured-image  -->
		</div> <!-- end.post-image-content -->
	<?php } ?>
	<div class="post-text-content">
		<header class="entry-header">
		<?php $entry_format_meta_blog = $edge_settings['edge_entry_meta_blog'];
		if($entry_format_meta_blog == 'show-meta'){ ?>
			<div class="entry-meta">
				<span class="cat-links">
					<?php the_category(', '); ?>
				</span> <!-- end .cat-links -->
				<?php
				
				if(!empty($tag_list)){ ?>
				<span class="tag-links">
				<?php   echo get_the_tag_list( '', __( ', ', 'alternative' ) ); ?>
				</span> <!-- end .tag-links -->
				<?php } ?>
				<span class="posted-on"><a title="<?php echo esc_attr ( get_the_time(get_option( 'date_format' )) ); ?>" href="<?php the_permalink(); ?>">
				<?php echo esc_attr ( get_the_time(get_option( 'date_format' )) ); ?> </a></span>
			</div><!-- end .entry-meta -->
		<?php } ?>
			<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->
			<div class="entry-meta">
			<?php	if($disable_entry_format !='show-button'){ ?>
				<div class="entry-meta">
					<?php
					if ( current_theme_supports( 'post-formats', $format ) ) {
						printf( '<span class="entry-format"><a href="%1$s">%2$s</a></span>',
							esc_url( get_post_format_link( $format ) ),
							get_post_format_string( $format )
						);
					} ?>
					<span class="author vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>">
					<?php the_author(); ?> </a></span> 
					
					<?php if ( comments_open() ) { ?>
					<span class="comments">
					<?php comments_popup_link( __( 'No Comments', 'alternative' ), __( '1 Comment', 'alternative' ), __( '% Comments', 'alternative' ), '', __( 'Comments Off', 'alternative' ) ); ?> </span>
					<?php } ?>
				</div> <!-- end .entry-meta -->
				<?php } ?>
		</header><!-- end .entry-header -->
		<div class="entry-content">
			<?php $content_display = $edge_settings['edge_blog_content_layout'];
			if($content_display == 'fullcontent_display'):
				the_content();
			else:
				the_excerpt();
			endif; ?>
		</div> <!-- end .entry-content -->
		<?php 
		$excerpt = get_the_excerpt();
		$content = get_the_content();
		
		if($disable_entry_format =='show' || $disable_entry_format =='show-button' || $disable_entry_format =='hide-button'){ ?>
			<footer class="entry-footer">
				<?php
				$edge_tag_text = $edge_settings['edge_tag_text'];
				if(strlen($excerpt) < strlen($content) && $disable_entry_format !='hide-button'){ ?>
				<a class="more-link" title="<?php the_title_attribute();?>" href="<?php the_permalink();?>">
				<?php
					if($edge_tag_text == 'Read More' || $edge_tag_text == ''):
						esc_html_e('Read More', 'alternative');
					else:
						echo esc_attr($edge_tag_text);
					endif;?>
				</a>
				<?php } ?>
			</footer> <!-- end .entry-footer -->
		<?php } ?>
	</div>
</article><!-- end .post -->