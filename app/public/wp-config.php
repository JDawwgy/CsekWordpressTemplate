<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GPth9F+xN465R+eU9q/KolsEg+tYVjNgh/K7s8OvkF3i/HgEc5CjgC3Jqv2aByEYIvSkBuUBvaG4wfBvG/q8Mg==');
define('SECURE_AUTH_KEY',  'WEiMGGhsVHVYzs/F8tRH4lOye6QUj08QGOPZ1xMbtPJN7h+o3lT2Sr539nyVPkID7XzsK7ZoR9pNRqWKw34FHg==');
define('LOGGED_IN_KEY',    'TEf7zv0zYaBxZ2TncudVXZoUXKxjuMFZdpOQaNFIzE7gpR3GlCez/+lFSgaIIomltbHRX88WK2kXNjzDNkhpaQ==');
define('NONCE_KEY',        'JlqfSEJ5ggsStkzwrGW9nC8TiCdsaZ5BpSu7bIKtW9S0EjhLCr7YIYnW8nStA4m6XSLv0caJOMGYu/UqANKlyw==');
define('AUTH_SALT',        'yfsrCwHQ6MCRy2wgnVZjLx78zh6NAdSklpkgMhRl0sClAqoL+X0qP/SXuUJl+fPqe2ioqNHOe+sBa6Pue/gMuw==');
define('SECURE_AUTH_SALT', 'xCM/r3XP1LpTwOL+bkSrjoylivwj3P09jAsm2E2o3gniJdl0xQ/I2TSiErkLldHpcgznhay5eZ6rSr1aqfgK0g==');
define('LOGGED_IN_SALT',   'v7ajALoUZvvf4HTXQGxjhMNoM7XFX3rfWSe03QGvCcWieCBzOH6/ghP+T+mbT1lCJUzVzVdd6H53oxkOz2Kseg==');
define('NONCE_SALT',       '6+4asaOAbNzGtsU2t0O/SmuKrSHRnN9JNVewXTpWRaQVa/+/30WPo6AoYOkHB0UV6CHas4fy1PcjUe6hqGW8nw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_13jz0ap8ew_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
