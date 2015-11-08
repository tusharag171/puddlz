<?php

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF","JPEG","JPG","PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

/* if ($_FILES["file"]["error"] > 0)
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
else
echo "Size is ". $_FILES["file"]["size"];

echo "Size is ". $_FILES["file"]["size"];

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts) 
&& $_FILES["file"]["size"] < 7340032 )

echo "<br>All is well.";


else
echo "<br>Size is larger";
*/

echo "File type:". $_FILES["file"]["type"] ;
echo "<br> Extension is  ".$extension;

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
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
else{ 

 if( $_FILES["file"]["size"] < 7340032  ) 
  {
//header(" location: correct_image.php");
echo "image correct";
}

else  
{
//header('Location:incorrect_image_size.php');
echo "size is wrong.";
}
    }
  }
else
  {
//header('Location:incorrect_image_format.php');
echo "format wrong"; 
 }


?>