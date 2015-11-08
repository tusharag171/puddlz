<?php
if(isset($_GET['user']) && $_GET['user'] != "" && isset($_GET['token']) && $_GET['token'] != ""){
	include_once("../scripts/connect.php");
	$user = preg_replace('#[^0-9]#', '', $_GET['user']);
	$token = preg_replace('#[^a-z0-9]#i', '', $_GET['token']);
	$stmt = $db->prepare("SELECT user, token FROM activate WHERE user=:user AND token=:token LIMIT 1");
	$stmt->bindValue(':user',$user,PDO::PARAM_INT);
	$stmt->bindValue(':token',$token,PDO::PARAM_STR);
	$extSQL = $db->prepare("SELECT ext_id FROM members WHERE id=:user LIMIT 1");

	$extSQL->bindValue(':user',$user,PDO::PARAM_INT);	
	try{
		$stmt->execute();
		$extSQL->execute();
		$count = $stmt->rowCount();
		$extcount = $extSQL->rowCount();
		if($count > 0){
			try{
				$db->beginTransaction();
				$updateSQL = $db->prepare("UPDATE members SET activated='1' WHERE id=:user LIMIT 1");
				$updateSQL->bindValue(':user',$user,PDO::PARAM_INT);
				$updateSQL->execute();
				$deleteSQL = $db->prepare("DELETE FROM activate WHERE user=:user AND token=:token LIMIT 1");
				$deleteSQL->bindValue(':user',$user,PDO::PARAM_INT);
				$deleteSQL->bindValue(':token',$token,PDO::PARAM_STR);
				$deleteSQL->execute();
				if(!file_exists("../members/$user")){
					mkdir("../members/$user", 0755);
				}
					
	
			/*	while($row = $extSQL->fetch(PDO::FETCH_ASSOC)){
		$ext_id = $row['ext_id'];}
		if($ext_id)
{
$img = file_get_contents('http://graph.facebook.com/'.$ext_id.'/picture?width=200&height=200');
				$file = '../members/'.$user.'/'.$user.'.jpg';
                 file_put_contents($file, $img);
$img2=file_get_contents('http://graph.facebook.com/'.$ext_id.'/picture?width=60&height=60');
				$file = '../members/'.$user.'/'.$user.'2.jpg';
                 file_put_contents($file, $img2); 				 
				}
else
*/
{$img = file_get_contents('http://www.puddlz.com/images/default.jpg');
				$file = '../members/'.$user.'/'.$user.'.jpg';
                 file_put_contents($file, $img); 
				 $img2 = file_get_contents('http://www.puddlz.com/images/default2.jpg');
				$file = '../members/'.$user.'/'.$user.'2.jpg';
                 file_put_contents($file, $img2); }
				 
							
		
				$db->commit();
				header('Location: activated.php');
				$db = null;
				exit();
			
			}
			catch(PDOException $e){
				$db->rollBack();
				echo $e->getMessage();
			}
		}else{
			echo "Sorry, There has been an error. Maybe try registering again!";
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
?>