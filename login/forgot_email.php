<?php
include_once("../scripts/check_user.php"); 
if($user_is_logged == true){
	header("location: profile.php");
	exit();
}

?>
<html>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>

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
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var email1=$(".in1").val();
var email2=$(".in5").val();
$.ajax({
url:'f_go.php',
data:{email1:email1,email2:email2},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='chkMail2.php';
}
});
});

});
</script>
<link rel="stylesheet" href="css/login1.css" type="text/css">


</head>

<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div></div>

  
	<div class="buttons"> 
	<div class="top1">Enter Your Email ID</div>
        <div class="here1"></div>
	<input type="text" name="email1" placeholder="Enter Email" class="in1">
	<input type="text" name="email2" placeholder="Confirm Email" class="in5">
	<div class="sb"><button type="submit" class="submit1">SUBMIT</button> </div>
	<div class="sb"><button type="submit" class="submit2" onclick="relocate('../index.php')">Cancel</button> </div>

	<div style="clear:both;"></div>

    </div>
		
		
</body>
</html>