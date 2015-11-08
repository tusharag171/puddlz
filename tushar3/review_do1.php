<?php
$x=$_POST['x'];
$uid=$_POST['uid'];
$score=$_POST['score'];

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
$stmt=$db->prepare('INSERT INTO review (review_id ,product_id ,id ,rating ,comment ,is_rev,lastlog) VALUES (NULL ,:x, :uid, :score,NULL, 0,now())');
$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->bindParam(':x',$x, PDO::PARAM_STR);
$stmt->bindParam(':score',$score, PDO::PARAM_STR);
try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}

?>