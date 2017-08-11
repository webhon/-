<html>
	<head><title>ÇÁ·Î±×·¥ 2-7</title></head>
	<body>
<?
	$s_arr1 = array(1, 2, 3);
	$s_arr2 = array(array(1, 2, 3), array(4, 5, 6));
 
	$a_arr1 = array("È«±æµ¿" => 20, "ÀÌ¸ù·æ" => 21, "¼ºÃáÇâ" => 19);
	$a_arr2 = array("È«±æµ¿" => array("³ªÀÌ" => 20, "¼ºº°" => "³²"),
					    "ÀÌ¸ù·æ" => array("³ªÀÌ" => 21, "¼ºº°" => "³²"),
					    "¼ºÃáÇâ" => array("³ªÀÌ" => 19, "¼ºº°" => "¿©"));
?>
		<table border=1>
			<tr>
				<th>Ç×¸ñ 1</th>
				<th>Ç×¸ñ 2</th>
				<th>Ç×¸ñ 3</th>
			</tr>
			<tr>
				<td><?= $s_arr1[1] ?></td>
				<td><?= $s_arr2[0][0] ?></td>
				<td><?= $s_arr2[1][2] ?></td>
			</tr>
			<tr>
				<td><?= $a_arr1["ÀÌ¸ù·æ"] ?></td>
				<td><?= $a_arr2["È«±æµ¿"]["³ªÀÌ"] ?></td>
				<td><?= $a_arr2["¼ºÃáÇâ"]["¼ºº°"] ?></td>
			</tr>
		</table>
	</body>
</html>