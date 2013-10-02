<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Android 1.0
 */

get_header(); ?>
<?php get_sidebar(); ?>

		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<header class="page-header">
					<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'HD' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php android_content_nav( 'nav-above' ); ?>
				
				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
			<div id="author-info" class="vcard">
			<div class="hiddenvc">
				<span class="fn"><?php echo get_the_author_meta( 'display_name' );?></span>
				<span class="email"><?php echo get_the_author_meta( 'user_email' );?></span>
				<span class="url"><?php echo get_the_author_meta( 'user_url' );?></span>
                        </div>
			<div id="author-description">
				<div id="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'android_author_bio_avatar_size', 68 ) ); ?>
				</div><!-- #author-avatar -->
				<h2><span>A</span><?php printf(  'bout %s', get_the_author() ); ?></h2>
				<div class="auteweima">
				<img src="<?php echo holodark_generate_qr(wp_get_shortlink()); ?> " width="160" height="160" alt="二维码" rel="nofollow noindex" />
				</div><!-- .erweima -->
				<div id="autauthor-description-content"><?php the_author_meta( 'description' ); ?></div>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"  class="url">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'HD' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #author-info -->
		<br /><br />
				<?php endif; ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php android_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e('Nothing Found', 'HD' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e(  '对不起，没有符合条件的文章，尝试搜索获取更多信息', 'HD' ); ?></p>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>