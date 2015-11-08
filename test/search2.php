

<?php
$x1=$_REQUEST['x'];
$con=mysqli_connect("puddlzcom1.ipagemysql.com","puddlz","Anhad@123","puddlz");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,'SELECT * FROM User WHERE name LIKE "%'.$x1.'%"');
while($row=mysqli_fetch_array($result))
{
echo $row['name'];
echo "<br>";
echo $row['email'];
echo "<br>";

header("Content-type: image/jpeg"); 
?>
<img src="<?php echo base64_encode($row['pic']);?>"/>
<?php

}
?>