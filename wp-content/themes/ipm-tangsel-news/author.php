<?php
/**
 * The template for displaying archive pages for Authors.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper" style="padding-top: var(--header-height); background-color: var(--bg-surface);">

    <!-- Header Section -->
    <section class="page-header" style="background-color: var(--primary); color: white; padding: 60px 0;">
        <div class="container" style="text-align: center; display: flex; flex-direction: column; align-items: center; gap: 16px;">
            <div class="author-avatar" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; border: 4px solid var(--secondary); box-shadow: var(--shadow-md);">
                <?php echo get_avatar( get_the_author_meta('user_email'), 240, '', '', array('style' => 'width: 100%; height: auto; display: block; object-fit: cover;') ); ?>
            </div>
            <div>
                <p class="page-subtitle" style="color: var(--secondary); margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Berita oleh Penulis</p>
                <h1 class="page-title" style="color: white; margin: 0; font-size: clamp(2rem, 5vw, 3rem); font-family: var(--font-display);">
                    <?php echo get_the_author(); ?>
                </h1>
            </div>
        </div>
    </section>

    <!-- Author Posts Section -->
    <section class="news-section" style="padding: 80px 0; background: var(--bg-main);">
        <div class="container" style="max-width: var(--container-max);">
            
            <?php if ( have_posts() ) : ?>

                <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 32px;">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" class="news-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-light); transition: all 0.3s ease; display: flex; flex-direction: column;">
                            
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="news-thumb" style="display: block; height: 220px; overflow: hidden;">
                                    <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;')); ?>
                                </a>
                            <?php endif; ?>

                            <div class="news-content" style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                                <div class="news-meta" style="font-size: 0.85rem; color: var(--secondary); font-weight: 700; text-transform: uppercase; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                                    <?php echo get_the_date('j M Y'); ?>
                                </div>
                                
                                <h3 class="news-title" style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700; margin: 0 0 12px 0; line-height: 1.4;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--text-main); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--secondary)'" onmouseout="this.style.color='var(--text-main)'">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div class="news-excerpt" style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 20px; flex-grow: 1;">
                                    <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="news-read-more" style="display: inline-flex; align-items: center; gap: 8px; color: var(--primary); font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em; transition: color 0.2s;" onmouseover="this.style.color='var(--secondary)'" onmouseout="this.style.color='var(--primary)'">
                                    Baca Berita <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s ease;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                            </div>
                        </article>

                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination text-center" style="margin-top: 48px;">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>',
                        'next_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>',
                    ) );
                    ?>
                </div>

            <?php else : ?>

                <!-- No Results -->
                <div style="text-align: center; padding: 80px 40px; background: white; border-radius: 24px; box-shadow: var(--shadow-sm); border: 1px solid var(--border-light);">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--border-light)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 24px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    <h2 style="font-family: var(--font-display); font-size: 2rem; color: var(--text-main); margin: 0 0 16px 0;">Belum Ada Berita</h2>
                    <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 500px; margin: 0 auto 32px;">Penulis ini belum menerbitkan berita apa pun.</p>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
