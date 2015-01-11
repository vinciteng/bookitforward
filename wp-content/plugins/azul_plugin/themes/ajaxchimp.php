<?php
$content = '
<script type="text/javascript">
	
	var urlForm =  \''.azul_top('mailchimp_url').'\';
	var u = \''.azul_top('mailchimp_u').'\';
	var id = \''.azul_top('mailchimp_id').'\';

    $(\'#mc-form\').ajaxChimp({
	    url: urlForm+\'?u=\'+u+\'&amp;id=\'+id  ';

		switch (azul_top('language')) {
	    	case 'english':
	    		$content.= '';	
	    	break;
	    	case 'spanish':
	    		$content.= 'language: \'es\'';	
	    	break;
	    	case 'french':
	    		$content.= 'language: \'fr\'';	
	    	break;
	    	case 'german':
	    		$content.= 'language: \'de\'';	
	    	break;
	    	case 'italian':
	    		$content.= 'language: \'it\'';	
	    	break;
	    	case 'portuguese':
	    		$content.= 'language: \'po\'';	
	    	break;
	    	case 'russian':
				$content.= 'language: \'ru\'';
    		break;
    		default:
    			$content.= '';
		};
		
		$content.= '
	});

</script>';
?>
