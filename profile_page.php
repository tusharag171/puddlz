<?php
include 'scripts/connect.php';
if(!isset($_GET['uid']) || $_GET['uid'] == ""){
	header("location: index.php");
	$db = null;
	exit();
}

$user_id = $_GET['uid']; 
$stmtime = $db->prepare("SELECT now() as a");
$stmtime->execute();
$rowtime = $stmtime->fetch(PDO::FETCH_ASSOC);
$current_time=$rowtime['a'];

$stmt2 = $db->prepare("SELECT * FROM review where id=:user1 and lastlog<:current_time");
$stmt2->bindValue(':user1',$user_id,PDO::PARAM_INT);
$stmt2->bindValue(':current_time',$current_time,PDO::PARAM_STR);

$stmt2->execute();
$count=$stmt2->rowCount();



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
	header("location: error/404.php");
}


while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$fullName = $row['full_name'];
	$username = $row['username'];
	}
	
	if($fullName)
{$var_name= $fullName;}
else 
{$var_name= $username;}

include 'search_final.php';
?>

<!doctype html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="review/review/jquery.raty.min.js"></script>
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

<link rel="stylesheet" type="text/css" href="profile/profile.css">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:701px) and (max-width:1125px)" href="profile/profile_mediumscreen.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:700px)" href="profile/profile_smallscreen.css" />	
<link rel="stylesheet" type="text/css" href="profile/css/screen_layout_large.css">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:700px)" href="profile/css/screen_layout_small.css" />		

<!-- bxSlider Javascript file -->

<script src="profile/slide/jquery.bxslider.min.js"></script>
<script src="profile/slide/jquery.bxslider.js"></script>
<link href="profile/slide/jquery.bxslider.css" rel="stylesheet" />

