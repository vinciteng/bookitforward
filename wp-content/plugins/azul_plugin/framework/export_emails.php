<?php
$table = $wpdb->prefix . 'azul_emails';
$file = 'emails_subscribed';
$csv_output="";

$fivesdrafts = $wpdb->get_results("SELECT * FROM ".$table.""); 

foreach ( $fivesdrafts as $fivesdraft ) 
{
	$csv_output .= $fivesdraft->option_email;
	$csv_output .= "\n";
}

$filename = $file."_".date("Y-m-d",time());
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: csv" . date("Y-m-d") . ".csv");
header( "Content-disposition: filename=".$filename.".csv");
print $csv_output;
exit;
?> 