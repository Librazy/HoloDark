<?php
/*
Template Name:博文格式：状态
*/
/**
 * The template for displaying posts in the Status Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
		<header class="entry-header">
			<div class="hgroup">
				<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php printf( __('%s 的链接','HD'),esc_attr(the_title_attribute( 'echo=0' )) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Status', 'HD' ); ?></h3>
			</div>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number()?>" />
				<?php comments_popup_link( '<span class="leave-reply">' . __('评论', 'HD' ) . '</span>', __( '沙发已占', 'HD' ), __( '<b>%</b> 条吐槽', 'HD' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content"  itemprop="articleBody">
			<div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'android_status_avatar', '65' ) ); ?></div>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'HD' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'HD' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php android_posted_on(); ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __('评论', 'HD' ) . '</span>', __( '沙发已占', 'HD' ), __( '<b>%</b> 条吐槽', 'HD' ) ); ?></span>
			<?php endif; ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->