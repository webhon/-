<?
	$db=mysql_connect('localhost','flashboy','12345') or die("���� ���� ����");
    if($db) {
        echo 'MySQL ������ ���� ����';
    } else {
        echo 'MySQL ������ ���� ����';
    }
    mysql_close($db);
?>