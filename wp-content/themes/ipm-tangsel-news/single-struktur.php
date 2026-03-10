<?php
/**
 * The template for displaying a single organizational structure period.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper" style="padding-top: var(--header-height); background-color: var(--bg-surface);">

    <!-- Header Section -->
    <section class="struktur-header" style="padding: 80px 0 60px; background: var(--bg-main); border-bottom: 1px solid var(--border-light);">
        <div class="container" style="max-width: 900px; text-align: center;">
            
            <?php while ( have_posts() ) : the_post(); 
                $nama_ketua = get_post_meta(get_the_ID(), '_struktur_nama_ketua', true);
                $periode = get_post_meta(get_the_ID(), '_struktur_periode', true);
            ?>

                <div class="struktur-avatar" style="width: 160px; height: 160px; border-radius: 50%; overflow: hidden; margin: 0 auto 32px; box-shadow: 0 12px 24px rgba(0,0,0,0.1); border: 8px solid white;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                    <?php else : ?>
                        <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center;">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; color: var(--secondary); margin-bottom: 12px; text-transform: uppercase;">
                    Ketua Umum IPM Tangsel
                </div>

                <h1 class="page-title" style="font-size: clamp(2.5rem, 5vw, 4rem); font-family: var(--font-display); font-weight: 800; color: var(--primary); margin: 0 0 8px 0; line-height: 1.1; letter-spacing: -0.02em;">
                    <?php echo esc_html( $nama_ketua ? $nama_ketua : get_the_title() ); ?>
                </h1>
                
                <?php if ($periode): ?>
                <div style="font-family: var(--font-display); font-weight: 700; font-size: 2rem; color: var(--text-main);">
                    <?php echo esc_html($periode); ?>
                </div>
                <?php endif; ?>

        </div>
    </section>

    <!-- Post Content Area -->
    <section class="page-content-wrapper" style="padding: 60px 0 100px;">
        <div class="container" style="max-width: 900px;">
            
            <div class="struktur-content modern-content content-typography" style="background: white; padding: 48px; border-radius: 24px; box-shadow: var(--shadow-md); border: 1px solid var(--border-light);">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h2 style="font-family: var(--font-display); font-weight: 800; color: var(--primary); font-size: 2rem; margin: 0;">Susunan Pengurus Daerah</h2>
                    <div style="width: 60px; height: 4px; background: var(--secondary); margin: 16px auto 0; border-radius: 2px;"></div>
                </div>

                <?php 
                $content = get_the_content();
                $susunan_custom = get_post_meta(get_the_ID(), '_struktur_susunan_pengurus', true);

                if ( !empty($content) ) {
                    the_content(); 
                } elseif ( !empty($susunan_custom) ) {
                    echo wpautop( $susunan_custom );
                }
                ?>

                <div class="text-center" style="margin-top: 60px;">
                    <a href="<?php echo site_url('/struktur-organisasi'); ?>" style="display: inline-flex; align-items: center; gap: 8px; background: var(--bg-main); color: var(--text-main); padding: 12px 24px; border-radius: 100px; font-weight: 600; border: 1px solid var(--border-light); transition: all 0.2s;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                        Kembali ke Daftar Periode
                    </a>
                </div>
            </div>

            <?php endwhile; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
