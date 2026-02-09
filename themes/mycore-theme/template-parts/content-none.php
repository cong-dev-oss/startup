<?php
/**
 * No content template (404, no results)
 *
 * @package MyCore_Theme
 */
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e('Nothing Found', 'mycore-theme'); ?></h1>
	</header>
	<div class="page-content">
		<?php if (is_home() && current_user_can('publish_posts')) : ?>
			<p><?php printf(wp_kses(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mycore-theme'), ['a' => ['href' => []]]), esc_url(admin_url('post-new.php'))); ?></p>
		<?php elseif (is_search()) : ?>
			<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'mycore-theme'); ?></p>
		<?php else : ?>
			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'mycore-theme'); ?></p>
		<?php endif; ?>
	</div>
</section>
