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
	            $deleteSQL = $db->prepare("DELETE FROM follow WHERE user1=:user1 AND user2=:user2 LIMIT 1");
				$deleteSQL->bindValue(':user1',$user1,PDO::PARAM_INT);
				$deleteSQL->bindValue(':user2',$user2,PDO::PARAM_INT);
				$deleteSQL->execute();


$stmtx=$db->prepare('SELECT product_id FROM has_had WHERE id=:user2');
$stmtx->bindValue(':user2',$user2,PDO::PARAM_INT);
$stmtx->execute();

while($row=$stmtx->fetch(PDO::FETCH_ASSOC))
{
$x=$row['product_id'];
$stmtx1=$db->prepare('DELETE FROM friends_have WHERE user1=:user1 AND user2=:user2 AND product_id=:x');
$stmtx1->bindValue(':user1',$user1,PDO::PARAM_INT);
$stmtx1->bindValue(':user2',$user2,PDO::PARAM_INT);
$stmtx1->bindValue(':x',$x,PDO::PARAM_INT);
$stmtx1->execute();


}



				echo "2";
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
		echo "1";
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
			