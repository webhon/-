<?
require("./bbs_dbconn.include.php");

// ���ǿ� ����� ������� �α��� ������ Ȯ���Ѵ�.
session_start();

$logout_message = "";

if($memberid=="" || $membername==""){
	// ���� �α��ε��� ���� ������̹Ƿ� �����Ѵ�.
	$logout_message = "���� �α��ε��� �ʾҽ��ϴ�.";
}else{
	$logout_message = "�α׾ƿ� �Ǿ����ϴ�.\\n\\n"."$membername �� �ȳ��� ������";

	session_unregister("memberid");
	session_unregister("membername");
	session_unregister("membermail");
	session_unregister("memberurl");		
}

//����� �α����� �Ϸ�Ǹ� ��� ���� �������� �ڵ� �̵��ϵ��� �մϴ�
$msg = "���������� �α��� �Ǿ����ϴ�";
echo "
<html>
<head>
	<script name=javascript>
		if('$logout_message' != '') {
			self.window.alert('$logout_message');
		}

		location.href='member_login.php';
	</script>
</head>
</html>
";

?>