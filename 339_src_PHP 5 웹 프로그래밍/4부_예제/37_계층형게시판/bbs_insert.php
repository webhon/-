<?
require("./member_checklogin.include.php");
require("./bbs_dbconn.include.php");

$tablename = "msboard";

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
 
// ----------------------------------------------------------------------
// parentno, replylv �÷� ������Ʈ ����
// ----------------------------------------------------------------------
//SQL ����� �̿��� �Է¹��� ����� ����Ʈ�� ���� MySQL�� �Է�(insert)�մϴ�.
//parentno �÷��� �켱 '0'���� ���� insert�� �ٽ� update�մϴ�.
$sql = "insert into $tablename(name, password, email, homepage, subject, memo, count, ip, writetime, parentno, replylv) ".
       "values('$name','$password','$email','$hompage','$subject','$memo',$count,'$ip',$writetime, '0', 'AAAAAAAAAA')";

//SQL ������ �����մϴ�. ������ �߻��ϸ� mysql_error()�Լ��� ������ �����մϴ�.
mysql_query($sql) or die (mysql_error());

//��� �Է��� �� ��ȣ�� ã���ϴ�.
$sql = "select number from $tablename where ip='$ip' and writetime=$writetime"; 
$result = mysql_query($sql) or die (mysql_error());
$row = mysql_fetch_array($result);
$number = $row[0];

//����� �ƴϱ� ������ parentno�� ������ number ���� �����մϴ�.
$sql = "update $tablename set parentno = $number where number = $number"; 
mysql_query($sql) or die (mysql_error());
// ----------------------------------------------------------------------
// parentno, replylv �÷� ������Ʈ ����
// ----------------------------------------------------------------------

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