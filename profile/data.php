<?php
$requested_page = $_POST['page_num'];
$current_time = $_POST['current_time'];
$user_id = $_POST['user_id'];
include_once("../scripts/check_user.php");
$set_limit = (($requested_page - 1) * 6) . ",6";

$stmt = $db->prepare("SELECT * FROM review where id=:user1 and lastlog<:current_time ORDER BY lastlog DESC LIMIT  ".$set_limit."");
$stmt->bindValue(':user1',$user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
$stmtn = $db->prepare("SELECT full_name FROM members where id=:id LIMIT 1");
$stmtn->bindValue(':id',$row['id'],PDO::PARAM_INT);
$stmtx = $db->prepare("SELECT name FROM product where product_id=:pid LIMIT 1");
$stmtx->bindValue(':pid',$row['product_id'],PDO::PARAM_INT);
$stmtx->execute();
$rowx = $stmtx->fetch(PDO::FETCH_ASSOC);
$stmtn->execute();
$rown = $stmtn->fetch(PDO::FETCH_ASSOC);
$y=$row['id'];
$dir="../members/".$y; 
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
<img class="image_container1" src="members/<?php echo $row['id']; ?>/<?php echo $row['id']; ?>2.<?php echo $ext; ?>"/>
<div class="line"></div>
<img class="image_container1" src="insert/<?php echo $row['product_id'];?>/4.jpg"/>
<div class="con">
<strong><span class="click1" onclick="location.href='profile_page.php?uid=<?php echo $row['id']; ?>'"><?php echo $rown['full_name'];?></span></strong> reviewed <strong><span class="click1" onclick="location.href='product_page1.php?x=<?php echo $row['product_id']; ?>'"><?php echo $rowx['name']; ?></span></strong></div>
<div class="rating">

Rating:<div class="a1" init="<?php echo $row['rating']; ?>"></div>
</div>
</div>
<div class="content">
<p> 
<?php if($row[is_rev]!=0)
echo $row['comment'];
else if($_SESSION['uid']!=$row['id'])
{ 
echo "<div style='color:red;'>";
echo "<center>";
echo "This person has not yet commented yet about this product.";
echo "</center>";
echo "</div>";
}
else
{ echo "<div style='color:red;'>"; 
echo "<center>";
echo "You have not yet commented yet about this product.";
echo "</center>";
echo "</div>";
}
 ?></p> </div>

<div class="foot">
<table >
<tr><td>

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
<?php exit();
?>