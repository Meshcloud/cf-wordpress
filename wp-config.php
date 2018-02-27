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

$services = json_decode($_ENV['VCAP_SERVICES'], true);
$service = $services['MySQL-DEV'][0]['credentials'];  // pick the first MySQL service

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $service['database']);

/** MySQL database username */
define('DB_USER', $service['username']);

/** MySQL database password */
define('DB_PASSWORD', $service['password']);

/** MySQL hostname */
define('DB_HOST', $service['host'] . ':' . $service['port']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '`m!I#j(U$@6uXVE<Nvh?MdNE3GB=g.[#tQ+-}]i+gHo+>UaaVz+p:CW#+3XMz!:P');
define('SECURE_AUTH_KEY',  'leH(-9mU`v$Bj*{OhcLbK!/-8AJdV9aVMIM$pfZkw(h&HceW%kN?6OuP`<gOt.2}');
define('LOGGED_IN_KEY',    '4#v(v$/,~o>r`A|XUF^y|>Q1T&s3^.|O?78fBHq5<dRjmo5D2mR!%/uq9KW6N]X%');
define('NONCE_KEY',        'TxQ1jqavZl<xAF|/*qr672-Wn98Vua>,@[?/R&c6ZD}z_KQpQS>>._LuKsNI-m.A');
define('AUTH_SALT',        'hhE-)Cm%<CYpjfezo*n@.F3>KqNQ0=@}.X`AyK9S>am!S{@y:z?u`B3,p%]D$&2&');
define('SECURE_AUTH_SALT', '>2XN(+ sn_hfe!9<r*b#7^<BKzA@1d0ml2d<n;hHZ! MDdy4W[ ^GycqBQZvT9tk');
define('LOGGED_IN_SALT',   'gG)Wz[dQdj*vZNpQ-*`5e.{gU<<NsyFD6LUy0v-oXma+Aw/uzFkz;wta_MoW-@0y');
define('NONCE_SALT',       'NoDS2cM5?<+P+[;ls+p;3SDu^+!Z+2s>|to6|xFm:[sZW&,;:Z0E5[9G=K5w;.6m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
