<?php
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");
  
//������(bbs_modify.php)���� ���۵� ������ ������ ����ϴ�. 
$name = addslashes($name); 
$password = addslashes($password); 
$email = addslashes($email); 
$homepage = addslashes($homepage); 
$subject = addslashes($subject); 
$memo = addslashes($memo); 

//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�. 
$tablename="mfboard"; //���̺� �̸� 
$writetime = time(); 
  
//��й�ȣ�� �´��� Ȯ���մϴ�. 
$sql = "select number from $tablename where number=$number and password='$password'"; 
$result = mysql_query($sql) or die (mysql_error()); 
  
if(mysql_num_rows($result)) {  //��ȯ�� ���� ������... 
	//������ ������ UPDATE�մϴ�. 
	$sql = "update $tablename set ".
			"name='$name',email='$email',homepage='$homepage', ".
			"subject='$subject',memo='$memo' where number=$number"; 
	mysql_query($sql) or die (mysql_error()); 
	$msg = "������ �Ͽ����ϴ�."; 
  
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
		</html>"; 
}else{ 
	$msg = "��й�ȣ�� Ʋ���ϴ�."; 
	echo "
		<html>
		<head> 
		<script name=javascript> 
			if('$msg' != '') { 
				self.window.alert('$msg'); 
			} 
  
			history.go(-1); 
		</script> 
		</head> 
		</html> "; 
}

// MySQL �����ͺ��̽� ������ ����
mysql_close();
?>