<?php
if ( ot_get_option('enable_google_webfonts') ) {
/**
* Enqueue the google fonts for optiontree
*/
if ( ot_get_option('enable_google_webfonts') ) {
	function ub_google_fonts() {
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'ub-noto-serif', "$protocol://fonts.googleapis.com/css?family=Noto+Serif:400,700" );
		wp_enqueue_style( 'ub-copse', "$protocol://fonts.googleapis.com/css?family=Copse" );
		wp_enqueue_style( 'ub-pt-sans-narrow', "$protocol://fonts.googleapis.com/css?family=PT+Sans+Narrow" );
		wp_enqueue_style( 'ub-pt-sans', "$protocol://fonts.googleapis.com/css?family=PT+Sans" );
		wp_enqueue_style( 'ub-cuprum', "$protocol://fonts.googleapis.com/css?family=Cuprum" );
		wp_enqueue_style( 'ub-special-elite', "$protocol://fonts.googleapis.com/css?family=Special+Elite" );
		wp_enqueue_style( 'ub-dancing-script', "$protocol://fonts.googleapis.com/css?family=Dancing+Script" );
		wp_enqueue_style( 'ub-pacifico', "$protocol://fonts.googleapis.com/css?family=Pacifico" );
		wp_enqueue_style( 'ub-neucha', "$protocol://fonts.googleapis.com/css?family=Neucha" );
		wp_enqueue_style( 'ub-cabin', "$protocol://fonts.googleapis.com/css?family=Cabin" );
		wp_enqueue_style( 'ub-cabin-sketch', "$protocol://fonts.googleapis.com/css?family=Cabin+Sketch" );
		wp_enqueue_style( 'ub-josefin-slab', "$protocol://fonts.googleapis.com/css?family=Josefin+Slab" );
		wp_enqueue_style( 'ub-amaranth', "$protocol://fonts.googleapis.com/css?family=Amaranth" );
		wp_enqueue_style( 'ub-didact-gothic', "$protocol://fonts.googleapis.com/css?family=Didact+Gothic" );
		wp_enqueue_style( 'ub-goudy-bookletter-1911', "$protocol://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" );
		wp_enqueue_style( 'ub-six-caps', "$protocol://fonts.googleapis.com/css?family=Six+Caps" );
		wp_enqueue_style( 'ub-raleway', "$protocol://fonts.googleapis.com/css?family=Raleway" );
		wp_enqueue_style( 'ub-tinos', "$protocol://fonts.googleapis.com/css?family=Tinos" );
		wp_enqueue_style( 'ub-kameron', "$protocol://fonts.googleapis.com/css?family=Kameron" );
		wp_enqueue_style( 'ub-arvo', "$protocol://fonts.googleapis.com/css?family=Arvo" );
		wp_enqueue_style( 'ub-bevan', "$protocol://fonts.googleapis.com/css?family=Bevan" );
		wp_enqueue_style( 'ub-maiden-orange', "$protocol://fonts.googleapis.com/css?family=Maiden+Orange" );
		wp_enqueue_style( 'ub-shanti', "$protocol://fonts.googleapis.com/css?family=Shanti" );
		wp_enqueue_style( 'ub-varela-round', "$protocol://fonts.googleapis.com/css?family=Varela+Round" );
		wp_enqueue_style( 'ub-neuton', "$protocol://fonts.googleapis.com/css?family=Neuton" );
		wp_enqueue_style( 'ub-im-fell-great-primer', "$protocol://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" );
		wp_enqueue_style( 'ub-oswald', "$protocol://fonts.googleapis.com/css?family=Oswald" );
		wp_enqueue_style( 'ub-yellowtail', "$protocol://fonts.googleapis.com/css?family=Yellowtail" );
		wp_enqueue_style( 'ub-questrial', "$protocol://fonts.googleapis.com/css?family=Questrial" );
		wp_enqueue_style( 'ub-lobster', "$protocol://fonts.googleapis.com/css?family=Lobster" );
		wp_enqueue_style( 'ub-crimson-text', "$protocol://fonts.googleapis.com/css?family=Crimson+Text" );
		wp_enqueue_style( 'ub-pt-sans', "$protocol://fonts.googleapis.com/css?family=PT+Sans" );
		wp_enqueue_style( 'ub-lekton', "$protocol://fonts.googleapis.com/css?family=Lekton" );
		wp_enqueue_style( 'ub-molengo', "$protocol://fonts.googleapis.com/css?family=Molengo" );
		wp_enqueue_style( 'ub-ubuntu', "$protocol://fonts.googleapis.com/css?family=Ubuntu" );
		wp_enqueue_style( 'ub-vollkorn', "$protocol://fonts.googleapis.com/css?family=Vollkorn" );
	}
	add_action( 'wp_enqueue_scripts', 'ub_google_fonts' );
}

