<?php
echo '
<script type="text/javascript">
$(window).load(function() {
	"use strict";
    /* ==============================================
    PRELOADER
    =============================================== */
    var preloaderDelay = 500;
    var preloaderFadeOutTime = 800;

    function hidePreloader() {
        var loadingAnimation = $(\'#loading-animation\');
        var preloader = $(\'#preloader\');

        loadingAnimation.fadeOut();
        preloader.delay(preloaderDelay).fadeOut(preloaderFadeOutTime, function() {
        	setTimeout(startPage, 1500);
         });
    }

    hidePreloader();
    
    function startPage(){';
	if (azul_top('twitter_feed') == 'enable'){
		echo '
		$("#home-1").removeClass("fadeOut-1").addClass("fadeIn-1");';
	}	
	if (azul_top('countdown_activation') != 'none'){	
		echo 'setTimeout ( function () {
			$(".timer").removeClass("fadeOut-2").addClass("fadeIn-2");
		},350 );';
	}
	if (azul_top('text_home') != ''){
		echo 'setTimeout ( function () {
			$("#home .intro h2").removeClass("fadeOut-2").addClass("fadeIn-2");
		},700 );';
	}
	if (azul_top('menu_position') == 'center'){
		echo 'setTimeout ( function () {
			$(".menu").removeClass("fadeOut-3").addClass("fadeIn-3");
		},1500 );
		setTimeout ( function () {
			$(\'.menu li a\').each(function( k ) {	
				var el = $(this);
				setTimeout ( function () {
					el.removeClass("fadeOut-2").addClass("fadeIn-2");
				},  k * 250 );	
			});
		},2000 );';
	} elseif (azul_top('menu_position') == 'top'){
		echo 'setTimeout ( function () {
			$(".menu").removeClass("fadeOut-2").addClass("fadeIn-2");
		},1500 );';
	}
		echo 'setTimeout ( function () {
			$(".footer-content").removeClass("fadeOut-2").addClass("fadeIn-2");
		},2300 );
		setTimeout ( function () {
			$(".footer-content h4").removeClass("fadeOut-2").addClass("fadeIn-2");
		},3300 );
		setTimeout ( function () {
			$(\'.footer-content a span\').each(function( k ) {	
				var el = $(this);
				setTimeout ( function () {
					el.removeClass("fadeOut-1").addClass("fadeIn-1");
				},  k * 250 );	
			});
		},2500 );
	} /*  End animation section home  */

});

