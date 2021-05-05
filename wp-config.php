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
define( 'AUTH_KEY',         'e90,.aKq]1x6Gp%&Q-8pA7;8Rxu]B@/gD=&aFA;2~MKle/!hn[*SF(ryZczF_#:$' );
define( 'SECURE_AUTH_KEY',  '6IreSu%l0GQ{,RyQ!RT|haC>s-Dg/ujG:?t:c:FjZc)WF-7r/?SVR1N0DtQUcc69' );
define( 'LOGGED_IN_KEY',    '%^Stea?x3/XLQ<USJa%`G7hl1;3HxbZvqitw.`;%&q6DIzs)J fsQ3Pw]#_YZyL+' );
define( 'NONCE_KEY',        'xOyP_0$tPd9s%_4=/c!)W=nr<dv.h{Ao#Ad}$|* d:jHM}BwyMqvaQsb@Nvd0O`F' );
define( 'AUTH_SALT',        'Zq6NT%9Yu2IH%B|{[94]:/OoMP7Sp5Z[A[H&FjRt,B=;5v_k ws`nwZfv(Q?IRy^' );
define( 'SECURE_AUTH_SALT', 'R5S/e++M#.n{72b?V<-yB|B5)A@N%p~HW`-=lIDf-uM%ZtQ5FJSX_gUrGe!C|7()' );
define( 'LOGGED_IN_SALT',   'YK%3ozL9r/1^_;X!beF(uwuES JnR-DtPWP$*t#.C(5(y> !qpkzpAru#DIz2GXD' );
define( 'NONCE_SALT',       '_`8[#jDjF`O]pVoZGVrqB/o:8@ijci.^Rs1McL;T2=M1nUxA%eG81,JoKY?e1BLb' );
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
