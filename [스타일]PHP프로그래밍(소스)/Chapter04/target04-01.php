<?
	$age = $_POST["age"];
	$donation = $_POST["donation"];

	if ($age >= 65) {
		$milage = $donation * 0.1;		
	}
	else {
		if ($donation >= 100000) $milage = $donation * 0.07;
		else $milage = $donation * 0.05;
	}

	$donation = number_format($donation);
	$milage = number_format($milage);

	echo "����� ���� $age ���̰� ��αݾ��� $donation ���Դϴ�. <br>
	����, ���� ������ ���ϸ����� [$milage] �Դϴ�. <br>";
?>