<?php
include "./poll_con.php.inc";

$id; $repstr;                  //����ڰ� ������ �亯�� �亯 ������ ��$id, $repstr���Ҵ�

if($usr_id)
{ //���� ����ڰ� �α��� ���� �� ����
	$l_sql="select * from poll_usr where poll_usr='$usr_id' and poll_num=$id";
   //���� ����ڰ� �� ��ǥ�� �����߾������� ��ȸ�ϱ� ���� ���� ����

	$l_ret=mysql_query($l_sql,$db);          //���� ���� �� ��� ���� ��$l_ret�� �Ҵ�
	$list=mysql_num_rows($l_ret);                   //��� ���� �Ǽ��� ��$list�� �Ҵ�

	if($list) 
	{                                     //�ѹ��̶� �� ��ǥ�� ������ ������� �� ����
		echo "<script>
			alert('��ǥ�Ͽ����ϴ�.');
			location.href='./poll_result.php?id=$id';
		</script>";
		mysql_close($db);
           exit;
	}
}

if(!$repstr)                                  
{                                               //����ڰ� �亯�� �������� ���� �� ����
	echo "<script>alert('��ǥ���� �ʰ� ��� �������� �̵��մϴ�');</script>";
	echo "<meta http-equiv='refresh' content='0;url=./poll_result.php?id=$id'>";
	mysql_close($db);
    exit;
}

$sql="update poll_ret set r_vote=r_vote+1 where r_id=$id and r_repstr='$repstr'";
//����ڰ� ������ �亯�� �����ͺ��̽��� ������Ʈ �ϴ� ���� ����

$result=mysql_query($sql,$db);
//������Ʈ ���� ���� �� ������� $result�� �Ҵ�

mysql_close($db);

echo "<meta http-equiv='refresh' content='0;url=./poll_usr.php?id=$id'>";
?>
