<?php
include_once("../scripts/connect.php");
session_start();
$_SESSION['aaa']=1;
 $ext_id = $_SESSION['profile']['id'];
    $user_graph = $_SESSION['user_graph']; 
$full_name=$_SESSION['profile']['name'];
	$statement2 = $db->prepare("SELECT id FROM members WHERE ext_id=:user1 LIMIT 1");
	$statement2->bindValue(':user1', $ext_id,PDO::PARAM_INT);
	$statement2->execute();
		$count22 = $statement2->rowCount();
	
	
	if($count22 > 0)
	{
try{
	$db->beginTransaction();
	
	while($row = $statement2 ->fetch(PDO::FETCH_ASSOC)){
	$user1 = $row['id'];
		}

$stmt9 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt9->bindValue(':user2',$user1,PDO::PARAM_INT);
		$stmt9->bindValue(':user1',$user1,PDO::PARAM_INT);
		$stmt9->execute();
		
	
foreach ($user_graph['data'] as $key => $value) {

	$statement1 = $db->prepare("SELECT id FROM members WHERE ext_id=:user2 AND activated='1' LIMIT 1");
	$statement1->bindValue(':user2', $value['id'],PDO::PARAM_INT);
		
		$statement1->execute();
		$count11 = $statement1->rowCount();
	if($count11 > 0)
	{

	while($row2 = $statement1 ->fetch(PDO::FETCH_ASSOC)){
	$user2 = $row2['id'];
		}
	
		$stmt7 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt7->bindValue(':user1',$user1,PDO::PARAM_INT);
		$stmt7->bindValue(':user2',$user2,PDO::PARAM_INT);
		$stmt7->execute();
		
$stmt8 = $db->prepare("INSERT INTO follow (user1, user2) VALUES (:user1, :user2)");
		$stmt8->bindValue(':user1',$user2,PDO::PARAM_INT);
		$stmt8->bindValue(':user2',$user1,PDO::PARAM_INT);
		$stmt8->execute();
		
		
}
}
$db->commit();
if(!file_exists("../members/$user1")){
					mkdir("../members/$user1", 0755);
				}

	if($ext_id)
{
$img = file_get_contents('http://graph.facebook.com/'.$ext_id.'/picture?width=200&height=200');
				$file = '../members/'.$user1.'/'.$user1.'.jpg';
                 file_put_contents($file, $img);
$img2=file_get_contents('http://graph.facebook.com/'.$ext_id.'/picture?width=60&height=60');
				$file = '../members/'.$user1.'/'.$user1.'2.jpg';
                 file_put_contents($file, $img2); 				 
				}



require 'php-sdk/facebook.php';

	$facebook = new Facebook(array(
		'appId'  => '590971444321901',
		'secret' => '6ad57faee739ee4c17add9c7a94a060d',
		'cookie' => true,
		'allowSignedRequest' => false
	));
	
    if($ext_id) {

      
      try {
	  $app_access_token = $facebook->getApplicationAccessToken();
	  $facebook->setAccessToken($app_access_token);
 $currentPost = array(
        'message'   => $full_name.' started using Puddlz',
		'link' => "http://www.puddlz.com/",
'picture' => "http://www.puddlz.com/login/puddlz.png"
    );
           $post_id = $facebook->api("/$ext_id/feed", "post", $currentPost);
 
     }
 catch(FacebookApiException $e) {
      }   

    }




header('Location: already_reg.php');

}
catch(PDOException $e){
				$db->rollBack();
exit();			}
}
	
?>