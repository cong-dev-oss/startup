<?php
/**
 * Custom template tags for MyCore Theme
 *
 * @package MyCore_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Posted on date
 */
function mycore_theme_posted_on() {
    echo '<span class="posted-on">';
    echo esc_html(get_the_date());
    echo '</span>';
}

/**
 * Posted by author
 */
function mycore_theme_posted_by() {
    echo ' <span class="byline"> ' . esc_html__('by', 'mycore-theme') . ' ';
    echo '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>';
    echo '</span>';
}

/**
 * Entry categories
 */
function mycore_theme_entry_categories() {
    if ('post' !== get_post_type()) {
        return;
    }
    $categories_list = get_the_category_list(', ');
    if ($categories_list) {
        echo ' <span class="cat-links">' . $categories_list . '</span>';
    }
}

/**
 * Entry tags
 */
function mycore_theme_entry_tags() {
    if ('post' !== get_post_type()) {
        return;
    }
    $tags_list = get_the_tag_list('', ', ');
    if ($tags_list) {
        echo '<span class="tags-links">' . $tags_list . '</span>';
    }
}
