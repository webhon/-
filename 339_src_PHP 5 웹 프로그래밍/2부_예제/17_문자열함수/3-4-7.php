<?
$a="You're my friend";
$b="�츮�� '����'�� ����մϴ�";

$c=addslashes($a);
$d=addslashes($b);
echo "$c <br> $d <p>";

$e=stripslashes($c);
$f=stripslashes($d);
echo "$e <br> $f ";
?>
