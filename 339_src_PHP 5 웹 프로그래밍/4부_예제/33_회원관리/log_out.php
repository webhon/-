<?
session_start();                          //���� ����
session_unregister("ses_id");             //���� ���� ses_id �� ����
session_unregister("ses_pass");          //���� ���� ses_pass �� ����
session_unregister("ses_email");         //���� ���� ses_email �� ����

echo $ses_id." ���� �α׾ƿ��Ǿ����ϴ�.<p>";
echo "<a href='./index.php' target='_parent'>���� ȭ��</a>";
?>
