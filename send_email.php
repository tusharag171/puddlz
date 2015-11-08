<?php
include_once("scripts/connect.php");

session_start();

$current_user_id=$_SESSION['uid'];

$stmt2 = $db->prepare("SELECT full_name FROM members WHERE id=:user LIMIT 1");
	$stmt2->bindValue(':user',$current_user_id,PDO::PARAM_INT);
	$stmt2->execute();
	$stmt2->rowCount();
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$full_name=$row2['full_name'];


if(isset($_POST['user_id']) && isset($_POST['product_id']))
{
$uu=$_POST['user_id'];
$prod_id = $_POST['product_id'];

$stmt3 = $db->prepare("SELECT name FROM product WHERE product_id=:pro_id LIMIT 1");
	$stmt3->bindValue(':pro_id',$prod_id,PDO::PARAM_INT);
	$stmt3->execute();
	$stmt3->rowCount();
$row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	$prod_name=$row3['name'];


$stmt = $db->prepare("SELECT email FROM members WHERE id=:user LIMIT 1");
	$stmt->bindValue(':user',$uu,PDO::PARAM_INT);
	$stmt->execute();
	$coount=$stmt->rowCount();
	
	if($coount>0)
	{
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$email1=$row['email'];
	$from = "From: Auto Resposder @ Puddlz <admin@puddlz.com>";
		$subject = 'IMPORTANT:'.$full_name.' has asked to review '.$prod_name.'';
		$link = 'http://puddlz.com/product_page1.php?x='.$prod_id.'';
		//// Start Email Body ////
		$message = "Hi, Your Contact ".$full_name." has asked to complete review of ".$prod_name." Click the link to review it on Puddlz: $link";
		//// Set headers ////
		$headers = 'MIME-Version: 1.0' . "rn";
		$headers .= "Content-type: textrn";
		$headers .= "From: $fromrn";
		/// Send the email now ////
		mail($email1, $subject, $message, $headers, '-f noreply@puddlz.com');
		
echo "1";
	}
	}
	
	?>
	