<?
	$no = $_POST["no"];

	echo "<table border=1>\n";
	for ($i=1; $i <= $no; $i++) {
		echo "<tr bgcolor=\"#eeeeee\">";
		for ($j=1; $j <= $i; $j++) echo "<td align=\"center\"> $j </td>\n";
			for ($j=$i+1; $j <= $no; $j++) 
				echo "<td align=\"center\"> &nbsp; </td>\n";
		echo "</tr>\n";
	}
	echo "<table>\n";
?>