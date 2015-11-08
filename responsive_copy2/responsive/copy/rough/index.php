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
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:500px)" href="screen_layout_small.css" />		
		<link rel="stylesheet" type="text/css" media="only screen and (min-width:501px) and (max-width:900px)" href="screen_layout_medium.css" />
		
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
<p class="submit"><button id="logIn" onclick="relocate('login1.php')">Log In</button></p>
</div>


<div class="buttons"> 
 
    <p class="submit"><button id="fb" onclick="relocate('fb_register.php')">Register using Facebook</button></p>
	<p class="submit"><button id="here" onclick="relocate('register2.php')">Register using Email</button></p>
        </div>
</body>
</html>
