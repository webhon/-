<?
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");

//�Է���(bbs_write.php)���� ���۵� ������ ������ ����ϴ�.
//addslashes() �Լ��� Ư����ȣ�� escape ���ڸ� �����ִ� �Լ��Դϴ�.
//��������ǥ('), ū����ǥ("), ��������(\)�� ���� ���ڴ� 
//�״�� ����� ��� ���������̳� ���ڿ� ��¿��� ���� ������ 
//���߽�ŵ�ϴ�. �׷��� ���⿡���� ������ �����ϱ� ���� �̸�
//Ư�����ڿ� ���ؼ� escapingó���� �մϴ�. 
//escapingó���� Ư������ �տ� ��������(\)�� �ϳ� ���������ν�
//�� Ư�����ڰ� ���ڿ��� �Ϻ����� ǥ�����ִ� ���Դϴ�.
$name = addslashes($name);
$password = addslashes($password);
$email = addslashes($email);
$homepage = addslashes($homepage);
$subject = addslashes($subject);
$memo = addslashes($memo);
 
//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�.
//$writetime ������ ������ �ð��� �����մϴ�.
//time() �Լ��� ������ �ð��� �����ִ� �Լ��Դϴ�.
$writetime = time();

//getenv() �Լ��� ������ ȯ�� ������ �ҷ����� ������ �մϴ�.
//���� ���� ���ڸ� "REMOTE_ADDR"�̶�� ����, ������(Ŭ���̾�Ʈ)�� �ּҸ� �����ִ� ������ �մϴ�.
//�Խ��ǿ� �� �� ����� ip �ּҸ� ����ϱ� ���� ����߽��ϴ�.
$ip = getenv("REMOTE_ADDR");

//��ȸ���� �����ϱ� ���� $count ������ ����߽��ϴ�.
$count = 0;
 
//SQL ����� �̿��� �Է¹��� ����� ����Ʈ�� ���� MySQL�� �Է�(insert)�մϴ�.
$sql = "insert into mfboard(name, password, email, homepage, subject, memo, count, ip, writetime) ".
       "values('$name','$password','$email','$hompage','$subject','$memo',$count,'$ip',$writetime)";

//SQL ������ �����մϴ�. ������ �߻��ϸ� mysql_error()�Լ��� ������ �����մϴ�.
mysql_query($sql) or die (mysql_error());

// MySQL �����ͺ��̽� ������ ����
mysql_close();

//�� �Է��� �Ϸ�Ǹ� ��� ���� �������� �ڵ� �̵��ϵ��� �մϴ�
$msg = "���������� ��ϵǾ����ϴ�";
echo "
<html>
<head>
	<script name=javascript>
		if('$msg' != '') {
			self.window.alert('$msg');
		}

		location.href='bbs_list.php';
	</script>
</head>
</html>
";
?>