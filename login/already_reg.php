<?php 
include_once("../scripts/check_user.php");
if($user_is_logged == true){
	header("location: profile.php");
exit();
}
	
session_start(); 
if($_SESSION['aaa']!=1)
{header("location: ../index.php");
exit();}

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
<link rel="stylesheet" href="css/already_reg.css" type="text/css">

</head>
<body>


<div class="container">

<div class="name"> <div class="photo"><center><img src="https://graph.facebook.com/<?php echo $_SESSION['profile']['id']; ?>/picture?width=60&height=60" /></center> </div> 
<div class="displayname"> Hi <?php echo $_SESSION['profile']['name']; ?></div>
<div class="msg">You are registered with Facebook! Click below to login </div>

<div class="lb"> <button class="login_button"onclick="relocate('facebook_login.php')">Login</button> </div>
<div class="login_different"> Not the above user?  Click <a href ="otherAcc.php">here</a> to login through different facebook account.
</div>
<div style="clear:both;"></div>
</div>




</div>


</body>
</html>
