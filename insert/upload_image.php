<?php

$x=$_GET['x'];
mkdir($x);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file1"]["name"]);
$extension = end($temp);

if ((($_FILES["file1"]["type"] == "image/gif")
|| ($_FILES["file1"]["type"] == "image/jpeg")
|| ($_FILES["file1"]["type"] == "image/jpg")
|| ($_FILES["file1"]["type"] == "image/pjpeg")
|| ($_FILES["file1"]["type"] == "image/x-png")
|| ($_FILES["file1"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))

  {

    $image =$_FILES["file1"]["name"];
    $uploadedfile = $_FILES['file1']['tmp_name'];


    if ($image) 
    {
        $filename = stripslashes($_FILES['file1']['name']);

 $size=filesize($_FILES['file1']['tmp_name']);

$uploadedfile = $_FILES['file1']['tmp_name'];


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


//echo $src;

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



//$filename = $x."/1.jpg";
//$filename1 = $x."/4.jpg";
$ext = pathinfo($_FILES["file1"]["name"], PATHINFO_EXTENSION);    //get extension of uploaded file and save in the same format
$filename = $x."/1.".$ext;
$filename1 = $x."/4.".$ext;


if ($extension == 'jpg') {
    imagejpeg($tmp, $filename,99);
    imagejpeg($tmp1, $filename1,99);
} else
if ($extension == 'jpeg') {
    imagejpeg($tmp, $filename,99);
    imagejpeg($tmp1, $filename1,99);
} else
if ($extension == 'png') {
    imagepng($tmp,$filename,9);
    imagepng($tmp1,$filename1,9);
} else
if ($extension == 'gif') {
    imagegif($tmp, $filename,99);
   imagegif($tmp1, $filename1,99);
}

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}

  }
else
  {
echo "INCORRECT IMAGE";
  }

  
  /******************************************************/
  
  
						//FILE2

	//Set all variables to Null. Starting new file, so don't carry anything over from previous file 
	$temp='';
	$extension='';
	$image='';
	$uploadedfile='';
	$filename='';
	$size='';
	$src='';
	$tmp='';
	$tmp1='';
	$newwidth='';
	$newheight='';
	$newwidth1='';
	$newheight1='';
	$ext='';
	$filename='';
	$filename1='';



	$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file2"]["name"]);
$extension = end($temp);

if ((($_FILES["file2"]["type"] == "image/gif")
|| ($_FILES["file2"]["type"] == "image/jpeg")
|| ($_FILES["file2"]["type"] == "image/jpg")
|| ($_FILES["file2"]["type"] == "image/pjpeg")
|| ($_FILES["file2"]["type"] == "image/x-png")
|| ($_FILES["file2"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))

  {

    $image =$_FILES["file2"]["name"];
    $uploadedfile = $_FILES['file2']['tmp_name'];


    if ($image) 
    {
        $filename = stripslashes($_FILES['file2']['name']);
		$size=filesize($_FILES['file2']['tmp_name']);
		$uploadedfile = $_FILES['file2']['tmp_name'];


	if ($extension == 'jpg') {
    $src = imagecreatefromjpeg("$uploadedfile");
	} 
	else
	if ($extension == 'jpeg') {
    $src = imagecreatefromjpeg("$uploadedfile");
	} 
	else
	if ($extension == 'png') {
    $src = imagecreatefrompng("$uploadedfile");
	} 
	else
	if ($extension == 'gif') {
    $src = imagecreatefromgif("$uploadedfile");
	}


//echo $src;

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



//$filename = $x."/1.jpg";
//$filename1 = $x."/4.jpg";
$ext = pathinfo($_FILES["file2"]["name"], PATHINFO_EXTENSION);    //get extension of uploaded file and save in the same format
$filename = $x."/2.".$ext;
$filename1 = $x."/5.".$ext;


if ($extension == 'jpg') {
    imagejpeg($tmp, $filename,99);
    imagejpeg($tmp1, $filename1,99);
} else
if ($extension == 'jpeg') {
    imagejpeg($tmp, $filename,99);
    imagejpeg($tmp1, $filename1,99);
} else
if ($extension == 'png') {
    imagepng($tmp,$filename,9);
    imagepng($tmp1,$filename1,9);
} else
if ($extension == 'gif') {
    imagegif($tmp, $filename,99);
   imagegif($tmp1, $filename1,99);
}

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}

  }
else
  {
echo "INCORRECT IMAGE";
  }


  
  
    /******************************************************/

	
	
						//FILE 3



	//Set all variables to Null. Starting new file, so don't carry anything over from previous file 
	$temp='';
	$extension='';
	$image='';
	$uploadedfile='';
	$filename='';
	$size='';
	$src='';
	$tmp='';
	$tmp1='';
	$newwidth='';
	$newheight='';
	$newwidth1='';
	$newheight1='';
	$ext='';
	$filename='';
	$filename1='';



	$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file3"]["name"]);
$extension = end($temp);

if ((($_FILES["file3"]["type"] == "image/gif")
|| ($_FILES["file3"]["type"] == "image/jpeg")
|| ($_FILES["file3"]["type"] == "image/jpg")
|| ($_FILES["file3"]["type"] == "image/pjpeg")
|| ($_FILES["file3"]["type"] == "image/x-png")
|| ($_FILES["file3"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))

  {

    $image =$_FILES["file3"]["name"];
    $uploadedfile = $_FILES['file3']['tmp_name'];


    if ($image) 
    {
        $filename = stripslashes($_FILES['file3']['name']);
		$size=filesize($_FILES['file3']['tmp_name']);
		$uploadedfile = $_FILES['file3']['tmp_name'];


	if ($extension == 'jpg') {
    $src = imagecreatefromjpeg("$uploadedfile");
	} 
	else
	if ($extension == 'jpeg') {
    $src = imagecreatefromjpeg("$uploadedfile");
	} 
	else
	if ($extension == 'png') {
    $src = imagecreatefrompng("$uploadedfile");
	} 
	else
	if ($extension == 'gif') {
    $src = imagecreatefromgif("$uploadedfile");
	}


//echo $src;

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


$ext = pathinfo($_FILES["file3"]["name"], PATHINFO_EXTENSION);    //get extension of uploaded file and save in the same format
$filename = $x."/3.".$ext;
$filename1 = $x."/6.".$ext;


if ($extension == 'jpg') {
    imagejpeg($tmp, $filename,99);
    imagejpeg($tmp1, $filename1,99);
} else
if ($extension == 'jpeg') {
    imagejpeg($tmp, $filename,99);
    imagejpeg($tmp1, $filename1,99);
} else
if ($extension == 'png') {
    imagepng($tmp,$filename,9);
    imagepng($tmp1,$filename1,9);
} else
if ($extension == 'gif') {
    imagegif($tmp, $filename,99);
   imagegif($tmp1, $filename1,99);
}

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}

  }
else
  {
echo "INCORRECT IMAGE";
  }

  
?>