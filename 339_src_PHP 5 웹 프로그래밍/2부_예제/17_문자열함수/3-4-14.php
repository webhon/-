<?
$a=getenv(HTTP_USER_AGENT);
$b=preg_match("/compatible; MSIE/",$a);
if($b)
echo "����� �ͽ��÷η� ���������� ����ϰ� �ֽ��ϴ�.";
else echo "�ͽ��÷η� ���������� �ƴմϴ�.";
?>

