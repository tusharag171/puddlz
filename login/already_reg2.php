<?php 
session_start();
if($_SESSION['bbb']!=1)
{header("location: ../index.php");
exit();}
$_SESSION['bbb']=0;

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>

<link rel="stylesheet" href="css/already_reg2.css" type="text/css">
</head>
<body>

<div class="big1">
<div class="bigm">You are already registered with this Email. Can't Connect to facebook!<br/>Click below to login
</div>

<div class="lb"><button class="bigs"  onclick="relocate('login1.php')">Login</button>  </div>
<div> <center>Not the above user?  Click <a href ="otherAcc.php">here</a> to login through different facebook account.</center>
</div>

<div style="clear:both;"></div>
</div>


</body>
</html>
