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
        <div class="container" style="max-width: 900px;">
            
            <?php if ( have_posts() ) : ?>

                <div class="search-results-list" style="display: flex; flex-direction: column; gap: 24px;">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        
                        $post_type = get_post_type();
                        $type_label = 'Berita';
                        $type_color = 'var(--primary)';
                        $icon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>';

                        if ($post_type === 'agenda') {
                            $type_label = 'Agenda';
                            $type_color = '#eab308'; // Yellow
                            $icon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>';
                        } elseif ($post_type === 'pengumuman') {
                            $type_label = 'Pengumuman';
                            $type_color = '#ef4444'; // Red
                            $icon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>';
                        } elseif ($post_type === 'dokumen') {
                            $type_label = 'Dokumen';
                            $type_color = '#10b981'; // Green
                            $icon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>';
                        } elseif ($post_type === 'struktur') {
                            $type_label = 'Struktur Pengurus';
                            $type_color = 'var(--secondary)'; // Orange
                            $icon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
                        } elseif ($post_type === 'page') {
                            $type_label = 'Laman';
                            $type_color = 'var(--text-muted)'; // Gray
                            $icon = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><polyline points="3 9 21 9"></polyline><polyline points="9 21 9 9"></polyline></svg>';
                        }
                    ?>
                        <article id="post-<?php the_ID(); ?>" class="search-result-item" style="background: white; border-radius: 12px; padding: 24px; box-shadow: var(--shadow-sm); border: 1px solid var(--border-light); transition: all 0.2s; display: flex; flex-direction: column; gap: 12px;">
                            
                            <!-- Metadata Type Tag -->
                            <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; font-weight: 700; color: <?php echo $type_color; ?>; text-transform: uppercase;">
                                <?php echo $icon; ?>
                                <?php echo esc_html($type_label); ?>
                            </div>

                            <!-- Title -->
                            <h2 style="margin: 0; font-family: var(--font-display); font-weight: 700; font-size: 1.5rem; line-height: 1.3;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--text-main); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--secondary)'" onmouseout="this.style.color='var(--text-main)'">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <div style="color: var(--text-muted); font-size: 1rem; line-height: 1.6;">
                                <?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?>
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
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--border-light)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 24px;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <h2 style="font-family: var(--font-display); font-size: 2rem; color: var(--text-main); margin: 0 0 16px 0;">Tidak Ada Hasil</h2>
                    <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 500px; margin: 0 auto 32px;">Maaf, kami tidak dapat menemukan apa pun yang cocok dengan istilah pencarian Anda. Silakan coba lagi dengan beberapa kata kunci yang berbeda.</p>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
