<?php
/**
 * The template for displaying a single organizational structure period.
 * Layout: card grid with circular photos, orange names, gray titles.
 */

get_header(); ?>

<style>
/* ===================================
   Struktur Page Styles
   =================================== */
.struktur-hero {
    background: var(--bg-main);
    border-bottom: 1px solid var(--border-light);
    padding: 80px 0 50px;
    text-align: center;
}
.struktur-hero .periode-label {
    display: inline-block;
    font-family: var(--font-body);
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--secondary);
    background: rgba(var(--secondary-rgb, 230,126,34), 0.08);
    padding: 6px 20px;
    border-radius: 100px;
    margin-bottom: 20px;
}
.struktur-hero h1 {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: clamp(2rem, 5vw, 3.5rem);
    color: var(--primary);
    margin: 0 0 8px 0;
    line-height: 1.1;
}
.struktur-hero .periode-tahun {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 1.8rem;
    color: var(--text-main);
    margin-bottom: 32px;
}
.struktur-hero-avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 28px;
    box-shadow: 0 12px 32px rgba(0,0,0,0.12);
    border: 6px solid white;
    background: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.struktur-hero-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ===================================
   Susunan Pengurus - Card Grid
   =================================== */
.struktur-content-area {
    padding: 60px 0 100px;
    background: var(--bg-surface, #f7f7f7);
}
.struktur-section-wrap {
    background: white;
    border-radius: 24px;
    box-shadow: var(--shadow-md, 0 4px 24px rgba(0,0,0,0.08));
    border: 1px solid var(--border-light);
    overflow: hidden;
    margin-bottom: 32px;
}
.struktur-bidang-header {
    background: var(--primary);
    color: white;
    text-align: center;
    padding: 18px 32px;
}
.struktur-bidang-header h2 {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 1.15rem;
    letter-spacing: 0.12em;
    color: white;
    margin: 0;
    text-transform: uppercase;
}

/* Member card grid */
.struktur-member-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 28px 20px;
    padding: 40px 32px;
}
.struktur-member-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 140px;
    text-align: center;
}
.struktur-member-photo {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    border: 4px solid white;
    outline: 2px solid var(--border-light);
    background: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
    flex-shrink: 0;
}
.struktur-member-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.struktur-member-photo .photo-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #ccc;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    gap: 4px;
}
.struktur-member-name {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 0.92rem;
    color: var(--secondary);
    margin: 0 0 4px 0;
    line-height: 1.3;
}
.struktur-member-role {
    font-family: var(--font-body);
    font-size: 0.78rem;
    color: var(--text-muted, #888);
    margin: 0;
    line-height: 1.3;
}

/* Legacy content (the_content) styling */
.struktur-legacy-content {
    padding: 40px 48px;
}
.struktur-legacy-content h2,
.struktur-legacy-content h3 {
    font-family: var(--font-display);
    font-weight: 800;
    color: var(--secondary);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    text-align: center;
    margin: 40px 0 20px;
}
.struktur-legacy-content img {
    width: 120px !important;
    height: 120px !important;
    object-fit: cover;
    border-radius: 50%;
    display: block;
    margin: 0 auto 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    border: 4px solid white;
    outline: 2px solid var(--border-light);
}
.struktur-legacy-content p {
    text-align: center;
    font-weight: 600;
    color: var(--secondary);
    margin: 0 0 4px;
}

/* Back button */
.btn-back-periode {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: white;
    color: var(--text-main);
    padding: 12px 24px;
    border-radius: 100px;
    font-weight: 600;
    font-size: 0.9rem;
    border: 1px solid var(--border-light);
    text-decoration: none;
    box-shadow: var(--shadow-sm);
    transition: all 0.2s;
}
.btn-back-periode:hover {
    background: var(--bg-main);
    color: var(--primary);
    border-color: var(--primary);
}

@media (max-width: 600px) {
    .struktur-member-grid { gap: 20px 12px; padding: 28px 16px; }
    .struktur-member-card { width: 105px; }
    .struktur-member-photo { width: 90px; height: 90px; }
    .struktur-legacy-content { padding: 28px 20px; }
}
</style>

<main id="primary" class="site-main page-template-wrapper" style="padding-top: var(--header-height); background-color: var(--bg-surface, #f7f7f7);">

    <?php while ( have_posts() ) : the_post();
        $nama_ketua  = get_post_meta(get_the_ID(), '_struktur_nama_ketua', true);
        $periode     = get_post_meta(get_the_ID(), '_struktur_periode', true);
        $susunan_raw = get_post_meta(get_the_ID(), '_struktur_susunan_pengurus', true);
        $content     = get_the_content();
    ?>

    <!-- ===== HERO: Ketua Umum ===== -->
    <section class="struktur-hero">
        <div class="container" style="max-width: 700px; margin: 0 auto; padding: 0 20px;">

            <div class="struktur-hero-avatar">
                <?php if ( has_post_thumbnail() ) :
                    the_post_thumbnail('medium', array('style' => 'width:100%;height:100%;object-fit:cover;'));
                else : ?>
                    <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <?php endif; ?>
            </div>

            <div class="periode-label">Ketua Umum IPM Tangsel</div>

            <h1><?php echo esc_html( $nama_ketua ?: get_the_title() ); ?></h1>

            <?php if ($periode): ?>
            <div class="periode-tahun"><?php echo esc_html($periode); ?></div>
            <?php endif; ?>

        </div>
    </section>

    <!-- ===== SUSUNAN PENGURUS ===== -->
    <section class="struktur-content-area">
        <div class="container" style="max-width: 960px; margin: 0 auto; padding: 0 20px;">

            <?php if ( !empty($content) ) :
                // --- Mode A: Konten dari WordPress Editor (the_content) ---
                ?>
                <div class="struktur-section-wrap">
                    <div class="struktur-bidang-header">
                        <h2>Susunan Pengurus Daerah</h2>
                    </div>
                    <div class="struktur-legacy-content">
                        <?php the_content(); ?>
                    </div>
                </div>

            <?php elseif ( !empty($susunan_raw) ) :
                // --- Mode B: Konten dari Custom Meta Field (textarea) ---
                // Parsing format: NAMA BIDANG\nFoto:[url]\nNama: ...\nJabatan: ...
                $lines   = preg_split('/\r\n|\r|\n/', $susunan_raw);
                $sections = [];
                $current_section = 'Susunan Pengurus';
                $current_members = [];

                foreach ($lines as $line) {
                    $line = trim($line);
                    if (empty($line)) continue;

                    // Detect section heading (ALL CAPS or starts with **)
                    if (preg_match('/^[A-Z\s]{5,}$/', $line) || preg_match('/^\*\*(.+)\*\*$/', $line, $m)) {
                        if (!empty($current_members)) {
                            $sections[] = ['title' => $current_section, 'members' => $current_members];
                            $current_members = [];
                        }
                        $current_section = isset($m[1]) ? $m[1] : $line;
                    } else {
                        // Try to detect name and role patterns
                        $current_members[] = ['text' => $line];
                    }
                }
                if (!empty($current_members)) {
                    $sections[] = ['title' => $current_section, 'members' => $current_members];
                }

                foreach ($sections as $section): ?>
                <div class="struktur-section-wrap">
                    <div class="struktur-bidang-header">
                        <h2><?php echo esc_html($section['title']); ?></h2>
                    </div>
                    <div style="padding: 32px 40px; text-align: center;">
                        <?php echo wpautop(implode("\n", array_column($section['members'], 'text'))); ?>
                    </div>
                </div>
                <?php endforeach; ?>

            <?php else : ?>
                <div class="struktur-section-wrap" style="padding: 60px; text-align: center;">
                    <p style="color: var(--text-muted); font-size: 1rem;">Belum ada data susunan pengurus untuk periode ini.</p>
                </div>
            <?php endif; ?>

            <!-- Back button -->
            <div style="text-align: center; margin-top: 48px;">
                <a href="<?php echo esc_url(site_url('/struktur-organisasi')); ?>" class="btn-back-periode">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                    Kembali ke Daftar Periode
                </a>
            </div>

        </div>
    </section>

    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
