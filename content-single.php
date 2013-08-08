﻿<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Android 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php android_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
<!--<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">
            <rdf:Description
            rdf:about="<?php echo wp_get_shortlink(); ?>"
            dc:identifer="<?php echo get_permalink(); ?>"
            dc:title="<?php
        /*
       * Print the <title> tag based on what is being viewed.
       */
        global $page, $paged;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'android'), max($paged, $page));

        ?>"
            trackback:ping="<?php bloginfo('pingback_url'); ?>" />
        </rdf:RDF>-->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'android' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'android' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'android' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'Posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>.', 'android' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'Posted in %1$s by <a href="%6$s">%5$s</a>.', 'android' );
			} else {
				$utility_text = __( 'Posted by <a href="%6$s">%5$s</a>.', 'android' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>

		<?php if( ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) ||DFenableautmeta): // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
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
				<h2><span>A</span><?php printf( __( 'bout %s', 'android' ), get_the_author() ); ?></h2>
				<div class="eweima">
					<!--<img src="http://catqr.yiduqiang.com/cat/ys/average.php?bj_16_color=FFFFFF&bbj=&logoIMGtoBJ=img/2012/12/08/f93de05c9647b9a592e94756cf7566ed.png&ewm_16_color=000000&yj=Y&cw=H&width=10&JZurl=&JZx=&JZy=&txt=<?php echo wp_get_shortlink(); ?>" width="160" height="160" alt="大猫二维码" rel="nofollow noindex" />-->
                                        <img src="<?php echo holodark_generate_qr(wp_get_shortlink()); ?>" width="160" height="160" alt="二维码" rel="nofollow noindex" />
				</div><!-- .erweima -->
				<div id="author-description-content"><?php the_author_meta( 'description' ); ?></div>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" class="url">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'android' ), get_the_author() ); ?>
					</a>
					<br/>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #author-info -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->