<html>
<head><title>���� ���� ���</title>
<script language="javascript">
<!--
function chk()
{
	if(frm.fn.value.length==0)
	{
		alert("����� ������ �����ϼ���.");
		frm.fn.focus();
		return false;
	}
return true;
}
//-->
</script>
</head>

<body>

<p>&nbsp;</p>

<form name="frm" action="./mu_insert.php" enctype="multipart/form-data" method="post" onSubmit="return chk()">
<table align="center" border="1" width="550" cellpadding="3">
<tr>
	<td width="550" height="21" colspan="2">
		<p><font size="3" color="blue"><b>&nbsp;&nbsp;�� ���� ����ϱ�</b></font></p>
	</td>
</tr>
<tr>
	<td width="150" height="21">
		<p align="center"><font size="2">���� ÷�� :</font></p>
	</td>
	<td width="400" height="21">
		<p>&nbsp;<input type="file" name="fn" size="39"></p>
	</td>
</tr>
<tr>
	<td width="550" colspan="2">
		<p align="center"><input type="submit" name="smt" value="���� ���">&nbsp;
	    <input type="reset" name="rst" value="��� ���" onClick="javascript:location.href='./mu_list.php'"></p>
	</td>
</tr>
</table>
</form>

</body>
</html>