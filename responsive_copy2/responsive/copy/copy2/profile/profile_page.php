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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

<link rel="stylesheet" type="text/css" href="profile.css">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:601px) and (max-width:1125px)" href="profile_mediumscreen.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:600px)" href="profile_smallscreen.css" />		

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

<div class="all_info">

<div class="part2">

<div class="part1">
<?php echo $var_name;?>  
</div>
	<div class="x1">

	<img  class="x" src="<?php echo '../../tushar3/members/'.$user_id.'/'.$user_id.'.jpg' ?>"/> 
	
	<div class="profilebutton">
	<form action="change_image.php" enctype="multipart/form-data" method="post">
	<input type="file" name="file">
	<input name="submit" type="submit" value="Submit" />
	</form>
	</div>

	</div>

<div class="no_review">
<?php echo $var_name; ?> has reviewed 2 products.<br>

</div>

<?php
if($user_id!=$_SESSION['uid'])
{
?>
<button class="follow">Follow</button>
<?php
}
?>


<div class="has">
<?php echo $var_name; ?>   has/had:<br>

</div>

<div class="below">
<div title="See who Anhad follows!" class="f1">Following</div>
<div title="See who follow Anhad!" class="f2">Followers</div>
</div>

</div>


<div class="part3_feed">
<div class="left_heading"> Recent Activity </div>

<div class="feed_boxes">
<div class="box1">
- Anhad wrote a review for Samsung Galaxy Champ. The phone is best-buy for its price. It has reasonable specifications - 3.2 mp camera, good battery life,  primary camera of 1 mp which is just fine for front viewing. OS is Android Kitkat 4.2 and it can be updated to 4.3 when it releases.
</div>
<div class="box1">
- Anhad gave 4 stars to I-Phone 5S.
</div>
<div class="box1">
- Anhad added Moto-G to phones he has.
</div>


</div>

</div>



</div>

</body>

</html>