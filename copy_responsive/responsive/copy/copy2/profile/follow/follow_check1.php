<?php
if(isset($_POST['user1']) && isset($_POST['user2']) )
{
include_once("../scripts/connect.php");
	
$user1 = $_POST['user1'];
$user2 = $_POST['user2'];

	$stmt1 = $db->prepare("SELECT id FROM members WHERE id=:user1 AND activated='1' LIMIT 1");
	$stmt1->bindValue(':user1',$user1,PDO::PARAM_INT);
		
	$stmt2 = $db->prepare("SELECT id FROM members WHERE id=:user2 AND activated='1' LIMIT 1");
	$stmt2->bindValue(':user2',$user2,PDO::PARAM_INT);
	
	try{
		$stmt1->execute();
		$stmt2->execute();
		$count1 = $stmt1->rowCount();
		$count2 = $stmt2->rowCount();
		
		if($count1 > 0 && $count2 > 0)
		{
		
		try
		{
		$db->beginTransaction();
		$stmt3 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt3->bindValue(':user1',$user1,PDO::PARAM_INT);
		$stmt3->bindValue(':user2',$user2,PDO::PARAM_INT);
		$stmt3->execute();
		echo "1";
	$db->commit();
exit();
}
		catch(PDOException $e)
		{
		$db->rollBack();
		$db = null;
		exit();
	}

		}
		else
		{
		echo "2";
exit();
		}

		}
		catch(PDOException $e)
		{
		$db->rollBack();
		$db = null;
		exit();
	}

}
?>