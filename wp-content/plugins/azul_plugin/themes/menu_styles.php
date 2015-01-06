<?php 

if (azul_top('menu_position') == 'center') { 

	echo '<style type="text/css">
		.menu{
			font-size: 18px;
			font-weight: 300;
			padding: 15px 0;
			border-left: 1px solid #'.azul_top('main_color').';
		}
		.menu li{
			margin-bottom: 10px;	
		}
		.menu li.last{
			margin-bottom: 0px;
		}
		.menu li a{
			position: relative;
			height: 100%;
			padding: 10px 15px;
			display: block;
			overflow: hidden;
		}
		.menu li a .menu-back{
			display: block;
			width: 100%;
			height: 100%;
			position: absolute;
			z-index: -10;
			top: 0px;
			left: 0px;
			-webkit-transition: all 0.2s ease-in-out;
		   	   -moz-transition: all 0.2s ease-in-out;
		   		 -o-transition: all 0.2s ease-in-out;
		   		-ms-transition: all 0.2s ease-in-out;
		   			transition: all 0.2s ease-in-out;
			-webkit-transform: translateX(-100%);
		   	   -moz-transform: translateX(-100%);
		   		 -o-transform: translateX(-100%);
		   		-ms-transform: translateX(-100%);
		   			transform: translateX(-100%);  	
		}
		.menu li a:hover .menu-back{
			-webkit-transform: translateX(-95%);
		   	   -moz-transform: translateX(-95%);
		   		 -o-transform: translateX(-95%);
		   		-ms-transform: translateX(-95%);
		   			transform: translateX(-95%);  	
		}	
	</style> ';

} elseif (azul_top('menu_position') == 'top') {

	echo '<style type="text/css">
		.menu{
			font-size: 20px;
			font-weight: 400;
			margin-bottom: 15px;
			line-height: 25px;
		}
		.menu a{
			padding-bottom: 5px;
			display: inline-block;
		}
		.menu a:hover{
			padding-bottom: 5px;
			text-decoration: underline;
		}
	</style> ';
	
} else {
	echo'';
}

?>