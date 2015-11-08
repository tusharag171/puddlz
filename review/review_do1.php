<?php
$x=$_POST['x'];
$uid=$_POST['uid'];
$score=$_POST['score'];

$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db =new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
$new_rating_val=$score;

$stmt_r=$db->prepare("SELECT * FROM rating_product WHERE product_id=:product_id LIMIT 1");
$stmt_r->bindValue(':product_id',$x,PDO::PARAM_INT);

try{
$db->beginTransaction();
$stmt_r->execute();
$count_r = $stmt_r->rowCount();

$count_r=1;
$stmt=$db->prepare('INSERT INTO review (review_id ,product_id ,id ,rating ,comment ,is_rev,lastlog) VALUES (NULL ,:x, :uid, :score,NULL, 0,now())');
$stmt->bindParam(':uid',$uid, PDO::PARAM_STR);
$stmt->bindParam(':x',$x, PDO::PARAM_STR);
$stmt->bindParam(':score',$score, PDO::PARAM_STR);

try
{
$stmt->execute();
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}

	
	if($count_r>0)
	{

	$row_r = $stmt_r->fetch(PDO::FETCH_ASSOC);
	$total_count = (int)$row_r['count'];
	$avg_rating = (float)$row_r['avg_rating'];
	$avg_rating = (float)($avg_rating*$total_count);
	$total_count=$total_count+1;
	$temp= (float)(($avg_rating+$new_rating_val)/($total_count));
	$avg_rating=$temp;
	$avg_rating_weight=round($avg_rating);
   $updateSQL = $db->prepare("UPDATE rating_product SET count=:total_count, avg_rating=:avg_rating, avg_rating_weight=:avg_rating_weight WHERE product_id=:product_id LIMIT 1");
				$updateSQL->bindValue(':total_count',$total_count,PDO::PARAM_INT);
				$updateSQL->bindValue(':product_id',$x,PDO::PARAM_STR);
				$updateSQL->bindValue(':avg_rating',$avg_rating,PDO::PARAM_STR);
				$updateSQL->bindValue(':avg_rating_weight',$avg_rating_weight,PDO::PARAM_STR);
				$updateSQL->execute();
		
	}

	$db->commit();
				$db = null;
			exit();
			}
			catch(PDOException $e){
				$db->rollBack();
			$db=null;
			}

			?>
			