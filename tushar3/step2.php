<html>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>

<head>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){

$(".submit1").click(function(){
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
x=1;
}
else
{
$(".el").css("color","red");
$(".ques").hide();
x=0;
}
});

});
</script>
</head>
<style type="text/css">
.buttons
{
position:absolute;
left:40%;
right:40%

width:20%;
top:25%;
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
.ques
{
position:absolute;
width:200px;
font-size:70%;
left:290px;
display:none;
}
.el
{
color:red;
cursor:pointer;

}
</style>
<body>



<div class="buttons"> 
<b><p> Hi <?php session_start(); echo $_SESSION['profile']['name']; ?> </b> Please Enter your details to receive an Email to activate your facebook account!</p>
<br/>
       <input type='hidden' name='__token_timestamp__' value='1395064015'><input type='hidden' name='__token_val__' value='aee8928c9aa73484dca0d50006aa3fee'>
    <div id="top1"><strong>Facebook_activation</strong></div>

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
<input type="password" name="pass1" placeholder="Create Password" class="in4">
<span class="el">?</span><span class="ques">Password needs to have 6-20 characters and must include atleast 1 letter and 1 number.</span>
</td>
</tr>
<tr>
<td>
<input type="password" name="pass2" placeholder="Confirm Password" class="in5">
</td>
</tr>
</table>
<p class="submit">
<button type="submit" class="submit1">SUBMIT</button>
</p>
<p> OOPs!! Not the above user??  Click <a href ="otherAcc.php">here</a> to login through different facebook account!!</p>
        </div>

</body>
</html>
