<?php 
	/*
	 * This file is used to generate left sidebar
	 */	
?>
<?php

	global $sidebar;
	global $left_sidebar;

	if( $sidebar == "left-sidebar" ){	
		
		echo "<aside class='span3 columns pull-left left-sidebar-wrapper '>";
			echo "<div class='side-holder'>";
			 		dynamic_sidebar( $left_sidebar );
			echo "</div>";
		echo "</aside>";
	
	}else if( $sidebar == "both-sidebar" ){
	
		global $left_sidebar;
		echo "<aside class='span4 columns pull-left left-sidebar-wrapper '>";
			echo "<div class='side-holder'>";
	     			dynamic_sidebar( $left_sidebar );
			echo "</div>";	
		echo "</aside>";					
	
	}	

?>