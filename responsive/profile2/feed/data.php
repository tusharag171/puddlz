<?php
$requested_page = $_POST['page_num'];
$current_time = $_POST['current_time'];
include_once("../scripts/check_user.php");
$set_limit = (($requested_page - 1) * 6) . ",6";

$stmt = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time ORDER BY lastlog DESC LIMIT  ".$set_limit."");
$stmt->bindValue(':user1',$log_user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();

$stmt = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time ORDER BY lastlog DESC LIMIT  ".$set_limit."");
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
<?php exit();
?>