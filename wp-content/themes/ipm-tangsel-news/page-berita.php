<?php
/**
 * Template Name: Berita
 *
 * This is the template that displays the News Listing/Blog Index.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <!-- Page Header Solid -->
    <section class="page-header" style="background-color: var(--bg-surface); border-bottom: 1px solid var(--border-light); color: var(--text-main);">
        <div class="container">
            <h1 class="page-title" style="color: var(--text-main); text-shadow: none;"><?php the_title(); ?></h1>
            <p class="page-subtitle" style="color: var(--text-muted);">Berita dan Update Terbaru Seputar Pelajar Anggrek</p>
        </div>
    </section>

    <!-- News List Section -->
    <section class="news-section" style="padding-top: 60px;">
        <div class="container">
            
            <div class="news-grid">
                <?php 
                // Custom query for News Page in case it's set as a static page with this template
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $news_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => $paged
                );
                $news_query = new WP_Query($news_args);

                if ( $news_query->have_posts() ) : ?>
                    <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                            
                            <!-- Thumbnail -->
                            <div class="news-image-wrapper">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium_large', array('class' => 'news-image')); ?>
                                    <?php else : ?>
                                        <div class="news-image" style="background: linear-gradient(135deg, var(--bg-main) 0%, var(--border-light) 100%); display:flex; align-items:center; justify-content:center;">
                                            <svg width="48" height="48" fill="none" stroke="var(--text-muted)" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v4M21 15l-4-4m4 4l-4 4"></path></svg>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<span class="news-category-badge">' . esc_html( $categories[0]->name ) . '</span>';
                                    }
                                ?>
                            </div>
                            
                            <!-- Content -->
                            <div class="news-content">
                                <div class="news-meta">
                                    <div class="meta-item">
                                        <svg class="meta-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="meta-item">
                                        <svg class="meta-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <span><?php the_author(); ?></span>
                                    </div>
                                </div>
                                
                                <h3 class="news-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="news-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="news-read-more">
                                    Baca Selengkapnya
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div style="grid-column: 1 / -1; text-align:center; padding: 40px; background:var(--bg-surface); border-radius: var(--radius-md);">
                        <p><?php _e( 'Belum ada berita yang dipublish.', 'ipm-tangsel-news' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $news_query->max_num_pages,
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Prev', 'ipm-tangsel-news' ),
                    'next_text' => __( 'Next &raquo;', 'ipm-tangsel-news' ),
                ) );
                wp_reset_postdata();
                ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
