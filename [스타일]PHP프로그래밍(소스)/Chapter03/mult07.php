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

	echo " 세 점 ( $x1 , $y1 ), ( $x2 , $y2 ),  ( $x3 , $y3 ) 으로 <br>";
	echo "이루어진 <b>삼각형의 면적</b> : <br>";
	
	echo "<p> [ $area ] 입니다.";
?>