<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', "bdcgae" );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', "root" );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', "" );

/** Nome do host do MySQL */
define( 'DB_HOST', "localhost" );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'y3nOrvZM,OP|O6>`HrA6g?@ZM/B+[1A]ujRQGT<8rVe&P+)uUMf<&JC9=!H-Hu@Y' );
define( 'SECURE_AUTH_KEY',  'Wrzu+8 YWzSK<ZB~_d4Fa=2Ev{OzRIJ4]4zg$eIWg,[kf1C0yMTYfIuzf}Y^!t`<' );
define( 'LOGGED_IN_KEY',    'SL<J!D50XOUv+zMh.Y8blV~c@gX @W! ;%Wk@FS]P:(x>ev[-=i1}:Q[^_=+aVwf' );
define( 'NONCE_KEY',        'VtHL^G|-`)%TgbX_*sxSMw[1L[lZ,Wrnd|V0k8{8b$kl39iIS]{h^|f?JON&MlOr' );
define( 'AUTH_SALT',        '^$l%Nd[b,a`7tTq`c[ZZ:SUs=N5?[$ZDdo*O*1SgN-)MPZ~PTGuPB5RP{5)S %Y?' );
define( 'SECURE_AUTH_SALT', 'RD!J>vRI, |b1%v}?X],9oBcJNqK#PanN+OTw;bU8yiW]_3lg.-sd> 2?!I U|7h' );
define( 'LOGGED_IN_SALT',   'IS($/}HO@c$8fW:~F)#5T~o?yi~?lQ&GN2~q@Lb9|zu3I7jN5S:_am[lF/y_0K_{' );
define( 'NONCE_SALT',       '|!qiN.O/S/;!pG?2O4p[<9-`5!KSj0|n~c=d X1f7trn{2vlH_R[R~wsw~AD$%^l' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'cgae_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
define( 'WP_SITEURL', 'http://localhost/modelos/sistema-cgae/' );
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
