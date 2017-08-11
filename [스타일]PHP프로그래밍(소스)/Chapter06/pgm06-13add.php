<?
	include("pgm06-12.inc");

	$name = $_POST["name"];
	$msg = $_POST["msg"];
	$passwd = $_POST["passwd"];

	$input = array($name, $msg, md5($passwd));
	$msg = join(":", $input)."\r\n";

	$fp = fopen($guestbook, "a");
	fputs($fp, $msg);
	fclose($fp);

	echo "<meta http-equiv=\"refresh\" content=\"0;url=pgm06-12.php\">";
?>