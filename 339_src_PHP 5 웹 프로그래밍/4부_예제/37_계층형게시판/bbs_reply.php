<?php
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");

/* �Ķ���ͷ� �Ѿ���� �͵�
$number 
$page
$parentno
*/

$tablename = "msboard";

$sql = "select * from $tablename where number=$number";
$result = mysql_query($sql) or die(mysql_error());
$array = mysql_fetch_array($result);

$subject = stripslashes($array[subject]);
$subject = "[���]".$subject;
$name = stripslashes($array[name]);
$memo = stripslashes($array[memo]);

$email = $array[email];
$homepage = $array[homepage];

$parent_memo = "
> ----------------------------------
> {$name}���� ��
> ----------------------------------
> ";

$memo = str_replace("\n","\n>",$memo);
$memo = $parent_memo.$memo;

?>

<html>
<head>
<meta http-equiv=content-type content=text/html; charset=euc-kr>
<title>ó���Խ��� > �亯����</title> 
<link rel="stylesheet" type="text/css" href="bbs.css">
<script language="javascript">
	function goLite(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#AAAAAA";
	}

	function goDim(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#EEEEEE";
	}
</script>
<script language='javascript'>
function check_submit() {
	if (document.edit_form.name.value == '') {
		alert('�ۼ��ڸ��� �Է����ּ���.');
		document.edit_form.name.focus();
		return;
	} else if (document.edit_form.password.value == '') {
		alert('�Խù��� �����ϰų� �����ϱ� ���ؼ� ��й�ȣ�� �Է��ؾ� �մϴ�.');
		document.edit_form.password.focus();
		return;
	} else if (document.edit_form.subject.value == '') {
		alert('�Խù� ������ �Է����ּ���.');
		document.edit_form.subject.focus();
		return;
	} else if (document.edit_form.memo.value == '') {
		alert('�Խù��� ������ �Է����ּ���.');
		document.edit_form.memo.focus();
		return;
	} else {
		document.edit_form.action = 'bbs_insert_reply.php';
		document.edit_form.submit();
	}
} 
</script>
</head>

<body bgcolor=white>
<br>

<table border=0 width="670">
	<tr><td align=right colspan="5"> 
		<font color=green><b>ó���Խ��� > �亯����</b></font> 
	</td></tr> 
</table>
<table width=670 cellspacing=0 cellpadding=3 style="border:2px solid gray">
<form name='edit_form' method='post' >
<input type='hidden' name='number' value=<?=$number;?>>
<input type='hidden' name='page' value=<?=$page;?>>
<input type='hidden' name='parentno' value=<?=$parentno;?>>

	<tr>
		<td width=100 align=right bgcolor="#EEEEEE"><b>�̸�&nbsp;</b></td>
		<td><input type=text name=name size=20  maxlength=20></td>      	  	
		<td width=100 align=right bgcolor="#EEEEEE"><b>��й�ȣ&nbsp;</b></td>
		<td><input type=password name=password  size=20  maxlength=20></td>
	</tr>

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr>

	<tr>
	  <td align=right bgcolor="#EEEEEE"><b>���ڿ���&nbsp;</b></td>
	  <td colspan="3"><input type=text name=email size=40  maxlength=200></td>
	</tr>

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr>

	<tr>
	  <td align=right bgcolor="#EEEEEE"><b>Ȩ������&nbsp;</b></td>
	  <td colspan="3"> <input type=text name=homepage size=40  maxlength=200> </td>
	</tr>

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr>

	<tr>
	  <td align=right bgcolor="#EEEEEE"><b>����&nbsp;</b></td>
	  <td colspan="3"> <input type=text name=subject value='<? echo "$subject"; ?>' size=87  maxlength=200> </td>
	</tr>

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr>

	<tr>
	  <td align=right valign=top bgcolor="#EEEEEE"><b>����&nbsp;</b></td>
	  <td colspan="3" valign=top>
	  <textarea name=memo cols=85 rows=20><?=$memo;?></textarea>
	  </td>
	</tr>
</form>
</table>
<br>
<table border=0 width=670>
<form name="btn_form">
	<tr><td align="right">
		<input type="button" name="btn_reply" class="ahnbutton" value="�亯 ����" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="check_submit();">
		<input type="button" name="btn_cancel" class="ahnbutton" value="���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="history.back()">
	</td></tr>
</form>
</table>