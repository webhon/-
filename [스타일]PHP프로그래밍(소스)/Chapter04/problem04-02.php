<?
	$collage = $_POST["collage"];
	$dept = $_POST["dept"];

	$code;
	switch ($collage) {
		case "�ι�" :
			$code .= 1;
				switch ($dept) {
					case "����" : $code .= 1;
						break;
					case "����" : $code .= 2;
						break;
					case "��ȸ" : $code .= 3;
						break;
				}
			break;
		case "����" :
			$code .= 2;
				switch ($dept) {
					case "��" : $code .= 1;
						break;
					case "����" : $code .= 2;
						break;
					case "���ȫ��" : $code .= 3;
						break;
				}
			break;
		case "���" :
			$code .= 3;
				switch ($dept) {
					case "����" : $code .= 1;
						break;
					case "����" : $code .= 2;
						break;
					case "��ǻ��" : $code .= 3;
						break;
				}
			break;
	}

	echo "����� $collage ����, $dept �а� �Դϴ�. <br>
	����, �ڵ�� [$code] �Դϴ�. <br>";
?>