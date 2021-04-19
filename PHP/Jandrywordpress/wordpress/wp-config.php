<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'D:\Disco duro JND\XAMPP\htdocs\wordpress\wp-content\plugins\wp-super-cache/' );
define('DB_NAME', 'jandry');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '4((.sLs&Zc~ jwe`/4ZXHMo)Kvxn=x.Z<=Ep9onQ3+^fS0%>(D4^pp&PYDeQ0s-$');
define('SECURE_AUTH_KEY', 'mJ 3D,tBpV`jx!VT#oV~)[a3WQcK:tMPs32&7p4,.IPeZO1(LsI3toU&W4VjbzRy');
define('LOGGED_IN_KEY', '+z9#bwAw-U b)|0=>AV_$D[aa.WeWe{N5htPtvg}]#]mP-I|<A%$[EbND/U-&OoE');
define('NONCE_KEY', 'fvjD(Lb+Z^+/=Dg>6jh5{;NTtX(tvzAX,D%).c*C[@w1EgG!gbmUb%Om;_6.kJSK');
define('AUTH_SALT', 'Q>l7C#Hm1ybr-q@.yD9_gkiXn?Ap|=az1GhX&0 -.z5}V*r-G-b_(`?;&!F$NH< ');
define('SECURE_AUTH_SALT', '~n,-;!X[zZ.j* /i/f2Y}yeScm4z3XF*DF4qgw~:E7>MKn%r3D0Mm9{lbjzi8;;2');
define('LOGGED_IN_SALT', '-K}[D6_.{EVrI0d^!2~iMlh,U:f_RB[6:Eujy@#n;i<I7s=5XhYT,ThBE#wGq<ra');
define('NONCE_SALT', '6#(H|m`8}a`I_]_{zq`fHhZ-OINzJfJ!/B4|tB|NYM~ (2%3N+IP`  D/5`s0z07');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('WP_ALLOW_REPAIR', true);