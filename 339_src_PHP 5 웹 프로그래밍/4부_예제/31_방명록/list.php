<?
$host="localhost";
$usr="master";
$pwd="123";

$db=mysql_connect($host,$usr,$pwd) or die("���� ���� ����");
mysql_select_db("guestboard",$db);


$sql="select * from guest_tbl order by num desc";
$result=mysql_query($sql,$db);
?>

<html>
<head><title>���� ���</title>
</head>

<body>

<table border=0 width=700 cellspacing=0 cellpadding=0>
<tr>
	<td>
	<p align=center>�� �� �� �� ��</p>
	<table border=0 width=600 cellspacing=0 cellpadding=2 align=center>
	<tr>
		<td align=left><a href="./write.php">���� �ۼ�</a></td>
	</tr>
	</table><br>

<?
while($row=mysql_fetch_array($result))
{
	$num=$row[num];
	$irum=$row[irum];
	$dat=$row[wdate];
	$usrip=$row[usrip];
	$content=$row[content]; $content=str_replace("\n","<br>",$content);

echo "
	<table border=1 width=600 cellspacing=0 cellpadding=2 align=center>
	<tr align=center>
		<td width=50>��ȣ</td><td width=50>$num</td>
		<td width=100>�ۼ���</td><td width=100>$irum</td>
		<td width=150>�ۼ���¥</td><td width=150>$dat</td>
	</tr>
	<tr align=center>
		<td colspan=6>�� ��</td>
	</tr>
	<tr>
		<td colspan=6 style='padding:15; '>$content</td>
	</tr>
	</table><br>";
}
?>

	</td>
</tr>
</table>

</body>
</html>
