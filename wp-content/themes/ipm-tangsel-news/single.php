<?php
/**
 * Template Name: Single Post
 *
 * This is the template that displays all single posts.
 */

get_header(); 
ipm_set_post_views(get_the_ID());
?>

<main id="primary" class="site-main page-template-wrapper" style="padding-top: var(--header-height); background-color: var(--bg-surface);">

    <!-- Post Content Area with Sidebar -->
    <section class="page-content-wrapper" style="padding: 60px 0;">
        <div class="container page-with-sidebar">
            
            <!-- Main Content Formatted -->
            <div class="main-content-area">
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" class="modern-content post-entry" style="background: transparent; box-shadow: none; padding: 0;">
                        
                        <!-- Post Header inside content area -->
                        <header class="post-header" style="margin-bottom: 32px;">
                            <h1 class="page-title" style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; color: var(--text-main); line-height: 1.2; margin-bottom: 20px; letter-spacing: -0.02em;"><?php the_title(); ?></h1>
                            
                            <div class="post-meta" style="display: flex; flex-wrap: wrap; align-items: center; gap: 16px; font-size: 0.95rem; color: var(--text-muted); font-weight: 500;">
                                <!-- Categories -->
                                <div class="post-categories" style="display: flex; gap: 8px;">
                                    <?php 
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        foreach( $categories as $category ) {
                                            echo '<span style="background: var(--secondary); color: white; padding: 4px 16px; border-radius: 4px; font-weight: 600; font-size: 0.85rem;">' . esc_html( $category->name ) . '</span>';
                                        }
                                    }
                                    $tags = get_the_tags();
                                    if ( ! empty( $tags ) ) {
                                        foreach( $tags as $tag ) {
                                            echo '<span style="background: var(--secondary); color: white; padding: 4px 16px; border-radius: 4px; font-weight: 600; font-size: 0.85rem;">' . esc_html( $tag->name ) . '</span>';
                                        }
                                    }
                                    if ( empty( $categories ) && empty( $tags ) ) {
                                        echo '<span style="background: var(--secondary); color: white; padding: 4px 16px; border-radius: 4px; font-weight: 600; font-size: 0.85rem;">Berita</span>';
                                    }
                                    ?>
                                </div>
                                
                                <!-- Author -->
                                <span style="display: flex; align-items: center; gap: 6px; color: #00b52a; font-weight: 600;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <?php the_author(); ?>
                                </span>
                                
                                <!-- Date -->
                                <span style="display: flex; align-items: center; gap: 6px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <?php echo get_the_date('l, j F Y | H:i'); ?>
                                </span>

                                <!-- Views -->
                                <span style="display: flex; align-items: center; gap: 6px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    <?php echo function_exists('ipm_get_post_views') ? ipm_get_post_views(get_the_ID()) : '0'; ?> views
                                </span>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-featured-image" style="margin-bottom: 32px; overflow: hidden;">
                                <?php the_post_thumbnail('full', array('style' => 'width: 100%; height: auto; display: block; object-fit: cover;')); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Post Content -->
                        <div class="post-body content-typography">
                            <?php the_content(); ?>
                        </div>

                        <!-- Author Bio Box -->
                        <div class="author-bio-box" style="display: flex; align-items: center; gap: 24px; padding: 24px; background: var(--bg-main); border-radius: 12px; margin-top: 40px; margin-bottom: 20px; border: 1px solid var(--border-light);">
                            <div class="author-avatar" style="flex-shrink: 0; display: block; overflow: hidden; border-radius: 50%; width: 80px; height: 80px; background: #ddd;">
                                <?php echo get_avatar( get_the_author_meta('user_email'), 160, '', '', array('class' => 'avatar', 'style' => 'width: 100%; height: auto; object-fit: cover;') ); ?>
                            </div>
                            <div class="author-info">
                                <h3 style="margin: 0 0 8px 0; font-size: 1.25rem; color: #00b52a; font-family: var(--font-display); font-weight: 700;">
                                    <?php the_author(); ?>
                                </h3>
                                <div style="color: var(--text-main); font-weight: 700; font-size: 0.95rem;">
                                    <?php echo count_user_posts( get_the_author_meta('ID') ); ?> posts
                                </div>
                            </div>
                        </div>

                    </article>

                    <!-- WordPress Comments Area -->
                    <div class="comments-area-wrapper" style="margin-top: 60px; padding-top: 40px; border-top: 1px solid var(--border-light);">
                        <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>
                    </div>

                <?php endwhile; ?>
            </div>

            <!-- Right Sidebar -->
            <div class="sidebar-area">
                <?php get_sidebar(); ?>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
