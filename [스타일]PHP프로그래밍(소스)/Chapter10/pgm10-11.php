<?
	session_start();

	session_unregister("id");
	echo "Session ID : ".session_id()."<br>";
	echo "\$id = $id<br>";
	echo "\$passwd = $passwd<br>";
?>