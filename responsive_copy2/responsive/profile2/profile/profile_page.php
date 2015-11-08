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
<link rel="stylesheet" type="text/css" href="css/screen_layout_large.css">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:601px) and (max-width:1125px)" href="profile_mediumscreen.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:600px)" href="css/screen_layout_small.css" />		

<?php
 include 'search_final.php';
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- bxSlider Javascript file -->

<script src="slide/jquery.bxslider.min.js"></script>
<script src="slide/jquery.bxslider.js"></script>

<link href="slide/jquery.bxslider.css" rel="stylesheet" />

<head>
<meta charset="utf-8">
<script>
$(document).ready(function(){

$('.bxslider').bxSlider({
  minSlides: 1,
  maxSlides: 4,
  slideWidth: 60,
  slideMargin: 5
});



var uid="<?php  echo $user_id; ?>";

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
<style>
.bx-wrapper, .bx-viewport {
    height:75px !important; 
}
.imslide
{
cursor:pointer;
}
.imslide:hover
{
border:2px solid transparent;
}
</style>
<title>Profile Page</title>


</head>
<body>

<div class="all_info">

<div class="part2">

<div class="part1">
<?php echo $var_name;?>  
</div>
	<div class="x1">

<?php
$dir="images_profile"; 
if ($dir_list = opendir($dir))
{
while(($filenamee = readdir($dir_list)) != false)
{
?>
<img  class="x" src="<?php echo "images_profile/".$filenamee ?>"/> 
<?php
}
closedir($dir_list);
}
?>

	
<?php
if($user_id==$_SESSION['uid'])
{
?>
	<div class="profilebutton"> Change
	<form action="change_image.php" enctype="multipart/form-data" method="post">
	<input type="file" name="file" class="file_pic" onchange="javascript:this.form.submit();">
	
	</form>
	</div>
<?php
}
?>
	</div>

<div class="no_review">
<?php echo $var_name; ?> has reviewed:<br>
<?php 
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmtx=$db->prepare('SELECT * FROM review WHERE id=:uid');
$stmtx->bindParam(':uid',$user_id, PDO::PARAM_STR);

try
{
$stmtx->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}
$count=0;
while($row=$stmtx->fetch(PDO::FETCH_ASSOC))
{
$count=$count+1;
if($count==1)
{
echo "<ul class='bxslider'>";
}
$x2=$row['product_id'];
$stmtx1=$db->prepare('SELECT name FROM product WHERE product_id=:x2');
$stmtx1->bindParam(':x2',$x2, PDO::PARAM_STR);
$stmtx1->execute();
$rowx=$stmtx1->fetch(PDO::FETCH_ASSOC);
$name=$rowx['name'];
$z='location.href="gox.php?x='.$x2.'"';
echo "<li><img class='imslide' onclick=$z src='/../../saurabh/upload_image/upload_to_folder/images_thumbnail/$x2.jpg' title='$name'/></li>";
}

if($count!=0)
echo "</ul>";
else
echo "NONE";
?>




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


<?php 
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT * FROM has_had WHERE id=:uid');
$stmt->bindParam(':uid',$user_id, PDO::PARAM_STR);

try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}
$stmty=$stmt;
$count=0;
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$count=$count+1;
if($count==1)
{
echo "<ul class='bxslider'>";
}
$x2=$row['product_id'];
$stmt1=$db->prepare('SELECT name FROM product WHERE product_id=:x2');
$stmt1->bindParam(':x2',$x2, PDO::PARAM_STR);
$stmt1->execute();
$rowx=$stmt1->fetch(PDO::FETCH_ASSOC);
$name=$rowx['name'];
$z='location.href="gox.php?x='.$x2.'"';
echo "<li><img class='imslide' onclick=$z src='/../../saurabh/upload_image/upload_to_folder/images_thumbnail/$x2.jpg' title='$name'/></li>";
}

if($count!=0)
echo "</ul>";
else 
echo "NONE";
?>
</div>

<div class="below">
<div onclick="location.href='follow/following.php?uid=<?php echo $user_id;?>'" title="See who <?php echo $var_name;?> follows!" class="f1">Following</div>
<div onclick="location.href='follow/followers.php?uid=<?php echo $user_id;?>'"  title="See who follow <?php echo $var_name;?>!" class="f2">Followers</div>
</div>

</div>


<div class="part3_feed">
<div class="left_heading"> Recent Activity </div>

<div class="feed_boxes">
<div class="feedbox">

<div class="head">
<img class="image_container1" src="#"/>
<div class="line"></div>
<img class="image_container1" src="#"/>
<div class="con">
 reviewed iphone</div>
<div class="rating">
Rating: 3.5/5</div>
</div>

<div class="content">
<p>
</p> </div>

<div class="foot">
<table >
<tr><td>
<p>
 </p>
</td>
<td >
<p> Edit </p>
</td>
</table>

</div>
</div>
<br/>
</div>

<div style="clear:both;"></div>

</div>

</div>


	
</div>



</div>

</body>

</html>