<?
$fp=fopen("test.dat","r");

if($fp==null) {
	echo "������ �������� �ʽ��ϴ�.";
} else {
echo "���� ���� �Ϸ�";
}
fclose($fp);
?>
