<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Android 1.0
 */
?>
<?php if ( is_sidebar_active('static')||is_sidebar_active('fix') ) : ?>
<div  id="sidebar-right" class="wrap">
<div id="sidebar">
<?php if ( is_sidebar_active('static') ) : ?>
                <div id="staticsidebar">
                        <ul>
                                <?php dynamic_sidebar('static'); ?>
 
                        </ul>
                </div>
<?php endif; ?>        
 
 
<?php if ( is_sidebar_active('fix') ) : ?>
                <div id="fixsidebar">
                        <ul>
                                <?php dynamic_sidebar('fix'); ?>
                        </ul>
                </div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>

</div><!-- #main -->
<footer id="footer" class="wrap" role="contentinfo">
    <div class="lay_wrap">
<?php if ( is_sidebar_active('footer') ) : ?>
                <div id="footerbar">
                                <?php dynamic_sidebar('footer'); ?>
                </div>
<?php endif; ?>        
        <?php do_action('android_credits'); ?>
        <span itemprop="description"><?php bloginfo('description'); ?></span>.
        <a href="<?php echo esc_url(__('http://wordpress.org/', 'HD')); ?>"
           title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'HD'); ?>"
           target="_blank"><?php printf(__('%s', 'HD'), 'WordPress'); ?></a>
        &amp;&amp; <a href="http://ooxx.me/theme-android.orz" title="Android Developer Style Theme" target="_blank">Android</a>
	 &amp;&amp; <a href="http://im.librazy.org/wordpress-holodark/" title="HoloDark Theme" target="_blank">HoloDark</a>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript">
    var home_url="<?php echo esc_url(home_url('/')); ?>";
    var is_mobile="<?php if(is_mobile()){echo 'true';}?>";
</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/holodark.js"></script>
</body>
</html>