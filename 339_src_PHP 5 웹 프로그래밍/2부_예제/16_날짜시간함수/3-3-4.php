<?
$a=time();
$b=mktime(7, 41, 15, 9, 20, 1982);
$c=$a-$b;
$d=intval($c/86400);
$e=intval(($c % 86400) / 3600);
$f=intval((($c % 86400) % 3600) / 60);
$g=intval((($c % 86400) % 3600) % 60);

echo "1970��1��1�Ϻ��� ������� <font color=blue>".$a."</font>�ʰ� ��������<br>";
echo "1970�� ���� ��� ���ϱ��� <font color=red>".$c."</font>�ʰ� �������ϴ�.<br>";
echo "����� ��ƿ� �ð��� <font color=green>".$c."</font>�� �Դϴ�.<br>";
echo "(" . $d . "��" . $e . "�ð�" . $f . "��" . $g . "��)";
?>
