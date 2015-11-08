<?php

include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}

include 'search1.php';
$uid=$_SESSION['uid'];
?>
<?php
$x=$_REQUEST['x'];
?>
include 'search1.php';
$uid=$_SESSION['uid'];
?>
<?php
$x=$_REQUEST['x'];
?>

<!doctype html>
<html>
<style>
.has
{
position:relative;
top:200px;
width:200px;
height:30px;
color:white;
background-color:blue;
cursor:pointer;
z-index:-1;
display:none;
}
.rev
{
position:relative;
top:200px;
width:200px;
height:30px;
color:white;
background-color:blue;
cursor:pointer;
z-index:-1;
display:none;
}
.yo2
{
position:absolute;
top:300px;
display:none;
}
</style>
<link rel="stylesheet" href="feed.css" type="text/css">
<script src="jquery.js"></script>


<head>

<title>Product Page</title>
<button class="has">I have it!</button>
<button class="rev">Review it</button>
<script>
$(document).ready(function(){
var open=0;
$(".rev").click(function(){
if(open==0)
{
$(".yo2").show();
open=1;
}
else
{
$(".yo2").hide();
open=0;
}
});
$(".submit2").click(function(){
$(".yo2").hide();
open=0;
});
var have=0;
var uid="<?php  echo $uid; ?>";
var x="<?php echo $x; ?>";
$.ajax({//to check if has/had
url:'gox_check1.php',
type:"POST",
data:{
uid:uid,x:x
},
success:function(result){
if(result=='1')
{
have=1;
$(".has").html("Yeah, you have it!");
$(".has").css("background-color","red");

}
$(".has").show();
}
});
//to check 3 cases of reviews
var rated=0;
$.ajax({
url:'rev_check1.php',
type:"POST",
data:{
uid:uid,x:x
},
success:function(result1){
if(result1=='3')
{
rated=0;
$(".rev").html("Review it!");
$(".rev").css("background-color","blue");
}
else
{
rated=2;
$(".rev").html("Edit Review!");
$(".rev").css("background-color","red");

}
$(".rev").show();
}
});

$(".has").click(function(){
if(have==0)
{
$.ajax({
url:'gox_do1.php',
type:"POST",
data:{
uid:uid,x:x
}
});
have=1;
$(".has").css("background-color","red");
$(".has").html("Yeah, you have it!");
}
else
{
$.ajax({
url:'gox_do2.php',
type:"POST",
data:{
uid:uid,x:x
}
});
$(".has").css("background-color","blue");
$(".has").html("I have it!");
have=0;
}
});
});
</script>

</head>
<body>
<?php
$id=$x;
echo "<br><br><br><br>";
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tush");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM product WHERE product_id='$id' limit 5");
$row=mysqli_fetch_row($result);
echo $row[1];
echo "<br>";
echo $row[2]."<br>".$row[3]."<br>".$row[4]."<br>";
echo $uid;
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT * FROM review WHERE product_id=:x AND id=:uid');
$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->bindParam(':x',$x, PDO::PARAM_STR);

try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}

$html='3';
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

if($row['is_rev']==0)
$html='1';
if($row['is_rev']==1)
$html='2';
}
echo "<div class='yo2'>";
if($html=='1')
include 'write_review1.php';
else if($html=='3')
include 'write_review.php';
else 
include 'write_review2.php';
echo "</div>";

?>
</body>
</html>