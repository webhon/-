<?

$a="���� �ູ�ϰ� �� �� �ִ� �ڸ��� �ູ�� ��´�.";
$b="A book is the one world one by one.";

$ret[0]=substr($a,5);
$ret[1]=substr($a,5,4);
$ret[2]=substr($a,-7);
$ret[3]=substr($a,-14,4);

$ret[4]=substr($b,2);
$ret[5]=substr($b,2,4);
$ret[6]=substr($b,-7,2);

$ret[7]=strchr($a,"��");
$ret[8]=strchr($a,"�ູ��");

for($i=0 ; $i<=8 ; $i++)
{
echo "$ret[$i] <br>";
}
?>
