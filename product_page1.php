<?php
include_once("scripts/check_user.php");

$x=$_GET['x'];
$stmt = $db->prepare("SELECT * FROM product WHERE product_id=:x ");
$stmt->bindValue(':x',$x,PDO::PARAM_STR);
try{
		$stmt->execute();
		$chk_count=$stmt->rowCount();
		if($chk_count==0)
		{header("location: error/404.php");}


$row = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $row['name'];
$company=$row['company'];
$os=$row['os'];
$network_technology=$row['network_technology'];
$size=$row['size'];
$front_camera=$row['front_camera'];
$back_camera=$row['back_camera'];
$processor=$row['processor'];
$ram=$row['ram'];
$memory=$row['memory'];
$description1 = $row['description1'];
$description1 = str_replace("\n", "<br/>", $description1);
$description2 = $row['description2'];
$description2 = str_replace("\n", "<br/>", $description2);
$description3 = $row['description3'];
$description3 = str_replace("\n", "<br/>", $description3);
$connectivity=$row['connectivity'];
$battery=$row['battery'];
$release_year=$row['release_year'];
$color=$row['color'];
$weight=$row['weight'];


}catch(PDOException $e){
		$db = null;
		exit();
	}

if(!$user_is_logged == true){
include 'search_final2.php';
$uid1=$_SESSION['uid'];
}
else
{
include 'search_final3.php';}



	
	
	
$stmtime = $db->prepare("SELECT now() as a");
$stmtime->execute();
$rowtime = $stmtime->fetch(PDO::FETCH_ASSOC);
$current_time=$rowtime['a'];
$stmt2 = $db->prepare('SELECT * FROM review where product_id=:x and lastlog<:current_time');
$stmt2->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt2->bindValue(':x',$x,PDO::PARAM_STR);
$stmt2->execute();
$count=$stmt2->rowCount();


?>


<!doctype html>
<html>
<title>
Product Page
</title>


  <script type="text/javascript" src="review/review/jquery.raty.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

<link rel="stylesheet" type="text/css" href="prod_comment/screen_layout_large.css">

<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:700px)" href="prod_comment/screen_layout_small.css" />		


<link rel="stylesheet" type="text/css" href="product_css/large.css">

<style>
.aj2
{
position:fixed;
left:50%;
top:90%;
display:none;
}
.click1
{
display: inline-block;
font-weight:bold;
cursor:pointer;
}
.click1:hover
{
color:red;
text-decoration:underline;
}
.ax1
{
height:220px;
width:200px;

}
.z11
{
position:relative;
top:90px;
}
.yo2
{
position:relative;
display:none;
}
.desc
{
 background:#fcfbe4; 
font-size: 14px;
font-family: Arial;
margin: 3px 3px 1px 3px;
line-height: 1.5em;
-webkit-box-shadow: 0 0 6px #00aff0;
-moz-box-shadow: 0 0 6px #00aff0;
box-shadow: 0 0 6px #00aff0;
}
b { font-weight: 900;}
</style>


<head>

<script>
$(document).ready(function(){


$.fn.raty.defaults.path = '';
$('div.a2').raty({
readOnly: true,
  score: function() {
    return $(this).attr('init');
  },
half: true,
halfShow:true
});

$.fn.raty.defaults.path = '';
$('div.a3').raty({
readOnly: true,
  score: function() {
    return $(this).attr('init');
  },
half: true,
halfShow:true
});

});
$(document).ready(function(){

var open=0;
$(".rev").click(function(){
if(open==0)
{
$(".yo2").show();
open=1;
}
else
{
$(".yo2").hide();
open=0;
}
});
$(".submit2").click(function(){
$(".yo2").hide();
open=0;
});
var have=0;
var uid="<?php  echo $uid1; ?>";
var x="<?php echo $x; ?>";
$.ajax({//to check if has/had
url:'review/gox_check1.php',
type:"POST",
data:{
uid:uid,x:x
},
success:function(result){
if(result=='1')
{
have=1;
$(".has").html("Yeah, you have it!");
$(".has").css("background-color","red");

}
$(".has").show();
}
});
//to check 3 cases of reviews
var rated=0;
$.ajax({
url:'review/rev_check1.php',
type:"POST",
data:{
uid:uid,x:x
},
success:function(result1){
if(result1=='3')
{
rated=0;
$(".rev").html("Review it!");
$(".rev").css("background-color","#00aeef");
}
else
{
rated=2;
$(".rev").html("Edit Review!");
$(".rev").css("background-color","red");

}
$(".rev").show();
}
});

$(".has").click(function(){
if(have==0)
{
$.ajax({
url:'review/gox_do1.php',
type:"POST",
data:{
uid:uid,x:x
}
});
have=1;
$(".has").css("background-color","red");
$(".has").html("Yeah, you have it!");
}
else
{
$.ajax({
url:'review/gox_do2.php',
type:"POST",
data:{
uid:uid,x:x
}
});
$(".has").css("background-color","#00aeef");
$(".has").html("I have it!");
have=0;
}
});
$.ajax({
url:'ajax_call.php',
type:"POST",
data:{
x:x
},
success:function(result1){
$(".ax1").html(result1);
}
});
$.ajax({
url:'ajax_call1.php',
type:"POST",
data:{
x:x
},
success:function(result1){
$(".ax2").html(result1);
}
});
$.ajax({
url:'ajax_call2.php',
type:"POST",
data:{
x:x
},
success:function(result1){
$(".ax3").html(result1);
}
});





});


