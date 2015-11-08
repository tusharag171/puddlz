<!DOCTYPE html>
<?php
include_once("../scripts/check_user.php");
$stmt2 = $db->prepare("SELECT * FROM review");
$stmt2->execute();
$count=$stmt2->rowCount();
$stmtime = $db->prepare("SELECT now() as a");
$stmtime->execute();
$rowtime = $stmtime->fetch(PDO::FETCH_ASSOC);
$current_time=$rowtime['a'];
?>


<html>

<head>
<?php
include 'search_final.php';

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>NewsFeed</title>
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

<link rel="stylesheet" type="text/css" href="css/screen_layout_large.css">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:601px) and (max-width:1125px)" href="profile_mediumscreen.css" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:600px)" href="css/screen_layout_small.css" />		

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
		
<script src="jquery.js"></script>

<script>
$(document).ready(function(){

 var page=1;
 var current_time="<?php echo $current_time; ?>";
$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() == $(document).height()) {
            
	                    page++;	 
	                    var data = {
	                        page_num:page,current_time:current_time
	                    };
var actual_count = "<?php echo $count; ?>";

if((page-1)* 6< actual_count){
   $(".aj1").show();  
   $.ajax({
    type: "POST",
    url: "data.php",
    data:data,
    success: function(res) {
        $(".list1").append(res);
       $(".aj1").hide();
    }
});                        
}
}
});

});

</script>



<style>
.list1
{
position:relative;

}
.aj1
{
position:fixed;
left:50%;
top:90%;
display:none;
}
  
</style>

</head>

<body>
<br/>
<div class="list1">
<?php

$stmt = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time ORDER BY lastlog DESC LIMIT 6");
$stmt->bindValue(':user1',$log_user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$stmtn = $db->prepare("SELECT username FROM members where id=:id LIMIT 1");
$stmtn->bindValue(':id',$row['id'],PDO::PARAM_INT);
$stmtn->execute();
$rown = $stmtn->fetch(PDO::FETCH_ASSOC);

?>
<div class="topmargin"></div>
<div class="feedbox">

<div class="head">
<img class="image_container1" src="#"/>
<div class="line"></div>
<img class="image_container1" src="#"/>
<div class="con">
<?php echo $rown['username'];?> reviewed iphone</div>
<div class="rating">
Rating: 3.5/5</div>
</div>

<div class="content">
<p> <?php echo $row['comment']; ?>
</p> </div>

<div class="foot">
<table >
<tr><td>
<p><?php echo $row['lastlog']; ?>
 </p>
</td>
<td >
<p> Edit </p>
</td>
</table>

</div>
</div>
<br/>
<?php } ?>
</div>
<div class="aj1">
<img src="ajax-loader.gif"/>
</div>
</html>