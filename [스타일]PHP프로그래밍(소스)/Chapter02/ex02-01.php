<html>
	<head><title>�򰡹��� 2-1</title></head>
	<body>
<?
	$undecided = 1.23;
	$changed = (double) $undecided;
	echo $changed." ��(��) double�� �Դϱ�? ".is_double($changed)."<br/>"; 
	$changed = (string) $undecided;
	echo $changed." ��(��) string�� �Դϱ�? ".is_string($changed)."<br/>"; 
	$changed = (integer) $undecided;
	echo $changed." ��(��) integer�� �Դϱ�? ".is_integer($changed)."<br/>"; 
	$changed = (double) $undecided;
	echo $changed." ��(��) double�� �Դϱ�? ".is_double($changed)."<br/>"; // 
	$changed = (boolean) $undecided;
	echo $changed." ��(��) boolean�� �Դϱ�? ".is_bool($changed)."<br/>"; //
	echo "<hr/>";
	echo " $undecided�� ���� ���� Ÿ�� : ";
	echo gettype($undecided); // double
	?>
	</body>
</html>