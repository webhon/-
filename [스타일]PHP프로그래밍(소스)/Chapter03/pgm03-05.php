<h2>�ֹ� ���</h2>
<?

	$ballpen = $_POST["ballpen"];
	$note = $_POST["note"];
	$eraser = $_POST["eraser"];
  
	echo "<p>�ֹ��Ͻ� ������ ������ �����ϴ�.<p>";

	$totalqty = $ballpen + $note + $eraser;   
	echo "�ֹ� ��ǰ �� ���� : ".$totalqty. "<br>";

	define("PENPRICE", 300);
	define("NOTEPRICE", 1000);
	define("ERASERPRICE", 500);

	$totalamount = $ballpen * PENPRICE;
	$totalamount += $note * NOTEPRICE;
	$totalamount += $eraser * ERASERPRICE;

	echo "<p>�� �ݾ� : <b>".$totalamount . "</b>";
	echo "<p>�ֹ��ۼ� �Ϸ�"; 
?>