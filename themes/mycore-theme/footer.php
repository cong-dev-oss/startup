<?php
/**
 * Footer template
 *
 * @package MyCore_Theme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2')) : ?>
			<div class="footer-widgets site-content">
				<?php if (is_active_sidebar('footer-1')) : ?>
					<div class="footer-widget-area"><?php dynamic_sidebar('footer-1'); ?></div>
				<?php endif; ?>
				<?php if (is_active_sidebar('footer-2')) : ?>
					<div class="footer-widget-area"><?php dynamic_sidebar('footer-2'); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if (has_nav_menu('footer')) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'mycore-theme'); ?>">
				<?php
				wp_nav_menu([
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container'      => false,
				]);
				?>
			</nav>
		<?php endif; ?>

		<div class="site-info">
			<?php
			printf(
				/* translators: 1: theme name, 2: WordPress */
				esc_html__('%1$s &middot; %2$s', 'mycore-theme'),
				'<a href="' . esc_url(__('https://github.com/your-org/CorePress', 'mycore-theme')) . '">MyCore Theme</a>',
				'<a href="' . esc_url(__('https://wordpress.org/', 'mycore-theme')) . '">WordPress</a>'
			);
			?>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
