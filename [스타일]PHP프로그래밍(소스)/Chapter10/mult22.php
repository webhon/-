<?
	session_start();

	if (isset($_POST["tablename"])) {
		$tablename = $_SESSION["tablename"] = $_POST["tablename"];
		$no = $_SESSION["no"] = $_POST["no"];
	}
	else {
		$tablename = $_SESSION["tablename"];
		$no = $_SESSION["no"];
	}

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "select * from $tablename";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	
	$Nofields = mysql_num_fields($result)."<br>";
	echo("<table border=1 cellpadding=3 align=\"center\">\n");
	echo("<tr bgcolor=\"#cccccc\">");
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo("<th>$field_name</th>\n");
	}
	echo("</tr>\n");

	while($row = mysql_fetch_row($result)) {
		echo("<tr>\n");
		for ($i = 0; $i < $Nofields; $i++) {
			echo("<td align=\"center\">$row[$i]</td>\n");
		}
		echo("</tr>\n");
	}
	echo("</table>");
	mysql_close($dbconnect);
?>

<p>
<form action="mult22search.php" method="POST">
	���ǽ� :<p>
<? 
	for ($i=0; $i < $no; $i++) { 
		echo "<input type=\"text\" name=\"attrname[$i]\" size=10>&nbsp; &nbsp;";
		echo "<select name=\"op[$i]\">";
		echo "<option value=\"=\">=</option>";
		echo "<option value=\">=\">>=</option>";
		echo "<option value=\"<=\"><=</option>";
		echo "<option value=\">\">></option>";
		echo "<option value=\"<\"><</option>";
		echo "<option value=\"<>\"><></option>";
		echo "</select>";
		echo "<input type=\"text\" name=\"attrval[$i]\" size=10>&nbsp; &nbsp;";
		echo " / &nbsp; ";
	}
	echo "<input type=\"submit\" value=\"�˻��ϱ�\">";
?>
</form>