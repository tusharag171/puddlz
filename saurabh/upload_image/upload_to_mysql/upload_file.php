<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

	//NOW STORE FILE IN MYSQL DATABASE
	
$con = mysql_connect("puddlzcom1.ipagemysql.com","saurabh", "saurabh");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("puddlz_s", $con);


$tmpName=$_FILES["file"]["tmp_name"];
$fp = fopen($_FILES["file"]["tmp_name"], 'r');
$data = fread($fp, filesize($tmpName));
$data = addslashes($data);
fclose($fp);

$query = "INSERT INTO `images` (`image`) VALUES ('$data') ";
$results = mysql_query($query, $con);

echo "<a href='viewimage.php'> 	Click here to view your uploaded image </a> ";
  
    }
  }
else
  {
  echo "Invalid file";
  }
?>