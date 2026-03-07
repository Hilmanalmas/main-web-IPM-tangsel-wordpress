<?php
/**
 * Template Name: Struktur Organisasi
 *
 * This is the template that displays the list of organizational periods.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <!-- Page Header Solid -->
    <section class="page-header" style="background-color: var(--primary); color: white;">
        <div class="container">
            <h1 class="page-title" style="color: white;"><?php the_title(); ?></h1>
            <p class="page-subtitle" style="color: rgba(255,255,255,0.8);">Struktur Organisasi Pimpinan Daerah Ikatan Pelajar Muhammadiyah Tangerang Selatan dari masa ke masa.</p>
        </div>
    </section>

    <!-- Struktur List Section -->
    <section class="struktur-section" style="padding: 60px 0; background: var(--bg-main);">
        <div class="container">
            
            <div class="struktur-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 32px;">
                <?php 
                $struktur_args = array(
                    'post_type' => 'struktur',
                    'posts_per_page' => -1,
                    // Optionally order by custom meta 'periode' descending
                    'meta_key' => '_struktur_periode',
                    'orderby' => 'meta_value',
                    'order' => 'DESC'
                );
                $struktur_query = new WP_Query($struktur_args);

                if ( $struktur_query->have_posts() ) : ?>
                    <?php while ( $struktur_query->have_posts() ) : $struktur_query->the_post(); 
                        $nama_ketua = get_post_meta(get_the_ID(), '_struktur_nama_ketua', true);
                        $periode = get_post_meta(get_the_ID(), '_struktur_periode', true);
                    ?>
                        <div class="struktur-card" style="background: white; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-sm); border: 1px solid var(--border-light); transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; padding: 40px 24px;">
                            
                            <a href="<?php the_permalink(); ?>" style="display: block; width: 140px; height: 140px; border-radius: 50%; overflow: hidden; margin-bottom: 24px; box-shadow: 0 8px 16px rgba(0,0,0,0.1); border: 4px solid white;">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                                <?php else : ?>
                                    <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center;">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    </div>
                                <?php endif; ?>
                            </a>
                            
                            <h3 style="margin: 0 0 8px 0; font-family: var(--font-display); font-weight: 800; font-size: 1.5rem; text-align: center;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--primary); text-decoration: none;"><?php echo esc_html( $nama_ketua ? $nama_ketua : get_the_title() ); ?></a>
                            </h3>
                            
                            <?php if ($periode): ?>
                            <div style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--text-main); margin-bottom: 24px;">
                                <?php echo esc_html($periode); ?>
                            </div>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" style="display: inline-flex; align-items: center; gap: 8px; background: var(--primary); color: white; padding: 10px 24px; border-radius: 100px; font-weight: 600; font-size: 0.95rem; transition: background 0.2s;">
                                Lihat Struktur
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                            
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div style="grid-column: 1 / -1; text-align:center; padding: 60px 40px; background:white; border-radius: 16px; border: 1px solid var(--border-light);">
                        <p style="font-size: 1.1rem; color: var(--text-muted); margin: 0;">Belum ada data struktur organisasi periode mana pun.</p>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            
        </div>
    </section>

</main>

<?php get_footer(); ?>
