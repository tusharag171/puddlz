<!DOCTYPE html>
<html>
<head>

<script src="jquery.js">
</script>

<script>
$(document).ready(function(){
$(document.body).click(function(){
$(".down").hide();
});

$(".search_form").keyup(function(){
var y=$(".search_form").val();
if(y!="")
{
$.ajax({
url:"search/gox21.php",
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
$(this).css({"color":"white","background-color":"white"});
});

$(".downx").mouseenter(function(){
$(".down1").css("border-top","7.5px solid black");
$(".dropx").show();  //when go to arrow, drop down should show
});

$(".downx").mouseleave(function(){
$(".down1").css("border-top","7.5px solid white");
$(".dropx").hide();
});
$(".dropx").mouseenter(function(){
$(".down1").css("border-top","7.5px solid black");
$(".dropx").show();
});

$(".dropx").mouseleave(function(){
$(".down1").css("border-top","7.5px solid white");
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
body {
background-color: #fcfbe4;
width:100%;
}


</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 
</head>
		<link rel="stylesheet" type="text/css" href="search/feed_largescreen.css"/>
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:600px)" href="search/feed_smallscreen.css" />		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:601px) and (max-width:1125px)" href="search/feed_mediumscreen.css" />

		<div class="upper">
<div class="title" onclick="location.href='feed.php'"><strong>Puddlz</strong></div>



<div class="searchfull">
<div class="extraspace"> </div>

<div class="search1">
<input type="text" class="search_form" placeholder="Search for Products"/>
<div class="down"></div>
<button class="searchbutton" onclick="#">Search</button> 
</div>

</div>


<div class="downx"><strong><a href="index.php" style="text-decoration:none; color:white;">Login</a></strong></div>



</div>

</html>