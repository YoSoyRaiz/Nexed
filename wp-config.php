<?php

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'ifF0cddDxCQ55vs5vrR1HQxpHkWVgGQ2bqplSzZN0E7NF0LGDkUdOQ8Vd1xtyC7G');
//END Really Simple Security key
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'n?/Ajys0(&Y7;1PR5bWka*u?4m>}0h}kZ~p{sSjCvbPg}04JGt;yu^5K}sm9W >#' );
define( 'SECURE_AUTH_KEY',   'xt[<=1:xutW(@@yaS5;V}SS @[h4 ,K9c.&$s~xNq:,_`tyjCS+wOp$3l3DM9;]^' );
define( 'LOGGED_IN_KEY',     '.=L5AHWA-J}6[y(Rq.vb9=Y`QzEym;bNI|B;ik7WBXX0*}YPC!&[?z=$dmD^Qp%S' );
define( 'NONCE_KEY',         'b(Zf+>no-#$A+S=hUoi:%vkx{]4KOW7bXz(oaNs@;+kXE3V~fnMIvzLwlJ<VcX=C' );
define( 'AUTH_SALT',         '^c&>%URGum`)s>C*EpbxebeBri9sWmU5 eq1?r+p~@,Jox*h;r9GE4DhP.?xw&&*' );
define( 'SECURE_AUTH_SALT',  '3cC^pX(8}?_5t@[{,teec3_ Ob&JG#~:(byKM{[Sg5RN[ZQwF9EC>`M4]ZHi< &|' );
define( 'LOGGED_IN_SALT',    '[S<CE0s4LCTvn<@ix8sxM?lP]km?w|>5qG~{/Un6tb}j}?H#=gz@WQQr6c*@30o=' );
define( 'NONCE_SALT',        'S_fsELmtZUBB=IH7XPlQoJlDo! )oU6>|N}sOG> I7Bt)E #!J#|nxmO*cQ5D6;l' );
define( 'WP_CACHE_KEY_SALT', '9et~r!w_QDE>T,TMOwF:8G^W4k=y7lq&GV6AFwXtj7JEk^=DUE8:~ {c`H,M}bIr' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
