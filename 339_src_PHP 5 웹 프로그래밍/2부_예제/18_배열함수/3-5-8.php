<?
$a = array('ASP', 'JSP', 'PHP');
reset($a);
next($a);
print_r(each($a));
echo "<br>";
print_r(each($a));
echo "<br>";
if(each($a)){print_r(each($a));}
else echo("���� Ŀ���� �迭�� �������� �ʽ��ϴ�.");
?>  


