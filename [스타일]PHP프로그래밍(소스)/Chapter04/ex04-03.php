<html>
	<head><title>���չ��� 4-1</title></head>
	<body>
<?
	$member = array("����" => array("age"=>22, "dept"=> "��ǻ��", year => 2),
                     "����" => array("age"=>23, "dept"=> "��ǻ��", year => 4),
                     "��ö" => array("age"=>25, "dept"=> "����", year => 3));
?>

		<table border=1>
			<tr bgcolor="#cccccc">
				<th colspan=3>�̸�</th>
			</tr>
			<tr bgcolor="#cccccc">
				<th>����</th>
				<th>�Ҽ��а�</th> <th>�г�</th>
			</tr>
<?
	foreach ($member as $key => $values) {
		echo "<tr>\n"; 
		echo "<td colspan=3 align=\"center\"> $key </tr>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		foreach ($values as $k => $v) {
			echo "<td align=\"center\"> $v </td>"; 
		}
		echo "</tr>\n";
	}
?>
		</table>
	</body>
</html>