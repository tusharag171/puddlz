<?php include_once("../scripts/check_user.php");


if(isset($_POST['email1'])){
        $email1 = strip_tags($_POST['email1']);
        $email2= strip_tags($_POST['email2']);

if( trim($email1) == "" || trim($email2) == ""){
        echo "Error: All fields are required.";
        $db = null;
        exit();
    }
	
	if($email1 != $email2){
        echo "Your email fields do not match. ";
		$db = null;
        exit();
    }
    
	if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
		echo "You have entered an invalid email. ";
		$db = null;
        exit();
	}
	
	
	$hmac = hash_hmac('sha512', $email1, file_get_contents('secret/key.txt'));
    //// create random bytes for salt ////
    $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
    //// Create salt and replace + with . ////
    $salt = strtr(base64_encode($bytes), '+', '.');
    //// make sure our bcrypt hash is 22 characters which is the required length ////
    $salt = substr($salt, 0, 22);
    //// This is the hashed password to store in the db ////
    $bcrypt = crypt($hmac, '$2y$12$' . $salt);
    $token = md5($bcrypt);
	//// query to check if email is in the db already ////
	$stmt = $db->prepare("SELECT id,email FROM members WHERE email=:email1 LIMIT 1");
	$stmt->bindValue(':email1',$email1,PDO::PARAM_STR);
	$stmt->execute();
	$count = $stmt->rowCount();
	
	
	if($count > 0){
	try{
$db->beginTransaction();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$lastId = $row['id'];
		$stmt3 = $db->prepare("INSERT INTO forgot (user, token) VALUES ('$lastId', :token)");
		$stmt3->bindValue(':token',$token,PDO::PARAM_STR);
		$stmt3->execute();
	
	$from = "From: Auto Resposder @ Puddlz <admin@puddlz.com>";
		$subject = "IMPORTANT: Reset your Puddlz account Password";
		$link = 'http://puddlz.com/login/f_validate.php?user='.$lastId.'&token='.$token.'';
		//// Start Email Body ////
		$message = "
To reset your password, Click or Paste the following link into your browser!

$link
";
		//// Set headers ////
		$headers = 'MIME-Version: 1.0' . "rn";
		$headers .= "Content-type: textrn";
		$headers .= "From: $fromrn";
		/// Send the email now ////
		mail($email1, $subject, $message, $headers, '-f noreply@puddlz.com');

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
	else
	{ echo "Email Id is not registered with us. Please register it first! ";
	$db = null;
		exit();
	}}
	?>
	