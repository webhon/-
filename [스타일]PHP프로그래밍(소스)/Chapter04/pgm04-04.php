<?
	$year = $_POST["year"];
	$no = (int)$_POST["no"];

	switch ($year) {
		case 1 : $floor = 3; break;
		case 2 : $floor = 4; break;
		case 3 :
		case 4 : 
			$floor = 5;
			break;
		default : $floor = 0;
	}

	$no %= 2;

	if ($floor == 0) {
		echo "����� �г��� �߸� �Է��ϼ̽��ϴ�. �ٽ� �Է��Ͻʽÿ�.";
	}
	else {
		switch ($no) {
			case 0 :
				echo "����� ���������� $floor ���� ¦�� ȣ���� ����� �� �ֽ��ϴ�.";
				break;
			case 1 :
				echo "����� ���������� $floor ���� Ȧ�� ȣ���� ����� �� �ֽ��ϴ�.";
				break;
		}
	}
?>