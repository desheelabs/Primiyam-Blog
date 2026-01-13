<?php
/**
 * The template for displaying Archive pages
 *
 * @package Primiyam_Blog
 */

get_header(); ?>

<div class="site-content">
    <div class="container">
        <div class="content-area">
            <main class="main-content">
                <header class="page-header" style="margin-bottom: 40px; padding-bottom: 20px; border-bottom: 3px solid #3498db;">
                    <?php
                    the_archive_title('<h1 class="page-title" style="font-size: 32px; color: #2c3e50;">', '</h1>');
                    the_archive_description('<div class="archive-description" style="margin-top: 10px; color: #666;">', '</div>');
                    ?>
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
                                    <span class="comments-link">
                                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                        </svg>
                                        <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
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
                    <article class="no-results">
                        <h2>Nothing Found</h2>
                        <p>Sorry, but nothing matched your search criteria. Please try again with different keywords.</p>
                        <?php get_search_form(); ?>
                    </article>
                <?php endif; ?>
            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
