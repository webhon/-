<?
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];

	$x3 = $x1;
	$y3 = $y2;

	$height = abs($y3 - $y1);
	$base = abs($x3 - $x2);

	$area = $base * $height * 0.5;

	echo " �� �� ( $x1 , $y1 ), ( $x2 , $y2 ),  ( $x3 , $y3 ) ���� <br>";
	echo "�̷���� <b>�ﰢ���� ����</b> : <br>";
	
	echo "<p> [ $area ] �Դϴ�.";
?>