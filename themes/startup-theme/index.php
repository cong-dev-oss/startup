<?php
/**
 * Main template file
 *
 * @package Startup_Theme
 */

get_header();
?>

<div class="container-fluid py-5">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', get_post_type());
            }
            the_posts_pagination();
        } else {
            get_template_part('template-parts/content', 'none');
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>
