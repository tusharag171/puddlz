<?php 
session_start();
session_destroy();
?>
<html>
<head>
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>

<link rel="stylesheet" href="already_reg2.css" type="text/css">
</head>
<body>

<div class="big1">
<div class="bigm">You are already registered with this Email. Can't Connect to facebook!<br/>Click below to login
</div>

<div class="lb"><button class="bigs"  onclick="relocate('login1.php')">LogIn</button>  </div>

<div style="clear:both;"></div>
</div>


</body>
</html>
