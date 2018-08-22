<?php

// Directory settings.
$root_dir = dirname( __DIR__ );
$webroot_dir = $root_dir . '/web';

// Expose global env() function from oscarotero/env.
Env::init();

// Use Dotenv to set required environment variables and load .env file in root.
$dotenv = new Dotenv\Dotenv( $root_dir );
if ( file_exists( $root_dir . '/.env' ) ) {
    $dotenv->load();
    $dotenv->required( ['DB_NAME', 'DB_USER', 'DB_PASSWORD'] );
}

// Set up our global environment constant and load its config first.
define( 'WP_ENV', env( 'WP_ENV' ) ?: 'development' );

// Load environment specific files if it exists.
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if ( file_exists( $env_config ) ) {
    require_once $env_config;
}

// URLs.
$_SERVER['HTTP_HOST'] = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : getenv( 'DOMAIN_CURRENT_SITE' );
define( 'WP_HOME', ( empty( $_SERVER['HTTPS'] ) ? 'http' : 'https' ) . '://' . $_SERVER['HTTP_HOST'] );
define( 'WP_SITEURL', ( empty( $_SERVER['HTTPS'] ) ? 'http' : 'https' ) . '://' . $_SERVER['HTTP_HOST'] . '/wp' );

// Set HTTPS to on if forwarded protocol is https.
// See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

// Custom Content Directory.
define( 'CONTENT_DIR', '/app' );
define( 'WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR );
define( 'WP_CONTENT_URL', WP_HOME . CONTENT_DIR );

// Database settings.
define( 'DB_NAME', env( 'DB_NAME' ) );
define( 'DB_USER', env( 'DB_USER' ) );
define( 'DB_PASSWORD', env( 'DB_PASSWORD' ) );
define( 'DB_HOST', env( 'DB_HOST' ) ?: 'localhost' );
define( 'DB_CHARSET', env( 'DB_CHARSET' ) ?: 'utf8mb4' );
define( 'DB_COLLATE', env( 'DB_COLLATE' ) ?: '' );
$table_prefix = env( 'DB_PREFIX' ) ?: 'wp_';

// Authentication Unique Keys and Salts.
define( 'AUTH_KEY', env( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY', env( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY', env( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY', env( 'NONCE_KEY' ) );
define( 'AUTH_SALT', env( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', env( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT', env( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT', env( 'NONCE_SALT' ) );

// Custom settings.
define( 'AUTOMATIC_UPDATER_DISABLED', env( 'AUTOMATIC_UPDATER_DISABLED' ) ?: true );
define( 'DISABLE_WP_CRON', env( 'DISABLE_WP_CRON' ) ?: false );
define( 'DISALLOW_FILE_MODS', env( 'DISALLOW_FILE_MODS' ) ?: true );
define( 'WP_DEFAULT_THEME', env( 'WP_THEME' ) ?: '' );
define( 'WP_ALLOW_MULTISITE', env( 'WP_ALLOW_MULTISITE' ) ?: false );

// Bootstrap WordPress.
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', $webroot_dir . '/wp/' );
}
