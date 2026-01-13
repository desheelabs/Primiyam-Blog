<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Primiyam_Blog
 */

get_header(); ?>

<div class="site-content">
    <div class="container">
        <div class="content-area">
            <main class="main-content">
                <article class="error-404" style="text-align: center; padding: 60px 20px;">
                    <div style="font-size: 120px; font-weight: 700; color: #3498db; line-height: 1;">404</div>
                    <h1 style="font-size: 36px; margin: 20px 0; color: #2c3e50;">Oops! Page Not Found</h1>
                    <p style="font-size: 18px; color: #666; margin-bottom: 30px;">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    
                    <div style="max-width: 500px; margin: 0 auto 40px;">
                        <?php get_search_form(); ?>
                    </div>

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="read-more" style="display: inline-block;">
                        Return to Homepage
                    </a>

                    <div style="margin-top: 60px;">
                        <h3 style="margin-bottom: 20px; color: #2c3e50;">Recent Posts</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; text-align: left;">
                            <?php
                            $recent_posts = wp_get_recent_posts(array(
                                'numberposts' => 3,
                                'post_status' => 'publish'
                            ));
                            foreach ($recent_posts as $post) :
                            ?>
                                <div style="background: #f8f9fa; padding: 20px; border-radius: 8px;">
                                    <h4 style="margin-bottom: 10px;">
                                        <a href="<?php echo get_permalink($post['ID']); ?>" style="color: #2c3e50;">
                                            <?php echo esc_html($post['post_title']); ?>
                                        </a>
                                    </h4>
                                    <p style="font-size: 14px; color: #666;">
                                        <?php echo wp_trim_words($post['post_content'], 15); ?>
                                    </p>
                                </div>
                            <?php endforeach; wp_reset_query(); ?>
                        </div>
                    </div>
                </article>
            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
