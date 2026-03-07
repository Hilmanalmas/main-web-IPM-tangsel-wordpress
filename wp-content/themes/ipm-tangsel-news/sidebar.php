<aside class="widget-sidebar">
    
    <!-- Widget: Berita Terbaru -->
    <div class="widget">
        <h3 class="widget-title">BERITA TERBARU</h3>
        <div class="widget-news-list">
            <?php
            $recent_news = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'post_status'    => 'publish',
            ));

            if ($recent_news->have_posts()) :
                while ($recent_news->have_posts()) : $recent_news->the_post();
            ?>
                <a href="<?php the_permalink(); ?>" class="news-item-small">
                    <div class="news-item-img">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php else : ?>
                            <div class="no-img-placeholder"></div>
                        <?php endif; ?>
                    </div>
                    <div class="news-item-content">
                        <h4 class="news-item-title"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></h4>
                        <span class="news-item-date"><?php echo get_the_date('j F Y'); ?></span>
                    </div>
                </a>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
                <a href="<?php echo site_url('/berita'); ?>" class="btn-sidebar-more" style="display: flex; align-items: center; justify-content: center; margin-top: 20px; padding: 10px; background: var(--secondary); color: white; border-radius: 8px; font-weight: 600; font-size: 14px; transition: all 0.2s;">
                    Berita Lainnya
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 6px;"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
                </a>
            <?php
            else :
                echo '<p>Belum ada berita terbaru.</p>';
            endif;
            ?>
        </div>
    </div>

</aside>
