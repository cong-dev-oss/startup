<?php
/**
 * Helper Functions - Các function tiêu chuẩn WordPress để lấy ảnh, dữ liệu
 *
 * @package MyCore_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

// ============================================================================
// LẤY ẢNH / IMAGES
// ============================================================================

/**
 * Lấy featured image (ảnh đại diện) của post hiện tại
 * 
 * @param string $size Kích thước ảnh: 'thumbnail', 'medium', 'large', 'full', hoặc custom size
 * @param array $attr Thuộc tính HTML cho thẻ img (alt, class, etc.)
 * @return string HTML của thẻ img hoặc false nếu không có ảnh
 * 
 * Sử dụng:
 * <?php the_post_thumbnail('large'); ?>
 * <?php the_post_thumbnail('medium', ['alt' => 'Mô tả ảnh']); ?>
 */
// WordPress function: the_post_thumbnail() - đã có sẵn

/**
 * Kiểm tra post có featured image không
 * 
 * @param int|null $post_id ID của post (null = post hiện tại)
 * @return bool
 * 
 * Sử dụng:
 * <?php if (has_post_thumbnail()) : ?>
 *     <?php the_post_thumbnail(); ?>
 * <?php endif; ?>
 */
// WordPress function: has_post_thumbnail() - đã có sẵn

/**
 * Lấy URL của featured image
 * 
 * @param int|null $post_id ID của post (null = post hiện tại)
 * @param string $size Kích thước ảnh
 * @return string|false URL của ảnh hoặc false
 * 
 * Sử dụng:
 * <?php $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
 * <img src="<?php echo esc_url($image_url); ?>" alt="">
 */
function mycore_get_featured_image_url($post_id = null, $size = 'full') {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_the_post_thumbnail_url($post_id, $size);
}

/**
 * Lấy attachment image (ảnh từ media library)
 * 
 * @param int $attachment_id ID của attachment
 * @param string $size Kích thước ảnh
 * @param array $attr Thuộc tính HTML
 * @return string HTML của thẻ img
 * 
 * Sử dụng:
 * <?php echo wp_get_attachment_image(123, 'large', false, ['alt' => 'Mô tả']); ?>
 */
// WordPress function: wp_get_attachment_image() - đã có sẵn

/**
 * Lấy URL của attachment image
 * 
 * @param int $attachment_id ID của attachment
 * @param string $size Kích thước ảnh
 * @return string|false URL của ảnh
 * 
 * Sử dụng:
 * <?php $url = wp_get_attachment_image_url(123, 'large'); ?>
 */
// WordPress function: wp_get_attachment_image_url() - đã có sẵn

/**
 * Lấy tất cả ảnh trong gallery của post
 * 
 * @param int|null $post_id ID của post
 * @return array Mảng các attachment ID
 * 
 * Sử dụng:
 * <?php $gallery = mycore_get_post_gallery_images(get_the_ID()); ?>
 * <?php foreach ($gallery as $img_id) : ?>
 *     <?php echo wp_get_attachment_image($img_id, 'medium'); ?>
 * <?php endforeach; ?>
 */
function mycore_get_post_gallery_images($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $gallery = get_post_gallery($post_id, false);
    if (isset($gallery['ids'])) {
        return explode(',', $gallery['ids']);
    }
    return [];
}

// ============================================================================
// LẤY DỮ LIỆU POST / PAGE
// ============================================================================

/**
 * Lấy title của post hiện tại
 * 
 * @return string Title
 * 
 * Sử dụng:
 * <?php the_title(); ?> - echo trực tiếp
 * <?php $title = get_the_title(); ?> - lấy giá trị
 */
// WordPress functions: the_title(), get_the_title() - đã có sẵn

/**
 * Lấy content của post hiện tại
 * 
 * @return string Content (đã format)
 * 
 * Sử dụng:
 * <?php the_content(); ?> - echo trực tiếp
 * <?php $content = get_the_content(); ?> - lấy giá trị (chưa format)
 */
// WordPress functions: the_content(), get_the_content() - đã có sẵn

/**
 * Lấy excerpt (mô tả ngắn) của post
 * 
 * @param int|null $post_id ID của post
 * @return string Excerpt
 * 
 * Sử dụng:
 * <?php the_excerpt(); ?> - echo trực tiếp
 * <?php $excerpt = get_the_excerpt(); ?> - lấy giá trị
 */
// WordPress functions: the_excerpt(), get_the_excerpt() - đã có sẵn

/**
 * Lấy permalink (URL) của post
 * 
 * @param int|null $post_id ID của post
 * @return string URL
 * 
 * Sử dụng:
 * <a href="<?php echo esc_url(get_permalink()); ?>">Đọc thêm</a>
 */
