<html>

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
		
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

<link rel="stylesheet" type="text/css" href="css/screen_layout_large.css">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:601px) and (max-width:1125px)" href="feed/profile_mediumscreen.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:600px)" href="css/screen_layout_small.css" />		
<?php

include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}
$uid=$_SESSION['uid'];
?>

<script src=jquery.js></script>
<script>
<?php

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT product_id, count(user2) as count1 FROM friends_have WHERE user1=:uid GROUP BY product_id ORDER BY count(user2)');

$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->execute();
$sum=0;
while($row2=$stmt->fetch(PDO::FETCH_ASSOC))
{
$sum=$sum+1;
}

?>
$(document).ready(function(){
 var page=1;
var uid="<?php echo $uid; ?>";
var sum="<?php echo $sum; ?>";
foo();
function foo()
{  
page++;	 
var data = {
	                        page_num:page,uid:uid
	         };
if(page<=sum){
   $.ajax({
    type: "POST",
    url: "datad.php",
    data:data,
    success: function(res) {
        $(".list1").append(res);
      foo();
    }
});                        
}
}
});

</script>
<div class="list1">
<div class="feedbox">

<?php


$stmt=$db->prepare('SELECT product_id, count(user2) as count1 FROM friends_have WHERE user1=:uid GROUP BY product_id ORDER BY count(user2) desc LIMIT 1');

$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$x=$row['product_id'];
$stmtx=$db->prepare('SELECT * FROM product WHERE product_id=:x LIMIT 1');

$stmtx->bindParam(':x',$x, PDO::PARAM_STR);
$stmtx->execute();

echo " <br> ";


echo "<div class='photo1'><img class='photo11'  src='/../saurabh/upload_image/upload_to_folder/images_thumbnail/$x.jpg' alt='Mobile Photo'></img> </div>";
echo "<br>";

echo $row['count1'];
echo "friends have this.<br>";

while($row1=$stmtx->fetch(PDO::FETCH_ASSOC))
{
echo $row1['company'];
echo " ";
echo $row1['name'];
echo "<br>Average Rating: ";
echo $row1['rating'];
}


}
?>
</div>
</div>

</html>