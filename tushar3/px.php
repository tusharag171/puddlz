<?php
include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}

if(!isset($_GET['uid']) || $_GET['uid'] == ""){
	header("location: index.php");
	$db = null;
	exit();
}

$user_id = $_GET['uid'];
$stmt = $db->prepare("SELECT username,full_name FROM members WHERE id=:user_id AND activated='1' LIMIT 1");
$stmt->bindValue(':user_id',$user_id,PDO::PARAM_INT);
	try{
		$stmt->execute();
	}
	catch(PDOException $e){
		//echo $e->getMessage();
		print_r($e->getTrace());
		$db = null;
		exit();
	}
$user_exists = $stmt->rowCount();
if($user_exists == 0){
	header("location: ../error/404.php");
}


while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$fullName = $row['full_name'];
	$username = $row['username'];
	}
	
	if($fullName)
{$var_name= $fullName;}
else 
{$var_name= $username;}


?>


<html>
<!doctype html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<link rel="stylesheet" href="feed.css" type="text/css">
<link rel="stylesheet" type="text/css" href="profile.css">
<script src="jquery.js"></script>
<?php
include 'search1.php';
?>
<script src="slide/jquery.bxslider.min.js"></script>
<script src="slide/jquery.bxslider.js"></script>

<link href="slide/jquery.bxslider.css" rel="stylesheet" />

<script>

$(document).ready(function(){
  $('.bxslider').bxSlider({
  minSlides: 1,
  maxSlides: 4,
  slideWidth: 60,
  slideMargin: 5
});

});


</script>

<style>
.bx-wrapper, .bx-viewport {
    height:75px !important; 
}
</style>

<body>
<div>
<ul class="bxslider">
<li><img src='../saurabh/upload_image/upload_to_folder/images_thumbnail/1.jpg' ></li>

<li><img src='../saurabh/upload_image/upload_to_folder/images_thumbnail/2.jpg' /></li>

<li><img src='../saurabh/upload_image/upload_to_folder/images_thumbnail/3.jpg'/></li>
<li><img src='../saurabh/upload_image/upload_to_folder/images_thumbnail/4.jpg' /></li>
<li><img src='../saurabh/upload_image/upload_to_folder/images_thumbnail/4.jpg' /></li>
</ul>
</div>
</body>
</html>
