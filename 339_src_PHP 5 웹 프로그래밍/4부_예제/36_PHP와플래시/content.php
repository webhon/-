<?
include "./db.php.inc";

$num;	//c:\windows\php.ini������ register_globals = On �ؾ� �մϴ�.

$sql="select * from board where num=$num limit 1";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$c_num=$row[num];
$c_irum=$row[irum];
$c_email=$row[email];
$c_title=$row[title];
$c_comment=$row[comment];
$c_comment=str_replace("\n","<br>",$c_comment);
$c_date=$row[r_date];
$c_usrip=$row[usrip];
$c_cnt=$row[cnt];

mysql_close($db);
?>

<html>
<head><title>�Խù� ���� ����</title>
</head>

<body>

<p align=center>�Խù� ���� ����</p>

<table border="1" width="700" align="center" cellpadding="2" cellspacing="0">
    <tr>
        <td width="114" align=center>
			<p><small>��ȣ. <? echo $num?></small></p></td>
        <td width="114" align=center>
            <p><small>�ۼ���¥</small></p></td>
        <td width="230" align=center>
            <p><small><? echo $c_date ?></small></p></td>
        <td width="114" align=center>
            <p><small>��ȸ��</small></p></td>
        <td width="114" align=center>
            <p><small><? echo $c_cnt ?></small></p></td>
    </tr>
    <tr>
        <td width="114" align=center>
            <p><small>�ۼ���</small></p></td>
        <td width="580" colspan="4">
            <p><small>&nbsp;<a href='mailto:<? echo $c_email ?>'>
			<? echo $c_irum ?></a></small></p></td>
    </tr>
    <tr>
        <td width="114" align=center>
            <p><small>����</small></p></td>
        <td width="580" colspan="4">
            <p><small>&nbsp;<? echo $c_title ?></small></p></td>
    </tr>
    <tr>
        <td width="696" colspan="5" style="padding:20;">
            <small><p align=right>IP : <? echo $c_usrip ?></p>
			<? echo $c_comment ?></small></td>
    </tr>
</table><br>

<table border="0" width="700" align="center" cellpadding="2" cellspacing="0">
    <tr>
		<td align=center><a href='./list.php'>������� ����</a></td>
	</tr>
</table>

</body>
</html>