<?
	$attrno = $_GET["no"];
	$tablename = $_GET["tn"];
	$attr = $_POST["attr"];

	$query = "create table $tablename (";
	$query .= ( $attr[0][0]." ".$attr[0][1] );
	if ($attr[0][2] != NULL) {
		$query .= "(".$attr[0][2]. ") ";
	}
	if ($attr[0][3] != NULL) {
		$query .= $attr[0][3];
	}
	for ($i=1; $i<$attrno; $i++) {
		$query .= ", ";
		$query .= ( $attr[$i][0]." ".$attr[$i][1] );
		if ($attr[$i][2] != NULL) {
			$query .= "(".$attr[$i][2]. ") ";
		}
		if ($attr[$i][3] != NULL) {
			$query .= $attr[$i][3];
		}
		$query .= " ";
	}
	$query .= ")";
	echo "<p>".$query;

	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "<p>���̺� [<b>$tablename</b>]�� �����Ǿ����ϴ�.";
	mysql_close($dbconnect);
?>