<?php
/**
 * @package Pofo
 */
?>
<?php

/*******************************************************************************/
/* Start Instagram Widget */
/*******************************************************************************/

if (! class_exists('pofo_instagram_widget')) {

	class pofo_instagram_widget extends WP_Widget {

		public $pofo_no_of_columns_instagram_feed;
		public $pofo_instagram_feed_script;
		public $pofo_instagram_id;
		public $pofo_instagram_feed_userid;
		public $pofo_instagram_feed_accesstoken;
		public $pofo_instagram_feed_userid_value;
		public $pofo_instagram_feed_accesstoken_value;

		function __construct() {
			parent::__construct(
				'pofo_instagram_widget',
				esc_html__('Pofo - Instagram', 'pofo-addons'),
				array( 'description' => esc_html__( 'Add a custom instagram widget.', 'pofo-addons' ), )
			);
		}

		public function widget( $args, $instance ) {
			
			
			extract( $args );
			
			// Before widget.
	        echo $before_widget;

	        /* Define empty variables */
	        $this->pofo_instagram_feed_script = '';
	        /* Define empty array */
	        $instagram_feed_nav_page_cursor = array();
	        /* Get current widget id */
	        $this->pofo_instagram_id = $this->id;
			/* Get instagram new accessToken value */
			$this->pofo_new_instagram_feed_accesstoken_value = ( isset( $instance['instagram_new_access_token'] ) ) ? $instance['instagram_new_access_token'] : '';
	        /* Check no of column in grid type  */
			$this->pofo_no_of_columns_instagram_feed = ( isset( $instance['no_of_columns_instagram_feed'] ) ) ? $instance['no_of_columns_instagram_feed'] : '4';
			/* Check if like disable or not */
			if( isset( $instance['sort_instagram_feed'] ) ) {
				$this->pofo_disable_instagram_like = ( $instance['disable_instagram_like'] ) ?  '' : '<span class="insta-counts"><i class="fas fa-heart"></i> {{likes}}</span>';
			}else{
				$this->pofo_disable_instagram_like = '';
			}
		  	/* Set widget id for append data */
		  	$this->pofo_instagram_feed_script .= " target: 'pofo-".$this->id."',";

    		$pofo_class_list = implode( " ", sanitize_html_class( $instagram_feed_nav_page_cursor ) );
            $pofo_instagram_feed_class = ( $pofo_class_list ) ? ' '.$pofo_class_list : '';
          
            $title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Follow Us @ Instagram', 'pofo-addons' );

            if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

	    		$pofo_no_of_instagram_feed = ( isset( $instance['no_instagram_feed'] ) ) ? $instance['no_instagram_feed'] : '8';
	    		
	    		$instagram_api_data = wp_remote_get( 'https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,username,timestamp,permalink,comments_count,like_count&access_token='.$this->pofo_new_instagram_feed_accesstoken_value, array( 'timeout' => 200, ) );

	    		$column_classes = '';

	    		switch( $this->pofo_no_of_columns_instagram_feed ) {
	                case '3':
	                    $column_classes .= ' class="col-md-4 col-sm-4 col-xs-4"';
	                break;
	                case '2':
	                    $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12"';
	                break;
	                case '1':
	                    $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12"';
	                break;
	                case '4':
	                default:
	                    $column_classes .= ' class="col-md-3 col-sm-4 col-xs-4"';
	                break;
	            }

	            echo '<div class="instagram-follow-api">';
	            	if ( ! is_wp_error( $instagram_api_data ) || wp_remote_retrieve_response_code( $instagram_api_data ) === 200 ) {
		        		$instagram_api_data = json_decode( $instagram_api_data['body'] );
		        		echo '<ul id="pofo-'.$this->id.'" class="pofo-instagram-feed'.$pofo_instagram_feed_class.'">';
		        			if( ! empty( $instagram_api_data->data ) ) {
		    					if( $pofo_no_of_instagram_feed ) {
	                                $instagram_api_data->data = array_slice( $instagram_api_data->data, 0, $pofo_no_of_instagram_feed, true );
	                            }
		    					foreach( $instagram_api_data->data as $key => $instagram_data ) {
		    						if( isset( $instagram_data->media_type ) && $instagram_data->media_type == 'IMAGE' ) {
			    						echo '<li'.$column_classes.'>';
			                            	echo '<figure>';
			                            		echo '<a href="'.$instagram_data->permalink.'" target="_blank">';
						        					echo '<img src="'.$instagram_data->media_url.'" />';
						        					if( ! empty( $instagram_data->like_count ) && $instance['disable_instagram_like'] ) {
						        						echo '<span class="insta-counts"><i class="far fa-heart"></i>'. $instagram_data->like_count .'</span>';
						        					} else {
						        						echo '<span class="insta-counts"><i class="fab fa-instagram"></i></span>';
						        					}
						        				echo '</a>';
						        			echo '</figure>';
						        		echo '</li>';
						        	}
		    					}
		    				}
		        		echo '</ul>';
		        	}
	            echo '</div>';

    		// After widget
	     	echo $after_widget;  
    	}

		// Widget Backend 
		public function form( $instance ) {
			
			/* Set up some default widget settings. */
	        $defaults = array(
	            'title' => esc_html__( 'Follow Us @ Instagram', 'pofo-addons' ),
	            'instagram_new_access_token' => '',
	            'no_of_columns_instagram_feed' => '4',
	            'no_instagram_feed' => 8,
	            'disable_instagram_like' => false,
	        );

	        $instance = wp_parse_args( (array) $instance, $defaults );
	       
	       	$instance['pofo_instagram_resolution'] = ! empty( $instance['pofo_instagram_resolution'] ) ? $instance['pofo_instagram_resolution'] : 'low_resolution';
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p class="show-new-instagram">
				<label for="<?php echo $this->get_field_id( '
					' ); ?>"><?php esc_html_e( 'Access token:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_new_access_token' ); ?>" name="<?php echo $this->get_field_name( 'instagram_new_access_token' ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_new_access_token'] ); ?>" />
			</p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of column', 'pofo-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_of_columns_instagram_feed' ) ); ?>">
	                <?php $options = array(	                        
							'1' => '1',
				    		'2' => '2',
				    		'3' => '3',
				    		'4' => '4',
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_of_columns_instagram_feed'] == $option ? selected( $instance['no_of_columns_instagram_feed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of instagram feed', 'pofo-addons' ); ?></label>
	            <input type="number" min="1" max="20" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed' ) ); ?>" value="<?php echo esc_attr( $instance['no_instagram_feed'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>" />
	        </p>

	        <p>
    		  <input class="checkbox" type="checkbox" <?php checked( $instance[ 'disable_instagram_like' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'disable_instagram_like' ); ?>" name="<?php echo $this->get_field_name( 'disable_instagram_like' ); ?>" />   
    		  <label for="<?php echo esc_attr( $this->get_field_id( 'disable_instagram_like' ) ); ?>"><?php esc_html_e( 'Disable Like', 'pofo-addons' ); ?></label>          
			</p>

		<?php
		}
		
		// Updating widget replacing old instances with new

		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['instagram_new_access_token'] = ( ! empty( $new_instance['instagram_new_access_token'] ) ) ? $new_instance['instagram_new_access_token'] : '';
			$instance['no_of_columns_instagram_feed'] = ( ! empty( $new_instance['no_of_columns_instagram_feed'] ) ) ? $new_instance['no_of_columns_instagram_feed'] : '';
			$instance['no_instagram_feed'] = ( ! empty( $new_instance['no_instagram_feed'] ) ) ? $new_instance['no_instagram_feed'] : '';
			$instance['disable_instagram_like'] = ( ! empty( $new_instance['disable_instagram_like'] ) ) ? $new_instance['disable_instagram_like'] : '';
			return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'pofo_load_instagram_widget' ) ) :
	function pofo_load_instagram_widget() {
		register_widget( 'pofo_instagram_widget' );
	}
endif;
add_action( 'widgets_init', 'pofo_load_instagram_widget' );

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/