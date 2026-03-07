<?php
/**
 * Template Name: Informasi & Agenda
 *
 * A custom template to display a combined feed of Pengumuman and Agenda custom post types.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <?php
    $header_style = 'background-color: var(--bg-surface); border-bottom: 1px solid var(--border-light); color: var(--text-main);';
    $title_style  = 'color: var(--text-main); text-shadow: none;';
    $subtitle_style = 'color: var(--text-muted);';
    if ( has_post_thumbnail() ) {
        $header_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $header_style = 'background-image: linear-gradient(rgba(0, 31, 63, 0.6), rgba(15, 23, 42, 0.6)), url(\'' . esc_url( $header_image_url ) . '\'); border-bottom: none; color: white;';
        $title_style  = ''; // remove overrides, let default white apply
        $subtitle_style = ''; 
    }
    ?>
    <!-- Page Header -->
    <section class="page-header" style="<?php echo $header_style; ?>">
        <div class="container">
            <h1 class="page-title" style="<?php echo $title_style; ?>"><?php the_title(); ?></h1>
            <p class="page-subtitle" style="<?php echo $subtitle_style; ?>">Pusat Informasi dan Agenda Kegiatan Pelajar Muhammadiyah Tangerang Selatan</p>
        </div>
    </section>

    <!-- Content List Section -->
    <section class="news-section" style="padding-top: 60px;">
        <div class="container">
            
            <div class="news-grid">
                <?php 
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'post_type' => array('pengumuman', 'agenda'),
                    'posts_per_page' => 12,
                    'paged' => $paged,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $combined_query = new WP_Query($args);

                if ( $combined_query->have_posts() ) : ?>
                    <?php while ( $combined_query->have_posts() ) : $combined_query->the_post(); 
                        $ptype = get_post_type();
                        $badge_text = ($ptype === 'agenda') ? 'Agenda' : 'Pengumuman';
                        $badge_color = ($ptype === 'agenda') ? 'var(--secondary)' : 'var(--accent)';
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                            
                            <!-- Thumbnail -->
                            <div class="news-image-wrapper">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium_large', array('class' => 'news-image')); ?>
                                    <?php else : ?>
                                        <div class="news-image" style="background: linear-gradient(135deg, var(--bg-main) 0%, var(--border-light) 100%); display:flex; align-items:center; justify-content:center;">
                                            <?php if($ptype === 'agenda'): ?>
                                                <svg width="48" height="48" fill="none" stroke="var(--text-muted)" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <?php else: ?>
                                                <svg width="48" height="48" fill="none" stroke="var(--text-muted)" stroke-width="1.5"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <span class="news-category-badge" style="background-color: <?php echo $badge_color; ?>; color: <?php echo ($ptype === 'agenda') ? '#fff' : '#000'; ?>;"><?php echo $badge_text; ?></span>
                            </div>
                            
                            <!-- Content -->
                            <div class="news-content">
                                <div class="news-meta">
                                    <div class="meta-item">
                                        <svg class="meta-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                    <?php if($ptype === 'agenda'): 
                                        $agenda_date = get_post_meta(get_the_ID(), '_agenda_date', true);
                                    ?>
                                        <?php if($agenda_date): ?>
                                            <div class="meta-item ml-2" style="color: var(--secondary);">
                                                <svg class="meta-icon" style="color: inherit;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                <span>Pelaksanaan: <?php echo esc_html($agenda_date); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <h3 class="news-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="news-excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="news-read-more">
                                    Lihat Detail
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div style="grid-column: 1 / -1; text-align:center; padding: 40px; background:var(--bg-surface); border-radius: var(--radius-md);">
                        <p><?php _e( 'Belum ada informasi atau agenda yang dipublish.', 'ipm-tangsel-news' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                $big = 999999999; 
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $combined_query->max_num_pages,
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Prev', 'ipm-tangsel-news' ),
                    'next_text' => __( 'Next &raquo;', 'ipm-tangsel-news' ),
                ) );
                wp_reset_postdata();
                ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
