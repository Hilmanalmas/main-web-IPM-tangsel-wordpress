<?php
/**
 * Template Name: Document Download Page
 *
 * A template for displaying a list of downloadable documents with icons and buttons.
 *
 * @package IPM_Tangsel_News
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main page-download">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header" style="background-image: linear-gradient(rgba(0, 92, 58, 0.9), rgba(15, 23, 42, 0.9)), url('<?php echo get_template_directory_uri(); ?>/asset/gedung-dakwah.jpg');">
                    <div class="header-content container">
                        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
                        <div class="page-subtitle">Pusat Unduhan Dokumen Resmi IPM Tangsel</div>
                    </div>
                </header>

                <div class="page-content container">
                    <!-- Intro Text -->
                    <div class="download-intro">
                        <?php the_content(); ?>
                    </div>

                    <!-- Example Hardcoded Download List (Can be replaced with dynamic ACF/Custom Posts later) -->
                    <div class="document-list">
                        
                        <!-- Document Item 1 -->
                        <div class="doc-card">
                            <div class="doc-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div class="doc-info">
                                <h3 class="doc-title">Pedoman Organisasi IPM (Revisi Terbaru)</h3>
                                <p class="doc-desc">Berisi panduan lengkap tentang struktur, fungsi, dan aturan main dalam Ikatan Pelajar Muhammadiyah.</p>
                                <span class="doc-meta">PDF • 2.5 MB • Diperbarui: Jan 2026</span>
                            </div>
                            <div class="doc-action">
                                <a href="#" class="btn-download" download>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    Download
                                </a>
                            </div>
                        </div>

                        <!-- Document Item 2 -->
                        <div class="doc-card">
                            <div class="doc-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div class="doc-info">
                                <h3 class="doc-title">Sistem Perkaderan IPM (SPI)</h3>
                                <p class="doc-desc">Dokumen resmi rancangan kurikulum perkaderan dari tingkat Taruna Melati hingga paripurna.</p>
                                <span class="doc-meta">PDF • 3.1 MB • Diperbarui: Des 2025</span>
                            </div>
                            <div class="doc-action">
                                <a href="#" class="btn-download" download>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    Download
                                </a>
                            </div>
                        </div>
                        
                        <!-- Document Item 3 -->
                        <div class="doc-card">
                            <div class="doc-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div class="doc-info">
                                <h3 class="doc-title">Materi Dasar Ke-IPM-an</h3>
                                <p class="doc-desc">Kumpulan slide presentasi (.pptx) untuk pemateri pelatihan kader dasar.</p>
                                <span class="doc-meta">PPTX • 5.0 MB • Diperbarui: Feb 2026</span>
                            </div>
                            <div class="doc-action">
                                <a href="#" class="btn-download" download>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    Download
                                </a>
                            </div>
                        </div>

                    </div> <!-- .document-list -->
                    
                    <div class="download-instruction" style="margin-top: 40px; padding: 20px; background: rgba(232, 103, 41, 0.1); border-left: 4px solid var(--primary); border-radius: 4px;">
                        <h4 style="margin-top:0; color: var(--primary);">Admin Note:</h4>
                        <p style="margin-bottom:0; font-size: 14px;">Untuk mengganti file download, edit halaman ini (<strong>page-download.php</strong>) melalui File Manager atau Theme File Editor, dan ganti atribut <code>href="#"</code> pada tombol dengan link file PDF/Word/PPT yang telah Anda upload ke Media Library WordPress.</p>
                    </div>

                </div><!-- .page-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
