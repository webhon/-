<?
	session_start();

	$key = $_POST["key"];

	echo "���ڵ� : ";
	print_r($numbers);
	echo "<br>";

	$flag = 0;
	for ($i=0; $i < sizeof($numbers); $i++) {
		if ($key == $numbers[$i]) {
			$flag = 1;
			break;
		}
	}	
	if ($flag) 
		echo "FOUND!!! [$key] �� ". ($i+1)." ��° ���� ���Դϴ�.<br>";
	else  echo "NOT FOUND!!! [$key]<br>";
?>