<?php
$con = mysql_connect("puddlzcom1.ipagemysql.com","saurabh", "saurabh");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("puddlz_s", $con);

 $sql = "SELECT `IMAGE` FROM `images` WHERE id=(SELECT max(id) from `images`) ";  
 $result = mysql_query("$sql"); 
 $row = mysql_fetch_assoc($result); 
 mysql_close($con); 
 header("Content-type: image/jpeg"); 
 echo $row['IMAGE'];
 
?>