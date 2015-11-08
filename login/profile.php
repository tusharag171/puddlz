<?php
session_start();
//header(" location: profile_page.php");
header(" location: ../profile_page.php?uid=".$_SESSION['uid']."");
?>