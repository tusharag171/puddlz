<?php
include_once("../scripts/connect.php");


if(isset($_POST['pass1'])){

    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $user_id= $_POST['user_id'];
	
    // make sure no fields are blank /////
    if(trim($pass1) == "" || trim($pass2) == ""){
        echo "Error: All fields are required.";
        $db = null;
        exit();
    }
    /// Make sure both email fields match /////
    if($pass1 != $pass2){
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
    
	try{
		$db->beginTransaction();
		$stmt2 = $db->prepare("UPDATE members SET password=:bcrypt WHERE id=:user_id LIMIT 1");
		$stmt2->bindParam(':bcrypt',$bcrypt,PDO::PARAM_STR);
		$stmt2->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		$stmt2->execute();
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
