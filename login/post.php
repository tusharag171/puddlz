<?php

include_once("../scripts/check_user.php");

$extSQL = $db->prepare("SELECT ext_id FROM members WHERE id=:user LIMIT 1");

$extSQL->bindValue(':user',$_SESSION['uid'],PDO::PARAM_INT);	
	$extSQL->execute();
$extcount = $extSQL->rowCount();
if($extcount>0)
{
$row = $extSQL->fetch(PDO::FETCH_ASSOC);
		$user_id = $row['ext_id'];
}

  require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '590971444321901',
		'secret' => '6ad57faee739ee4c17add9c7a94a060d',
		'cookie' => true,
		'allowSignedRequest' => false
	));
	
?>
<html>
  <head></head>
  <body>

  <?php
    if($user_id) {

      
      try {
	  $app_access_token = $facebook->getApplicationAccessToken();
	  $facebook->setAccessToken($app_access_token);
 $currentPost = array(
        'message'   => 'My App can post offline!',
		'link' => "http://www.puddlz.com/",
'picture' => "http://www.puddlz.com/insert/1/4.jpg"

    );

	  
          $post_id = $facebook->api("/$user_id/feed", "post", $currentPost);
echo "posted";        
      } catch(FacebookApiException $e) {

      }   

    }



  ?>      

  </body> 
</html>  