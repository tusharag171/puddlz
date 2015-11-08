<html>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>

<head>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
var email1=$(".in2").val();
var username=$(".in1").val();
var email2=$(".in3").val();
var pass1=$(".in4").val();
var pass2=$(".in5").val();
$.ajax({
url:'go.php',
data:{email1:email1},
type:"POST",
success:function(result){
if(result!='1')
$(".here1").html(result);
else
window.location='search1.php';
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
top:18%;
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
.in2
{
position:relative;
width:270px;
height:40px;
padding:0px;
margin:0px;
border-top:1px solid gray;
border-left:1px solid black;
border-right:1px solid black;
border-bottom:0px solid black;
}
.in3
{
position:relative;
width:270px;
height:40px;
padding:0px;
margin:0px;

border-top:1px solid gray;
border-left:1px solid black;
border-right:1px solid black;
border-bottom:0px solid black;
}
.in4
{
position:relative;
width:270px;
height:40px;
padding:0px;
margin:0px;

border-top:1px solid gray;
border-left:1px solid black;
border-right:1px solid black;
border-bottom:0px solid black;}
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


<div class="buttons"> 
       <input type='hidden' name='__token_timestamp__' value='1395064015'><input type='hidden' name='__token_val__' value='aee8928c9aa73484dca0d50006aa3fee'>
    <div id="top1"><strong>Sign Up here</strong></div>

<div class="here1"></div>
<br />
<table class="list1"  cellspacing=0 cellpadding=0>
<tr>
<td>
<input type="text" name="username" placeholder="Username" class="in1">
<td>
</tr>
<tr>
<td>
<input type="text" name="email1" placeholder="Email" class="in2">
</td>
</tr>
<tr>
<td>
<input type="text" name="email2" placeholder="Confirm Email" class="in3">
</td>
</tr>
<tr>
<td>
<input type="password" name="pass1" placeholder="Create Password" class="in4">
</td>
</tr>
<tr>
<td>
<input type="password" name="pass2" placeholder="Confirm Password" class="in5">
</td>
</tr>
</table>
<p class="submit">
<button type="submit" class="submit1">SIGN UP</button>
</p>

        </div>
</body>
</html>