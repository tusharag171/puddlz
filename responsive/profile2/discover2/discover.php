<!DOCTYPE html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Discovery</title>
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 


<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>

<head>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var username=$(".in1").val();
var pass1=$(".in4").val();
var pass2=$(".in5").val();
$.ajax({
url:'go3.php',
data:{username:username,pass1:pass1,pass2:pass2},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='fetch_users.php';
}
});
});


var x=0;
$(".el").click(function(){
if(x==0)
{
$(".el").css("color","gray");
$(".ques").show();
$(".seebelow").show();

x=1;
}
else
{
$(".el").css("color","red");
$(".ques").hide();
$(".seebelow").hide();

x=0;
}
});

});
</script>

<link rel="stylesheet" href="discover.css" type="text/css">

</head>
<body>

<div class="list1">

<div class="feedbox"> 
<div class="photo1"> <img class="photo11"src="1.jpg" alt="Your Photo"></div>
<div class="part1">
Samsung Galaxy S4
</div>

<div class="details"> 
<ul class=" ul1 "type="circle">
<li>5 people who you follow have this product.</li> 
<li>Average rating among the people you follow:</li>
<li>Average rating among all people: </li>
</ul>
<div style="clear:both;"> </div>
</div>
<div style="clear:both;"> </div>
</div>


<!---------------------------------------->
<div class="feedbox"> 
<div class="photo1"> <img class="photo11"src="1.jpg" alt="Your Photo"></div>
<div class="part1">
Samsung Galaxy S4
</div>

<div class="details"> 
<ul class=" ul1 "type="circle">
<li>5 people who you follow have this product.</li> 
<li>Average rating among the people you follow:</li>
<li>Average rating among all people: </li>
</ul>
<div style="clear:both;"> </div>
</div>
</div>

<!---------------------------------------->
<div class="feedbox"> 
<div class="photo1"> <img class="photo11"src="1.jpg" alt="Your Photo"></div>
<div class="part1">
Samsung Galaxy S4
</div>

<div class="details"> 
<ul class=" ul1 "type="circle">
<li>5 people who you follow have this product.</li> 
<li>Average rating among the people you follow:</li>
<li>Average rating among all people: </li>
<div style="clear:both;"> </div>
</ul>
</div>
</div>

</div>


</body>
</html>