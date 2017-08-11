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

	echo "대여 정보는 저장되었습니다.<br>";
	echo "당신이 대여한 도서는 [$book]이며 반납일은 [$rdate] 입니다.<br>";
?>
<a href="pgm05-19.html">계속 입력</a>