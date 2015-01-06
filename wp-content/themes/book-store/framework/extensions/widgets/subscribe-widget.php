<?php

// CRUNCPRESS - SUBSCRIBE WIDGET

	add_action('init', 'subscription_widget');
	function subscription_widget() {
		
		$prefix = 'cp_subscribe-multi'; 
		$name = __('Crunchpress - Feed Subscription','crunchpress');
		$widget_ops = array('classname' => 'widget_subscribe_multi', 'description' => __('Subscribe via FeedBurner','crunchpress'));
		$control_ops = array('width' => 200, 'height' => 200, 'id_base' => $prefix);
		
		$options = get_option('widget_subscribe_multi');
		if(isset($options[0])) unset($options[0]);
		
		if(!empty($options)){
			foreach(array_keys($options) as $widget_number){
				wp_register_sidebar_widget($prefix.'-'.$widget_number, $name, 'widget_subscribe_multi', $widget_ops, array( 'number' => $widget_number ));
				wp_register_widget_control($prefix.'-'.$widget_number, $name, 'widget_subscribe_multi_control', $control_ops, array( 'number' => $widget_number ));
	
			}
		} else{
			$options = array();
			$widget_number = 1;
			wp_register_sidebar_widget($prefix.'-'.$widget_number, $name, 'widget_subscribe_multi', $widget_ops, array( 'number' => $widget_number ));
			wp_register_widget_control($prefix.'-'.$widget_number, $name, 'widget_subscribe_multi_control', $control_ops, array( 'number' => $widget_number ));
		}
	}

	function widget_subscribe_multi($args, $vars = array()) {
		extract($args);
		$widget_number = (int)str_replace('cp_subscribe-multi-', '', @$widget_id);
		$options = get_option('widget_subscribe_multi');
		if(!empty($options[$widget_number])){
			$vars = $options[$widget_number];
		}
		$title = $vars['title'];
		$feedId = $vars['feedId'];
		$rss = "";
		$email = "";
		$counter = "";
	
		
	
	?>
	<?php   echo $before_widget;
	          
			echo $before_title . $title . $after_title; ?>	
            <p>Subscribe to be the first to know about Best Deals and Exclusive Offers!</p>
			<form class="news-letter-widget" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedId ?>', 'popupwindow', 'scrollbars=yes,width=600,height=550');return true">
				<input type="text" class="field-bg" name="email" onblur="this.value=(this.value=='') ? 'Enter your email ID' : this.value;" onfocus="this.value=(this.value=='Enter your email ID') ? '' : this.value;" maxlength="150" value="Enter your email ID" />
				<input type="hidden" value="<?php echo $feedId ?>" name="uri"/>
				<input type="hidden" name="loc" value="en_US"/>
				<input type="submit" value="Subscribe" class="cp-button"/>			
            </form>
           
            
		<?php echo $after_widget; ?>
	<?php
	}
	function widget_subscribe_multi_control($args) {
	
		$prefix = 'cp_subscribe-multi'; // $id prefix
		
		$options = get_option('widget_subscribe_multi');
		if(empty($options)) $options = array();
		if(isset($options[0])) unset($options[0]);
			
		// update options array
		if(!empty($_POST[$prefix]) && is_array($_POST)){
			foreach($_POST[$prefix] as $widget_number => $values){
				if(empty($values) && isset($options[$widget_number])) // user clicked cancel
					continue;
				
				if(!isset($options[$widget_number]) && $args['number'] == -1){
					$args['number'] = $widget_number;
					$options['last_number'] = $widget_number;
				}
				$options[$widget_number] = $values;
			}
			
			// update number
			if($args['number'] == -1 && !empty($options['last_number'])){
				$args['number'] = $options['last_number'];
			}
			$options = bf_smart_multiwidget_update($prefix, $options, $_POST[$prefix], $_POST['sidebar'], 'widget_subscribe_multi');
		}
		$number = ($args['number'] == -1)? '%i%' : $args['number'];
		$opts = @$options[$number];
		$title = @$opts['title'];
		$feedId = @$opts['feedId'];
		$rss = @$opts['rss'];
		$email = @$opts['email'];
		$counter = @$opts['counter'];
	/*	?>
		<p>
			<label for="title">Title:
			<input type="text" name="<?php echo $prefix; ?>[<?php echo $number; ?>][title]" value="<?php echo $title; ?>" class="widefat" />
		</p>
		<?php
	*/
		?>
		
		<p>
			<label for="title">Title:
				<input class="widefat" type="text" name="<?php echo $prefix; ?>[<?php echo $number; ?>][title]" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="id">Feedburner Feed Id:
				<input class="widefat" type="text" name="<?php echo $prefix; ?>[<?php echo $number; ?>][feedId]" value="<?php echo $feedId; ?>" />
            </label>
		</p>
		<?php
	}

	// FUNCTIONS DEFINED
	function bf_smart_multiwidget_update($id_prefix, $options, $post, $sidebar, $option_name = ''){
		global $wp_registered_widgets;
		static $updated = false;

		// get active sidebar
		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();
		
		// search unused options
		foreach ( $this_sidebar as $_widget_id ) {
			if(preg_match('/'.$id_prefix.'-([0-9]+)/i', $_widget_id, $match)){
				$widget_number = $match[1];
				if(!in_array($match[0], $_POST['widget-id'])){
					unset($options[$widget_number]);
				}
			}
		}
		
		// update database
		if(!empty($option_name)){
			update_option($option_name, $options);
			$updated = true;
		}
		
		// return updated array
		return $options;
	}
	
?>