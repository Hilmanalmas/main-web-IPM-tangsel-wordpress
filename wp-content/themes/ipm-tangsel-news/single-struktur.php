<?php
/**
 * The template for displaying a single organizational structure period.
 * Layout: circular photos like ipm.or.id — first member large+centered, rest in a row.
 */

get_header(); ?>

<style>
/* ============================================================
   HERO: Ketua Umum
   ============================================================ */
.so-hero {
    background: var(--bg-main);
    border-bottom: 1px solid var(--border-light);
    padding: 80px 20px 50px;
    text-align: center;
}
.so-hero-avatar {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 24px;
    box-shadow: 0 12px 32px rgba(0,0,0,0.14);
    border: 5px solid white;
    background: #eee;
    display: flex;
    align-items: center;
    justify-content: center;
}
.so-hero-avatar img { width:100%; height:100%; object-fit:cover; }
.so-hero .label-badge {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--secondary);
    background: rgba(230,126,34,0.09);
    padding: 5px 18px;
    border-radius: 100px;
    margin-bottom: 16px;
}
.so-hero h1 {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: clamp(1.9rem, 5vw, 3.2rem);
    color: var(--primary);
    margin: 0 0 8px;
    line-height: 1.1;
}
.so-hero .periode {
    font-weight: 700;
    font-size: 1.6rem;
    color: var(--text-main);
}

/* ============================================================
   CONTENT AREA
   ============================================================ */
.so-content-area {
    padding: 60px 20px 100px;
    background: #f6f7f9;
}
.so-content-area .container { max-width: 960px; margin: 0 auto; }

/* ============================================================
   SECTION BLOCK (per Bidang)
   ============================================================ */
.so-section {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.07);
    border: 1px solid var(--border-light);
    margin-bottom: 28px;
}
.so-section-title {
    background: var(--primary);
    color: white;
    text-align: center;
    padding: 15px 24px;
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 1rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    margin: 0;
}
.so-members-wrap { padding: 36px 24px 32px; }

/* Featured (first / Ketua Bidang) - large centered */
.so-featured {
    display: flex;
    justify-content: center;
    margin-bottom: 32px;
}
.so-featured .so-card { width: 160px; }
.so-featured .so-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 14px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.14);
    border: 4px solid white;
    outline: 2px solid var(--border-light);
    background: #eee;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Other members - smaller row */
.so-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px 16px;
}
.so-row .so-card { width: 110px; }
.so-row .so-photo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 10px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    border: 3px solid white;
    outline: 2px solid var(--border-light);
    background: #eee;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Shared card styles */
.so-card { text-align: center; }
.so-photo img { width:100%; height:100%; object-fit:cover; }
.so-photo .no-photo svg { opacity: 0.35; }

