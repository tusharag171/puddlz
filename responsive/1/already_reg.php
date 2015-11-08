
<html>
<head>
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
<link rel="stylesheet" href="already_reg.css" type="text/css">

</head>
<body>


<div class="container">

<div class="name"> <div class="photo"> </div> 
<div class="displayname"> Hi Tushar<?php //session_start(); echo $_SESSION['profile']['name']; ?></div>
<div class="msg">You are already registered with Facebook! Click below to login </div>

<div class="lb"> <button class="login_button"onclick="relocate('facebook_login.php')">LogIn</button> </div>
<div class="login_different"> Not the above user?  Click <a href ="otherAcc.php">here</a> to login through different facebook account.
</div>
<div style="clear:both;"></div>
</div>




</div>


</body>
</html>
