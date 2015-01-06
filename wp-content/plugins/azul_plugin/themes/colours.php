<?php 

echo '<style type="text/css">

	.back-color {
		background: -webkit-linear-gradient(180deg, #'.azul_top('color_gradient_1').', #'.azul_top('color_gradient_2').'); /* For Safari */
		background: -o-linear-gradient(180deg, #'.azul_top('color_gradient_1').', #'.azul_top('color_gradient_2').'); /* For Opera 11.1 to 12.0 */
		background: -moz-linear-gradient(180deg, #'.azul_top('color_gradient_1').', #'.azul_top('color_gradient_2').'); /* For Firefox 3.6 to 15 */
		background: linear-gradient(180deg, #'.azul_top('color_gradient_1').', #'.azul_top('color_gradient_2').'); /* Standard syntax */
		Filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#'.azul_top('color_gradient_1').'\', endColorstr=\'#'.azul_top('color_gradient_2').'\'); /* For IE */
	}
	
	body{
	    background-color: #'.azul_top('back_color').';
	}
	
	body, 
	a, 
	a:hover, 
	input, 
	textarea,
	.btn-submit,
	.button{
		color: #'.azul_top('main_color').';
	}
	
	input,
	.btn-submit{
		border-bottom: 1px solid #'.azul_top('main_color').';
	}
	
	textarea,
	.button{
		border: 1px solid #'.azul_top('main_color').';
	}
	
	.footer-content{
		border-left: 1px solid #'.azul_top('main_color').';
	}
	
	.menu li a .menu-back,
	.btn-submit:hover,
	.button:hover{
		background: #'.azul_top('main_color').'; 	
	}
	
	.btn-submit:hover,
	.button:hover{
		color: #'.azul_top('custom_link_color').';
	}
		
</style> ';

?>