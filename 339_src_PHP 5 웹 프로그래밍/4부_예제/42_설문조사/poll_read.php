<?php
include "./poll_con.php.inc";

$num; $title;        //����ڰ� ������ poll ��ȣ�� ������ ��$num, $title���ڵ� �Ҵ�
$t_sql="select * from poll_tbl where p_num=$num";
//����ڰ� ������ poll�� ������ ��ȸ�ϱ� ���� ���� ����
$t_ret=mysql_query($t_sql,$db);                 //��ȸ ���� ���� �� ��� ���� ��$t_ret���Ҵ�
$t_row=mysql_fetch_array($t_ret);               //��� �¿��� ù ��° ���ڵ带 ��$t_row���Ҵ�
$title=$t_row[p_title];                         //���̺��� ��p_title�� �÷����� ��$title�� �Ҵ�

$sql="select * from poll_ret where r_id=$num";
//����ڰ� ������ poll�� �亯 ����� ��ȸ�ϱ� ���� ���� ����
$result=mysql_query($sql,$db);                //�亯 ��� ��ȸ ���� ���� �� ��� �� ��$result���Ҵ�
?>
<html>
<head><title>��ǥ�ϱ�</title>
</head>
<body>
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
 <tr>
 <td width="1101">
 <p align="center"><b><font size="3">��ǥ�ϱ�</font></b></p>
 <form name="frm" action="./poll_insert.php" method="post">
 <table align="center" border="1" cellpadding="2" width="600">
  <tr>
   <td width="600">  <? echo $title; ?></td>
  </tr>
<?
while($row=mysql_fetch_array($result))            //poll �亯 ��� ��� �� �Ǽ���ŭ �ݺ�
{
	$id=$row[r_id];                             //�亯 ���̺��� ��r_id�� �÷����� ��$id�� �Ҵ�
    $repstr=$row[r_repstr];                  //�亯 ���̺��� ��r_repstr�� �÷����� ��$repstr���Ҵ�
	echo "
	<tr>
  	  <td width='600'>  <input type='hidden' name='id' value='$id'>
   	   <input type='radio' name='repstr' value='$repstr'>$repstr</td>
	</tr>
	";
}

mysql_close($db);
?>

<tr>
 <td align=center>
   <input type="submit" name="smt" value="��ǥ/���"></td>
    <!-- ��ǥ ����� ������ �����ϱ� ���� ���� ���� ǥ�� -->
</tr>
</table>
</form>

</td>
</tr>
</table>

</body>
</html>
