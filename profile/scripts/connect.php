<?php
// Usualy "localhost" but could be different on different servers
$db_host = "puddlzcom1.ipagemysql.com";
// Place the username for the MySQL database here
$db_username = "tushar"; 
// Place the password for the MySQL database here
$db_pass = "tushar@17"; 
// Place the name for the MySQL database here
$db_name = "puddlz_tush";
try{
	$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo $e->getMessage();
	exit();
}
