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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '0305' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '$6us<SF5*+xUUQTBz-B^N-Q; mgo m-AYxB1w<^Op#Ij,`;1}9GRx#z}{V]B4r00' );
define( 'SECURE_AUTH_KEY',  '?(7{U^[cB&&n#225r4-(}h1z_GZV)P*xG+iG?*3]vDu)8Q%o%yu`O-&35tYZ:kM ' );
define( 'LOGGED_IN_KEY',    'G5YzkTY-{AA$FSBCZ4Tr#d(JJ-PtAcl`a[U2Yv7`?V7[RA9+hjLGXyOJsU>aM>O$' );
define( 'NONCE_KEY',        'gHvpn(*`@1;.=I<EsGJL9ejH}&Rv0maR(nczmllTrmmBC|>K}A%(=kIFVD>hgEk&' );
define( 'AUTH_SALT',        '~aJ0:a%P1=gjmE/8TIf5z`+/fCw<n([Ar6eL_vHzMCWr1I;3`o}^8Abvp=tLfW5D' );
define( 'SECURE_AUTH_SALT', '}>sI.Var L.:~BF+,c&@+eShM^&,ZWKJ[@TZ,XugIqUl3cflm/-SY3(xFdU(1@U}' );
define( 'LOGGED_IN_SALT',   'V#)^u^wjBHG R25qjfl^0|16MM):D U7o+=Fb:KLc9${;qAV$Sg5^-mJ]xvW>+pb' );
define( 'NONCE_SALT',       '?E|byTA~yKZx#Ey[+oT)smt%WHA&}J%g;3v5gS R!-cSBz+8) HM(1]?of}PDoJ<' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
