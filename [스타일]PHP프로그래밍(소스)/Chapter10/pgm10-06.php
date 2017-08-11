<?
	session_start();

	echo "<p><b>프로그램 10-6 입니다.</b><br>\n";

	$_SESSION["chapter"] = 10;
	$_SESSION["today"] = date('Y-m-d');

	echo "<a href=\"pgm10-07.php\">프로그램 10-7 호출</a>\n";
?>