<?
	$inch = $_GET["inch"];
	$cm = $_GET["cm"];
	if ($inch != "") {
		$n_cm = $inch * 2.54;
		echo "$inch ��ġ�� $n_cm cm�̴�. <br>";
	}
	if ($cm != "") {
		$n_inch = $cm / 2.54;
		echo "$cm cm�� $n_inch ��ġ�̴�. <br>";
	}
?>