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

$user_id=$_GET['uid'];

try
{
$statement1 = $db->prepare("SELECT user1 FROM follow WHERE user2=:user2");
	$statement1->bindValue(':user2', $user_id,PDO::PARAM_INT);
$statement1->execute();

$count=$statement1->rowCount();

if($count>0)
{
while($row2 = $statement1 ->fetch(PDO::FETCH_ASSOC))
{
$user1 = $row2['user1'];
if($user1!=$user_id)
{
$stmt = $db->prepare("SELECT username,full_name FROM members WHERE id=:user1 AND activated='1' LIMIT 1");
$stmt->bindValue(':user1',$user1,PDO::PARAM_INT);
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

<img src="<?php echo '../members/'.$user1.'/'.$user1.'.jpg' ?>"/>
	<br/>
<a href="<?php echo '../profile_page.php?uid='.$user1; ?>">

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
</body>
</html>
