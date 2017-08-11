<html>
	<head><title>프로그램 2-12</title></head>
	<body>
<?
	$va = "Alice";
	$$va = 30;

	echo "\$va = $va<br>";
	echo "\$\$va = $$va<br>";
	echo "\$\$va = ".$$va."<br>";
	echo "\${\$va} = ${$va}<br>";
	echo "\$Alice = $Alice<br>";
?>
	</body>
</html>