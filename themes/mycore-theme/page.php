<?php
/**
 * Default page template
 *
 * @package MyCore_Theme
 */

get_header();
?>

<main id="main" class="site-main">
	<div class="content-sidebar-wrap site-content">
		<div class="site-main-inner">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', 'page'); ?>
				<?php if (comments_open() || get_comments_number()) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>

<?php
get_footer();
