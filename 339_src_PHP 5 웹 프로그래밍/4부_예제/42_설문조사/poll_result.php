<?php

include "./poll_con.php.inc";

$id; $title;

$t_sql="select * from poll_tbl where p_num=$id";
//����ڰ� ������ ��ǥ ������ ��ȸ�ϴ� ���� ����

$t_ret=mysql_query($t_sql,$db);     //��ȸ ������ ���� �� ��� ���� ��$t_ret���Ҵ�
$t_row=mysql_fetch_array($t_ret);      //��� �V�� ù ��° ���ڵ带 ��$t_row���Ҵ�

$title=$t_row[p_title];           //��ǥ ���̺��� ��p_title�� �÷��� ��$title���Ҵ�

$sql="select * from poll_ret where r_id=$id";
//��ǥ �亯 ���̺��� �亯 ���� ����� ��ȸ�ϴ� ���� ����

$result=mysql_query($sql,$db);             //���� ���� �� ��� ���� ��$resul���Ҵ�
?>
<html>
<head><title>Poll ��� ����</title>
</head>
<body>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
<tr>
<td width="1101">
  <p align="center"><b><font size="3">Poll ��� ����</font></b></p>
 <table align="center" border="1" cellpadding="2" width="600">
 <tr>
  <td width="600"> <? echo $title; ?> </td>
 </tr>
 <tr>
  <td>
   <table border=0 width=500 align=center>
   <?
   while($row=mysql_fetch_array($result))
   //�亯 ����� ��� ���ڵ带 �ݺ��ϸ鼭 ��$row�� �Ҵ�

{ 
$id=$row[r_id]; $repstr=$row[r_repstr]; $vote=$row[r_vote];
//�亯 ���̺��� ��r_id, r_repstr, r_vote�� �÷� ���� ��$id, $repstr, $vote�� �Ҵ�
echo "
  <tr>
   <td width=250>$repstr</td>
   <td width=250>$vote ��</td>
  </tr>
  ";
}

mysql_close($db);
?>
 </table>
</td>
</tr>
<tr>
  <td><p align=center>���� ��¥ : <? echo Date("Y-m-d"); ?></p></td>
</tr>
<tr><td><p align=center><a href="./list.php">���</a></p></td>
</tr>
</table>

</td>
</tr>
</table>

</body>
</html>


