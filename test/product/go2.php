<html>

<?php
// Create connection
$search_string=$_POST['y'];

$con=mysqli_connect("puddlzcom1.ipagemysql.com","puddlz","Anhad@123","puddlz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,'SELECT * FROM User WHERE name LIKE "%'.$search_string.'%"');
while($row=mysqli_fetch_array($result))
{
$x=$row['name'];
$x1="location.href='go.php?=$x'";
echo '<div class="d" onclick='.$x1.'><strong>'.$x.'</strong></div>';
}
?>

</html>
