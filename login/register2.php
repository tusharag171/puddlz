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
var username=$(".in0").val();
var actualname=$(".in1").val();
var email1=$(".in2").val();
var pass1=$(".in4").val();
var pass2=$(".in5").val();
$.ajax({
url:'go.php',
data:{username:username,actualname:actualname,email1:email1,pass1:pass1,pass2:pass2},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='chkMail.php';
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

<link rel="stylesheet" href="css/register2.css" type="text/css">

<title> Register your Puddlz account </title>

</head>
<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div></div>

 

	<div class="buttons"> 
    <div id="top1">Sign Up here</div>
	<div class="here1"></div>

<input type="text" name="username" placeholder="Username" class="in0">
	<input type="text" name="actualname" placeholder="Full Name" class="in1">
	
<input type="text" name="email1" placeholder="Email" class="in2">

<!--  <input type="text" name="email2" placeholder="Confirm Email" class="in3">  -->

<div class="in44">
<input type="password" name="pass1" placeholder="Create Password" class="in4">

<span class="el">?</span>  <span class="seebelow"> * See below </span>
</div>


<input type="password" name="pass2" placeholder="Confirm Password" class="in5">


	<div class="sb"><button type="submit" class="submit1">SIGN UP</button> </div>
		<div class="sb"><button type="submit" class="submit2"  onclick="relocate('../index.php')">Cancel</button> </div>


<span class="ques"> <span class="asterisk2">*</span> Password needs to have 6-20 characters and must include atleast 1 letter and 1 number. 
</span>


    </div>

</body>
</html>