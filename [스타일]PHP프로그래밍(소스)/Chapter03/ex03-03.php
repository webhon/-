<?
	$cno = $_POST["cno"];
	$sno = $_POST["sno"];
	$price = $_POST["price"];

	$ctotal = ($cno - $sno) * $price ; 
	$stotal = $sno * ($price * 0.7) ;
	$total = $ctotal + $stotal ;
	$total = number_format($total);

	echo "����� �̹� �� �޽ķ�� �� [ $total ]�� �Դϴ�. <br>" ;
	echo "<br><hr><br>";
	echo "<ul>\n";
	echo "<li>���� : [" . number_format($ctotal) . "] �� �Դϴ�. <br>" ;
	echo "<li>����� : [" . number_format($stotal) . "] �� �Դϴ�. <br>" ;
	echo "</ul>\n" ;
	echo "<hr>";
?>