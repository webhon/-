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

	echo "<p> 총점은 [ $total ] 입니다.";
	echo " 또한, 총 학점은 [ $tcredit ] 입니다.";
	echo "<p> GPA는 [ $gpa ] 입니다.";
?>