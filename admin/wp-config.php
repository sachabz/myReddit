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
define( 'DB_NAME', 'myreddit' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'myreddit' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '?Mih~0~@A~KD<65?MFh,):op E97BWizVz,kJ8_rHM|$([e:|dSQO50M%Z&o)C6^' );
define( 'SECURE_AUTH_KEY',  'Jx<euILTQPC>)E>0anTk;z3q_:GQyta^w}/;<A9eX^y^X>pES<.,@(Xm4MA%*zU*' );
define( 'LOGGED_IN_KEY',    '*bCH63<6Rdn:[Fa-6}*yIsc%lE{$)?WN=O[e%-MT.RE%a^EA]}LhYz7l>vMx4i4q' );
define( 'NONCE_KEY',        '!pUGC*+r- R!)/4#<l=t][0AG&2KPs$uEM6 RO.(CE&|O{Y1[zPVp$kK:G<y<[uh' );
define( 'AUTH_SALT',        'U/w K#KF2ucd#5+$AgE0w3ui+uMn.dg(&nRnw|zhh?y#i%Kg >9dU|mr9GJn,ch-' );
define( 'SECURE_AUTH_SALT', '=`4tFc]pl|FTL~E0LTJ|O9$-rq}Y!CD^76vA|:p0WAG![=uxRV3tu.Wo!~dx`n2(' );
define( 'LOGGED_IN_SALT',   '{r3_1!9rQ^w!W4p)&eC;3wT5*g{OB&Y6Ou2JjMa* S~D, 6af|sAf4Lts(]#bF4S' );
define( 'NONCE_SALT',       'X YHA!L.ZB;?JG/-a|q>$7bKXO[v4/!vdfg<@eMJ+SC;+69`5T{3KPx}~[ovZ?~l' );
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
