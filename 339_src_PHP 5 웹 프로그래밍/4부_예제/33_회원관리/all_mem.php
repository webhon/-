<?
session_start();

if(!$ses_id || !$ses_pass || !$ses_email)
{
	exit;
}

include "./mem_con.php.inc";

$tbl_name;

$sql="select * from $tbl_name order by m_num desc";
$result=mysql_query($sql,$db);
?>

<html>
<head><title>ȸ�� ��� ����</title>
</head>

<body>

<p align=center>��ü ȸ�� ����</p>

<table border=1 width=700 align=center cellspacing=0 cellpadding=0>
<tr align=center>
	<td width=50>��ȣ</td>
	<td width=100>���̵�</td>
	<td width=100>��й�ȣ</td>
	<td width=150>�̸���</td>
	<td width=200>���Գ�¥</td>
	<td width=100>������</td>
</tr>

<?
while($row=mysql_fetch_array($result))
{
	$num=$row[m_num];
	$id=$row[m_id];
	$pass=$row[m_pass];
	$email=$row[m_email];
	$dat=$row[m_dat];
	$usrip=$row[m_usrip];


echo "
<tr align=center>
	<td width=50>$num</td>
	<td width=100>$id</td>
	<td width=100>$pass</td>
	<td width=150>$email</td>
	<td width=200>$dat</td>
	<td width=100>$usrip</td>
</tr>
";
}

mysql_close($db);
?>

</table>

</body>
</html>
