<?
	$contents = array(array(no => 1, au => "�庸��", ti => "â�Ƿ»���", pu => "21����Ͻ�"),
				  array(no => 2, au => "��������", ti => "�Ͽ��尡���", pu => "����"),
				  array(no => 3, au => "��������", ti => "â�Ƿ��ֽ�ȸ��", pu => "Ǫ����")
	);
?>
<html>
	<head><title>���չ��� 2-2</title></head>
	<body>
		<table border = 1 cellpadding=5>
			<tr bgcolor="#cccccc">
				<th>��ȣ</th>
				<th>����</th>
				<th>����</th>
				<th>���ǻ�</th>
			</tr>
<?
		echo "<tr>\n";
		echo "<td align=\"center\">".$contents[0][no]."</td>";
		echo "<td align=\"center\">".$contents[0][au]."</td>";
		echo "<td align=\"center\">".$contents[0][ti]."</td>";
		echo "<td align=\"center\">".$contents[0][pu]."</td>";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td align=\"center\">".$contents[1][no]."</td>";
		echo "<td align=\"center\">".$contents[1][au]."</td>";
		echo "<td align=\"center\">".$contents[1][ti]."</td>";
		echo "<td align=\"center\">".$contents[1][pu]."</td>";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td align=\"center\">".$contents[2][no]."</td>";
		echo "<td align=\"center\">".$contents[2][au]."</td>";
		echo "<td align=\"center\">".$contents[2][ti]."</td>";
		echo "<td align=\"center\">".$contents[2][pu]."</td>";
		echo "</tr>\n";

?>
		</table>
	</body>
</html>