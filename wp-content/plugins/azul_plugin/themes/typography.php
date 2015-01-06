<?php 

$typo_1=str_replace("+"," ",azul_top('typo_1'));
$typo_2=str_replace("+"," ",azul_top('typo_2'));

echo '<style type="text/css">

	body, 
	input, 
	textarea{
		font-family: \''.$typo_1.'\', sans-serif;
	}	
	
	h1,
	h4,
	.btn-submit,
	.button{
		font-family: \''.$typo_2.'\', sans-serif;
	}
	
</style> ';

?>