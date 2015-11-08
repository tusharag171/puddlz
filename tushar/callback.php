<?php 
   $app_id = "'590971444321901"; //change this
   $app_secret = "6ad57faee739ee4c17add9c7a94a060d"; //change this
   $redirect_url = "http://www.puddlz.com/tushar/callback.php"; //change this

 
   $code = $_REQUEST["code"];
   session_start();

   if(empty($code)) 
   {
	header( 'Location: http:///www.puddlz.com/tushar/loginwithfb.php' ) ; //change this
	exit(0);
   }
   
   $access_token_details = getAccessTokenDetails($app_id,$app_secret,$redirect_url,$code);
   if($access_token_details == null)
   {
		echo "Unable to get Access Token";
		exit(0);
   }   
   
   if($_SESSION['state'] == null || ($_SESSION['state'] != $_REQUEST['state'])) 
   {
		die("May be CSRF attack");
   }
	 
   	$_SESSION['access_token'] = $access_token_details['access_token']; //save token is session 
   
   $user = getUserDetails($access_token_details['access_token']);
   
   if($user)
   {
		echo "Facebook OAuth is OK<br>";
		echo "<h3>User Details</h3><br>";
		echo "<b>ID: </b>".$user->id."<br>";
		echo "<b>Name: </b>".$user->name."<br>";
		echo "<b>First Name: </b>".$user->first_name."<br>";
		echo "<b>Last Name: </b>".$user->last_name."<br>";
		echo "<b>Username: </b>".$user->username."<br>";
		echo "<b>Profile Link: </b>".$user->link."<br>";
		echo "<b>email: </b>".$user->email."<br>";
		
   }
	
	
function getAccessTokenDetails($app_id,$app_secret,$redirect_url,$code)
{

	$token_url = "https://graph.facebook.com/oauth/access_token?"
	  . "client_id=" . $app_id . "&redirect_uri=" . urlencode($redirect_url)
	  . "&client_secret=" . $app_secret . "&code=" . $code;

	$response = file_get_contents($token_url);
	$params = null;
	parse_str($response, $params);
	
	return $params;

}

function getUserDetails($access_token)
{
	$graph_url = "https://graph.facebook.com/me?access_token=". $access_token;
	$user = json_decode(file_get_contents($graph_url));
	if($user != null && isset($user->name))
	return $user;
	
	return null;
}


 ?>