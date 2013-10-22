<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'judo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '_/d9[^KTFOjJZ7Zng.rI=@C?mCBN#fyWW*x63/[BiNv=q,u=2?yb4y:_2=O9!$v%');
define('SECURE_AUTH_KEY',  'eE=-D}`Y# 1=j6X#Xd}rD?_iQG:/H3K/D@p~LKoQg{2oZ{.h>w%2t&5`]Ek|3)T<');
define('LOGGED_IN_KEY',    'c3=<P<[@es*(R0{40_k>a;N1Fk:b&l&+5X(|S$d^2qsjj[TbYg6S({9B[.P&nDt%');
define('NONCE_KEY',        'Z6ND^ G mlC4=B~-y/9PpfXts{K254,d$B~MlSCZe&;$oqQ0CMP89#3_7U#Pl?iY');
define('AUTH_SALT',        'o%njY9CYK~,PAz,n^aN~4eiSR5bbD6Cn:CGQbv[_SVdQ.4vw2Kt(2p^C+BJ=H9!/');
define('SECURE_AUTH_SALT', ';{CaRyJR!-QCdyho@:!6VO}a%^KHK1>]kkwY@9B[>t.cusR6uEqi3Oy;g;|YfmUG');
define('LOGGED_IN_SALT',   'Z$q4:yKN_/5$p@H]FlH{4jfKq>6z8DaT?N/x#<e:44c .?`WDwWy^ndod<E!dE)-');
define('NONCE_SALT',       'O#+VyJ5J2>K5-Pj/tON}gi<sw.39./Jx)3Z8Ou9h_.k-S:PzbdL;{$|CKJ%y%GZD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
