<html>
	<head><title>���α׷� 5-16</title></head>
	<body>
<?
	echo "<p>���� : ".date('Y �� n�� d��', mktime (0,0,0,date("m"), date("d")+1, date("Y")));
	echo "<p>������ : ".date('Y �� n�� d��', mktime (0,0,0,date("m")-1, date("d"), date("Y")));
	echo "<p>���� : ".date('Y �� n�� d��', mktime (0,0,0,date("m"), date("d"), date("Y")+1));
?>
	</body>
</html>