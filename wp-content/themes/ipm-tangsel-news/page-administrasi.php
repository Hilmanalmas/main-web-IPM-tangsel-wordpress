<?php
/**
 * Template Name: Administrasi IPM Tangsel
 *
 * This is the template that displays administration info.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <!-- Page Header Solid -->
    <section class="page-header" style="background-color: var(--text-main);">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-subtitle">Informasi Kegiatan dan Program Unggulan</p>
        </div>
    </section>

    <!-- Page Content Area -->
    <section class="page-content-wrapper">
        <div class="container container-medium">
            <?php
            while ( have_posts() ) :
                the_post();

                $content = get_the_content();
                if ( empty( $content ) ) :
            ?>
                <article class="modern-content">
                    <div class="text-center mb-10">
                        <p class="lead">IPM Tangsel selalu aktif mengadakan berbagai kegiatan kepemudaan, kajian, dan pelatihan untuk membekali pelajar dengan kemampuan yang komprehensif.</p>
                    </div>
                    
                    <div class="features-list">
                        <div class="feature-row">
                            <div class="feature-icon-lg bg-teal">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                            </div>
                            <div class="feature-text">
                                <h3>Fortasi (Forum Ta'aruf dan Orientasi)</h3>
                                <p>Program orientasi bagi pelajar baru di sekolah-sekolah Muhammadiyah untuk mengenalkan lingkungan sekolah dan organisasi IPM dengan cara yang menggembirakan.</p>
                            </div>
                        </div>

                        <div class="feature-row">
                            <div class="feature-icon-lg bg-orange">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            </div>
                            <div class="feature-text">
                                <h3>Taruna Melati</h3>
                                <p>Perkaderan formal berjenjang yang bertujuan mencetak kader-kader pimpinan IPM yang militan, memiliki integritas, dan kapasitas keilmuan yang memadai.</p>
                            </div>
                        </div>

                        <div class="feature-row">
                            <div class="feature-icon-lg bg-yellow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <div class="feature-text">
                                <h3>Kegiatan Sosial Pelajar</h3>
                                <p>Berbagai aksi sosial kemasyarakatan yang diinisiasi oleh pelajar, seperti bakti sosial, edukasi masyarakat, dan tanggap bencana.</p>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
                else:
                    echo '<article class="modern-content">';
                    the_content();
                    echo '</article>';
                endif;
            endwhile; 
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
