<?
include "./mem_con.php.inc";

$id; $pass; $email; $tbl_name; $pg; 
$usrip=$REMOTE_ADDR;

// ���� ǥ������ �̿��Ͽ� �Էµ� �̸��� �ּ��� ��ȿ���� �����Ѵ�.
function email_func($addr)
{
	return (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_a-z{|}~]+'.
	'@'.
	'[-!#$%&\'*+\\/0-9=?A-Z^_a-z{|}~]+\.'.
	'[-!#$%&\'*+\\./0-9=?A-Z^_a-z{|}~]+$',
	$addr));
}

$a=email_func($email);

if(!$a)
{
	echo "<script language='javascript'>
		alert('�̸��� �ּ� ������ �ƴմϴ�.');
		history.go(-1);
	      </script>";
	exit;
}

$sql="select * from $tbl_name where m_id='$id'";
$result=mysql_query($sql,$db);
$list=mysql_num_rows($result);

if($list)
{
	echo "
	<script language='javascript'>
		alert('���� ���̵� �����մϴ�.');
		history.go(-1);
	</script>
	";
	mysql_close($db);
	exit;
}

$ins_sql="insert into $tbl_name (".
		"m_id,m_pass,m_email,m_dat,m_usrip".
		") values (".
		"'$id',password('$pass'),'$email',now(),'$usrip'".
		")";
mysql_query($ins_sql,$db);
session_start();
$ses_id=$id; $ses_pass=$pass; $ses_email=$email;
session_register("ses_id");
session_register("ses_pass");
session_register("ses_email");

mysql_close($db);

echo $id."���� ȸ�� ���ԵǾ����ϴ�.<br><br>";
echo "<a href='./all_mem.php' target='right'>��ü ȸ�� ����</a>";
?>

