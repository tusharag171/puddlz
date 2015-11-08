<?php
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT * FROM members');
try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
echo $row['id'];
echo "<br>";
}

?>