<?php
include "./poll_con.php.inc";
$id;                             //����ڰ� ������ ��ǥ ��ȣ�� �ڵ�����  ��$id���Ҵ�

if(!$usr_id)                          //���� ����ڰ� �α��ε��� ���� ������� �� ����
{
	$usr_id=md5(uniqid(rand()));                          //������ ����� ���̵� �߱�
	setcookie("usr_id",$usr_id);                           //������ ���̵� ��Ű ����
}
$sql="insert into poll_usr (".
	"poll_usr,poll_num".
	") values (".
	"'$usr_id',$id".
	")";
//��ǥ ����ڷ� ���� �߱޵� ������ ����� ID�� �����ϴ� ���� ����

$result=mysql_query($sql,$db);                                     //����� ���� ����

mysql_close($db);

echo "
<script>
	location.href='./poll_result.php?id=$id';
</script>
";
?>
