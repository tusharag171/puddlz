<?php
include_once("scripts/check_user.php");
if($user_is_logged == true){
	header("location: profile.php");
	exit();
}
?>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
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
left:60%;
width:40%;
top:35%;
}
#here
{
position:relative;
left:15%;
-moz-box-shadow:inset -1px 1px 0px 0px #f29c93;
-webkit-box-shadow:inset -1px 1px 0px 0px #f29c93;
box-shadow:inset -1px 1px 0px 0px #f29c93;
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
width:250px;
text-align:center;
cursor:pointer;
border-radius:10px;	
}
#fb
{
position:relative;
left:15%;
-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
box-shadow:inset 0px 1px 0px 0px #97c4fe;

background: -webkit-linear-gradient(#3d94f6,  #1e62d0); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(#3d94f6,  #1e62d0); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(#3d94f6,  #1e62d0); /* For Firefox 3.6 to 15 */
background: linear-gradient(#3d94f6,  #1e62d0); /* Standard syntax */
background-color:#3d94f6;
color:#ffffff;
font-family:Arial;
font-size:14px;
font-weight:bold;
font-style:normal;
height:40px;
line-height:40px;
width:250px;
text-align:center;
cursor:pointer;
border-radius:10px;
}
#logIn
{
position:relative;
float:right;
background: rgb(35,81,119); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(35,81,119,1) 0%, rgba(41,111,155,1) 35%, rgba(48,124,168,1) 59%, rgba(92,168,208,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(35,81,119,1)), color-stop(35%,rgba(41,111,155,1)), color-stop(59%,rgba(48,124,168,1)), color-stop(100%,rgba(92,168,208,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#235177', endColorstr='#5ca8d0',GradientType=0 ); /* IE6-9 */
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
</style>
<html>
<head>
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>
</head>
<body>

<div class="t1">
<div class="puddlz">Puddlz</div>
<div class='subtitle'>Social Discovery, Redefined</div></div>

  <!---------------------->


<p class="submit"><button id="logIn" onclick="relocate('login1.php')">Log In</button></p>
<div class="buttons"> 
 
    <p class="submit"><button id="fb" onclick="relocate('fb_register.php')">Register using Facebook</button></p>
	<p class="submit"><button id="here" onclick="relocate('register2.php')">Register using Email</button></p>
        </div>
</body>
</html>