// WordPress function: get_permalink() - đã có sẵn

/**
 * Lấy ID của post hiện tại
 * 
 * @return int Post ID
 * 
 * Sử dụng:
 * <?php $post_id = get_the_ID(); ?>
 */
// WordPress function: get_the_ID() - đã có sẵn

/**
 * Lấy post object hiện tại
 * 
 * @return WP_Post|null Post object hoặc null
 * 
 * Sử dụng:
 * <?php $post = get_post(); ?>
 * <?php echo $post->post_title; ?>
 * <?php echo $post->post_content; ?>
 */
// WordPress function: get_post() - đã có sẵn

/**
 * Lấy custom field (post meta)
 * 
 * @param string $key Tên field
 * @param bool $single Lấy một giá trị hay mảng
 * @param int|null $post_id ID của post
 * @return mixed Giá trị của field
 * 
 * Sử dụng:
 * <?php $price = get_post_meta(get_the_ID(), '_product_price', true); ?>
 * <?php echo esc_html($price); ?>
 */
// WordPress function: get_post_meta() - đã có sẵn

/**
 * Lấy tất cả custom fields của post
 * 
 * @param int|null $post_id ID của post
 * @return array Mảng các custom fields
 * 
 * Sử dụng:
 * <?php $meta = mycore_get_all_post_meta(get_the_ID()); ?>
 * <?php foreach ($meta as $key => $value) : ?>
 *     <p><?php echo esc_html($key); ?>: <?php echo esc_html($value[0]); ?></p>
 * <?php endforeach; ?>
 */
function mycore_get_all_post_meta($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id);
}

// ============================================================================
// LẤY DỮ LIỆU AUTHOR / USER
// ============================================================================

/**
 * Lấy tên author của post hiện tại
 * 
 * @return string Tên author
 * 
 * Sử dụng:
 * <?php the_author(); ?> - echo trực tiếp
 * <?php $author = get_the_author(); ?> - lấy giá trị
 */
// WordPress functions: the_author(), get_the_author() - đã có sẵn

/**
 * Lấy URL của author archive
 * 
 * @param int|null $author_id ID của author
 * @return string URL
 * 
 * Sử dụng:
 * <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
 *     <?php the_author(); ?>
 * </a>
 */
// WordPress function: get_author_posts_url() - đã có sẵn

/**
 * Lấy thông tin author meta
 * 
 * @param string $field Tên field: 'display_name', 'user_email', 'user_url', 'description', etc.
 * @param int|null $user_id ID của user
 * @return string Giá trị của field
 * 
 * Sử dụng:
 * <?php $email = get_the_author_meta('user_email'); ?>
 * <?php $bio = get_the_author_meta('description'); ?>
 */
// WordPress function: get_the_author_meta() - đã có sẵn

// ============================================================================
// LẤY DỮ LIỆU TAXONOMY / CATEGORY / TAG
// ============================================================================

/**
 * Lấy categories của post
 * 
 * @param int|null $post_id ID của post
 * @return array Mảng các category objects
 * 
 * Sử dụng:
 * <?php $categories = get_the_category(); ?>
 * <?php foreach ($categories as $cat) : ?>
 *     <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
 *         <?php echo esc_html($cat->name); ?>
 *     </a>
 * <?php endforeach; ?>
 */
// WordPress function: get_the_category() - đã có sẵn

/**
 * Lấy tags của post
 * 
 * @param int|null $post_id ID của post
 * @return array Mảng các tag objects
 * 
 * Sử dụng:
 * <?php $tags = get_the_tags(); ?>
 * <?php if ($tags) : ?>
 *     <?php foreach ($tags as $tag) : ?>
 *         <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
 *             <?php echo esc_html($tag->name); ?>
 *         </a>
 *     <?php endforeach; ?>
 * <?php endif; ?>
 */
// WordPress function: get_the_tags() - đã có sẵn

/**
 * Lấy terms của custom taxonomy
 * 
 * @param string $taxonomy Tên taxonomy (ví dụ: 'product_cat', 'event_cat')
 * @param int|null $post_id ID của post
 * @return array|WP_Error Mảng các term objects
 * 
 * Sử dụng:
 * <?php $terms = get_the_terms(get_the_ID(), 'product_cat'); ?>
 * <?php if ($terms && !is_wp_error($terms)) : ?>
 *     <?php foreach ($terms as $term) : ?>
 *         <span><?php echo esc_html($term->name); ?></span>
 *     <?php endforeach; ?>
 * <?php endif; ?>
 */
// WordPress function: get_the_terms() - đã có sẵn

