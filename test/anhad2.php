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
echo "<br>";
 echo "Name: " . $user_profile['name'];
 echo "Name: " . $user_profile['email'];
 echo "<br>";
 $user_friends = $facebook->api('/me/friends');
 $e= $user_profile['email'];
  $n=$user_profile['name'];
  $profile_pic =  "http://graph.facebook.com/".$user_id."/picture";
$total_friends = count($user_friends['data']);
 echo "<img src=\"" . $profile_pic . "\" />"; 
echo 'Total friends: '.$total_friends.'.<br />';
  $start = 0;
echo $user_friends;
while ($start < $total_friends) {  
    // echo $user_friends['data'][$start]['name'];
      //  echo '<br />';
        $start++;
    }
$con=mysqli_connect("puddlzcom1.ipagemysql.com","puddlz","Anhad@123","puddlz");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
else
{
$sql="INSERT INTO User (name, email) VALUES ('$n','$e')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }}
}

else
{
echo "User is not logged in.";
}


?>
 


</body>
</html>