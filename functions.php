<?php
/**
 * Theme functions and definitions
 *
 * @package Primiyam_Blog
 */

if (!defined('ABSPATH')) {
    exit;
}

define('PRIMIYAM_VERSION', '1.0.0');

/**
 * Theme setup
 */
function primiyam_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 600, true);
    add_image_size('primiyam-featured', 800, 500, true);
    add_image_size('primiyam-thumbnail', 350, 250, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'primiyam-blog'),
        'footer'  => esc_html__('Footer Menu', 'primiyam-blog'),
    ));

    add_theme_support('starter-content', array(
        'posts' => array(
            'home' => array(
                'post_type'    => 'page',
                'post_title'   => 'Home',
                'post_content' => 'This is your demo home page. Use this area to introduce your brand, highlight featured posts, and set the tone for a premium reading experience.',
            ),
            'blog' => array(
                'post_type'    => 'page',
                'post_title'   => 'Blog',
                'post_content' => 'Your latest articles will appear here.',
            ),
            'about' => array(
                'post_type'    => 'page',
                'post_title'   => 'About',
                'post_content' => 'Add a short story about your mission, values, and what makes your content premium.',
            ),
            'contact' => array(
                'post_type'    => 'page',
                'post_title'   => 'Contact',
                'post_content' => 'Add your email, contact form, or social links here.',
            ),
            'privacy-policy' => array(
                'post_type'    => 'page',
                'post_title'   => 'Privacy Policy',
                'post_content' => 'This is a demo privacy policy page. Replace this text with your actual policy.',
            ),
            'premium-welcome' => array(
                'post_type'    => 'post',
                'post_title'   => 'Premium Label: Welcome',
                'post_content' => 'Welcome to Primiyam Blog. This is a demo post for the Premium Label theme style. Replace this content with your own story, insights, and updates.',
                'post_excerpt' => 'A starter post to showcase the Premium Label look and typography.',
            ),
            'signature-style' => array(
                'post_type'    => 'post',
                'post_title'   => 'Signature Style Guide',
                'post_content' => 'Use clean spacing, strong headlines, and a refined palette. This post is here to help you visualize the layout for longer reads and headings.',
                'post_excerpt' => 'A sample post demonstrating headings, spacing, and readability.',
            ),
            'behind-the-label' => array(
                'post_type'    => 'post',
                'post_title'   => 'Behind the Label',
                'post_content' => 'Tell your brand story, share your process, and highlight what makes your content premium. This post can be replaced with your first real article.',
                'post_excerpt' => 'A demo post for brand storytelling and premium presentation.',
            ),
        ),
        'widgets' => array(
            'sidebar-1' => array(
                'search',
                'recent-posts',
                'categories',
            ),
            'footer-1' => array(
                'text_business_info',
            ),
            'footer-2' => array(
                'recent-posts',
            ),
            'footer-3' => array(
                'categories',
            ),
        ),
        'options' => array(
            'show_on_front'  => 'page',
            'page_on_front'  => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),
        'theme_mods' => array(
            'primiyam_header_text' => 'A premium blog experience with refined typography and clean layouts',
            'primiyam_footer_text' => 'All Rights Reserved',
        ),
        'nav_menus' => array(
            'primary' => array(
                'name'  => esc_html__('Primary Menu', 'primiyam-blog'),
                'items' => array(
                    'link_home',
                    'page_about',
                    'page_contact',
                    'page_blog',
                ),
            ),
            'footer' => array(
                'name'  => esc_html__('Footer Menu', 'primiyam-blog'),
                'items' => array(
                    'page_privacy-policy',
                    'page_contact',
                ),
            ),
        ),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'f8f9fa',
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 400,
        'flex-height'   => true,
        'flex-width'    => true,
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Load text domain for translation
    load_theme_textdomain('primiyam-blog', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'primiyam_setup');

/**
 * Set the content width in pixels
 */
function primiyam_content_width() {
    $GLOBALS['content_width'] = apply_filters('primiyam_content_width', 1200);
}
add_action('after_setup_theme', 'primiyam_content_width', 0);

/**
 * Register widget areas
 */
function primiyam_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'primiyam-blog'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'primiyam-blog'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'primiyam-blog'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'primiyam-blog'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'primiyam-blog'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'primiyam-blog'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'primiyam-blog'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'primiyam-blog'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'primiyam_widgets_init');

/**
 * Enqueue scripts and styles
 */
function primiyam_scripts() {
    // Main stylesheet
    wp_enqueue_style('primiyam-style', get_stylesheet_uri(), array(), PRIMIYAM_VERSION);
    
    // Additional CSS
    wp_enqueue_style('primiyam-main', get_template_directory_uri() . '/assets/css/main.css', array('primiyam-style'), PRIMIYAM_VERSION);
    
    // Helper CSS
    wp_enqueue_style('primiyam-helpers', get_template_directory_uri() . '/assets/css/helpers.css', array('primiyam-style'), PRIMIYAM_VERSION);

    // Main JavaScript
    wp_enqueue_script('primiyam-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), PRIMIYAM_VERSION, true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'primiyam_scripts');

/**
 * Default menu fallback
 */
function primiyam_default_menu() {
    echo '<ul class="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    wp_list_pages(array(
        'title_li' => '',
        'depth'    => 1,
    ));
    echo '</ul>';
}

/**
 * Custom excerpt length
 */
function primiyam_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'primiyam_excerpt_length');

