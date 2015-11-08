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
position:absolute;
top:100px;
width:100%;
left:25%;

}
.aj1
{
position:fixed;
left:50%;
top:90%;
display:none;
}
.d1
{
position:relative;
width:500px;
padding:80px;
border:5px solid gray;
margin:1px;
}

  .box {
      width: 50%;
      padding-bottom: 20%;
      color: #FFF;
      position: relative;
          }
    .innerContent {
	font-size:13px;
	font-weight:600;
      position: absolute;
    text-align:center;
   left: 1px;
      right: 1px;
      top: 1px;
      bottom: 1px;
      background: #009ad7;
padding: 20%;         
}
</style>

</head>

<body>
<center>Newsfeed</center>
<div class="list1">
<?php

$stmt = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time ORDER BY lastlog DESC LIMIT 6");
$stmt->bindValue(':user1',$log_user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo '<div class="box">';
echo '<div class="innerContent">';
$stmtn = $db->prepare("SELECT username FROM members where id=:id LIMIT 1");
$stmtn->bindValue(':id',$row['id'],PDO::PARAM_INT);
$stmtn->execute();
$rown = $stmtn->fetch(PDO::FETCH_ASSOC);
echo $rown['username'];
echo $row['lastlog'];
echo "<br>";
echo $row['comment'];
echo "<br>";
echo '</div>';
echo '</div>';
echo "<br>";

}
?>
</div>
<div class="aj1">
<img src="ajax-loader.gif"/>
</div>
</html>