<?
	$connect = mysql_connect('localhost','flashboy','12345'); 
	mysql_select_db('db_01', $connect);     
	$flag = mysql_query('create table test(name char(20), pw char(20))', $connect);
	if($flag) {
		echo '���̺��� ���������� ����� �����ϴ�.';
	}else{
		echo '���̺��� �����ϴµ� ������ �߻��߽��ϴ�.';
	}
	mysql_close($connect);                        
?>
