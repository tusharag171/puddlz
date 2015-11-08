<?php

require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '590971444321901',
		'secret' => '6ad57faee739ee4c17add9c7a94a060d',
		'cookie' => true,
		'allowSignedRequest' => false
	));
	
session_start();

$logoutUrl = $facebook->getLogoutUrl(array( 'next' => 'http://www.puddlz.com/tushar3/fb_register.php' ));
session_destroy();		
			header("Location:  $logoutUrl");