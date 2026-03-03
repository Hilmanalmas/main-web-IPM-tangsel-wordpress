<?php get_header(); ?>

<!-- Main Content Area -->
<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="hero-wrapper">
        <!-- Background Image & Overlay -->
        <div class="hero-bg">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/asset/Kota Tangsel.png" alt="Kota Tangerang Selatan">
        </div>
        <div class="hero-overlay"></div>
        
        <!-- Hero Content (Text) -->
        <div class="hero-content">
            <div class="container hero-text-box">
                <span class="hero-greeting">Selamat Datang</span>
                <h1 class="hero-title">PELAJAR ANGGREK</h1>
                <p class="hero-subtitle">Mewujudkan Pelajar Tangerang Selatan yang Berkemajuan, Kolaboratif, dan Berkarakter Utama di Era Digital.</p>
            </div>
        </div>

        <!-- Overlapping Feature Cards -->
        <div class="hero-features">
            <div class="features-grid">
                
                <!-- Profile Card -->
                <a href="#" class="feature-card fc-profile">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/asset/IMG_8529.JPG" alt="Profile" class="feature-bg">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <h3 class="feature-title">Profile</h3>
                    </div>
                </a>

                <!-- News Card -->
                <a href="#news-section" class="feature-card fc-news">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/asset/Kolase Cover Berita IPM.png" alt="News" class="feature-bg">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="feature-title">News</h3>
                    </div>
                </a>

                <!-- Event Card -->
                <a href="#" class="feature-card fc-event">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/asset/IMG_8649.JPG" alt="Event" class="feature-bg">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <h3 class="feature-title">Event</h3>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- News Feed Section -->
    <section id="news-section" class="news-section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Latest Updates</span>
                <h2 class="section-title">Berita Terbaru</h2>
            </div>
            
            <div class="news-grid">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                            
                            <!-- Thumbnail -->
                            <div class="news-image-wrapper">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium_large', array('class' => 'news-image')); ?>
                                    <?php else : ?>
                                        <!-- Fallback background -->
                                        <div class="news-image" style="background: linear-gradient(135deg, var(--bg-main) 0%, var(--border-light) 100%); display:flex; align-items:center; justify-content:center;">
                                            <svg width="48" height="48" fill="none" stroke="var(--text-muted)" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v4M21 15l-4-4m4 4l-4 4"></path></svg>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <!-- Category Badge (optional) -->
                                <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<span class="news-category-badge">' . esc_html( $categories[0]->name ) . '</span>';
                                    }
                                ?>
                            </div>
                            
                            <!-- Content -->
                            <div class="news-content">
                                <!-- Meta (Date & Author) -->
                                <div class="news-meta">
                                    <div class="meta-item">
                                        <svg class="meta-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="meta-item">
                                        <svg class="meta-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <span><?php the_author(); ?></span>
                                    </div>
                                </div>
                                
                                <h3 class="news-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="news-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="news-read-more">
                                    Baca Selengkapnya
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!-- No Posts Found -->
                    <div style="grid-column: 1 / -1; text-align:center; padding: 40px; background:var(--bg-surface); border-radius: var(--radius-md);">
                        <p><?php _e( 'Belum ada berita yang dipublish.', 'ipm-tangsel-news' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Prev', 'ipm-tangsel-news' ),
                    'next_text' => __( 'Next &raquo;', 'ipm-tangsel-news' ),
                ) );
                ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
