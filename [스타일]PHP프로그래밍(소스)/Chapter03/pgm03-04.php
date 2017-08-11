<?
	$inch = $_GET["inch"];
	$cm = $_GET["cm"];
	if ($inch != "") {
		$n_cm = $inch * 2.54;
		echo "$inch 인치는 $n_cm cm이다. <br>";
	}
	if ($cm != "") {
		$n_inch = $cm / 2.54;
		echo "$cm cm는 $n_inch 인치이다. <br>";
	}
?>