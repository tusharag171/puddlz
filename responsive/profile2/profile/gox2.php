<html>

<?php
include_once("scripts/check_user.php");
$user_id=$_SESSION['uid'];


// Create connection
$search_string=$_POST['y'];

$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "'.$search_string.'%" limit 2');
$y1=0;
$y2=0;
$i=0;
while($row=mysqli_fetch_array($result))
{
$i++;
$x=$row['name'];
$y=$row['product_id'];
if($i==1)
$y1=$y;
else
$y2=$y;
$x3="<img src='../../saurabh/upload_image/upload_to_folder/images_thumbnail/$y.jpg'></img>";
$x1="location.href='gox.php?x=$y'";

echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div></div>';
}

$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" limit 4');
while($row=mysqli_fetch_array($result))
{
$x=$row['name'];
$y=$row['product_id'];
$x3="<img src='../../saurabh/upload_image/upload_to_folder/images_thumbnail/$y.jpg'></img>";
$x1="location.href='gox.php?x=$y'";
if($y!=$y1 && $y!=$y2)
echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div></div>';
}



$result = mysqli_query($con,'SELECT user2 FROM follow WHERE user1='.$user_id);
$count=0;
while($row=mysqli_fetch_array($result))
{
$user2=$row['user2'];
$result1 = mysqli_query($con,'SELECT full_name FROM members WHERE id='.$user2.' limit 2');
$rowx=mysqli_fetch_array($result1);
$full2=$rowx['full_name'];
if($count==4)
break;
if(strpos(strtolower($full2),strtolower($search_string))!==false)
{
$x1="location.href='profile_page.php?uid=$user2'";
echo '<div class="d" onclick='.$x1.'><div class="d0">'.$full2.'</div></div>';
$count=$count+1;
}
}

if($count==0)
{

$result1 = mysqli_query($con,'SELECT id,full_name FROM members WHERE full_name LIKE "%'.$search_string.'%" limit 8');
while($row=mysqli_fetch_array($result1))
{
$id=$row['id'];
$full1=$row['full_name'];

$x1="location.href='profile_page.php?uid=$id'";
echo '<div class="d" onclick='.$x1.'><div class="d0">'.$full1.'</div></div>';

}
}


/*
while($row=mysqli_fetch_array($result))
{
$i++;
$x=$row['full_name'];
$y=$row['id'];
$x3="<img src='../../saurabh/upload_image/upload_to_folder/images_thumbnail/$y.jpg'></img>";
$y1=$y;

$x1="location.href='profile_page.php?uid=$y'";

echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div></div>';
}

$result1 = mysqli_query($con,'SELECT user2 FROM members WHERE user1='.$user_id);
while($row1=mysqli_fetch_array($result1))
{

}
$result = mysqli_query($con,'SELECT * FROM members WHERE full_name LIKE "%'.$search_string.'%" AND limit 2');
while($row=mysqli_fetch_array($result))
{
$i++;
$x=$row['full_name'];
$y=$row['id'];
$x3="<img src='../../saurabh/upload_image/upload_to_folder/images_thumbnail/$y.jpg'></img>";

$x1="location.href='profile_page.php?uid=$y'";
if($y!=$y1)
echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div></div>';
}*/
$search1_string=$search_string;
$s3=$search_string;
$search_string=preg_replace("/ /","spsp",$search_string);
$x2="location.href='display_all.php?x=$search_string'";
echo '<div class="d" onclick='.$x2.'><div class="d0">See all product results for<strong> '.$search1_string.'</strong></div></div>';
$result = mysqli_query($con,'SELECT * FROM members WHERE full_name LIKE "'.$search_string.'%" limit 2');

$search1_string=$s3;
$search_string=preg_replace("/ /","spsp",$s3);
$x2="location.href='display_all_people.php?x=$search_string'";
echo '<div class="d" onclick='.$x2.'><div class="d0">See all people results for<strong> '.$search1_string.'</strong></div></div>';
?>

</html>
