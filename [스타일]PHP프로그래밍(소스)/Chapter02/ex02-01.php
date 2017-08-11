<html>
	<head><title>평가문제 2-1</title></head>
	<body>
<?
	$undecided = 1.23;
	$changed = (double) $undecided;
	echo $changed." 는(은) double형 입니까? ".is_double($changed)."<br/>"; 
	$changed = (string) $undecided;
	echo $changed." 는(은) string형 입니까? ".is_string($changed)."<br/>"; 
	$changed = (integer) $undecided;
	echo $changed." 는(은) integer형 입니까? ".is_integer($changed)."<br/>"; 
	$changed = (double) $undecided;
	echo $changed." 는(은) double형 입니까? ".is_double($changed)."<br/>"; // 
	$changed = (boolean) $undecided;
	echo $changed." 는(은) boolean형 입니까? ".is_bool($changed)."<br/>"; //
	echo "<hr/>";
	echo " $undecided의 실제 변수 타입 : ";
	echo gettype($undecided); // double
	?>
	</body>
</html>