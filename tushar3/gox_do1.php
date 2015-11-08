<?php
$x=$_POST['x'];
$uid=$_POST['uid'];

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
$stmt=$db->prepare('INSERT INTO has_had (up_id ,id ,product_id) VALUES (NULL ,:uid, :x)');
$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->bindParam(':x',$x, PDO::PARAM_STR);
try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}

$stmtx=$db->prepare('SELECT user1 FROM follow WHERE user2=:uid');
$stmtx->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmtx->execute();

while($row=$stmtx->fetch(PDO::FETCH_ASSOC))
{
$user1=$row['user1'];

if($user1!=$uid)
{
$stmtx1=$db->prepare('INSERT INTO friends_have (user1 ,user2 ,product_id) VALUES (:user1 ,:uid, :x)');
$stmtx1->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmtx1->bindParam(':x',$x, PDO::PARAM_STR);
$stmtx1->bindParam(':user1',$user1, PDO::PARAM_STR);
$stmtx1->execute();
}
}

echo $score;
?>