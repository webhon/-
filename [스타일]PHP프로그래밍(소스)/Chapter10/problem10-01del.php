<?
	session_start();
	$no = $_GET["no"];
	$tablename = $_SESSION["tablename"];

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
	
	$query = "select * from $tablename";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	mysql_close($dbconnect);
	
	$i=0; 
	while ($i <= $no) {$row = mysql_fetch_row($result); $i++; }

	$Nofields = mysql_num_fields($result)."<br>";
	echo "<table border=1 cellpadding=3 align=\"center\">\n";

	for($i=0; $i < $Nofields; $i++) {
		echo "<tr bgcolor=\"#cccccc\">";
		$field_name = mysql_field_name($result, $i);
		echo "<td>$field_name</td>\n";
		echo "<td align=\"center\"> $row[$i]</td>";
		echo "</tr>";
	}
	echo "</table>\n";

	$query = "delete from $tablename where ";

	for($i=0; $i < $Nofields-1; $i++) {
		$field_name = mysql_field_name($result, $i);
		$query .= ($field_name."= '". $row[$i]."' and " );
	}
	$field_name = mysql_field_name($result, $i);
	$query .= ($field_name."= '". $row[$i]."'" );

	echo "[ $query ]<br>";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
	
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	mysql_close($dbconnect);

	echo "<p>Ʃ���� �����Ǿ����ϴ�.";    
?>
<p>
<a href="problem10-01.php">��� �����ϱ�</a>