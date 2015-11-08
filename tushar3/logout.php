<?php
session_start();
if(isset($_COOKIE['id']) && isset($_COOKIE['username']) && isset($_COOKIE['password'])&& isset($_COOKIE['loginstatus'])){
	setcookie("id", '', strtotime('-30 days'), '/');
	setcookie("username", '', strtotime('-30 days'), '/');
	setcookie("password", '', strtotime('-30 days'), '/');
setcookie("loginstatus", '', strtotime('-30 days'), '/');
}
session_destroy();
header("location: ../index.php");