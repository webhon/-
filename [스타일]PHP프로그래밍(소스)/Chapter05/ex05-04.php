<?
	$info = array($_POST["no"], $_POST["email"], $_POST["hpage"]);
	$string = join("*", $info) . "\n";
	$fp=fopen("info.txt", "a");
	fputs($fp, $string);
	fclose($fp);
	echo "���Ϸ� �Է��� �Ϸ�Ǿ����ϴ�.";
?>