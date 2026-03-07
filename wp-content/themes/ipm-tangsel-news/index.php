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
                <a href="<?php echo site_url('/profil'); ?>" class="feature-card fc-profile">
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
                        <span style="font-size: 13px; opacity: 0.9; margin-top: 4px; display: block; font-weight: 500;">Menuju Profil IPM Tangsel</span>
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
                        <span style="font-size: 13px; opacity: 0.9; margin-top: 4px; display: block; font-weight: 500;">Menuju Berita Terbaru</span>
                    </div>
                </a>

                <!-- Event Card -->
                <a href="<?php echo site_url('/informasi-agenda'); ?>" class="feature-card fc-event">
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
                        <h3 class="feature-title">Agenda & Informasi</h3>
                        <span style="font-size: 13px; opacity: 0.9; margin-top: 4px; display: block; font-weight: 500;">Menuju Agenda & Informasi</span>
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
                                <div class="news-categories" style="position: absolute; top: 16px; left: 16px; display: flex; flex-wrap: wrap; gap: 8px;">
                                <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        foreach( $categories as $cat ) {
                                            echo '<span class="news-category-badge" style="position: static; background: var(--secondary);">' . esc_html( $cat->name ) . '</span>';
                                        }
                                    }
                                    $tags = get_the_tags();
                                    if ( ! empty( $tags ) ) {
                                        foreach( $tags as $t ) {
                                            echo '<span class="news-category-badge" style="position: static; background: var(--secondary);">' . esc_html( $t->name ) . '</span>';
                                        }
                                    }
                                ?>
                                </div>
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
            
            <!-- Pagination -> Button Berita Lainnya -->
            <div class="text-center" style="margin-top: 40px; text-align: center;">
                <a href="<?php echo site_url('/berita'); ?>" class="btn-more-news" style="display: inline-flex; align-items: center; justify-content: center; background: var(--secondary); color: white; padding: 12px 32px; border-radius: 8px; font-weight: 600; font-size: 16px; transition: all 0.2s ease;">
                    Berita Lainnya
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
                </a>
            </div>

        </div>
    </section>

    <!-- Announcements & Agenda Section -->
    <section class="info-agenda-section" style="padding: 100px 0; background-color: var(--primary);">
        <div class="container">
            <div class="info-agenda-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px;">
                
                <!-- Pengumuman Column -->
                <div class="info-col">
                    <div class="col-header" style="margin-bottom: 32px; display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <span style="display: inline-block; width: 40px; height: 3px; background: var(--secondary); margin-bottom: 8px;"></span>
                            <h2 class="col-title" style="color: var(--bg-surface); font-size: 24px; text-transform: uppercase; font-family: var(--font-display); font-weight: 800; margin: 0;">PENGUMUMAN</h2>
                        </div>
                        <a href="<?php echo get_post_type_archive_link('pengumuman'); ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 1px solid var(--secondary); border-radius: 4px; color: var(--secondary); transition: all 0.2s;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>
                    </div>
                    
                    <div class="info-list">
                        <?php
                        $pengumuman_query = new WP_Query(array('post_type' => 'pengumuman', 'posts_per_page' => 3));
                        if ($pengumuman_query->have_posts()) :
                            while ($pengumuman_query->have_posts()) : $pengumuman_query->the_post();
                        ?>
                                <div class="info-item" style="display: flex; gap: 16px; margin-bottom: 24px; align-items: flex-start;">
                                    <div class="info-bullet" style="color: var(--secondary); margin-top: 4px;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="8"></circle></svg>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-date" style="color: var(--accent); font-weight: 700; font-size: 14px; margin-bottom: 4px;"><?php echo get_the_date('F j, Y'); ?></div>
                                        <h3 class="info-heading" style="color: var(--bg-surface); font-size: 18px; margin: 0; line-height: 1.4; font-weight: 700;">
                                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a>
                                        </h3>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p style="color: var(--text-main);">Belum ada pengumuman pubik yang diunggah.</p>';
                        endif;
                        ?>
                    </div>
                </div>
                
                <!-- Agenda Column -->
                <div class="agenda-col">
                    <div class="col-header" style="margin-bottom: 32px; display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <span style="display: inline-block; width: 40px; height: 3px; background: var(--secondary); margin-bottom: 8px;"></span>
                            <h2 class="col-title" style="color: var(--secondary); font-size: 24px; text-transform: uppercase; font-family: var(--font-display); font-weight: 800; margin: 0;">AGENDA</h2>
                        </div>
                        <a href="<?php echo get_post_type_archive_link('agenda'); ?>" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border: 1px solid var(--secondary); border-radius: 4px; color: var(--secondary); transition: all 0.2s;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>
                    </div>
                    
                    <div class="agenda-list" style="display: flex; flex-direction: column; gap: 20px;">
                        <?php
                        $agenda_query = new WP_Query(array('post_type' => 'agenda', 'posts_per_page' => 3));
                        if ($agenda_query->have_posts()) :
                            while ($agenda_query->have_posts()) : $agenda_query->the_post();
                                $agenda_date = get_post_meta(get_the_ID(), '_agenda_date', true);
                                $agenda_time = get_post_meta(get_the_ID(), '_agenda_time', true);
                                $agenda_loc  = get_post_meta(get_the_ID(), '_agenda_location', true);

                                $time_timestamp = strtotime($agenda_date);
                                if ($time_timestamp) {
                                    $month_str = date_i18n('M', $time_timestamp);
                                    $day_str = date_i18n('d', $time_timestamp);
                                } else {
                                    $parts = explode(' ', $agenda_date);
                                    $day_str = isset($parts[0]) && !empty($parts[0]) ? $parts[0] : '-';
                                    $month_str = isset($parts[1]) ? substr($parts[1], 0, 3) : '-';
                                    if (empty($agenda_date)) {
                                        $month_str = 'TBA'; $day_str = '-';
                                    }
                                }
                        ?>
                                <div class="agenda-item" style="display: flex; gap: 20px; align-items: flex-start;">
                                    <div class="agenda-date-box" style="background-color: var(--primary); color: #fff; width: 70px; text-align: center; border-radius: 8px; padding: 12px 0; flex-shrink: 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid rgba(255,255,255,0.1);">
                                        <div class="agenda-month" style="font-size: 14px; font-weight: 600; text-transform: uppercase; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 4px; margin-bottom: 4px; color: var(--accent);"><?php echo esc_html($month_str); ?></div>
                                        <div class="agenda-day" style="font-size: 24px; font-weight: 800; line-height: 1;"><?php echo esc_html($day_str); ?></div>
                                    </div>
                                    <div class="agenda-details" style="padding-top: 4px;">
                                        <h3 class="agenda-heading" style="color: var(--bg-surface); font-size: 18px; margin: 0 0 8px 0; font-weight: 700;">
                                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="agenda-meta" style="color: var(--secondary-light); font-size: 14px; font-weight: 600; display: flex; flex-wrap: wrap; gap: 16px;">
                                            <?php if ($agenda_time) : ?>
                                                <span style="display: flex; align-items: center; gap: 6px; color: var(--secondary);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> <?php echo esc_html($agenda_time); ?></span>
                                            <?php endif; ?>
                                            <?php if ($agenda_loc) : ?>
                                                <span style="display: flex; align-items: center; gap: 6px; color: var(--secondary);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> <?php echo esc_html($agenda_loc); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p style="color: var(--text-main);">Belum ada agenda yang dijadwalkan.</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Button Selengkapnya -->
            <div class="text-right" style="margin-top: 40px;">
                <a href="<?php echo site_url('/informasi-agenda'); ?>" class="btn-calendar" style="display: inline-flex; align-items: center; justify-content: center; background: var(--secondary); color: white; padding: 12px 24px; border-radius: 8px; font-weight: 600; transition: all 0.2s ease;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section (Pelajar Muhammadiyah Dalam Angka) -->
    <section class="stats-section bg-white text-center" style="padding: 100px 0 100px; position:relative; z-index: 10;">
        <div class="container">
            <h2 class="stats-title" style="font-family: var(--font-display); color: var(--primary); font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; margin-bottom: 60px; line-height: 1.2;">
                Pelajar Muhammadiyah Tangerang Selatan<br>
                <span class="stats-highlight" style="color: var(--secondary); font-size: clamp(2rem, 4vw, 3rem);">Dalam Angka</span>
            </h2>
            <div class="stats-grid" id="statsCounter" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; max-width: 1100px; margin: 0 auto;">
                <div class="stat-item" style="padding: 32px; border-radius: var(--radius-lg); background: var(--bg-main); box-shadow: var(--shadow-sm); transition: transform 0.3s ease; border-bottom: 4px solid var(--accent);">
                    <div class="stat-number count-up" data-target="4" style="font-size: 72px; font-family: var(--font-display); font-weight: 800; color: var(--primary); line-height: 1; margin-bottom: 12px;">0</div>
                    <div class="stat-label" style="color: var(--secondary); font-size: 18px; font-weight: 600;">Pimpinan Cabang</div>
                </div>
                <div class="stat-item" style="padding: 32px; border-radius: var(--radius-lg); background: var(--bg-main); box-shadow: var(--shadow-sm); transition: transform 0.3s ease; border-bottom: 4px solid var(--accent);">
                    <div class="stat-number count-up" data-target="16" style="font-size: 72px; font-family: var(--font-display); font-weight: 800; color: var(--primary); line-height: 1; margin-bottom: 12px;">0</div>
                    <div class="stat-label" style="color: var(--secondary); font-size: 18px; font-weight: 600;">Pimpinan Ranting</div>
                </div>
                <div class="stat-item" style="padding: 32px; border-radius: var(--radius-lg); background: var(--bg-main); box-shadow: var(--shadow-sm); transition: transform 0.3s ease; border-bottom: 4px solid var(--accent);">
                    <div class="stat-number count-up" data-target="30" style="font-size: 72px; font-family: var(--font-display); font-weight: 800; color: var(--primary); line-height: 1; margin-bottom: 12px;">0</div>
                    <div class="stat-label" style="color: var(--secondary); font-size: 18px; font-weight: 600;">Pengurus Daerah</div>
                </div>
                <div class="stat-item" style="padding: 32px; border-radius: var(--radius-lg); background: var(--bg-main); box-shadow: var(--shadow-sm); transition: transform 0.3s ease; border-bottom: 4px solid var(--accent);">
                    <div class="stat-number count-up" data-target="5000" style="font-size: 72px; font-family: var(--font-display); font-weight: 800; color: var(--primary); line-height: 1; margin-bottom: 12px;">0</div>
                    <div class="stat-label" style="color: var(--secondary); font-size: 18px; font-weight: 600;">Pelajar Muhammadiyah</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ketua IPM Section -->
    <section class="ketua-section bg-gray" style="padding: 100px 0; background: var(--bg-surface); text-align: center;">
        <div class="container overflow-hidden">
            <h2 class="section-title" style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; color: var(--primary); margin-bottom: 60px;">
                Ketua IPM Tangerang Selatan<br> <span style="color: var(--secondary);">dari masa ke masa</span>
            </h2>
            
            <div class="ketua-carousel-wrapper" style="position: relative; max-width: 900px; margin: 0 auto;">
                
                <!-- Navigation Arrows -->
                <button class="nav-arrow prev-arrow" style="position: absolute; left: 0; top: 50%; transform: translateY(-50%); background: none; border: none; font-size: 3rem; color: #ccc; cursor: pointer; z-index: 10; transition: color 0.3s;">
                    &lsaquo;
                </button>
                <button class="nav-arrow next-arrow" style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); background: none; border: none; font-size: 3rem; color: #ccc; cursor: pointer; z-index: 10; transition: color 0.3s;">
                    &rsaquo;
                </button>

                <!-- Carousel Track -->
                <div class="ketua-track" style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scrollbar-width: none; -ms-overflow-style: none; gap: 40px; padding: 20px 60px;">
                    <?php 
                    $struktur_query = new WP_Query(array(
                        'post_type' => 'struktur',
                        'posts_per_page' => -1,
                        'meta_key' => '_struktur_periode',
                        'orderby' => 'meta_value',
                        'order' => 'ASC' // Ascending or Descending based on preference
                    ));

                    if ( $struktur_query->have_posts() ) :
                        while ( $struktur_query->have_posts() ) : $struktur_query->the_post(); 
                            $nama_ketua = get_post_meta(get_the_ID(), '_struktur_nama_ketua', true);
                            $periode = get_post_meta(get_the_ID(), '_struktur_periode', true);
                    ?>
                            <div class="ketua-slide" style="flex: 0 0 100%; scroll-snap-align: center; display: flex; align-items: center; justify-content: center; gap: 40px; flex-wrap: wrap;">
                                
                                <!-- Photo -->
                                <div class="ketua-photo" style="width: 280px; height: 280px; border-radius: 50%; border: 2px solid var(--border-light); overflow: hidden; flex-shrink: 0; box-shadow: var(--shadow-md);">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
                                    <?php else : ?>
                                        <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center;">
                                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Text -->
                                <div class="ketua-info" style="text-align: left; max-width: 400px;">
                                    <h3 style="font-family: var(--font-display); font-weight: 800; font-size: clamp(2rem, 5vw, 3.5rem); color: var(--primary); margin: 0 0 8px 0; line-height: 1.1;">
                                        <a href="<?php echo site_url('/struktur-organisasi'); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html( $nama_ketua ? $nama_ketua : get_the_title() ); ?></a>
                                    </h3>
                                    <?php if ($periode): ?>
                                    <div style="font-family: var(--font-body); font-size: 1.75rem; color: var(--text-main); font-weight: 600;">
                                        <?php echo esc_html($periode); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else:
                    ?>
                        <p style="text-align:center; width: 100%;">Belum ada data ketua IPM.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="text-right" style="margin-top: 40px; display: flex; justify-content: flex-end; max-width: 900px; margin: 40px auto 0;">
                <a href="<?php echo site_url('/struktur-organisasi'); ?>" class="btn-calendar" style="display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; background: var(--secondary); color: white; border-radius: 8px; font-weight: 600; transition: all 0.2s ease;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7"></path></svg>
                </a>
            </div>

        </div>
    </section>

</main>

<!-- Counter Up Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.count-up');
    const speed = 200; // The lower the slower

    const startCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    };

    // Intersection Observer to trigger when visible
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };
    
    let observerActivated = false;
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !observerActivated) {
                startCounters();
                observerActivated = true;
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const statsSection = document.getElementById('statsCounter');
    if(statsSection) {
        observer.observe(statsSection);
    }
});
</script>

<?php get_footer(); ?>
