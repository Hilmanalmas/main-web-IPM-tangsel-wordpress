<?php
/**
 * Template Name: Profil
 *
 * This is the template that displays the Profil page.
 */

get_header(); ?>

<main id="primary" class="site-main page-template-wrapper">

    <!-- Page Header Solid -->
    <section class="page-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/asset/img_8529.jpg');">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Page Content Area -->
    <section class="page-content-wrapper">
        <div class="container container-narrow" style="margin-top: 60px;">
            <?php
            while ( have_posts() ) :
                the_post();

                echo '<article class="modern-content">';
                the_content();
                echo '</article>';

            endwhile; // End of the loop.
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
