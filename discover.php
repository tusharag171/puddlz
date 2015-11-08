<?php
include 'search_final.php';
?>
<!doctype html>
<html>

<title>Discovery</title>
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
		
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 
  <script type="text/javascript" src="review/review/jquery.raty.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Sail' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="discovery/discover.css" type="text/css">

<style>
.click1
{
cursor:pointer;
font-weight:bold;
}
.click1:hover
{
text-decoration:underline;
color:red;
}
.load
{
position:fixed;
left:50%;
top:90%;
display:none;
}
</style>
<?php
include_once("scripts/check_user.php");
if(!$user_is_logged == true){
	header("location: index.php");
	$db = null;
	exit();
}
$uid1=$_SESSION['uid'];
?>
<?php

$stmt=$db->prepare('SELECT product_id,count(id) as count1 FROM has_had WHERE id IN (SELECT user2 FROM follow WHERE user1=:uid AND user2!=user1) GROUP BY product_id ORDER BY count(id) desc, product_id asc');

$stmt->bindParam(':uid',$uid1, PDO::PARAM_STR);
$stmt->execute();
$sum=0;
while($row2=$stmt->fetch(PDO::FETCH_ASSOC))
{
$sum=$sum+1;
}
?>
<script>
$(document).ready(function(){
$.fn.raty.defaults.path = '';
$('div.a1').raty({

readOnly: true,

  score: function() {
    return $(this).attr('init');
  },
half: true,
halfShow:true
});


});
$(document).ready(function(){

var page=1;
var uid1="<?php echo $uid1; ?>";
var sum="<?php echo $sum; ?>";
var no1=sum/6;
no1=no1+1;

$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() == $(document).height()) {
  
page++;	 
var data = {
	                        page_num:page,uid1:uid1
	         };
if(page<=no1){
$('.load').show();
   $.ajax({
    type: "POST",
    url: "discovery/data_discovery.php",
    data:data,
    success: function(res) {
$(".list1").append(res);
$('.load').hide();
$.fn.raty.defaults.path = '';
$('div.a1').raty({

readOnly: true,

  score: function() {
    return $(this).attr('init');
  },
half: true,
halfShow:true
});



 }
});     
                   
}
}

});

});

</script>
<body>
<div class="list1">



<?php


$stmt=$db->prepare('SELECT product_id,count(id) as count1 FROM has_had WHERE id IN (SELECT user2 FROM follow WHERE user1=:uid AND user2!=user1) GROUP BY product_id ORDER BY count(id) desc, product_id desc LIMIT 6');

$stmt->bindParam(':uid',$uid1, PDO::PARAM_STR);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$x=$row['product_id'];
?>
<div class="feedbox">
<?php
$stmtx=$db->prepare('SELECT * FROM product WHERE product_id=:x LIMIT 1');
echo '<div class="photo1"> <img class="photo11"src="insert/'.$x.'/4.jpg" alt="Your Photo"></div>';
?>
<div class="part1" onclick="location.href='product_page1.php?x=<?php echo $x; ?>'">
<?php
$stmtx->bindParam(':x',$x, PDO::PARAM_STR);
$stmtx->execute();
$stmtn=$db->prepare('SELECT avg_rating FROM rating_product WHERE product_id=:x');
$stmtn->bindParam(':x',$x, PDO::PARAM_STR);
$stmtn->execute();
while($row1=$stmtx->fetch(PDO::FETCH_ASSOC))
{
$rown=$stmtn->fetch(PDO::FETCH_ASSOC);
$r1=(float)$rown['avg_rating'];
echo $row1['name'];
echo "</div>";
echo "<div class='details'>";
echo '<ul class=" ul1" type="circle">';
if($row['count1']>1)
{
?>
<li><span class="click1" onclick="location.href='see_who.php?x=<?php echo $x; ?>'"><?php echo $row["count1"]; ?> people</span> who you follow have this product.</li><li>Average Rating:<div class="a1" init="<?php echo $r1; ?>"></div>(<?php echo $r1; ?><strong>/</strong>5)</li><li>Release year:<?php echo $row1["release_year"]; ?></li>
<?php
}
else
{

?>
<li><span class="click1" onclick="location.href='see_who.php?x=<?php echo $x; ?>'"><?php echo $row["count1"]; ?> person</span> who you follow has this product.</li><li>Average Rating:<div class="a1" init="<?php echo $r1; ?>"></div>(<?php echo $r1; ?><strong>/</strong>5)</li><li>Release year:<?php echo $row1["release_year"]; ?></li>
<?php
}
echo '</ul>';

}



?>
<div style="clear:both;"> </div>
</div>

</div>
<?php
}
?>
</div>
<img class="load" src="aj1.gif"/>
</body>
</html>