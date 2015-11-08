<html>

<?php


// Create connection
$search_string=$_POST['y'];

$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
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
$x1="location.href='product_page1.php?x=$y'";

echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div><img class="d4" src="insert/'.$y.'/4.jpg" width="30px" height="30px"/></div>';
}

$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" limit 4');
while($row=mysqli_fetch_array($result))
{
$x=$row['name'];
$y=$row['product_id'];
$x1="location.href='product_page1.php?x=$y'";
if($y!=$y1 && $y!=$y2)
echo '<div class="d" onclick='.$x1.'><div class="d0">'.$x.'</div><img class="d4" src="insert/'.$y.'/4.jpg" width="30px" height="30px"/></div>';
}

$y1=0;




$search1_string=$search_string;
$s3=$search_string;
$search_string=preg_replace("/ /","spsp",$search_string);
$x2="location.href='display_all.php?x=$search_string'";
echo '<div class="d" onclick='.$x2.'><div class="d0">See all product results for<strong> '.$search1_string.'</strong></div></div>';

?>

</html>
