<?php
/**
 * Portfolio categories list.
 *
 * @package Pofo
 */
?>
<?php

// Register and load the widget
if ( ! function_exists( 'pofo_portfolio_categories' ) ) {
    function pofo_portfolio_categories() {
        register_widget( 'Pofo_Portfolio_Categories' );
    }
}
add_action( 'widgets_init', 'pofo_portfolio_categories' );

if (! class_exists('Pofo_Portfolio_Categories')) {
	class Pofo_Portfolio_Categories extends WP_Widget {

		/**
		 * Register pofo portfolio categories list.
		 */
		function __construct() {
			parent::__construct(
				'Pofo_Portfolio_Categories', // Base ID
				__('Pofo - Portfolio Categories', 'pofo-addons'), // Name
				array( 'description' => __( 'Display a list of portfolio categories on your site.', 'pofo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			global $wp_query, $post;

				$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

				/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
				$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

				$c = ! empty( $instance['post_counts'] ) ? '1' : '0';
				$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';

				echo $args['before_widget'];

				if ( $title ) {
					echo $args['before_title'] . $title . $args['after_title'];
				}

				$cat_args = array(
					'orderby'      => 'name',
					'show_count'   => $c,
					'hierarchical' => $h,
					'taxonomy' 	   => 'portfolio-category'
				);

				echo '<ul>';

					$cat_args['title_li'] = '';

					/**
					 * Filters the arguments for the Categories widget.
					 *
					 * @since 2.8.0
					 * @since 4.9.0 Added the `$instance` parameter.
					 *
					 * @param array $cat_args An array of Categories widget options.
					 * @param array $instance Array of settings for the current widget.
					 */
					wp_list_categories( apply_filters( 'widget_categories_args', $cat_args, $instance ) );

				echo '</ul>';

				echo $args['after_widget'];
		}

		public function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => esc_html__( 'Portfolio Categories', 'pofo-addons' ), 'post_counts' => '', 'hierarchical' => '' ) );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','pofo-addons'); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" />
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked( '1', $instance['post_counts'] ) ?> id="<?php echo $this->get_field_id('post_counts'); ?>" name="<?php echo $this->get_field_name('post_counts'); ?>" value="1" />
				<label for="<?php echo $this->get_field_id('post_counts'); ?>"><?php _e('Show portfolio counts','pofo-addons'); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked( '1', $instance['hierarchical'] ) ?> id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>" value="1" />
				<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e('Show hierarchy','pofo-addons'); ?></label>
			</p>
		<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['post_counts'] = ! empty($new_instance['post_counts']) ? 1 : 0;
			$instance['hierarchical'] = ! empty($new_instance['hierarchical']) ? 1 : 0;
			return $instance;
		}
	}
}