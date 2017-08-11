<?
	session_start();

	session_destroy();
	echo "Session ID : ".session_id()."<br>";
	echo "\$id = $id<br>";
	echo "\$passwd = $passwd<br>";
?>