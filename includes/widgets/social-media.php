<?php
// Full credit to WPBeginner
// https://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/

// Creating the widget 
class lamb_social_media_widget extends WP_Widget {

	function __construct() {
	parent::__construct(

	// Base ID of your widget
	'lamb_social_media_widget', 

	// Widget name will appear in UI
	__( '[' . LAMB_THEME_TITLE . '] Social Media Pages', LAMB_THEME_TITLE ), 

	// Widget description
	array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', LAMB_THEME_TITLE ), ) );

}
 
// Creating widget front-end

public function widget( $args, $instance ) {

	$description = apply_filters( 'widget_title', $instance['description'] );
	$page_urls = apply_filters( 'widget_method', $instance['page_urls'] );
	$title = apply_filters( 'widget_title', $instance['title'] );
	
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	
	// This is where you run the code and display the output
	echo '<p class="small-margin-bottom">' . $description . '</p>';

	echo lamb_social_buttons( $page_urls, $show_text );

	echo $args['after_widget'];

}

// Widget Backend 
public function form( $instance ) { ?>

	<style>

		.input-range {
			display: flex;
		}

		.input-range input[type="range"] {
			margin-right: 10px;
		}

	</style>

	<?php $id = 'title'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Title: ' ); ?></label> 
		<input class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" type="text" value="<?php echo $value; ?>">
	</p>

	<?php $id = 'description'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Filed under category ID(s): ' ); ?></label>
		<textarea class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" style="height: 100px"><?php echo $value; ?></textarea>
	</p>

	<?php $id = 'page_urls'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Filed under category ID(s): ' ); ?></label>
		<textarea class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" style="height: 100px"><?php echo $value; ?></textarea>
	</p>

	<?php }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

		$instance['page_urls'] = ( ! empty( $new_instance['page_urls'] ) ) ? strip_tags( $new_instance['page_urls'] ) : '';

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}

}

// Register and load the widget
function lamb_load_social_media_widget() {
	register_widget( 'lamb_social_media_widget' );
}
add_action( 'widgets_init', 'lamb_load_social_media_widget' );

