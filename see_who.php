<!DOCTYPE html>
<html>
<style>
.click2
{
cursor:pointer;
}
.click2:hover
{
text-decoration:underline;
}
</style>
<link rel="stylesheet" type="text/css" href="search/screen.css">
<title>See who has</title>
<script src="jquery.js"></script>
<?php

include_once("scripts/check_user.php");
$user_id=$_SESSION['uid'];
include 'search_final.php';
$x=$_GET['x'];
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>



<body>
<div class="list1">
<div class="container">
<?php
$result = mysqli_query($con,'SELECT name FROM product WHERE product_id='.$x);
$row2=mysqli_fetch_array($result);
$name=$row2['name'];
?>
Among the people you follow, following have <span class='click2' onclick='location.href="product_page1.php?x=<?php echo $x; ?>"'><strong><?php echo $name; ?></strong></span>

<?php
$result1 = mysqli_query($con,'SELECT id FROM has_had WHERE product_id='.$x.' AND id IN (SELECT user2 FROM follow WHERE user1='.$user_id.' AND user2!=user1)');


$ch=0;
while($rowx1=mysqli_fetch_array($result1))
{

$user2=$rowx1['id'];
$y=$user2;
$dir="members/".$y; 
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
if($user_id!=$user2)
{
$result2 = mysqli_query($con,'SELECT full_name FROM members WHERE id='.$user2.' LIMIT 1');
$rowx=mysqli_fetch_array($result2);
$full_name=$rowx['full_name'];
if($ch==0)
{
$ch=1;

$x1="location.href='profile_page.php?uid=$user2'";

?>
<div class="section group">
<div class="col span_1_of_2" onclick=<?php echo $x1; ?>>

	<img class="image_container1" src="members/<?php echo $user2; ?>/<?php echo $user2; ?>2.<?php echo $ext; ?>"/>
<div class="name"><?php echo $full_name; ?></div>
	</div>

<?php
}
else
{
$ch=1;
$x1="location.href='profile_page.php?uid=$user2'";

?>

<div class="col span_2_of_2" onclick=<?php echo $x1; ?>>
<img class="image_container1" src="members/<?php echo $user2; ?>/<?php echo $user2; ?>2.<?php echo $ext; ?>"/>
<div class="name"><?php echo $full_name; ?></div>
	</div>
</div>
<?php
$ch=0;
}
}
}


if($ch==1)
echo "</div>";

?>
</div>
</div>


</html>