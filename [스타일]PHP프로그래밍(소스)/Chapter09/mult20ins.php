<?
	$tablename = $_GET["tn"]; 
	$newrow = $_POST["newrow"];
	$query = "insert into $tablename values (";

	if (gettype($newrow[0]) == string) {
		$query .= ( "'".$newrow[0]."'");
	}
	else 	$query .=  $newrow[0];
	
	for	($i=1; $i < sizeof($newrow); $i++) {
		$query .= ", ";
		if (gettype($newrow[$i]) == string) {
			$query .= ( "'".$newrow[$i]."'");
		}
		else if ($newrow[$i] == NULL)
			$query .= "NULL";
		else
			$query .=  $newrow[$i];
	}
	$query .= ")";

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	echo "<p> [ $query ]";
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "<p>���̺� [<b>$tablename</b>]�� ���ԵǾ����ϴ�.";
	mysql_close($dbconnect);
?>
<p>
<a href="mult20.html">������ ���۾� �޴��� ���ư���</a>