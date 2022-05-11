<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woocommerce' );

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
define( 'AUTH_KEY',         ']{Dl8+J=u9]/R+SjvUhC |FD>|bsMxO7*h~DO$tHZ1g<~(QQ0RWp26n.iV7r)<kU' );
define( 'SECURE_AUTH_KEY',  '3,L|&Hh-Ypw,`2}GdHTwl,DUf%0@r3g{3pFpy]cCZ`^5jA?b}uo?eWF/LKQE$ju;' );
define( 'LOGGED_IN_KEY',    'uB4k[r(Rp M0nUQ&uE,&&0^r9i|QDa]QZdjkIp|uhoimIF2<l9/NZg`pY5:eh!A ' );
define( 'NONCE_KEY',        'FxoYS~I!nb2[v3!Zf=:#2F<YW25t.p =:xS%`st{,2FuW:-Hfdrs(Kre0r}1w;NM' );
define( 'AUTH_SALT',        'dC*Pvx~s9T<Y}lXn$+<!C`5L]xw0#fBpt1jQEff:q;*}>|z!@S-N6V>]Hn)k70ZN' );
define( 'SECURE_AUTH_SALT', 'SFp/lK,Ba|ug)aKju5=^< >n[]kwU=^K?`8AEaS1ySw6Ddx[huNoU?(_A6dc:-wp' );
define( 'LOGGED_IN_SALT',   ':NV:_yYEpdh)b;7!-k|O.?|nzu8EB:=|.soL5Cm9kqzAaH4DAw894d=SOY(W?#Tg' );
define( 'NONCE_SALT',       'EW<).Icqa.2@aK ;kh){.xcGI1Cb(Z6X<XyA_v*@*+x-*&t?y [zYu=h&ArN[^(j' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
