<?php 
function AcikOnleme($a)
	{
	$a=str_replace(",","",$a);
	$a=str_replace(";","",$a);
	$a=str_replace("!","",$a);
	$a=str_replace("'","",$a);
	$a=str_replace("'","",$a);
	$a=str_replace('"',"",$a);
	$a=str_replace("<","",$a);
	$a=str_replace("`","",$a);
	$a=str_replace("|","",$a);
	$a=str_replace(">","",$a);
	$a=str_replace("=","",$a);
	$a=str_replace(" ","",$a);
	$a=str_replace("´","",$a);
	$a=trim($a);
	return $a;
	}
?>

