<?php 
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '590971444321901',
		'secret' => '6ad57faee739ee4c17add9c7a94a060d'
	));
?>
<html>
<body>
<?php
	$user = $facebook->getUser();
	
		$user_graph = $facebook->api('/me/friends/');
	$user_grap = $facebook->api('/me');
		echo '<h1>Hello ',$user_grap['first_name'],'</h1>';

		echo '<ul class="lgrid group">';
		foreach ($user_graph['data'] as $key => $value) {
			echo '<li>';
			echo '<a href="http://facebook.com/', $value['id'], '" target="_top">';
			echo '<img class="friendthumb" src="https://graph.facebook.com/', $value['id'],'/picture" alt="',$value['name'],'"/>';
			echo "</a>";
			echo "<h2>", $value['name'],'</h2>';
			echo '</li>';
			
		} //iterate through friends graph
		echo '</ul>';
	
		//print logout link
		echo '<p><a href="fb_logout.php">logout</a></p>';
?>
</body>
</html>