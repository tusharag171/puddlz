<?php
include_once("../scripts/connect.php");
session_start();

if(isset($_POST['username'])){
    $username = strip_tags($_POST['username']);
    $email1 = strip_tags($_SESSION['profile']['email']);
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $ext_id = $_SESSION['profile']['id'];
   $name=$_SESSION['profile']['name'];
    
	// make sure no fields are blank /////
    if(trim($username) == "" || trim($pass1) == "" || trim($pass2) == ""){
        echo "Error: All fields are required.";
        $db = null;
        exit();
    }
if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) { 
echo "Username should be alpha-numeric and atleast 5 characters long!";
$db=null;
exit();
}    

    //// Make sure both password fields match ////
    else if($pass1 != $pass2){
        echo "Your password fields do not match. ";
		$db = null;
        exit();
    }
	// Password Strength check
		if( strlen($pass1) < 6 ) {
			echo "Password need to have at least 6 characters!";
		    $db = null;
            exit();
		}
 
		if( strlen($pass1) > 20 ) {
			echo "Password needs to have less than 20 characters!";
			$db = null;
            exit();
		}
 
		if( !preg_match("#[0-9]+#", $pass1) ) {
			echo "Password must include at least one number! ";
			$db = null;
            exit();
		}
 
 
		if( !preg_match("#[a-z]+#", $pass1) ) {
			echo "Password must include at least one letter! ";
			$db = null;
            exit();
		}
 
		
   //// create the hmac /////
    $hmac = hash_hmac('sha512', $pass1, file_get_contents('secret/key.txt'));
    //// create random bytes for salt ////
    $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
    //// Create salt and replace + with . ////
    $salt = strtr(base64_encode($bytes), '+', '.');
    //// make sure our bcrypt hash is 22 characters which is the required length ////
    $salt = substr($salt, 0, 22);
    //// This is the hashed password to store in the db ////
    $bcrypt = crypt($hmac, '$2y$12$' . $salt);
    $token = md5($bcrypt);

$stmt = $db->prepare("SELECT email FROM members WHERE email=:email1 LIMIT 1");
	$stmt->bindValue(':email1',$email1,PDO::PARAM_STR);
	try{
	$stmt->execute();
	$count = $stmt->rowCount();
	}
	catch(PDOException $e){
			$db = null;
			exit();
	}
	
	//// query to check if the username is in the db already ////
	$unameSQL = $db->prepare("SELECT username FROM members WHERE username=:username LIMIT 1");
	$unameSQL->bindValue(':username',$username,PDO::PARAM_STR);
	try{
		$unameSQL->execute();
		$unCount = $unameSQL->rowCount();
	}
	catch(PDOException $e){
		echo $e->getMessage();
		$db = null;
		exit();
	}
	//// Check if username is in the db already ////
	if($unCount > 0){
		echo "Sorry, that username is already in use in the system";
		$db = null;
		exit();
	}

if($count > 0){
		echo "Sorry, that email is already in use in the system";
		$db = null;
		exit();
	}
	
	try{
		$db->beginTransaction();
		$ipaddress = getenv('REMOTE_ADDR');
		$stmt2 = $db->prepare("INSERT INTO members (username, email,ext_id, password, signup_date, ipaddress,full_name,activated) VALUES (:username, :email1, :ext_id, :bcrypt, now(), :ipaddress,:full_name,'1')");
		$stmt2->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt2->bindParam(':email1',$email1,PDO::PARAM_STR);
		$stmt2->bindParam(':ext_id',$ext_id,PDO::PARAM_STR);
		$stmt2->bindParam(':bcrypt',$bcrypt,PDO::PARAM_STR);
		$stmt2->bindParam(':ipaddress',$ipaddress,PDO::PARAM_INT);
                $stmt2->bindParam(':full_name',$name,PDO::PARAM_STR);
		$stmt2->execute();
		/// Get the last id inserted to the db which is now this users id for activation and member folder creation ////



		//// Send email activation to the new user ////
		$from = "From: Auto Resposder @ Puddlz <admin@puddlz.com>";
		$subject = "IMPORTANT: Thank you for using Puddlz";
		//// Start Email Body ////
		$message = "
Thanks for registering an account at Puddlz! We are glad you decided to join us in this wacky adventure.
See you on the site!
";
		//// Set headers ////
		$headers = 'MIME-Version: 1.0' . "rn";
		$headers .= "Content-type: textrn";
		$headers .= "From: $fromrn";
		/// Send the email now ////
		mail($email1, $subject, $message, $headers, '-f noreply@puddlz.com');
		//mail($email1, $subject, $message, $headers, '-f noreply@your-email.com');
		$db->commit();
		echo "1";
		$db = null;
		exit();
	}
		catch(PDOException $e){
			$db->rollBack();
			echo $e->getMessage();
			$db = null;
			exit();
		}
}
?>
