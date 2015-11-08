<?php
include_once("connect.php");
$user_is_logged = false;
session_start();
if(isset($_SESSION['uid']) && isset($_SESSION['username']) && isset($_SESSION['password'])){
	$stmt = $db->prepare("SELECT id FROM members WHERE id=:log_user_id");
	$stmt->bindValue(':log_user_id',$log_user_id,PDO::PARAM_INT);
	try{
		$stmt->execute();
		 if($stmt->rowCount() > 0){
			 $user_is_logged = true;
		 }
	}
	catch(PDOException $e){
		return false;
	}
}else if(isset($_COOKIE['id']) && isset($_COOKIE['username']) && isset($_COOKIE['password'])){
	$_SESSION['uid'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
	$_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['username']);
	$_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
	$stmt = $db->prepare("SELECT id FROM members WHERE id=:log_user_id");
	$stmt->bindValue(':log_user_id',$log_user_id,PDO::PARAM_INT);
	try{
		$stmt->execute();
		 if($stmt->rowCount() > 0){
			 $user_is_logged = true;
		 }
	}
	catch(PDOException $e){
		return false;
	}
	if($user_is_logged == true){
		$db->query("UPDATE members SET lastlog=now() WHERE id='$log_user_id' LIMIT 1");
	}
}
