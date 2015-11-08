<?php

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
$stmtx=$db->prepare('SELECT name,product_id FROM product WHERE company="Sony"');
$stmtx->execute();
while($row=$stmtx->fetch(PDO::FETCH_ASSOC))
{
$x=$row['name'];
$y=$row['product_id'];
echo $x;
echo "-".$y;
echo "<br>";
}

?>