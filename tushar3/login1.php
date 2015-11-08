<?php
include_once("scripts/check_user.php"); 
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
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var email=$(".in1").val();
var password=$(".in5").val();
$.ajax({
url:'go2.php',
data:{email:email,password:password},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='profile.php';
}
});
});

});
</script>
</head>
<style type="text/css">
.puddlz
{
position:relative;
float:right;
color:#235177;
font-size:700%;

font-family: 'Sail', cursive;
}
.t1
{
position:absolute;
left:12%;
width:350px;
top:30%;

}
.subtitle
{
position:relative;

font-family:'Averia Sans Libre', cursive;
font-size:90%;
float:right;

}
.buttons
{
position:absolute;
left:57%;
width:40%;
top:27%;
}
#logIn
{
position:relative;
float:right;
background: -webkit-linear-gradient(#fe1a00,  #ce0100); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(#fe1a00,  #ce0100); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(#fe1a00,  #ce0100); /* For Firefox 3.6 to 15 */
background: linear-gradient(#fe1a00,  #ce0100); /* Standard syntax */


color:#ffffff;
font-family:Arial;
font-size:14px;
font-weight:bold;
font-style:normal;
height:40px;
line-height:40px;
width:130px;
text-align:center;
cursor:pointer;	
border-radius:10px;
}
.in1
{
position:relative;
width:270px;
height:40px;
padding:0px;
margin:0px;
border-top:1px solid black;
border-left:1px solid black;
border-right:1px solid black;
border-bottom:0px solid black;
border-top-left-radius:5px;
border-top-right-radius:5px;
}

.in5
{
position:relative;
width:270px;
height:40px;
padding:0px;
margin:0px;

border-top:1px solid gray;
border-left:1px solid black;
border-right:1px solid black;
border-bottom:1px solid black;
border-bottom-left-radius:5px;
border-bottom-right-radius:5px;

}
th,td
{
padding:0;
}
.submit1
{
position:relative;
background: rgb(35,81,119); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(35,81,119,1) 0%, rgba(41,111,155,1) 35%, rgba(48,124,168,1) 59%, rgba(92,168,208,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(35,81,119,1)), color-stop(35%,rgba(41,111,155,1)), color-stop(59%,rgba(48,124,168,1)), color-stop(100%,rgba(92,168,208,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#235177', endColorstr='#5ca8d0',GradientType=0 ); /* IE6-9 */
color:#ffffff;
width:270px;
height:40px;
bottom:15px;
border-radius:5px;
cursor:pointer;
font-family: 'Convergence', sans-serif;
font-size:110%;
}
#top1
{
position:relative;
top:10px;
font-family: 'Convergence', sans-serif;
font-size:130%;
}
.here1
{
position:relative;
top:10px;
font-size:80%;
color:red;

}

</style>
<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div></div>

  <!---------------------->
<button id="logIn" onclick="relocate('index.php')">SIGN UP</button></p>

<div class="buttons"> 
       <input type='hidden' name='__token_timestamp__' value='1395064015'><input type='hidden' name='__token_val__' value='aee8928c9aa73484dca0d50006aa3fee'>
    <div id="top1"><strong>Login here</strong></div>

<div class="here1"></div>
<br />
<table class="list1"  cellspacing=0 cellpadding=0>
<tr>
<td>
<input type="text" name="username" placeholder="Email" class="in1">
<td>
<td>
<p>In case you've registered via Facebook, please enter e-mail address of your Facebook account</p>
</td>
</tr>
<tr>
<td>
<input type="password" name="password" placeholder="Password" class="in5">
</td>
</tr>
</table>
<p class="submit">
<button type="submit" class="submit1">SIGN IN</button>
</p>

        </div>
</body>
</html>