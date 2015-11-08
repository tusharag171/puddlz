<?php
$requested_page = $_POST['page_num'];
$search_string=$_POST['y'];
//$requested_page=2;
$set_limit = (($requested_page - 1) * 12) . ",12";
$search_string=preg_replace('/spsp/',' ',$search_string);
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,'SELECT * FROM members WHERE full_name LIKE "%'.$search_string.'%" limit '.$set_limit.'');

$ch=0;
while($row=mysqli_fetch_array($result))
{
$y=$row['id'];
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
if($ch==0)
{
$ch=1;
$x=$row['full_name'];
$y=$row['id'];
$x1="location.href='profile_page.php?uid=$y'";


echo '<div class="section group">';
echo '<div class="col span_1_of_2" onclick='.$x1.'>';

	echo '<img class="image_container1"  src="members/<?php echo $y; ?>/<?php echo $y; ?>2.<?php echo $ext; ?>"/>';
echo '<div class="name">'.$x.'</div>';
	echo '</div>';


}
else
{
$ch=1;
$x=$row['full_name'];
$y=$row['id'];
$x1="location.href='profile_page.php?uid=$y'";


echo '<div class="col span_2_of_2" onclick='.$x1.'>';

	echo '<img class="image_container1"  src="../members/<?php echo $y; ?>/<?php echo $y; ?>2.<?php echo $ext; ?>"/>';
echo '<div class="name">'.$x.'</div>';
	echo '</div>';
echo '</div>';

$ch=0;
}
}


if($ch==1)
echo "</div>";



?>