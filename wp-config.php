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
define('DB_NAME', '2016_smp');

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
define('AUTH_KEY',         'Z*LC/Y%IJ/thms8D*cKvX2r u-;mPDE.B6NftG1QLHt0e yY}rKvQ9P!=_B&^JB,');
define('SECURE_AUTH_KEY',  '6[E=oThFpykWw0[;6c}o~}{Zv&O`9Y[A:1n4W$;SG>2_;*hgF;zbHE$L:^.N $,c');
define('LOGGED_IN_KEY',    '-rjoe>[%14>hoBdCN[Hhd`I2E:1OiVsLQe*!4pNjz{J;*cV8@s~rPm/u[?^u9zQ9');
define('NONCE_KEY',        'x@^O;)Q4E d1HhfU&>I$#+%om8E?SF.Tq_[/OD)jk?Er;qA?s11@D@AP7Z[7QOoo');
define('AUTH_SALT',        '~K>k((|1|S5R{ ]=^+%bBWGH)0WjMQs-;CQaXx)GJtJ:p8k0JF11D>dO{nLb.$L|');
define('SECURE_AUTH_SALT', '#b&<&.0ZUJuV4YTR{]tx_D0C>;W.lsOHU-uar9b<AT:L~oYIVp-`-$^CVA2tO>Un');
define('LOGGED_IN_SALT',   'Rn`!3[PUNkRvCHfh~UgdpII/)rI]M^;eLDo&F{(cL7&B.]=V[qJ3!59/p*X&Wxn`');
define('NONCE_SALT',       'eH]qu1zga[DKm^}ZFS9d}%BW$)!v5se6,4rG>JN8f TIx1~ MMz.js ;AdAE5R0v');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
