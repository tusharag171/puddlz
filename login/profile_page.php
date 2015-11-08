<?php

session_start();
echo $_SESSION['uid'];
echo $_SESSION['username'];
?>

<html>
<a href="logout.php">Logout</a>
</html>