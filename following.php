<?php
include 'search_final.php';

if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}
?>
<div class="po"></div>
<?php
$uidx=$_GET['uid'];
$user_id=$uidx;
$statr = $db->prepare("SELECT user2 FROM follow WHERE user1=:user1 and user2!=user1");
$statr->bindValue(':user1', $user_id,PDO::PARAM_INT);
$statr->execute();
$actual_row_count=$statr->rowCount();

?>
<!DOCTYPE html>
<html lang="en">
<style>
.aj1
{
position:fixed;
top:94%;
left:50%;
display:none;
}

</style>
<link rel="stylesheet" type="text/css" href="search/screen.css">
<title>
Following
</title>
<head>
<script>
$(document).ready(function(){
 var page=1;
var uid="<?php echo $uidx; ?>";

var actual_count="<?php echo $actual_row_count; ?>";
$(window).scroll(function(){


if($(window).scrollTop() + $(window).height() == $(document).height()) {
          
	                    page++;	 
	                    var data = {
	                        page_num:page,uid:uid
	                    };

if((page-1)* 12<=actual_count){
   $(".aj1").show();  
   $.ajax({
    type: "POST",
    url: "search/data_follow.php",
    data:data,
    success: function(res) {
        $(".container").append(res);
       $(".aj1").hide();
    }
});                      
}
}
});

});
</script>
</head>
<body>

<div class="list1">
<div class="container">


<?php

if(isset($_GET['uid']))
{
$user_id=$_GET['uid'];
try
{
$statement1 = $db->prepare("SELECT user2 FROM follow WHERE user1=:user1 and user2!=user1 LIMIT 12");
	$statement1->bindValue(':user1', $user_id,PDO::PARAM_INT);
$statement1->execute();

$statr = $db->prepare("SELECT user2 FROM follow WHERE user1=:user1 and user2!=user1");
$statr->bindValue(':user1', $user_id,PDO::PARAM_INT);
$statr->execute();
$actual_row_count=$statr->rowCount();



$count=$statement1->rowCount();
if($count>0)
{
$ch=0;
while($row2 = $statement1 ->fetch(PDO::FETCH_ASSOC))
{

$user2 = $row2['user2'];
if($user2!=$user_id)
{
$stmt = $db->prepare("SELECT username,full_name FROM members WHERE id=:user2 AND activated='1' LIMIT 1");
$stmt->bindValue(':user2',$user2,PDO::PARAM_INT);
	try{
		$stmt->execute();
	}
	catch(PDOException $e){
		$db = null;
		exit();
	}

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	$fullName = $row['full_name'];
	$username = $row['username'];
	}
	if($fullName)
{$var_name= $fullName;}
else 
{$var_name= $username;}
$y=$user2;
$dir="members/".$y; 
$dir_list = opendir($dir);

while(($filenamee = readdir($dir_list)) != false)
{
if ($filenamee == '.' or $filenamee == '..')
 continue;
else
{
$ext = pathinfo($filenamee, PATHINFO_EXTENSION);
break;
}
}

?>
<?php


if($ch==0)
{
$ch=1;
?>
<div class="section group">
<div class="col span_1_of_2" onclick="location.href='profile_page.php?uid=<?php echo $user2; ?>'">

	<img class="image_container1" src="members/<?php echo $user2; ?>/<?php echo $user2; ?>2.<?php echo $ext; ?>"/>
<div class="name"><?php echo $var_name;?></div>
	</div>
<?php

}
else
{
$ch=0;
?>
<div class="col span_2_of_2" onclick="location.href='profile_page.php?uid=<?php echo $user2; ?>'">
<img class="image_container1" src="members/<?php echo $user2; ?>/<?php echo $user2; ?>2.<?php echo $ext; ?>" />
<div class="name"><?php echo $var_name; ?></div>
	</div>
</div>
<?php

}
?>		
<?php			
}

	}
	}}
	catch(PDOException $e){
		$db = null;
		exit();
	}
	
	


}
if($ch==1)
echo "</div>";
?>
</div>
</div>
<img class="aj1" src="aj1.gif"/>
</body>
</html>
