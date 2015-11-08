<?php
include 'search_final.php';
$stmtime = $db->prepare("SELECT now() as a");
$stmtime->execute();
$rowtime = $stmtime->fetch(PDO::FETCH_ASSOC);
$current_time=$rowtime['a'];

$stmt2 = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time");
$stmt2->bindValue(':user1',$log_user_id,PDO::PARAM_INT);
$stmt2->bindValue(':current_time',$current_time,PDO::PARAM_STR);

$stmt2->execute();
$count=$stmt2->rowCount();

?>

<!DOCTYPE html>
<html>

<head>
<style>
.click1
{
cursor:pointer;
}
.click1:hover
{
text-decoration:underline;

}
.write_comment
{
position:relative;
width:160px;
height:30px;
color:white;
background-color:#00aeef;
cursor:pointer;

}
</style>
 
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="review/review/jquery.raty.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>NewsFeed</title>
<meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" /> 

<link rel="stylesheet" type="text/css" href="feed/css/screen_layout_large.css">

<link rel="stylesheet" type="text/css" media="only screen and (min-width:50px) and (max-width:700px)" href="feed/css/screen_layout_small.css" />		

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
		

<script>
$(document).ready(function(){
var x=1;

 $('.email_send').click(function(){
var user_id=$(this).attr('at1');
var product_id=$(this).attr('at2');

$(this).html("Email Sent!");
$(this).css("background-color","red"); 
if(x==1)
{
$.ajax({
type:"POST",
url:"send_email.php",
data:{
user_id:user_id,product_id:product_id
},
success:function(res){
x=2;
}
});

}

});


   $.fn.raty.defaults.path = '';

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
    url: "feed/data.php",
    data:data,
    success: function(res) {

        $(".list1").append(res);
       $(".aj1").hide();
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

</script>



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
<div class="gap"></div>
<br/>
<div class="list1">
<?php
$zx=1;
$stmt = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time ORDER BY lastlog DESC LIMIT 6");
$stmt->bindValue(':user1',$log_user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$stmtn = $db->prepare("SELECT full_name FROM members where id=:id LIMIT 1");
$stmtn->bindValue(':id',$row['id'],PDO::PARAM_INT);
$stmtx = $db->prepare("SELECT name FROM product where product_id=:pid LIMIT 1");
$stmtx->bindValue(':pid',$row['product_id'],PDO::PARAM_INT);
$stmtx->execute();
$stmtn->execute();
$rown = $stmtn->fetch(PDO::FETCH_ASSOC);
$rowx = $stmtx->fetch(PDO::FETCH_ASSOC);
$y=$row['id'];
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
<div class="topmargin"></div>
<div class="feedbox">

<div class="head">
<img class="image_container1" src="members/<?php echo $row['id']; ?>/<?php echo $row['id']; ?>2.<?php echo $ext; ?>"/>
<div class="line"></div>
<img class="image_container1" src="insert/<?php echo $row['product_id'];?>/4.jpg"/>
<div class="con">
<strong><span class="click1" onclick="location.href='profile_page.php?uid=<?php echo $row['id']; ?>'"><?php echo $rown['full_name'];?></span></strong> reviewed <strong><span class="click1" onclick="location.href='product_page1.php?x=<?php echo $row['product_id']; ?>'"><?php echo $rowx['name']; ?></span></strong></div>
<div class="rating">

Rating:<div class="a1" init="<?php echo $row['rating']; ?>"></div></div>
</div>

<div class="content"> 
<p> <?php if($row['is_rev']==1)
{echo $row['comment'];}
else if($_SESSION['uid']!=$row['id'])
{echo "<center>";
echo "This person has not yet commented yet. Ask him to review by sending an Email!<br/><br/>";
echo "</center>"; ?>
<center><button class="email_send" at1="<?php echo $row['id']; ?>" at2="<?php echo $row['product_id']; ?>">Send Email</button></center>
<?php } 
else
{
echo "<center>";
echo "You have rated the product, but have't commented yet.";
echo "</center>"; ?>
<center><br/><button class="write_comment" onclick="location.href='product_page1.php?x=<?php echo $row['product_id']; ?>'">Write Comment!</button></center>
<?php

}

?>
</p> </div>

<div class="foot">
<table >
<tr><td>
<p>
 </p>
</td>
<td >
<?php
if($_SESSION['uid']==$row['id'])
{?>
<strong>
<p class="click1" onclick="location.href='product_page1.php?x=<?php echo $row['product_id']; ?>'"> Edit </p>
</strong>
<?php
}
?>
</td>
</table>

</div>
</div>
<br/>
<?php } ?>
</div>
<div class="aj1">
<img src="aj1.gif"/>
</div>
</html>