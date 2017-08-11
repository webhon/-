<html>
	<head><title>프로그램 6-9</title></head>
	<body>
<?
	$dirname = "C:/APM_Setup/htdocs/newdir";
	if (is_dir($dirname)) {
		rmdir($dirname);
		echo "디렉터리 [$dirname]를 삭제하였습니다.";
	}   
	else 
		echo "디렉터리 [$dirname]가 존재하지 않습니다.";
?>
	</body>
</html>