<html>
<head>
<script type="text/javascript">
function relocate(url){
	window.location = url;
}
</script>

<style>
.big1
{
position:absolute;
left:30%;
top:30%;
width:40%;
border:1px solid black;
border-radius:4px;
margin:1px;
padding:1px;
background: -webkit-linear-gradient(white, #D7E9F5); /* For Safari 5.1 to 6.0 */
background: -o-linear-gradient(white, #D7E9F5); /* For Opera 11.1 to 12.0 */
background: -moz-linear-gradient(white, #D7E9F5); /* For Firefox 3.6 to 15 */
background: linear-gradient(white, #D7E9F5); /* Standard syntax */

}

.bigm
{
position:relative;
text-align:center;
}

.bigs
{
position:relative;
top:1px;

background: rgb(35,81,119); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(35,81,119,1) 0%, rgba(41,111,155,1) 35%, rgba(48,124,168,1) 59%, rgba(92,168,208,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(35,81,119,1)), color-stop(35%,rgba(41,111,155,1)), color-stop(59%,rgba(48,124,168,1)), color-stop(100%,rgba(92,168,208,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(35,81,119,1) 0%,rgba(41,111,155,1) 35%,rgba(48,124,168,1) 59%,rgba(92,168,208,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#235177', endColorstr='#5ca8d0',GradientType=0 ); /* IE6-9 */
color:#ffffff;
margin:1px;
cursor:pointer;
border:1px solid black;
border-radius:2px;


}
</style>
</head>
<body>

<div class="big1">
<center><b><p> Hi <?php session_start(); echo $_SESSION['profile']['name']; ?> </b></p></center>
<div class="bigm"><p><b>You are already registered with Facebook!!</b><br/>Click below to login</p>
</div>

<center><button class="bigs"  style=" width:15%" onclick="relocate('facebook_login.php')">LogIn</button></center>
<center><p> OOPs!! Not the above user??  Click <a href ="otherAcc.php">here</a> to login through different facebook account!!</p></center>

</div>


</body>
</html>
