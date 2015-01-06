<?php 
	/*
	 * This file is used to generate right sidebar
	 */	
?>
<?php
	global $sidebar;
	if( $sidebar == "right-sidebar" ){
		
		global $right_sidebar;
		echo "<aside class='span3 columns pull-right right-sidebar-wrapper'>";
			echo "<div class='side-holder'>";
					dynamic_sidebar( $right_sidebar );
			echo "</div>";
		echo "</aside>";
	
	}else if( $sidebar == "both-sidebar" ){
		
		global $right_sidebar;
			echo "<aside class='span3 columns pull-right right-sidebar-wrapper'>";
				echo "<div class='side-holder'>";
					dynamic_sidebar( $right_sidebar );
			echo "</div>";			
		echo "</aside>";				
	
	}

?>