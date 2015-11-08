<?php 

session_start(); 

if($_SESSION['ccc']!=1)
{header("location: ../index.php");
exit();}
$_SESSION['ccc']!=0;

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
	
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit2").click(function(){
var username=$(".in1").val();
var pass1=$(".in4").val();
var pass2=$(".in5").val();
$.ajax({
url:'go3.php',
data:{username:username,pass1:pass1,pass2:pass2},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='fetch_users.php';
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

<link rel="stylesheet" href="css/step2.css" type="text/css">

</head>
<body>



<div class="buttons1"> 
<div class="photo1"><center> <img src="https://graph.facebook.com/<?php echo $_SESSION['profile']['id']; ?>/picture?width=60&height=60" /></center></div>
<div class="part1">
 Hi <?php session_start(); echo $_SESSION['profile']['name']; ?>  <br>Please Enter your details to activate your facebook account!
</div>
       <input type='hidden' name='__token_timestamp__' value='1395064015'><input type='hidden' name='__token_val__' value='aee8928c9aa73484dca0d50006aa3fee'>


	<div class="buttons_wrapper">
	<div class="buttons"> 
		<div class="here1"></div>
<input type="text" name="username" placeholder="Username" class="in1">

<div class="in44">
<input type="password" name="pass1" placeholder="Create Password" class="in4">

<span class="el">?</span>  <span class="seebelow"> * See below </span>
</div>

<input type="password" name="pass2" placeholder="Confirm Password" class="in5">

<div class="sb"><button type="submit" class="submit2">Submit</button> </div>



    </div>

	 <div style="clear:both; height:10px;"> </div>
</div>	

<div class="anotheruser"> OOPs!! Not the above user??  Click <a href ="otherAcc.php">here</a> to login through different facebook account!! </div>

 
 <div class="div2"> <span class="ques"> <span class="asterisk2">*</span> Password needs to have 6-20 characters and must include atleast 1 letter and 1 number. 
</span>
</div>



</div>


</body>
</html>