<?
	$kor = $_POST["kor"];
	$kcredit = $_POST["kcredit"];
	$math = $_POST["math"];
	$mcredit = $_POST["mcredit"];
	$com = $_POST["com"];
	$ccredit = $_POST["ccredit"];

	$tcredit = $kcredit + $mcredit + $ccredit;
	$total = $kor * $kcredit + $math * $mcredit + $com * $ccredit;
	$gpa = number_format($total / $tcredit, 2);

	echo "<p> ������ [ $total ] �Դϴ�.";
	echo " ����, �� ������ [ $tcredit ] �Դϴ�.";
	echo "<p> GPA�� [ $gpa ] �Դϴ�.";
?>