<?
require("./bbs_dbconn.include.php");

//�Է���(member_apply.php)���� ���۵� ������ ������ ����ϴ�.
//addslashes() �Լ��� Ư����ȣ�� escape ���ڸ� �����ִ� �Լ��Դϴ�.
//��������ǥ('), ū����ǥ("), ��������(\)�� ���� ���ڴ� 
//�״�� ����� ��� ���������̳� ���ڿ� ��¿��� ���� ������ 
//���߽�ŵ�ϴ�. �׷��� ���⿡���� ������ �����ϱ� ���� �̸�
//Ư�����ڿ� ���ؼ� escapingó���� �մϴ�. 
//escapingó���� Ư������ �տ� ��������(\)�� �ϳ� ���������ν�
//�� Ư�����ڰ� ���ڿ��� �Ϻ����� ǥ�����ִ� ���Դϴ�.
$memberid = addslashes($memberid);
$membername = addslashes($membername);
$membermail = addslashes($membermail);
$memberpass = addslashes($memberpass);
$memberurl = addslashes($memberurl);
 
//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�.
//$applytime ������ ������ �ð��� �����մϴ�.
//time() �Լ��� ������ �ð��� �����ִ� �Լ��Դϴ�.
$applytime = time();
 
//SQL ����� �̿��� �Է¹��� ����� ����Ʈ�� ���� MySQL�� �Է�(insert)�մϴ�.
$sql = "insert into member(memberid, membername, memberpass, membermail, memberurl, lastlogin) ".
       "values('$memberid','$membername','$memberpass','$membermail','$memberurl','$applytime')";

//SQL ������ �����մϴ�. ������ �߻��ϸ� mysql_error()�Լ��� ������ �����մϴ�.
mysql_query($sql) or die (mysql_error());

// MySQL �����ͺ��̽� ������ ����
mysql_close();

//�� �Է��� �Ϸ�Ǹ� ��� ���� �������� �ڵ� �̵��ϵ��� �մϴ�
$msg = "���������� ȸ�����ԵǾ����ϴ�";
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