</script>
<script>
$(document).ready(function(){

 var page=1;
 var current_time="<?php echo $current_time; ?>";
var x="<?php echo $x; ?>";
$(window).scroll(function(){

if($(window).scrollTop() + $(window).height() == $(document).height()) {

                          page++;	 
	                    var data = {
	                        page_num:page,current_time:current_time,x:x
	                    };
var actual_count = "<?php echo $count; ?>";

if((page-1)*4<=actual_count){

$(".aj2").show();
$.ajax({
    type:"POST",
    url:"feed/data_product.php",
    data:data,
    success: function(res){

   $(".list1").append(res);
   $(".aj2").hide();
$.fn.raty.defaults.path = '';
$('div.a3').raty({
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
<style>
.click1a
{
cursor:pointer;
}
.click1a:hover
{
text-decoration:underline;

}
</style>
 




<style>

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

<div class="container">
<div class="section group">
	<div class="col span_1_of_2" style="font-size:18px;font-family: Arial;">
<center><b><?php echo $name; ?></b></center>	
<?php
$stmtm=$db->prepare('SELECT avg_rating FROM rating_product WHERE product_id=:x LIMIT 1');
$stmtm->bindParam(':x',$x, PDO::PARAM_STR);
$stmtm->execute();
$rowm=$stmtm->fetch(PDO::FETCH_ASSOC);
$avg=(float)$rowm['avg_rating'];

if($user_is_logged == true)
{
$stmtl=$db->prepare('SELECT id FROM has_had WHERE product_id=:x AND id IN (SELECT user2 FROM follow WHERE user1=:uid1 AND user2!=user1)');
$stmtl->bindParam(':uid1',$uid1, PDO::PARAM_STR);
$stmtl->bindParam(':x',$x, PDO::PARAM_STR);
$stmtl->execute();
$no_people=$stmtl->rowCount();

}
?>
<center><span style=" font-size: 14px;">Average User Rating:(<?php echo $avg; ?><strong>/</strong>5)<div class="a2" init="<?php echo $avg; ?>"></div></span></center>
	</div>

<?php 
if($user_is_logged == true)
{ ?>
	<div class="col span_2_of_2">
<div class='fol'>
<center>	<?php
if($no_people>1)
{
?>
<div class="click1" onclick="location.href='see_who.php?x=<?php echo $x; ?>'"><?php echo $no_people; ?> people</div> you follow, have it!
<?php
}
else if($no_people==1)
{
?>
<div class="click1" onclick="location.href='see_who.php?x=<?php echo $x; ?>'">1 person</div> you follow, has it.
<?php
}
else
{
echo "No one you follow has it.";
}
?></div>
<center><button class="has">I have it!</button></center>
<center><button class="rev">Review it</button></center>
	</center></div>
</div>



<div class="review"> <?php

$stmt=$db->prepare('SELECT * FROM review WHERE product_id=:x AND id=:uid');
$stmt->bindParam(':uid',$uid1, PDO::PARAM_STR);
$stmt->bindParam(':x',$x, PDO::PARAM_STR);

try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}

$html='3';
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

if($row['is_rev']==0)
$html='1';
if($row['is_rev']==1)
$html='2';
}
echo "<div class='yo2'>";
if($html=='1')
include 'review/write_review1.php';
else if($html=='3')
include 'review/write_review.php';
else 
include 'review/write_review2.php';
echo "</div>";

?> </div>
<?php } else {
echo "<center>";
echo "<div class='col span_2_of_2'  style='color:red'>";
 echo " You must login to review and see ratings of people you follow. "; 
echo "</div>";
echo "</center>";
 }?>
 


<div class="section group">
	<div class="col span_1_of_2">
<center>
<span class='ax1'><div class='image_container1p'><img  class="z11" src='aj1.gif'/></div></span>

<span class='ax2'><div class='image_container1p'><img  class="z11" src='aj1.gif'/></div></span>
<span class='ax3'><div class='image_container1p'><img  class="z11" src='aj1.gif'/></div></span>
	</div></center>
<div class="col span_2_of_2">
<div class="desc">
<?php
$name1=$name;
$name1=str_replace(" ","+",$name1);

?>


<center><div class="price"><a href="http://www.google.com/#q=<?php echo $name1; ?>+price" target="_blank" style="color:white;text-decoration:none;"  ><font style="color:white;text-decoration:none;">Find Price</font></a></div></center>
<br/>

<b style="font-size:18px;">Description:</b>
<br/>
<?php 	
echo $description1;
?>
<br/>
<br/>
<b>Company: </b><?php echo $company;?><br/>
<b>Operating System: </b><?php echo $os; ?><br/>
<b>Release year: </b><?php echo $release_year;?></br>
<b>Network Technology: </b><?php echo $network_technology;?><br/>
<b>Color: </b><?php echo $color;?><br/>
<b>Weight: </b><?php echo $weight;?> gms<br/>
<b>Size: </b><?php echo $size;?> inches<br/>
<b>Front Camera: </b>
<?php if($front_camera==-1)
   echo "VGA";
elseif($front_camera==0)
echo "No front Camera";
else
echo $front_camera." MP";?><br/>
<b>Back camera: </b>
<?php if( $back_camera==0)
echo "No Back Camera";
else
echo  $back_camera." MP";?><br/>
<b>Processor: </b><?php echo $processor;?><br/>
<b>RAM: </b><?php echo $ram; ?> GB <br/>
<b>Memory: </b><?php echo $memory;?> GB<br/>
<b>Battery: </b><?php echo $battery;?><br/>
<b>Connectivity: </b><?php echo $connectivity;?><br/>
</br>
<b style="font-size:18px;">Other Features: </b><br/>
<?php 
echo $description3;
?><br/><br/>
<?php
echo $description2;
?>

<br/>
</div>
<?php




?>
<div class="gap"></div>
<div class="list1">
<?php
$zx=1;
$stmtfeed = $db->prepare("SELECT * FROM review where product_id=:x and lastlog<:current_time ORDER BY lastlog DESC LIMIT 4");

$stmtfeed->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmtfeed->bindValue(':x',$x,PDO::PARAM_STR);
$stmtfeed->execute();

while($rowfeed = $stmtfeed->fetch(PDO::FETCH_ASSOC))
{
$stmtn = $db->prepare("SELECT full_name FROM members where id=:id LIMIT 1");
$stmtn->bindValue(':id',$rowfeed['id'],PDO::PARAM_INT);
$stmtx = $db->prepare("SELECT name FROM product where product_id=:pid LIMIT 1");
$stmtx->bindValue(':pid',$rowfeed['product_id'],PDO::PARAM_INT);
$stmtx->execute();
$stmtn->execute();
$rown = $stmtn->fetch(PDO::FETCH_ASSOC);
$rowx = $stmtx->fetch(PDO::FETCH_ASSOC);
$y=$rowfeed['id'];
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

<div class="feedbox">

<div class="head">
<img class="image_container1" src="members/<?php echo $rowfeed['id']; ?>/<?php echo $rowfeed['id']; ?>2.<?php echo $ext; ?>"/>
<div class="line"></div>
<img class="image_container1" src="insert/<?php echo $rowfeed['product_id'];?>/4.jpg"/>
<div class="con">
<strong><span class="click1a" onclick="location.href='profile_page.php?uid=<?php echo $rowfeed['id']; ?>'"><?php echo $rown['full_name'];?></span></strong> reviewed <strong><span class="click1a" onclick="location.href='product_page1.php?x=<?php echo $rowfeed['product_id']; ?>'"><?php echo $rowx['name']; ?></span></strong></div>
<div class="rating">

Rating:<div class="a3" init="<?php echo $rowfeed['rating']; ?>"></div></div>
</div>

<div class="content"> 
<p> <?php if($rowfeed['is_rev']==1)
{echo $rowfeed['comment'];}
else
{?> <center><div style="color:red"><?php echo "The person has not yet commented about this product!";} ?></div></center>

</p> </div>

<div class="foot">
<table >
<tr><td>
<p>
 </p>
</td>
<td >

</td>
</table>

</div>
</div>
<br/>
<?php } ?>
</div>
<div class="aj2">
<img src="aj1.gif"/>
</div>
</div>
</div>

</div>

</body>

</html>