<?php 

// Add styles/classes to the "Styles" drop-down to tinyMCE

add_filter( 'mce_buttons_2', 'capital_mce_editor_buttons' );
function capital_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'ub_capital_mce_before_init' );
function ub_capital_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' => 'iLightBox',
            'selector' => 'a',
            'classes' => 'ilightbox'
        ),
        array(
            'title' => 'iLightBox Video',
            'selector' => 'a',
            'classes' => 'ilightbox-video'
        ),
        array(
            'title' => 'Grey Scale Image',
            'selector' => 'img',
            'classes' => 'grey-scale'
        ),
        array(
            'title' => 'Round Image',
            'selector' => 'img',
            'classes' => 'round'
        ),
        array(
            'title' => 'Radius Image',
            'selector' => 'img',
            'classes' => 'radius'
        ),
        array(
            'title' => 'Lead',
            'selector' => 'p,div,ul,ol',
            'classes' => 'lead'
            ),
        array(
            'title' => 'DropCap',
            'selector' => 'p',
            'classes' => 'dropcap'
        ),
        array(
            'title' => 'Light Text',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,',
            'classes' => 'light-text'
        ),
        array(
            'title' => 'Fade In',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'animated fadeIn'
            ),
        array(
        	'title' => 'Fade In Left',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'animated fadeInLeft'
            ),
        array(
    		'title' => 'Fade In Right',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'animated fadeInRight'
            ),
        array(
			'title' => 'Fade In Up',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'animated fadeInUp'
            ),
        array(
			'title' => 'Fade In Down',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'animated fadeInDown'
            ),
        array(
			'title' => 'Caption Style',
            'selector' => 'p',
            'classes' => 'caption-style'
        ),
        array(
            'title' => 'Alert Success',
            'selector' => 'div,p',
            'classes' => 'alert alert-success'
        ),
        array(
            'title' => 'Alert Info',
            'selector' => 'div,p',
            'classes' => 'alert alert-info'
        ),
        array(
            'title' => 'Alert Warning',
            'selector' => 'div,p',
            'classes' => 'alert alert-warning'
        ),
        array(
            'title' => 'Alert Danger',
            'selector' => 'div,p',
            'classes' => 'alert alert-danger'
        ),
        array(
            'title' => 'Title Heading',
            'selector' => 'h1,h2,h3,h4,h5,h6',
            'classes' => 'title'
        ),
        array(
            'title' => 'Simple Table',
            'selector' => 'table',
            'classes' => 'table'
        ),
        array(
            'title' => 'Striped Table',
            'selector' => 'table',
            'classes' => 'table table-striped'
        ),
        array(
            'title' => 'Bordered Table',
            'selector' => 'table',
            'classes' => 'table table-bordered'
        ),
        array(
            'title' => 'Hover Table',
            'selector' => 'table',
            'classes' => 'table table-hover'
        ),
        array(
            'title' => 'Condensed Table',
            'selector' => 'table',
            'classes' => 'table table-condensed'
        ),
        array(
            'title' => 'No Margin',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'no-margin'
        ),
        array(
            'title' => 'No Margin Top',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'no-margin-top'
        ),
        array(
            'title' => 'No Margin Bottom',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'no-margin-bottom'
        ),
        array(
            'title' => 'No Margin Right',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'no-margin-right'
        ),
        array(
            'title' => 'No Margin Left',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
            'classes' => 'no-margin-left'
        ),
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
/* Learn TinyMCE style format options at http://www.tinymce.com/wiki.php/Configuration:formats */

?>