<?php
$requested_page = $_POST['page_num'];
$search_string=$_POST['y'];
//$requested_page=2;
$set_limit = (($requested_page - 1) * 14) . ",14";
$search_string=preg_replace('/spsp/',' ',$search_string);
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
//Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,'SELECT * FROM product WHERE name LIKE "%'.$search_string.'%" ORDER BY release_year DESC limit '.$set_limit.'');

$ch=0;
while($row=mysqli_fetch_array($result))
{
if($ch==0)
{
$ch=1;
$x=$row['name'];
$y=$row['product_id'];
$x1="location.href='product_page1.php?x=$y'";


echo '<div class="section group">';
echo '<div class="col span_1_of_2" onclick='.$x1.'>';

	echo '<img class="image_container1" src="insert/'.$y.'/4.jpg"/>';
echo '<div class="name">'.$x.'</div>';
	echo '</div>';


}
else
{
$ch=1;
$x=$row['name'];
$y=$row['product_id'];
$x1="location.href='product_page1.php?x=$y'";


echo '<div class="col span_2_of_2" onclick='.$x1.'>';

	echo '<img class="image_container1" src="insert/'.$y.'/4.jpg"/>';
echo '<div class="name">'.$x.'</div>';
	echo '</div>';
echo '</div>';

$ch=0;
}
}


if($ch==1)
echo "</div>";



?>