<?php
/**
 * Single post template
 *
 * @package Startup_Theme
 */

get_header();
?>

<div class="container-fluid py-5">
    <div class="container">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'single');
        }
        ?>
    </div>
</div>

<?php
get_footer();
?>
