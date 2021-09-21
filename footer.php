<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell large-3 medium-6 large-order-1 medium-order-1 small-order-1">
				<div class="footer__logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ):
                            echo wp_get_attachment_image( $footer_logo['id'], 'medium' );
                        else:
                            show_custom_logo();
                        endif; ?>
                    </a>
				</div>
			</div>
			<div class="cell large-2 medium-4 small-12 large-order-2 medium-order-2 small-order-3 footer__widget widget_zone_left">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_widget_zone_left') )  ?>
			</div>
            <div class="cell large-2 medium-4 small-12 large-order-2 medium-order-2 small-order-3 footer__widget widget_zone_center">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_widget_zone_center') )  ?>
            </div>
            <div class="cell large-2 medium-4 small-12 large-order-2 medium-order-2 small-order-3 footer__widget widget_zone_right">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_widget_zone_right') )  ?>
            </div>
			<div class="cell large-3 medium-6 large-order-3 medium-order-1 small-order-2 footer__sp">
				<?php get_template_part('parts/socials'); // Social profiles ?>
			</div>
		</div>
	</div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
