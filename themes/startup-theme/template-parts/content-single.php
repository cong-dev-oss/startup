<?php
/**
 * Single post content
 *
 * @package Startup_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header mb-4">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <div class="entry-meta text-muted small mb-3">
            <span><?php echo get_the_date(); ?></span>
            <span class="mx-2">|</span>
            <span><?php esc_html_e('By', 'startup-theme'); ?> <?php the_author(); ?></span>
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<span class="mx-2">|</span>';
                echo '<span>' . esc_html__('Category:', 'startup-theme') . ' ';
                the_category(', ');
                echo '</span>';
            }
            ?>
        </div>
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
    <footer class="entry-footer mt-4 pt-4 border-top">
        <?php
        $tags = get_the_tags();
        if ($tags) {
            echo '<div class="tags mb-3">';
            echo '<strong>' . esc_html__('Tags:', 'startup-theme') . '</strong> ';
            the_tags('', ', ', '');
            echo '</div>';
        }
        ?>
    </footer>
</article>

<?php
// Post navigation
the_post_navigation([
    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'startup-theme') . '</span> <span class="nav-title">%title</span>',
    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'startup-theme') . '</span> <span class="nav-title">%title</span>',
]);
?>
