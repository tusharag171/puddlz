<!DOCTYPE html>
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>


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


</style>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

</head>
		<link rel="stylesheet" type="text/css" href="feed_largescreen.css"/>
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:540px)" href="feed_smallscreen.css" />		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:541px) and (max-width:1040px)" href="feed_mediumscreen.css" />

		<div class="upper">
<div class="title"><strong>Puddlz</strong></div>



<div class="searchfull">
<div class="extraspace"> </div>

<div class="search1">
<input type="text" class="search_form" placeholder="Search for Products and People"/>
<button class="searchbutton" onclick="#">Search</button> 
</div>

</div>



<div class="twobuttons">
<button class="topper1"><strong>Profile</strong></button>
<button class="topper4"><strong>Feed</strong></button>
</div>



<div class="downx"><strong>Anhad </strong><div class="down1"></div></div>

<div class="dropx">
<div class="el">Settings</div>
<div class="el" onclick="location.href='logout.php'">Logout</div>
</div>
<div class="down"></div>

</div>

</html>