<?
	session_start();

	echo "<p><b>���α׷� 10-6 �Դϴ�.</b><br>\n";

	$_SESSION["chapter"] = 10;
	$_SESSION["today"] = date('Y-m-d');

	echo "<a href=\"pgm10-07.php\">���α׷� 10-7 ȣ��</a>\n";
?>