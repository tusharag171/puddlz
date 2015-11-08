<?php
if(isset($_POST['user1']) && isset($_POST['user2']) )
{
	include_once("../scripts/connect.php");

$user1 = $_POST['user1'];
$user2 = $_POST['user2'];
	
$stmt1 = $db->prepare("SELECT user1,user2 FROM follow WHERE user1=:user1 AND user2=:user2 LIMIT 1");
	$stmt1->bindValue(':user1',$user1,PDO::PARAM_INT);
	$stmt1->bindValue(':user2',$user2,PDO::PARAM_INT);
	
	try
	{
	$stmt1->execute();
	$count = $stmt1->rowCount();
	if($count > 0)
	{
	echo "1";
	}
	else
	{
	echo "2";
	}
	}
	catch(PDOException $e){
		echo $e->getMessage();
		$db = null;
		exit();
	}
	
}
	?>