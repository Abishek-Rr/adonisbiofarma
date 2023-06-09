<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

?>
<div class="col-md-12 col-sm-12 col-xs-12 no-padding">
	<div class="alert alert-warning fade in" role="alert">
	    <i class="fas fa-question-circle alert-warning"></i>
		<?php if ( is_search() ) : ?>
			<strong><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pofo'); ?></strong>
		<?php else : ?>
			<strong><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pofo'); ?></strong>
		<?php endif; ?>
		
	</div>
</div>