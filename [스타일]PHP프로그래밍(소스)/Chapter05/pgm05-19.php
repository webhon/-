<?
	$no = $_POST["no"];
	$name = $_POST["name"];
	$book = $_POST["book"];
	$publisher = $_POST["publisher"];

	$bdate = date('Y-m-d');
	$rdate = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")+7, date("Y")));

	$str = sprintf("%s:%-8s:%-40s:%-20s:%s:%s\n", $no, $name, $book, $publisher, $bdate, $rdate);

	$fp = fopen("book.txt", "a");
	fputs($fp, $str);
	fclose($fp);

	echo "�뿩 ������ ����Ǿ����ϴ�.<br>";
	echo "����� �뿩�� ������ [$book]�̸� �ݳ����� [$rdate] �Դϴ�.<br>";
?>
<a href="pgm05-19.html">��� �Է�</a>