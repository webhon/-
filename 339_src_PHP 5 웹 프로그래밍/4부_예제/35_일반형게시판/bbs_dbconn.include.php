<?php
//db ���� �κ��Դϴ�.
//"or die(mysql_error())"���� die() �Լ��� ��κ��� �Լ� �ڿ� ����� �� �ֽ��ϴ�. 
//���� �Լ��� ����(false)���� ��ȯ�ϸ� die("�޽���") �Լ��� �޽����� ����ϴ� ������ �մϴ�. 
//���� ���� ���� mysql_error() �Լ��� �̿��ؼ� ���� �޽����� �����ִ� ����� �մϴ�.

mysql_connect("localhost", "root", "mysql") or die (mysql_error()); //host,id,passwd
mysql_select_db("test"); //db�̸�
?>