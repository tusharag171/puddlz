<?php 
$x=$_POST['x'];
$uid=$_POST['uid'];

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT * FROM review WHERE product_id=:x AND id=:uid');
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

$html='3';
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

if($row['is_rev']==0)
$html='1';
if($row['is_rev']==1)
$html='2';
}

echo $html;

?>