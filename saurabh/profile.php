<?php
//This program displays the basic profile page of a user. It displays the user id of people he is following.
//When we click on that userid, the profile of that person opens up.

$con = mysql_connect("puddlzcom1.ipagemysql.com","saurabh", "saurabh");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("puddlz_s", $con);
?>

<html>
<head>
<style>
div.upper
{
border:1px solid gray;
padding:5px;
margin:10px;
}
</style>
</head>

<body>
<div class="upper">
<img src="profile_pic.jpg" height="100px" width="80px"  ></img>
<br>
<b>User's name (fetched from database):  </b>
 
 
 <?php
if($_SERVER['QUERY_STRING']== null) {
 $person=mysql_query("SELECT `name` from `user` where uid='1'");
 }
 else {
  //$q=$_SERVER['QUERY_STRING'];
 // echo $q;
  $person=mysql_query("SELECT `name` from `user` where uid=". $_GET['userid']);
 }
while( $row2 = mysql_fetch_array($person)) {
 echo $row2['name'];
 }
 echo "<br><br>",  $row2['name'],  "is  following: <br>";
if($_SERVER['QUERY_STRING']== null) {
$res = mysql_query("SELECT `following` FROM `following` where user='1'");
}

else{
$res = mysql_query("SELECT `following` FROM `following` where user=". $_GET['userid'] );
}

while($row = mysql_fetch_array($res))
{
echo "<a href='profile.php?userid=",$row['following'],"'>",$row['following'],"</a>";
//parameter is the userid of the person following or follower
echo "<br>";
}
?>

</div>

</body>

</html>