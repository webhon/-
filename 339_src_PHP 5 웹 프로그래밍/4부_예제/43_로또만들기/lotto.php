<? $a_key; ?>

<html>
<head><title>�ζ�</title>
<script language="javascript">
<!--
function aaa(su)
{
	if(su==1)
		frm.a_key.value=1;
	else
		frm.a_key.value="";

frm.action="<? echo $PHP_SELF; ?>";
frm.submit();
}

function new_lotto()
{
	window.open("./lotto_sel.php","new","left=0,top=0,width=850,height=650");
}
//-->
</script>
</head>

<body>

<table align="center" border="1" cellpadding="0" cellspacing="0" width="800">
<tr>
	<td width="800" height="300">
		<p align="center"><? include "./lotto_in.php"; ?></p>
	</td>
</tr>
<tr>
	<td width="800" height="50">

	<form name="frm" method="post">
	<table align="center" border="0" width="600">
	<tr>
		<td width="600">
			<p align="center"><input type="hidden" name="a_key"></p>
		</td>
	</tr>
	<tr>
		<td width="600">
			<p align="center">
			<input type="button" name="btn1" value="�ζǼ���" onClick="new_lotto()">&nbsp;
			<input type="button" name="btn2" value="�� �� ��" onClick="aaa(1)">&nbsp;
			<input type="button" name="btn3" value="�� �� ȭ" onClick="aaa(0)"></p>
		</td>
	</tr>
	</table>
	</form>

	</td>
</tr>
</table>

</body>
</html>