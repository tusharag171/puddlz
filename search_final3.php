<?php
$uid1=$_SESSION['uid'];
$stmt = $db->prepare("SELECT username,full_name FROM members WHERE id=:uid1 AND activated='1' LIMIT 1");
$stmt->bindValue(':uid1',$uid1,PDO::PARAM_INT);
try{
		$stmt->execute();
	}
	catch(PDOException $e){
		//echo $e->getMessage();
		print_r($e->getTrace());
		$db = null;
		exit();
	}
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$fullName1 = $row['full_name'];
	$username1 = $row['username'];
	}
if($fullName1)
{$var_namex= $fullName1;
}
else 
{$var_namex= $username1;}
$var_name2 = strstr($var_namex, ' ', true);//extracts first name 
if($var_name2=='')
$var_name2=$var_namex;

?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="jquery.js"></script>

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
url:"search/gox2.php",
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
		<link rel="stylesheet" type="text/css" href="search/feed_largescreen.css"/>
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:700px)" href="search/feed_smallscreen.css" />		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:701px) and (max-width:1125px)" href="search/feed_mediumscreen.css" />

		<div class="upper">
<div class="title" onclick="location.href='newsfeed.php'"><strong>Puddlz</strong></div>



<div class="searchfull">
<div class="extraspace"> </div>

<div class="search1">
<input type="text" class="search_form" placeholder="Search for Products and People"/>
<div class="down"></div>
<button class="searchbutton" onclick="#">Search</button> 
</div>

</div>



<div class="twobuttons">


<button class="topper4" onclick="location.href='newsfeed.php'">Feed</button>
<button class="topper1" onclick="location.href='discover.php'"> Discovery </button>
</div>



<div class="downx"><strong><?php echo $var_name2; ?></strong><div class="down1"></div></div>

<div class="dropx">
<div class="el" onclick="location.href='profile_page.php?uid=<?php echo $uid1; ?>'">My Profile</div>

<div class="el" onclick="location.href='login/logout.php'">Logout</div>
</div>


</div>

</html>