<?php
$x=$_POST['x'];
$uid=$_POST['uid'];

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";


$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
$stmt=$db->prepare('INSERT INTO has_had (up_id ,id ,product_id) VALUES (NULL ,:uid, :x)');
$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->bindParam(':x',$x, PDO::PARAM_STR);
try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}


$statement1 = $db->prepare("SELECT ext_id,full_name FROM members WHERE id=:uid AND activated='1' LIMIT 1");
	$statement1->bindValue(':uid', $uid,PDO::PARAM_INT);
	
$statement2 = $db->prepare("SELECT name FROM product WHERE product_id=:x LIMIT 1");
	$statement2->bindValue(':x', $x,PDO::PARAM_INT);

	
try
{
$statement1->execute();
		$count11 = $statement1->rowCount();

$statement2->execute();
		$count12 = $statement2->rowCount();

		
if ( $count11>0 && $count12>0)
{

$row2 = $statement1 ->fetch(PDO::FETCH_ASSOC);
	$full_name = $row2['full_name'];
        $user_id = $row2['ext_id'];		
	
$row3 = $statement2 ->fetch(PDO::FETCH_ASSOC);
	$name = $row3['name'];
        
 require '../php-sdk/facebook.php';

	$facebook = new Facebook(array(
		'appId'  => '590971444321901',
		'secret' => '6ad57faee739ee4c17add9c7a94a060d',
		'cookie' => true,
		'allowSignedRequest' => false
	));
	
    if($user_id) {

      
      try {
	  $app_access_token = $facebook->getApplicationAccessToken();
	  $facebook->setAccessToken($app_access_token);
 $currentPost = array(
        'message'   => $full_name.' added '.$name.' via Puddlz.',
		'link' => "http://www.puddlz.com/product_page1.php?x=".$x,
'picture' => "http://www.puddlz.com/insert/".$x."/4.jpg"
    );
           $post_id = $facebook->api("/$user_id/feed", "post", $currentPost);
 
     }
 catch(FacebookApiException $e) {
      }   

    }

}}
 catch(FacebookApiException $e) {
      }   


echo $score;
?>