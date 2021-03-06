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
define( 'DB_NAME', 'slavia' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', 'Oa13Mdc9WY' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

//define('WPLANG', 'ru_RU');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qnaE?d6^^nB2`g5ylZ`<uCcOeUWV(-/CX])BA:OHAqpeQ.RioVRvY&*7k5k$P}S-' );
define( 'SECURE_AUTH_KEY',  'R{50%XTP[%sH]h>cy~t=zc:W_gt7?PYyofUfi|35cP{5Eum?goZctIgJ %M.[}fs' );
define( 'LOGGED_IN_KEY',    '.gA3mF;Jk<!xxV}Wgw*?/7Ce m$Jep_G5j5md_>$. tub=A]>Ub!>g7ezyASok`V' );
define( 'NONCE_KEY',        'p0mgTO4;78{GcX#|B.22GP3OGX+sn1W40D5?f$HG6vFJ2TK{`GF[*q%Z8}~+5.cW' );
define( 'AUTH_SALT',        ',H7G@CR!iSj`{Yhv9Ij;+?lMMAcb?g{,`fQXG@ JG3fN,>q<L^N5qCZq~XnUUeJF' );
define( 'SECURE_AUTH_SALT', 'P$7>n3K6:HYx49,S-?_apkTfQ^2}%!OM#g /ADx[6r!R&cl(tgWa7|hEQR=>]p1~' );
define( 'LOGGED_IN_SALT',   'ij=R/>1~ jQ]SR[Q+izmY:L#A}`(o1_y[?C4(XEPo?%$D9l8grFwkCI64D]rL Lr' );
define( 'NONCE_SALT',       'O9=cG+?e:tD|Nfzd#,W2i4A$%z8?Pa*Y+7:lavR$r?wA<UZ;cx2>)##Q++;Lkpgf' );

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
//define('WP_TEMP_DIR','/wp-content/wp-recall/temp');

//define('FTP_USER', 'ftp');
//define('FTP_PASS', 'Z{?w67/a6a!dRktJ');
//define('FTP_HOST', 'localhost:21');

//define( 'WP_DEBUG', true );
//define('WP_DEBUG_LOG', true);

//define('FS_METHOD', 'DIRECT');

//define( 'WP_DEBUG_LOG', true );

define('WP_MEMORY_LIMIT', '256M');

define('AUTOSAVE_INTERVAL', 300); // seconds
define('WP_POST_REVISIONS', false);
//define('WP_POST_REVISIONS', 3);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
