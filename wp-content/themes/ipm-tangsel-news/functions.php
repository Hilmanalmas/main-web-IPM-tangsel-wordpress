<?php
function ipm_tangsel_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Add support for responsive embedded content (e.g. YouTube videos).
    add_theme_support( 'responsive-embeds' );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'ipm_tangsel_setup' );

function ipm_tangsel_cpts() {
    register_post_type('pengumuman', array(
        'labels'      => array(
            'name'          => 'Pengumuman',
            'singular_name' => 'Pengumuman',
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-megaphone',
        'supports'    => array('title', 'editor'),
    ));

    register_post_type('agenda', array(
        'labels'      => array(
            'name'          => 'Agenda',
            'singular_name' => 'Agenda',
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-calendar-alt',
        'supports'    => array('title', 'editor'),
    ));

    register_post_type('dokumen', array(
        'labels'      => array(
            'name'          => 'Dokumen Unduhan',
            'singular_name' => 'Dokumen',
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-media-document',
        'supports'    => array('title', 'editor', 'thumbnail'),
    ));

    register_post_type('struktur', array(
        'labels'      => array(
            'name'          => 'Struktur Organisasi',
            'singular_name' => 'Struktur',
        ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-groups',
        'supports'    => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'ipm_tangsel_cpts');

// Metaboxes for Struktur
function ipm_struktur_metaboxes() {
    add_meta_box('struktur_details', 'Detail Ketua Umum', 'ipm_struktur_metabox_callback', 'struktur', 'normal', 'high');
}
add_action('add_meta_boxes', 'ipm_struktur_metaboxes');

function ipm_struktur_metabox_callback($post) {
    wp_nonce_field('struktur_save_meta', 'struktur_meta_nonce');
    $nama = get_post_meta($post->ID, '_struktur_nama_ketua', true);
    $periode = get_post_meta($post->ID, '_struktur_periode', true);
    echo '<p><label for="struktur_nama_ketua">Nama Ketua Umum (Misal: Riandy Prawita):</label><br>';
    echo '<input type="text" id="struktur_nama_ketua" name="struktur_nama_ketua" value="' . esc_attr($nama) . '" style="width:100%;"></p>';
    echo '<p><label for="struktur_periode">Periode (Misal: 2023-2025):</label><br>';
    echo '<input type="text" id="struktur_periode" name="struktur_periode" value="' . esc_attr($periode) . '" style="width:100%;"></p>';
    echo '<p><em>Catatan: Gunakan fitur "Featured Image" (Gambar Andalan) di sebelah kanan layar untuk menambahkan foto profil Ketua Umum. Isi susunan struktur organisasi pada kotak teks/editor di atas.</em></p>';
}

function ipm_struktur_save_meta($post_id) {
    if (!isset($_POST['struktur_meta_nonce']) || !wp_verify_nonce($_POST['struktur_meta_nonce'], 'struktur_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['struktur_nama_ketua'])) update_post_meta($post_id, '_struktur_nama_ketua', sanitize_text_field($_POST['struktur_nama_ketua']));
    if (isset($_POST['struktur_periode'])) update_post_meta($post_id, '_struktur_periode', sanitize_text_field($_POST['struktur_periode']));
}
add_action('save_post_struktur', 'ipm_struktur_save_meta');

// Metaboxes for Agenda
function ipm_agenda_metaboxes() {
    add_meta_box('agenda_details', 'Detail Agenda (Waktu & Tempat)', 'ipm_agenda_metabox_callback', 'agenda', 'normal', 'high');
}
add_action('add_meta_boxes', 'ipm_agenda_metaboxes');

function ipm_agenda_metabox_callback($post) {
    wp_nonce_field('agenda_save_meta', 'agenda_meta_nonce');
    $date = get_post_meta($post->ID, '_agenda_date', true);
    $time = get_post_meta($post->ID, '_agenda_time', true);
    $location = get_post_meta($post->ID, '_agenda_location', true);
    echo '<p><label for="agenda_date">Tanggal (Misal: 05 Feb atau 2026-02-05):</label><br>';
    echo '<input type="text" id="agenda_date" name="agenda_date" value="' . esc_attr($date) . '" style="width:100%;"></p>';
    echo '<p><label for="agenda_time">Waktu (Misal: 08:00 - 15:00):</label><br>';
    echo '<input type="text" id="agenda_time" name="agenda_time" value="' . esc_attr($time) . '" style="width:100%;"></p>';
    echo '<p><label for="agenda_location">Lokasi:</label><br>';
    echo '<input type="text" id="agenda_location" name="agenda_location" value="' . esc_attr($location) . '" style="width:100%;"></p>';
}

function ipm_agenda_save_meta($post_id) {
    if (!isset($_POST['agenda_meta_nonce']) || !wp_verify_nonce($_POST['agenda_meta_nonce'], 'agenda_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['agenda_date'])) update_post_meta($post_id, '_agenda_date', sanitize_text_field($_POST['agenda_date']));
    if (isset($_POST['agenda_time'])) update_post_meta($post_id, '_agenda_time', sanitize_text_field($_POST['agenda_time']));
    if (isset($_POST['agenda_location'])) update_post_meta($post_id, '_agenda_location', sanitize_text_field($_POST['agenda_location']));
}
add_action('save_post_agenda', 'ipm_agenda_save_meta');

// Metaboxes for Dokumen
function ipm_dokumen_metaboxes() {
    add_meta_box('dokumen_details', 'Detail Dokumen (Link, Tipe, Ukuran)', 'ipm_dokumen_metabox_callback', 'dokumen', 'normal', 'high');
}
add_action('add_meta_boxes', 'ipm_dokumen_metaboxes');

function ipm_dokumen_metabox_callback($post) {
    wp_nonce_field('dokumen_save_meta', 'dokumen_meta_nonce');
    $link = get_post_meta($post->ID, '_dokumen_link', true);
    $type = get_post_meta($post->ID, '_dokumen_type', true);
    $size = get_post_meta($post->ID, '_dokumen_size', true);
    echo '<p><label for="dokumen_link">Link URL File (Copy dari Media Library):</label><br>';
    echo '<input type="url" id="dokumen_link" name="dokumen_link" value="' . esc_attr($link) . '" style="width:100%;"></p>';
    echo '<p><label for="dokumen_type">Tipe File (Misal: PDF, DOCX, PPT):</label><br>';
    echo '<input type="text" id="dokumen_type" name="dokumen_type" value="' . esc_attr($type) . '" style="width:100%;"></p>';
    echo '<p><label for="dokumen_size">Ukuran File (Misal: 2.5 MB):</label><br>';
    echo '<input type="text" id="dokumen_size" name="dokumen_size" value="' . esc_attr($size) . '" style="width:100%;"></p>';
}

function ipm_dokumen_save_meta($post_id) {
    if (!isset($_POST['dokumen_meta_nonce']) || !wp_verify_nonce($_POST['dokumen_meta_nonce'], 'dokumen_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['dokumen_link'])) update_post_meta($post_id, '_dokumen_link', esc_url_raw($_POST['dokumen_link']));
    if (isset($_POST['dokumen_type'])) update_post_meta($post_id, '_dokumen_type', sanitize_text_field($_POST['dokumen_type']));
    if (isset($_POST['dokumen_size'])) update_post_meta($post_id, '_dokumen_size', sanitize_text_field($_POST['dokumen_size']));
}
add_action('save_post_dokumen', 'ipm_dokumen_save_meta');

function ipm_tangsel_scripts() {
    wp_enqueue_style( 'ipm-tangsel-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'ipm_tangsel_scripts' );

// Post Views Counter
function ipm_get_post_views($postID){
    $count_key = 'ipm_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function ipm_set_post_views($postID) {
    $count_key = 'ipm_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Include all custom post types in global search
function ipm_include_custom_post_types_in_search($query) {
    if ($query->is_search && !is_admin() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'page', 'pengumuman', 'agenda', 'dokumen', 'struktur'));
    }
    return $query;
}
add_action('pre_get_posts', 'ipm_include_custom_post_types_in_search');

// Limit Image Upload Size to 3MB
function ipm_limit_image_upload_size($file) {
    // Check if the uploaded file is an image
    if (strpos($file['type'], 'image') !== false) {
        // Set limit to 3 Megabytes (3 * 1024 * 1024 bytes)
        $size_limit = 3145728; 

        if ($file['size'] > $size_limit) {
            $file['error'] = 'Gagal mengunggah foto: Ukuran foto melampaui batas maksimal sebesar 3MB. Harap kompres ukuran foto Anda.';
        }
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'ipm_limit_image_upload_size');
