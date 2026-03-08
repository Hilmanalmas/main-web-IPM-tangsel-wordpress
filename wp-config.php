<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// Load environment variables from .env if it exists
if ( file_exists( __DIR__ . '/.env' ) ) {
    $env_vars = parse_ini_file( __DIR__ . '/.env' );
    if ( $env_vars ) {
        foreach ( $env_vars as $key => $value ) {
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
}

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DB_NAME') ?: 'ipm_tangsel_db' );

/** Database username */
define( 'DB_USER', getenv('DB_USER') ?: 'ipm_user' );

/** Database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') ?: 'ipm_password' );

/** Database hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ?: (getenv('DB_HOST') ?: 'localhost') );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4H::5VDips&!z%E!t4Tn: |,mhI}?i=_Mm5?MR|qVM$bZ|IZJ8wSktw&PE,<%qv9' );
define( 'SECURE_AUTH_KEY',  'd-3:y!Useo;8pA?=ntggM==o`dH^c?5E23P`c~TB1a&;tyEzO_B#HnKTfQg0GACv' );
define( 'LOGGED_IN_KEY',    'e;l5fzosO .wH*)e5m&Yt[c.4iC*-Q6*OVvBQ0-o=0=`,!1CI5t3Iq FMNP!$5U/' );
define( 'NONCE_KEY',        '9C(2gW{t)S%N4hxt~uazYymr;=$K.^E@x<# H*NYNV?V5xoFGitvdPh(:4J5`-^e' );
define( 'AUTH_SALT',        '`J2kfWEP?[AV-#ghF<`lD+S!FK><`zRH`!Hu^t=;f7-pl;=/:|I^X?#x^ooy67V=' );
define( 'SECURE_AUTH_SALT', '9I35C1L.i&{)Ss;XZ5ZfNmE#h0W[@{XQlA&gN0i^36_8r8kN6t(oH)jqe0/v$[2h' );
define( 'LOGGED_IN_SALT',   '{DkbEsP7iP#OL-d@7(0Uu2[~y4HF3GGl|&{U6u &(+%;c9n%{y6 CSciCI<dSg8r' );
define( 'NONCE_SALT',       '/VI:o/$&2}gbm[J~6*bhx2p{zi(Y<lZHRH&l.pHFT3Uq3ezb%DMNTlM7xjio] {w' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */

// Konfigurasi ini mengatur URL aplikasi secara otomatis, sangat berguna jika
// memindahkan dari localhost ke VPS production (mencegah error gambar hilang/CSS rusak)

// Dukungan untuk Reverse Proxy (Nginx / Cloudflare VPS)
// Ini adalah kunci agar saat di-deploy ke VPS, WordPress tahu domain aslinya (ipmtangsel.or.id)
if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $proxy_host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    // Ambil host pertama jika ada banyak proxy
    $proxy_host = explode(',', $proxy_host)[0];
    $_SERVER['HTTP_HOST'] = trim($proxy_host);
}

// Gunakan HTTP_HOST yang dikirim oleh browser (atau proxy)
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
    $protocol = 'http';
    if ( (isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off') || 
         (isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') ||
         (isset( $_SERVER['HTTP_X_FORWARDED_SSL'] ) && strtolower($_SERVER['HTTP_X_FORWARDED_SSL']) === 'on') ) {
        $protocol = 'https';
		$_SERVER['HTTPS'] = 'on'; // Paksa status HTTPS aktif untuk WP
    }
    // PAKSA HTTP UNTUK LOKAL (Mencegah ERR_CONNECTION_REFUSED / SSL Handshake failure di port 8000)
    if (strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
        $protocol = 'http';
        $_SERVER['HTTPS'] = 'off';
        define('FORCE_SSL_ADMIN', false);
    }

    // Ambil WP_SITE_URL prioritas utama dari $_ENV (hasil parse_ini_file) lalu getenv, karena getenv() bisa kosong di beberapa setup PHP.
    $env_site_url = isset($_ENV['WP_SITE_URL']) ? $_ENV['WP_SITE_URL'] : getenv('WP_SITE_URL');
    
    if ($env_site_url && strpos($env_site_url, '127.0.0.1') === false && strpos($env_site_url, 'localhost') === false) {
        // Mode Produksi (VPS) / Hardcoded Domain
        define( 'WP_HOME', rtrim($env_site_url, '/') );
        define( 'WP_SITEURL', rtrim($env_site_url, '/') );
        
        // Memaksa HTTP_HOST mengikuti env agar tidak nyasar ke localhost karena Nginx yang kurang set header
        $parsed_host = parse_url($env_site_url, PHP_URL_HOST);
        $_SERVER['HTTP_HOST'] = $parsed_host;
        
        $cookie_host = $parsed_host;
        define('COOKIE_DOMAIN', $cookie_host);
    } else {
        // Mode Pengembangan (Localhost dinamis)
        $final_url = $protocol . '://' . $_SERVER['HTTP_HOST'];
        define( 'WP_HOME', $final_url );
        define( 'WP_SITEURL', $final_url );
        
        $cookie_host = $_SERVER['HTTP_HOST'];
        if (!in_array($cookie_host, ['localhost', '127.0.0.1', 'localhost:8000', '127.0.0.1:8000'])) {
            define('COOKIE_DOMAIN', $cookie_host);
        }
    }
    
    // Cegah WP-Cron hang (unresponsive) ketika dijalankan lokal di localhost
    if (strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
        define('DISABLE_WP_CRON', true);
        define('WP_HTTP_BLOCK_EXTERNAL', true);
        define('WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,*.wordpress.org');
    }
}

define('WP_HOME_OVERRIDE', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

