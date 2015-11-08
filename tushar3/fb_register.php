<?php
include_once("scripts/check_user.php");
if($user_is_logged == true){
	header("location: profile.php");
	exit();
}


	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '590971444321901',
		'secret' => '6ad57faee739ee4c17add9c7a94a060d',
		'cookie' => true,
		'allowSignedRequest' => false
	));
	
	
	//get user from facebook object
	$user = $facebook->getUser();
	
	if($user) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
	  session_start();
$_SESSION['profile'] = $facebook->api('/me');
$_SESSION['user_graph'] = $facebook->api('/me/friends/');		

	$ext_id = $_SESSION['profile']['id'];
	$email = $_SESSION['profile']['email'];
   	

		//Check if email exists
	$stmt = $db->prepare("SELECT email FROM members WHERE email=:email ");
	$stmt->bindValue(':email',$email,PDO::PARAM_STR);
	try{
	$stmt->execute();
	$count1 = $stmt->rowCount();
	}
	catch(PDOException $e){
		echo $e->getMessage();
			$db = null;
			exit();
	}
		
		// check if registered with facebook
		$stmt = $db->prepare("SELECT ext_id FROM members WHERE ext_id=:ext_id ");
	$stmt->bindValue(':ext_id',$ext_id,PDO::PARAM_STR);
	try{
	$stmt->execute();
	$count2 = $stmt->rowCount();
	}
	catch(PDOException $e){
		echo $e->getMessage();
			$db = null;
			exit();
	}
	if($count1 > 0 &&  $count2 > 0){
header('Location: already_reg.php');	
	$db = null;
		exit();
	}
elseif($count1 > 0 &&  $count2 == 0){
header('Location:  already_reg2.php');	
	$db = null;
		exit();
	}
	
header('Location: step2.php');

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(array(
			'scope'=>'email,publish_stream')); 
        header("location: $login_url");}  
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl(array(
			'scope'=>'email,publish_stream'));
      header("location:  $login_url");
    }

  ?>

