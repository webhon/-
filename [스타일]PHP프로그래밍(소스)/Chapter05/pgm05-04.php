<?
	function is_leap_year ($y) {
		if (($y % 4==0 && $y % 100 != 0) || $y % 400==0) return 1;
		else return 0;
	}

	$year = $_POST["year"];
	$result = is_leap_year($year);

	if ($result) echo "[$year]���� �����Դϴ�. <br>";
	else echo "[$year]���� ������ �ƴմϴ�. <br>";
?>