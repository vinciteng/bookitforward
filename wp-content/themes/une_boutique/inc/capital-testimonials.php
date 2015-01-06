<?php
add_action( 'init', 'ub_register_capital_testimonials' );

function ub_register_capital_testimonials() {
    $labels = array(
		'name'                => _x( 'Capital Testimonials', 'warp' ),
		'singular_name'       => _x( 'Testimonial', 'warp' ),
		'add_new'             => _x( 'Add New', 'warp' ),
		'add_new_item'        => _x( 'Add New', 'warp' ),
		'edit_item'           => _x( 'Edit Testimonial', 'warp' ),
		'new_item'            => _x( 'New Testimonial', 'warp' ),
		'view_item'           => _x( 'View Testimonial', 'warp' ),
		'search_items'        => _x( 'Search Sliders', 'warp' ),
		'not_found'           => _x( 'No Testimonials found', 'warp' ),
		'not_found_in_trash'  => _x( 'No Testimonials found in Trash', 'warp' ),
		'menu_name'           => _x( 'Testimonials', 'warp' ),
    );
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'Testimonial widget/shortcode by CapitalH',
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'category' ),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => '',
		'menu_icon'           => get_template_directory_uri() . '/images/ct.png',
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'has_archive'         => true,
		'query_var'           => 'ct_query',
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
    );
    register_post_type( 'capital_testimonials', $args );
}

add_filter( "manage_capital_testimonials_posts_columns", "ub_change_ct_columns" );
add_action( "manage_posts_custom_column", "ub_custom_ct_columns", 10, 2 );

function ub_change_ct_columns( $cols ) {
  $cols = array(
    'cb'            =>    '<input type="checkbox" />',
    'title'         =>    __( 'Title', 'warp' ),
    'ct-image'      =>    __( 'Image', 'warp' ),
    'author'        =>    __( 'Author', 'warp' ),
    'categories'    =>    __( 'Category', 'warp' ),
  );
  return $cols;
}

function ub_custom_ct_columns( $column, $post_id ) {
	global $wpdb, $post;

	switch ( $column ) {
		case 'ct-image':
			$value   = get_the_post_thumbnail( get_the_ID(), array(40,40), '');
			echo $value;
			break;
  }
}

// Make these columns sortable
function ub_sortable_ct_columns() {
  return array(
    'title'         =>    __( 'Title', 'warp' ),
    'author'        =>    __( 'Author', 'warp' ),
    'categories'    =>    __( 'Category', 'warp' ),
  );
}
add_filter( "manage_edit-capital_testimonials_sortable_columns", "ub_sortable_ct_columns" );

add_action('admin_head', 'ub_edit_ct_admin_css');
  function ub_edit_ct_admin_css() {
  global $post_type;
  if( $post_type == 'capital_testimonials' ) {
      ?>
        <style type="text/css">
        <!--
          #titlediv { margin-bottom: 10px; }
          #edit-slug-box { display: none; }
          #misc-publishing-actions,
          #minor-publishing-actions { display: none; }
          #poststuff h3, .metabox-holder h3 { padding: 15px 15px; box-shadow: none;}
          #poststuff h3.hndle { background: #F7F7F7 !important; font-family: sans-serif !important; }
          .js .meta-box-sortables .postbox:hover .handlediv { background-position: 0px 15px; }
          .widget, #widget-list .widget-top, .postbox, .menu-item-settings { background: #FCFCFC !important; }
          .widget, #widget-list .widget-top, .postbox,
          #titlediv, #poststuff .postarea, .stuffbox { border-color: #E7E7E7; }
          .fixed .column-posts { width: 20%; }
          -->
        </style>
      <?php
  }
}

