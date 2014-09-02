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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '*H5nfjSbf&.dCT`vXs<=MA=)`kQ_BV!B/a}4CEQ3VQWM), NIn]+~SH_[]HgZmA4');
define('SECURE_AUTH_KEY',  'NwFz mB5y|J&H/VdXWqA=-+V-[|~y/s1Uh~h~ot;U-LFh,<6Ygkb/,c{ N734<{@');
define('LOGGED_IN_KEY',    'lBNT`+Ph-@W=K90y@zu==/Z;aQ.05?AF@N;#/.^!kjqwes%/e|sqU+D30j_I-fv[');
define('NONCE_KEY',        '_@:D[DTe~>=4tGFnI~<MP )PzqcJ<t+_QR?$&uX,8afYed]`K:?i|P-%H-*&rm}>');
define('AUTH_SALT',        '-{d8Vc~b(|]DVFgv-9fi82&d5&b@t5cZ!b~,}(rt3abj[K(Q$.Fh3G-~T4f-a/(H');
define('SECURE_AUTH_SALT', '3Hwc]wJ+Q-@@t03-i`v[[_]EVnnj(w`u*ZQ)A@Fp*l7{kDuwy.g**MRi!*1pF0+4');
define('LOGGED_IN_SALT',   'i_}5F~VK|*8ltkKbcQ(U>mWC9k[:ljqhd)5Y)]QlhV|%>UgQ_3R3M gW~Y qH,Yh');
define('NONCE_SALT',       ':FowXX(_9nj<U5WljG+3a]bJ7|Mq=)|H},8fqr6A[Z{g*:8cSS*,`+ak=P WY/iy');

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
