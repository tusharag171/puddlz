<?php
$name=$_POST['name'];
$os=$_POST['os'];
$company=$_POST['company'];
$network_technology=$_POST['network_technology'];
$size=$_POST['size'];
$front_camera=$_POST['front_camera'];
$back_camera=$_POST['back_camera'];
$processor=$_POST['processor'];
$ram=$_POST['ram'];
$memory=$_POST['memory'];
$description1=$_POST['description1'];
$description2=$_POST['description2'];
$description3=$_POST['description3'];
$connectivity=$_POST['connectivity'];
$battery=$_POST['battery'];
$release_year=$_POST['release_year'];
$color=$_POST['color'];
$weight=$_POST['weight'];
$usa=$_POST['usa'];
$uk=$_POST['uk'];
$india=$_POST['india'];
$canada=$_POST['canada'];
$australia=$_POST['australia'];
$singapore=$_POST['singapore'];
$uae=$_POST['uae'];
$db_host = "puddlzcom1.ipagemysql.com";
$db_username = "tushar"; 
$db_pass = "tushar@17"; 
$db_name = "puddlz_tush";
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
$stmt=$db->prepare('INSERT INTO product (name, os, company, network_technology, size, front_camera, back_camera, processor, ram, memory, description1, description2, description3, connectivity, battery, release_year, color, weight) VALUES (:name, :os, :company, :network_technology, :size, :front_camera, :back_camera, :processor, :ram, :memory, :description1, :description2, :description3, :connectivity, :battery, :release_year, :color, :weight)');
$stmt->bindParam(':name',$name, PDO::PARAM_STR);
$stmt->bindParam(':os',$os, PDO::PARAM_STR);
$stmt->bindParam(':company',$company, PDO::PARAM_STR);
$stmt->bindParam(':network_technology',$network_technology, PDO::PARAM_STR);
$stmt->bindParam(':size',$size, PDO::PARAM_STR);
$stmt->bindParam(':front_camera',$front_camera, PDO::PARAM_STR);
$stmt->bindParam(':back_camera',$back_camera, PDO::PARAM_STR);
$stmt->bindParam(':processor',$processor, PDO::PARAM_STR);
$stmt->bindParam(':ram',$ram, PDO::PARAM_STR);
$stmt->bindParam(':memory',$memory, PDO::PARAM_STR);
$stmt->bindParam(':description1',$description1, PDO::PARAM_STR);
$stmt->bindParam(':description2',$description2, PDO::PARAM_STR);
$stmt->bindParam(':description3',$description3, PDO::PARAM_STR);
$stmt->bindParam(':connectivity',$connectivity, PDO::PARAM_STR);
$stmt->bindParam(':battery',$battery, PDO::PARAM_STR);
$stmt->bindParam(':release_year',$release_year, PDO::PARAM_INT);
$stmt->bindParam(':color',$color, PDO::PARAM_STR);
$stmt->bindParam(':weight',$weight, PDO::PARAM_STR);
try
{
$stmt->execute();
echo "Submitted, now add picture";
$stmtx=$db->prepare('SELECT product_id FROM product WHERE name=:name AND company=:company');
$stmtx->bindParam(':company',$company, PDO::PARAM_STR);
$stmtx->bindParam(':name',$name, PDO::PARAM_STR);
$stmtx->execute();
$row=$stmtx->fetch(PDO::FETCH_ASSOC);
$x=$row['product_id'];
$stmty=$db->prepare('INSERT INTO price (product_id, usa,uk,india,canada,australia,singapore) VALUES (:x, :usa, :uk, :india, :canada, :australia, :singapore)');
$stmty->bindParam(':x',$x, PDO::PARAM_STR);
$stmty->bindParam(':usa',$usa, PDO::PARAM_STR);
$stmty->bindParam(':uk',$uk, PDO::PARAM_STR);
$stmty->bindParam(':india',$india, PDO::PARAM_STR);
$stmty->bindParam(':canada',$canada, PDO::PARAM_STR);
$stmty->bindParam(':australia',$australia, PDO::PARAM_STR);
$stmty->bindParam(':singapore',$singapore, PDO::PARAM_STR);

$stmty->execute();

?>

<form action="upload_image.php?x=<?php echo $x; ?>" enctype="multipart/form-data" method="post"><input id="file" name="file1" type="file" />
<br>
<input id="file" name="file2" type="file" />
<br> 
<input id="file" name="file3" type="file" />
<br>  
<input name="submit" type="submit" value="Submit" /> 
</form>


<?php
}
catch(PDOException $e){
	echo $e->getMessage();
	exit(); 
}


?>