<?php
$ext_id= 1283959150;

$user_graph = $facebook->api('/me/friends/');
//		echo '<h1>Hello ',$user_graph['first_name'],'</h1>';
/*
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
*/		

?>