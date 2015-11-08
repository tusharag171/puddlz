
<?php
$uid=$_POST['uid'];
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$requested_page = $_POST['page_num'];
$set_limit = (($requested_page - 1) * 1) . ",1";
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

$stmt=$db->prepare('SELECT product_id, count(user2) as count1 FROM friends_have WHERE user1=:uid GROUP BY product_id ORDER BY count(user2) desc LIMIT '.$set_limit.'');

$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
echo "<div class='feedbox'>";
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
$x=$row['product_id'];
$stmtx=$db->prepare('SELECT * FROM product WHERE product_id=:x LIMIT 1');

$stmtx->bindParam(':x',$x, PDO::PARAM_STR);
$stmtx->execute();
while($row1=$stmtx->fetch(PDO::FETCH_ASSOC))
{
echo $row1['company'];
echo " ";
echo $row1['name'];
echo "<br>Average Rating: ";
echo $row1['rating'];
}
echo " <br> ";
echo $row['count1'];
echo "friends have this.<br>";
echo "<img src='/../saurabh/upload_image/upload_to_folder/images_thumbnail/$x.jpg' height='60px' width='60px'></img>";
echo "<br>";

}
echo "</div>";
?>