/**
 * Lấy URL của term
 * 
 * @param int $term_id ID của term
 * @param string $taxonomy Tên taxonomy
 * @return string|WP_Error URL của term
 * 
 * Sử dụng:
 * <?php $term_link = get_term_link($term_id, 'product_cat'); ?>
 */
// WordPress function: get_term_link() - đã có sẵn

// ============================================================================
// QUERY POSTS / LẤY DANH SÁCH POSTS
// ============================================================================

/**
 * Lấy posts theo query tùy chỉnh
 * 
 * @param array $args Tham số query
 * @return WP_Query Query object
 * 
 * Sử dụng:
 * <?php
 * $query = new WP_Query([
 *     'post_type' => 'product',
 *     'posts_per_page' => 10,
 *     'orderby' => 'date',
 *     'order' => 'DESC',
 * ]);
 * if ($query->have_posts()) :
 *     while ($query->have_posts()) : $query->the_post();
 *         the_title();
 *     endwhile;
 *     wp_reset_postdata();
 * endif;
 * ?>
 */
// WordPress class: WP_Query - đã có sẵn

/**
 * Lấy posts theo post type
 * 
 * @param string $post_type Tên post type
 * @param int $limit Số lượng posts
 * @return array Mảng các post objects
 * 
 * Sử dụng:
 * <?php $products = mycore_get_posts_by_type('product', 6); ?>
 * <?php foreach ($products as $product) : ?>
 *     <?php setup_postdata($product); ?>
 *     <h3><?php echo esc_html($product->post_title); ?></h3>
 * <?php endforeach; ?>
 * <?php wp_reset_postdata(); ?>
 */
function mycore_get_posts_by_type($post_type, $limit = 10) {
    $args = [
        'post_type'      => $post_type,
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
    $query = new WP_Query($args);
    return $query->posts;
}

/**
 * Lấy posts theo taxonomy term
 * 
 * @param string $post_type Tên post type
 * @param string $taxonomy Tên taxonomy
 * @param int $term_id ID của term
 * @param int $limit Số lượng posts
 * @return array Mảng các post objects
 * 
 * Sử dụng:
 * <?php $products = mycore_get_posts_by_term('product', 'product_cat', 5, 6); ?>
 */
function mycore_get_posts_by_term($post_type, $taxonomy, $term_id, $limit = 10) {
    $args = [
        'post_type'      => $post_type,
        'posts_per_page' => $limit,
        'post_status'    => 'publish',
        'tax_query'      => [
            [
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => $term_id,
            ],
        ],
    ];
    $query = new WP_Query($args);
    return $query->posts;
}

// ============================================================================
// LẤY DỮ LIỆU SITE / OPTIONS
// ============================================================================

/**
 * Lấy site name
 * 
 * @return string Tên site
 * 
 * Sử dụng:
 * <?php echo esc_html(get_bloginfo('name')); ?>
 */
// WordPress function: get_bloginfo('name') - đã có sẵn

/**
 * Lấy site description
 * 
 * @return string Mô tả site
 * 
 * Sử dụng:
 * <?php echo esc_html(get_bloginfo('description')); ?>
 */
// WordPress function: get_bloginfo('description') - đã có sẵn

/**
 * Lấy site URL
 * 
 * @return string URL của site
 * 
 * Sử dụng:
 * <a href="<?php echo esc_url(home_url()); ?>">Trang chủ</a>
 */
// WordPress function: home_url() - đã có sẵn

/**
 * Lấy option từ database
 * 
 * @param string $option_name Tên option
 * @param mixed $default Giá trị mặc định
 * @return mixed Giá trị của option
 * 
 * Sử dụng:
 * <?php $phone = get_option('contact_phone', '0123456789'); ?>
 */
// WordPress function: get_option() - đã có sẵn

// ============================================================================
// UTILITY FUNCTIONS
// ============================================================================

/**
 * Escape HTML output (bảo mật)
 * 
 * @param string $text Text cần escape
 * @return string Text đã escape
 * 
 * Sử dụng:
 * <?php echo esc_html($user_input); ?>
 * <?php echo esc_url($url); ?>
 * <?php echo esc_attr($attribute); ?>
 */
// WordPress functions: esc_html(), esc_url(), esc_attr() - đã có sẵn

/**
 * Format date theo định dạng WordPress
 * 
 * @param string $format Định dạng (mặc định: get_option('date_format'))
 * @param int|null $timestamp Timestamp (null = hiện tại)
 * @return string Date đã format
 * 
 * Sử dụng:
 * <?php echo date_i18n('d/m/Y', strtotime(get_the_date())); ?>
 */
// WordPress function: date_i18n() - đã có sẵn
