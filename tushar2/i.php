
<?php  

require_once('facebook.php');
$config = array(
    'appId' => '590971444321901',
    'secret' => '6ad57faee739ee4c17add9c7a94a060d',
   // 'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );
$facebook=new Facebook($config);
$user=$facebook->require_login();

?>
<h1>Yummie Tester</h1>
Hello <fb:name uid='<?php echo $user; ?>' useyou='false' possessive='true' />! <br>
Your id : <?php echo $user; ?>.

You have several friends:<br>
<?
$friends = $facebook->api_client->friends_get();
?>

<ul>
<?
foreach($friends as $friend){
	echo "<li><fb:name uid=\"$friend\" useyou=\"false\"></li>";	
}
?>
</ul>