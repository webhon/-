<?php
session_start();

if($memberid=="" || $membername==""){
	// ���� �α��ε��� ���� ������̹Ƿ� �α��� �������� �̵��Ѵ�
	echo "
		<html>
		<head>
			<script languaeg='javascript'>
				alert('ȸ���� �� �� �ִ� �������Դϴ�.');
				location.href='member_login.php';
			</script>
		</head>
		<body>
		</body>
		</html>";

	// �α��ε��� �ʾ����Ƿ� �� �̻� �������� ���ϵ��� �����.
	exit();
}
?>