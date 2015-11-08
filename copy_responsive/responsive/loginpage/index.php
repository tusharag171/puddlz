<?php
/*
include_once("scripts/check_user.php");
if($user_is_logged == true){
	header("location: profile.php");
	exit();
}
*/
?>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="screen_styles.css"/>

<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

		<link rel="stylesheet" type="text/css" href="css/screen_styles.css"/>
		<link rel="stylesheet" type="text/css" href="css/screen_layout_large.css"/>
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:600px)" href="screen_layout_small.css" />		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:601px) and (max-width:1125px)" href="screen_layout_medium.css" />
		
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
</head>

<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div>
</div>

  <!---------------------->


<div class="topbutton"> 
       <input type='hidden' name='__token_timestamp__' value='1395064015'><input type='hidden' name='__token_val__' value='aee8928c9aa73484dca0d50006aa3fee'>
   
    <div class="email_and_pwd">
	 <div class="top1">Login here  </div>
	<input type="text" name="username" placeholder="Email" class="in1">
	<input type="password" name="password" placeholder="Password" class="in5">
<button type="submit" class="submit1">SIGN IN</button>
</div>


       </div>



<div class="buttons"> 
 
    <p class="submit"><button id="fb" onclick="relocate('fb_register.php')"><div class="fbimage"></div>Register using Facebook</button></p>
	<p class="submit"><button id="here" onclick="relocate('register2.php')">Register using Email</button></p>
        </div>
</body>
</html>