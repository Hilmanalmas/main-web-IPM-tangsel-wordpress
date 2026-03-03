<?php
/**
 * Template Name: Direktori
 *
 * This is the template that displays the Direktori page.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <!-- Page Header Solid -->
    <section class="page-header" style="background-color: var(--primary);">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-subtitle">Daftar Pimpinan dan Cabang se-Tangerang Selatan</p>
        </div>
    </section>

    <!-- Page Content Area -->
    <section class="page-content-wrapper bg-gray">
        <div class="container">
            <?php
            while ( have_posts() ) :
                the_post();
                
                $content = get_the_content();
                if ( empty($content) ) :
            ?>
                <!-- Placeholder if page is empty -->
                <div class="modern-content text-center mb-10">
                    <p class="lead">Berikut adalah direktori pimpinan cabang dan ranting Ikatan Pelajar Muhammadiyah se-Tangerang Selatan.</p>
                </div>

                <div class="directory-grid">
                    <!-- Dummy Card 1 -->
                    <div class="directory-card">
                        <div class="directory-icon">
                            <span class="initials">PC</span>
                        </div>
                        <h3 class="directory-title">PC IPM Ciputat</h3>
                        <p class="directory-desc">Pimpinan Cabang IPM Ciputat</p>
                        <a href="#" class="btn-outline-primary btn-sm mt-4">Lihat Detail</a>
                    </div>
                    
                    <!-- Dummy Card 2 -->
                    <div class="directory-card">
                        <div class="directory-icon">
                            <span class="initials">PC</span>
                        </div>
                        <h3 class="directory-title">PC IPM Pamulang</h3>
                        <p class="directory-desc">Pimpinan Cabang IPM Pamulang</p>
                        <a href="#" class="btn-outline-primary btn-sm mt-4">Lihat Detail</a>
                    </div>
                    
                    <!-- Dummy Card 3 -->
                    <div class="directory-card">
                        <div class="directory-icon">
                            <span class="initials">PR</span>
                        </div>
                        <h3 class="directory-title">PR IPM SMA Muh 8</h3>
                        <p class="directory-desc">Pimpinan Ranting SMA Muhammadiyah 8</p>
                        <a href="#" class="btn-outline-primary btn-sm mt-4">Lihat Detail</a>
                    </div>

                    <!-- Dummy Card 4 -->
                    <div class="directory-card">
                        <div class="directory-icon">
                            <span class="initials">PR</span>
                        </div>
                        <h3 class="directory-title">PR IPM SMK Muh 1</h3>
                        <p class="directory-desc">Pimpinan Ranting SMK Muhammadiyah 1</p>
                        <a href="#" class="btn-outline-primary btn-sm mt-4">Lihat Detail</a>
                    </div>
                </div>

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
