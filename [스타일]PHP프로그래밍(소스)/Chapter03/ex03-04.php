<?
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];

	$x = $x1 - $x2;
	$y = $y1 - $y2;

	$x *= $x;
	$y *= $y;

	$length = sqrt($x + $y);
	$length = number_format($length,2);

	echo "두 점 ( $x1 , $y1 )와 ( $x2 , $y2 ) 간의 길이는 [ $length ] 입니다.";
?>