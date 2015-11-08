<?php
$con=mysqli_connect("puddlzcom1.ipagemysql.com","puddlz","Anhad@123","puddlz");
//connection established
$name=$_POST['name'];
$email=$_POST['email'];
echo $_POST['userfile'];
if(!isset($_FILES["userfile"]))
{
echo "file not inserted";
}


?>
