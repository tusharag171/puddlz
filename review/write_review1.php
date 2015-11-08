<?php

include_once("review/scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}
$user_id=$_SESSION['uid'];
?>
<!doctype html>
<html>
<style>
.a1
{
width:98%;
position:relative;
float:left;
}
.name
{
width: 98%;
position:relative;
float:left;
}

.review3
{ width:90%;
height:70px;
float:left;
position:relative;
margin-left: 3px;
clear:both;
}
.submit2
{
width:150px;
height:30px;
color:white;
background-color:#00aeef;
cursor:pointer;
float:left;
position:relative;

}
.submit1
{
width:150px;
height:30px;
color:white;
background-color:#00aeef;
cursor:pointer;
float:left;
position:relative;

}
</style>
  <script type="text/javascript" src="review/review/jquery.min.js"></script>
  <script type="text/javascript" src="review/review/jquery.raty.min.js"></script>
<script>
 $(document).ready(function() {
 $.fn.raty.defaults.path = '';
var rated=1;
$(".submit1").click(function(){

var uid='<?php echo $user_id; ?>';
var x='<?php echo $x; ?>';
if($(".review3").val()=="")
{
$(".name").html("Please enter text.");
$(".name").show();
setTimeout(
 function() 
  {
 $(".name").hide();
  }, 3000);

}
else if($(".review3").val().length>1000)
{
$(".name").html("**The review can have a maximum of 1000 characters.");
$(".name").show();
setTimeout(
  function() 
  {
    $(".name").hide();
  }, 4000);
}
else
{
var comment=$(".review3").val();
$.ajax({
url:'review/review_do2.php',
type:"POST",
data:{
comment:comment,uid:uid,x:x
},
success:function(result){
window.location='product_page1.php?x=<?php echo $x; ?>';
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
url:'review/review_do3.php',
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

$stmt=$db->prepare('SELECT name FROM product WHERE product_id=:x');
$stmt1=$db->prepare('SELECT rating FROM review WHERE product_id=:x AND id=:user_id');
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
}
?>
<div class="name"></div>
<div class="a1" init="<?php echo $score1; ?>"></div>
<textarea class="review3"></textarea>
<button class="submit1">Submit review!</button>
<button class="submit2">Review later!</button>
</html>