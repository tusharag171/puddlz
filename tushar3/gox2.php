<html>

<?php
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
$x3="<img src='/../saurabh/upload_image/upload_to_folder/images_thumbnail/$y.jpg' height='60px' width='60px'></img>";
if($i==1)
$y1=$y;
else
$y2=$y;
$x1="location.href='gox.php?x=$y'";

echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div><div class="d4">'.$x3.'</div></div>';
}

$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" limit 3');
while($row=mysqli_fetch_array($result))
{
$x=$row['name'];
$y=$row['product_id'];
$x3="<img src='/../saurabh/upload_image/upload_to_folder/images_thumbnail/$y.jpg' height='60px' width='60px'></img>";
$x1="location.href='gox.php?x=$y'";
if(($y!=$y1) && ($y!=$y2))
echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div><div class="d4">'.$x3.'</div></div>';
}
$search1_string=$search_string;
$search_string=preg_replace("/ /","spsp",$search_string);
$x2="location.href='display_all.php?x=$search_string'";
echo '<div class="d" onclick='.$x2.'><div class="d0">See all results for<strong> '.$search1_string.'</strong></div></div>';
?>

</html>
