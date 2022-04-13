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
define( 'DB_NAME', 'tut_adtheme' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'toor' );

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
define( 'AUTH_KEY',         'VQ|jabbOln.xKK)r5(s+u1<JW.?]R$x]Wpq})Qk&6bqq5#-:Tl{n0v5U(J5eeO>a' );
define( 'SECURE_AUTH_KEY',  'Lw` cV%BZu?Aw)y_clOnYCldjA)&Vr_(se/2s9^u]`u{WCo2NWX3#c;;~[XI,*G=' );
define( 'LOGGED_IN_KEY',    'NL~:3xBc;?*^C/gt@D_aOGNia({0|VT~{-`b4D;R#ME$EuJMi/kU23D.[4.[&=%|' );
define( 'NONCE_KEY',        'cQ k?gTL`8i LApw#ea7( BJ]%T#?.k4:h{MZVmXO}Y5.0|i%|:gdtTXVMK>-$kr' );
define( 'AUTH_SALT',        'r;kc:m_9M=ls>$,K]fD:iO@#2aL<Czz!#N$K7GISx%*B$60~~04PN93e8Je609KQ' );
define( 'SECURE_AUTH_SALT', '|cxDN|nl$&cM0F@$VtEH:K%.6/tGbcn2n+./[LKUeh_>@Z^S8|b#s=bN{zB4k*oG' );
define( 'LOGGED_IN_SALT',   '+sj;0h(u<ZQmKW]p9ovdhjWosp1}PZsP6R1@[R82G(URj@j-7X|cJL3=T|)lwRr6' );
define( 'NONCE_SALT',       '`R8Kh ^fe!FfPk~Kl$acy01zP*I|Qu%pr9HQ{ 5Z(~1q]*#oO>VP_#l>NQl3TI%:' );

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
