<?php
include "./poll_con.php.inc";
$offset; $limit;
//����ڰ� ��û�� ����¡ ���� �������� ��$offset, $limit���ڵ� �Ҵ�

if(!$offset) { $offset=0; }         //��û�� ������ ��ȣ�� ���ٸ� ù ������(0) ��ȸ
$limit=10;                           //�������� 10���� ������ ���� �ֱ�

$cnt_sql="select * from poll_tbl order by p_num desc";
//poll ���̺��� p_num �÷����� �������� �����ؼ� ��ȸ�ϴ� ���� ����

$cnt_result=mysql_query($cnt_sql,$db);    //���� ������ ����� ��$cnt_result�� �Ҵ�
$count=mysql_num_rows($cnt_result);               //���� ��� �Ǽ��� ��$count���Ҵ�
if(!$count) { $count=0; }                      //���� ��� �Ǽ��� ������ ��0�� �Ҵ�

$sql="select * from poll_tbl order by p_num desc limit $offset,$limit";
//����ڰ� ��û�� �������� ���� ���ڵ常 ��ȸ�ϱ� ���� limit������ ���Ե� ���� ����

$result=mysql_query($sql,$db);                 //���� ���� ��� �� ��$result���Ҵ�
?>

<html>
<head><title>Poll ��� ����</title>
</head>
   <body>

  <table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
  <tr>
  <td width="1101"><p align="center"><font size="3"><b>�������� Poll</b></font></p>
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="600">
   <tr>
    <td><a href="./admin_poll_1.php"><small>���� �����</small></a></td>
   </tr>
 </table>

	<table align="center" border="1" cellpadding="3" cellspacing="0" width="600">
	<tr>
		<td width="790">
			<p><font size="2">�� �������� Poll ����</font></p>
		</td>
	</tr>

 <?
while($row=mysql_fetch_array($result)){ 
//���� ��� �� ��$result���� �����ϴ� ���ڵ� ����ŭ �ݺ� ������ �����ϸ鼭 ���� ���� ���� ���� �׸���� ȭ�鿡 <TR> �� ������
	$num=$row[p_num]; $title=$row[p_title];

  echo "
	<tr>
	  <td width='790'>
	   <p><font size='2'>;
       <a href='./poll_read.php?num=$num'>$title</a></font></p>
	  </td>
	</tr>
	";
}

mysql_close($db);
 ?>
  </table>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="600">
<tr>
	<td align=center>
		<small>

<?
$i=($offset/$limit)+1; 
$i=intval(($i-1)/10)*10+1;
if($offset!=0 && $offset>99)
{                                     //������ �̵����� ���� ��������<<����ũ ǥ��
	$newoffset=(($i-10)-1)*$limit;
	echo "<a href=$PHP_SELF?offset=$newoffset>".
		"<<</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
else { echo "<<&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }


if($offset!=0)
{ 				//������ �̵����� ���� ����������������ũ ǥ��
	$newoffset=$offset-$limit;
	echo "<a href=$PHP_SELF?offset=$newoffset>����</a>";
}
else { echo "����&nbsp;"; }

$pages=intval($count/$limit);
if($count%$limit) { $pages++; }
$loop=0;
  
for($i;$i<=$pages && $loop<10;$i++,$loop++)
{  						//������ ��ũ��[1] [2] [3],...�� ǥ��
	$newoffset=$limit*($i-1);

	if($offset!=$newoffset)
	{
		echo "<a href=$PHP_SELF?offset=$newoffset>[$i]</a>&nbsp;";
	}
	else
	{
		echo "$i&nbsp;";
	}
}
  if($pages>1
{					       //������ �̵����� ���� ����������������ũ ǥ��
	$last=($offset/$limit)+1;
	if($pages!=$last)
	{
		$newoffset=$offset+$limit;
		echo "<a href=$PHP_SELF?offset=$newoffset>����</a>";
	}
	else
	{
		echo "����";
	}
}
else
{
	echo "����";
}

  //������ �̵����� ������ ��������>>����ũ ǥ��
if($pages>1)
{
	$last=($offset/$limit)+1;
	if($pages!=$last && $i<=$pages)
	{
		$newoffset=($i-1)*$limit;
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
		"<a href=$PHP_SELF?offset=$newoffset>>></a></span>";
	}
	else
	{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>";
	}
}
else
{
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>";
}
?>

		</small>
	</td>
</tr>
</table>
		<p>&nbsp;</p>
	</td>
</tr>
</table>

</body>
</html>
