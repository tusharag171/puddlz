<?php
//Make the query string in <a href="page.php?mode=1">Mode 1</a> dynamic, as in we can change what parameter to pass
//Put it in foreach loop as we have to fetch the query string parameter from database
//parameter is the userid of the person following or follower
?>

<html>

<body>
<p>This is my page. I'll put the details from Database. </p>

<?php
$con = mysql_connect("puddlzcom1.ipagemysql.com","saurabh", "saurabh");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("puddlz_s", $con);
$res = mysql_query("SELECT `following` FROM `following` where user='1'");

echo "<b> The user-ids of the people I am following are: </b> <br>";

while($row = mysql_fetch_array($res))
{
echo "<a href='page2.php?userid=",$row['following'],"'>",$row['following'],"</a>";
echo "<br>";
}
?>

<a href="page2.php?userid=2">Follower 2</a>

</body>

</html>