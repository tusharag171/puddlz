<?php

include_once("../scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: ../index.php");
	$db = null;
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $_SESSION['uid']; ?>
</head>
<body>
<?php

if(isset($_GET['uid']))
{
echo $_SESSION['uid']; 
$user_id=$_GET['uid'];
echo $_SESSION['uid']; 
try
{
$statement1 = $db->prepare("SELECT user2 FROM follow WHERE user1=:user1");
	$statement1->bindValue(':user1', $user_id,PDO::PARAM_INT);
$statement1->execute();

$count=$statement1->rowCount();

if($count>0)
{
while($row2 = $statement1 ->fetch(PDO::FETCH_ASSOC))
{
$user2 = $row2['user2'];
if($user2!=$user_id)
{
$stmt = $db->prepare("SELECT username,full_name FROM members WHERE id=:user2 AND activated='1' LIMIT 1");
$stmt->bindValue(':user2',$user2,PDO::PARAM_INT);
	try{
		$stmt->execute();
	}
	catch(PDOException $e){
		$db = null;
		exit();
	}

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$fullName = $row['full_name'];
	$username = $row['username'];
	}
	if($fullName)
{$var_name= $fullName;}
else 
{$var_name= $username;}

?>

<img src="<?php echo '../members/'.$user2.'/'.$user2.'.jpg' ?>"/>
	<br/>
<a href="<?php echo '../profile_page.php?uid='.$user2; ?>">

		<?php echo $var_name;?>
	</a>
<br/>			
<?php			
}

	}
	}}
	catch(PDOException $e){
		$db = null;
		exit();
	}
	
	


}
?>
<?php echo $_SESSION['uid']; ?>
</body>
</html>
