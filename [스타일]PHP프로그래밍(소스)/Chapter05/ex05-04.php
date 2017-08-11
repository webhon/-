<?
	$info = array($_POST["no"], $_POST["email"], $_POST["hpage"]);
	$string = join("*", $info) . "\n";
	$fp=fopen("info.txt", "a");
	fputs($fp, $string);
	fclose($fp);
	echo "파일로 입력이 완료되었습니다.";
?>