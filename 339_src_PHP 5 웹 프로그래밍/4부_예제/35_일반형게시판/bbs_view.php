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
  
$array[subject] = htmlspecialchars($array[subject]); 
$array[memo] = htmlspecialchars($array[memo]); 
  
$array[memo] = nl2br($array[memo]); 
  
// ��ȸ�� ī���� ���� 
$query = "update $tablename set count = count + 1 where number='$number'"; 
mysql_query($query); 
  
?> 
  
<html> 
<head> 
<title>ó���Խ��� > ���б�</title> 
<link rel="stylesheet" type="text/css" href="bbs.css">
<script language="javascript">
	function goLite(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#AAAAAA";
	}

	function goDim(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#EEEEEE";
	}
</script>
</head> 
<body bgcolor=white>
<table border=0 cellspacing=1 cellpadding="2" width=670> 
	<tr><td align=right> 
		<font color=green><b>ó���Խ��� > ���б�</b></font> 
	</td></tr> 
    <tr> 
	<td bgcolor="gray"> 
		<table border=0 cellspacing=0 cellpadding=5 width=670 bgcolor="white"> 
			<tr> 
				<td width="100" bgcolor="#EEEEEE"><p align="right"><b>�ۼ��� &nbsp;</b></p></td> 
				<td width="400"><p><a href="mailto:<? echo $array[email]; ?>"><? echo $array[name]; ?></a></p></td> 
				<td width="100" bgcolor="#EEEEEE"><p align="right"><b>��ȸ�� &nbsp;</b></p></td> 
				<td width="100"><p><? echo $array[count]; ?></p></td> 
			</tr> 
			<tr><td colspan="4" bgcolor="#999999" height="1"></td></tr>
			<tr> 
				<td width="100" bgcolor="#EEEEEE"><p align="right"><b>���ڿ��� &nbsp;</b></p></td> 
				<td colspan="3"><p><? echo $array[email]; ?></p></td> 
			</tr> 
			<tr><td colspan="4" bgcolor="#999999" height="1"></td></tr>
			<tr> 
				<td width="100" bgcolor="#EEEEEE"><p align="right"><b>Ȩ������ &nbsp;</b></p></td> 
				<td colspan="3"><p><? echo $array[homepage]; ?></p></td> 
			</tr> 
			<tr><td colspan="4" bgcolor="#999999" height="1"></td></tr>
			<tr> 
				<td width="100" bgcolor="#EEEEEE"><p align="right"><b>���� &nbsp;</b></p></td> 
				<td colspan="3"><p><? echo $array[subject]; ?></p></td> 
			</tr> 
			<tr><td colspan="4" bgcolor="#999999" height="1"></td></tr>
			<tr> 
				<td width="100" bgcolor="#EEEEEE" valign="top"><p align="right"><b>���� &nbsp;</b></p></td> 
				<td colspan="3" height="300px" valign="top"><p><? echo $array[memo]; ?></p></td> 
			</tr> 
		</table> 
	</td> 
    </tr> 
</table>
<?php
// MySQL �����ͺ��̽� ������ ����
mysql_close();
?>
<table border=0 cellspacing=1 cellpadding="2" width=670><tr><td width="100%">
<form name="btn_form">
<br>
<p align="right">
	<input type="button" name="btn_list" class="ahnbutton" value="��Ϻ���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='bbs_list.php?page=<? echo $page; ?>'">
	<input type="button" name="btn_write" class="ahnbutton" value="�۾���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='bbs_write.php'">
	<input type="button" name="btn_modify" class="ahnbutton" value="�ۼ���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='bbs_modify.php?number=<? echo $number; ?>&page=<? echo $page; ?>'">
	<input type="button" name="btn_delete" class="ahnbutton" value="�ۻ���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='bbs_checkpassword.php?number=<? echo $number; ?>&page=<? echo $page; ?>'">
</p> 
</form>
</td><tr></table>
</body> 
</html>