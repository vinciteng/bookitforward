<?php

function azul_countdown() {
	if (azul_top('countdown_activation') == 'countdown') {
		include('language.php');
        $date = azul_top('launch_date');
        $today = date('Y-m-d h:i:s a');
        if (strtotime($date) > strtotime($today)){

        $content = '<div class="timer fadeOut-2">
		<script type="text/javascript">
		var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")
		function countdown(yr,m,d,h,i,s){
		theyear=yr;themonth=m;theday=d;thehour=h;themin=i;thesec=s
		var today=new Date()
		var todayy=today.getYear()
		if (todayy < 1000)
		todayy+=1900
		var todaym=today.getMonth()
		var todayd=today.getDate()
		var todayh=today.getHours()
		var todaymin=today.getMinutes()
		var todaysec=today.getSeconds()
		var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec
		futurestring=montharray[m-1]+" "+d+", "+yr+" "+h+":"+i+":"+s
		dd=Date.parse(futurestring)-Date.parse(todaystring)
		dday=Math.floor(dd/(60*60*1000*24)*1)
		dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1)
		dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1)
		dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1)
		if((dday<=0)&&(dhour<=0)&&(dmin<=0)&&(dsec<=0)){';
        if (azul_top('date_ended') == 'text') {
        	$content.='$(\'.timer\').text(\''.azul_top('date_text_ended').'\');';	
	    } else{
	    	$content.='$(\'.timer\').fadeOut();';	
	    }
		$content.= '}
		else 
		$(\'.timer\').html(\'<ul><li><h1 class="days">\'+dday+\'</h1><p class="daysText"></p></li><li><h1 class="hours">\'+dhour+\'</h1><p class="hoursText"></p></li><li><h1 class="minutes">\'+dmin+\'</h1><p class="minutesText"></p></li><li><h1 class="seconds">\'+dsec+\'</h1><p class="secondsText"></p></li></ul>\');
		if ( dday == 1 ){$(\'.daysText\').text("'.$day.'"); }else{ $(\'.daysText\').text("'.$days.'"); }
		if ( dhour == 1 ){ $(\'.hoursText\').text("'.$hour.'"); }else{ $(\'.hoursText\').text("'.$hours.'"); }
		if ( dmin == 1 ){ $(\'.minutesText\').text("'.$minute.'"); }else{ $(\'.minutesText\').text("'.$minutes.'"); }
		if ( dsec == 1 ){ $(\'.secondsText\').text("'.$second.'"); }else{ $(\'.secondsText\').text("'.$seconds.'");}
		setTimeout("countdown(theyear,themonth,theday,thehour,themin,thesec)",1000);
		}
		countdown(' . date('Y', strtotime($date)) . ',' . date('m', strtotime($date)) . ',' . date('d', strtotime($date)) . ',' . date('H', strtotime($date)) . ',' . date('i', strtotime($date)) . ',' . date('s', strtotime($date)) . ')
		</script>
		    <noscript>
		        <span class="launch-date">' . date('M dS, Y') . '</span>
		    </noscript>
		</div>';

        }else{
	        if (azul_top('date_ended') == 'text') {	
		        $content = '
		        <div class="timer fadeOut-2">
					<h1>'.azul_top('date_text_ended').'</h1>
		        </div>';
	        }else{
	        	$content = '';
	        }
        }

    } elseif (azul_top('countdown_activation') == 'text') {
        $content = '
        <div class="timer fadeOut-2">
			<h1>'.azul_top('date_text').'</h1>
		</div>';
    } else {
        $content = '';
    }
    return $content;
}

function azul_email_subscription() {
	$content = '
	<script type="text/javascript">
	$(\'.success-message\').hide();
    $(\'.error-message\').hide();

    $(\'.subscribe form\').submit(function() {
        var postdata = $(\'.subscribe form\').serialize();
        $.ajax({
            type: \'POST\',
            url: \''.azul_product_info('extend_url').'/themes/php/sendmail.php\',
            data: postdata,
            dataType: \'json\',
            success: function(json) {
                if(json.valid == 0) {
                    $(\'.success-message\').hide();
                    $(\'.error-message\').hide();
                    $(\'.error-message\').html(json.message);
                    $(\'.error-message\').fadeIn().delay(3000).fadeOut();
                }
                else {
                    $(\'.error-message\').hide();
                    $(\'.success-message\').hide();
                    $(\'.subscribe form\').hide().delay(3000).fadeIn();
					$(\'.subscribe form input\').val(\'\');
                    $(\'.success-message\').html(json.message);
                    $(\'.success-message\').fadeIn().delay(2000).fadeOut();
                }
            }
        });
        return false;
    });
	</script>';
    return $content;
    
}


function azul_contact_form() {
	$content = '
	<script type="text/javascript">
	$(\'.success-message-2\').hide();
    $(\'.error-message-2\').hide();

    $(\'#contactform\').submit(function() {
        var postdata = $(\'#contactform\').serialize();
        $.ajax({
            type: \'POST\',
            url: \''.azul_product_info('extend_url').'/themes/php/contact.php\',
            data: postdata,
            dataType: \'json\',
            success: function(json) {
                if(json.valid == 0) {
                    $(\'.success-message-2\').hide();
                    $(\'.error-message-2\').hide();
                    $(\'.error-message-2\').html(json.message);
                    $(\'.error-message-2\').fadeIn().delay(3000).fadeOut();
                }
                else {
                    $(\'.error-message-2\').hide();
                    $(\'.success-message-2\').hide();
                    $(\'#contactform\').hide().delay(3000).fadeIn();
                    $(\'#contactform input\').val(\'\');
                    $(\'#contactform textarea\').val(\'\');
                    $(\'.success-message-2\').html(json.message);
                    $(\'.success-message-2\').fadeIn().delay(2000).fadeOut();
                }
            }
        });
        return false;
    });
	</script>';
    return $content;
    
}

function contact_captcha(){
	$codigo='';
	$longitud = 5;
	for ($i=1; $i<=$longitud; $i++) {
		$letra= chr(rand(48,57));
		$codigo.=$letra;
	}
	
	 return $codigo;
}

function azul_map() {
	$coord=explode(', ',azul_top('map_coordinates'));
	$content = '
	<script type="text/javascript">
	var styles = [
	    {
	      stylers: [
	        { saturation: -100 }
	      ]
	    }
	  ];

	  var styledMap = new google.maps.StyledMapType(styles,
	    {name: "Styled Map"});

	  var mapOptions = {
	    zoom: 14,
	    scrollwheel: false,
	    center: new google.maps.LatLng('.azul_top('map_coordinates').'),
	    markers: [{
		  latitude: '.$coord[0].', 
		  longitude: '.$coord[1].'
		}],
	    mapTypeControlOptions: {
	      mapTypeIds: [google.maps.MapTypeId.ROADMAP, \'map_style\']
	    }
	  };
	  var map = new google.maps.Map(document.getElementById(\'map\'), mapOptions);

	  //Associate the styled map with the MapTypeId and set it to display.
	  map.mapTypes.set(\'map_style\', styledMap);
	  map.setMapTypeId(\'map_style\');
	</script>';
return $content;
}