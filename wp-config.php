<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '5Fh(a4z|UJTo)<RWKkm*0Kb1MFe5H2@FnORA aGi~ovRC+a#s?^M+um]=X0g(,$p' );
define( 'SECURE_AUTH_KEY',  '3N.p Xx(%v9}4VS,s >]|s1mK]kok[3Wi@HP~qS!^y_#=B?5te/2pfF*_4YN!Q::' );
define( 'LOGGED_IN_KEY',    '.19@JiJ*o[5p7GQpkM :K[/qX_-9fD6Sy m3,^rL-Je@Zt8SI/d2,RF-SlV,lehg' );
define( 'NONCE_KEY',        'c33*5?v|):IC/jqqELd!w>a:$?i0KED[Uy?_^?{C4@dDpvkB4j+Y0((>bn@~PZRr' );
define( 'AUTH_SALT',        'O2QD]|o2&^3$l](VxUTk<rod9ayzf-QC=TaxI5nGTf=v-B6k*@T+r!&7R?&d&8cy' );
define( 'SECURE_AUTH_SALT', '.l4-%fx(csz70OxTvWp_K>_$&Qo:{s,9o M]hj?i^&f4P)a$b`0q<K5#It^cBnB7' );
define( 'LOGGED_IN_SALT',   '!lfleAo$h!)0Wj9|1P*(DuRvy#VC9iyK,u{61$W>};sDF/Wr4x)]O>$xJrE+e1es' );
define( 'NONCE_SALT',       '2VDSL6Dcct>V?HmTDb6,!v[W5=f{:)_hn&8I6^eocD[2qZ;yAdaYc4Do;gM)X;c.' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
