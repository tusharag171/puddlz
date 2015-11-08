<?php
//SOURCE: http://www.ysquared.org/php/basics/use-the-query-string/
//Make the query string in <a href="page.php?mode=1">Mode 1</a> dynamic, as in we can change what parameter to pass
//Put it in foreach loop as we have to fetch the query string parameter from database
//parameter is the userid of the person following or follower

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

<img src="http://www.puddlz.com/saurabh/saurabh2/profile_pic.jpg" height="100px" width="80px"  ></img>
<br>
<b>User's name (fetched from database):  </b>
 
 <?php

if(strpos($_SERVER['REQUEST_URI'] , "/saurabh/saurabh2/profile2.php") === false)  //if part of url is not profile2.php
{
echo "<p>WAIT!!!!! STOP. WRONG PAGE </p>";
}

else if (strpos($_SERVER['REQUEST_URI'] , "/saurabh/saurabh2/profile2.php") !=0) //if BEGINNING of url is not profile2.php
{
echo "<p>AGAIN WAIT!!!!! STOP. WRONG PAGE </p>";
}

//We reached here. It means that url is of form /saurabh/saurabh2/profile2.php

else if($_SERVER['REQUEST_URI']=='/saurabh/saurabh2/profile2.php')  //If it is exact match, then page is correct- show self profile
//if($_SERVER['QUERY_STRING']== null)     //-this was the if condition instead of the above one 
{
//Put in the uid of the the current user from session.
 $person=mysql_query("SELECT `name` from `user` where uid='1'");
 }


else if($_SERVER['QUERY_STRING']!= null && (!isset($_GET['userid']) || !isset($_GET['alias']) ) )
{
//Page is invalid
echo "<p>AND AGAIN WAIT!!!!! STOP. WRONG PAGE </p>";
}


 else {                   //URL is of form saurabh/saurabh2/profile2.php and Query string is NOT null and it has userid or alias as parameters
//Now check: 1) if this page is referred to from htaccess, extract the query string alias
// Case 1) is only possible if the alias exists.
//2) if alias does not exist then the <a href> below will link to profile2.php?userid=whatever
//So extract userid in that case

if(isset($_GET['userid'])) {
$person=mysql_query("SELECT `name` from `user` where uid=". $_GET['userid']);
}
else if(isset($_GET['alias']))  {
$person=mysql_query("SELECT `name` from `user` where alias='". $_GET['alias']. "'");
}
  
 }
$row2 = mysql_fetch_array($person);
 echo $row2['name'];
 echo "<br> <br> is following: <br>";
 
 
if($_SERVER['QUERY_STRING']== null) {
//Put in the uid of the the current user from session.
$res = mysql_query("SELECT `following` FROM `following` where user='1'");
}

else{
//$res = mysql_query("SELECT `following` FROM `following` where user=". $_GET['userid'] );

if(isset($_GET['userid'])) {
$res= mysql_query("SELECT `following` FROM `following` where user=". $_GET['userid'] );
}
else if(isset($_GET['alias']))  {
$res= mysql_query("SELECT `following` FROM `following` where user= (SELECT `uid` from `user` where alias='". $_GET['alias']. "')" );
}
  

}

while($row = mysql_fetch_array($res))
{
$viewname=mysql_query("SELECT `name` from `user` where uid=". $row ['following']);  //Just find out the name from uid
// I want to execute the above query once, is there a way to do so without mysql_fetch_array ??
$view=mysql_fetch_array($viewname);

$aliasquery=mysql_query("SELECT `alias` from `user` where uid=". $row ['following']);
$view2=mysql_fetch_array($aliasquery);
//Case when you are at your own profile, and no query string in url exists
//You've to check if alias exists-> then goto alias url

if($view2['alias']==null) {
echo "<a href='http://www.puddlz.com/saurabh/saurabh2/profile2.php?userid=",$row['following'],"'>",$view['name'],"</a> - Alias name does not exist for this user. <br>";
}
else {
echo "<a href='http://www.puddlz.com/",$view2['alias'],"'>",$view['name'],"</a> <br>";
}

}
?>

</div>

</body>

</html>