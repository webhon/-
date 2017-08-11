<html>
	<head><title>프로그램 2-8</title></head>
	<body>
<?
	$arr = array("key1" => array(6 => 5, 13 => 9, "a" => 42));

	echo $arr["key1"][6]."<br>";    // 5
	echo $arr["key1"][13]."<br>";   // 9
	echo $arr["key1"]["a"]."<br>";  // 42
?> 
	</body>
</html>