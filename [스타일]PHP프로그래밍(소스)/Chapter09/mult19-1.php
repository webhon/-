<?
	$tablename = $_POST["tablename"];
	$attrno = $_POST["attrno"];

	echo "<form action=\"mult19-2.php?tn=$tablename&no=$attrno\" method=\"POST\">\n";
	echo "<table border=1 cellpadding=3>\n";
	echo "<tr>
	<th>����</th>
	<th>�� �̸�</th>
	<th>�� Ÿ��</th>
	<th>����</th>
	<th>��Ÿ</th>
	</tr>\n";
	for ($i=0; $i<$attrno; $i++) {
		echo "<tr>\n";
		echo "<td align=\"center\">".($i+1)."</td>\n";
		echo "<td align=\"center\">";
		echo "<input type=\"text\" name=\"attr[$i][0]\" size=20>";
		echo "</td>\n";
		echo "<td align=\"center\">";
		echo "<input type=\"text\" name=\"attr[$i][1]\" size=10>";
		echo "</td>\n";
		echo "<td align=\"center\">";
		echo "<input type=\"text\" name=\"attr[$i][2]\" size=5>";
		echo "</td>\n";
		echo "<td align=\"center\">";
		echo "<input type=\"text\" name=\"attr[$i][3]\" size=20>";
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "<tr><td align=\"center\" colspan=5>\n";
	echo "<input type=\"submit\" value=\"����\">";
	echo "</td></tr>\n";
	echo "</table>\n";
	echo "</form>\n";
?>