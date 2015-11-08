<?php
$x=$_REQUEST['x'];
include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}
$user_id=$_SESSION['uid'];
$x='17';
?>


<html>
<script type="text/javascript" src="review/jquery.min.js"></script>
  <script type="text/javascript" src="review/jquery.raty.min.js"></script>
<style>
.tx1
{
position:relative;
width:200px;
height:60px
}
.revx1
{
position:relative;
width:100px;
height:20px;
color:white;
cursor:pointer;
background-color:blue;

}
.subx1
{
position:relative;
width:100px;
height:20px;
color:white;
cursor:pointer;
background-color:blue;
}
.subx2
{
position:relative;
width:100px;
height:20px;
color:white;
cursor:pointer;
background-color:blue;
}
.review2
{
display:none;
}
</style>
<script>
$(document).ready(function(){

var x="<?php echo $x; ?>";
var uid="<?php echo $user_id; ?>";
var sc1=0;
var show=0;
var rated=0;
$.ajax({
url:'rev_check1.php',
type:"POST",
data:{
uid:uid,x:x
},
success:function(result1){
rated=1;
if(result1!='3')
{
rated=1;
}
}
});

$(".revx1").click(function(){
if(show==0)
{
$(".review2").show();
show=1;
}
else
{
$(".review2").hide();
show=0;
}
});
$(".subx2").click(function(){
$(".review2").hide();
show=0;
});
$('.a1').raty({
score: function() {
if(rated==1)
return "2.1";
else
return "4.1";
  },
half: true,
halfShow:true
});

});
</script>

<div>
<button class="revx1">Review Product</button>
</div>
<br>
<div class="review2">
<div class="a1" init="3.26"></div>
<div>
<textarea class="tx1"></textarea>
</div>

<br>
<button class="subx1">Submit Review!</button>
<button class="subx2">Review later!</button>
</div>
</html>