<head>
<meta charset="utf-8">
<script>
$(document).ready(function(){

$('.bxslider').bxSlider({
  minSlides: 1,
  maxSlides: 5,
  slideWidth: 60,
  slideMargin: 5
});

$.fn.raty.defaults.path = '';
$('div.a1').raty({
readOnly: true,
  score: function() {
    return $(this).attr('init');
  },
half: true,
halfShow:true
});

var uid="<?php  echo $user_id; ?>";

var following=0;//intially, not following
var user1="<?php echo $_SESSION['uid']; ?>";
var user2="<?php echo $user_id; ?>";
$.ajax({
url:'profile/follow/follow_check.php',
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
url:'profile/follow/follow_check1.php',
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
url:'profile/follow/follow_check2.php',
type:"POST",
data:{
user1:user1,user2:user2
},
success:function(result){
if(result=='2')
{
$(".follow").css({"color":"white","background-color":"#01aef0"});
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

.click1
{
cursor:pointer;
}
.click1:hover
{
text-decoration:underline;

}
 

</style>



<script>
$(document).ready(function(){

 var page=1;
 var current_time="<?php echo $current_time; ?>";
$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() == $(document).height()) {

var user_id = "<?php echo $user_id; ?>";            
	                    page++;	 
	                    var data = {
	                        page_num:page,current_time:current_time,user_id:user_id
	                    };
var actual_count = "<?php echo $count; ?>";

if((page-1)* 6< actual_count){
   $(".aj1").show();  
   $.ajax({
    type: "POST",
    url: "profile/data.php",
    data:data,
    success: function(res) {
        $(".feed_boxes").append(res);
       $(".aj1").hide();
$('div.a1').raty({
readOnly: true,
  score: function() {
    return $(this).attr('init');
  },
half: true,
halfShow:true
});
    }
});                        
}
}
});

});

</script>



<style>
.list1
{
position:relative;

}
.aj1
{
position:fixed;
left:50%;
top:90%;
display:none;
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
$dir="members/".$user_id; 
if ($dir_list = opendir($dir))
{

while(($filenamee = readdir($dir_list)) != false)
{
//  readdir is returning dot. so skip them
if ($filenamee == '.' or $filenamee == '..')
 continue;

else
{
$ext = pathinfo($filenamee, PATHINFO_EXTENSION);
//echo "<br> extension is ". $ext;
break;
}

}

?>

<img  class="x" src="<?php echo "members/".$user_id."/". $user_id . "." . $ext  ; ?>"/> 
<?php

closedir($dir_list);
}
?>

	
<?php
if($user_id==$_SESSION['uid'])
{
?>
	<div class="profilebutton"> Change
	<form action="profile/change_image.php" enctype="multipart/form-data" method="post">
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

$stmtx=$db->prepare('SELECT * FROM review WHERE id=:uid ORDER BY product_id');
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
$z='location.href="product_page1.php?x='.$x2.'"';
echo "<li><img class='imslide' onclick=$z src='insert/$x2/4.jpg' title='$name'/></li>";
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
$z='location.href="product_page1.php?x='.$x2.'"';
echo "<li><img class='imslide' onclick=$z src='insert/$x2/4.jpg' title='$name'/></li>";
}

if($count!=0)
echo "</ul>";
else 
echo "NONE";
?>
</div>

<div class="below">
<div onclick="location.href='following.php?uid=<?php echo $user_id;?>'" title="See who <?php echo $var_name;?> follows!" class="f1">Following</div>
<div onclick="location.href='followers.php?uid=<?php echo $user_id;?>'"  title="See who follow <?php echo $var_name;?>!" class="f2">Followers</div>
</div>

</div>


<div class="part3_feed">
<div class="left_heading"> Recent Activity </div>

<div class="feed_boxes">


<?php

$stmt = $db->prepare("SELECT * FROM review where id=:user1 and lastlog<:current_time ORDER BY lastlog DESC LIMIT 6");
$stmt->bindValue(':user1',$user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$stmtn = $db->prepare("SELECT full_name FROM members where id=:id LIMIT 1");
$stmtn->bindValue(':id',$row['id'],PDO::PARAM_INT);
$stmtx = $db->prepare("SELECT name FROM product where product_id=:pid LIMIT 1");
$stmtx->bindValue(':pid',$row['product_id'],PDO::PARAM_INT);
$stmtx->execute();
$rowx = $stmtx->fetch(PDO::FETCH_ASSOC);
$stmtn->execute();
$rown = $stmtn->fetch(PDO::FETCH_ASSOC);
$y=$row['id'];
$dir="../members/".$y; 
$dir_list = opendir($dir);

while(($filenamee = readdir($dir_list)) != false)
{
if ($filenamee == '.' or $filenamee == '..')
 continue;
else
{
$ext = pathinfo($filenamee, PATHINFO_EXTENSION);

break;
}
}
?>

<div class="feedbox">
<div class="head">

<img class="image_container1" src="members/<?php echo $row['id']; ?>/<?php echo $row['id']; ?>2.<?php echo $ext; ?>"/>
<div class="line"></div>
<img class="image_container1" src="insert/<?php echo $row['product_id'];?>/4.jpg"/>

<div class="con">
<strong><?php echo $rown['full_name'];?></strong> reviewed <strong><span class="click1" onclick="location.href='product_page1.php?x=<?php echo $row['product_id']; ?>'"><?php echo $rowx['name']; ?></span></strong></div>
<div class="rating">
Rating:<div class="a1" init="<?php echo $row['rating']; ?>"></div>
</div>
</div>
<div class="content">
<p> <?php if($row[is_rev]!=0)
echo $row['comment'];
else if($_SESSION['uid']!=$row['id'])
{ 
echo "<div style='color:red;'>";
echo "<center>";
echo "This person has not yet commented yet about this product.";
echo "</center>";
echo "</div>";
}
else
{ echo "<div style='color:red;'>"; 
echo "<center>";
echo "You have not yet commented yet about this product.";
echo "</center>";
echo "</div>";
}
 ?>
</p> </div>

<div class="foot">
<table >
<tr><td>

</td>
<td >
<?php
if($_SESSION['uid']==$row['id'])
{?>
<strong>
<p class="click1" onclick="location.href='product_page1.php?x=<?php echo $row['product_id']; ?>'"> Edit </p>
</strong>
<?php
}
?>
</td>
</table>

</div>
</div>
<br/>
<?php } ?>
</div>
<div class="aj1">
<img src="aj1.gif"/>
</div>
<div style="clear:both;"></div>

</div>

<div class="endd"> </div>

</div>



</div>



</body>

</html>