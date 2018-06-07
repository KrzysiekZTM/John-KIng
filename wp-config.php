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
define('DB_NAME', 'john-king_db');

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
define('AUTH_KEY',         'd+TwNR6)s`)(Ke!#t%iejGR^5&DfJ;g)^M784Qcz0W%4Yg0Tlb6R$K;pO/tafg!W');
define('SECURE_AUTH_KEY',  '`;l;FxpQV}E> G`U5YHJ:hGU!pBC;Qu%n3N&GX!T6mnq|8{lRfCB[6n[w)Q>2X+[');
define('LOGGED_IN_KEY',    'mZ,jv.N{cW;7D*l7%v4b0AeA#B2d#ZO[D+jX2hS$p{#5.1 #D~fR<(mb%]Or Li0');
define('NONCE_KEY',        '^Abtv.y_9=N^o7`I&By(xC7aUO*->yAX-KM(=:+HS/AAZ9QXUQQfK@I!D<E]Zr7S');
define('AUTH_SALT',        'K0En<ZZHqd=,T]NI:1x88N?;]]WHI{,TQr6scB$B{ovK%-&Ag362mx.cA(W*iyWx');
define('SECURE_AUTH_SALT', 'Mi4{(h2n*^K<oXRr6**g^X6Cwj@n6JExeJDofT3Xxzu);J3Pm*bI_ v*c3f{Hb<w');
define('LOGGED_IN_SALT',   '#(vjPDtth@`GpoQs7#Tn7(=2BTN3~9f9^egZ#sI<!X|XN.R{[!d [>Q;RH*%|%DG');
define('NONCE_SALT',       '*y}}E+k@:}15[[FRH;dD[D|l2P:KtoQR<jC(ohIT,/mVGxzd]KLtB~=;Svvp9(7p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_jk_';

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
