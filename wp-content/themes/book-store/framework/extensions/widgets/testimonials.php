<?php
/**
 * Plugin Name: Goodlayers Recent Portfolio
 * Description: A widget that show recent portfolio( Specified by portfolio-category ).
 * Version: 1.0
 * Author: Sittipol Sunthornpiyakul
 * Author URI: http://www.goodlayers.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'testimonial_widget' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function testimonial_widget() {
	register_widget( 'Testimonials' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Testimonials extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Testimonials() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'testimonial-widget', 'description' => __('A widget that show last portfolio', 'cp_back_office') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'testimonial-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'testimonial-widget', __('Testimonials', 'cp_back_office'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('Testimonials', $instance['title'] );
		$port_cat = $instance['port_cat'];
		if($port_cat == "All"){ $port_cat = ''; }
		$show_num = $instance['show_num'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
			
		/* Display the widget title if one was input (before and after defined by themes). */
		$custom_posts = get_posts('post_type=testimonial&showposts='.$show_num.'&testimonial-category='.$port_cat);
		if( !empty($custom_posts) ){ 
			echo "<div class='testimonial-widget'>";
			global $item_xml;
			$item_size = find_xml_value($item_xml, 'item-size');
			$category = find_xml_value($item_xml, 'category');
			$category = ( $category == 'All' )? '': $category;
			$category_posts = get_posts(array('post_type'=>'testimonial', 'testimonial-category'=>$category, 'numberposts'=>100));
			echo '<div class="tastimonialcon">';
			echo '<div class="jcarousellite-nav"><div class="prev"></div><div class="next"></div></div>';
			if(!empty($header)){
				echo '<h3 class="testimonial-header-title title-color cp-title">' . $header . '</h3>';
			}else{
				echo '<div class="testimonial-no-header"></div>';
			}
			echo '<div class="jcarousellite"><ul>';
			foreach( $category_posts as $category_post){
				echo '<li class="one-third column wrapper mt0">';
				echo '<div class="testimonial-content">';
				echo '<div class="testimonial-icon"></div>';
				echo $category_post->post_content;
				echo '</div>';
				$position = printf(__('%s','crunchpress'), get_post_meta(  $category_post->ID, 'testimonial-option-author-position', true ) );
				echo '<div class="testimonial-author cp-divider">';
				echo '<span class="testimonial-author-name">' . $category_post->post_title . '</span>';
				if( !empty( $position ) ){
					echo '<span class="testimonial-author-position">, '; 
					echo $position;
					echo '</span>';
				}
				echo '</div>';
				echo '</li>';
			}
			echo '</ul></div>';
			echo '</div>';
		}
						
			
			echo "</div>";
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['port_cat'] = strip_tags( $new_instance['port_cat'] );
		$instance['show_num'] = strip_tags( $new_instance['show_num'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Testimonials', 'cp_back_office'), 'port_cat' => __('All', 'cp_back_office'), 'show_num' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title :', 'cp_back_office'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="width100" />
		</p>

		<!-- Your Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'port_cat' ); ?>"><?php _e('Category :', 'cp_back_office'); ?></label>		
			<select name="<?php echo $this->get_field_name( 'port_cat' ); ?>" id="<?php echo $this->get_field_id( 'port_cat' ); ?>">
				
			<?php 	
			$category_list = get_category_list( 'testimonial-category' ); 
			foreach($category_list as $category ){
			?>
				<option value="<?php echo $category; ?>" <?php if (  $instance['port_cat'] == $category ) echo ' selected="selected"'; ?>><?php echo $category; ?></option>				
			<?php } ?>	
			</select> 
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_num' ); ?>"><?php _e('Show Count :', 'cp_back_office'); ?></label>
			<input id="<?php echo $this->get_field_id( 'show_num' ); ?>" name="<?php echo $this->get_field_name( 'show_num' ); ?>" value="<?php echo $instance['show_num']; ?>" class="width100" />
		</p>

	<?php
	}
}

?>