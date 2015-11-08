
<?php
$uid1=$_POST['uid1'];
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$requested_page = $_POST['page_num'];
$set_limit = (($requested_page - 1) * 6) . ",6";
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT product_id,count(id) as count1 FROM has_had WHERE id IN (SELECT user2 FROM follow WHERE user1=:uid1 AND user2!=user1) GROUP BY product_id ORDER BY count(id) desc, product_id desc LIMIT '.$set_limit);

$stmt->bindParam(':uid1',$uid1, PDO::PARAM_STR);

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
echo $row1['name'];
$rown=$stmtn->fetch(PDO::FETCH_ASSOC);
$r1=(float)$rown['avg_rating'];
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
echo '<div style="clear:both;"> </div></div></div>';


}

?>