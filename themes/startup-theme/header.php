<?php
/**
 * Header template
 *
 * @package Startup_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><?php echo esc_html(get_theme_mod('startup_address', '123 Street, New York, USA')); ?></small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><?php echo esc_html(get_theme_mod('startup_phone', '+012 345 6789')); ?></small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i><?php echo esc_html(get_theme_mod('startup_email', 'info@example.com')); ?></small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <?php
                $social_links = [
                    'twitter' => get_theme_mod('startup_social_twitter', ''),
                    'facebook' => get_theme_mod('startup_social_facebook', ''),
                    'linkedin' => get_theme_mod('startup_social_linkedin', ''),
                    'instagram' => get_theme_mod('startup_social_instagram', ''),
                    'youtube' => get_theme_mod('startup_social_youtube', ''),
                ];
                $social_icons = [
                    'twitter' => 'fab fa-twitter',
                    'facebook' => 'fab fa-facebook-f',
                    'linkedin' => 'fab fa-linkedin-in',
                    'instagram' => 'fab fa-instagram',
                    'youtube' => 'fab fa-youtube',
                ];
                foreach ($social_links as $key => $url) {
                    if (!empty($url)) {
                        echo '<a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="' . esc_url($url) . '" target="_blank"><i class="' . esc_attr($social_icons[$key]) . ' fw-normal"></i></a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Carousel Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i><?php bloginfo('name'); ?></h1>
            </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'     => false,
                'menu_class'    => 'navbar-nav ms-auto py-0',
                'fallback_cb'   => 'startup_theme_fallback_menu',
                'walker'        => new Startup_Theme_Walker_Nav_Menu(),
            ]);
            ?>
            <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        </div>
    </nav>

    <?php if (is_front_page()) : ?>
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?php echo esc_url(STARTUP_THEME_URI . '/assets/images/carousel-1.jpg'); ?>" alt="<?php esc_attr_e('Image', 'startup-theme'); ?>">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo esc_html(get_theme_mod('startup_carousel_subtitle_1', 'Creative & Innovative')); ?></h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?php echo esc_html(get_theme_mod('startup_carousel_title_1', 'Creative & Innovative Digital Solution')); ?></h1>
                        <a href="<?php echo esc_url(get_theme_mod('startup_carousel_button_1_url', '#')); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo esc_html(get_theme_mod('startup_carousel_button_1_text', 'Free Quote')); ?></a>
                        <a href="<?php echo esc_url(get_theme_mod('startup_carousel_button_2_url', '#')); ?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><?php echo esc_html(get_theme_mod('startup_carousel_button_2_text', 'Contact Us')); ?></a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?php echo esc_url(STARTUP_THEME_URI . '/assets/images/carousel-2.jpg'); ?>" alt="<?php esc_attr_e('Image', 'startup-theme'); ?>">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo esc_html(get_theme_mod('startup_carousel_subtitle_2', 'Creative & Innovative')); ?></h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?php echo esc_html(get_theme_mod('startup_carousel_title_2', 'Creative & Innovative Digital Solution')); ?></h1>
                        <a href="<?php echo esc_url(get_theme_mod('startup_carousel_button_1_url', '#')); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo esc_html(get_theme_mod('startup_carousel_button_1_text', 'Free Quote')); ?></a>
                        <a href="<?php echo esc_url(get_theme_mod('startup_carousel_button_2_url', '#')); ?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><?php echo esc_html(get_theme_mod('startup_carousel_button_2_text', 'Contact Us')); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php endif; ?>
</div>
<!-- Navbar & Carousel End -->

<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <form role="search" method="get" class="input-group" style="max-width: 600px;" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" class="form-control bg-transparent border-primary p-3" placeholder="<?php esc_attr_e('Type search keyword', 'startup-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                    <button class="btn btn-primary px-4" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->
