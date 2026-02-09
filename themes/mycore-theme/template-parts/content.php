<?php
/**
 * Default content template (archive/loop)
 *
 * @package MyCore_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
		<div class="entry-meta">
			<?php mycore_theme_posted_on(); ?>
			<?php mycore_theme_posted_by(); ?>
		</div>
	</header>
	<?php if (has_post_thumbnail()) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
		</div>
	<?php endif; ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
