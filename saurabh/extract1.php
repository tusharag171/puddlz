<?php  

require_once('facebook.php');
$config = array(
    'appId' => '590971444321901',
    'secret' => '6ad57faee739ee4c17add9c7a94a060d',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );
$facebook=new Facebook($config);
$user_id=$facebook->getUser();
?>

<html>
<body>
<?php
if($user_id)
{
echo "User is logged in.<br>";
echo "User ID: $user_id";
$user_profile = $facebook->api('/me','GET');
 echo " <br> Name: " . $user_profile['name'];

$friends = $facebook->api("/me/friends");

 echo '<ul>';
 foreach ($friends['data'] as $value) {
            echo '<li>';
            echo $value['name'].; 
            echo '</li>';
}
 echo '</ul>';
}

?>



</body>
</html>