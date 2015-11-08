<?php
$requested_page = $_POST['page_num'];
$search_string=$_POST['y'];
//$requested_page=2;
$set_limit = (($requested_page - 1) * 8) . ",8";
$search_string=preg_replace('/spsp/',' ',$search_string);
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" limit '.$set_limit.'');
while($row=mysqli_fetch_array($result))
{
$x=$row['username'];
$y=$row['id'];
$x1="location.href='profile_page.php?x=$y'";
echo '<div class="d1">';
echo $row['full_name'];
echo "<br>";
echo "<br>";

echo '</div>';
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
}


?>