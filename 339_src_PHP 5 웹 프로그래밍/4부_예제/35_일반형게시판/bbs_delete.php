<?php
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");
  
//���� 
$password = addslashes($password); 
$tablename="mfboard"; //���̺� �̸� 
  
//��й�ȣ�� �´��� Ȯ���մϴ�. 
$sql = "select number from $tablename where number=$number and password='$password'"; 
$result = mysql_query($sql) or die (mysql_error()); 

$msg = "��й�ȣ�� Ʋ���ϴ�."; 
  
if(mysql_num_rows($result)) {  
	//��ȯ�� ���� ������, �����մϴ�. 
	$sql = "delete from $tablename where number=$number"; 
	mysql_query($sql) or die (mysql_error()); 
	$msg = "�����Ͽ����ϴ�."; 
} 

// MySQL �����ͺ��̽� ������ ����
mysql_close();

//�޽����� ����ϰ� ��� �������� �̵��մϴ�. 
echo "
<html>
<head> 
<script name=javascript> 
	if('$msg' != '') { 
		self.window.alert('$msg'); 
	} 
  
	location.href='bbs_list.php?page=$page'; 
</script> 
</head> 
</html>
"; 
?> 
