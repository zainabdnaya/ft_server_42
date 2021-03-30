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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '_J}Ro_(8rc%OeLpe0+tN^Pr`p @ZZkpdBMr }L}@c/JRmrQc4RCj;!q-q%^T=6Os');
define('SECURE_AUTH_KEY',  '|/sh)TK>Q[;{B-3KT]C%0Qh@9bf`c6vaNbRh{@Rsgjgp2am~1#-Kt.LAE)q|.(}d');
define('LOGGED_IN_KEY',    '7X38J8$aH:^xT5U2P3PzW3Z 4y|Kl|,J)!kh)5W{.#-7%E8|@B-ci4rA%5[t)t|+');
define('NONCE_KEY',        'SlT}7k-V!-1*x<2tTIsb`O@8mX5OD>FBtSrW$I59aa`*d3Su>{S684%+FsL{[D_B');
define('AUTH_SALT',        '7?}fvL~[~fz$U|}+wXJ}xzd>J:nxzO:5t-Crk}mj`HM1R:bIv(XcCPvi?+#&nocl');
define('SECURE_AUTH_SALT', 'tY5PO13(M` 6O=j%gmj{;:$s&*KUilu[7g-0%!o{{jU&vz-B[e<a$NG<?6-7[w$1');
define('LOGGED_IN_SALT',   ')~ii J+oviq=Ql$Y-f9z4+@Ch0bi(q@c9WN,M?%{r9bKg|.4B+Gs!WNW87y`X2/?');
define('NONCE_SALT',       '/pnnQjZ3-5 E)2;8PbgF~A}siHSp@PN6N.LBpv*+oqu)_ji.h.qz^u0s%-7)muV;');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
