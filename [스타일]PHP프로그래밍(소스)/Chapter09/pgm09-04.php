<?
	$dbconnect = mysql_connect("localhost", "wellbook", "password");
	if (!$dbconnect) die("[����ȵ�]" . mysql_error());
	echo "[�����]<BR>";
 
	if (!mysql_select_db("wellbookdb")) die("[���ý���]".mysql_error());
	else echo "�����ͺ��̽� [wellbookdb]�� ���õ�<br>";
 
	$query = "select * from STUDENT";
 
	$result = mysql_query($query);
	if (!$result) die("[SQL ����]".mysql_error());
 	
	$Nofields = mysql_num_fields($result);
	for($i=0; $i < $Nofields; $i++) {
		$field_name = mysql_field_name($result, $i);
		echo ($i+1)."��° �Ӽ� : ".$field_name."<br>";
	}
	mysql_close($dbconnect);
?>