<?
include "./mem_con.php.inc";

$id; $pass;

$sql="select * from $tbl_name where m_id='$id' and m_pass=password('$pass')";
$result=mysql_query($sql,$db);
$list=mysql_num_rows($result);

if($list)
{
	$row=mysql_fetch_array($result);
	$ses_id=$row[m_id];
	$ses_pass=$row[m_pass];
	$ses_email=$row[m_email];

	session_start();                     //���� ����
	session_register("ses_id");          //ses_id ������ ���� �������� ���
	session_register("ses_pass");       //ses_pass ������ ���� �������� ���
	session_register("ses_email");      //ses_email ������ ���� �������� ���

	echo $ses_id." ���� �α��� �Ǿ����ϴ�.";
}
else
{
	echo "���̵�� ��й�ȣ�� Ʋ���ϴ�.<p>";
	echo "<a href='./member.php' target='right'>ȸ�� ����</a>";
}

mysql_close($db);
?>
