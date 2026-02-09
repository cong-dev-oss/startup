<?php
/**
 * Front Page Template
 *
 * @package Startup_Theme
 */

get_header();
?>

<!-- Facts Start -->
<div class="container-fluid facts py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-users text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white mb-0"><?php esc_html_e('Happy Clients', 'startup-theme'); ?></h5>
                        <h1 class="text-white mb-0" data-toggle="counter-up"><?php echo esc_html(get_theme_mod('startup_fact_clients', '12345')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-check text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-primary mb-0"><?php esc_html_e('Projects Done', 'startup-theme'); ?></h5>
                        <h1 class="mb-0" data-toggle="counter-up"><?php echo esc_html(get_theme_mod('startup_fact_projects', '12345')); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-award text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white mb-0"><?php esc_html_e('Win Awards', 'startup-theme'); ?></h5>
                        <h1 class="text-white mb-0" data-toggle="counter-up"><?php echo esc_html(get_theme_mod('startup_fact_awards', '12345')); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->

<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase"><?php esc_html_e('About Us', 'startup-theme'); ?></h5>
                    <h1 class="mb-0"><?php echo esc_html(get_theme_mod('startup_about_title', 'The Best IT Solution With 10 Years of Experience')); ?></h1>
                </div>
                <p class="mb-4"><?php echo esc_html(get_theme_mod('startup_about_description', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet')); ?></p>
                <div class="row g-0 mb-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php esc_html_e('Award Winning', 'startup-theme'); ?></h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php esc_html_e('Professional Staff', 'startup-theme'); ?></h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php esc_html_e('24/7 Support', 'startup-theme'); ?></h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php esc_html_e('Fair Prices', 'startup-theme'); ?></h5>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2"><?php esc_html_e('Call to ask any question', 'startup-theme'); ?></h5>
                        <h4 class="text-primary mb-0"><?php echo esc_html(get_theme_mod('startup_phone', '+012 345 6789')); ?></h4>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_theme_mod('startup_quote_url', '#')); ?>" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s"><?php esc_html_e('Request A Quote', 'startup-theme'); ?></a>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <?php
                    $about_image = get_theme_mod('startup_about_image', STARTUP_THEME_URI . '/assets/images/about.jpg');
                    ?>
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo esc_url($about_image); ?>" alt="<?php esc_attr_e('About Us', 'startup-theme'); ?>" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Features Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?php esc_html_e('Why Choose Us', 'startup-theme'); ?></h5>
            <h1 class="mb-0"><?php echo esc_html(get_theme_mod('startup_features_title', 'We Are Here to Grow Your Business Exponentially')); ?></h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-cubes text-white"></i>
                        </div>
                        <h4><?php esc_html_e('Best In Industry', 'startup-theme'); ?></h4>
                        <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_feature_1_desc', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor')); ?></p>
                    </div>
                    <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-white"></i>
                        </div>
                        <h4><?php esc_html_e('Award Winning', 'startup-theme'); ?></h4>
                        <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_feature_2_desc', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor')); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                <div class="position-relative h-100">
                    <?php
                    $feature_image = get_theme_mod('startup_feature_image', STARTUP_THEME_URI . '/assets/images/feature.jpg');
                    ?>
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="<?php echo esc_url($feature_image); ?>" alt="<?php esc_attr_e('Features', 'startup-theme'); ?>" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users-cog text-white"></i>
                        </div>
                        <h4><?php esc_html_e('Professional Staff', 'startup-theme'); ?></h4>
                        <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_feature_3_desc', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor')); ?></p>
                    </div>
                    <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <h4><?php esc_html_e('24/7 Support', 'startup-theme'); ?></h4>
                        <p class="mb-0"><?php echo esc_html(get_theme_mod('startup_feature_4_desc', 'Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->

<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?php esc_html_e('Our Services', 'startup-theme'); ?></h5>
            <h1 class="mb-0"><?php echo esc_html(get_theme_mod('startup_services_title', 'Custom IT Solutions for Your Successful Business')); ?></h1>
        </div>
        <div class="row g-5">
            <?php
            $services = [
                ['icon' => 'fa fa-shield-alt', 'title' => 'Cyber Security', 'desc' => 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed'],
                ['icon' => 'fa fa-chart-pie', 'title' => 'Data Analytics', 'desc' => 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed'],
                ['icon' => 'fa fa-code', 'title' => 'Web Development', 'desc' => 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed'],
                ['icon' => 'fab fa-android', 'title' => 'Apps Development', 'desc' => 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed'],
                ['icon' => 'fa fa-search', 'title' => 'SEO Optimization', 'desc' => 'Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed'],
            ];
            $delay = 0.3;
            foreach ($services as $service) {
                ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="<?php echo esc_attr($service['icon']); ?> text-white"></i>
                        </div>
                        <h4 class="mb-3"><?php echo esc_html($service['title']); ?></h4>
                        <p class="m-0"><?php echo esc_html($service['desc']); ?></p>
                        <a class="btn btn-lg btn-primary rounded" href="#">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php
                $delay += 0.3;
            }
            ?>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <h3 class="text-white mb-3"><?php esc_html_e('Call Us For Quote', 'startup-theme'); ?></h3>
                    <p class="text-white mb-3"><?php echo esc_html(get_theme_mod('startup_quote_text', 'Clita ipsum magna kasd rebum at ipsum amet dolor justo dolor est magna stet eirmod')); ?></p>
                    <h2 class="text-white mb-0"><?php echo esc_html(get_theme_mod('startup_phone', '+012 345 6789')); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Quote Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase"><?php esc_html_e('Request A Quote', 'startup-theme'); ?></h5>
                    <h1 class="mb-0"><?php echo esc_html(get_theme_mod('startup_quote_title', 'Need A Free Quote? Please Feel Free to Contact Us')); ?></h1>
                </div>
                <div class="row gx-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i><?php esc_html_e('Reply within 24 hours', 'startup-theme'); ?></h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i><?php esc_html_e('24 hrs telephone support', 'startup-theme'); ?></h5>
                    </div>
                </div>
                <p class="mb-4"><?php echo esc_html(get_theme_mod('startup_quote_description', 'Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua.')); ?></p>
                <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2"><?php esc_html_e('Call to ask any question', 'startup-theme'); ?></h5>
                        <h4 class="text-primary mb-0"><?php echo esc_html(get_theme_mod('startup_phone', '+012 345 6789')); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                    <?php echo do_shortcode('[contact-form-7]'); ?>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="startup_quote_request">
                        <?php wp_nonce_field('startup_quote_nonce', 'startup_quote_nonce'); ?>
                        <div class="row g-3">
                            <div class="col-xl-12">
                                <input type="text" class="form-control bg-light border-0" placeholder="<?php esc_attr_e('Your Name', 'startup-theme'); ?>" name="name" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <input type="email" class="form-control bg-light border-0" placeholder="<?php esc_attr_e('Your Email', 'startup-theme'); ?>" name="email" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <select class="form-select bg-light border-0" name="service" style="height: 55px;">
                                    <option selected><?php esc_html_e('Select A Service', 'startup-theme'); ?></option>
                                    <option value="service-1"><?php esc_html_e('Service 1', 'startup-theme'); ?></option>
                                    <option value="service-2"><?php esc_html_e('Service 2', 'startup-theme'); ?></option>
                                    <option value="service-3"><?php esc_html_e('Service 3', 'startup-theme'); ?></option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-light border-0" rows="3" placeholder="<?php esc_attr_e('Message', 'startup-theme'); ?>" name="message" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark w-100 py-3" type="submit"><?php esc_html_e('Request A Quote', 'startup-theme'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->

<!-- Testimonial Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?php esc_html_e('Testimonial', 'startup-theme'); ?></h5>
            <h1 class="mb-0"><?php echo esc_html(get_theme_mod('startup_testimonial_title', 'What Our Clients Say About Our Digital Services')); ?></h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            <?php
            $testimonials = [
                ['image' => 'testimonial-1.jpg', 'name' => 'Client Name', 'profession' => 'Profession', 'text' => 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam'],
                ['image' => 'testimonial-2.jpg', 'name' => 'Client Name', 'profession' => 'Profession', 'text' => 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam'],
                ['image' => 'testimonial-3.jpg', 'name' => 'Client Name', 'profession' => 'Profession', 'text' => 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam'],
                ['image' => 'testimonial-4.jpg', 'name' => 'Client Name', 'profession' => 'Profession', 'text' => 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam'],
            ];
            foreach ($testimonials as $testimonial) {
                ?>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="<?php echo esc_url(STARTUP_THEME_URI . '/assets/images/' . $testimonial['image']); ?>" style="width: 60px; height: 60px;" alt="<?php echo esc_attr($testimonial['name']); ?>">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1"><?php echo esc_html($testimonial['name']); ?></h4>
                            <small class="text-uppercase"><?php echo esc_html($testimonial['profession']); ?></small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <?php echo esc_html($testimonial['text']); ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Team Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?php esc_html_e('Team Members', 'startup-theme'); ?></h5>
            <h1 class="mb-0"><?php echo esc_html(get_theme_mod('startup_team_title', 'Professional Stuffs Ready to Help Your Business')); ?></h1>
        </div>
        <div class="row g-5">
            <?php
            $team_members = [
                ['image' => 'team-1.jpg', 'name' => 'Full Name', 'designation' => 'Designation'],
                ['image' => 'team-2.jpg', 'name' => 'Full Name', 'designation' => 'Designation'],
                ['image' => 'team-3.jpg', 'name' => 'Full Name', 'designation' => 'Designation'],
            ];
            $delay = 0.3;
            foreach ($team_members as $member) {
                ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="<?php echo esc_attr($delay); ?>s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo esc_url(STARTUP_THEME_URI . '/assets/images/' . $member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><?php echo esc_html($member['name']); ?></h4>
                            <p class="text-uppercase m-0"><?php echo esc_html($member['designation']); ?></p>
                        </div>
                    </div>
                </div>
                <?php
                $delay += 0.3;
            }
            ?>
        </div>
    </div>
</div>
<!-- Team End -->

<!-- Vendor Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                <?php
                for ($i = 1; $i <= 9; $i++) {
                    ?>
                    <img src="<?php echo esc_url(STARTUP_THEME_URI . '/assets/images/vendor-' . $i . '.jpg'); ?>" alt="<?php echo esc_attr('Vendor ' . $i); ?>">
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->

<?php
get_footer();
?>