/*--------------------------------------------------------------------
/*  Capital Testimonials custom fields
/*--------------------------------------------------------------------

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'ub_ct_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function ub_ct_custom_meta_boxes() {

$ct_meta_box = array(
	'id'          => 'ct_meta_box',
	'title'       => 'Testimonial Details',
	'desc'        => '',
	'pages'       => array( 'capital_testimonials' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'       => 'Gravatar E-mail Address (Optional)',
			'id'          => 'gravatar_email_address',
			'type'        => 'text',
			'desc'        => 'Enter in an e-mail address, to use a <a target="_blank" href="http://gravatar.com/">Gravatar</a>, instead of using the "Featured Image".',
			'std'         => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
		),
		array(
			'label'       => 'Byline (Optional)',
			'id'          => 'byline',
			'type'        => 'text',
			'desc'        => 'Enter a byline for the customer giving this testimonial (eg. "CEO of CapitalH").',
			'std'         => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
		),
		array(
			'label'       => 'URL',
			'id'          => 'url',
			'type'        => 'text',
			'desc'        => 'Enter a URL that applies to this customer (for example: http://capitalh.ir/).',
			'std'         => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => ''
		),
	)
);
	ot_register_meta_box( $ct_meta_box );
}

/*-----------------------------------------------------------------------------------*/
/*   Testimonials Output Function
/*-----------------------------------------------------------------------------------*/

function ub_get_testimonials( $posts_per_page = 1, $orderby = 'none', $testimonial_id = null, $type = 'static' ) {
	$args = array(
		'posts_per_page' => (int) $posts_per_page,
		'post_type'      => 'capital_testimonials',
		'orderby'        => $orderby,
		'no_found_rows'  => true,
		'type'           => $type,
	);
	if ( $testimonial_id )
		$args['post__in'] = array( $testimonial_id );

	$query = new WP_Query( $args );
	$count_posts = wp_count_posts( 'capital_testimonials', '' );
	$count_posts = $count_posts->publish;

	$testimonials  = '';

	$type_class = '';
	if ( $type == 'slider' ) {
		$type_class = 'owl-carousel capital-testimonial-slider';
	}

	$testimonials .= '<div id="capital-testimonials" class="'.$type_class.' capital-testimonials display-table">';

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) : $query->the_post();
		$post_id                = get_the_ID();
		$the_title              = get_the_title();
		$byline                 = get_post_meta( $post_id, 'byline', true );
		$url                    = get_post_meta( $post_id, 'url', true );
		$gravatar_email_address = get_post_meta( $post_id, 'gravatar_email_address', true );
		$thumb_size             = array( 80, 80 );

		if ( $gravatar_email_address ) {
			$the_image  = get_avatar( $gravatar_email_address, $size = $thumb_size[0] );
		} else {
			$the_image = get_the_post_thumbnail( $post_id, $thumb_size );
		}

		$classes = 'has-thumb';
		if ( !$the_image ) {
			$classes = ' no-thumb';
		}

		if ( $testimonial_id || $count_posts == 1 || $posts_per_page == 1 || $type == 'slider' ) {
			$classes .= ' single-item';
		}

		// the output
		if( $query->current_post%2 == 0 && $type !== 'slider' ) {
			$testimonials .= '<section class="the-quote-row display-table-row">';
		}

		$testimonials .= '<div class="the-quote display-table-cell '.$classes.' clearfix">';

		if ($the_image) {
			if ( $url ) {
			$testimonials .= '<div class="testimonial-image">';
			$testimonials .= '<a class="the-url" href="' . $url . '">' . $the_image . '</a>';
			$testimonials .= '</div>';
			} else {
				$testimonials .= '<div class="testimonial-image">' . $the_image . '</div>';
			}
		}

		$testimonials .= '<div class="testimonial-text">' . get_the_content() . '</div>';
		$testimonials .= '<div class="testimonial-meta">';

		if ($the_title) {
			$testimonials .= '<cite><strong><span class="the-title">' . $the_title . '</span><br>';
		}

		if ($byline) {
			$testimonials .= ' <span class="the-byline">' . $byline .'</span></strong></cite>';
		}

		if ( $url ) {
			$testimonials .= ' - <a class="the-url" href="' . $url . '">'. $url .'</a>';
		}

		$testimonials .= '</div>';
		$testimonials .= '</div>';

		if( $type !== 'slider' && $query->current_post%2 == 1 ) {
			$testimonials .= '</section>';
		}
		// end of outpu

		endwhile;
		wp_reset_postdata();
	}

	$testimonials .= '</div>';

	return $testimonials;
}

