<?php
/**
 * Page content template
 *
 * @package Startup_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header mb-4">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-4"><?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?></div>
    <?php endif; ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages([
            'before' => '<div class="page-links mt-4">' . esc_html__('Pages:', 'startup-theme'),
            'after'  => '</div>',
        ]);
        ?>
    </div>
</article>
