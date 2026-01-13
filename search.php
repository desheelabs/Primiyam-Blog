<?php
/**
 * The template for displaying search results
 *
 * @package Primiyam_Blog
 */

get_header(); ?>

<div class="site-content">
    <div class="container">
        <div class="content-area">
            <main class="main-content">
                <header class="page-header" style="margin-bottom: 40px; padding: 30px; background: var(--white); border-radius: 8px;">
                    <h1 class="page-title" style="font-size: 28px; color: var(--dark-color);">
                        <?php
                        printf(
                            esc_html__('Search Results for: %s', 'primiyam-blog'),
                            '<span style="color: var(--primary-color);">' . get_search_query() . '</span>'
                        );
                        ?>
                    </h1>
                </header>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('article-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content-wrapper">
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        </svg>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                        <?php the_author(); ?>
                                    </span>
                                </div>

                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Read More
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>

                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;',
                    ));
                    ?>

                <?php else : ?>
                    <article class="no-results" style="padding: 60px; text-align: center; background: var(--white); border-radius: 8px;">
                        <h2 style="font-size: 32px; margin-bottom: 20px;">Nothing Found</h2>
                        <p style="font-size: 18px; color: var(--text-color); margin-bottom: 30px;">
                            Sorry, but nothing matched your search terms. Please try again with different keywords.
                        </p>
                        <?php get_search_form(); ?>
                    </article>
                <?php endif; ?>
            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
