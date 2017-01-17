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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gomesferreira');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '^n/D[/C;M{4H@cejTpMY2/G#Nc?W?cZkI@q8,)#v=Y[V`3Q9-Lr79DSg-}4^a{7U');
define('SECURE_AUTH_KEY',  'ZC.&a3VV>#7CL;0s^_mCxux-~dlp9.<!`o0T{QgW Gqo7V4^[,{pr7xWZV@C)*|h');
define('LOGGED_IN_KEY',    '5gi20`pIEVngsP#[?x-$vEo}Rf?7AS]jy gv2h),#sX3(3%5G~0bvw0j~uj}}K>`');
define('NONCE_KEY',        '65Fg+j$~bH|a$3K*27b<_E6`x7COqT:l5yshOhyEK28edW%jkjY+Cg6=~,*gNR8(');
define('AUTH_SALT',        '@=8OHt*1Pp6]8{:CJi8*lfojEr[T?Y`eID:2?K~yK[}*B#pS~0r@3NdLs,~w>T|}');
define('SECURE_AUTH_SALT', 'W!&[,PY(,`*Z!d?5Z`1H7Uz7$o4D%~HiU)%}Ze&Ek=$V.g??1$[Ly_{AWD_(d([C');
define('LOGGED_IN_SALT',   ':Z/db6x1aAC)V`<ii?~D&[c{_8xt|fe}A^/6>t&hUB`,-<74iK]-]K)_j)vsC]{U');
define('NONCE_SALT',       '?3V?iW/yQk,d 5Xr_f-du]-d5B0p5X?ofL2M4L.#XyaZ?b9x8eIac/MXbM.YriZY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_gm_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
