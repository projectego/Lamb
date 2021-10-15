<?php
// Full credit to WPBeginner
// https://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/

// Creating the widget 
class lamb_show_posts_widget extends WP_Widget {

	function __construct() {
	parent::__construct(

	// Base ID of your widget
	'lamb_show_posts_widget', 

	// Widget name will appear in UI
	__( '[' . LAMB_THEME_TITLE . '] Show Posts', LAMB_THEME_TITLE ), 

	// Widget description
	array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', LAMB_THEME_TITLE ), ) );

}
 
// Creating widget front-end

public function widget( $args, $instance ) {

	$has_these_tags = apply_filters( 'widget_method', $instance['has_tags'] );
	$in_category_ID = apply_filters( 'widget_method', $instance['in_category'] );
	$layout = apply_filters( 'widget_method', $instance['layout'] );
	$orderby = apply_filters( 'widget_method', $instance['orderby'] );
	$post_type = apply_filters( 'widget_method', $instance['post_type'] );
	$number_of_posts_to_show = apply_filters( 'widget_number_of_posts', $instance['number_of_posts'] );
	$title = apply_filters( 'widget_title', $instance['title'] );
	
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	
	// This is where you run the code and display the output
	echo lamb_show_posts(
		$post_type,
		$number_of_posts_to_show,
		$has_these_tags,
		$in_category_ID,
		$orderby,
		$layout
	);

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

	<?php $id = 'number_of_posts'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Number of Posts: ' ); ?></label>
		<div class="input-range">
			<?php
			if ( ! $value ) {
				$value = 'Not set yet';
			}
			?>
			<input id="<?php echo $field_id; ?>" max="10" min="1" name="<?php echo $this->get_field_name( $id ); ?>" step="1" type="range" value="<?php echo esc_attr( $instance[ $id ] ); ?>" oninput="jQuery(this).next('.range-value').text( jQuery(this).val() )">
             <span class="range-value"><?php echo esc_attr( $value ); ?></span>
		</div>
	</p>

	<?php $id = 'post_type'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Post Types: ' ); ?></label> 
		<?php $post_types = get_post_types(array( 'public' => true ), 'names' ); ?>
		<select class="widefat" name="<?php echo $field_name; ?>" id="<?php echo $field_id; ?>_<?php echo $post_type; ?>">
			<option disabled>- Select -</option>
			<?php foreach ( $post_types as $post_type ) { ?>
				<option <?php selected($value, $post_type); ?> value="<?php echo $post_type; ?>"><?php echo $post_type; ?></option>
			<?php } ?>
		</select>
	</p>

	<?php $id = 'has_tags'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Has these tags attached: ' ); ?></label>
		<input class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" type="text" value="<?php echo $value; ?>">
	</p>

	<?php $id = 'in_category'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Filed under category ID(s): ' ); ?></label>
		<input class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" type="text" value="<?php echo $value; ?>">
	</p>

	<?php $id = 'orderby'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Order by: ' ); ?></label>
		<select class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" >
			<option disabled>- Select -</option>
			<option <?php selected( $value, "date" ); ?> value="date">Date (default)</option>
			<option <?php selected( $value, "rand" ); ?> value="rand">Random</option>
			<option <?php selected( $value, "comment_count" ); ?> value="comment_count">Comment Count</option>
			<option <?php selected( $value, "name" ); ?> value="name">Post slug</option>
			<option <?php selected( $value, "title" ); ?> value="title">Title</option>
			<option <?php selected( $value, "modified" ); ?> value="modified">Last modified</option>
		</select>
	</p>

	<?php $id = 'layout'; ?>
	<?php $field_id = $this->get_field_id( $id ); ?>
	<?php $field_name = $this->get_field_name( $id ); ?>
	<?php $value = esc_attr( $instance[ $id ] ); ?>
	<p>
		<label for="<?php echo $field_id; ?>"><?php _e( 'Layout Style: ' ); ?></label>
		<select class="widefat" id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" >
			<option disabled>- Select -</option>
			<option <?php selected( $value, "column" ); ?> value="column">Column</option>
			<option <?php selected( $value, "featured" ); ?> value="featured">Featured</option>
			<option <?php selected( $value, "row" ); ?> value="row">Row</option>
			<option <?php selected ($value, "full" ); ?> value="full">Full</option>
			<option <?php selected ($value, "deck" ); ?> value="deck">Deck</option>
			<option <?php selected( $value, "fancy" ); ?> value="fancy">Fancy</option>
		</select>
	</p>

	<?php }

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['has_tags'] = ( ! empty( $new_instance['has_tags'] ) ) ? strip_tags( $new_instance['has_tags'] ) : '';

		$instance['in_category'] = ( ! empty( $new_instance['in_category'] ) ) ? strip_tags( $new_instance['in_category'] ) : '';

		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';

		$instance['orderby'] = ( ! empty( $new_instance['orderby'] ) ) ? strip_tags( $new_instance['orderby'] ) : '';

		$instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? strip_tags( $new_instance['post_type'] ) : '';

		$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? strip_tags( $new_instance['number_of_posts'] ) : '';

		$instance['show_date'] = ( ! empty( $new_instance['show_date'] ) ) ? strip_tags( $new_instance['show_date'] ) : '';

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}

}

// Register and load the widget
function lamb_load_show_posts_widget() {
	register_widget( 'lamb_show_posts_widget' );
}
add_action( 'widgets_init', 'lamb_load_show_posts_widget' );

