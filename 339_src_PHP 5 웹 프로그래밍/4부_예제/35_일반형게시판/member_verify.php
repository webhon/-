<?
require("./bbs_dbconn.include.php");

//�Է���(member_login.php)���� ���۵� ������ ������ ����ϴ�.
//addslashes() �Լ��� Ư����ȣ�� escape ���ڸ� �����ִ� �Լ��Դϴ�.
//��������ǥ('), ū����ǥ("), ��������(\)�� ���� ���ڴ� 
//�״�� ����� ��� ���������̳� ���ڿ� ��¿��� ���� ������ 
//���߽�ŵ�ϴ�. �׷��� ���⿡���� ������ �����ϱ� ���� �̸�
//Ư�����ڿ� ���ؼ� escapingó���� �մϴ�. 
//escapingó���� Ư������ �տ� ��������(\)�� �ϳ� ���������ν�
//�� Ư�����ڰ� ���ڿ��� �Ϻ����� ǥ�����ִ� ���Դϴ�.
$memberid = addslashes($memberid);
$memberpass = addslashes($memberpass);
 
//����Ʈ ���� �ʿ��� �������� ����Ʈ ���� �ֽ��ϴ�.
//$applytime ������ ������ �ð��� �����մϴ�.
//time() �Լ��� ������ �ð��� �����ִ� �Լ��Դϴ�.
$logintime = time();
 
//SQL ����� �̿��� �Է¹��� ����� ����Ʈ�� ���� MySQL�� �Է�(insert)�մϴ�.
$sql = "select memberid, membername, membermail, memberurl from member ".
		"where memberpass='$memberpass' and memberid='$memberid'";
$result = mysql_query($sql) or die (mysql_error()); 
$array = mysql_fetch_array($result); 
$row_count = mysql_num_rows($result);

if($row_count<=0){
	// MySQL �����ͺ��̽� ������ ����
	mysql_close();

	//ȸ�� �α����� �����ϸ� �����޽����� �����ְ�, ���� �������� �̵��մϴ�.
	$msg = "ȸ�� ID�� ���ų� ��й�ȣ�� ��ġ���� �ʽ��ϴ�.";
	echo "
	<html>
	<head>
		<script name=javascript>
			if('$msg' != '') {
				self.window.alert('$msg');
			}

			history.back();
		</script>
	</head>
	</html>
	";
}else{
	$memberid = stripslashes($array[memberid]);
	$membername = stripslashes($array[membername]);
	$membermail = stripslashes($array[membermail]);
	$memberurl = stripslashes($array[memberurl]);

	$sql = "update member set lastlogin = '$logintime' where memberpass='$memberpass' and memberid='$memberid'";
	//SQL ������ �����մϴ�. ������ �߻��ϸ� mysql_error()�Լ��� ������ �����մϴ�.
	mysql_query($sql) or die (mysql_error());

	// MySQL �����ͺ��̽� ������ ����
	mysql_close();

	// ������� �α��� ������ ���ǿ� �����Ѵ�.
	session_start();
	session_register("memberid");
	session_register("membername");
	session_register("membermail");
	session_register("memberurl");

	//����� �α����� �Ϸ�Ǹ� ��� ���� �������� �ڵ� �̵��ϵ��� �մϴ�
	$msg = "���������� �α��� �Ǿ����ϴ�";
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
}
?>