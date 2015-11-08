<?php 
$uid=$_POST['uid'];

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT * FROM has_had WHERE id=:uid');
$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);

try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}
$count=0;
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$count=$count+1;
$x2=$row['product_id'];
$stmt1=$db->prepare('SELECT name FROM product WHERE product_id=:x2');
$stmt1->bindParam(':x2',$x2, PDO::PARAM_STR);
$stmt1->execute();
$rowx=$stmt1->fetch(PDO::FETCH_ASSOC);
$name=$rowx['name'];
$z='location.href="gox.php?x='.$x2.'"';
echo "<img class='new' no=$count src='/../saurabh/upload_image/upload_to_folder/images_thumbnail/$x2.jpg' height='60px' width='60px' title='$name' onclick=$z></img>";
}


?>