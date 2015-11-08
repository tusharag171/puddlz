<?php

$action = $_REQUEST["action"];
switch($action){
	case "fblogin":
	include 'facebook.php';
	$appid 		= "590971444321901";
	$appsecret  = "6ad57faee739ee4c17add9c7a94a060d";
	$facebook   = new Facebook(array(
  		'appId' => $appid,
  		'secret' => $appsecret,
  		'cookie' => TRUE,
	));
	$fbuser = $facebook->getUser();
	if ($fbuser) {
		try {
		    $user_profile = $facebook->api('/me');
		}
		catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
		$user_fbid	= $fbuser;
		$user_email = $user_profile["email"];
		$user_fnmae = $user_profile["first_name"];
		$user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
	
$con=mysqli_connect("puddlzcom1.ipagemysql.com","tushar","tushar@17","puddlz_tushar");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{$check_select = mysqli_num_rows(mysqli_query("SELECT * FROM `fblogin` WHERE email = '$user_email'"));
		if($check_select == 0){
	
$sql="INSERT INTO `fblogin` (fb_id, name, email, image, postdate) VALUES ('$user_fbid', '$user_fnmae', '$user_email', '$user_image', '$now')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }}


}	}
	break;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asif18 tutorial about facebook login for mywebsite using php sdk</title>
<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '590971444321901', // replace your app id here
	channelUrl : 'www.puddlz.com', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogout(){
	FB.logout(function(response) {
		window.location.href = "index.php";
	});
}
</script>
<style>
body{
	font-family:Arial;
	color:#333;
	font-size:14px;
}
.mytable{
	margin:0 auto;
	width:600px;
	border:2px dashed #17A3F7;
}
a{
	color:#0C92BE;
	cursor:pointer;
}
</style>
</head>

<body>
<h1>Asif18 tutorial for facebook ling using php, javascript sdk dymaically</h1>
<h3>here is the user details, for more details </h3>
<table class="mytable">
<tr>
	<td colspan="2" align="left"><h2>Hi <?php echo $user_fnmae; ?>,</h2><a onClick="FBLogout();">Logout</a></td>
</tr>
<tr>
	<td><b>Fb id:<?php echo $user_fbid; ?></b></td>
    <td valign="top" rowspan="2"><img src="<?php echo $user_image; ?>" height="100"/></td>
</tr>
<tr>
	<td><b>Email:<?php echo $user_email; ?></b></td>
</tr>
</table>
</body>
</html>