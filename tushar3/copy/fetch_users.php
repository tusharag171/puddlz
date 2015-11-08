<?php
include_once("scripts/check_user.php");
 $ext_id = $_SESSION['profile']['id'];
    $user_graph = $_SESSION['user_graph']; 

	$statement2 = $db->prepare("SELECT id FROM members WHERE ext_id=:user1 LIMIT 1");
	$statement2->bindValue(':user1', $ext_id,PDO::PARAM_INT);
	$statement2->execute();
		$count22 = $statement2->rowCount();
	
	
	if($count22 > 0)
	{
try{
	$db->beginTransaction();
	
	while($row = $statement2 ->fetch(PDO::FETCH_ASSOC)){
	$user1 = $row['id'];
		}

$stmt9 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt9->bindValue(':user2',$user1,PDO::PARAM_INT);
		$stmt9->bindValue(':user1',$user1,PDO::PARAM_INT);
		$stmt9->execute();
		
	
foreach ($user_graph['data'] as $key => $value) {

	$statement1 = $db->prepare("SELECT id FROM members WHERE ext_id=:user2 AND activated='1' LIMIT 1");
	$statement1->bindValue(':user2', $value['id'],PDO::PARAM_INT);
		
		$statement1->execute();
		$count11 = $statement1->rowCount();
	if($count11 > 0)
	{

	while($row2 = $statement1 ->fetch(PDO::FETCH_ASSOC)){
	$user2 = $row2['id'];
		}
	
		$stmt7 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt7->bindValue(':user1',$user1,PDO::PARAM_INT);
		$stmt7->bindValue(':user2',$user2,PDO::PARAM_INT);
		$stmt7->execute();
		
$stmt8 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt8->bindValue(':user1',$user2,PDO::PARAM_INT);
		$stmt8->bindValue(':user2',$user1,PDO::PARAM_INT);
		$stmt8->execute();
		
		
}
}
$db->commit();
header('Location: chkMail.php');
}
catch(PDOException $e){
				$db->rollBack();
exit();			}
}
	
?>