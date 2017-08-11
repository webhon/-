<h2>주문 결과</h2>
<?

	$ballpen = $_POST["ballpen"];
	$note = $_POST["note"];
	$eraser = $_POST["eraser"];
  
	echo "<p>주문하신 내역은 다음과 같습니다.<p>";

	$totalqty = $ballpen + $note + $eraser;   
	echo "주문 제품 총 수량 : ".$totalqty. "<br>";

	define("PENPRICE", 300);
	define("NOTEPRICE", 1000);
	define("ERASERPRICE", 500);

	$totalamount = $ballpen * PENPRICE;
	$totalamount += $note * NOTEPRICE;
	$totalamount += $eraser * ERASERPRICE;

	echo "<p>총 금액 : <b>".$totalamount . "</b>";
	echo "<p>주문작성 완료"; 
?>