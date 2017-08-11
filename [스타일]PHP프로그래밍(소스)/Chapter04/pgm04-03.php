<?
	$no = $_POST["no"];
	$gpa = $_POST["gpa"];

	$totalmilage = 10;

	if ($no < 15) $totalmilage += 0;
	else if ($no < 18) $totalmilage += 3;
	else if ($no < 21) $totalmilage += 6;
	else $totalmilage += 8;

	if ($gpa < 2.0) $totalmilage += 0;
	else if ($gpa < 3.0) $totalmilage += 5;
	else if ($gpa < 4.0) $totalmilage += 10;
	else $totalmilage += 12;

	echo "당신의 마일리지 합계는 <b> $totalmilage </b> 입니다. <br>";
?>