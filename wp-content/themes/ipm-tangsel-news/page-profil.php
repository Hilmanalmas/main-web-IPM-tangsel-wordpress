<?php
/**
 * Template Name: Profil
 *
 * This is the template that displays the Profil page.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <?php
    $header_style = "background-image: linear-gradient(rgba(0, 31, 63, 0.6), rgba(15, 23, 42, 0.6)), url('" . get_template_directory_uri() . "/asset/gedung-dakwah.jpg');";
    if ( has_post_thumbnail() ) {
        $header_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $header_style = "background-image: linear-gradient(rgba(0, 31, 63, 0.6), rgba(15, 23, 42, 0.6)), url('" . esc_url( $header_image_url ) . "');";
    }
    ?>
    <!-- Page Header Solid -->
    <section class="page-header" style="<?php echo $header_style; ?>">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Page Content Area -->
    <section class="page-content-wrapper bg-gray">
        <div class="container page-with-sidebar" style="margin-top: 60px;">
            <div class="main-content-area">
                <?php
                while ( have_posts() ) :
                    the_post();

                    echo '<article class="modern-content">';
                    the_content();
                    echo '</article>';

                endwhile; // End of the loop.
                ?>
            </div>
            
            <!-- Right Sidebar -->
            <div class="sidebar-area">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
