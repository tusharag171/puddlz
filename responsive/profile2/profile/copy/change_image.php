<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
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
/*    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

*/    }

    $image =$_FILES["file"]["name"];
    $uploadedfile = $_FILES['file']['tmp_name'];


    if ($image) 
    {
        $filename = stripslashes($_FILES['file']['name']);

 $size=filesize($_FILES['file']['tmp_name']);

$uploadedfile = $_FILES['file']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

//echo $src;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=199;
//$newheight=($height/$width)*$newwidth;
$newheight=199;
$tmp=imagecreatetruecolor($newwidth,$newheight);


$newwidth1=60;
//$newheight1=($height/$width)*$newwidth1;
$newheight1=60;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

$ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
$filename = "images_profile/"."1.".$ext;

$filename1 = "images_thumbnail/"."1.".$ext;

imagejpeg($tmp,$filename,80);
imagejpeg($tmp1,$filename1,80);


/* if (file_exists("images_original/" . $_FILES["file"]["name"]))  //IMAGE CAN BE REPLACED, SO CHANGE THIS CONDITION
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {*/
$name= $_FILES["file"]["name"];  //THIS IS FILE NAME
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images_original/" . "1.".$ext);
  //    echo "Stored in: " . "images_original/" . "1.".$ext;

echo "Image uploaded successfully!";
   //   }


imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}

  }
else
  {
  echo "Invalid file";
  }
  

include('profile_page.php');
?>