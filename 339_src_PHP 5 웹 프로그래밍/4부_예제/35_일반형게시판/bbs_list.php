<? 
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");

//�Խ��� ��Ϻ��⿡ �ʿ��� ���� ���� �ʱⰪ�� �����մϴ�. 
$tablename="mfboard"; //���̺� �̸� 
if($page == '') $page = 1; //������ ��ȣ�� ������ ù�������� ����(1 ������)
$list_num = 10; //�� �������� ������ ��� ���� 
$page_num = 10; //�� ȭ�鿡 ������ ������ ��ũ(����) ���� 
$offset = $list_num*($page-1); //�� �������� ���� �� ��ȣ(listnum ����ŭ �������� �� �����ϴ� ���� ��ȣ) 
  
//��ü �� ���� ���մϴ�. (�������� ����Ͽ� ����� �迭�� �����ϴ� �Ϲ��� �� ���) 
$query="select count(*) from $tablename"; // SQL �������� ���ڿ� ������ �ϴ� �����ϰ� 
$result=mysql_query($query) or die (mysql_error()); // ���� �������� ������ �����Ͽ� ����� result�� ���� 
$row=mysql_fetch_row($result); //�� ��� ���� �ϳ��ϳ� �迭�� �����մϴ� . 
$total_no=$row[0]; //�迭�� ù��° ����� ��, �� ���̺��� ��ü �� ���� �����մϴ�. 
  
//��ü ������ ���� ���� �� ��ȣ�� ���մϴ�. 
$total_page=ceil($total_no/$list_num); // ��ü�ۼ��� ��������ۼ��� ���� ���� �ø� ���� ���մϴ�. 
$cur_num=$total_no - $list_num*($page-1); //���� �۹�ȣ 
  
//bbs���̺��� ����� �����ɴϴ�. (���� ������ ��뿹�� ����մϴ� .) 
$query="select * from $tablename order by number desc limit $offset, $list_num"; // SQL ������ 
$result=mysql_query($query) or die (mysql_error()); // �������� ���� ��� 
//���� ����� �ϳ��� �ҷ��� ���� HTML�� ��Ÿ���� ���� HTML �� �߰��� �����մϴ�. 
?> 
  
<html> 
<head> 
<meta http-equiv=content-type content=text/html; charset=euc-kr> 
<title>ó���Խ��� > �۸��</title> 
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
<body>
<table border=0 width="680">
	<tr><td align=right colspan="5"> 
		<font color=green><b>ó���Խ��� > �۸��</b></font> 
	</td></tr> 
</table>
<table border=1 cellspacing=0 cellpadding="5" width=680 bordercolordark=white bordercolorlight=#999999> 
	<tr> 
		<th width=50 bgcolor=#CCCCCC>��ȣ</th> 
		<th bgcolor=#CCCCCC width=450>����</th> 
		<th width=60 bgcolor=#CCCCCC>�ۼ���</th> 
		<th width=70 bgcolor=#CCCCCC>�ۼ�����</th> 
		<th width=60 bgcolor=#CCCCCC>��ȸ��</th> 
	</tr> 

<? 
while ($array=mysql_fetch_array($result)) { 
	$date=date("Y/m/d", $array[writetime]); //�۾��ð��� Y/m/d ���Ŀ� �°� ���ڿ��� �ٲߴϴ� . 
	echo " 
	<tr> 
		<td width=30>$cur_num</td> 
		<td width=490><a href='bbs_view.php?number=$array[number]'>$array[subject]</a></td> 
		<td width=60>$array[name]</td> 
		<td width=70>$date</td> 
		<td width=30>$array[count]</td> 
	</tr>"; 

	$cur_num --;
}
?>
</table>
<table border=0 width="680">
	<tr> 
		<td width=100%> 
<? 
//���⼭���� ���� ������ ��ũ 
//����, �� ȭ�鿡 ���̴� ���($page_num �⺻�� �̻��� �� ������� �������� ) 
$total_block=ceil($total_page/$page_num); 
$block=ceil($page/$page_num); //���� ��� 
  
$first=($block-1)*$page_num; // ������ ����� �����ϴ� ù ������ 
$last=$block*$page_num; //������ ����� �� ������ 
  
if($block >= $total_block) { 
	$last=$total_page; 
} 


echo "��ü : $total_no �� ";
echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";

//[����] : ù �������� �̵��Ѵ�.
if($block > 1) { 
	$prev=$first-1; 
	echo "<a href='bbs_list.php?page=1'>[����]</a>&nbsp; &nbsp;"; 
} 
  
//[��] ���� �������� �̵��Ѵ�.
if($page > 1) { 
	$go_page=$page-1; 
	echo "  <a href='bbs_list.php?page=$go_page'>[��]</a>&nbsp; &nbsp;"; 
} 
  
//[1] [2] [3], ... : �� �������� ǥ���Ѵ�.
for ($page_link=$first+1;$page_link<=$last;$page_link++) { 
	if($page_link==$page) { 
		echo "<font color=green><b>$page_link</b></font>&nbsp"; 
	}else{ 
		echo "<a href='bbs_list.php?page=$page_link'>[$page_link]</a>&nbsp;"; 
	} 
} 
  
//[��] : ���� �������� �̵��Ѵ�.
if($total_page > $page) { 
	$go_page=$page+1; 
	echo "&nbsp;<a href='bbs_list.php?page=$go_page'>[��]</a>"; 
} 
  
//[����] : ������ �������� �̵��Ѵ�.
if($block < $total_block) { 
	$next=$last+1; 
	echo " &nbsp;<a href='bbs_list.php?page=$total_page'>[����]</a>"; 
} 
  
// MySQL �����ͺ��̽� ������ ����
mysql_close();
?> 
		</td> 
	</tr> 
	<tr> 
		<form name="btn_form">
		<td width=100% align="right">
			<input type="button" name="btn_write" class="ahnbutton" value="�۾���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='bbs_write.php'">
		</td> 
		</form>
	</tr> 
</table> 
</body> 
</html>