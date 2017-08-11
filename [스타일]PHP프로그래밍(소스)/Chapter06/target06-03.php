<html>
	<head><title>목표문제 6-3</title></head>
	<body>

<?
	$pdirname = $_POST["pdirname"];
	$ndirname = $_POST["ndirname"];
	$filename = $_POST["filename"];

	$ndirname = $pdirname."/".$ndirname;
	mkdir ($ndirname);
	echo "[$ndirname] 디렉터리가 생성되었습니다. <br>";
	print_dir("Before", $ndirname);

	chdir($ndirname);
	$newfile = substr(strrchr($filename, "\\"), 1);

	copy($filename, $newfile); 
	unlink($filename);
	echo "[$filename] 파일이 이동되었습니다. <br>";

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