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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'prevaj' );

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
define( 'AUTH_KEY',         '/Ykj9>M)-B3L4ST,Nku[[O}B7<FX%wo<med5E{(R~CYkyDl9q,L!ygng0wE4Q[j`' );
define( 'SECURE_AUTH_KEY',  'jod0%9gm,9wCt0nfiVj^UhW`J.tt-EB%Y-d@[Lj#]OA$Z$4Zn*?FP=]ns->6_QVh' );
define( 'LOGGED_IN_KEY',    'NmMcf3H:)20Htt{,;<u2G1tac{FY8hSc.#|i<@U%.t%yxeff(s&mra:XRL<p{s-p' );
define( 'NONCE_KEY',        'l)*ynsS,FX7p#LsGGRKT;V-}qkNnaJ?=c-,l[vWJZ{k^,.@#3>A:7W(8b@SAD2V)' );
define( 'AUTH_SALT',        'rCd><Do}! d-i45PrhIvhY%A7UclrLocoQO&Ls-]N|zV&(=i_]v%0/UQ:jAXT(!_' );
define( 'SECURE_AUTH_SALT', 'JhW5mJUAI_s&-8m$M[tBDOsI&J]OOBGa%TFyfL?o<_01%}.te$)m9!qd*wj{onqT' );
define( 'LOGGED_IN_SALT',   '_v6.6&)@6Du{8JKlO<SFK7OU//4_@>Iv8IN=$b0~vn{zSV~kXS+)]vNV:-cjx]S:' );
define( 'NONCE_SALT',       'E w/iu>.h[d&:ENn<Pc7*27!+Tk#.Hn.+h~#ngn{]9zER*~ g10i1DMDaHw#TmP.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
