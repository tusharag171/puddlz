<?php
include_once("../scripts/connect.php"); 

if(isset($_POST['email']) && trim($_POST['email']) != ""){
	$email = strip_tags($_POST['email']);
	$password = $_POST['password'];
	$hmac = hash_hmac('sha512', $password, file_get_contents('secret/key.txt'));
	$stmt2 = $db->prepare("SELECT id FROM members WHERE email=:email AND activated='0' LIMIT 1");
	$stmt2->bindValue(':email',$email,PDO::PARAM_STR);
$stmt2->execute();
	$count2 = $stmt2->rowCount();
		if($count2 > 0){
		echo "Account yet not activated!";
                $db = null;	
				exit();
		}
$loginstatus=false;	
	$stmt1 = $db->prepare("SELECT id, username, password FROM members WHERE email=:email AND activated='1' LIMIT 1");
	$stmt1->bindValue(':email',$email,PDO::PARAM_STR);
	try{
		$stmt1->execute();
		$count = $stmt1->rowCount();
		if($count > 0){
			while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
				$uid = $row['id'];
				$username = $row['username'];
				$hash = $row['password'];
				$loginstatus=true;
			}
			if (crypt($hmac, $hash) === $hash) {
				$db->query("UPDATE members SET lastlog=now() WHERE id='$uid' LIMIT 1");
session_start();
				$_SESSION['uid'] = $uid;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $hash;
                $_SESSION['loginstatus']=$loginstatus;			
			setcookie("id", $uid, strtotime( '+30 days' ), "/", "", "", TRUE);
				setcookie("username", $username, strtotime( '+30 days' ), "/", "", "", TRUE);
    			setcookie("password", $hash, strtotime( '+30 days' ), "/", "", "", TRUE); 
				setcookie("loginstatus", $loginstatus, strtotime( '+30 days' ), "/", "", "", TRUE); 
				
				echo"1";
				
				exit();
			} else {
				echo 'Invalid password. Try again<br />';
				exit();
			}
		}
		else{
			echo "A user with that email address does not exist here";
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
		else
		{
			echo "Enter Email address and password";
			$db = null;
			exit();
	}

?>