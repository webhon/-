<?php
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");
  
//���� �����մϴ�. 
$tablename="mfboard"; //���̺� �̸� 
  
//���̺��� ���� �����ɴϴ�. 
$query = "select * from $tablename where number='$number'"; // �� ��ȣ�� ������ ��ȸ�� �մϴ�. 
$result = mysql_query($query) or die (mysql_error()); 
$array = mysql_fetch_array($result); 
  
//�齽���� ����, Ư������ ��ȯ(HTML��), ����(<br>)ó�� �� 
$array[name] = stripslashes($array[name]); 
$array[subject] = stripslashes($array[subject]); 
$array[memo] = stripslashes($array[memo]);   

// MySQL �����ͺ��̽� ������ ����
mysql_close();
?> 
  
<html> 
<head> 
<title>ó���Խ��� > �ۼ���</title> 
  
<link rel="stylesheet" type="text/css" href="bbs.css">
<script language="javascript">
	function goLite(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#AAAAAA";
	}

	function goDim(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#EEEEEE";
	}
</script>
<script language="javascript"> 
	function check_submit() { 
		if (document.edit_form.name.value == "") { 
			alert('�ۼ��ڸ��� �Է����ּ���.'); 
			document.edit_form.name.focus(); 
			return; 
		} else if (document.edit_form.password.value == "") { 
			alert('�Խù��� ����,������ ���ؼ� ��й�ȣ�� �ʿ��մϴ�.'); 
			document.edit_form.password.focus(); 
			return; 
		} else if (document.edit_form.subject.value == "") { 
			alert('�Խù� ������ �Է����ּ���.'); 
			document.edit_form.subject.focus(); 
			return; 
		} else if (document.edit_form.memo.value == "") { 
			alert('�Խù� ������ �Է����ּ���.'); 
			document.edit_form.memo.focus(); 
			return; 
		} else { 
			document.edit_form.action = "bbs_update.php"; 
			document.edit_form.submit(); 
		} 
}
</script> 
</head> 
  
<body bgcolor=white>
<br> 
<table border=0 cellspacing=1 cellpadding=0 width=670>
	<tr>
	<td align=right>
		<font color=green><b>ó���Խ��� > �ۼ���</b></font>
	</td>
	</tr>
</table>
  
<table border=0 width=670 cellspacing=0 cellpadding="5" style="border:2px solid gray"> 
<form name='edit_form' method='post' > 
<input type=hidden name=page value='<? echo $page; ?>'> 
<input type=hidden name=number value='<? echo $number; ?>'> 
	<tr>
		<td width=100 align=right bgcolor="#EEEEEE"><b>�̸�&nbsp;</b></td> 
		<td><input type=text name=name size=20  maxlength=20 value= '<? echo $array[name]; ?>'></td>
		<td width=100 align=right bgcolor="#EEEEEE"><b>��й�ȣ&nbsp;</b></td> 
		<td><input type=password name=password  size=20  maxlength=20 value=''></td> 
	</tr>

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr> 
	 
	<tr> 
		<td align=right bgcolor="#EEEEEE"><b>���ڿ���&nbsp;</b></td> 
		<td colspan="3"> <input type=text name=email size=40  maxlength=200 value='<? echo $array[email]; ?>'> </td> 
	</tr> 
	 
	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr> 

	<tr> 
		<td align=right bgcolor="#EEEEEE"><b>Ȩ������&nbsp;</b></td> 
		<td colspan="3"> <input type=text name=homepage size=40  maxlength=200 value='<? echo $array[homepage]; ?>'> </td> 
	</tr> 

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr> 

	<tr> 
		<td align=right bgcolor="#EEEEEE"><b>����&nbsp;</b></td> 
		<td colspan="3"> <input type=text name=subject size=87  maxlength=200 value='<? echo $array[subject]; ?>'> </td> 
	</tr> 

	<tr><td bgcolor="#999999" height=1 colspan=4></td></tr> 

	<tr> 
		<td align=right bgcolor="#EEEEEE"><b>����&nbsp;</b></td> 
		<td valign=top colspan="3"> 
			<textarea name=memo cols=85 rows=20> <? echo $array[memo]; ?> </textarea> 
	</td> 
	</tr> 
</form> 
</table> 
  
<br> 
<table border=0 width=670> 
<form name="btn_form">
	<tr><td align="right">
		<input type="button" name="btn_save" class="ahnbutton" value="�ۼ���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="check_submit();">
		<input type="button" name="btn_cancel" class="ahnbutton" value="���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='bbs_list.php?page=<? echo $page ;  ?>'">
	</td></tr> 
</form> 
</table> 
  
</body> 
</html> 