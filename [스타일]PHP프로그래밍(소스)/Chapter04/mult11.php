<?
	$no = $_POST["no"];
	$o_base = $_POST["o_base"];
	$n_base = $_POST["n_base"];

	$c_no = base_convert($no, $o_base, $n_base);
	echo "* ��ȯ�ϰ��� �ϴ� ���� ($o_base ����) : $no <br>";
	echo "* ��ȯ�� ���� ($n_base ����) : $c_no <br>";

	$r_no = strrev($c_no);
	$length = strlen($r_no);

	$o_no = 0; $i=0;
	while ($i < $length) {
		switch ($r_no[$i]) {
			case 0 : $number = 0; break;
			case 1 : $number = 1; break;
			case 2 : $number = 2; break;
			case 3 : $number = 3; break;
			case 4 : $number = 4; break;
			case 5 : $number = 5; break;
			case 6 : $number = 6; break;
			case 7 : $number = 7; break;
			case 8 : $number = 8; break;
			case 9 : $number = 9; break;
		}

		if ($r_no[$i] == "a" || $r_no[$i] == "A") $number = 10;
		else if ($r_no[$i] == "b" || $r_no[$i] == "B") $number = 11;
		else if ($r_no[$i] == "c" || $r_no[$i] == "C") $number = 12;
		else if ($r_no[$i] == "d" || $r_no[$i] == "D") $number = 13;
		else if ($r_no[$i] == "e" || $r_no[$i] == "E") $number = 14;
		else if ($r_no[$i] == "f" || $r_no[$i] == "F") $number = 15;
	
		$o_no += pow($n_base, $i) * $number;

		$i++;	
	}
	echo "* �ݺ����� �̿��� �ٽ� ���͵� ���� : $o_no <br>";
	echo "<p><a href=\"mult11.html\">�������� ���ư���</a>";
?>