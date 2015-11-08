<html>
<head>
List of user profiles.
</head>

<?php

$con=mysqli_connect("puddlzcom1.ipagemysql.com","puddlz","Anhad@123","puddlz");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$results = mysqli_query($con,"SELECT * FROM User");

while($result=mysqli_fetch_array($results))
{
echo "<br>";
$x=$result['email'];
$y=$result['name'];
echo "<a href='go.php?q=$x'>$y</a>";
}
}
?>
</html>