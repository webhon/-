<?
    $connect = mysql_connect("localhost","flashboy","12345");
    $result = mysql_select_db("db_01",$connect);
    if($result == 1) {
        echo '�����ͺ��̽� ���� ����';
    } else {
        echo '�����ͺ��̽� ���� ����';
    }
    mysql_close($connect);
?>
