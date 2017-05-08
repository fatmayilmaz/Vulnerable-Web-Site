<?php 
include("header.php"); ?>
<form method="GET" >
<table align="center">
<tr>
<td>ip</td>
<td>:</td>
<td><input type="text" name="ip"></td>
</tr>
<tr> 
<td></td>
<td></td>
<td><input type="submit" value="Submit" name="Uygula"></td>
</tr>
</table>
</form>


 <?php 
 error_reporting(E_ALL ^ E_NOTICE);
 if( isset( $_GET[ 'Uygula' ]  ) ) 
 {
 $hedef = $_GET[ 'ip' ]; 
 $hedef =stripslashes($hedef);
 $octet = explode(".",$hedef); //ip adresini 4 octet e böl
 if((is_numeric($octet[0]))&& (is_numeric($octet[1]))&& (is_numeric($octet[2]))
 && (is_numeric($octet[3]))&& (sizeof($octet)==4)){
 $hedef = $octet[0].'.'.$octet[1].'.'.$octet[2].'.'.$octet[3];
 $cmd="ping $hedef	"; //ping atma kodu
 exec($cmd,$gelen); //kodun çalıştırılması 
 foreach($gelen as $veri)
 echo"$veri <br/>"; //ekrana ping kodlarının yazdırılması. 
 }
	 else
{}
 }
 ?>