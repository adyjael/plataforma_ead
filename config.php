<?php
global $conn;
define('URL_BASE', 'http://localhost/plataforma_ead');
try{
	$conn=new PDO('mysql:dbname=plataforma_ead;host=localhost','root','');
}catch(PDOException $e){
	echo $e;
}