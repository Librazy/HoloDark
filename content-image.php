<?php
/*
Template Name:博文格式：图片
*/
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Android 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'indexed' ); ?>  itemprop="Photograph" itemscope itemtype="http://schema.org/Photograph">
		<header class="entry-header">
			<span>
				<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php printf( __('%s 的链接','HD'), esc_attr(the_title_attribute( 'echo=0' )) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Image', 'HD' ); ?></h3>
			</span>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __('评论', 'HD' ) . '</span>', __( '沙发已占', 'HD' ), __( '<b>%</b> 条吐槽', 'HD' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content" itemprop="articleBody">
			<?php the_content( __('继续阅读<span class="meta-nav">&rarr;</span>', 'HD' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'HD' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<div class="entry-meta">
				<meta itemprop="datePublished" content="<?php the_time('Y-m-d');?>">
				<?php
					printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard" itemprop="author"><a class="url fn n" href="%4$s" title="%5$s" rel="author">%6$s</a></span></span>', 'HD' ),
						esc_url( get_permalink() ),
						get_the_date( 'c' ),
						get_the_date(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'HD' ), get_the_author() ) ),
						get_the_author()
					);
				?>
			</div><!-- .entry-meta -->
			<div class="entry-meta">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'HD' ) );
					if ( $categories_list ):
				?>
				<span class="cat-links">
					<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'HD' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'HD' ) );
					if ( $tags_list ): ?>
				<span class="tag-links">
					<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'HD' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>

				<?php if ( comments_open() ) : ?>
				<meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number()?>" />
				<?php comments_popup_link( '<span class="leave-reply">' . __( '评论', 'HD' ) . '</span>', __( '沙发已占', 'HD' ), __('<b>%</b> 条吐槽', 'HD' ) ); ?>
				<?php endif; // End if comments_open() ?>
			</div><!-- .entry-meta -->

		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->