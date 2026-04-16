<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper" style="padding-top: var(--header-height); background-color: var(--bg-surface);">

    <!-- Header Section -->
    <section class="page-header" style="background-color: var(--primary); color: white; padding: 60px 0;">
        <div class="container" style="text-align: center;">
            <p class="page-subtitle" style="color: var(--secondary); margin-bottom: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Hasil Pencarian</p>
            <h1 class="page-title" style="color: white; margin: 0; font-size: clamp(2rem, 5vw, 3rem); font-family: var(--font-display);">
                "<?php echo get_search_query(); ?>"
            </h1>
        </div>
    </section>

    <!-- Search Results Content -->
    <section class="search-results-section" style="padding: 80px 0; background: var(--bg-main);">
        <div class="container">
            
            <?php if ( have_posts() ) : ?>

                <div class="news-grid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        
                        $post_type = get_post_type();
                        $type_label = 'Berita';
                        $type_color = 'var(--secondary)';
                        
                        if ($post_type === 'agenda') $type_label = 'Agenda';
                        elseif ($post_type === 'pengumuman') $type_label = 'Pengumuman';
                        elseif ($post_type === 'dokumen') $type_label = 'Dokumen';
                        elseif ($post_type === 'struktur') $type_label = 'Struktur';
                        elseif ($post_type === 'page') $type_label = 'Halaman';
                    ?>
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
                                <div class="news-categories" style="position: absolute; top: 16px; left: 16px;">
                                    <span class="news-category-badge" style="position: static; background: <?php echo $type_color; ?>;"><?php echo esc_html($type_label); ?></span>
                                </div>
                            </div>

                            <div class="news-content">
                                <div class="news-meta">
                                    <div class="meta-item">
                                        <svg class="meta-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                                
                                <h3 class="news-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                            </div>
                        </article>

                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination text-center" style="margin-top: 60px; justify-content: center;">
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
                <div style="text-align: center; padding: 100px 40px; background: white; border-radius: 20px; border: 1px dashed var(--border-light);">
                    <div style="width: 80px; height: 80px; background: var(--bg-main); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <h2 style="font-family: var(--font-display); font-size: 1.75rem; color: var(--text-main); margin: 0 0 12px 0;">Pencarian Tidak Ditemukan</h2>
                    <p style="color: var(--text-muted); font-size: 1rem; max-width: 460px; margin: 0 auto;">Kami tidak dapat menemukan hasil yang cocok untuk "<?php echo get_search_query(); ?>". Coba periksa ejaan atau gunakan kata kunci lain.</p>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
