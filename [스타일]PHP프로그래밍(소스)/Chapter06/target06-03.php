<html>
	<head><title>��ǥ���� 6-3</title></head>
	<body>

<?
	$pdirname = $_POST["pdirname"];
	$ndirname = $_POST["ndirname"];
	$filename = $_POST["filename"];

	$ndirname = $pdirname."/".$ndirname;
	mkdir ($ndirname);
	echo "[$ndirname] ���͸��� �����Ǿ����ϴ�. <br>";
	print_dir("Before", $ndirname);

	chdir($ndirname);
	$newfile = substr(strrchr($filename, "\\"), 1);

	copy($filename, $newfile); 
	unlink($filename);
	echo "[$filename] ������ �̵��Ǿ����ϴ�. <br>";

	print_dir("After", $ndirname);

	function print_dir($msg, $dirname) {
		$darray = scandir($dirname);
		echo "<h3>[$msg]</h3> <br>";
		foreach ($darray as $file) echo "[$file] <br>";
		echo "<hr>";
   }
?>
	</body>
</html>