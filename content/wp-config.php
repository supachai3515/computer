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
define( 'DB_NAME', 'admin_xcitehitec' );

/** MySQL database username */
define( 'DB_USER', 'admin_xcitehitec' );

/** MySQL database password */
define( 'DB_PASSWORD', 'LJm2EdyH9W' );

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
define( 'AUTH_KEY',         'h6es)==L@g|Up5@Nbj(4`.s&]_DH3U=?cD5K|.o[rn*V%[IWbJh7oU+#Sw%U*;Dn' );
define( 'SECURE_AUTH_KEY',  'I#,o m soBL|S;m)#zDEM}.wJzu8%5|z`Xdjj!AO/[][Im6a&~`ua9Y3VqQ;aMgp' );
define( 'LOGGED_IN_KEY',    'Lt`KwLkG#?bQh=7EcOxK]@p{EMy7{fAn3C^Tn4W;(?F_q^EOT+#hsX2,aK+(4FW/' );
define( 'NONCE_KEY',        '0fM2]I0!%gc|LV]Q.FVP[Ph;DT,mFREb-TeLFjQ 6KY]P-QD57Zh)jMd/ _q47K?' );
define( 'AUTH_SALT',        '[C3colLaH)clr<}u~^;wSvglFf78{;Gz/I]pl[MpLWa+9?6cG=+4oI(^kN0JqChh' );
define( 'SECURE_AUTH_SALT', ';|Tyn`i@.YW^Bv?pL1O}QuC?$~twa%d*CgH!A<<Ftdb6MnD_s9`/^P|GTc&|ShU>' );
define( 'LOGGED_IN_SALT',   'ic-QIxqa}1tVTg^|tf,qu}glaip#NeZDz/aU>r1a2y-[8@X_FTs^RCgoLW><@LqN' );
define( 'NONCE_SALT',       'FrDkPBM[}uruMEgkU`6-fHS3%fZ5hCPBs2[(c&[dcm_c28jHxE#h11iF|YcVFCN5' );

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
