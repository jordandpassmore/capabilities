<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Capablity
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer axt" role="contentinfo">
                <div class="footer-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ) ; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' )); ?>" rel="home">
                        <?php echo wp_get_attachment_image( get_theme_mod('title-box'), 'site-header-logo-large'); ?>
                    </a>
                </div>
		<?php get_sidebar('footer'); ?>
                <div class="site-info">
			<?php printf( esc_html__('&copy; 2016 Capabilities, Inc.'), 'capability' );?>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Site designed by %2$s' ), 'capability', '<a href="http://jordanpassmore.com" rel="designer">Jordan Passmore</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
