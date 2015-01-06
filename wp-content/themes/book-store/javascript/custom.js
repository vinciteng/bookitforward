/* Start BX slider*/
jQuery(document).ready(function(jQuery){	 
  
/* BX slider 1*/
   if (jQuery('.slider1').length){
		jQuery('.slider1').bxSlider({ slideWidth: 142, minSlides: 1, maxSlides: 8, slideMargin: 18,  speed: 1500  });
    }
   if (jQuery('.slider2').length){
		jQuery('.slider2').bxSlider({ slideWidth: 270,   mode: 'horizontal',  useCSS: false, easing: 'easeOutElastic',  speed: 2000 });
    }
	if (jQuery('.slider3').length){
		jQuery('.slider3').bxSlider({ slideWidth: 425, minSlides: 1, maxSlides: 2, slideMargin: 0, slideMargin: 18});
    }
	if (jQuery('.slider4').length){
		jQuery('.slider4').bxSlider({ mode: 'fade', slideWidth: 270, minSlides: 1, maxSlides: 1, slideMargin: 1, slideMargin: 0 });
    }
	 if (jQuery('.slider5').length){
		jQuery('.slider5').bxSlider({ slideWidth: 870,   mode: 'horizontal',  useCSS: false, easing: 'easeOutElastic',  speed: 2000 });
    }
	if (jQuery('.slider6').length){
		jQuery('.slider6').bxSlider({ slideWidth: 155, minSlides: 1, maxSlides: 4, slideMargin: 18,  speed: 1500  });
    }
	if (jQuery('.slider7').length){
		jQuery('.slider7').bxSlider({ slideWidth: 1170,   mode: 'horizontal',  useCSS: false, easing: 'easeOutElastic',  speed: 2000 });
    }
/* BX slider 1*/
});
/* End BX slider*/

