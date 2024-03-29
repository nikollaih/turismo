<?php

// Carga la librería dotenv
require_once(__DIR__ . '/vendor/autoload.php');

// Carga las variables de entorno desde el archivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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

 //print_r($dotenv);

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV["DB_NAME"] );

/** Database username */
define( 'DB_USER', $_ENV["DB_USER"] );

/** Database password */
define( 'DB_PASSWORD', $_ENV["DB_PASSWORD"] );

/** Database hostname */
define( 'DB_HOST', $_ENV["DB_HOST"] );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_MEMORY_LIMIT', '1024M');

define( 'WP_ENVIRONMENT_TYPE', 'production' );

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
define( 'AUTH_KEY',         '|Y`a/v],JL?dg#{pAkph{ol<a}}}$q3{:2ysyP6@MZ2/]3*Oaek(JNX,f}#-s;S/' );
define( 'SECURE_AUTH_KEY',  '(hdb7|@j$VhiT:Ts}BY7rc)zKVC]^X9N*].6Pv]QF0_Tk&<>,Q]d-v?Pj]&h*t}]' );
define( 'LOGGED_IN_KEY',    '<Eu6_g=:b%U<X|lM;~t*x13pfV@t0orJv9t816hrWgC+;3P-|{{6}R,st=,>z>~1' );
define( 'NONCE_KEY',        '[Td8UW)kMqNr9?e4BMr1GZ1oS6e~[,DR}f=$e<_/1vI1ie=Ci[w{syh-%Eznk:h~' );
define( 'AUTH_SALT',        'Of~o$|y;&M&Z;WfjW4-5x=(StYB1Q{*^zf?e]ra]er}s{p&j?VzENvG},*1Yey6J' );
define( 'SECURE_AUTH_SALT', 'QlRehkp=kj<u>UlXtLT=TB@.!JYRFjaJey?e[2&(|8UWsYyXT{gj$72#od+FkM^*' );
define( 'LOGGED_IN_SALT',   '-nu&=kg5b{ XuD?cP,l8DW9qKX;grz8lb)Ps0se{b6=h6YM&sULvf_biv]LbOP6{' );
define( 'NONCE_SALT',       'Y (/#bUFd,AEP5c4El(|B__mf!,qHO^K]`I}<W}bszyX9:iX9*=PSYn`+r)oAbv+' );

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
define( 'WP_DEBUG', ($_ENV["DEBUG"] == "true") ? true : false);

/* Add any custom values between this line and the "stop editing" line. */


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
