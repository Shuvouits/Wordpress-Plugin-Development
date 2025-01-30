<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin-development' );

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
define( 'AUTH_KEY',         '|)d$?FKg]]_TZVRk9=jrV nerc}@<@Bq%4!TS*n@8EtVaVpp8>s]Vc^;f<<90s_d' );
define( 'SECURE_AUTH_KEY',  'YUy>LoN]Nn)QtSZFm>N4i(?HG(1aB/h&C/IG$y>cRTk4L~!MBvxx&e8;k|x&5r0P' );
define( 'LOGGED_IN_KEY',    '$$w~H9a7Z?2SKx8Kz&%kjd!L_9l|~Q6{Wh><GS42kZGM+QnfX!BC=YC)s{lRpUDh' );
define( 'NONCE_KEY',        '3Syn-JGBN4.:C319T$hj&#S m!tD :>q)#)e].NK[jgT88vH.:OI]HF/&T-Zt%O{' );
define( 'AUTH_SALT',        'tP:SJPHzZC+|8z<K|$eqnbxE6#%re.xM3IBR>dD-N_Pw12GVuwsU&U[f%y{5>q4@' );
define( 'SECURE_AUTH_SALT', 'x|=>E5df[ :=vAHzV^]Q+4p<1}FCDR-K,80^$?2oNzgG>z*wwJ#|fAbCH!B,Ga~.' );
define( 'LOGGED_IN_SALT',   '1SAI`ycXqz]hsol9$HeZO,5X|u#pvucAI)083p/&g4qH/wW7l;4LM.TlfNxpMm(K' );
define( 'NONCE_SALT',       'acTCjv`Tg6)a]kQ;{)Y~$>$)4O3hc@M1m(rJ:~V9TYWvbzcyAor{Ato%PrRIG tW' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
