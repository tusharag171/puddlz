<?php
$search_string=$_REQUEST['x'];
$search_string=preg_replace('/spsp/',' ',$search_string);
echo $search_string;
?>