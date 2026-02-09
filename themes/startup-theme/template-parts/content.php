<?php
/**
 * Default content template (archive/loop)
 *
 * @package Startup_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <header class="entry-header mb-3">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        <div class="entry-meta text-muted small">
            <span><?php echo get_the_date(); ?></span>
            <span class="mx-2">|</span>
            <span><?php esc_html_e('By', 'startup-theme'); ?> <?php the_author(); ?></span>
        </div>
    </header>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-3">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large', ['class' => 'img-fluid rounded']); ?></a>
        </div>
    <?php endif; ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3"><?php esc_html_e('Read More', 'startup-theme'); ?></a>
</article>