/**
 * Custom excerpt more
 */
function primiyam_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'primiyam_excerpt_more');

/**
 * Customizer settings
 */
function primiyam_customize_register($wp_customize) {
    // Social Media Section
    $wp_customize->add_section('primiyam_social_section', array(
        'title'    => __('Social Media Links', 'primiyam-blog'),
        'priority' => 30,
    ));

    // Facebook URL
    $wp_customize->add_setting('primiyam_facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('primiyam_facebook_url', array(
        'label'   => __('Facebook URL', 'primiyam-blog'),
        'section' => 'primiyam_social_section',
        'type'    => 'url',
    ));

    // Twitter URL
    $wp_customize->add_setting('primiyam_twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('primiyam_twitter_url', array(
        'label'   => __('Twitter URL', 'primiyam-blog'),
        'section' => 'primiyam_social_section',
        'type'    => 'url',
    ));

    // Instagram URL
    $wp_customize->add_setting('primiyam_instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('primiyam_instagram_url', array(
        'label'   => __('Instagram URL', 'primiyam-blog'),
        'section' => 'primiyam_social_section',
        'type'    => 'url',
    ));

    // LinkedIn URL
    $wp_customize->add_setting('primiyam_linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('primiyam_linkedin_url', array(
        'label'   => __('LinkedIn URL', 'primiyam-blog'),
        'section' => 'primiyam_social_section',
        'type'    => 'url',
    ));

    // YouTube URL
    $wp_customize->add_setting('primiyam_youtube_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('primiyam_youtube_url', array(
        'label'   => __('YouTube URL', 'primiyam-blog'),
        'section' => 'primiyam_social_section',
        'type'    => 'url',
    ));

    // Header Section
    $wp_customize->add_section('primiyam_header_section', array(
        'title'    => __('Header Settings', 'primiyam-blog'),
        'priority' => 31,
    ));

    // Header text
    $wp_customize->add_setting('primiyam_header_text', array(
        'default'           => 'Welcome to our blog',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('primiyam_header_text', array(
        'label'   => __('Header Top Text', 'primiyam-blog'),
        'section' => 'primiyam_header_section',
        'type'    => 'text',
    ));

    // Header phone
    $wp_customize->add_setting('primiyam_header_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('primiyam_header_phone', array(
        'label'   => __('Header Phone Number', 'primiyam-blog'),
        'section' => 'primiyam_header_section',
        'type'    => 'text',
    ));

    // Header email
    $wp_customize->add_setting('primiyam_header_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('primiyam_header_email', array(
        'label'   => __('Header Email', 'primiyam-blog'),
        'section' => 'primiyam_header_section',
        'type'    => 'email',
    ));

    // CTA Button
    $wp_customize->add_setting('primiyam_show_header_cta', array(
        'default'           => false,
        'sanitize_callback' => 'primiyam_sanitize_checkbox',
    ));
    $wp_customize->add_control('primiyam_show_header_cta', array(
        'label'   => __('Show CTA Button', 'primiyam-blog'),
        'section' => 'primiyam_header_section',
        'type'    => 'checkbox',
    ));

    $wp_customize->add_setting('primiyam_cta_text', array(
        'default'           => 'Get Started',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('primiyam_cta_text', array(
        'label'   => __('CTA Button Text', 'primiyam-blog'),
        'section' => 'primiyam_header_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('primiyam_cta_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('primiyam_cta_url', array(
        'label'   => __('CTA Button URL', 'primiyam-blog'),
        'section' => 'primiyam_header_section',
        'type'    => 'url',
    ));

    // Footer Section
    $wp_customize->add_section('primiyam_footer_section', array(
        'title'    => __('Footer Settings', 'primiyam-blog'),
        'priority' => 32,
    ));

    // Footer text
    $wp_customize->add_setting('primiyam_footer_text', array(
        'default'           => 'All Rights Reserved',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('primiyam_footer_text', array(
        'label'   => __('Footer Copyright Text', 'primiyam-blog'),
        'section' => 'primiyam_footer_section',
        'type'    => 'text',
    ));

    // Color Section
    $wp_customize->add_section('primiyam_colors_section', array(
        'title'    => __('Theme Colors', 'primiyam-blog'),
        'priority' => 33,
    ));

    // Primary color
    $wp_customize->add_setting('primiyam_primary_color', array(
        'default'           => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primiyam_primary_color', array(
        'label'   => __('Primary Color', 'primiyam-blog'),
        'section' => 'primiyam_colors_section',
    )));

    // Secondary color
    $wp_customize->add_setting('primiyam_secondary_color', array(
        'default'           => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primiyam_secondary_color', array(
        'label'   => __('Secondary Color', 'primiyam-blog'),
        'section' => 'primiyam_colors_section',
    )));
}
add_action('customize_register', 'primiyam_customize_register');

/**
 * Sanitize checkbox
 */
function primiyam_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Add custom colors to CSS
 */
function primiyam_custom_colors() {
    $primary_color   = get_theme_mod('primiyam_primary_color', '#2c3e50');
    $secondary_color = get_theme_mod('primiyam_secondary_color', '#3498db');

    if ($primary_color !== '#2c3e50' || $secondary_color !== '#3498db') {
        ?>
        <style type="text/css">
            :root {
                <?php if ($primary_color !== '#2c3e50') : ?>
                --primary-color: <?php echo esc_attr($primary_color); ?>;
                <?php endif; ?>
                <?php if ($secondary_color !== '#3498db') : ?>
                --secondary-color: <?php echo esc_attr($secondary_color); ?>;
                <?php endif; ?>
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'primiyam_custom_colors');

/**
 * Add a pingback url auto-discovery header for single posts
 */
function primiyam_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'primiyam_pingback_header');

/**
 * Custom search form
 */
function primiyam_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <input type="search" class="search-field" placeholder="' . esc_attr__('Search...', 'primiyam-blog') . '" value="' . get_search_query() . '" name="s" />
        <button type="submit" class="search-submit">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'primiyam_search_form');

/**
 * Add body classes
 */
function primiyam_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    } else {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'primiyam_body_classes');

/**
 * Add post views counter
 */
function primiyam_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function primiyam_get_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

/**
 * Security enhancements
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/**
 * Admin notices for theme activation
 */
function primiyam_admin_notice() {
    if (isset($_GET['activated'])) {
        echo '<div class="notice notice-success is-dismissible">
            <p><strong>Primiyam Blog Theme activated!</strong> Please visit <a href="' . admin_url('customize.php') . '">Customizer</a> to configure theme settings.</p>
        </div>';
    }
}
add_action('admin_notices', 'primiyam_admin_notice');

function primiyam_github_request($url) {
    $args = array(
        'timeout' => 15,
        'headers' => array(
            'Accept'     => 'application/vnd.github+json',
            'User-Agent' => 'Primiyam-Blog-Theme-Updater',
        ),
    );

    if (defined('PRIMIYAM_GITHUB_TOKEN') && PRIMIYAM_GITHUB_TOKEN) {
        $args['headers']['Authorization'] = 'Bearer ' . PRIMIYAM_GITHUB_TOKEN;
    }

    $response = wp_remote_get($url, $args);
    if (is_wp_error($response)) {
        return $response;
    }

    $code = (int) wp_remote_retrieve_response_code($response);
    if ($code < 200 || $code >= 300) {
        return new WP_Error('primiyam_github_http_error', 'GitHub request failed', array(
            'status' => $code,
            'body'   => wp_remote_retrieve_body($response),
        ));
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    if (!is_array($data)) {
        return new WP_Error('primiyam_github_json_error', 'Invalid GitHub JSON response');
    }

    return $data;
}

function primiyam_get_latest_github_release() {
    $cache_key = 'primiyam_github_latest_release';
    $cached = get_transient($cache_key);
    if ($cached) {
        return $cached;
    }

    $release = primiyam_github_request('https://api.github.com/repos/desheelabs/Primiyam-Blog/releases/latest');
    if (is_wp_error($release)) {
        $data = $release->get_error_data();
        $status = is_array($data) && isset($data['status']) ? (int) $data['status'] : 0;
        if ($status !== 404) {
            return $release;
        }

        $tags = primiyam_github_request('https://api.github.com/repos/desheelabs/Primiyam-Blog/tags?per_page=1');
        if (is_wp_error($tags) || empty($tags[0]['name'])) {
            return $release;
        }

        $tag = (string) $tags[0]['name'];
        $release = array(
            'tag_name'    => $tag,
            'html_url'    => 'https://github.com/desheelabs/Primiyam-Blog/tree/' . rawurlencode($tag),
            'zipball_url' => 'https://github.com/desheelabs/Primiyam-Blog/archive/refs/tags/' . rawurlencode($tag) . '.zip',
            'body'        => 'Git tag update.',
        );
    }

    set_transient($cache_key, $release, 10 * MINUTE_IN_SECONDS);
    return $release;
}

function primiyam_get_release_download_url($release) {
    if (!empty($release['assets']) && is_array($release['assets'])) {
        foreach ($release['assets'] as $asset) {
            if (!empty($asset['name']) && preg_match('/\\.zip$/i', $asset['name']) && !empty($asset['browser_download_url'])) {
                return $asset['browser_download_url'];
            }
        }
    }

    if (!empty($release['zipball_url'])) {
        return $release['zipball_url'];
    }

    return '';
}

function primiyam_theme_update_check($transient) {
    if (empty($transient->checked) || !is_array($transient->checked)) {
        return $transient;
    }

    $theme_slug = get_stylesheet();
    $current_version = wp_get_theme($theme_slug)->get('Version');

    $release = primiyam_get_latest_github_release();
    if (is_wp_error($release)) {
        return $transient;
    }

    $tag = !empty($release['tag_name']) ? (string) $release['tag_name'] : '';
    $latest_version = ltrim($tag, 'v');
    if (!$latest_version) {
        return $transient;
    }

    if (version_compare($latest_version, $current_version, '<=')) {
        return $transient;
    }

    $package = primiyam_get_release_download_url($release);
    if (!$package) {
        return $transient;
    }

    $transient->response[$theme_slug] = array(
        'theme'       => $theme_slug,
        'new_version' => $latest_version,
        'url'         => !empty($release['html_url']) ? $release['html_url'] : 'https://github.com/desheelabs/Primiyam-Blog',
        'package'     => $package,
    );

    return $transient;
}
add_filter('pre_set_site_transient_update_themes', 'primiyam_theme_update_check');

function primiyam_theme_api($result, $action, $args) {
    if ($action !== 'theme_information') {
        return $result;
    }

    if (empty($args->slug) || $args->slug !== get_stylesheet()) {
        return $result;
    }

    $release = primiyam_get_latest_github_release();
    if (is_wp_error($release)) {
        return $result;
    }

    $tag = !empty($release['tag_name']) ? (string) $release['tag_name'] : '';
    $latest_version = ltrim($tag, 'v');

    $info = new stdClass();
    $info->name = 'Primiyam Blog';
    $info->slug = get_stylesheet();
    $info->version = $latest_version ? $latest_version : wp_get_theme()->get('Version');
    $info->homepage = !empty($release['html_url']) ? $release['html_url'] : 'https://github.com/desheelabs/Primiyam-Blog';
    $info->download_link = primiyam_get_release_download_url($release);
    $info->sections = array(
        'description' => !empty($release['body']) ? wp_kses_post($release['body']) : 'GitHub release update.',
    );

    return $info;
}
add_filter('themes_api', 'primiyam_theme_api', 10, 3);

function primiyam_upgrader_source_selection($source, $remote_source, $upgrader) {
    if (empty($upgrader->skin) || empty($upgrader->skin->theme) || $upgrader->skin->theme !== get_stylesheet()) {
        return $source;
    }

    $theme_slug = get_stylesheet();
    $desired = trailingslashit($remote_source) . $theme_slug;

    if ($source === $desired) {
        return $source;
    }

    if (@is_dir($source) && !@is_dir($desired)) {
        @rename($source, $desired);
        return $desired;
    }

    return $source;
}
add_filter('upgrader_source_selection', 'primiyam_upgrader_source_selection', 10, 3);

function primiyam_force_theme_update_check() {
    if (!is_admin()) {
        return;
    }
    if (!current_user_can('manage_options')) {
        return;
    }
    if (empty($_GET['primiyam_force_update_check'])) {
        return;
    }

    delete_transient('primiyam_github_latest_release');
    delete_site_transient('update_themes');
    wp_update_themes();

    wp_safe_redirect(remove_query_arg('primiyam_force_update_check'));
    exit;
}
add_action('admin_init', 'primiyam_force_theme_update_check');
