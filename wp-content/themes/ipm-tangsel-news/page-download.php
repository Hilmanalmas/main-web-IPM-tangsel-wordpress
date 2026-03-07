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
                <?php
                $header_style = "background-image: linear-gradient(rgba(0, 31, 63, 0.6), rgba(15, 23, 42, 0.6)), url('" . get_template_directory_uri() . "/asset/gedung-dakwah.jpg');";
                if ( has_post_thumbnail() ) {
                    $header_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    $header_style = "background-image: linear-gradient(rgba(0, 31, 63, 0.6), rgba(15, 23, 42, 0.6)), url('" . esc_url( $header_image_url ) . "');";
                }
                ?>
                <header class="page-header" style="<?php echo $header_style; ?>">
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

                    <!-- Dynamic Download List from Dokumen Custom Post Type -->
                    <div class="document-list">
                        <?php
                        $dokumen_args = array(
                            'post_type'      => 'dokumen',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                        );
                        $dokumen_query = new WP_Query($dokumen_args);

                        if ($dokumen_query->have_posts()) :
                            while ($dokumen_query->have_posts()) : $dokumen_query->the_post();
                                $file_link = get_post_meta(get_the_ID(), '_dokumen_link', true);
                                $file_type = get_post_meta(get_the_ID(), '_dokumen_type', true);
                                $file_size = get_post_meta(get_the_ID(), '_dokumen_size', true);
                                
                                $file_link = !empty($file_link) ? esc_url($file_link) : '#';
                                $file_type = !empty($file_type) ? esc_html($file_type) : '-';
                                $file_size = !empty($file_size) ? esc_html($file_size) : '-';
                                $updated_date = get_the_modified_date('M Y');
                        ?>
                            <div class="doc-card">
                                <div class="doc-icon">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'doc-cover-img' ) ); ?>
                                    <?php else : ?>
                                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <div class="doc-info">
                                    <h3 class="doc-title"><?php the_title(); ?></h3>
                                    <div class="doc-desc" style="margin-bottom: 8px; font-size: 15px; color: var(--text-muted);"><?php echo wp_strip_all_tags(get_the_content()); ?></div>
                                    <span class="doc-meta"><?php echo $file_type; ?> &bull; <?php echo $file_size; ?> &bull; Diperbarui: <?php echo $updated_date; ?></span>
                                </div>
                                <div class="doc-action">
                                    <a href="<?php echo $file_link; ?>" class="btn-download" target="_blank" rel="noopener noreferrer" download>
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        Download
                                    </a>
                                </div>
                            </div>
                        <?php 
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>Belum ada dokumen yang diunggah.</p>';
                        endif;
                        ?>

                    </div> <!-- .document-list -->
                    
                    <div class="download-instruction" style="margin-top: 40px; padding: 20px; background: rgba(0, 31, 63, 0.1); border-left: 4px solid var(--primary); border-radius: 4px;">
                        <h4 style="margin-top:0; color: var(--primary);">Petunjuk Admin:</h4>
                        <p style="margin-bottom:0; font-size: 14px;">Halaman ini sekarang terhubung otomatis dengan menu <strong>"Dokumen"</strong> di sidebar Admin WordPress. Untuk mengunggah file baru, masuk ke menu <strong>Dokumen &gt; Tambah Baru</strong>, isi judul deskripsi, serta detail <strong>Link URL File</strong> dan tipe di konfigurasi bawah (Anda wajib mengupload file fisik ke Media Library terlebih dahulu dan menyalin Link URL-nya). Dokumen baru akan langsung bermunculan di atas.</p>
                    </div>

                </div><!-- .page-content -->
            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
