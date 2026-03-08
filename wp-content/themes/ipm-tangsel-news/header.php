<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Modern Fonts: Inter for UI, Space Grotesk/Outfit for Display -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/Logo_PD_IPM.png' ) ); ?>" sizes="32x32" />
    <link rel="icon" href="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/Logo_PD_IPM.png' ) ); ?>" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/Logo_PD_IPM.png' ) ); ?>" />

    <!-- Custom theme styles -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-pages.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- IPM Website Preloader -->
<div id="ipm-preloader">
    <div class="preloader-content">
        <div class="spinner"></div>
        <img class="preloader-logo" src="<?php echo get_template_directory_uri(); ?>/asset/Logo_PD_IPM.png" alt="Loading IPM...">
    </div>
</div>

<script>
// Hide preloader when the page is fully loaded
window.addEventListener('load', function() {
    const preloader = document.getElementById('ipm-preloader');
    if (preloader) {
        // Add class to trigger CSS fadeout
        preloader.classList.add('preloader-fade-out');
        
        // Remove completely from DOM after animation finishes (500ms)
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    }
});
</script>

<div id="page" class="site">
    <!-- Modern Sticky Header -->
    <header id="masthead" class="site-header">
        <div class="header-container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
                <img class="site-logo-img" src="<?php echo get_template_directory_uri(); ?>/asset/Logo_PD_IPM.png" alt="Logo IPM Tangsel">
                <div class="site-logo-text">
                    <span class="logo-title">IKATAN PELAJAR MUHAMMADIYAH</span>
                    <span class="logo-subtitle">TANGERANG SELATAN</span>
                </div>
            </a>
            
            <nav id="site-navigation" class="main-navigation">
                <ul class="nav-list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link <?php if(is_front_page() || is_home() && !is_page('berita')) echo 'active'; ?>">Home</a></li>
                    <li class="menu-item-has-children">
                        <a href="<?php echo esc_url( home_url( '/profil/' ) ); ?>" class="nav-link <?php if(is_page('profil')) echo 'active'; ?>">Profile <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( home_url( '/sejarah-ipm/' ) ); ?>">History of IPM</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/profil-ipm-tangsel/' ) ); ?>">Profile IPM Tangsel</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/struktur-organisasi/' ) ); ?>">Structure Organization</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="<?php echo esc_url( home_url( '/direktori/' ) ); ?>" class="nav-link <?php if(is_page('direktori')) echo 'active'; ?>">Directory <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo esc_url( home_url( '/mars-ipm/' ) ); ?>">Mars IPM</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/ipm-songs/' ) ); ?>">IPM Songs</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/pedoman-ipm/' ) ); ?>">Pedoman IPM</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/materi-ipm-tangsel/' ) ); ?>">Materi IPM Tangsel</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url( home_url( '/administrasi-ipm-tangsel/' ) ); ?>" class="nav-link <?php if(is_page('administrasi-ipm-tangsel') || is_page('administrasi')) echo 'active'; ?>">Administration</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/berita/' ) ); ?>" class="nav-link <?php if(is_page('berita') || is_single() || is_archive()) echo 'active'; ?>">News</a></li>
                </ul>
            </nav>
            
            <div class="header-actions">
                <!-- Expanding Inline Search -->
                <div class="header-search-container">
                    <form role="search" method="get" class="header-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" class="header-search-input" placeholder="Cari berita, agenda, atau profil..." value="<?php echo get_search_query(); ?>" name="s" title="Search for:" />
                        <button type="submit" class="search-submit" aria-label="Search">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </form>
                </div>
                <button class="mobile-menu-toggle" aria-label="Menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </header>
