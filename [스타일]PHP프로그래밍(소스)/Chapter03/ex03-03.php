<?
	$cno = $_POST["cno"];
	$sno = $_POST["sno"];
	$price = $_POST["price"];

	$ctotal = ($cno - $sno) * $price ; 
	$stotal = $sno * ($price * 0.7) ;
	$total = $ctotal + $stotal ;
	$total = number_format($total);

	echo "당신의 이번 달 급식료는 총 [ $total ]원 입니다. <br>" ;
	echo "<br><hr><br>";
	echo "<ul>\n";
	echo "<li>평일 : [" . number_format($ctotal) . "] 원 입니다. <br>" ;
	echo "<li>토요일 : [" . number_format($stotal) . "] 원 입니다. <br>" ;
	echo "</ul>\n" ;
	echo "<hr>";
?>