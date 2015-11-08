<?php
$up=$_GET['up'];
if($up==1)
{
$result=4;
$result=$result+1;
echo $result;
}
else
{
$result=5;
$result=$result-1;
echo $result;
}

?>