<html>
	<head><title>목표문제 6-1</title></head>
	<body>
<?
	$filename = ".\input.txt";
	if (file_exists($filename)) {
		if ($fp = fopen($filename, "r")) {
			echo "파일 [$filename]을 개방하였습니다."; 
			fclose($fp);
		}
		else {
			echo "[$filename] 파일은 존재하지 않습니다.";
		}
	}
	else {
		echo "[$filename] 파일은 존재하지 않습니다.";
	}
?>
	</body>
</html>