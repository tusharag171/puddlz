<html>
<head>
<title>Product Page</title>

<link rel="stylesheet" href="../upperbox/feed.css" type="text/css">
<script src="../upperbox/jquery.js"></script>
<?php
include '../upperbox/search1.php';
?>

</head>
<body>
<?php
$id=1;
echo "<br><br><br><br>";
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM product WHERE product_id='$id'");
$row=mysqli_fetch_row($result);
echo $row[1];
echo "<br>";
echo $row[2]."<br>".$row[3]."<br>".$row[4]."<br>";

?>
</body>
</html>