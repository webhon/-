<html>
	<head><title>���α׷� 2-7</title></head>
	<body>
<?
	$s_arr1 = array(1, 2, 3);
	$s_arr2 = array(array(1, 2, 3), array(4, 5, 6));
 
	$a_arr1 = array("ȫ�浿" => 20, "�̸���" => 21, "������" => 19);
	$a_arr2 = array("ȫ�浿" => array("����" => 20, "����" => "��"),
					    "�̸���" => array("����" => 21, "����" => "��"),
					    "������" => array("����" => 19, "����" => "��"));
?>
		<table border=1>
			<tr>
				<th>�׸� 1</th>
				<th>�׸� 2</th>
				<th>�׸� 3</th>
			</tr>
			<tr>
				<td><?= $s_arr1[1] ?></td>
				<td><?= $s_arr2[0][0] ?></td>
				<td><?= $s_arr2[1][2] ?></td>
			</tr>
			<tr>
				<td><?= $a_arr1["�̸���"] ?></td>
				<td><?= $a_arr2["ȫ�浿"]["����"] ?></td>
				<td><?= $a_arr2["������"]["����"] ?></td>
			</tr>
		</table>
	</body>
</html>