function filter_ot_recognized_font_families( $array, $field_id ) {
	/* only run the filter when the field ID is enable_google_webfonts */
	$array = array(
		'FiraSans'               => '"Fira Sans", sans-serif', //embeded
		'OpenSansLight'          => '"OpenSansLight", sans-serif', //embeded
		'OpenSansRegular'        => '"OpenSansRegular", sans-serif', //embeded
		'OpenSansSemibold'       => '"OpenSansSemibold", sans-serif', //embeded
		'OpenSansBold'           => '"OpenSansBold", sans-serif', //embeded
		'BitterRegular'          => '"BitterRegular", serif', //embeded
		'BitterBold'             => '"BitterBold", serif', //embeded
		'LatoRegular'            => '"LatoRegular", sans-serif', //embeded
		'LatoLight'              => '"LatoLight", sans-serif', //embeded
		'LatoBold'               => '"LatoBold", sans-serif', //embeded
		'MerriweatherRegular'    => '"MerriweatherRegular", serif', //embeded
		'MerriweatherLight'      => '"MerriweatherLight", serif', //embeded
		'MerriweatherBold'       => '"MerriweatherBold", serif', //embeded
		'noto-serif'             => '"Noto Serif", serif',
		'copse'                  => 'Copse, serif',
		'pt-sans-narrow'         => '"PT Sans Narrow", serif',
		'pt-sans'                => '"PT Sans", sans',
		'cuprum'                 => 'Cuprum, sans-serif',
		'special-elite'          => '"Special Elite", serif',
		'dancing-script'         => '"Dancing Script", serif',
		'pacifico'               => 'Pacifico, serif',
		'neucha'                 => 'Neucha, sans-serif',
		'cabin'                  => 'Cabin, sans-serif',
		'cabin-sketch'           => '"Cabin Sketch", sans-serif',
		'josefin-slab'           => '"Josefin Slab", serif',
		'amaranth'               => 'Amaranth, sans-serif',
		'didact-gothic'          => '"Didact Gothic", sans-serif',
		'goudy-bookletter-1911'  => '"Goudy Bookletter 1911", serif',
		'six-caps'               => '"Six Caps", sans-serif',
		'raleway'                => 'Raleway, sans-serif',
		'tinos'                  => 'Tinos, serif',
		'kameron'                => 'Kameron, serif',
		'arvo'                   => 'Arvo, sans-serif',
		'bevan'                  => 'Bevan, serif',
		'maiden-orange'          => 'Maiden Orange, serif',
		'shanti'                 => 'Shanti, sans-serif',
		'varela-round'           => '"Varela Round", sans-serif',
		'neuton'                 => 'Neuton, serif',
		'im-fell-great-primer'   => '"IM Fell Great Primer", serif',
		'oswald'                 => 'Oswald, sans-serif',
		'yellowtail'             => 'Yellowtail, cursive',
		'questrial'              => 'Questrial, sans-serif',
		'lobster'                => 'Lobster, serif',
		'crimson-text'           => '"Crimson Text", serif',
		'pt-sans'                => '"PT Sans", serif',
		'lekton'                 => 'Lekton, sans-serif',
		'molengo'                => 'Molengo, sans-serif',
		'ubuntu'                 => 'Ubuntu, sans-serif',
		'vollkorn'               => 'Vollkorn, serif',
	);
return $array;
}

add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 );

} else {

	function filter_ot_recognized_font_families( $array, $field_id ) {

	/* only run the filter when the field ID is enable_google_webfonts */
	$array = array(
		'FiraSans'               => '"Fira Sans", sans-serif',
		'OpenSansLight'          => '"OpenSansLight", sans-serif',
		'OpenSansRegular'        => '"OpenSansRegular", sans-serif',
		'OpenSansSemibold'       => '"OpenSansSemibold", sans-serif',
		'OpenSansBold'           => '"OpenSansBold", sans-serif',
		'BitterRegular'          => '"BitterRegular", serif',
		'BitterBold'             => '"BitterBold", serif',
		'LatoRegular'            => '"LatoRegular", sans-serif',
		'LatoLight'              => '"LatoLight", sans-serif',
		'LatoBold'               => '"LatoBold", sans-serif',
		'MerriweatherRegular'    => '"MerriweatherRegular", serif',
		'MerriweatherLight'      => '"MerriweatherLight", serif',
		'MerriweatherBold'       => '"MerriweatherBold", serif',
		'arial'                  => 'Arial, sans-serif',
		'georgia'                => 'Georgia, serif',
		'helvetica'              => 'Helvetica, sans-serif',
		'palatino'               => 'Palatino, serif',
		'tahoma'                 => 'Tahoma, sans-serif',
		'times'                  => '"Times New Roman", sans-serif',
		'trebuchet'              => 'Trebuchet, sans-serif',
		'verdana'                => 'Verdana, sans-serif',
	);
		return $array;
	}
	add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 );
}