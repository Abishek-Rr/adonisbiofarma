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
define( 'DB_NAME', 'myurls68_wp705' );

/** MySQL database username */
define( 'DB_USER', 'myurls68_wp705' );

/** MySQL database password */
define( 'DB_PASSWORD', 'n7SP]63qp@' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ice6tf0c1ngo1pc6ndv6advxvtijj81qoed5l5engbjxtui6y07fxpdsb6heuvnf' );
define( 'SECURE_AUTH_KEY',  'lqdnowoxggsd2royl87plcjud8nbrvnppnxhayvjttjkahxgsqzw9qzg6pbnzrzw' );
define( 'LOGGED_IN_KEY',    'zmv4kja4q40bny2aszbextywmg3tqgp6cpdoibiheyo8bykz9ecbk4rbj17fjhdh' );
define( 'NONCE_KEY',        'ufici8k0mi93rj78co2y5ya5ock2jhzwvsu080eyxcldow2xjzuxoy80988jliws' );
define( 'AUTH_SALT',        'iftpm4vsfggpnbb7wj72as14hcbhctdtnejxqfpb4cunnqxmxhhytagihdbixtl9' );
define( 'SECURE_AUTH_SALT', 'zj5s9te1kicftnruincacoedlqhxigj1wulvz0iul1xyvpsnw2ybyklin3f1nzok' );
define( 'LOGGED_IN_SALT',   'kbm9zdqea7snfupcpuflcf3wp1esrxvycns2e4annxzfvgfmxorqsifmmiw9pos8' );
define( 'NONCE_SALT',       '50goxvguiy7ydfg7uem0kgacdhbezryejkswfxyin7bxoxst76628kv7dvkigs1x' );
define('ALLOW_UNFILTERED_UPLOADS', true);
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpsb_';
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
