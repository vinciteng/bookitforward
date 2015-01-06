<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

class rpwe_widget extends WP_Widget
{

	/**
	 * Widget setup
	 */
	function rpwe_widget()
	{

		$widget_ops = array(
			'classname' => 'rpwe_widget recent-posts-extended',
			'description' => __('Advanced recent posts widget.', 'rpwe')
		);

		$control_ops = array(
			'width' => 300,
			'height' => 350,
			'id_base' => 'rpwe_widget'
		);

		$this->WP_Widget('rpwe_widget', __('Recent From Blog Widget', 'rpwe'), $widget_ops, $control_ops);

	}

	/**
	 * Display widget
	 */
	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);

		$title = apply_filters('widget_title', $instance['title']);
		$limit = $instance['limit'];
		$cat = $instance['cat'];
	
		echo $before_widget;

		if (!empty($title))
			echo $before_title . $title . $after_title;

		global $post;

		if (false === ($rpwewidget = get_transient('rpwewidget_' . $widget_id))) {

			$args = array(
				'numberposts' => $limit,
				'cat' => $cat,
				'post_type' => 'post'
			);

			$rpwewidget = get_posts($args);

			//by default, cache for 12 hours
			$cachelife = (is_numeric($cacheLife) ? $cacheLife : 43200);

			set_transient('rpwewidget_' . $widget_id, $rpwewidget, $cacheLife);

		} ?>


		<ul class="f2-pots-list">
         
				<?php foreach ($rpwewidget as $post) : setup_postdata($post); ?>
				
				 <li> <span class="post-date2">
				        	<span class="rpwe-time"><?php echo the_time('d') ?></span><br><?php echo the_time('M') ?>
						</span> <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'rpwe'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a> <span class="comments-num"> <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?>.</span> </li>

				
				<?php endforeach;
				wp_reset_postdata(); ?>

			</ul>


		<?php

		echo $after_widget;

	}

	/**
	 * Update widget
	 */
	function update($new_instance, $old_instance)
	{

		$instance = $old_instance;
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['limit'] = $new_instance['limit'];
		$instance['cat'] = $new_instance['cat'];
		
		delete_transient('rpwewidget_' . $this->id);

		return $instance;

	}

	/**
	 * Widget setting
	 */
	function form($instance)
	{

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => 'From the blog',
			'limit' => 5,
			'cat' => '',
			'post_type' => 'post',
		);

		$instance = wp_parse_args((array)$instance, $defaults);
		$title = esc_attr($instance['title']);
		$limit = $instance['limit'];
		$cat = $instance['cat'];
		$post_type = $instance['post_type'];

		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'rpwe'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>"/>
		</p>
	   
	   <p>
			<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php _e('Limit:', 'rpwe'); ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name('limit'); ?>" id="<?php echo $this->get_field_id('limit'); ?>">
				<?php for ($i = 1; $i <= 10; $i++) { ?>
					<option <?php selected($limit, $i) ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php _e('Limit to Category: ', 'rpwe'); ?></label>
			<?php wp_dropdown_categories(array('name' => $this->get_field_name('cat'), 'show_option_all' => __('All categories', 'rpwe'), 'hide_empty' => 1, 'hierarchical' => 1, 'selected' => $cat)); ?>
		</p>

	

	<?php
	}

}

/**
 * Register widget.
 *
 * @since 0.1
 */
function rpwe_register_widget()
{
	register_widget('rpwe_widget');
}

add_action('widgets_init', 'rpwe_register_widget');

/**
 * Print a custom excerpt.
 * http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 *
 * @since 0.1
 */
function rpwe_excerpt($length)
{

	$excerpt = explode(' ', get_the_excerpt(), $length);
	if (count($excerpt) >= $length) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '&hellip;';
	} else {
		$excerpt = implode(" ", $excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;

}

?>