<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){
$(".search_form").keyup(function(){
var y=$(".search_form").val();
if(y!="")
{
$.ajax({
url:"gox2.php",
type:"POST",
data:{y:y},
success:function(result){
$(".down").html(result);
}

});
$(".down").show();

}
else
{
$(".down").hide();
}
});
var x2=0;
var x3=0;

$(".d").mouseenter(function(){
$(this).css({"color":"white","background-color":"gray"});
});

$(".downx").mouseenter(function(){
$(".down1").css("border-top","12px solid black");
$(".dropx").show();  //when go to arrow, drop down should show
});

$(".downx").mouseleave(function(){
$(".down1").css("border-top","12px solid gray");
$(".dropx").hide();
});
$(".dropx").mouseenter(function(){
$(".down1").css("border-top","12px solid black");
$(".dropx").show();
});

$(".dropx").mouseleave(function(){
$(".down1").css("border-top","12px solid gray");
$(".dropx").hide();
});

$(".el").mouseenter(function(){
$(this).css({"color":"white","background-color":"gray"});
});

$(".el").mouseleave(function(){
$(this).css({"color":"gray","background-color":"white"});
});


});


</script>
<style>


</style>

</head>
<link rel="stylesheet" type="text/css" href="feed.css">
<div class="upper">
<div class="title"><strong>Puddlz</strong></div>
<input type="text" class="search_form" placeholder="Search for Products & People"/>
<div class="downx"><div class="down1"></div></div>
<button class="topper1"><strong>Profile</strong></button>
<button class="topper4" onclick="location.href='feed/newsfeed.php'"><strong>Feed</strong></button>

</div>
<div class="dropx">
<div class="el">Settings</div>
<div class="el" onclick="location.href='logout.php'">Logout</div>
</div>
<div class="down"></div>
</html>
