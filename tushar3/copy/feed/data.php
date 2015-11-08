<?php
$requested_page = $_POST['page_num'];
$current_time = $_POST['current_time'];
include_once("../scripts/check_user.php");
$set_limit = (($requested_page - 1) * 6) . ",6";

$stmt = $db->prepare("SELECT * FROM review where id in ( SELECT user2 from follow where user1=:user1) and lastlog<:current_time ORDER BY lastlog DESC LIMIT  ".$set_limit."");
$stmt->bindValue(':user1',$log_user_id,PDO::PARAM_INT);
$stmt->bindValue(':current_time',$current_time,PDO::PARAM_STR);
$stmt->execute();


while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo '<div class="d1">';
echo $row['lastlog'];
echo "<br>";
echo $row['comment'];
echo "<br>";
echo '</div>';
echo "<br>";

}

exit();
?>