<?php
/**
 * Footer template
 *
 * @package Startup_Theme
 */
?>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 footer-about">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i><?php bloginfo('name'); ?></h1>
                        </a>
                    <?php endif; ?>
                    <p class="mt-3 mb-4"><?php echo esc_html(get_theme_mod('startup_footer_about', 'Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet et kasd eos duo.')); ?></p>
                    <form action="" method="post" class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control border-white p-3" placeholder="<?php esc_attr_e('Your Email', 'startup-theme'); ?>" name="newsletter_email" required>
                            <button class="btn btn-dark" type="submit"><?php esc_html_e('Sign Up', 'startup-theme'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0"><?php esc_html_e('Get In Touch', 'startup-theme'); ?></h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_address', '123 Street, New York, USA')); ?></p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_email', 'info@example.com')); ?></p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_phone', '+012 345 67890')); ?></p>
                        </div>
                        <div class="d-flex mt-4">
                            <?php
                            $social_links = [
                                'twitter' => get_theme_mod('startup_social_twitter', ''),
                                'facebook' => get_theme_mod('startup_social_facebook', ''),
                                'linkedin' => get_theme_mod('startup_social_linkedin', ''),
                                'instagram' => get_theme_mod('startup_social_instagram', ''),
                            ];
                            $social_icons = [
                                'twitter' => 'fab fa-twitter',
                                'facebook' => 'fab fa-facebook-f',
                                'linkedin' => 'fab fa-linkedin-in',
                                'instagram' => 'fab fa-instagram',
                            ];
                            foreach ($social_links as $key => $url) {
                                if (!empty($url)) {
                                    echo '<a class="btn btn-primary btn-square me-2" href="' . esc_url($url) . '" target="_blank"><i class="' . esc_attr($social_icons[$key]) . ' fw-normal"></i></a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0"><?php esc_html_e('Quick Links', 'startup-theme'); ?></h3>
                        </div>
                        <?php
                        if (has_nav_menu('footer')) {
                            wp_nav_menu([
                                'theme_location' => 'footer',
                                'container'      => false,
                                'menu_class'     => 'link-animated d-flex flex-column justify-content-start',
                                'fallback_cb'    => false,
                                'walker'         => new Startup_Theme_Footer_Walker(),
                            ]);
                        } else {
                            echo '<div class="link-animated d-flex flex-column justify-content-start">';
                            echo '<a class="text-light mb-2" href="' . esc_url(home_url('/')) . '"><i class="bi bi-arrow-right text-primary me-2"></i>' . esc_html__('Home', 'startup-theme') . '</a>';
                            wp_list_pages([
                                'title_li' => '',
                                'walker' => new Startup_Theme_Footer_Walker(),
                            ]);
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php else : ?>
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0"><?php esc_html_e('Popular Links', 'startup-theme'); ?></h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="<?php echo esc_url(home_url('/')); ?>"><i class="bi bi-arrow-right text-primary me-2"></i><?php esc_html_e('Home', 'startup-theme'); ?></a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i><?php esc_html_e('About Us', 'startup-theme'); ?></a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i><?php esc_html_e('Our Services', 'startup-theme'); ?></a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i><?php esc_html_e('Meet The Team', 'startup-theme'); ?></a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i><?php esc_html_e('Latest Blog', 'startup-theme'); ?></a>
                                <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i><?php esc_html_e('Contact Us', 'startup-theme'); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-white" style="background: #061429;">
    <div class="container text-center">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                    <p class="mb-0">
                        &copy; <?php echo date('Y'); ?> <a class="text-white border-bottom" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. <?php esc_html_e('All Rights Reserved.', 'startup-theme'); ?>
                        <?php
                        printf(
                            /* translators: %s: Theme author */
                            esc_html__('Designed by %s', 'startup-theme'),
                            '<a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a>'
                        );
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

<?php wp_footer(); ?>
</body>
</html>

