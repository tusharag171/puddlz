<?php
include_once("scripts/check_user.php");
if($user_is_logged == true){
	header("location: login/profile.php");
	exit();
}
?>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/screen_styles.css"/>

<html>

<head>
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<meta name="description" content="Puddlz is a Social Discovery application that helps you find the perfect smartphone for yourself using your friend reviews.">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:700px)" href="css/screen_layout_small.css" />		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:701px) and (max-width:1125px)" href="css/screen_layout_medium.css" />
		
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
<script src="login/jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var email=$(".in1").val();
var password=$(".in5").val();
$.ajax({
url:'login/go2.php',
data:{email:email,password:password},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='login/profile.php';
}
});
});

});
</script>

<title> Welcome to Puddlz! </title>

</head>

<body>
<div class="skip"><a href="search_final2.php" style="text-decoration:none; color:#00aeef;">Skip to Puddlz Search >></a> </div>
<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div>
</div>

  <!---------------------->


<div class="topbutton"> 
       <input type='hidden' name='__token_timestamp__' value='1395064015'><input type='hidden' name='__token_val__' value='aee8928c9aa73484dca0d50006aa3fee'>
   
    <div class="email_and_pwd">
<div class="here1"></div>
	 <div class="top1">Login here  </div>
	<input type="text" name="username" placeholder="Email" class="in1">
	<input type="password" name="password" placeholder="Password" class="in5">
<button type="submit" class="submit1">SIGN IN</button>
<div class="forgot"> <a href="login/forgot_email.php"> Forgot your password? </a> </div>
</div>
       </div>



<div class="buttons"> 
     <p class="submit"><button id="fb" onclick="relocate('login/fb_register.php')"><div class="fbimage"></div>Register using Facebook</button></p>
	<p class="submit"><button id="here" onclick="relocate('login/register2.php')">Register using Email</button></p>
<div class="image_container2"><iframe  width=" 400px" height=" 230px" src="http://www.youtube.com/embed/ddyj6DlfUYk">
</iframe></div>		
		</div>
		
</body>
</html>