<?php
/*
Template Name:
*/
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Android 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>  itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
			<div class="hgroup">
					<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php printf( __('%s 的链接','HD'),esc_attr(the_title_attribute( 'echo=0' )) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'HD' ); ?></h3>
			</div>
			<?php else : ?>
			<h1 class="entry-title"  itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php printf( __('%s 的链接','HD'), esc_attr(the_title_attribute( 'echo=0' )) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary"  itemprop="description">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		
		<div class="entry-content"  itemprop="articleBody"><?php the_post_thumbnail(); ?>
			<?php the_content( __('继续阅读<span class="meta-nav">&rarr;</span>', 'HD' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'HD' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php android_posted_on(); ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __('评论', 'HD' ) . '</span>', __( '沙发已占', 'HD' ), __( '<b>%</b> 条吐槽', 'HD' ) ); ?></span>
			<?php endif; // End if comments_open() ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->