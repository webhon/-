<html>
	<head><title>목표문제 2-4</title></head>
	<body>
<?
	$rand_numbers = array(rand()%100, rand()%100, rand()%100);
	$total = $rand_numbers[0] + $rand_numbers[1] + $rand_numbers[2];
?>
	<table border=1 cellpadding=5>
	<tr bgcolor="#cccccc">
	<th> 난수 </th>
	</tr>
<?
	echo "<tr><td align=\"center\">$rand_numbers[0]</td></tr>";
	echo "<tr><td align=\"center\">$rand_numbers[1]</td></tr>";
	echo "<tr><td align=\"center\">$rand_numbers[2]</td></tr>";
	echo "<tr bgcolor=\"#cccccc\"><td align=\"center\">$total</td></tr>";
?>
	</body>
</html>