$(document).ready(function(){
	"use strict";
	
	/* ==============================================
    DIV POSITION
    =============================================== */
	
	var windowHeight = $(window).height();
	var homePageHeight = $(\'#home\').height();
	
	if (windowHeight >= homePageHeight){
		$(\'#home\').css("padding-top", ((windowHeight-homePageHeight)/2));
		$(\'#home\').css("padding-bottom", ((windowHeight-homePageHeight)/2));
	}

	$(window).resize(function() {		
		var windowHeight = $(window).height();
		var homePageHeight = $(\'#home\').height();';
		if (azul_top('about_section') == 'enable'){
			echo 'var aboutPageHeight = $(\'#about-content\').height();';
		}
		if (azul_top('newsletter_section') == 'enable'){
			echo 'var newsletterPageHeight = $(\'#newsletter-content\').height();';
		}
		if (azul_top('contact_section') == 'enable'){
			echo 'var contactPageHeight = $(\'#contact-content\').height();';
		}

		echo 'if (windowHeight >= homePageHeight){
			$(\'#home\').css("padding-top", ((windowHeight-homePageHeight)/2));
			$(\'#home\').css("padding-bottom", ((windowHeight-homePageHeight)/2));';
			if (azul_top('about_section') == 'enable'){
				echo '
				$(\'#about-content\').css("padding-top", ((windowHeight-aboutPageHeight)/2));
				$(\'#about-content\').css("padding-bottom", ((windowHeight-aboutPageHeight)/2));';
			}
			if (azul_top('newsletter_section') == 'enable'){
				echo '
				$(\'#newsletter-content\').css("padding-top", ((windowHeight-newsletterPageHeight)/2));
				$(\'#newsletter-content\').css("padding-bottom", ((windowHeight-newsletterPageHeight)/2));';
			}
			if (azul_top('contact_section') == 'enable'){
				echo '
				$(\'#contact-content\').css("padding-top", ((windowHeight-contactPageHeight)/2));
				$(\'#contact-content\').css("padding-bottom", ((windowHeight-contactPageHeight)/2));';
			}
		echo '}
	});
	
	/* ==============================================
	TOOLTIPS
	=============================================== */
	
	$(\'.footer-content a\').tooltip();
	
	/* ==============================================
	ANIMATIONS
	=============================================== */
	
	//setTimeout(startPage, 1500);
	
	/*  Start animation section home  */
	function startPage() {';
	if (azul_top('twitter_feed') == 'enable'){
		echo '
		$("#home-1").removeClass("fadeOut-1").addClass("fadeIn-1");';
	}	
	if (azul_top('countdown_activation') != 'none'){	
		echo 'setTimeout ( function () {
			$(".timer").removeClass("fadeOut-2").addClass("fadeIn-2");
		},350 );';
	}
	if (azul_top('text_home') != ''){
		echo 'setTimeout ( function () {
			$("#home .intro h2").removeClass("fadeOut-2").addClass("fadeIn-2");
		},700 );';
	}
	if (azul_top('menu_position') == 'center'){
		echo 'setTimeout ( function () {
			$(".menu").removeClass("fadeOut-3").addClass("fadeIn-3");
		},1500 );
		setTimeout ( function () {
			$(\'.menu li a\').each(function( k ) {	
				var el = $(this);
				setTimeout ( function () {
					el.removeClass("fadeOut-2").addClass("fadeIn-2");
				},  k * 250 );	
			});
		},2000 );';
	} elseif (azul_top('menu_position') == 'top'){
		echo 'setTimeout ( function () {
			$(".menu").removeClass("fadeOut-2").addClass("fadeIn-2");
		},1500 );';
	}
		echo 'setTimeout ( function () {
			$(".footer-content").removeClass("fadeOut-2").addClass("fadeIn-2");
		},2300 );
		setTimeout ( function () {
			$(".footer-content h4").removeClass("fadeOut-2").addClass("fadeIn-2");
		},3300 );
		setTimeout ( function () {
			$(\'.footer-content a span\').each(function( k ) {	
				var el = $(this);
				setTimeout ( function () {
					el.removeClass("fadeOut-1").addClass("fadeIn-1");
				},  k * 250 );	
			});
		},2500 );
	} /*  End animation section home  */
	';
	
		
		
		
		
		
		
		
		
		
	if (azul_top('about_section') == 'enable'){
	echo '/*  Start animation section about  */
	$("#about").click(function() {
		$("footer").fadeOut("slow", function() {
			$("footer").addClass("footer-hide");
		});
		$("#home").fadeOut( "slow", function() {';
			if (azul_top('back_type') == 'images') {
				echo 'api.goTo(2);';
			}
			echo '$("#about-content").attr( "style", "display: block" );
			var windowHeight = $(window).height();
			var aboutPageHeight = $(\'#about-content\').height();
			if (windowHeight >= aboutPageHeight){
				$(\'#about-content\').css("padding-top", ((windowHeight-aboutPageHeight)/2));
				$(\'#about-content\').css("padding-bottom", ((windowHeight-aboutPageHeight)/2));
			}
			setTimeout ( function () {
				$("#about-content .close").removeClass("fadeOut-1").addClass("fadeIn-1");
			},1500 );
			setTimeout ( function () {
				$(".about-title h1").removeClass("fadeOut-2").addClass("fadeIn-2");
			},2000 );
			setTimeout ( function () {
				$(".about-text").removeClass("fadeOut-2").addClass("fadeIn-2");
			},2500 );';
			if (azul_top('twitter_feed') == 'enable'){
				echo '$("#home-1").removeClass("fadeIn-1").addClass("fadeOut-1");';
			}
			echo '$(\'.timer\').removeClass("fadeIn-2").addClass("fadeOut-2");';
			if (azul_top('text_home') != ''){
				echo '$("#home .intro h2").removeClass("fadeIn-2").addClass("fadeOut-2");';
			}
			if (azul_top('menu_position') == 'center'){
				echo '$(".menu").removeClass("fadeIn-3").addClass("fadeOut-3");
				$(\'.menu li a\').removeClass("fadeIn-2").addClass("fadeOut-2");';
			}elseif(azul_top('menu_position') == 'top'){
				echo '$(".menu").removeClass("fadeIn-2").addClass("fadeOut-2");';
			}
			echo '$(".footer-content").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(".footer-content h4").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(\'.footer-content .hi-icon\').removeClass("fadeIn-4").addClass("fadeOut-4");
			
		});
	}); /*  END animation section about  */
	
	/*  START animation back to home from about  */
	$("#close1").click(function() {
		$("#about-content").fadeOut("slow", function() {';
			if (azul_top('back_type') == 'images') {
				echo 'api.goTo(1);';
			}
			echo '$("#home").attr( "style", "display: block" );
			$("footer").removeClass("footer-hide");
			var windowHeight = $(window).height();
			var homePageHeight = $(\'#home\').height();			
			if (windowHeight >= homePageHeight){
				$(\'#home\').css("padding-top", ((windowHeight-homePageHeight)/2));
				$(\'#home\').css("padding-bottom", ((windowHeight-homePageHeight)/2));
			}
			$("#about-content .close").removeClass("fadeIn-1").addClass("fadeOut-1");
			$(".about-title h1").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(".about-text").removeClass("fadeIn-2").addClass("fadeOut-2");
			setTimeout(startPage, 500);
		});
	}); /*  END animation back to home from about  */';
	}
	
	
	
	
	
	
	
	
	
	
	
	
	if (azul_top('newsletter_section') == 'enable'){
	echo '/*  START animation section newsletter  */
	$("#newsletter").click(function() {
		$("footer").fadeOut("slow", function() {
			$("footer").addClass("footer-hide");
		});
		$("#home").fadeOut( "slow", function() {';
			if (azul_top('back_type') == 'images') {
				echo 'api.goTo(3);';
			}
			echo '$("#newsletter-content").attr( "style", "display: block" );
			var windowHeight = $(window).height();
			var newsletterPageHeight = $(\'#newsletter-content\').height();
			if (windowHeight >= newsletterPageHeight){
				$(\'#newsletter-content\').css("padding-top", ((windowHeight-newsletterPageHeight)/2));
				$(\'#newsletter-content\').css("padding-bottom", ((windowHeight-newsletterPageHeight)/2));
			}
			setTimeout ( function () {
				$("#newsletter-content .close").removeClass("fadeOut-1").addClass("fadeIn-1");
			},1500 );
			setTimeout ( function () {
				$(".newsletter-title h1").removeClass("fadeOut-2").addClass("fadeIn-2");
			},2000 );
			setTimeout ( function () {
				$("#newsletter-content .intro h2").removeClass("fadeOut-2").addClass("fadeIn-2");
			},2500 );
			setTimeout ( function () {
				$("#newsletter-content form").removeClass("fadeOut-2").addClass("fadeIn-2");
			},3000 );';
	
			if (azul_top('twitter_feed') == 'enable'){
				echo '$("#home-1").removeClass("fadeIn-1").addClass("fadeOut-1");';
			}
			echo '$(\'.timer\').removeClass("fadeIn-2").addClass("fadeOut-2");';
			if (azul_top('text_home') != ''){
				echo '$("#home .intro h2").removeClass("fadeIn-2").addClass("fadeOut-2");';
			}
			if (azul_top('menu_position') == 'center'){
				echo '$(".menu").removeClass("fadeIn-3").addClass("fadeOut-3");
				$(\'.menu li a\').removeClass("fadeIn-2").addClass("fadeOut-2");';
			}elseif(azul_top('menu_position') == 'top'){
				echo '$(".menu").removeClass("fadeIn-2").addClass("fadeOut-2");';
			}
			echo '$(".footer-content").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(".footer-content h4").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(\'.footer-content .hi-icon\').removeClass("fadeIn-4").addClass("fadeOut-4");
			
		});
	});
	/*  END animation section newsletter  */
	
	/*  START animation back to home from newsletter  */
	$("#close2").click(function() {
		$("#newsletter-content").fadeOut("slow", function() {';
			if (azul_top('back_type') == 'images') {
				echo 'api.goTo(1);';
			}
			echo '$("#home").attr( "style", "display: block" );
			$("footer").removeClass("footer-hide");
			var windowHeight = $(window).height();
			var homePageHeight = $(\'#home\').height();		
			if (windowHeight >= homePageHeight){
				$(\'#home\').css("padding-top", ((windowHeight-homePageHeight)/2));
				$(\'#home\').css("padding-bottom", ((windowHeight-homePageHeight)/2));
			}
			$("#newsletter-content .close").removeClass("fadeIn-1").addClass("fadeOut-1");
			$(".newsletter-title h1").removeClass("fadeIn-2").addClass("fadeOut-2");
			$("#newsletter-content .intro h2").removeClass("fadeIn-2").addClass("fadeOut-2");
			$("#newsletter-content form").removeClass("fadeIn-2").addClass("fadeOut-2");
			setTimeout(startPage, 500);
		});
	}); /*  END animation back to home from newsletter  */';
	}
	
	
	
	
	
	
	if (azul_top('contact_section') == 'enable'){
	echo '/*  START animation section contact  */
	$("#contact").click(function() {
		$("footer").fadeOut("slow", function() {
			$("footer").addClass("footer-hide");
		});
		$("#home").fadeOut( "slow", function() {
			$("#contact-content").attr( "style", "display: block" );
			var windowHeight = $(window).height();
			var contactPageHeight = $(\'#contact-content\').height();
			if (windowHeight >= contactPageHeight){
				$(\'#contact-content\').css("padding-top", ((windowHeight-contactPageHeight)/2));
				$(\'#contact-content\').css("padding-bottom", ((windowHeight-contactPageHeight)/2));
			}';
			if (azul_top('choose_back_contact') == 'map'){
				echo 'setTimeout ( function () {
				$(\'#map\').animate({ opacity: 1 });
				$(\'.back-color\').animate({ opacity: 0.8 });
			},750 );';
			}elseif((azul_top('choose_back_contact') == 'image') && (azul_top('back_type') == 'images')) {
				echo 'api.goTo(4);';
			}else{
				echo'';
			}
			echo'setTimeout ( function () {
				$("#contact-content .close").removeClass("fadeOut-1").addClass("fadeIn-1");
			},1500 );
			setTimeout ( function () {
				$(".contact-title h1").removeClass("fadeOut-2").addClass("fadeIn-2");
			},2000 );';
			if (azul_top('contact_text') != ''){
			echo 'setTimeout ( function () {
				$(".address div").removeClass("fadeOut-2").addClass("fadeIn-2");
			},2500 );';
			}
			echo 'setTimeout ( function () {
				$("#contact-content form").removeClass("fadeOut-2").addClass("fadeIn-2");
			},3000 );';
			if (azul_top('twitter_feed') == 'enable'){
				echo '$("#home-1").removeClass("fadeIn-1").addClass("fadeOut-1");';
			}
			echo '$(\'.timer\').removeClass("fadeIn-2").addClass("fadeOut-2");';
			if (azul_top('text_home') != ''){
				echo '$("#home .intro h2").removeClass("fadeIn-2").addClass("fadeOut-2");';
			}
			if (azul_top('menu_position') == 'center'){
				echo '$(".menu").removeClass("fadeIn-3").addClass("fadeOut-3");
				$(\'.menu li a\').removeClass("fadeIn-2").addClass("fadeOut-2");';
			}elseif(azul_top('menu_position') == 'top'){
				echo '$(".menu").removeClass("fadeIn-2").addClass("fadeOut-2");';
			}
			echo '$(".footer-content").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(".footer-content h4").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(\'.footer-content .hi-icon\').removeClass("fadeIn-4").addClass("fadeOut-4");
			
		});
	});
	/*  END animation section contact  */
	
	
	/*  START animation back to home from contact  */
	$("#close3").click(function() {
		$("#contact-content").fadeOut("slow", function() {
			$("#home").attr( "style", "display: block" );
			$("footer").removeClass("footer-hide");
			var windowHeight = $(window).height();
			var homePageHeight = $(\'#home\').height();		
			if (windowHeight >= homePageHeight){
				$(\'#home\').css("padding-top", ((windowHeight-homePageHeight)/2));
				$(\'#home\').css("padding-bottom", ((windowHeight-homePageHeight)/2));
			}
			$("#contact-content .close").removeClass("fadeIn-1").addClass("fadeOut-1");
			$(".contact-title h1").removeClass("fadeIn-2").addClass("fadeOut-2");
			$(".address p").removeClass("fadeIn-2").addClass("fadeOut-2");
			$("#contact-content form").removeClass("fadeIn-2").addClass("fadeOut-2");';
			if (azul_top('choose_back_contact') == 'map'){
			echo 'setTimeout ( function () {
				$(\'#map\').animate({ opacity: 0 });
				$(\'.back-color\').animate({ opacity: 0.65 });
			},500 );';
			}elseif((azul_top('choose_back_contact') == 'image') && (azul_top('back_type') == 'images')){
				echo 'api.goTo(1);';
			}else{
				echo'';
			}
			echo 'setTimeout(startPage, 750);
		});
	}); /*  END animation back to home from contact  */';
	}
	
echo '	
});

</script>';

?>