/*-----------------------------------------------------------------------------------*/
/*	Capital Testimonials Widget
/*-----------------------------------------------------------------------------------*/

class Capital_Testimonials extends WP_Widget {
  
    /** constructor -- name this the same as the class above */
    function __construct() {
        parent::__construct(
            'Capital_Testimonials', // Base ID
            __('Capital Testimonials(CT)', 'warp'), // Name
            array( 'description' => __( 'Capital Testimonials/Slider Widget', 'warp' ), ) // Args
        );
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) { 
        extract( $args );
        $title = $instance['title'];
        $posts_per_page = (int) $instance['posts_per_page'];
		$orderby = strip_tags( $instance['orderby'] );
		$type = $instance['type'];
		$testimonial_id = strip_tags( $instance['testimonial_id'] );
        
		echo $before_widget;

		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		} else {
			echo $before_title . "TESTIMONIALS" . $after_title;
		}

		echo ub_get_testimonials( $posts_per_page, $orderby, $testimonial_id, $type );

		echo $after_widget;
    }
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {   
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['posts_per_page'] = (int) $new_instance['posts_per_page'];
	$instance['orderby'] = strip_tags( $new_instance['orderby'] );
	$instance['type'] = $new_instance['type'];
	$instance['testimonial_id'] = strip_tags( $new_instance['testimonial_id'] );
      return $instance;
    }
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
		$title = isset($instance['title']) ? $instance['title'] : "";
        $posts_per_page = isset($instance['posts_per_page']) ? (int) $instance['posts_per_page'] : "4";
		$orderby = isset( $instance['orderby'] ) ? strip_tags( $instance['orderby'] ) : "";
		$type = isset( $instance['type'] ) ? $instance['type'] : "";
		$testimonial_id = isset( $instance['type'] ) ? strip_tags( $instance['testimonial_id'] ) : ""; ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','warp'); ?></label> 
		<input class="widefat" placeholder="<?php _e( 'TESTIMONIALS', 'une_boutique' ) ?>" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>"><?php _e( 'Number of Testimonials:', 'warp' ) ?> </label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>" />
		</p>

		<p><label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', 'warp' ) ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
			<option value="none" <?php selected( $orderby, 'none' ); ?>><?php _e( 'None', 'warp' ) ?></option>
			<option value="ID" <?php selected( $orderby, 'ID' ); ?>><?php _e( 'ID', 'warp' ) ?></option>
			<option value="date" <?php selected( $orderby, 'date' ); ?>><?php _e( 'Date', 'warp' ) ?></option>
			<option value="modified" <?php selected( $orderby, 'modified' ); ?>><?php _e( 'Modified', 'warp' ) ?></option>
			<option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php _e( 'Random', 'warp' ) ?></option>
		</select></p>

		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Testimonial Type', 'warp' ) ?></label>
		<p><select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>">
			<option value="static" <?php selected( $type, 'static' ); ?>><?php _e( 'Static', 'warp' ) ?></option>
			<option value="slider" <?php selected( $type, 'slider' ); ?>><?php _e( 'Slider', 'warp' ) ?></option>
		</select></p>

		<p><label for="<?php echo $this->get_field_id( 'testimonial_id' ); ?>"><?php _e( 'Testimonial ID (single item)', 'selftitled' ) ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_id' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_id' ); ?>" type="text" value="<?php echo $testimonial_id; ?>" /></p>
		</select>
		</p>
        <?php 
    }

} // end class Capital_Testimonial_Widget
add_action('widgets_init', create_function( '', 'return register_widget("Capital_Testimonials");' ) );