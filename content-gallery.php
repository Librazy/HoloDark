<?php
/*
Template Name:博文格式：相册
*/
/**
 * The template for displaying posts in the Gallery Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Android 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="entry-header">
	<div class="hgroup">
			<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php printf( __('%s 的链接','HD'), esc_attr(the_title_attribute( 'echo=0' )) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<h3 class="entry-format"><?php _e( 'Gallery', 'HD' ); ?></h3>
	</div>

		<div class="entry-meta">
			<?php android_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content" itemprop="articleBody">
			<?php if ( post_password_required() ) : ?>
				<?php the_content( __('继续阅读<span class="meta-nav">&rarr;</span>', 'HD' ) ); ?>
			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>

				<figure class="gallery-thumb">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</figure><!-- .gallery-thumb -->

				<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'HD' ),
						'href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( __('%s 的链接','HD'), 'HD' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						number_format_i18n( $total_images )
					); ?></em></p>
			<?php endif; ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'HD' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php $show_sep = false; ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'HD' ) );
			if ( $categories_list ):
		?>
		<span class="cat-links">
			<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'HD' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
			$show_sep = true; ?>
		</span>
		<?php endif; // End if categories ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'HD' ) );
			if ( $tags_list ):
			if ( $show_sep ) : ?>
		<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
		<span class="tag-links">
			<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'HD' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
			$show_sep = true; ?>
		</span>
		<?php endif; // End if $tags_list ?>

		<?php if ( comments_open() ) : ?>
		<?php if ( $show_sep ) : ?>
		<span class="sep"> | </span>
		<?php endif; // End if $show_sep ?>
		<meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number()?>" />
		<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( '评论', 'HD' ) . '</span>', __( '沙发已占', 'HD' ), __('<b>%</b> 条吐槽', 'HD' ) ); ?></span>
		<?php endif; // End if comments_open() ?>

	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->