<?
	session_start();

	$i=1;
	foreach($students as $student) {
		echo "$i : $student<br>";
		$i++;
	}
?>