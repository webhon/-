<?php
	$yy; $mm; $dd;
?>

<html>
<head><title>Schedule �ۼ�</title>
</head>

<body>

<form name='frm' action='schedule_ins.php' method='post'>
<table border='1' width='500' align='center'>
<input type='hidden' name='dat' value='<? echo $yy."-".$mm."-".$dd; ?>'>
<tr>
	<td colspan='2' align='center'><? echo $yy."�� ".$mm."�� ".$dd."�� "; ?>Schedule �ۼ�</td>
</tr>
<tr>
	<td widht='100' align='center'>����</td>
	<td width='400'><textarea name='iljung' rows='10' cols='50' style='width:400'></textarea></td>
</tr>
<tr>
	<td colspan='2' align='center'>
		<input type='submit' name='smt' value='����'>&nbsp;&nbsp;
		<input type='reset' name='rst' value='�ݱ�' onClick='javascript:window.close();'>
	</td>
</table>
</form>

</body>
</html>