<?php

include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}
$user_id=$_SESSION['uid'];
?>
<!doctype html>
<html>

<link rel="stylesheet" href="feed.css" type="text/css">
<style>
.a1
{
position:absolute;
top:100px;

}
.name
{
position:absolute;
top:130px;
width:300px;
}
.name2
{
position:absolute;
top:70px;
width:300px;
}
.review
{
position:absolute;
top:150px;
height:70px;
width:400px;
}
.submit2
{
position:absolute;
top:250px;
width:150px;
height:30px;
color:white;
background-color:blue;
cursor:pointer;
left:150px;
}
.submit1
{
position:absolute;
top:250px;
width:150px;
height:30px;
color:white;
background-color:blue;
cursor:pointer;

}
</style>
<?php
include 'search1.php';
?>
  <script type="text/javascript" src="review/jquery.min.js"></script>
  <script type="text/javascript" src="review/jquery.raty.min.js"></script>
<script>
 $(document).ready(function() {
 $.fn.raty.defaults.path = '';
var rated=1;
$(".submit1").click(function(){
if($(".review").val().length>1000)
{
$(".name2").html("**The review can have a maximum of 1000 characters.");
$(".name2").show();
setTimeout(
  function() 
  {
    $(".name2").hide();
  }, 4000);
}
else
{
var uid='<?php echo $user_id; ?>';
var x='<?php echo $x; ?>';
var comment=$(".review").val();
$.ajax({
url:'review_do2.php',
type:"POST",
data:{
comment:comment,uid:uid,x:x
},
success:function(result){
window.location='gox.php?x=<?php echo $x; ?>';
}
});
}
});





 $(".a1").raty({
score: function() {
    return $(this).attr('init');
  },
click: function(score, evt) {
rated=1;
var uid='<?php echo $user_id; ?>';
var x='<?php echo $x; ?>';
$.ajax({
url:'review_do3.php',
type:"POST",
data:{
score:score,uid:uid,x:x
}
});
  },
half: true,
halfShow:true
});
});






  </script>
<?php
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT name FROM product WHERE product_id=:x');
$stmt1=$db->prepare('SELECT rating,comment FROM review WHERE product_id=:x AND id=:user_id');
$stmt->bindParam(':x',$x, PDO::PARAM_STR);
$stmt1->bindParam(':x',$x, PDO::PARAM_STR);
$stmt1->bindParam(':user_id',$user_id, PDO::PARAM_STR);
try
{
$stmt->execute();
$stmt1->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$y1=$row['name'];
}

while($row=$stmt1->fetch(PDO::FETCH_ASSOC))
{
$score1=$row['rating'];
$comment=$row['comment'];
}
?>

<div class="name">
**Leave blank and submit to remove review.
</div>
<div class="name2"></div>
<div class="a1" init="<?php echo $score1; ?>"></div>
<textarea class="review">
<?php echo $comment; ?>
</textarea>
<button class="submit1">Submit review!</button>
<button class="submit2">Review later!</button>
</html>