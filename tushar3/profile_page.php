<?php
include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}

if(!isset($_GET['uid']) || $_GET['uid'] == ""){
	header("location: index.php");
	$db = null;
	exit();
}

$user_id = $_GET['uid'];
$stmt = $db->prepare("SELECT username,full_name FROM members WHERE id=:user_id AND activated='1' LIMIT 1");
$stmt->bindValue(':user_id',$user_id,PDO::PARAM_INT);
	try{
		$stmt->execute();
	}
	catch(PDOException $e){
		//echo $e->getMessage();
		print_r($e->getTrace());
		$db = null;
		exit();
	}
$user_exists = $stmt->rowCount();
if($user_exists == 0){
	header("location: ../error/404.php");
}

/*function isPageOwner($user, $pagename){
	if($user == $pagename){
		return true;
	}else{
		return false;
	}
}
*/

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$fullName = $row['full_name'];
	$username = $row['username'];
	}
	
	if($fullName)
{$var_name= $fullName;}
else 
{$var_name= $username;}

?>


<!doctype html>
<html>
<style>
.new
{
position:relative;
cursor:pointer;
margin:1px;
}
.new:hover
{
border:1px solid gray;
}
</style>
<link rel="stylesheet" href="feed.css" type="text/css">
<link rel="stylesheet" type="text/css" href="profile.css">
<script src="jquery.js"></script>
<?php
include 'search1.php';
?>

<head>
<meta charset="utf-8">
<script>
$(document).ready(function(){
var uid="<?php  echo $user_id; ?>";
$.ajax({
url:'get_have.php',
type:"POST",
data:{
uid:uid
},
success:function(result){
$(".has").append(result);
}
});
var following=0;//intially, not following
var user1="<?php echo $_SESSION['uid']; ?>";
var user2="<?php echo $user_id; ?>";
$.ajax({
url:'follow/follow_check.php',
type:"POST",
data:{
user1:user1,user2:user2
},
success:function(result){

if(result=='1')
{
$(".follow").css({"color":"gray","background-color":"transparent"});
$(".follow").html("Following");
following=1;//now following
}
$(".follow").show();
}

});

$(".follow").click(function(){
if(following==0)//if not following previously
{
$.ajax({
url:'follow/follow_check1.php',
type:"POST",
data:{
user1:user1,user2:user2
},
success:function(result){
if(result=='1')
{
$(".follow").css({"color":"gray","background-color":"transparent"});
$(".follow").html("Following");
following=1;//now following
}
}
});

}
else//if following previously
{
$.ajax({
url:'follow/follow_check2.php',
type:"POST",
data:{
user1:user1,user2:user2
},
success:function(result){
if(result=='2')
{
$(".follow").css({"color":"white","background-color":"#006699"});
$(".follow").html("Follow");
following=0;//now not following
}
}
});

}
});
$(".f1").mouseenter(function(){
$(".f1").css({"color":" rgba(40,100,130,1)","cursor":"pointer"});
});

$(".f1").mouseleave(function(){
$(".f1").css({"color":"rgb(0,0,0)","cursor":"auto"});
});
$(".f2").mouseenter(function(){
$(".f2").css({"color":" rgba(40,100,130,1)","cursor":"pointer"});
});

$(".f2").mouseleave(function(){
$(".f2").css({"color":"rgb(0,0,0)","cursor":"auto"});
});

});


</script>

<title>Profile Page</title>


</head>
<body>

<div class="about">
<?php echo $var_name;?> 
</div>
<div class="every">

<img class="x"  src="<?php echo 'members/'.$user_id.'/'.$user_id.'.jpg' ?>"/>
<!--<div class="credit">
User credits:1000<?php echo $_SESSION['uid']; ?>
</div>

<div class="no_review">
Reviews: 3
</div>
-->
<?php
if($user_id!=$_SESSION['uid'])
{
?>
<button class="follow">Follow</button>
<?php
}
?>

<div class="has">
<?php echo $var_name;?>  has/had:<?php echo $_SESSION['uid']; ?><br>

</div>



<div class="below">
<div onclick="location.href='follow/following.php?uid=<?php echo $user_id;?>'" title="See who <?php echo $var_name;?> follows!" class="f1">Following</div>
<div onclick="location.href='follow/followers.php?uid=<?php echo $user_id;?>'"  title="See who follow <?php echo $var_name;?>!" class="f2">Followers</div>
</div>
</div>
<div class="feed">
<div class="box1">
sad<br>
asd<br>
asdas

</div>
<div class="box1">
sad<br>
asd<br>
asdas


</div>
</div>



</body>

</html>