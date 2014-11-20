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
define('DB_NAME', 'laborato_identidad-dev');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'laborato_spark');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Spark#2014!');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY', '+wI)P+]!q4K]B=WoByw/%e$sxy-Bh?<@{UQ^l@5M{C*<Y6owo4hfJ!a8|y45v|*M'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'F%9dGA9Il#^H#z{-A*gF4N D.Oh$mM)d8]zB#/#epIl1]2-6 >H|2~8#hb`;p:ui'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'B?>j=](Epr,Iv!)Sfp-5{%QvP75R>{hHDGcV:6z~{D+n|~GT:S_D}sW2md<-LgUw'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'uD$7x{_XI-y0dl3I.((p/j+K<QYu==!p%%H#-+I/vvd`s9{+/UT|dkG|ZZ,?v0],'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '5}%YO]]XPNNt2f&yC*d!a|]@_>~ECCdYzawz-{&8ye&3Bd`estRB[B#cxQo7FNW<'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'G=61F.T3DE+Y>#]kCqE{=|rFJJ Oz9nFHSa6:_fuQksucdMSE9.{k4{#-AtRs(mi'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'QnL|-9G|>5{0n=?rYuVm[$Zq9[eU`pjWMn#U;:Z|U8&h2#wJNkwf)>u=Q[yt+>7&'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '?6@-~QQ0_Jj*PNQW+dPJO Q&Pm1uS>G]r3e|^EN-ORWrnJF;wC>3`+~s[o}3Hthu'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.           
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', FALSE);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

