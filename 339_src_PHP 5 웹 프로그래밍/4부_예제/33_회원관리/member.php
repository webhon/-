<?
session_start(); // ������ �����Ѵ�.

// ���� ����ڰ� �α����� �ߴ��� �ƴ����� üũ�Ѵ�.
if($ses_id && $ses_pass && $ses_email)
{
        // �̹� �α����ߴٸ� ȸ�������� �ٽ� ���ϵ��� ������ �����.
	echo $ses_id."���� ȸ���̽ʴϴ�.";
	exit;
}
?>

<html>
<head><title>ȸ�� ����</title>
<script language="javascript">
<!--
function chk()
{
	if(frm.id.value.length==0)
	{
		alert("���̵� �Է����ּ���.");
		frm.id.focus();
		return false;
	}
	else if(frm.pass.value.length==0)
	{
		alert("��й�ȣ�� �Է����ּ���.");
		frm.pass.focus();
		return false;
	}
	else if(frm.pass1.value.length==0)
	{
		alert("��й�ȣ�� �Է����ּ���.");
		frm.pass1.focus();
		return false;
	}
	else if(frm.email.value.length==0)
	{
		alert("�̸��� �ּҸ� �Է����ּ���.");
		frm.email.focus();
		return false;
	}
	else if(frm.pass.value!=frm.pass1.value)
	{
		alert("��й�ȣ�� ���ƾ� �մϴ�.");
		frm.pass.value=""; frm.pass1.value="";
		frm.pass.focus();
		return false;
	}

return true;
}
//-->
</script>
</head>
<body>

<p align=center><font size=15>ȸ�� ����</font></p>

<form name="frm" action="./insert.php" method="post" onSubmit="return chk()">
<table border=1 width=700 align=center cellspacing=0 cellpadding="3">
<tr>
	<td width="696" colspan="2" bgcolor="blue">&nbsp;<font color="white"><b>ȸ������</b></font></td>
</tr>
<tr>
	<td width="125"><p align="right">���̵� :</p></td>
	<td width="569"><p>&nbsp;
          <input type="text" name="id" size="20"></p></td>
</tr>
<tr>
	<td width="125"><p align="right">��й�ȣ :</p></td>
	<td width="569"><p>&nbsp;
          <input type="password" name="pass" size="20"></p></td>
</tr>
<tr>
	<td width="125"><p align="right">��й�ȣ Ȯ��</p></td>
	<td width="569"><p>&nbsp;
          <input type="password" name="pass1" size="20"></p></td>
</tr>
<tr>
	<td width="125"><p align="right">�̸��� :</p></td>
	<td width="569"><p>&nbsp;
          <input type="text" name="email" size="30"></p></td>
</tr>
<tr>
	<td width="696" colspan="2"><p align="center">
	<input type="submit" name="smt" value="����">&nbsp;&nbsp;&nbsp;
	<input type="reset" name="rst" value="���"></p></td>
</tr>
</table>
</form>

</body>
</html>
