<html>
<head><title>�α���</title>
<script language="javascript">
<!--
function id_chk()
{
	if(frm.id.value.length==0)
	{
		alert("���̵� �Է��ϼ���");
		frm.id.focus();
		return false;
	}
	else if(frm.pass.value.length==0)
	{
		alert("��й�ȣ�� �Է��ϼ���");
		frm.pass.focus();
		return false;
	}
return true;
}
//-->
</script>
</head>

<body>

<form name="frm" action="./log_find.php" method="post" onSubmit="return id_chk()">
<table border=1 width=300 cellspacing=0 cellpadding=0>
<tr>
	<td>���̵�</td><td><input type="text" name="id" size="15"></td>
</tr>
<tr>
	<td>��й�ȣ</td><td><input type="password" name="pass" size="15"></td>
</tr>
<tr>
	<td colspan=2 align=center>
	<input type="submit" name="smt" value="�α���">&nbsp;&nbsp;&nbsp;
	<input type="reset" name="rst" value="���"></td>
</tr>
</table>
</form>

</body>
</html>
