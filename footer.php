<footer class="site-footer">
    <?php
    $footer_cta_text = get_theme_mod('primiyam_footer_cta_text', get_theme_mod('primiyam_header_text', ''));
    $footer_cta_show_btn = (bool) get_theme_mod('primiyam_show_footer_cta', (bool) get_theme_mod('primiyam_show_header_cta', false));
    $footer_cta_btn_text = get_theme_mod('primiyam_footer_cta_button_text', get_theme_mod('primiyam_cta_text', 'Get Started'));
    $footer_cta_btn_url  = get_theme_mod('primiyam_footer_cta_button_url', get_theme_mod('primiyam_cta_url', '#'));

    $footer_has_cta_text = (bool) $footer_cta_text;
    $footer_has_cta_btn  = $footer_cta_show_btn;
    ?>

    <?php if ($footer_has_cta_text || $footer_has_cta_btn) : ?>
        <div class="footer-cta">
            <div class="container footer-cta-inner">
                <div class="footer-cta-text">
                    <h3 class="footer-cta-title"><?php echo esc_html(get_bloginfo('name')); ?></h3>
                    <?php if ($footer_has_cta_text) : ?>
                        <p class="footer-cta-subtitle"><?php echo esc_html($footer_cta_text); ?></p>
                    <?php endif; ?>
                </div>
                <div class="footer-cta-actions">
                    <?php if ($footer_has_cta_btn) : ?>
                        <a class="footer-cta-button" href="<?php echo esc_url($footer_cta_btn_url); ?>">
                            <?php echo esc_html($footer_cta_btn_text); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <?php
        $footer_has_social = (bool) (get_theme_mod('primiyam_facebook_url') || get_theme_mod('primiyam_twitter_url') || get_theme_mod('primiyam_instagram_url') || get_theme_mod('primiyam_linkedin_url'));
        $footer_has_widgets = (bool) (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3'));
        $footer_has_menu = (bool) has_nav_menu('footer');
        $footer_needs_fallback = (!$footer_has_widgets && !$footer_has_menu && !$footer_has_social);
        ?>

        <div class="footer-grid">
            <div class="footer-col footer-brand">
                <a class="footer-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <p class="footer-description"><?php echo esc_html(get_bloginfo('description')); ?></p>
                <?php if ($footer_has_social) : ?>
                    <div class="footer-social">
                        <?php if (get_theme_mod('primiyam_facebook_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('primiyam_facebook_url')); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="Facebook">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('primiyam_twitter_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('primiyam_twitter_url')); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="Twitter">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('primiyam_instagram_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('primiyam_instagram_url')); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="Instagram">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('primiyam_linkedin_url')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('primiyam_linkedin_url')); ?>" target="_blank" rel="noopener" class="footer-social-link" aria-label="LinkedIn">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zM3.742 5.154c.837 0 1.358-.554 1.358-1.248-.015-.709-.521-1.248-1.342-1.248-.821 0-1.358.54-1.358 1.248 0 .694.521 1.248 1.327 1.248h.015zM13.458 13.394V9.359c0-2.16-1.152-3.166-2.688-3.166-1.239 0-1.787.688-2.096 1.168v-1.01H6.273c.03.668 0 7.043 0 7.043h2.401v-3.932c0-.21.015-.42.075-.57.165-.42.54-.855 1.17-.855.825 0 1.155.63 1.155 1.556v3.803h2.384z"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-col footer-widgets-area">
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="footer-col footer-widgets-area">
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($footer_has_menu) : ?>
                <div class="footer-col footer-links">
                    <h3 class="footer-widget-title"><?php echo esc_html__('Quick Links', 'primiyam-blog'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>
            <?php endif; ?>

            <?php if ($footer_needs_fallback) : ?>
                <div class="footer-col footer-links">
                    <h3 class="footer-widget-title"><?php echo esc_html__('Quick Links', 'primiyam-blog'); ?></h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'primiyam-blog'); ?></a></li>
                        <?php
                        $posts_page_id = (int) get_option('page_for_posts');
                        $blog_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/');
                        ?>
                        <li><a href="<?php echo esc_url($blog_url); ?>"><?php echo esc_html__('Blog', 'primiyam-blog'); ?></a></li>
                        <?php
                        $contact_page = get_page_by_path('contact');
                        if ($contact_page) :
                        ?>
                            <li><a href="<?php echo esc_url(get_permalink($contact_page->ID)); ?>"><?php echo esc_html__('Contact', 'primiyam-blog'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="footer-col footer-widgets-area">
                    <h3 class="footer-widget-title"><?php echo esc_html__('Explore', 'primiyam-blog'); ?></h3>
                    <ul class="footer-menu">
                        <?php
                        $recent = wp_get_recent_posts(array(
                            'numberposts' => 4,
                            'post_status' => 'publish',
                        ));
                        if (!empty($recent)) {
                            foreach ($recent as $post) {
                                echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html(get_the_title($post['ID'])) . '</a></li>';
                            }
                        } else {
                            $about_page = get_page_by_path('about');
                            $privacy_page = get_page_by_path('privacy-policy');
                            if ($about_page) {
                                echo '<li><a href="' . esc_url(get_permalink($about_page->ID)) . '">' . esc_html__('About', 'primiyam-blog') . '</a></li>';
                            }
                            if ($privacy_page) {
                                echo '<li><a href="' . esc_url(get_permalink($privacy_page->ID)) . '">' . esc_html__('Privacy Policy', 'primiyam-blog') . '</a></li>';
                            }
                            echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Start Reading', 'primiyam-blog') . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <?php if (is_active_sidebar('footer-3')) : ?>
            <div class="footer-grid footer-grid-secondary">
                <div class="footer-col footer-widgets-area">
                    <div class="footer-widget">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <p class="footer-copyright">
                    <span class="footer-copyright-year">&copy; <?php echo date('Y'); ?></span>
                    <span class="footer-sep" aria-hidden="true">•</span>
                    <a class="footer-copyright-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                    <span class="footer-sep" aria-hidden="true">•</span>
                    <span class="footer-copyright-rights"><?php echo esc_html(get_theme_mod('primiyam_footer_text', 'All Rights Reserved')); ?></span>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
