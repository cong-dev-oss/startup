<?php
/**
 * Single post content
 *
 * @package MyCore_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<div class="entry-meta">
			<?php mycore_theme_posted_on(); ?>
			<?php mycore_theme_posted_by(); ?>
			<?php mycore_theme_entry_categories(); ?>
		</div>
	</header>
	<?php if (has_post_thumbnail()) : ?>
		<div class="post-thumbnail"><?php the_post_thumbnail('large'); ?></div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages(['before' => '<div class="page-links">' . __('Pages:', 'mycore-theme'), 'after' => '</div>']); ?>
	</div>
	<footer class="entry-footer">
		<?php mycore_theme_entry_tags(); ?>
	</footer>
</article>
