<?php
echo '
<script type="text/javascript">

if( !device.tablet() && !device.mobile() ) {

(function($) {
  "use strict";
	// initialize BigVideo
    var BV = new $.BigVideo();
	BV.init();
	';
if (azul_top('video_sound') == 'enable'){
	echo 'BV.show(\''.azul_top('video_internal').'\');';
	}else{
	echo 'BV.show(\''.azul_top('video_internal').'\',{ambient:true});';
	}	
echo '})(jQuery);

} else {
	
	$(\'body\').addClass(\'poster-image\');
	
}

</script>';
?>
