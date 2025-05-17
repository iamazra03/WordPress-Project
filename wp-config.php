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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressproje' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'Pfq=agIHow;v%{V@gw#}(),?=HT$lk; $]m)_rMD^PL),UwCh`2X6KfU; {u#*FU' );
define( 'SECURE_AUTH_KEY',  ':QS0P8_s0(eQsc9q3)9w/n]vxj8lY&(o-0?8)*Lw2AXqbb=Kgb%2j9/*^X7$!P9#' );
define( 'LOGGED_IN_KEY',    '=nQIa`pq;Y)rQvFGe4eHEXEJ?MuG*^~s>,pg(H`J[y1<T%SZkKVj?gNL6fXK9%a ' );
define( 'NONCE_KEY',        'dov?]Bqo2MfPu 2;{TSuy?&J9bZ-JJ3,6[h1vxYv[^JNQ{O9^]q*rBX Y5Ir`c!@' );
define( 'AUTH_SALT',        '3/bidm:U ?l34}F]uDy^~.{gLzoimjJf@+:w*A JzwJ$E-@$bfVrL^ef34n1>wd3' );
define( 'SECURE_AUTH_SALT', '8H!2(88r[Z;jSJBVduVpTJVfvD;qq2h/Bom?LdGqva-r0{XK,dfmj^Y5oioB-Y)A' );
define( 'LOGGED_IN_SALT',   '(Ego p!3:h?92c1h9S&o_sjf,rT_,9<|8X7WW{tHKJ@2E<{9)@`gE5!(-S!cc9gU' );
define( 'NONCE_SALT',       '5n}1|@v.D~Fc7<c8*qen|O9^>|[~9b,lhq]1n*+=.!M>{Mb-qo a}HDfPhJ{Yo7d' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