.so-name {
    font-family: var(--font-display);
    font-weight: 700;
    font-size: 0.88rem;
    color: var(--text-main);
    margin: 0 0 4px;
    line-height: 1.3;
}
.so-featured .so-name {
    font-size: 1.05rem;
}
.so-role {
    font-size: 0.75rem;
    color: var(--text-muted, #888);
    margin: 0;
    line-height: 1.3;
}

/* Raw editor content fallback */
.so-raw-content { padding: 36px 40px; }
.so-raw-content img {
    display: block;
    width: 120px !important;
    height: 120px !important;
    object-fit: cover;
    border-radius: 50%;
    margin: 0 auto 10px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    border: 4px solid white;
    outline: 2px solid var(--border-light);
}
.so-raw-content h2 {
    background: var(--primary);
    color: white;
    text-align: center;
    padding: 12px 20px;
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 1rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    border-radius: 10px;
    margin: 32px 0 20px;
}
.so-raw-content p {
    text-align: center;
    display: inline-block;
    vertical-align: top;
    margin: 8px;
    width: 120px;
}

/* Back button */
.btn-back {
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
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    transition: all 0.2s;
}
.btn-back:hover { background: var(--bg-main); color: var(--primary); }

@media (max-width: 600px) {
    .so-featured .so-photo { width:120px; height:120px; }
    .so-featured .so-card { width:130px; }
    .so-row .so-photo { width:80px; height:80px; }
    .so-row .so-card { width:90px; }
    .so-raw-content { padding: 24px 16px; }
}
</style>

<main id="primary" class="site-main page-template-wrapper" style="padding-top: var(--header-height); background:#f6f7f9;">

<?php while ( have_posts() ) : the_post();
    $nama_ketua = get_post_meta(get_the_ID(), '_struktur_nama_ketua', true);
    $periode    = get_post_meta(get_the_ID(), '_struktur_periode', true);
    $content    = get_the_content();
    $susunan    = get_post_meta(get_the_ID(), '_struktur_susunan_pengurus', true);
?>

<!-- ===== HERO ===== -->
<section class="so-hero">
    <div class="container" style="max-width:680px; margin:0 auto;">
        <div class="so-hero-avatar">
            <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail('medium', ['style'=>'width:100%;height:100%;object-fit:cover;']);
            else : ?>
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <?php endif; ?>
        </div>
        <div class="label-badge">Ketua Umum PD IPM Tangsel</div>
        <h1><?php echo esc_html( $nama_ketua ?: get_the_title() ); ?></h1>
        <?php if ($periode): ?>
        <div class="periode"><?php echo esc_html($periode); ?></div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== SUSUNAN PENGURUS ===== -->
<section class="so-content-area">
    <div class="container">

        <?php if ( !empty($content) ) :
            /* ── Parse editor HTML ──────────────────────────────────────────
               Expected structure in the editor (tab Teks):
               <h2>BIDANG XXX</h2>
               <p><img .../><br><strong>Nama</strong><br>Jabatan</p>
               <p><img .../><br><strong>Nama</strong><br>Jabatan</p>
            ─────────────────────────────────────────────────────────────── */

            // Load content into DOMDocument for parsing
            libxml_use_internal_errors(true);
            $dom = new DOMDocument('1.0', 'UTF-8');
            $dom->loadHTML( '<?xml encoding="UTF-8"><div id="so-root">' . apply_filters('the_content', $content) . '</div>' );
            libxml_clear_errors();
            $xpath = new DOMXPath($dom);

            $root = $xpath->query('//div[@id="so-root"]')->item(0);
            if ( $root ) :
                // Walk top-level children, group by h2
                $sections = [];
                $current  = ['title' => '', 'members' => []];

                foreach ( $root->childNodes as $node ) {
                    if ( $node->nodeType !== XML_ELEMENT_NODE ) continue;
                    $tag = strtolower($node->tagName);

                    if ( in_array($tag, ['h2','h3']) ) {
                        if ( $current['title'] !== '' || !empty($current['members']) ) {
                            $sections[] = $current;
                        }
                        $current = ['title' => trim($node->textContent), 'members' => []];
                    } elseif ( $tag === 'p' ) {
                        // Extract img, name, role from <p>
                        $img_nodes = $node->getElementsByTagName('img');
                        $img_html  = '';
                        if ( $img_nodes->length > 0 ) {
                            $img_html = $dom->saveHTML($img_nodes->item(0));
                        }

                        // Get all text nodes / <strong> content
                        $texts = [];
                        foreach ( $node->childNodes as $child ) {
                            if ( $child->nodeType === XML_TEXT_NODE ) {
                                $t = trim($child->textContent);
                                if ($t) $texts[] = $t;
                            } elseif ( $child->nodeType === XML_ELEMENT_NODE ) {
                                $t = trim($child->textContent);
                                if ($t) $texts[] = $t;
                            }
                        }
                        $texts = array_values( array_filter($texts, fn($t) => $t !== '') );

                        $name = !empty($texts[0]) ? $texts[0] : '';
                        $role = !empty($texts[1]) ? $texts[1] : '';

                        if ( $img_html || $name ) {
                            $current['members'][] = ['img' => $img_html, 'name' => $name, 'role' => $role];
                        }
                    }
                }
                if ( $current['title'] !== '' || !empty($current['members']) ) {
                    $sections[] = $current;
                }

                // ── Render sections ──────────────────────────────────────
                foreach ( $sections as $section ) : ?>
                <div class="so-section">
                    <?php if ($section['title']): ?>
                    <h2 class="so-section-title"><?php echo esc_html($section['title']); ?></h2>
                    <?php endif; ?>
                    <div class="so-members-wrap">

                        <?php
                        $featured  = !empty($section['members']) ? [$section['members'][0]] : [];
                        $rest      = count($section['members']) > 1 ? array_slice($section['members'], 1) : [];

                        // Render featured member (large, centered)
                        if ($featured): ?>
                        <div class="so-featured">
                            <?php foreach ($featured as $m): ?>
                            <div class="so-card">
                                <div class="so-photo">
                                    <?php if ($m['img']): ?>
                                        <?php echo $m['img']; // already escaped via DOM ?>
                                    <?php else: ?>
                                        <div class="no-photo"><svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($m['name']): ?>
                                <p class="so-name"><?php echo esc_html($m['name']); ?></p>
                                <?php endif; ?>
                                <?php if ($m['role']): ?>
                                <p class="so-role"><?php echo esc_html($m['role']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($rest): ?>
                        <div class="so-row">
                            <?php foreach ($rest as $m): ?>
                            <div class="so-card">
                                <div class="so-photo">
                                    <?php if ($m['img']): ?>
                                        <?php echo $m['img']; ?>
                                    <?php else: ?>
                                        <div class="no-photo"><svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($m['name']): ?>
                                <p class="so-name"><?php echo esc_html($m['name']); ?></p>
                                <?php endif; ?>
                                <?php if ($m['role']): ?>
                                <p class="so-role"><?php echo esc_html($m['role']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                    </div><!-- .so-members-wrap -->
                </div><!-- .so-section -->
                <?php endforeach; ?>

            <?php else: ?>
                <!-- Fallback: render raw editor content with CSS styling -->
                <div class="so-section"><div class="so-raw-content"><?php the_content(); ?></div></div>
            <?php endif; ?>

        <?php elseif ( !empty($susunan) ) : ?>
            <!-- Custom textarea meta content -->
            <div class="so-section">
                <h2 class="so-section-title">Susunan Pengurus Daerah</h2>
                <div class="so-raw-content"><?php echo wpautop($susunan); ?></div>
            </div>

        <?php else : ?>
            <div class="so-section" style="padding:60px;text-align:center;">
                <p style="color:var(--text-muted);font-size:1rem;margin:0;">Belum ada data susunan pengurus untuk periode ini.</p>
            </div>
        <?php endif; ?>

        <!-- Back Button -->
        <div style="text-align:center; margin-top:48px;">
            <a href="<?php echo esc_url(site_url('/struktur-organisasi')); ?>" class="btn-back">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Kembali ke Daftar Periode
            </a>
        </div>

    </div><!-- .container -->
</section>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>
