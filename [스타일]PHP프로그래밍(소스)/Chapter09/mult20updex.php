<?
	$tablename = $_GET["tn"];
	$newrow = $_POST["newrow"];

	$query = "select * from $tablename";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$query = "select * from $tablename";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	mysql_close($dbconnect);

	$query = "update $tablename SET ";

	$Nofields = mysql_num_fields($result);
	$fn = mysql_field_name($result, 0);
	$query .= ( $fn."= '". $newrow[0]."'" );
	for ($i = 1; $i < $Nofields; $i++) {
		$query .= ", ";
		$field_name = mysql_field_name($result, $i);
		$query .= ( $field_name."= '". $newrow[$i]. "'" );
	}
	$query .= ( " where  $fn = '".$newrow[0]."' " );
	echo " [ $query ] ";

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "<p>������ �Ǿ����ϴ�.<p>";
	mysql_close($dbconnect);
?>
<p>
<a href="mult20.html">������ ���۾� �޴��� ���ư���</a>