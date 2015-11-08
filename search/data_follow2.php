
<?php
include_once("../scripts/connect.php");

$user_id =$_POST['uid'];
$requested_page =$_POST['page_num'];
$set_limit =(($requested_page - 1) * 12) . ",12";


try
{
$statement1 = $db->prepare("SELECT user1 FROM follow WHERE user2=:user2 and user2!=user1 LIMIT ".$set_limit."");
	$statement1->bindValue(':user2', $user_id,PDO::PARAM_INT);
$statement1->execute();




$count=$statement1->rowCount();
if($count>0)
{
$ch=0;
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
$y=$user1;
$dir="../members/".$y; 
$dir_list = opendir($dir);

while(($filenamee = readdir($dir_list)) != false)
{
if ($filenamee == '.' or $filenamee == '..')
 continue;
else
{
$ext = pathinfo($filenamee, PATHINFO_EXTENSION);
break;
}
}

?>
<?php


if($ch==0)
{
$ch=1;
?>
<div class="section group">
<div class="col span_1_of_2" onclick="location.href='profile_page.php?uid=<?php echo $user1; ?>'">

	<img class="image_container1" src="members/<?php echo $user1; ?>/<?php echo $user1; ?>2.<?php echo $ext; ?>"/>
<div class="name"><?php echo $var_name;?></div>
	</div>
<?php

}
else
{
$ch=0;
?>
<div class="col span_2_of_2" onclick="location.href='profile_page.php?uid=<?php echo $user1; ?>'">
<img class="image_container1" src="members/<?php echo $user1; ?>/<?php echo $user1; ?>2.<?php echo $ext; ?>" />
<div class="name"><?php echo $var_name;  ?></div>
	</div>
</div>
<?php

}
?>		
<?php			
}

	}
	}}
	catch(PDOException $e){
		$db = null;
		exit();
	}
		
if($ch==1)
echo "</div>";
?>
