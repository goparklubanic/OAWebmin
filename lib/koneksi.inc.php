<?php

//local
$dbhost = "localhost";
$dbname = "ayampedas";
$dbuser = "chikenspicy";
$dbpass = "penam80ngan";



//internet
/*
$dbhost = "localhost";
$dbname = "klubaner_cafe";
$dbuser = "klubaner_omahal";
$dbpass = "penam80Ngan";
*/

try
{ 
	$conn = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

catch(PDOException $pe)
{
	die('Maaf, gangguan koneksi: ' .$pe->getMessage());
}

?>
