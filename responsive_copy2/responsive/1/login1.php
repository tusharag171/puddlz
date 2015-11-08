<?php
/*
include_once("scripts/check_user.php"); 
if($user_is_logged == true){
	header("location: profile.php");
	exit();
}
*/

?>
<html>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>

<head>
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var email=$(".in1").val();
var password=$(".in5").val();
$.ajax({
url:'go2.php',
data:{email:email,password:password},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='profile.php';
}
});
});

});
</script>
<link rel="stylesheet" href="login1.css" type="text/css">


</head>

<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div></div>

  <!---------------------->
<!--<div class="topbutton"> <button class="submit1" onclick="relocate('index.php')">SIGN UP</button> </div>  -->


	<div class="buttons"> 
	<div class="top1">Login here  </div>
	<input type="text" name="username" placeholder="Email" class="in1">
	<input type="password" name="password" placeholder="Password" class="in5">
	<div class="sb"><button type="submit" class="submit2">SIGN IN</button> </div>
	<div class="sb"><button type="submit" class="submit2">Cancel</button> </div>

	<div style="clear:both;"></div>

    </div>
		
		
</body>
</html>