<?php 

$baglanti = mysqli_connect("localhost","root","","database");

if(!$baglanti)
{
	die("Bağlantı Hatasi".mysqli_error());
	}

$db_select=mysqli_select_db($baglanti,"database");

if(!$db_select)
{
	die("Bağlantı Hatasi select".mysqli_error());
	}
mysqli_query($baglanti,"SET NAMES UTF8");

error_reporting(E_ALL ^ E_DEPRECATED);





?>