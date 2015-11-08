<?php
include_once("scripts/check_user.php"); 
if($user_is_logged == true){
	header("location: profile.php");
	exit();
}
session_start();
if(isset($_SESSION['profile'])){
	$email = strip_tags($_SESSION['profile']['email']);
	$fb_id = $_SESSION['profile']['id'];
	$stmt1 = $db->prepare("SELECT id, username, password, ext_id FROM members WHERE email=:email AND activated='1' LIMIT 1");
	$stmt1->bindValue(':email',$email,PDO::PARAM_STR);
	try{
		$stmt1->execute();
		$count = $stmt1->rowCount();
		if($count > 0){
			while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
				$uid = $row['id'];
				$username = $row['username'];
				$hash = $row['password'];
				$ext= $row['ext_id'];
			}
			if($fb_id == $ext)
			 {
				$db->query("UPDATE members SET lastlog=now() WHERE id='$uid' LIMIT 1");
				$_SESSION['uid'] = $uid;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $hash;
				setcookie("id", $uid, strtotime( '+30 days' ), "/", "", "", TRUE);
				setcookie("username", $username, strtotime( '+30 days' ), "/", "", "", TRUE);
    			setcookie("password", $hash, strtotime( '+30 days' ), "/", "", "", TRUE); 
				header("location: profile.php");
				exit();
			} 
		}
else{header("Location: not_activated.php");
			$db = null;
			exit();
		}
		
	}
	catch(PDOException $e){
		echo $e->getMessage();
		$db = null;
		exit();
	}
}
