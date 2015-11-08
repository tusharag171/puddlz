<?php
session_start();
$_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection

$app_id = "590971444321901";//change this
$redirect_url = "http://www.puddlz.com/tushar/callback.php"; //change this

$dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($redirect_url) . "&state="
       . $_SESSION['state'] . "&scope=user_birthday,email";

?>
<html>
<body>
<h1>Facebook OAuth Dailog Demo</h1>

Click the image to see how OAuth works in Facebook.
<a href="<?php echo $dialog_url;?>"><img src="login-fb2.jpg"></a>
</html>