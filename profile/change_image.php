<?php
session_start();

$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "PNG", "GIF");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
  //  echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
/*      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
*/    

if( $_FILES["file"]["size"] < 6291456 ) //Size should be less than 6MB
	 {
    $image =$_FILES["file"]["name"];
    $uploadedfile = $_FILES['file']['tmp_name'];

    if ($image) 
    {
        $filename = stripslashes($_FILES['file']['name']);
 $size=filesize($_FILES['file']['tmp_name']);
$uploadedfile = $_FILES['file']['tmp_name'];

if ($extension == 'jpg') {
    $src = imagecreatefromjpeg("$uploadedfile");
} else
if ($extension == 'jpeg') {
    $src = imagecreatefromjpeg("$uploadedfile");
} else
if ($extension == 'png') {
    $src = imagecreatefrompng("$uploadedfile");
} else
if ($extension == 'gif') {
    $src = imagecreatefromgif("$uploadedfile");
}

list($width,$height)=getimagesize($uploadedfile);

$newwidth=200;
//$newheight=($height/$width)*$newwidth;
$newheight=200;
$tmp=imagecreatetruecolor($newwidth,$newheight);


$newwidth1=60;
//$newheight1=($height/$width)*$newwidth1;
$newheight1=60;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

$filesa = glob('../members/'.   $_SESSION['uid']. '/*'); // get all file names
foreach($filesa as $filea){ // iterate files
  if(is_file($filea))
{
 $ext = pathinfo($filea, PATHINFO_EXTENSION);
if(    strcmp($ext, "jpg")==0   ||      strcmp($ext, "jpeg")==0   ||     strcmp($ext, "png")==0   ||    strcmp($ext, "gif")==0    ||      strcmp($ext, "JPEG")==0    ||      strcmp($ext, "JPG")==0    ||      strcmp($ext, "PNG")==0    ||      strcmp($ext, "GIF")==0 )
   unlink($filea); // delete file

}

}


$ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
$filename = "../members/".$_SESSION['uid'] . "/" .  $_SESSION['uid'] . ".".$ext;

$filename1 = "../members/".$_SESSION['uid'] . "/" .  $_SESSION['uid'] . "2.".$ext;


if ($extension == 'jpg') {
    imagejpeg($tmp, $filename,90);
    imagejpeg($tmp1, $filename1,90);
} else
if ($extension == 'jpeg') {
    imagejpeg($tmp, $filename,90);
    imagejpeg($tmp1, $filename1,90);
} else
if ($extension == 'png') {
    imagepng($tmp,$filename,9);
    imagepng($tmp1,$filename1,9);
} else
if ($extension == 'gif') {
    imagegif($tmp, $filename,90);
   imagegif($tmp1, $filename1,90);
}

/* if (file_exists("images_original/" . $_FILES["file"]["name"]))  //IMAGE CAN BE REPLACED, SO CHANGE THIS CONDITION
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {*/
$name= $_FILES["file"]["name"];  //THIS IS FILE NAME

//Delete the files with same name first- they may have different extensions

$filesa = glob('images_original/*'); // get all file names
foreach($filesa as $filea){ // iterate files
  if(is_file($filea))
    unlink($filea); // delete file
}

/*      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images_original/" . "1.".$ext);
*/

header(" location: ../profile_page.php?uid=".$_SESSION['uid']."");
   //   }


imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}

}

else                       //Size is greater than 7MB
{
header('Location:../incorrect_image_size.php');
}

}
  }
else
  {
header('Location:../incorrect_image_format.php');
  }

?>