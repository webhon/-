<?
	$tablename = $_GET["tn"];
	$no = $_POST["no"];

	$query = "delete from $tablename where no = $no";
	echo $query ."<br>";
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]".mysql_error());
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());

	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
	echo "<p>���� �Ǿ����ϴ�.<p>";
	mysql_close($dbconnect);
?>
<p>
<a href="mult20.html">������ ���۾� �޴��� ���ư���</a>