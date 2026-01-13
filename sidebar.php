<aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        
        <div class="widget">
            <h3 class="widget-title">Search</h3>
            <?php get_search_form(); ?>
        </div>

        <div class="widget">
            <h3 class="widget-title">Recent Posts</h3>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post) :
                ?>
                    <li>
                        <a href="<?php echo get_permalink($post['ID']); ?>">
                            <?php echo $post['post_title']; ?>
                        </a>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </div>

        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <ul>
                <?php
                wp_list_categories(array(
                    'title_li' => '',
                    'show_count' => true,
                ));
                ?>
            </ul>
        </div>

        <div class="widget">
            <h3 class="widget-title">Archives</h3>
            <ul>
                <?php
                wp_get_archives(array(
                    'type' => 'monthly',
                    'show_post_count' => true,
                ));
                ?>
            </ul>
        </div>

        <div class="widget">
            <h3 class="widget-title">Tags</h3>
            <?php
            $tags = get_tags();
            if ($tags) :
                echo '<div style="display: flex; flex-wrap: wrap; gap: 8px;">';
                foreach ($tags as $tag) :
                    echo '<a href="' . get_tag_link($tag->term_id) . '" style="background: #3498db; color: white; padding: 5px 12px; border-radius: 15px; font-size: 13px;">' . $tag->name . '</a>';
                endforeach;
                echo '</div>';
            endif;
            ?>
        </div>

    <?php endif; ?>
</aside>
