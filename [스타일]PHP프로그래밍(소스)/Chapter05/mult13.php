<?
	$number = $_POST["number"];

	for ($i=0; $i < 10; $i++)
	$numbers[$i] = rand() % 10;

	echo "Array::";
	print_r($numbers);
	echo "<br> ã�� ���� : $number<br>";
	$key = array_search($number, $numbers);

	echo "<br><hr><br>";
	if ($key) echo "\$key = $key <br>";
	else "ã�� Ű�� �����ϴ�. ";
?>