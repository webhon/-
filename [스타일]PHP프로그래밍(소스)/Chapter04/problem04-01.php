<?
	$year = $_POST["year"];

	$lprice = 0;
	if ($year == 1) $lprice = number_format(1000);
	if ($year == 2) $lprice = number_format(1200);
	if ($year == 3) $lprice = number_format(1400);
	if ($year == 4) $lprice = number_format(1600);

	if ($lprice != 0) 
	echo "����� $year �г��Դϴ�.<br>
	����, 1ȸ �޽ķ�� [$lprice] �� �Դϴ�.<br>";
?>