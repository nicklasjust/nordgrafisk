<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nordgrafisk_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '|0{[y2=|wBFpXeJhke/w[-NI28.VI5+Qu=hC!oL? 2j&v^[?X)RxdP]tac`Z6-nB');
define('SECURE_AUTH_KEY',  '$Y@j-dht{$hM68,8@L>#R+BULBpRrRc;Rv~Cpp<$:1|kmhc=)2Oc*3)ApEK;<f%L');
define('LOGGED_IN_KEY',    'H1$`U!3I~LZ@>yF6po+9sP|yJM$|Hc%D#>:G2u}Ago_8ni>*e1`R+,~HebfMK^5Q');
define('NONCE_KEY',        '6*p<CX!BX7VY.|phK5#ni:RfN7a0FcpHrnwvxgH0s-6{l-+VHh#Z+@aasmQ3|ivG');
define('AUTH_SALT',        'RsnZ|Eno>f+%8^ElUm;QHLZt|wR5B--Z+?0V?q&tY`+J=3A>.qi_ImqN_FGp${+J');
define('SECURE_AUTH_SALT', '^N7-,ovB%aF$NELW10%k fY#1tT_}AH7O|J5?=#@-*`B.^Q7be%ejZ;sa!<4}D55');
define('LOGGED_IN_SALT',   '!`@6:-ZxcCE<jPPKJLn6lV/I`Yw%RvX0)n+j=?;:OgSTIFG]j!f-#U^}/g[=.YQv');
define('NONCE_SALT',       'FX<}2-r1;m,xB%9)@2HBuq] F!^*<ZiZqE${Sff.]#~{ -5aF[?TxOb6`k8#(.6%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
